# -*- coding: utf-8 -*-
import time
import RPi.GPIO as GPIO
import smtplib
from email.mime.text import MIMEText
from email.mime.image import MIMEImage
from email.mime.multipart import MIMEMultipart
import time
import cv2

# initialize the camera

import datetime


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
        cam.release()
        msg=MIMEMultipart()
        img_data=open('/home/pi/image2.jpg','rb').read()
        server = smtplib.SMTP_SSL('smtp.gmail.com', 465)
        text=MIMEText("movement")
        msg.attach(text)
        image=MIMEImage(img_data)
        msg.attach(image)
        server.login("matthinaveen@gmail.com", "VUcse4189,.")
        server.sendmail(
          "matthinaveen@gmail.com", 
          "venkatdutta@gmail.com", 
          msg.as_string())
        print "mail sent"
        server.quit()
      # Record previous state
      Previous_State=0
      print "  Ready"
except KeyboardInterrupt:
  print "  Quit"
  # Reset GPIO settings
  GPIO.cleanup()