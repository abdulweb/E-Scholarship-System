<?php
session_start();
include("../phpmailer-master/class.phpmailer.php");
 include("../phpmailer-master/class.smtp.php");
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
                    <a href="delete.php?id='.htmlentities($rows['user_id']).'" class="btn btn-danger btn-sm" onclick="return confirm(\'sure to delete !\');" >Delete</a>
                    </td>
                </tr>';
                
			$counter++;}

			
		}
	}

	public function delete($id){
		$stmt = "DELETE FROM user_tb WHERE id = '$id'";
		$result = $this->connect()->query($stmt);
		if (!$result) {
			$_SESSION['message'] = '<div class ="alert alert-danger"> <strong> Error Occured !!! Please Try Again </strong> </div>';
			header('location:manageAdmin.php');
		}
		else{
			$_SESSION['message'] = '<div class ="alert alert-success"> 
						<strong> Staff Record Deleted
						<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
						</strong> </div>';
			header('location:manageAdmin.php');
		}
	}

	public function getAllclassroom(){
		$stmt = "SELECT * FROM classes";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows >0) {
			$counter = 1;
			while ($rows= $result->fetch_assoc()) {?>
				<option value= "<?=$rows['id'] ?>"> <?=$rows['class_name']?></option>
			<?php
		}
			
		}
	}

	public function getAllclassroomname(){
		$stmt = "SELECT * FROM classes ORDER BY class_name ASC";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows >0) {
			while ($rows= $result->fetch_assoc()) {
				$row_date [] = $rows;
		}
		 return $row_date;
			
		}
	}

	public function insertstudent($studentid,$fname,$other,$classid,$date){
		if (empty($this->checkstudent($studentid,$classid))) 
		{
			$insert = "INSERT INTO students(student_id,student_fname,student_oname,student_class,date_add)Values('$studentid','$fname','$other','$classid','$date')";
			$stmt = $this->connect()->query($insert);
			if (!$stmt) {
				echo '<div class ="alert alert-danger"> <strong> Error Occured !!! Please Try Again </strong> </div>';
			}
			else
			{
				echo '<div class ="alert alert-success"> <strong> New Student Added Successfully  </strong> </div>';
			}

		}
		else{
			echo $this->checkstudent($studentid,$classid);
		}
	}

	public function checkstudent($studentid,$classid){
		$stmt = "SELECT * FROM students where student_class = '$classid' and student_id = '$studentid'";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows; 
		if (($numberrows)> 0) {
			return '<div class ="alert alert-danger"> <strong> Sorry !!! Student  Already Exist  </strong> </div>';
			 
		}
		else{

		}
	}

	public function getclassName($id){
		$stmt =  "SELECT * from classes where id ='$id'";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		$rows = $result->fetch_assoc(); 
		$className = $rows['class_name'];
		//echo $numberrows;
		return $className;
	}

	public function getstudentNumber($id){
		$stmt =  "SELECT * from students where student_class ='$id'";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		return $numberrows;
	}

	
	public function getstudent(){
		$stmt = "SELECT * FROM students";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows >0) {
			$counter = 1;
			while ($rows= $result->fetch_assoc()) {
				echo '<tr>
                    <td>'.$counter.'</td>
                    <td>'.$rows['student_fname']. " ". $rows['student_oname'].'</td>
                    <td>'.$this->getclassName($rows['student_class']).'</td>
                    <td>'. ''.'</td>
                </tr>';
                $counter++;
			}
			
		}
	}

	public function insertSubject($name, $datet)
	{
		if (empty($this->checksubject(($name)))) 
		{
			$upname = ucwords($name);
			$insert = "INSERT INTO subjects(subject_name, date_create) Values('$upname','$datet')";
			$stmt = $this->connect()->query($insert);
			if (!$stmt) {
				echo '<div class ="alert alert-danger"> <strong> Error Occured !!! Please Try Again </strong> </div>';
			}
			else
			{
				echo '<div class ="alert alert-success"> <strong> New Subject Added Successfully </strong> </div>';
			}

		}
		else{
			echo $this->checksubject($name);
		}
		
	}

	public function checksubject($name)
	{
		$upname = ucwords($name);
		$stmt = "SELECT * FROM subjects where subject_name = '$upname'";
		$result = $this->connect()->query($stmt); 
		if (($result->num_rows)> 0) {
			return '<div class ="alert alert-danger"> <strong> Sorry !!! Subject Name Already Exist </strong> </div>';
			 
		}
		else{

		}
	}

	public function getAllSubject()
	{
		$stmt = "SELECT * FROM subjects";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows >0) {
			$counter = 1;
			while ($rows= $result->fetch_assoc()) {
				echo '<tr>
                    <td>'.$counter.'</td>
                    <td>'.$rows['subject_name'].'</td>
                    <td><button class="btn btn-danger">Delete</button></td>
                </tr>';
                $counter++;
			}
			
		}
	}

	public function getsubjectoption()
	{
		$stmt = "SELECT * FROM subjects";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows >0) {
			$counter = 1;
			while ($rows= $result->fetch_assoc()) {?>
				<option value= "<?=$rows['id'] ?>"> <?=$rows['subject_name']?></option>
			<?php
		}
			
		}
	}

	public function getstudentname($classid)
	{
		$stmt = "SELECT * FROM students where student_class = '$classid' ";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		if ($numberrows >0) {
			$counter = 1;
			while ($rows= $result->fetch_assoc()) {
				
                $studentName [] = $rows;
			}
			return $studentName;
			
		}
	}

	public function getAllstudentNumber(){
		$stmt = "SELECT * FROM students ";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		return $numberrows;
	}

	public function getAllclassroomnumber(){
		$stmt = "SELECT * FROM classes ";
		$result = $this->connect()->query($stmt);
		$numberrows = $result->num_rows;
		return $numberrows;
	}

	public function tests($ftest,$stest,$total,$subjectid,$studentid){
		if ($this->checktest($studentid) > 0) {
			$update = "UPDATE tests set first_test ='$ftest',second_test ='$stest',total ='$total' ";
			$update_query = $this->connect()->query($update);
			if ($update) {
				echo '<div class="alert alert-success"> Test Record Update Successfully</div>';
			}
			else
			{
				echo '<div class="alert alert-danger"> Sorry Error Occured!!! Please Retry</div>';
			}
		}
		else
		{
			$stmt = "INSERT INTO tests(first_test,second_test,total,subject_id,student_id) values('$ftest','$stest','$total','$subjectid','$studentid')";
			$result = $this->connect()->query($stmt);
			if (!result) {
				echo '<div class="alert alert-danger"> Sorry Error Occured!!! Please Refill</div>';
			}
			else{
				echo '<div class="alert alert-success"> Test Record add Successfully</div>';
			}
		}
		
	}
	public function checktest($studentid){
		$update_select = "SELECT * FROM tests where student_id ='$studentid'";
		$resu = $this->connect()->query($update_select);
		$numb = $resu->num_rows;
		return $numb;
	}



}
// end of class
$object = new user();