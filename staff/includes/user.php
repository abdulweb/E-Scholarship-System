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


	public function login($username, $password)
	{
		if($username == 'admin@zam.net' && $password == 'pass3word')
		{
			$_SESSION['user'] = $username;
			$_SESSION['usertype'] = 'superAdmin';
			$error = 0;
			header('location:admin/home.php');
		}
		else
		{
			$sql = "SELECT * FROM user_tb where email = '$username' AND password = '$password'";
			$result = $this->connect()->query($sql);
			$numberrows = $result->num_rows;
			if ($numberrows > 0) 
			{
				$rows= $result->fetch_assoc();
				$userType = $rows['usertype'];
				if($userType == 'staff')
				{
					$_SESSION['user'] = $username;
					$_SESSION['usertype'] = $userType;
					$error = 0;
					header('location:staff/home.php');
				}
				elseif($userType == 'student')
				{
					$_SESSION['user'] = $username;
					$_SESSION['usertype'] = $userType;
					$error = 0;
					header('location:student/home.php');
				}
				else{
					$error = 1;
					$oldmail = $username;
					//return $oldmail;
					echo  $this->messages($error);	
				}
				
			}
			else{
				$error = 1;
				$oldmail = $username;
				//return $oldmail;
				echo  $this->messages($error);	
			}
			
		}
		
	}

	public function messages($message)
	{
		if ($message == 1) {
			return '<div class ="alert alert-danger"> Wrong username and password </div>';
		}
		if($message == 2)
		{
			return '<div class ="alert alert-danger"> Attension!!! Unthorize user </div>';
		}
		// else{
		// 	return 'success';
		// }
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

	public function insertAdminStaff($email, $phone)
	{
		if (empty($this->checkAdminStaff($email))) 
		{
			$date = date('Y-m-d');
			$hash_phone = substr(md5($phone), 0,8) ;
			$Subject = 'Zamfara Schorlaship Board';
			$Mssg = 'Your Login Detail is as follows  username : ' . $email . ' Password : ' . $hash_phone;
			$mail = new PHPMailer();

            $mail->IsSMTP();
            $mail->SMTPAuth   = true;                  // enable SMTP authentication
            $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
            $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
            $mail->Port       = 465; //or 587

            $mail->Username   = "binraheem01@gmail.com";  // GMAIL username
            $mail->Password   = "babatunde";            // GMAIL password
            $mail ->SetFrom('Zamfara Schorlaship Board');

            $mail->From     = $email;
            $mail->FromName   = "no-reply";
            $mail->Subject    = $Subject;
            $mail->Body    = $Mssg; //Text Body
            $mail->WordWrap   = 50; // set word wrap
            $mail ->AddAddress($email);
            // $mail->AddAttachment('images/'.$Uname.'.pdf');
            if(!$mail->Send())
            {
               echo '<div class ="alert alert-danger"> <strong> Error Occured !!! Message not Send. Please connect to internet </strong> </div>';
               echo "Mailer Error: " . $mail->ErrorInfo;
               exit;
            }
            else
            {

				$insert = "INSERT INTO user_tb(email, password, phone, usertype,date_create) Values('$email','$hash_phone','$phone','staff','$date')";
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


		}
		else{
			echo $this->checkAdminStaff($email);
		}
		
	}

	public function checkAdminStaff($email){
		$stmt = "SELECT * FROM user_tb where email = '$email'";
		$result = $this->connect()->query($stmt); 
		if (($result->num_rows)> 0) {
			return '<div class ="alert alert-danger"> <strong> Sorry !!! Admin Staff Already Exist 
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			</strong> </div>';
			 
		}
		else{

		}
	}

	public function getAdminStaff(){
		$stmt = "SELECT * FROM user_tb where usertype ='staff' ORDER BY email ASC";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows >0) {
			$counter = 1;
			while ($rows= $result->fetch_assoc()) {
				echo '<tr>
                    <td>'.$counter.'</td>
                    <td>'.$rows['email'].'</td>
                    <td>'.$rows['phone'].'</td>
                    <td>'.$rows['date_create'].'</td>
                    <td>
                    <a href="" class="btn btn-info btn-sm">View</a>
                    <a href="delete.php?id='.htmlentities($rows['id']).'" class="btn btn-danger btn-sm" onclick="return confirm(\'sure to delete !\');" >Delete</a>
                    </td>
                </tr>';
                
			$counter++;}

			
		}
	}

	public function delete($id){
		$stmt = "DELETE FROM lga WHERE lga_id = '$id'";
		$result = $this->connect()->query($stmt);
		if (!$result) {
			$_SESSION['message'] = '<div class ="alert alert-danger"> <strong> Error Occured !!! Please Try Again </strong> </div>';
			header('location:manageLga.php');
		}
		else{
			$_SESSION['message'] = '<div class ="alert alert-success"> 
						<strong> Lga Record Deleted
						<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
						</strong> </div>';
			header('location:manageLga.php');
		}
	}

	public function insertLga($name)
	{
		if (empty($this->checkLga($name))) 
		{
			$date = date('Y-m-d');
            
			$insert = "INSERT INTO lga(name,date_create) Values('$name','$date')";
			$stmt = $this->connect()->query($insert);
			if (!$stmt) {
				echo '<div class ="alert alert-danger"> <strong> Error Occured !!! Please Try Again </strong> </div>';
			}
			else
			{
				echo '<div class ="alert alert-success"> 
					<strong> New Lga Added Successfully
					<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
					</strong> </div>';

			}


		}
		else{
			echo $this->checkLga($name);
		}
		
	}

	public function checkLga($name){
		$stmt = "SELECT * FROM lga where name = '$name'";
		$result = $this->connect()->query($stmt); 
		if (($result->num_rows)> 0) {
			return '<div class ="alert alert-danger"> <strong> Sorry !!! Lga Already Exist 
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			</strong> </div>';
			 
		}
		else{

		}
	}

	public function getLga(){
		$stmt = "SELECT * FROM lga ORDER BY name ASC";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows >0) {
			$counter = 1;
			while ($rows= $result->fetch_assoc()) {
				echo '<tr>
                    <td>'.$counter.'</td>
                    <td id="name'.$rows['id'].'">'.$rows['name'].'</td>
                    <td>'.$rows['date_create'].'</td>
                    <td>
                    <a href="#" onclick ="edit_row('.$rows['id'].')" id="edit_btn'.$rows['id'].'"> <i class="fa fa-pencil"></i></a>
                    <a href="" id="save_btn'.$rows['id'].'" class="save_btn" onclick ="save_row('.$rows['id'].')"> <i class="fa fa-save"></i></a>
                    <a href="delete.php?id='.htmlentities($rows['lga_id']).'" onclick="return confirm(\'sure to delete !\');" ><i class="fa fa-trash"></i></a>
                    </td>
                </tr>';
                
			$counter++;}

			
		}
	}

	public function update_row($name,$id){

	 $stmt = "UPDATE lga set name='$name' where id='$id'";
	 $result = $this->connect()->query($stmt);
	 if($result)
	 {
	 	echo "success";
	 }
	 else{
	 	echo '<script>alert("Please Try Agin. Error Occured")</script>';
	 }
	 	
	 exit();

	}

	public function lga()
	{
		$stmt = "SELECT * FROM lga";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows >0) {
			while ($rows = $result->fetch_assoc()) {
				$datas[] = $rows;
			}
			return $datas;
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
		else
			echo '<p class="text-danger text-center">No question add for this Local Government</p>';

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
	public function storeQuestion($question,$option1,$option2,$option3,$option4,$correctAns,$lgaID)
	{
		$stmt = "INSERT into question_tb(question,option1,option2,option3,option4,correctAnswer,lga_id) Values('$question','$option1','$option2','$option3','$option4','$correctAns','$lgaID')";
		$result = $this->connect()->query($stmt);
		if ($result) {
			echo "<script>alert('Question Add Successfully')</script>";
		}
		else
			echo "<script>alert('Error Occured')</script>";
	}

	public function storeTest($testname,$start_date,$end_date,$mark,$release_result)
	{
		
		if (empty($testname) || empty($start_date) || empty($end_date) || empty($release_result) || empty($mark)) 
		{
				$errorMessage = 'All field is requried';
		}

		else{
			$currentYear = date('Y');
			$newTestName = strtoupper($testname);
			$checkstart = strtotime($start_date);
			$checkend = strtotime($end_date);
			if ($checkstart > $checkend) {
				echo '<div class ="alert alert-danger"> <strong> Start Date can Not Be Greater than End Date 
						<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
						</strong> </div>';
			}
			else{
				$stmt = "SELECT * FROM test_tb where year = '$currentYear'";
				$result = $this->connect()->query($stmt);
				if ($result->num_rows > 0 ) {
					echo '<div class ="alert alert-danger"> <strong> Test Has be created for this year 
						<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
						</strong> </div>';
				}
				else{
					$stmt = "INSERT INTO test_tb(testName,startDate,endDate,mark,releaseResult,year)values('$newTestName','$start_date','$end_date','$mark','$release_result','$currentYear')";
					$result = $this->connect()->query($stmt);
					if ($result) {
						echo '<div class ="alert alert-success"> 
							<strong> New Test Create Successfully
							<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
							</strong> </div>';
					}
					else
						echo '<div class ="alert alert-danger"> <strong> Sorry Error Ocurr 
						<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
						</strong> </div>';
				}
			}
			
		}
	}

	public function getStoreTest()
	{
		$stmt = "SELECT * FROM test_tb ";
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
	public function checkStatus($id)
	{
		if ($id == 0) 
		{
			return 'Yes';
		}
		else
			return 'No';
	}
	
 
	public function getApplicantResult()
	{
		$ddate = date('Y');
		$stmt = "SELECT * FROM applicant_test where ddate = '$ddate' ";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows >0) 
		{
				$counter = 1;
				while ($rows= $result->fetch_assoc()) {
					$data[] = $rows;
				}
				return $data;
		}
	}
	public function getApplicantAll()
	{
		$ddate = date('Y');
		$stmt = "SELECT DISTINCT ddate, user_id from applicant_test ";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows >0) 
		{
				$counter = 1;
				while ($rows= $result->fetch_assoc()) {
					$data[] = $rows;
				}
				return $data;
		}
	}

	public function userEmail($user_id)
	{
		$stmt = "SELECT * FROM application_tb where user_id = '$user_id'";
		$result = $this->connect()->query($stmt);
		$rows = $result->fetch_assoc();
		$user_id = $rows['user_id'];
		$stmt = "SELECT * FROM user_tb where user_id = '$user_id'";
		$result = $this->connect()->query($stmt);
		$rows = $result->fetch_assoc();
		return $rows['email'];
	}

	public function getLgaName($user_id)
	{
		$stmt = "SELECT * FROM application_tb where user_id = '$user_id'";
		$result = $this->connect()->query($stmt);
		$rows = $result->fetch_assoc();
		$lga_id = $rows['lga_id'];
		$stmt = "SELECT * FROM lga where lga_id = '$lga_id'";
		$result = $this->connect()->query($stmt);
		$rows = $result->fetch_assoc();
		return $rows['name'];
	}
	public function calculateTest($questioID)
	{
		$stmt = "SELECT * FROM question_tb where question_id = '$questioID'";
		$result = $this->connect()->query($stmt);
		$rows = $result->fetch_assoc();
		$correctAnswers = $rows['correctAnswer'];
		return $correctAnswers;


	}
	public function eachApplicantResult($user_id)
	{
		$ddate = date('Y');
		$sum = 0;
		$stmt = "SELECT * FROM applicant_test where ddate = '$ddate' and user_id = '$user_id'";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows >0) 
		{
				$counter = 1;
				while ($rows= $result->fetch_assoc()) {
					if ($this->calculateTest($rows['question_id']) == $rows['selected_answer']) {
						$sum = $sum + 1;
					}
					$data[] = $rows;
				}
				return ($sum / 0.1);
		}
	}

	public function getApplicant($user_id)
	{
		$stmt = "SELECT * FROM application_tb where user_id = '$user_id'";
		$result = $this->connect()->query($stmt);
		$rows = $result->fetch_assoc();
		$firstname = $rows['firstname'];
		$lastname = $rows['lastname'];
		$middlename = $rows['middlename'];
		$name = $firstname . " " . $middlename . " ". "lastname";
		return $name;
	}

	public function applicantStatus($user_id)
	{
		$currentYear = date('Y');
		$stmt = "SELECT * FROM shortlist where user_id = '$user_id' and ddate = $currentYear";
		$result = $this->connect()->query($stmt);
		$rows = $result->fetch_assoc();
		$status = $rows['status'];
		return $status;
	}

	public function applicantDetails($user_id)
	{
		$ddate = date('Y');
		$stmt = "SELECT * from application_tb where user_id = '$user_id' ";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows >0) 
		{
				$counter = 1;
				while ($rows= $result->fetch_assoc()) {
					$data[] = $rows;
				}
				return $data;
		}
	}

	public function shortAplicant($user_id,$status)
	{
		if (empty($this->checkShortlist($user_id))) {
			$currentYear = date('Y');
			$stmt = "INSERT into shortlist(user_id,status,ddate) Values('$user_id','$status','$currentYear')";
			$result = $this->connect()->query($stmt);
				if ($result) {
					echo '<div class="alert alert-success">shortlisted Successfully</div>';
				}
				else{
					echo '<div class="alert alert-danger">shortlisted UnSuccessfully</div>';
				}
			}

		else
		{
			echo $this->checkShortlist($user_id);
		}
	}

	public function rejectApplicant($user_id, $status)
	{
		$stmt = "UPDATE shortlist set status = '$status' where user_id = '$user_id'";
		$result = $this->connect()->query($stmt);
		if ($result) 
		{
			echo '<div class="alert alert-success">Applicant Rejected Successfully</div>';
		}
		else{
			echo '<div class="alert alert-danger">Error Try again/div>';
			}
	}
		

	public function checkShortlist($user_id){
		$stmt = "SELECT * FROM shortlist where user_id = '$user_id'";
		$result = $this->connect()->query($stmt);
		$rows = $result->fetch_assoc(); 
		if (($result->num_rows)> 0) {
			return '<div class ="alert alert-danger"> <strong> Applicant has Already shortlisted 
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			</strong> </div>';
			 
		}
	}

	public function unshortlisted()
	{
		$stmt = "SELECT * from application_tb ";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows >0) 
		{
			$counter = 1;
			while ($rows= $result->fetch_assoc()) {

				$id = $rows['user_id'];
				$stmtx = "SELECT DISTINCT user_id from applicant_test where user_id = '$id' ";
				$results = $this->connect()->query($stmtx);
				$numberrow = $results->num_rows;
				if ($numberrow > 0) {
					
				}
				else{
					$data[] = $rows['user_id'];
				}

				// $data[] = $rows;
			}

			return $data;
		


	}
}



}
// end of class
$object = new user();