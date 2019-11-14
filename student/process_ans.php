<?php 
session_start();
include('includes/config.php');
 $qno=$_GET['qno'];
//$sql=mysql_query("insert into testattempt(stdid,testid) values('1','121')") or die (mysql_error());
//$ans=$_POST['correct'];
//$cor=$_POST['RadioGroup1'];
 //Testing something cool

//$sql=mysqli_query($bd,"select usid,testid from testattempt where quid='$qno' and usid=".$_SESSION['stdid']."");

 $sql=mysqli_query($bd,"select stdid,testid from testattempt where quid='$qno' and stdid=".$_SESSION['stdid']."");
$numrows=mysqli_num_rows($sql);
$row=mysqli_fetch_assoc($sql);
if ($numrows>0){
	
	}

else {
 //$_SESSION['qno']=$qno;

//mysqli_query($bd,"Insert into testattempt(usid,testid,quid) values(".$_SESSION['stdid'].",".$_SESSION['testid'].",'$qno')") or die (mysqli_error()); 
	mysqli_query($bd,"Insert into testattempt(stdid,testid,quid) values(".$_SESSION['stdid'].",".$_SESSION['testid'].",'$qno')") or die (mysqli_error());

}
 ?>