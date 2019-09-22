<!-- checkout -->
	<div class="checkout">
		<div class="container">
			<h2>Your shopping cart contains: <span>
                <?php if(isset($_SESSION["cart_item"]) || !empty($_SESSION["cart_item"])){
                    echo count($_SESSION["cart_item"]);
                    } else {
                        echo "0";
                    } ?></span> Item(s)</h2>
			<div class="checkout-right">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>SL No.</th>	
							<th>Product</th>
							<th>Quantity</th>
                            <th>Price</th>
							<th>Product Name</th>
						
							<th>Price Total</th>
							<th>Remove</th>
						</tr>
					</thead>
                    <?php
                    $total = 0;
                    if(isset($_SESSION["cart_item"])){
                        $i=0;
                    foreach ($_SESSION["cart_item"] as $item){
                       $priceTotal = $item['tDetailPrice']*$item['tDetailQuantity'];
                        ?>
                        <tr class="rem1">
                            <td class="invert"><?= $item['grocId']?></td>
                            <td class="invert-image"><a href="single.html"><img src="<?= base_url(); ?>assets/uploads/<?= $item['grocImage'] ?>" alt=" " class="img-responsive" /></a></td>
                            <td class="invert">
                             <?= $item['tDetailQuantity']?> Kg
                            </td>
                            <td class="invert"><?= $item['tDetailPrice']?>
                            <td class="invert"><?= $item['grocName']?></td>

                            <td class="invert"><?= $priceTotal ?></td>
                            <td class="invert">
                                <a href="<?= base_url()?>grocellia/remove/<?= $i ?>">
                                <div class="rem">
                                    <div class="close1"> </div>
                                </div>
                                </a>
                            </td>
                        </tr>
                    
                    <?php $total += $priceTotal; $i++;} } ?>
					
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