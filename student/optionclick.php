<?php
session_start();
 include('includes/config.php');
 
 //$_SESSION['cor']=$fetch['CorrectAnswer'];
$_SESSION['cor'];
$ans=$_POST['RadioGroup1'];
//echo $ans;
$sqli = mysqli_query($bd,"update testattempt set ans='$ans',correctans='".$_SESSION['cor']."' where quid=".$_SESSION['qno']." and stdid=". $_SESSION['stdid']." and testid=".$_SESSION['testid']."") or die (mysqli_error());
//echo "1";

//mysqli_query($con,"update testattempt set ans='$ans',correctans='".$_SESSION['cor']."' where quid=".$_SESSION['qno']." and stdid=". $_SESSION['stdid']." and testid=".$_SESSION['testid']."") or die (mysqli_error());
 ?>