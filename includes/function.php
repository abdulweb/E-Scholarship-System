<?php
	include 'dbh.php';
	include 'user.php';

	
		if (isset($_POST['signUpBtn'])) {
			//echo '<script>alert("hey")</script>';
			$email = $_POST['email'];
			$password = $_POST['password'];
			$confirm = $_POST['confirm'];
			$create_date = date('Y-m-d');

			if (empty($email) || empty($password) || empty($confirm)) {
				echo '<script type="text/javascript">';
				echo 'setTimeout(function () { swal("Alert!!","All Fields are Required !","error");';
				echo '}, 1000);</script>';
			}
			else{
				$object->signup($email,$password,$create_date);
			}
		}

?>