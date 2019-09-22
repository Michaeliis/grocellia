	<div class="products">
		<div class="container">
			<div class="agileinfo_single">
				<?php
					foreach($grocery as $list){ ?>
				<div class="col-md-4 agileinfo_single_left">
					<img src="<?php echo base_url(); ?>assets/uploads/<?php echo $list->grocImage ?>" height="300" width="300">
				</div>
				<div class="col-md-8 agileinfo_single_right">
				<h2><?php echo $list->grocName ?></h2>
					<div class="w3agile_description">
						<h4>Description :</h4>
						<p style="word-break: keep-all;"><?php echo $list->grocDesc ?></p>
					</div>
					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
							<h4 class="m-sing">Rp <?php echo $list->grocPrice ?></h4>
						</div>
						<div class="snipcart-details agileinfo_single_right_details">
							<form action="#" method="post">
								<fieldset>
									<input type="hidden" name="cmd" value="_cart">
									<input type="hidden" name="add" value="1">
									<input type="hidden" name="business" value=" ">
									<input type="hidden" name="item_name" value="pulao basmati rice">
									<input type="hidden" name="amount" value="21.00">
									<input type="hidden" name="discount_amount" value="1.00">
									<input type="hidden" name="currency_code" value="USD">
									<input type="hidden" name="return" value=" ">
									<input type="hidden" name="cancel_return" value=" ">
									<input type="submit" name="submit" value="Add to cart" class="button">
								</fieldset>
							</form>
						<?php } ?>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!---728x90--->