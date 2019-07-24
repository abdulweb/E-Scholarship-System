<?php include 'includes/dbh.php'; ?>
<?php include 'includes/user.php'; 
     // include 'includes/function.php';
    $object->sessioncheck($_SESSION['user']);
 ?> 
<?php
    include 'headlink.php'; 
    include 'topbar.php';
    include 'sidebar.php';
    $get = $_GET['id'];
    $userDetail = $object->getUser($get);
?>

<body class="theme-red">
    
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb breadcrumb-col-teal">
                    <li><a href="index.php;"><i class="material-icons">home</i> Home</a></li>
                    <li><a href="application.php"><i class="material-icons">layers</i> Account</a></li>
                    <li class="active"><i class="material-icons">archive</i> Application</li>
                </ol>
            </div>
            
            <!-- Advanced Form Example With Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="text-uppercase"> scholarship Application Form</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <?php
                            if (isset($_POST['submit_button'])) {
                            // step one
                            // echo "<script>alert('clicked')</script>";
                            $firstname = $_POST['firstname'];
                            $lastname = $_POST['lastname'];
                            $middlename = $_POST['middlename'];
                            $dob = $_POST['dob'];
                            $phoneNo = $_POST['phoneNo'];
                            $gender = $_POST['gender'];
                            $maritalStatus = $_POST['maritalStatus'];
                            $religion = $_POST['religion'];
                            $lga_id = $_POST['lga_id'];
                            $application_id = $_POST['applicationID'];

                            //step two Institution info
                            $admissionNo = $_POST['admissionNo'];
                            $institue = $_POST['institutionName'];
                            $faculty = $_POST['faculty'];
                            $department = $_POST['department'];
                            $level = $_POST['level'];

                            //step three Bank Info
                            $bankName = $_POST['bankName'];
                            $accountName = $_POST['accountName'];
                            $accountType = $_POST['accountType'];
                            $accountNo = $_POST['accountNumber'];

                            $object->update($firstname,$lastname,$dob,$phoneNo,$gender,$religion,$maritalStatus,$admissionNo,$institue,$faculty,$department,$level,$bankName,$accountName,$accountType,$accountNo,$middlename,$application_id);
                        }
                        ?>
                        
                        <div class="body">
                            <form id="wizard_with_validation" method="POST" action="edit.php">
                                <h3>Personal Information</h3>
                                <fieldset>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="firstname" value="<?=$userDetail['firstname']?>" required>
                                            <label class="form-label">FirstName <span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="lastname" value="<?=$userDetail['lastname']?>" required>
                                            <label class="form-label">LastName <span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="middlename" value="<?=$userDetail['middlename']?>">
                                            <label class="form-label">MiddleName </label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="date" class="form-control" name="dob" value="<?=$userDetail['dob']?>" required>
                                            <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" class="form-control" name="phoneNo" value="<?=$userDetail['phoneNo']?>" required>
                                            <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                            <select class="form-control  show-tick" name="gender" required>
                                                <option> Please Gender </option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                    </div>

                                    <div class="form-group form-float">
                                        <select class="form-control show-tick" name="maritalStatus" required>
                                            <option >-- Please Marital Status --</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                             <option value="divorce">divorce</option>
                                        </select>
                                    </div>

                                    <div class="form-group form-float">
                                        <select class="form-control show-tick" name="religion" required>
                                            <option >-- Please Religion --</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Christain">Christain</option>
                                             <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    
                                </fieldset>

                                <h3>Institution Information</h3>
                                <fieldset>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="admissionNo" class="form-control" value="<?=$userDetail['admissionNo']?>" required>
                                            <label class="form-label">Admission Number <span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                     <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="institutionName" class="form-control" value="<?=$userDetail['firstname']?>" required>
                                            <label class="form-label">Institution Name<span class="text-danger">*</span></label>
                                        </div>
                                    </div>

                                     <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="faculty" class="form-control" value="<?=$userDetail['faculty']?>"required>
                                            <label class="form-label">Faculty <span class="text-danger">*</span></label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="department" class="form-control" value="<?=$userDetail['department']?>" required>
                                            <label class="form-label">Department <span class="text-danger">*</span></label>
                                        </div>
                                    </div>

                                     <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" name="level" class="form-control" value="<?=$userDetail['level']?>" required>
                                            <label class="form-label">Current Level <span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                </fieldset>

                                <!-- Bank Details -->
                                <h3>Bank</h3>
                                <fieldset>
                                    <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="bankName" class="form-control" value="<?=$userDetail['bankName']?>" required>
                                                <label class="form-label"><span>*</span>Bank Name</label>
                                            </div>
                                    </div>
                                    <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="accountName" class="form-control" value="<?=$userDetail['accountName']?>" required>
                                                <label class="form-label"><span>*</span>Account Name</label>
                                            </div>
                                    </div>
                                    <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="number" name="accountNumber" value="<?=$userDetail['accountNumber']?>" class="form-control" required>
                                                <label class="form-label"><span>*</span>Account Number</label>
                                            </div>
                                    </div>
                                    <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="accountType" value="<?=$userDetail['accountType']?>" class="form-control" required>
                                                <label class="form-label"><span>*</span>Account Type</label>
                                            </div>
                                    </div>

                                    <input id="acceptTerms-2" name="acceptTerms" type="checkbox" required>
                                    <label for="acceptTerms-2">I agree with the Terms and Conditions.</label>
                                    <input class="btn" name="applicationID" type="hidden" value="<?=$userDetail['application_id']?>">
                                    <button class="btn btn-block btn-lg bg-green waves-effect" type="submit" name="submit_button">Submit</button>
                                </fieldset>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Form Example With Validation -->
        </div>
    </section>
<?php
    include 'jslinks.php';
?>
    
