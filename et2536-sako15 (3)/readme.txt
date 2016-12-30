
 :::: Main README ::::



This folder contains the assignments for the lab of the course "Applied Network Management" "et2536-sako15".

It contains information about the modules/software and steps needed to successfully run the assignments.

::::This folder consists of 4 folders and 2 text files::::


All the scripts are written in Perl (backend) and PHP and HTML (frontend). Database used is MySQL for all assignments.

::Folder Assignment1::
	This folder contains the files needed to run the first assignment
	It contains a Perl script to automatically install and configure mrtg and a Perl script which runs network monitoring tool.
	The php files related to the web dashboard are provided. 

::Folder Assignment2::
	This folder contains the files needed to run the second assignment.
	It contains perl script to monitor the server metrics and to obtain the bitrate for the selected interfaces of the network devices. 
	The php scripts for the web dashboard are provided.

::Folder Assignment3::
	This folder contains the files needed to run the third assignment.
	It contains a trapdaemon (Perl file) that processes traps received by the system on UDP:50162 port must be configured as the 		traphandle in snmptrapd.conf, and a log file to store the data(fqdn, current status and time) passed in a trap.
	It also contains php scripts for the web dashboard.  
	 
::Folder Assignment4::
	This folder contains the files needed to run the fourth assignment.
	It contains a perl script to probe about 150 devices and store their sysuptime in the MySQL database.
	The php scripts for the web dashboard are provided.

::db.conf::
	This is the database configuration file which consists of the credentials to access the MySQL database.
	The Host IP address, database name, username and password along with the port number are stored.
	The user needs to change the contents of this file as per the configuration of MySQL database.

:::NOTE:::
	It is important that a database containing a "DEVICES" table is created prior to running the scripts.

		The "DEVICES" table stores the SNMP credentials of the devices such as IP,PORT,COMMUNITY as per the guidelines given in lab.pdf.
		The "DEVICES" table must be created as:
		CREATE TABLE IF NOT EXISTS DEVICES (
		id int (11) NOT NULL AUTO_INCREMENT,
		IP tinytext NOT NULL,
		PORT int (11) NOT NULL,
		COMMUNITY tinytext NOT NULL,
		PRIMARY KEY ( id )
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

	readme.txt
	You are now reading the readme.txt for the root folder of the assignment. 
	This is the text file which describes the details of the enclosed folders, software requirements and basic structure of assignments.
 
:::Software Tools:::


1. Operating System: Ubuntu 14.04 LTS
2. Install Apache, MySQL, PHP
3. Install snmp,snmpd and rrdtool(with librrds-perl)
4. Install CPAN.
5. The additional modules required for each assignment are provided in the readme files in their respective assignment folders.

::: NOTE :::


1. Please log into the terminal as root before running the assignments.
2. Place the assignments in the folder /var/www/html/
3. Provide permissions to the folders and files by typing the following command in the terminal:
   "sudo chmod 777 /path/to/file/folder/"
4. In the read me files, it is assumed that the folder et2536-sako15 is in /var/www/html/.
   If the user has a different working directory for Apache server, the user needs to place the folder et2536-sako15 in that directory.
   The user need not worry about the URL. He will be automatically redirected to the index page as soon as you click on the desired assignment folder in the browser.

 ::: AUTHOR :::

Samuel Sushanth Kolli
sako15@student.bth.se
