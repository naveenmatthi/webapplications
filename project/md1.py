# -*- coding: utf-8 -*-
import time
import RPi.GPIO as GPIO
import MySQLdb
import time
import cv2
import smtplib
from email.mime.text import MIMEText
from email.mime.image import MIMEImage
from email.mime.multipart import MIMEMultipart

# initialize the camera

import datetime

conn = MySQLdb.connect(host= "localhost",
                  user="naveen",
                  passwd="naveen",
                  db="project")
x = conn.cursor()
TO=["141fa04189@gmail.com"]
cursor = conn.cursor()
cursor.execute('select email from login where email is not null')
conn.commit()
rows = cursor.fetchall()
for item in rows:
    TO.append(item)

# Use BCM GPIO references
# instead of physical pin numbers
GPIO.setmode(GPIO.BCM)
 
# Define GPIO to use on Pi
GPIO_PIR = 23
 
print "PIR Module Holding Time Test (CTRL-C to exit)"
 
# Set pin as input
GPIO.setup(GPIO_PIR,GPIO.IN)      # Echo
 
Current_State  = 0
Previous_State = 0
 
try:
 
  print "Waiting for PIR to settle ..."
 
  # Loop until PIR output is 0
  while GPIO.input(GPIO_PIR)==1:
    Current_State  = 0
 
  print "  Ready"
 
  # Loop until users quits with CTRL-C
  while True :
 
    # Read PIR state
    Current_State = GPIO.input(GPIO_PIR)
 
    if Current_State==1 and Previous_State==0:
      # PIR is triggered
      start_time=time.time()
      print "  Movement detected!"
      cam = cv2.VideoCapture(0)
      ret, image = cam.read()
      if ret:
        cv2.imwrite('/home/pi/image2.jpg',image)
        msg=MIMEMultipart()
        img_data=open('/home/pi/image2.jpg','rb').read()
        server = smtplib.SMTP_SSL('smtp.gmail.com', 465)
        text=MIMEText("movementdetected")
        msg.attach(text)
        image=MIMEImage(img_data)
        msg.attach(image)
        msg['Subject'] = 'MOVEMENT DETECTED'
        server.login("matthinaveen@gmail.com", "VUcse4189,.")
        server.sendmail(
          "matthinaveen@gmail.com", 
          TO, 
          msg.as_string())
        print "mail sent"
        server.quit()
      cam.release()
      try:
          ts = time.time()
          with open('/home/pi/image2.jpg', 'rb') as stream:
            blob = stream.read()
          timestamp = datetime.datetime.fromtimestamp(ts).strftime('%Y-%m-%d %H:%M:%S')
          x.execute("""INSERT INTO data VALUES (%s,%s)""",(timestamp,[blob]))
          conn.commit()
      except:
         conn.rollback()
      # Record previous state
      Previous_State=1
    elif Current_State==0 and Previous_State==1:
      # PIR has returned to ready state
      stop_time=time.time()
      print "  Ready ",
      elapsed_time=int(stop_time-start_time)
      print " (data stored into data base"
      Previous_State=0
 
except KeyboardInterrupt:
  print "  Quit"
  # Reset GPIO settings
  GPIO.cleanup()
