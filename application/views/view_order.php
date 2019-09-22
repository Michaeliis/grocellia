<!-- checkout -->
	<div class="checkout">
		<div class="container">
			<?php foreach($transaction as $transactions) { $total = sprintf("Rp %s", number_format($transactions->transTotal));?>
            
            <h3>Transaction ID : <?= $transactions->transId?></h3>
            <h3>Date : <?= $transactions->transDate?></h3>
            <h3>Customer : <?= $transactions->custName?></h3>
            <h3>Staff : <?= $transactions->staffName?></h3>
            <h3>Total : <?= $total?></h3>
            <br>
            <?php } ?>
			<div class="checkout-right">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>Grocery ID</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Price Total</th>
                            <th>Status</th>
                            <th></th>
						</tr>
					</thead>
                    <?php
                    foreach ($detail as $details){
                        ?>
                        <tr class="rem1">
                            <td class="invert"><?php echo $details->grocId ?></td>
                            <td class="invert-image"><?php echo $details->grocName ?></td>
                            <td class="invert"><?php echo $details->tDetailQuantity ?></td>
                            <td class="invert">Rp <?php echo number_format($details->tDetailPrice) ?></td>
                            <td class="invert">Rp <?php echo number_format($details->tDetailTotalPrice) ?></td>

                            <td class="invert"><?php if($details->tDetailStatus == '1'){  ?><span style="color:red">Not Fetched</span><?php }else if($list->transStatus == '2'){?><span style="color:green">Fetched</span><?php }?></td>
                            <td class="invert">
                                <div class="table-data-feature">
                                    <?php if($details->tDetailStatus == '1') {?>
                                    <a href="<?php echo base_url(). 'transaction/takeTransaction/'.$details->grocId; ?>" style="background:green; color:white">
                                        Fetch
                                    </a>
                                    <?php } else if($details->tDetailStatus == '2'){?>
                                    <span style="background:gray">Already Fetched</span>
                                    <?php } ?>
                                </div>
                            </td>
                        </tr>
                    
                    <?php }?>
					
<!--quantity-->
<script>
$('.value-plus').on('click', function(){
    var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
    divUpd.text(newVal);
});

$('.value-minus').on('click', function(){
    var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
    if(newVal>=1) divUpd.text(newVal);
});
</script>
<!--quantity-->
				</table>
			</div>
            
            
            <div class="checkout-left">
				<table class="timetable_sub">
                    <tr>
                        <th>Price Total</th>	
                        <td>Rp <?= $total?></td>
                    </tr>
                    <tr>
                        <th>Discount</th>
                        <td><?= "*Discount Value*" ?></td>
                    </tr>
				</table>
			</div>
            
            
			<!---728x90--->

			<div class="checkout-left">
				<div class="checkout-right-basket">
					<a href="<?= base_url()?>grocellia/emptycart" style="background:red">Empty Cart</a>
				</div>
                
                <div class="checkout-right-basket">
					<a href="<?= base_url()?>grocellia"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
				</div>
                
                <?php if(isset($_SESSION['userId'])){?>
                <div class="checkout-right-basket">
					<a href="<?= base_url()?>grocellia/selectStore" style="background:green">Purchase</a>
				</div>
                <?php } ?>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //checkout -->

