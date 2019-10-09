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

	public function checkAccount($user_id){

		$result =  $this->connect()->query("SELECT * from application_tb where user_id = '$user_id'");
		if ($result) {
			$num_rows = $result->num_rows;
			 if($num_rows > 0){
			 	return 1;
			 }
			 else{
			 	return 0;
			 }
		}
		else
			return 0;
		
	}
	public function getUser($user_id){
		$stmt = "SELECT * FROM application_tb where user_id = '$user_id'";
		$result = $this->connect()->query($stmt); 
		$number_rows = $result->num_rows;
		$data = $result->fetch_assoc();
		return $data;
	}

	public function update($firstname,$lastname,$dob,$phoneNo,$gender,$religion,$maritalStatus,$admissionNo,$institue,$faculty,$department,$level,$bankName,					$accountName,$accountType,$accountNo,$middlename,$id)
	{
			$stmt = "UPDATE application_tb set firstname = '$firstname', lastname = '$lastname', middlename = '$middlename', dob = '$dob',  
			phoneNo = '$phoneNo',  admissionNo = '$admissionNo', 
			institute = '$institue', faculty = '$faculty', department = '$department', level = '$level', bankName = '$bankName', 
			accountName = '$accountName', accountType = '$accountType', accountNumber = '$accountNo'  where application_id = '$id'";

			// $stmt = "UPDATE application_tb SET firstname = '$firstname', lastname = '$lastname', middlename = '$middlename', dob = '$dob', phoneNo = '$phoneNo', gender = '$gender', religion = '$religion', maritalStatus = '$maritalStatus', admissionNo = '$admissionNo', institute = '$institue', faculty = '$faculty', department = '$department', level = '$level', bankName = '$bankName', accountName = '$accountName', accountType = '$accountType', accountNumber = '$accountNo' WHERE user_id = '$id'";
			if ($this->connect()->query($stmt)) 
          		{
						echo '<script type="text/javascript">';
						echo 'setTimeout(function () { swal("Success!!","Profile Updated Successfully !","success");';
						echo '}, 1000);</script>';
				}
				else
				{
					echo '<script type="text/javascript">';
						echo 'setTimeout(function () { swal("Alert!!","Error occured Please try again !","error");';
						echo '}, 1000);</script>';
				}

	}

	public function checkBioData($user_id)
	{
		$stmt = "SELECT * FROM application_tb where user_id = '$user_id'";
		$result = $this->connect()->query($stmt);
		return $result->num_rows;
	}

	public function getTestQuestion($user_id)
	{
		// $result = $this->connect()->query("SELECT lga_id FROM application_tb where user_id = '$user_id'")->fetch_assoc();
		// print_r($result);

		$stmt = "SELECT lga_id FROM application_tb where user_id = '$user_id'";
		$result = $this->connect()->query($stmt);
		$rows = $result->fetch_assoc();
		$lga_value = $rows['lga_id'];

		$select = $this->connect()->query("SELECT * FROM question_tb where lga_id = '$lga_value'");
		$numberrows = $select->num_rows;
		if ($numberrows > 0) {
			$counter = 1;
			while ($rows= $select->fetch_assoc()) {
				$data[] = $rows;
			}
			// return $data;
			$arr = $arr_history = $data;

			$new_data = [];

			for ( $i = 0; $i < 3; $i++ )
			{
				// If the history array is empty, re-populate it.
				  if (empty($arr_history) )
				    $arr_history = $arr;

				  // Randomize the array.
				  array_rand($arr_history);

				  // Select the last value from the array.
				  $selected = array_pop($arr_history);

				  array_push($new_data, $selected);

				  //$new_data[] = $selected;
			}
			return $new_data;

			
		}
		else{
			return 'No question yet Please check back Later';
		}
		
	}

	public function getLgaName($lga_id)
	{
		$stmt = "SELECT * FROM lga where lga_id = '$lga_id'";
		$result = $this->connect()->query($stmt);
		$rows = $result->fetch_assoc();
		return $rows['name'];
	}

	public function allLga()
	{
		$stmt = "SELECT * FROM lga";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows >0) {
			echo '<select class="form-control" name="lgaID" required>';
			echo '<option class="form-control"  value="">Select Local Government</option>';
			while ($rows = $result->fetch_assoc()) {
				echo '<option class="form-control"  value="'.$rows['lga_id'].'">'.$rows['name'].'</option>';
			}
			echo '</select>';
		}
	}

	public function lgaQuestion($id)
	{
		$stmt = "SELECT * FROM question_tb where lga_id = '$id' ";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows >0) {
			$counter = 1;
			while ($rows= $result->fetch_assoc()) {
				$data[] = $rows;
			}
			return $data;

			
		}

	}

	// public function breakTest(){
	// 	$question_answered = [];
	// 	array_push($question_answered, var)
	// }

	public function storeTest($question_answered)
	{
		$questionID = $question_answered[1];
		$ddate = date('Y-m-d');
		$correctAnswer = $question_answered[5];
		$stmt = "INSERT INTO application_test(question_id,selected_answer,test_id,ddate) values('$questionID','$correctAnswer','2','$ddate')";
		$result = $this->connect()->query($stmt);
		if ($result) {
			return 'Test submitted';
		}
		else
		{
			return 'error occure';
		}
	}

}
// end of class
$object = new user();