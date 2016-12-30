#!/usr/bin/perl

use DBI;
use DBD::mysql;
use Data::Dumper;    
use Cwd qw (abs_path getcwd cwd);
use FindBin qw ($Bin);
use Net::SNMP qw(:snmp snmp_dispatcher :asn1);

@path = split("/",$Bin);
pop(@path);
push(@path,"db.conf");
$dbc = join("/",@path);
require "$dbc";

$dsn = "DBI:mysql:$database:$host:$port";
$dbh = DBI->connect($dsn,$username,$password);
   
$uth = $dbh->prepare("CREATE TABLE IF NOT EXISTS samtraps (fqdn varchar (255) NOT NULL, cur_st int (11) NOT NULL, pre_st int DEFAULT 0, cur_time int NOT NULL, pre_time int DEFAULT 0, PRIMARY KEY (fqdn)) ENGINE=InnoDB DEFAULT CHARSET= latin1;");
$uth->execute() or die $DBI::errstr; 
$vth = $dbh->prepare("CREATE TABLE IF NOT EXISTS sammanager (id int (11) NOT NULL, IP tinytext NOT NULL, PORT int (11) NOT NULL, COMMUNITY tinytext NOT NULL, PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET= latin1");
$vth->execute() or die $DBI::errstr; 

$TRAP_FILE = "/var/www/html/et2536-sako15/assignment3/traps.log";	

open(TRAPFILE, ">> $TRAP_FILE");

while(<STDIN>) 
{
        chomp($_);
	push(@var,$_);
	@var = split(" ",$_);

	if ($var[0] eq ".1.3.6.1.4.1.41717.10.1")
	{
	$fqdn = $var[1];
	}

	if ($var[0] eq ".1.3.6.1.4.1.41717.10.2")
	{
	$cur = $var[1];
	}

	if ($var[0] eq ".1.3.6.1.6.3.18.1.4.0")
	{
	$com = $var[1];
	}

$time = time();

$trap{"$fqdn"} = {	
			fqdn => $fqdn,
			current_status => $cur, 
			current_time => $time, 
			community => $com
		 };
print(TRAPFILE "$_\n");
}
close(TRAPFILE);

$fq = $trap{"$fqdn"}->{fqdn};	
$st = $trap{"$fqdn"}->{current_status}; 
$ct = $trap{"$fqdn"}->{current_time};
$com = $trap{"$fqdn"}->{community}; 

#$fq = "rp1234566";
#$ct = time();
#$st = "3";

$rth = $dbh->prepare("INSERT INTO samtraps (fqdn, cur_st, cur_time) VALUES ('$fq','$st','$ct') ON DUPLICATE KEY UPDATE pre_st = cur_st,pre_time = cur_time,cur_st='$st',cur_time='$ct'");		
$rth->execute() or die $DBI::errstr;

$ath = $dbh->prepare("INSERT IGNORE INTO sammanager (id) VALUES ('1')");		
$ath->execute() or die $DBI::errstr;  

$sth = $dbh->prepare("SELECT * FROM sammanager");
$sth->execute() or die $DBI::errstr;

while(@row = $sth->fetchrow_array())
{
	$ip = $row[1];
	$ports = $row[2];
	$com = $row[3];
	
	$session = Net::SNMP->session(
                           		-hostname      => $ip,
                           		-port          => $ports,
                           		-community     => $com
                           		);                    
$oid  = '1.3.6.1.4.1';

if ($st=='3')
{
	$fth = $dbh->prepare("SELECT * FROM samtraps WHERE fqdn = '$fq'");
	$fth->execute() or die $DBI::errstr;

	while(@row = $fth->fetchrow_array())
	{
	  @send1 = ();
	  $pr = $row[2];
	  $prt = $row[4];

	  push @send1,'1.3.6.1.4.1.41717.20.1',OCTET_STRING,"$fq",'1.3.6.1.4.1.41717.20.2',UNSIGNED32,"$ct",'1.3.6.1.4.1.41717.20.3',INTEGER,"$pr",'1.3.6.1.4.1.41717.20.4',UNSIGNED32,"$prt";           

	}

		$result = $session->trap(
                		-enterprise      => $oid,
                		-agentaddr       => '127.0.0.1',
                		-generictrap     => '6',
				-specifictrap	 => '247',
                 		-varbindlist     => \@send1,
                       		);                    

	if (!defined $result) {
      printf "ERROR: %s.\n", $session->error();
      $session->close();
      exit 1;
   }

}

if ($st=='2')
{
	$fth = $dbh->prepare("SELECT * FROM samtraps WHERE cur_st = 2");
	$fth->execute() or die $DBI::errstr;
	@oid = (1,2,3,4);
	@send2 = ();

	while(@row = $fth->fetchrow_array())
	{
	  $dom = $row[0];
	  $tim = $row[3];
	  $prst = $row[2];
	  $prtim = $row[4];

push @send2,".1.3.6.1.4.1.41717.30.$oid[0]",OCTET_STRING,"$dom",".1.3.6.1.4.1.41717.30.$oid[1]",UNSIGNED32,"$tim",".1.3.6.1.4.1.41717.30.$oid[2]",INTEGER,"$prst",".1.3.6.1.4.1.41717.30.$oid[3]",UNSIGNED32,"$prtim";

	 @oid= map{$_ + 4} @oid;	
	}

		$result = $session->trap(
                		-enterprise      => $oid,
                		-agentaddr       => '127.0.0.1',
                		-generictrap     => '6',
                		-varbindlist     => \@send2,
                       		); 
	if (!defined $result) {
      printf "ERROR: %s.\n", $session->error();
      $session->close();
      exit 1;
   }
}
                   
}                               

