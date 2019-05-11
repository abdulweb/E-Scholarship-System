
<?php
	include('includes/dbh.php');
	include('includes/user.php');
	unset($_SESSION['user']);
	include('includes/headlink.php');
	error_reporting(0);
 ?>
	<!--
		.boxed = boxed version
	-->
	<body>


		<div class="padding-15">

			<div class="login-box">

				<!-- login form -->
				<form action="" method="post" class="sky-form boxed">
					<header><i class="fa fa-lock"></i> Sign In</header>

					<?php
						if(isset($_POST['login_btn']))
						{
							$username = $_POST['email'];
							$password = $_POST['password'];
							$object = new user();
						   $object->login($username,$password);
						}
					?>

					<!--
					<div class="alert alert-danger noborder text-center weight-400 nomargin noradius">
						Invalid Email or Password!
					</div>

					<div class="alert alert-warning noborder text-center weight-400 nomargin noradius">
						Account Inactive!
					</div>

					<div class="alert alert-default noborder text-center weight-400 nomargin noradius">
						<strong>Too many failures!</strong> <br />
						Please wait: <span class="inlineCountdown" data-seconds="180"></span>
					</div>
					-->

					<fieldset>	
					
						<section>
							<label class="label">E-mail</label>
							<label class="input">
								<i class="icon-append fa fa-envelope"></i>
								<input type="email" name="email" required>
								<span class="tooltip tooltip-top-right">Email Address</span>
							</label>
						</section>
						
						<section>
							<label class="label">Password</label>
							<label class="input">
								<i class="icon-append fa fa-lock"></i>
								<input type="password" name="password" required>
								<b class="tooltip tooltip-top-right">Type your Password</b>
							</label>
							<label class="checkbox"><input type="checkbox" name="checkbox-inline" checked><i></i>Keep me logged in</label>
						</section>

					</fieldset>

					<footer>
						<button type="submit" class="btn btn-primary pull-right" name="login_btn">Sign In</button>
						<div class="forgot-password pull-left">
							<a href="">Forgot password?</a> <br />
							<a href="register.php"><b>Need to Register?</b></a>
						</div>
					</footer>
				</form>
				<!-- /login form -->

				<hr />

			</div>
            <?php include('includes/footer.php') ?>

		</div> 

		<!-- JAVASCRIPT FILES -->
		<?php include('includes/js.php');?>
	</body>
</html>