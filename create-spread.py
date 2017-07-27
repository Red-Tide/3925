#!/usr/env/python

#import module to write to spreadsheets
import xlsxwriter
#import moduel to interface with MySQL
import MySQLdb
#time module to get the time
import time

#Connect to Database
db = MySQLdb.connect("localhost","root","pumpkinpie99","lights" )
cursor = db.cursor()

#A workbook as well as adding a worksheet to it time.strftime("%c")
workbook = xlsxwriter.Workbook("lightsofhope.xlsx")
worksheet = workbook.add_worksheet(time.strftime("%c").replace(":","-"))

#Titles in A1 and B1
worksheet.write('A1',"Email")
worksheet.write('B1',"Name")
worksheet.write('C1',"Login_Time")
worksheet.write('D1',"Contact?")
worksheet.write('E1',"Retrieved?")

#variables to keep track of rows and columns
row = 1
col = 0
date = time.strftime("%c, %X")

#sql commands go here
sql = "SELECT * FROM tuser"
sql2 = "UPDATE tuser SET retrieved = '"+ time.strftime("%c") + "' WHERE retrieved='new'"

#execute the sql command
cursor.execute(sql)

#spit out the results into the contacts variable
contacts=cursor.fetchall()

#update that they are fetched
cursor.execute(sql2)

#close the database
db.commit()
db.close()

#populate the spreadsheet
for name,email,login,contact,retrieve in contacts:
  worksheet.write(row, col, name)
  worksheet.write(row, col+1, email)
  worksheet.write(row, col+2, login)
  if contact == 0:
  	worksheet.write(row, col+3, "No")
  else:
  	worksheet.write(row, col+3, "Yes")
  worksheet.write(row, col+4, retrieve)
  row+=1

#close the workbook
workbook.close()

