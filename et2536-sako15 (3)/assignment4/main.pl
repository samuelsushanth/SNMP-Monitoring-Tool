#!/usr/bin/perl

use Net::SNMP qw(snmp_dispatcher);
use DBI;
use Cwd;
require "dbpath.pl";
require "$realpath";

sub uptime 
{	
	$dsn2 = "DBI:mysql:$database:$host:$port";
	$dbh2 = DBI->connect($dsn2,$username,$password);
	
	$sth = $dbh2->prepare("SELECT * FROM Uptime");
	$sth->execute() or die $DBI::errstr;

	while(@row = $sth->fetchrow_array())
	{

	$ip = $row[1];
	$ports = $row[2];
	$com = $row[3];

	$session = Net::SNMP->session(
                           -hostname      => $ip,
                           -port          => $ports,
                           -community     => $com,
			   -nonblocking   => 1,
			   -timeout       => 3,   
       					);
	
	$sysUpTime = '1.3.6.1.2.1.1.3.0';
      	
	$session->get_request(
          -varbindlist => [$sysUpTime],
          -callback    => [\&call, $ip, $ports, $com]
      				);
	}	
	
	snmp_dispatcher(); # Enter the event loop

	sub call
   {
      	 my ($session, $ip, $ports, $com) = @_;

         if (!defined($session->var_bind_list))
	{
		$rth = $dbh->prepare("UPDATE Uptime SET Sent = Sent+1,Lost = Lost+1,TLost= TLost+1 WHERE IP= '$ip' AND PORT = '$ports' AND COMMUNITY = '$com'");		
		$rth->execute() or die $DBI::errstr;		
		printf("%-15s %s : Non-responsive\n", 							
        	$session->hostname, $com);
		$rth->finish();	            
        }

	  else
	{
		my $up = $session->var_bind_list->{$sysUpTime}; 
		$rth2 = $dbh2->prepare("UPDATE Uptime SET Lost=0,Uptime = '$up',Sent = Sent+1 WHERE IP= '$ip' AND PORT = '$ports' AND COMMUNITY = '$com'");		
	 	$rth2->execute() or die $DBI::errstr;		
		printf("%-15s : Uptime is %s \n", 							
        	$session->hostname, $up);
		$rth2->finish();            
        }

   }

}

