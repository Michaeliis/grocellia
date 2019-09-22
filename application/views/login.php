<!-- login -->
<title>Login</title>
<?php if(!isset($failLogin)){
?>
<?php }else{
    ?><script>alert("Incorrect Username or Password!");</script>
<?php } ?>
	<div class="login">
		<div class="container">
			<h2>Login Form</h2>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form action="<?= base_url()?>grocellia/checkLogin" method="post">
					<input type="email" placeholder="Email Address" required name="email" >
					<input type="password" placeholder="Password" required name="password" >
					<div class="forgot">
						<a href="#">Forgot Password?</a>
					</div>
					<input type="submit" value="Login">
				</form>
			</div>
			<h4>For New People</h4>
			<p><a href="<?php echo base_url(). 'grocellia/register' ?>">Register Here</a> (Or) go back to <a href="<?php echo base_url(). 'grocellia/index' ?>">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
		</div>
	</div>
<!-- //login -->