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

	public function applications($firstname,$lastname,$dob,$phoneNo,$admissionNo,$institue,$faculty,$department,$level,$bankName,$accountName,$accountType,$accountNo,$middlename)
	{
		//return 'hey';
		if  ($this->checkapplicant($_SESSION['user_id']) > 0 ) 
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
				$target_dir = "uploads/";
	                    $target_file1 = $target_dir . basename($_FILES["passport"]["name"]);
	                    $target_file2 = $target_dir . basename($_FILES["indigineLetter"]["name"]);
	                    $target_file3 = $target_dir . basename($_FILES["confirmationLetter"]["name"]);
	                    $uploadOk = 1;
	                    $imageFileType = pathinfo($target_file1,PATHINFO_EXTENSION);
	                    $indigineLetterFileType = pathinfo($target_file2,PATHINFO_EXTENSION);
	                    $confirmationLetterFileType = pathinfo($target_file3,PATHINFO_EXTENSION);
		                $check = getimagesize($_FILES["passport"]["tmp_name"]);
	                    if($check !== false) 
	                    {
	                        //echo "File is an image - " . $check["mime"] . ".";
	                        $uploadOk = 1;
	                    } 
	                    else {
	                    	echo '<script type="text/javascript">';
							echo 'setTimeout(function () { swal("Error!","Passport is not an image. Please select Image file !","Error");';
							echo '}, 1000);</script>';
	                        $uploadOk = 0;
	                    }
	                    // check passport
	                    if ($_FILES["passport"]["size"] > 5000000) 
		                  {
		                       	echo '<script type="text/javascript">';
								echo 'setTimeout(function () { swal("Alert!!","Sorry, your Passport file is too large. Must not be more than 5MB","error");';
								echo '}, 1000);</script>';
		                      $uploadOk = 0;
		                  }
		                  // check indegineLetter
		                  if ($_FILES["indigineLetter"]["size"] > 5000000) 
	                      {
	                           	echo '<script type="text/javascript">';
								echo 'setTimeout(function () { swal("Alert!!","Sorry, your indigine Letter file is too large. Must not be more than 5MB","error");';
								echo '}, 1000);</script>';
	                          $uploadOk = 0;
	                      }
	                       if ($_FILES["confirmationLetter"]["size"] > 5000000) 
	                      {
	                          	echo '<script type="text/javascript">';
								echo 'setTimeout(function () { swal("Alert!!","Sorry, your Confirmation Letter file is too large. Must not be more than 5MB","error");';
								echo '}, 1000);</script>';
	                          $uploadOk = 0;
	                      }

	                      // Allow certain file formats
	                     if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") 
	                      {
	                           	echo '<script type="text/javascript">';
								echo 'setTimeout(function () { swal("Alert!!","Sorry, only JPG, JPEG, PNG  format is allowed for Passport.","error");';
								echo '}, 1000);</script>';
	                          $uploadOk = 0;
	                      }
	                      // Allow certain file formats for indigine letter
	                      if($indigineLetterFileType != "jpg" && $indigineLetterFileType != "png" && $indigineLetterFileType != "jpeg") 
	                      {
	                           echo '<script type="text/javascript">';
								echo 'setTimeout(function () { swal("Alert!!","Sorry, only JPG, JPEG, PNG  format is allowed for indigine Letter.","error");';
								echo '}, 1000);</script>';
	                          $uploadOk = 0;
	                      }

	                      if($confirmationLetterFileType != "jpg" && $confirmationLetterFileType != "png" && $confirmationLetterFileType != "jpeg") 
	                      {
	                            echo '<script type="text/javascript">';
								echo 'setTimeout(function () { swal("Alert!!","Sorry, only JPG, JPEG, PNG  format is allowed for Confirmation Letter.","error");';
								echo '}, 1000);</script>';
	                          $uploadOk = 0;
	                      }
	                      if ($uploadOk == 0) 
	                      {
	                            echo '<script type="text/javascript">';
								echo 'setTimeout(function () { swal("Alert!!","Sorry, your file was not uploaded. Please retry.","error");';
								echo '}, 1000);</script>';

	                      // if everything is ok, try to upload file
	                      }
		              else
		              {
		              	if ( (move_uploaded_file($_FILES["passport"]["tmp_name"], $target_file1)) && (move_uploaded_file($_FILES["indigineLetter"]["tmp_name"], $target_file2)) && (move_uploaded_file($_FILES["confirmationLetter"]["tmp_name"], $target_file3)))
		              	{

              		$user_id = $_SESSION['user_id'];
              		$stmt = "INSERT INTO application_tb(firstname,lastname,middlename,dob,institute,phoneNo,admissionNo,level,faculty,department,bankName, accountName, accountType, accountNumber,user_id,picture,indigne_letter,confirmation_letter) values('$firstname','$lastname','$middlename','$dob','$institue','$phoneNo','$admissionNo','$level','$faculty','$department','$bankName','$accountName','$accountType','$accountNo','$user_id','$target_file1','$target_file2','$target_file3')";
              		if ($this->connect()->query($stmt)) 
              		{
							echo '<script type="text/javascript">';
							echo 'setTimeout(function () { swal("Success!!","Application Submitted Successfully !","success");';
							echo '}, 1000);</script>';
					}
					else
					{
						echo '<script type="text/javascript">';
							echo 'setTimeout(function () { swal("Alert!!","Error occured Please try again !","error");';
							echo '}, 1000);</script>';
					}
				

              	}
              	
              }
			}
		}
		
	}

	public function checkapplicant($email)
	{
		$stmt = "SELECT * FROM application_tb where user_id = '$email'";
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

	public function getStudentPicture($email)
	{
		$stmt = "SELECT picture FROM application_tb where user_id = '$email'";
		$result = $this->connect()->query($stmt);
		$rows = $result->fetch_assoc();
		return $rows['picture'];
	}

}
// end of class
$object = new user();