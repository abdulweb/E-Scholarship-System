<?php include '..\includes/dbh.php'; ?>
<?php include '..\includes/user.php'; 
    $object->sessioncheck($_SESSION['user']);
   ?>
<?php
$getid = $_GET['id'];
	$object->delete($getid);
?>