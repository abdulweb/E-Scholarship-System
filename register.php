
<?php include('includes/headlink.php'); ?>
	<!--
		.boxed = boxed version
	-->
	<body>


		<div class="padding-15">

			<div class="login-box">

				<!--
				<div class="alert alert-danger">Complete all fields!</div>
				-->

				<!-- registration form -->
				<form action="" method="post" class="sky-form boxed" novalidate="novalidate" id="registerForm">
					<header><i class="fa fa-users"></i> Create Account</header>
					
					<fieldset>					
						<label class="input">
							<i class="icon-append fa fa-envelope"></i>
							<input type="email" placeholder="Email address" name="username" required="">
							<b class="tooltip tooltip-bottom-right">Needed to verify your account</b>
						</label>
					
						<label class="input">
							<i class="icon-append fa fa-lock"></i>
							<input type="password" placeholder="Password" name="password" required="">
							<b class="tooltip tooltip-bottom-right">Only latin characters and numbers</b>
						</label>
					
						<label class="input">
							<i class="icon-append fa fa-lock"></i>
							<input type="password" placeholder="Confirm password" name="confirmPassword" required="">
							<b class="tooltip tooltip-bottom-right">Only latin characters and numbers</b>
						</label>
					</fieldset>
						
					<fieldset>

					</fieldset>

					<footer>
						<button type="submit" class="btn btn-primary btn-block pull-right"><i class="fa fa-check"></i> Create Account</button>
					</footer>

				</form>
				<!-- /registration form -->

				<hr />

				<div class="socials margin-top-10 text-center"><!-- more buttons: ui-buttons.html -->
					Already a member? <a href="index.php">login</a>
				</div>

			</div>
            <?php include('includes/footer.php'); ?>

		</div>


	
		<!-- JAVASCRIPT FILES -->
		<?php include('includes/js.php'); ?>

		<!-- PAGE LEVEL SCRIPTS -->
		<script type="text/javascript">

			/**
				Checkbox on "I agree" modal Clicked!
			**/
			jQuery("#terms-agree").click(function(){
				jQuery('#termsModal').modal('toggle');

				// Check Terms and Conditions checkbox if not already checked!
				if(!jQuery("#checked-agree").checked) {
					jQuery("input.checked-agree").prop('checked', true);
				}
				
			});
		</script>

	</body>
</html>