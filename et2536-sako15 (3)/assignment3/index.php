<!DOCTYPE html>
<html>
<head>
<h2 align = "center">Trap Handler</h2>
</head>

<?php
	include "db.php";

	$conn = mysqli_connect($host, $username, $password, $database, $port);

	if (!$conn)
	{
	   die("Connection failed: " . mysqli_connect_error());
	}
	
	mysqli_select_db($conn,"$database");	
?>

<form action="index.php" method="GET">
<fieldset>
<legend>INSERT IP PORT COMMUNITY</legend>
IP<input type="text" name="ip">&ensp;
PORT<input type="text" name="port">&ensp;
COMMUNITY<input type="text" name="community">&ensp;
<input type="submit" name="manager" value="Send"><br>
</fieldset>
</form><br>

<?php
$ip = $_GET['ip'];
$ports = $_GET['port'];
$com = $_GET['community'];


	if(isset($_REQUEST['manager']))  
	{
		$sql = "UPDATE sammanager SET IP='$ip',PORT='$ports',COMMUNITY ='$com' WHERE id=1";
		mysqli_query($conn,$sql);
	}

?>
<table border="1" style = "width: 70%; text-align: center;">
<caption><h3>Upper Manager</h3></caption>
<tr>
<th>IP</th>
<th>PORT</th>
<th>COMMUNITY</th>
</tr>
<?php
$result2 = mysqli_query($conn,"SELECT * FROM sammanager");
       
while($row = mysqli_fetch_array($result2)) 
{
?>
<tr>
<td><?php echo $row["IP"]; ?></td>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; }?></td>
</tr>
</table><br><br><br>

<table border="1" style = "width: 70%; text-align: center;">
<caption><h3>Agents</h3></caption>
<tr>
<th>FQDN</th>
<th>Current Status</th>
<th>Previous Status</th>
<th>Current Time</th>
<th>Previous Time</th>
</tr>

<?php
$result = mysqli_query($conn,"SELECT * FROM samtraps"); 

while($row = mysqli_fetch_array($result)) 
{

?>
<tr>
<td><?php echo $row["fqdn"]; ?></td>
<td><?php echo $row["cur_st"]; ?></td>
<td><?php echo $row["pre_st"]; ?></td>
<td><?php echo $row["cur_time"]; ?></td>
<td><?php echo $row["pre_time"]; }?></td>
</tr>




