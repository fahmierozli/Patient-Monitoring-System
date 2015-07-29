Database-
-Add Column patiendID varchar 10 to heartrate
-alter column time format datenow / current timestamp


PHP-

i)getHeartRate.php
-delete and edit query(filter by patientID)

ii)patient.php
-edit add session to store patientID after tagID
-delete query

iii)api.php
-Add file api.php
-receive data from VB(serial Com) and directly save to database.
-filter by tagsID
-tagsID then check from tagtracker to get patientID
-insert data to heartrate


VisualBASIC 2008
-select com port , fill server url and connect
-Data received is sent to api.php


ARDUINO
-microcontroller ATMEL source code
-TagsID = 0001

PMS
-OLD unedited PMS PHP source code

//demo http://p.site40.net/

contact person:
Mohd Nur Fahmie
fahmierozli@gmail.com
0134873831