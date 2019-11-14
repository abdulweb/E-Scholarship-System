
<?php
session_start();
include_once('admin/Conn.php');

?>
<?php
$qry=mysqli_query($con,"select * from test where name='Sample'");
$numrows=mysqli_num_rows($qry);
if ($numrows>0){
	$row=mysqli_fetch_assoc($qry);
	
	$sql2=mysqli_query($con,"update testattempt set time=".$row['time']."-1 where stdid=".$_SESSION['stdid']."") or die (mysqli_error());
	
	$init=$row['time'];
	$minute=floor(($init/60)%60);
	$sec=$init%60;
	echo $minute .'Minute';
	echo $sec.' Seconds';
	}


?>
