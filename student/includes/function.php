<?php
	if (isset($_POST['submit button'])) {
		// step one
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$middlename = $_POST['middlename'];
		$dob = $_POST['dob'];
		$phoneNo = $_POST['phoneNo'];
		$gender = $_POST['gender'];
		$maritalStatus = $_POST['maritalStatus'];
		$religion = $_POST['religion'];
		$lga_id = $_POST['lga_id'];
		$email = $_POST['email'];

		//step two Institution info
		$admissionNo = $_POST['admissionNo'];
		$institue = $_POST['institue'];
		$faculty = $_POST['faculty'];
		$department = $_POST['department'];
		$level = $_POST['level'];

		//step three Bank Info
		$bankName = $_POST['bankName'];
		$accountName = $_POST['accountName'];
		$accountType = $_POST['accountType'];
		$accountNo = $_POST['accountNo'];

		$object->applications($firstname,$lastname,$dob,$phoneNo,$admissionNo,$institue,$faculty,$department,$level,$bankName,$accountName,$accountType,$accountNo,$middlename,$lga_id,$gender,$religion,$maritalStatus,$email);
	}


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
	                    	echo '<script type="text/javascript">';
							echo 'setTimeout(function () { swal("Error!","Passport is not an image. Please select Image file !","Error");';
							echo '}, 1000);</script>';
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


?>