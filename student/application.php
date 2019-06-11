<?php include 'includes/dbh.php'; ?>
<?php include 'includes/user.php'; 
     // include 'includes/function.php';
    $object->sessioncheck($_SESSION['user']);
 ?> 
<?php
    include 'headlink.php'; 
    include 'topbar.php';
    include 'sidebar.php';
?>

<body class="theme-teal">
    
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb breadcrumb-col-teal">
                    <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
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

                            $object->applications($firstname,$lastname,$dob,$phoneNo,$bankName,$accountName,$accountType,$accountNo,$middlename,$email);
                        }
                        ?>
                        <div class="body">
                            <form id="wizard_with_validation" method="POST" action="application.php" enctype="multipart/form-data">
                                <h3>Personal Information</h3>
                                <fieldset>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="fname" required>
                                            <label class="form-label">FirstName <span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="lname" required>
                                            <label class="form-label">LastName <span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="mname">
                                            <label class="form-label">MiddleName </label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="date" class="form-control" name="dob" required>
                                            <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" class="form-control" name="phoneNo" required>
                                            <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                     <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="email" class="form-control" name="email" required>
                                            <label class="form-label">Email Address <span class="text-danger">*</span></label>
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

                                <!-- <h3>Institution Information</h3>
                                <fieldset>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="admissionNo" class="form-control" required>
                                            <label class="form-label">Admission Number <span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                     <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="institutionName" class="form-control" required>
                                            <label class="form-label">Institution Name<span class="text-danger">*</span></label>
                                        </div>
                                    </div>

                                     <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="faculty" class="form-control" required>
                                            <label class="form-label">Faculty <span class="text-danger">*</span></label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="depertment" class="form-control" required>
                                            <label class="form-label">Department <span class="text-danger">*</span></label>
                                        </div>
                                    </div>

                                     <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" name="level" class="form-control" required>
                                            <label class="form-label">Current Level <span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                </fieldset> -->

                                <!-- <h3>Document</h3>
                                <fieldset>
                                    <div class="form-group form-float">
                                            <div><label class="form-label">Passport <span class="text-danger">*</span></label></div>
                                            <div class="form-line">
                                                <input type="file" name="passport" class="form-control" required>
                                                
                                            </div>
                                    </div>
                                    <div class="form-group form-float">
                                            <div><label class="form-label">Indigne Letter <span class="text-danger">*</span></label></div>
                                            <div class="form-line">
                                                <input type="file" name="indigineLetter" class="form-control" required>
                                            </div>
                                    </div>
                                    <div class="form-group form-float">
                                            <div><label class="form-label">Confirmation Letter <span class="text-danger">*</span></label></div>
                                            <div class="form-line">
                                                <input type="file" name="confirmationLetter" class="form-control" required>
                                            </div>
                                    </div>

                                </fieldset> -->
                                <!-- Bank Details -->
                                <h3>Bank</h3>
                                <fieldset>
                                    <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="bankName" class="form-control" required>
                                                <label class="form-label"><span>*</span>Bank Name</label>
                                            </div>
                                    </div>
                                    <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="accountName" class="form-control" required>
                                                <label class="form-label"><span>*</span>Account Name</label>
                                            </div>
                                    </div>
                                    <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="number" name="accountNumber" class="form-control" required>
                                                <label class="form-label"><span>*</span>Account Number</label>
                                            </div>
                                    </div>
                                    <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="acctountType" class="form-control" required>
                                                <label class="form-label"><span>*</span>Account Type</label>
                                            </div>
                                    </div>

                                    <input id="acceptTerms-2" name="acceptTerms" type="checkbox" required>
                                    <label for="acceptTerms-2">I agree with the Terms and Conditions.</label>
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
    
