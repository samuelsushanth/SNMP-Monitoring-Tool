
::: Explaination of Backend.pl :::


In backend.pl, I have first executed table.pl that creates the table and then the code will enter into the infinite while loop in which the backend script will be executed every 30 seconds. The backend script will update values into the table created by table.pl

Uptime of each device is updated every 30 seconds and last updated time along with web server time (Local) is displayed in the front end.

The status of each device is displayed using different shade of colour red 
for each request lost the status becomes more darker after 30 lost requests the status becomes dark red.			



							

::: Assignment 4 Readme :::


1.The objective of this assignment is to find the sysuptime for about 150 devices using non-blocking SNMP calls. 
2.Each device is probed every 30 seconds. The results are presented through a web dashboard. The status of each device is shown using a variation of red color.
3.For one missed request, the status color is   #FFEEEE    (light red). The more requests the device misses, the more darker shade of red the status becomes. 
4.After 30 missed requests, the status color becomes #FF0000(red). If a device responds, the status is normalized to        #FFFFFF(white).
5.This document describes the information about the various files in this folder, modules/software needed and steps to run this assignment.



 :::: This folder consists of a few files  ::::

1. backend.pl
2. main.pl
3. dbpath.pl
3. index.php
4. data.php
6. db.php
7. readme.txt

::: Software Requirements :::


1. Operating System: Ubuntu 14.04 LTS.

2. You need to install Apache server, MySQL and PHP.

3. Modules which are needed to be installed from CPAN are:
	 
     {    Data::Dumper
	 DBD::Mysql
	 DBI
	 Cwd
   	 Net::SNMP    }
             
4. Install packages from terminal (sudo apt-get install snmp && snmpd)




::: Steps to run this assignment 4 :::


1. Once the database and DEVICES table are setup , modify the db.conf file in the root directory accordingly.        The backend scripts will access the 
   database mentioned in db.conf use the device credentials mentioned in the table (IP, PORT and COMMUNITY) to obtain sysUptime.

2. Go to the terminal and cd into the directory where this folder is present. 
   It is assumed that the working directory configured in the apache localhost i.e. /var/www/html/, change the path accordingly

3. To run the backend, run the perl script "backend.pl" in the terminal 
 Command "perl backend.pl".
   The backend will retrieve device credentials from the table, conduct snmp get request to get sysUptime of each device, 
   The sysUptimes are stored in the database along with Sent and Lost requests.

4. Now, open a web browser and type the following URL:
   http://localhost/et2536-sako15/assignment4/
   It will open index.php and show a table containing all the devices along with their sysUptimes and status colors.
   On clicking a device, number of Sent requests, Lost requests, Last recorded Uptime and Web Server Time are displayed. 


::: AUTHOR :::

Samuel Sushanth Kolli
sako15@student.bth.se

