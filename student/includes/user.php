<?php
session_start();
include("../phpmailer-master/class.phpmailer.php");
 include("../phpmailer-master/class.smtp.php");
 error_reporting(0);
/**
* 
*/
class user extends dbh
{
	

	
	// function __construct(argument)
	// {
	// 	# code...
	// }

	public function applications($firstname,$lastname,$dob,$phoneNo,$admissionNo,$institue,$faculty,$department,$level,$bankName,$accountName,$accountType,$accountNo,$middlename,$email)
	{
		//return 'hey';
		if  ($this->checkapplicant($email)> 0 ) 
		{
			echo '<script type="text/javascript">';
			echo 'setTimeout(function () { swal("Alert!!"," User Already Exist!","error");';
			echo '}, 1000);</script>';
		}
		else
		{
			if (empty($firstname)  || empty($accountNo)) 
			{
				echo '<script type="text/javascript">';
				echo 'setTimeout(function () { swal("Alert!!","All Fields are Required !","error");';
				echo '}, 1000);</script>';
			}
			else
			{
              // else
              // {
              	// if ( (move_uploaded_file($_FILES["passport"]["tmp_name"], $target_file1)) && (move_uploaded_file($_FILES["indigineLetter"]["tmp_name"], $target_file2)) && (move_uploaded_file($_FILES["confirmationLetter"]["tmp_name"], $target_file3)))
              	// {

              		//$application_id = 'API'.substr(md5($firstname.$dob.$email),0);
              		$stmt = "INSERT INTO application_tb(firstname,lastname,middlename,dob,institute,phoneNo,admissionNo,level,faculty,department,email) values('$firstname','$lastname','$middlename','$dob','$institue','$phoneNo','$admissionNo','$level','$faculty','$department','$email')";
              		// $stmt = "INSERT INTO application_tb(firstname,lastname,middlename,dob,phoneNo,email) values('$firstname','$lastname','$middlename','$dob','$phoneNo','$email')";
              		if ($this->connect()->query($stmt)) 
              		{
						$inserts = "INSERT INTO banks(bankName, accountName, accountType, accountNumber) Values('$bankName','$accountName','$accountType','$accountNo')";
						$results = $this->connect()->query($inserts);
						if ($results) {
							echo '<script type="text/javascript">';
							echo 'setTimeout(function () { swal("Success!!","Application Submitted Successfully !","success");';
							echo '}, 1000);</script>';
						}
						else{
							echo '<script type="text/javascript">';
							echo 'setTimeout(function () { swal("error!!","Bank Record Not Upload !","error");';
							echo '}, 1000);</script>';
						}
					}
					else
					{
						echo '<script type="text/javascript">';
							echo 'setTimeout(function () { swal("Alert!!","Error occured Please try again !","error");';
							echo '}, 1000);</script>';
					}
				



              	// }
              	
              // }
			}
		}
		
	}

	public function checkapplicant($email)
	{
		$stmt = "SELECT * FROM application_tb where email = '$email'";
		$result = $this->connect()->query($stmt); 
		$number_rows = $result->num_rows;
		return $number_rows;
	}

	public function sessioncheck($sess)
	{
		if ($sess =='' or empty($sess) or $sess == null) 
		{
			header('location:..\index.php');
		}
		else{
			//return $sess;
		}
	}
	public function emptysession ($set){
		unset($set);
		header('location:..\index.php');
	}

}
// end of class
$object = new user();