<!DOCTYPE html>
<html>
<head>
<h2 align = "center">UPTIME</h2>
<meta http-equiv="refresh" content="31"/>
</head>
<body bgcolor="#E6E6FA">
<br><br>
<?php
	include "db.php";

	$conn = mysqli_connect($host, $username, $password, $database, $port);

	if (!$conn)
	{
	   die("Connection failed: " . mysqli_connect_error());
	}
	
	mysqli_select_db($conn,"$database");	

	$result = mysqli_query($conn,"SELECT * FROM Uptime");        
?>
<div>
<table style = "width: 100%; text-align: center;" border=1>
<tr>
<th  style = "text-align: center;">IP</th>
<th  style = "text-align: center;">PORT</th>
<th  style = "text-align: center;">COMMUNITY</th>
<th  style = "text-align: center;">UpTime of device</th>
</tr>

<?php

while($row = mysqli_fetch_array($result)) 
{

if ($row['Lost']==0)
{
?>
<tr><?php $id = $row["id"]; ?>
<td><a href="data.php?var=<?php echo "$id";?>"><?php echo $row["IP"]; ?></td></a>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; ?></td>
<td><?php echo $row["Uptime"]; ?></td>
</tr>
<?php
}

if ($row['Lost']==1)
{
?>
<tr><?php $id = $row["id"]; ?>
<td style = "background-color : #FFEEEE"><a href="data.php?var=<?php echo "$id";?>"><?php echo $row["IP"]; ?></td></a>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; ?></td>
<td><?php echo $row["Uptime"]; ?></td>
</tr>
<?php
}

if ($row['Lost']==2)
{
?>
<tr><?php $id = $row["id"]; ?>
<td style = "background-color : #FFE5E5"><a href="data.php?var=<?php echo "$id";?>"><?php echo $row["IP"]; ?></td></a>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; ?></td>
<td><?php echo $row["Uptime"]; ?></td>
</tr>
<?php
}

if ($row['Lost']==3)
{
?>	
<tr><?php $id = $row["id"]; ?>
<td style = "background-color : #FFDDDD"><a href="data.php?var=<?php echo "$id";?>"><?php echo $row["IP"]; ?></td></a>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; ?></td>
<td><?php echo $row["Uptime"]; ?></td>
</tr>
<?php

}
if ($row['Lost']==4)
{
?>	
<tr><?php $id = $row["id"]; ?>
<td style = "background-color : #FFD5D5"><a href="data.php?var=<?php echo "$id";?>"><?php echo $row["IP"]; ?></td></a>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; ?></td>
<td><?php echo $row["Uptime"]; ?></td>
</tr>
<?php
}

if ($row['Lost']==5)
{
?>
<tr><?php $id = $row["id"]; ?>
<td style = "background-color : #FFCCCC"><a href="data.php?var=<?php echo "$id";?>"><?php echo $row["IP"]; ?></td></a>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; ?></td>
<td><?php echo $row["Uptime"]; ?></td>
</tr>
<?php
}

if ($row['Lost']==6)
{
?>
<tr><?php $id = $row["id"]; ?>
<td style = "background-color : #FFC5C5"><a href="data.php?var=<?php echo "$id";?>"><?php echo $row["IP"]; ?></td></a>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; ?></td>
<td><?php echo $row["Uptime"]; ?></td>
</tr>
<?php
}

if ($row['Lost']==7)
{
?>	
<tr><?php $id = $row["id"]; ?>
<td style = "background-color : #FFBBBB"><a href="data.php?var=<?php echo "$id";?>"><?php echo $row["IP"]; ?></td></a>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; ?></td>
<td><?php echo $row["Uptime"]; ?></td>
</tr>
<?php

}
if ($row['Lost']==8)
{
?>	
<tr><?php $id = $row["id"]; ?>
<td style = "background-color : #FFB5B5"><a href="data.php?var=<?php echo "$id";?>"><?php echo $row["IP"]; ?></td></a>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; ?></td>
<td><?php echo $row["Uptime"]; ?></td>
</tr>
<?php
}
if ($row['Lost']==9)
{
?>
<tr><?php $id = $row["id"]; ?>
<td style = "background-color : #FFAAAA"><a href="data.php?var=<?php echo "$id";?>"><?php echo $row["IP"]; ?></td></a>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; ?></td>
<td><?php echo $row["Uptime"]; ?></td>
</tr>
<?php
}

if ($row['Lost']==10)
{
?>
<tr><?php $id = $row["id"]; ?>
<td style = "background-color : #FFA5A5"><a href="data.php?var=<?php echo "$id";?>"><?php echo $row["IP"]; ?></td></a>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; ?></td>
<td><?php echo $row["Uptime"]; ?></td>
</tr>
<?php
}

if ($row['Lost']==11)
{
?>	
<tr><?php $id = $row["id"]; ?>
<td style = "background-color : #FF9999"><a href="data.php?var=<?php echo "$id";?>"><?php echo $row["IP"]; ?></td></a>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; ?></td>
<td><?php echo $row["Uptime"]; ?></td>
</tr>
<?php

}
if ($row['Lost']==12)
{
?>	
<tr><?php $id = $row["id"]; ?>
<td style = "background-color : #FF9595"><a href="data.php?var=<?php echo "$id";?>"><?php echo $row["IP"]; ?></td></a>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; ?></td>
<td><?php echo $row["Uptime"]; ?></td>
</tr>
<?php
}
if ($row['Lost']==13)
{
?>
<tr><?php $id = $row["id"]; ?>
<td style = "background-color : #FF8888"><a href="data.php?var=<?php echo "$id";?>"><?php echo $row["IP"]; ?></td></a>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; ?></td>
<td><?php echo $row["Uptime"]; ?></td>
</tr>
<?php
}

if ($row['Lost']==14)
{
?>
<tr><?php $id = $row["id"]; ?>
<td style = "background-color : #FF8585"><a href="data.php?var=<?php echo "$id";?>"><?php echo $row["IP"]; ?></td></a>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; ?></td>
<td><?php echo $row["Uptime"]; ?></td>
</tr>
<?php
}

if ($row['Lost']==15)
{
?>	
<tr><?php $id = $row["id"]; ?>
<td style = "background-color : #FF7777"><a href="data.php?var=<?php echo "$id";?>"><?php echo $row["IP"]; ?></td></a>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; ?></td>
<td><?php echo $row["Uptime"]; ?></td>
</tr>
<?php

}
if ($row['Lost']==16)
{
?>	
<tr><?php $id = $row["id"]; ?>
<td style = "background-color : #FF7575"><a href="data.php?var=<?php echo "$id";?>"><?php echo $row["IP"]; ?></td></a>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; ?></td>
<td><?php echo $row["Uptime"]; ?></td>
</tr>
<?php
}

if ($row['Lost']==17)
{
?>
<tr><?php $id = $row["id"]; ?>
<td style = "background-color : #FF6666"><a href="data.php?var=<?php echo "$id";?>"><?php echo $row["IP"]; ?></td></a>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; ?></td>
<td><?php echo $row["Uptime"]; ?></td>
</tr>
<?php
}

if ($row['Lost']==18)
{
?>	
<tr><?php $id = $row["id"]; ?>
<td style = "background-color : #FF6565"><a href="data.php?var=<?php echo "$id";?>"><?php echo $row["IP"]; ?></td></a>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; ?></td>
<td><?php echo $row["Uptime"]; ?></td>
</tr>
<?php

}
if ($row['Lost']==19)
{
?>	
<tr><?php $id = $row["id"]; ?>
<td style = "background-color : #FF5555"><a href="data.php?var=<?php echo "$id";?>"><?php echo $row["IP"]; ?></td></a>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; ?></td>
<td><?php echo $row["Uptime"]; ?></td>
</tr>
<?php
}
if ($row['Lost']==20)
{
?>
<tr><?php $id = $row["id"]; ?>
<td style = "background-color : #FF5050"><a href="data.php?var=<?php echo "$id";?>"><?php echo $row["IP"]; ?></td></a>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; ?></td>
<td><?php echo $row["Uptime"]; ?></td>
</tr>
<?php
}

if ($row['Lost']==21)
{
?>	
<tr><?php $id = $row["id"]; ?>
<td style = "background-color : #FF4545"><a href="data.php?var=<?php echo "$id";?>"><?php echo $row["IP"]; ?></td></a>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; ?></td>
<td><?php echo $row["Uptime"]; ?></td>
</tr>
<?php

}
if ($row['Lost']==22)
{
?>	
<tr><?php $id = $row["id"]; ?>
<td style = "background-color : #FF4040"><a href="data.php?var=<?php echo "$id";?>"><?php echo $row["IP"]; ?></td></a>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; ?></td>
<td><?php echo $row["Uptime"]; ?></td>
</tr>
<?php
}
if ($row['Lost']==23)
{
?>
<tr><?php $id = $row["id"]; ?>
<td style = "background-color : #FF3535"><a href="data.php?var=<?php echo "$id";?>"><?php echo $row["IP"]; ?></td></a>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; ?></td>
<td><?php echo $row["Uptime"]; ?></td>
</tr>
<?php
}

if ($row['Lost']==24)
{
?>	
<tr><?php $id = $row["id"]; ?>
<td style = "background-color : #FF3030"><a href="data.php?var=<?php echo "$id";?>"><?php echo $row["IP"]; ?></td></a>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; ?></td>
<td><?php echo $row["Uptime"]; ?></td>
</tr>
<?php

}
if ($row['Lost']==25)
{
?>	
<tr><?php $id = $row["id"]; ?>
<td style = "background-color : #FF2828"><a href="data.php?var=<?php echo "$id";?>"><?php echo $row["IP"]; ?></td></a>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; ?></td>
<td><?php echo $row["Uptime"]; ?></td>
</tr>
<?php
}
if ($row['Lost']==26)
{
?>
<tr><?php $id = $row["id"]; ?>
<td style = "background-color : #FF2525"><a href="data.php?var=<?php echo "$id";?>"><?php echo $row["IP"]; ?></td></a>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; ?></td>
<td><?php echo $row["Uptime"]; ?></td>
</tr>
<?php
}

if ($row['Lost']==27)
{
?>	
<tr><?php $id = $row["id"]; ?>
<td style = "background-color : #FF2222"><a href="data.php?var=<?php echo "$id";?>"><?php echo $row["IP"]; ?></td></a>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; ?></td>
<td><?php echo $row["Uptime"]; ?></td>
</tr>
<?php

}
if ($row['Lost']==28)
{
?>	
<tr><?php $id = $row["id"]; ?>
<td style = "background-color : #FF1515"><a href="data.php?var=<?php echo "$id";?>"><?php echo $row["IP"]; ?></td></a>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; ?></td>
<td><?php echo $row["Uptime"]; ?></td>
</tr>
<?php
}
if ($row['Lost']==29)
{
?>
<tr><?php $id = $row["id"]; ?>
<td style = "background-color : #FF1010"><a href="data.php?var=<?php echo "$id";?>"><?php echo $row["IP"]; ?></td></a>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; ?></td>
<td><?php echo $row["Uptime"]; ?></td>
</tr>
<?php
}

if ($row['Lost']>=30)
{
?>	
<tr><?php $id = $row["id"]; ?>
<td style = "background-color : #FF0000"><a href="data.php?var=<?php echo "$id";?>"><?php echo $row["IP"]; ?></td></a>
<td><?php echo $row["PORT"]; ?></td>
<td><?php echo $row["COMMUNITY"]; ?></td>
<td><?php echo $row["Uptime"]; ?></td>
</tr>
<?php
}}
?>
</table>
</div>
</body>
</html>
