<?php include 'includes/dbh.php'; ?>
<?php include 'includes/user.php'; 
    $object->sessioncheck($_SESSION['user']);
   ?>
<?php
	$getid = $_GET['id'];
	echo '<script>alert("hello word")</script>';
	$object->delete($getid);
?>