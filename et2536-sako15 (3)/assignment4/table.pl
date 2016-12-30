#!/usr/bin/perl

use DBI;
use Cwd;
require "dbpath.pl";
require "$realpath";

	sub table()
{
	$dsn = "DBI:mysql:$database:$host:$port";
	$dbh = DBI->connect($dsn,$username,$password);

	$uth = $dbh->prepare("CREATE TABLE IF NOT EXISTS Uptime (id int (11) NOT NULL AUTO_INCREMENT, IP tinytext NOT NULL, PORT int (11) NOT NULL, COMMUNITY tinytext NOT NULL, Uptime varchar(255) NOT NULL, Sent int (11) NOT NULL, Lost int (11) NOT NULL, TLost int (11) NOT NULL , PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET= latin1 AUTO_INCREMENT=1;");
	$uth->execute() or die $DBI::errstr; 
	
	$fth = $dbh->prepare("INSERT INTO Uptime (id,IP,PORT,COMMUNITY) SELECT DEVICES.id, DEVICES.IP, DEVICES.PORT, DEVICES.COMMUNITY FROM DEVICES ON DUPLICATE KEY UPDATE Sent=0,Lost=0,Tlost=0");		
	$fth->execute() or die $DBI::errstr;
}

