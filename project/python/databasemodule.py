# -*- coding: utf-8 -*-
import time
import MySQLdb
import time
import sys

# initialize the camera
import datetime

conn = MySQLdb.connect(host= "localhost",
                  user="root",
                  passwd="123456789",
                  db="project")
x = conn.cursor()
with open('/home/pi/image2.jpg', 'rb') as stream:
    blob = stream.read()

try:
    ts = time.time()
    timestamp = datetime.datetime.fromtimestamp(ts).strftime('%Y-%m-%d %H:%M:%S')
    x.execute("""INSERT INTO data VALUES (%s,%s)""",(timestamp,[blob]))
    conn.commit()   
except:
    conn.rollback()
      
