
::: README ASSIGNMENT 1 :::


:: MRTG ::


To install MRTG, run the file mrtgconf.pl in the same folder.

     command :   perl mrtgconf.pl



:: Bitrate calculation ::


The tool reads device credentials from table `DEVICES` and displays the bitrate for selected device and selected interface. The graph's are seperated according to the in bit rate and out bit rate.


 :: Pre-requisites ::
																										

Properly installed and required configurations

	a.mysql-server
	b.apache2
	c.snmpd
	d.snmp
	e.php5

Required permissions must be enabled 

The webserver you are using should have read and write permissions to the directory et2536-sako15 and to the assignmnets directories.


																					   
 :: Installations ::
																										
																									

The following components need to be installed. 

sudo apt-get install apache2
sudo apt-get install snmp
sudo apt-get install snmpd
{
sudo apt-get install libdbi-perl
sudo apt-get install libpango1.0-dev 
sudo apt-get install libxml2-dev
sudo apt-get install libsnmp-perl 
sudo apt-get install libsnmp-dev 
sudo apt-get install libnet-snmp-perl
}
sudo apt-get install rrdtool
sudo apt-get install rrdtool-dbg
sudo apt-get install php5-rrd
sudo apt-get install php5-snmp
sudo perl -MCPAN -e 'install Net::SNMP'
sudo perl -MCPAN -e 'install Net::SNMP::Interfaces'
sudo perl -MCPAN -e 'install RRD::Simple'	



																										
 :: Instructions to run Assignment 1 ::
																										


1.To Configure the mrtg tool run the mrtgconf file which is in the same folder. This should be run with necessary root permissions(sudo)

		Command :: sudo perl mrtgconf.pl

*MRTG does not accept if the multiple devices have the same interfaces. even though they have different ip address and community.


2. The backend script has to be placed as a cron job. Following are commands in command line

		Command :: sudo crontab -e
					
	 Add the line at the bottom 
	 
	 			 */5 * * * * /path/to/et2536-sako15/assignment1/backend.pl				
	 
	 Save and exit. Start the daemon by
	 
	 Command :: sudo service cron start

3. Wait for atleast 15 to 20 minutes  for values to get updated.

4. From your browser go to the folder assignment1

5. The list of available devices which are curently being monitored is displayed.

6. Enter the details of the device you want to view the graphs for and press "Submit".

7. The list of Interface ID's which are being monitored will be displayed. The loop back interfaces and sub-layer interfaces 
   are not probed.

8. Enter the interface ID for which you want to view the graphs for and press "Go".

9. The updated data can be viewed by refreshing the browser



																										
 :: Note ::
																										


1. User needs to enter the proper valid information. The tool verifies. 

2. Wrong detials will return errors and cause the program to fail. 

3. If a device is removed from the database, it is not shown in the table but the graphs can be viewed by entering the right credentials. 

4. Since it not a reqiurement , the number of requests per device is not limited. 

5.Multiple requests per device are sent.  

6.Non-blocking method was not used to retrieve the data.


::: AUTHOR :::

Samuel Sushanth Kolli
sako15@student.bth.se 

