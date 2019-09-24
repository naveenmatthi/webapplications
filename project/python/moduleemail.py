
import smtplib
from email.mime.text import MIMEText
from email.mime.image import MIMEImage
from email.mime.multipart import MIMEMultipart
msg=MIMEMultipart()
img_data=open('/home/pi/image3.jpg','rb').read()
server = smtplib.SMTP_SSL('smtp.gmail.com', 465)
text=MIMEText("test")
msg.attach(text)
image=MIMEImage(img_data)
msg.attach(image)
server.login("matthinaveen@gmail.com", "VUcse4189,.")
server.sendmail(
  "matthinaveen@gmail.com", 
  "venkatdutta99@gmail.com", 
  msg.as_string())
server.quit()

