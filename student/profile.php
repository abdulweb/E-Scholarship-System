<div class="row">
	<div class="col-md-12">
		<!-- <button class="btn btn-success pull-right m-r-2"><i class="fa fa-user"> </i>Edit Profile</button> -->
		<a href="edit.php?id=<?php echo htmlentities($UserDetails['user_id'])?>" class="btn btn-success  pull-right m-r-2">Edit Profile</a>
	</div>
	
</div>
<div class="row">
	<div class="col-md-4">
	    <?php $pic = $object->getStudentPicture($_SESSION['user_id'])?>
	    <img src="uploads/images (6).jpg" alt="user Image" width="280" height="246" class="img img-circle">
	</div>
	<div class="col-md-8">
	    <h3><?= $UserDetails['firstname']. " ". $UserDetails['lastname'] . " ".$UserDetails['middlename']  ?></h3>
	    <p><span class="font-bold">Admission Number: </span> | <?=$UserDetails['admissionNo']?></p>
	    <p><span class="font-bold"> Date of Birth: </span> | <?=$UserDetails['dob']?></p>
	    <p><span class="font-bold">Mobile Number: </span> | <?=$UserDetails['phoneNo']?></p>
	    <p><span class="font-bold">Gender: </span> |<?=$UserDetails['gender']?></p>
	    <p><span class="font-bold">Religion: </span> |<?=$UserDetails['religion']?></p>
	    <p><span class="font-bold">Marital Status: </span> |<?=$UserDetails['maritalStatus']?></p>
	</div>
</div>
<div class="row" >
<hr>
	<div class="col-md-1"></div>
    <div class="col-md-5" >
    	<h3 class="text-success">Education Information</h3>
    	<p><span class="font-bold">Admission Number: </span> | <?=$UserDetails['admissionNo']?></p>
    	<p><span class="font-bold">Institution Name: </span> | <?=$UserDetails['institute']?></p>
    	<p><span class="font-bold">Level Joined: </span> | <?=$UserDetails['level']?></p>
    	<p><span class="font-bold">Faculty: </span> | <?=$UserDetails['faculty']?></p>
    	<p><span class="font-bold">department: </span> | <?=$UserDetails['department']?></p>

    </div>
    <div class="col-md-6">
    	<h3 class="text-success">Bank Information</h3>
    	<p><span class="font-bold">Bank Name: </span> | <?=$UserDetails['bankName']?></p>
    	<p><span class="font-bold">Account Name: </span> | <?=$UserDetails['accountName']?></p>
    	<p><span class="font-bold">Account Type: </span> | <?=$UserDetails['accountType']?></p>
    	<p><span class="font-bold">Account Number: </span> | <?=$UserDetails['accountNumber']?></p>
    </div>
</div>
