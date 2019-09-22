<!-- login -->
<title>Login</title>
<?php if(!isset($failLogin)){
?>
<?php }else{
    ?><script>alert("Incorrect Username or Password!");</script>
<?php } ?>
	<div class="login">
		<div class="container">
			<h2>Select Store</h2>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form action="<?= base_url()?>grocellia/purchase_transaction" method="post">
                    <select name="store" required>
                        <option value="">Select Store</option>
                        <?php foreach($store as $stores){?>
                        <option value='<?= $stores->storeId ?>'><?= $stores->storeAddress?></option>
                        <?php } ?>
                    </select>
					<input type="submit" value="Ok">
				</form>
			</div>
			<h4>For New People</h4>
			<p><a href="<?php echo base_url(). 'grocellia/register' ?>">Register Here</a> (Or) go back to <a href="<?php echo base_url(). 'grocellia/index' ?>">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
		</div>
	</div>
<!-- //login -->