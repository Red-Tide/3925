#!/usr/env/python

#import module to write to spreadsheets
import xlsxwriter
#import moduel to interface with MySQL
import MySQLdb
#time module to get the time
import time

#Connect to Database
db = MySQLdb.connect("localhost","root","pumpkinpie99","lights_of_hope" )
cursor=db.cursor()

#A workbook as well as adding a worksheet to it
workbook = xlsxwriter.Workbook("lightsofhope_" + time.strftime("%c") + ".xlsx")
worksheet = workbook.add_worksheet()

#Titles in A1 and B1
worksheet.write('A1',"Email")
worksheet.write('B1',"Name")

#variables to keep track of rows and columns
row = 1
col = 0

#sql command goes here
sql = "SELECT * FROM info"

#execute the sql command
cursor.execute(sql)

#spit out the results into the contacts variable
contacts=cursor.fetchall()

#close the database
db.close()

#populate the spreadsheet
for name,email in contacts:
  worksheet.write(row, col, name)
  worksheet.write(row, col+1, email)
  row+=1

#close the workbook
workbook.close()