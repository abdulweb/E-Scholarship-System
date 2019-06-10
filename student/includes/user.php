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

	public function applications()
	{
		if (empty($firstname) || empty($lastname) || empty($dob) || empty($phoneNo) || empty($admissionNo) || empty($institue) || empty($faculty) || empty($department) || empty($level) || empty($bankName) || empty($accountName) || empty($accountType) || empty($accountNo)) {
			$errorMesg = '<div class="alert alert-danger">All field is Required</div>';
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
                    if($check !== false) {
                        //echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } 
                    else {
                        $msg = "Passport is not an image. Please select Image file";
                        $message =   '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <i class="mdi mdi-block-helper"></i><strong>Oh shit!!</strong>'.$msg.' 
                                        </div>';
                        $uploadOk = 0;
                    }
                    // check passport
                    if ($_FILES["passport"]["size"] > 5000000) 
	                  {
	                      $msg = "Sorry, your file is too large. Must not be more than 5MB";
	                      $message =   '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
	                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                                <i class="mdi mdi-block-helper"></i><strong>Attension!!</strong>'.$msg.' 
	                                </div>';
	                      $uploadOk = 0;
	                  }
	                  // check indegineLetter
	                  if ($_FILES["indigineLetter"]["size"] > 5000000) 
                      {
                          $msg = "Sorry, your file is too large. Must not be more than 5MB";
                          $message =   '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <i class="mdi mdi-block-helper"></i><strong>Attension!!</strong>'.$msg.' 
                                    </div>';
                          $uploadOk = 0;
                      }
                       if ($_FILES["confirmationLetter"]["size"] > 5000000) 
                      {
                          $msg = "Sorry, your file is too large. Must not be more than 5MB";
                          $message =   '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <i class="mdi mdi-block-helper"></i><strong>Attension!!</strong>'.$msg.' 
                                    </div>';
                          $uploadOk = 0;
                      }

                      // Allow certain file formats
                     if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") 
                      {
                          $msg =  " Sorry, only JPG, JPEG, PNG  format is allowed for Passport.";
                          $message =   '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <i class="mdi mdi-block-helper"></i><strong>Attension!!</strong>'.$msg.' 
                                    </div>';
                          $uploadOk = 0;
                      }
                      // Allow certain file formats for indigine letter
                      if($indigineLetterFileType != "jpg" && $indigineLetterFileType != "png" && $indigineLetterFileType != "jpeg") 
                      {
                          $msg =  " Sorry, only JPG, JPEG, PNG  format is allowed for indigine Letter.";
                          $message =   '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <i class="mdi mdi-block-helper"></i><strong>Attension!!</strong>'.$msg.' 
                                    </div>';
                          $uploadOk = 0;
                      }

                      if($confirmationLetterFileType != "jpg" && $confirmationLetterFileType != "png" && $confirmationLetterFileType != "jpeg") 
                      {
                          $msg =  " Sorry, only JPG, JPEG, PNG  format is allowed for Confirmation Letter.";
                          $message =   '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <i class="mdi mdi-block-helper"></i><strong>Attension!!</strong>'.$msg.' 
                                    </div>';
                          $uploadOk = 0;
                      }
                      if ($uploadOk == 0) 
                      {
                          $msg =  "Sorry, your file was not uploaded. Please retry";
                          $message =   '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <i class="mdi mdi-block-helper"></i><strong>Attension!!</strong>'.$msg.' 
                                    </div>';

                      // if everything is ok, try to upload file
                      }
                      else
                      {
                      	if ( (move_uploaded_file($_FILES["passport"]["tmp_name"], $target_file1)) && (move_uploaded_file($_FILES["indigineLetter"]["tmp_name"], $target_file2) && (move_uploaded_file($_FILES["confirmationLetter"]["tmp_name"], $target_file3))
                      	{
                      		$stmt = "INSERT INTO application_tb(firstname,lastname,middlename,dob,institute,lga_id,phoneNo,admissionNo,gender,religion,maritalStatus,level,application_id,picture,indigne_letter,confirmation_letter,faculty,department) values('$firstname','$lastname','$middlename','$dob','$institue','$lga_id','$phoneNo','$admissionNo','$gender','$religion','$maritalStatus','$level','$application_id','$target_file1','$target_file2','$target_file3','$faculty','$department')";
                      		if ($this->connect()->query($stmt)) 
                      		{
								$inserts = "INSERT INTO banks(bankName, accountName, accountType, accountNumber,application_id) Values('$bankName','$accountName','$accountType',$accountNo')";
							}
                      	}
                      	
                      }
		}
	}

		public function save_applicant(){
			if (empty($this->checkapplicant($email,$admissionNo))) 
			{
				


				$insert = "INSERT INTO application_tb(firstname, lastname, middlename, dob,institute,lga_id,phoneNo,admissionNo,gender,religion,maritalStatus,level,application_id,document_id,) Values('$email','$hash_phone','$phone','staff','$date')";
				$stmt = $this->connect()->query($insert);
				if (!$stmt) {
					echo '<div class ="alert alert-danger"> <strong> Error Occured !!! Please Try Again </strong> </div>';
				}
				else
				{
					echo '<div class ="alert alert-success"> 
						<strong> New Admin Staff Added 
						<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
						</strong> </div>';
				}
			}
			else{
				echo $this->checkapplicant($email);
			}
		}

		public function checkapplicant($email,$admissionNo)
		{
			$stmt = "SELECT * FROM application_tb where email = '$email' || admissionNo = '$admissionNo'";
			$result = $this->connect()->query($stmt); 
			if (($result->num_rows)> 0) {
				return '<div class ="alert alert-danger"> <strong> Sorry !!! Admin Staff Already Exist 
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				</strong> </div>';
				 
			}
			else{

			}
		}

}
// end of class
$object = new user();