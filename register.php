<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign Up | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="student/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="student/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="student/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="student/css/style.css" rel="stylesheet">
</head>

<body class="signup-page" style="background: rgb(241,242,247);">
    <div class="signup-box">
        <div class="logo">
            
            <h3 class="text-center text-success">Zamfara Scholarship E-System</h3>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST" action="">
                    <div class="msg"></div>
                    
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="confirm" minlength="6" placeholder="Confirm Password" required>
                        </div>
                    </div>

                    <button class="btn btn-block btn-lg bg-green waves-effect" type="submit" name="signUpBtn">SIGN UP</button>

                    <div class="m-t-25 m-b--5 align-center">
                        Already a member?<a href="index.php"> Login Here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="student/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="student/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="student/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="student/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="student/js/admin.js"></script>
    <script src="student/js/pages/examples/sign-up.js"></script>
</body>

</html>