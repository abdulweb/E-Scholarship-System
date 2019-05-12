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
                    <a href="delete.php?id='.htmlentities($rows['id']).'" class="btn btn-danger btn-sm" onclick="return confirm(\'sure to delete !\');" >Delete</a>
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
                    <a href="delete.php?id='.htmlentities($rows['id']).'" onclick="return confirm(\'sure to delete !\');" ><i class="fa fa-trash"></i></a>
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
 




}
// end of class
$object = new user();