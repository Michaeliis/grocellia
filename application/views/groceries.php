<!--- groceries --->
	<div class="products">
		<div class="container">
			<div class="col-md-4 products-left">
				<div class="categories">
					<h2>Categories</h2>
					<ul class="cate">
                        <li><a href="<?= base_url('grocellia/groceries/all') ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i>All</a></li>
                        <?php foreach($type as $types){?>
						<li><a href="<?= base_url('grocellia/groceries/').$types->typeId ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i><?= $types->typeName ?></a></li>
				        <?php } ?>
					</ul>
				</div>																																												
			</div>
			<div class="col-md-8 products-right">
				<div class="products-right-grid">
					<div class="products-right-grids">
						<div class="sorting">
							<select id="country" onchange="change_country(this.value)" class="frm-field required sect">
								<option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Sort by name</option>				
								<option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Sort by price</option>								
							</select>
						</div>
						
						<div class="clearfix"> </div>
					</div>
				</div>
                
                <?php
                                   foreach($grocery as $list){ 
                                   	 ?>
                                   	<div class="col-md-4 top_brand_left">
									<div class="hover14 column">
										<div class="agile_top_brand_left_grid">
											<div class="agile_top_brand_left_grid_pos">
												<img src="<?php echo base_url(); ?>assets/images/offer.png" alt=" " class="img-responsive" />
											</div>
											<div class="agile_top_brand_left_grid1">
												<figure>
													<div class="snipcart-item block" >
														<div class="snipcart-thumb">
															<a href="<?php echo base_url(). 'grocellia/item/'.$list->grocId; ?>">
                                                                <img title=" " alt=" " src="<?php echo base_url(); ?>assets/uploads/<?php echo $list->grocImage; ?>" width=150 height="150"/>
                                                            </a>	
															<p><?php echo $list->grocName ?></p>
															<h4>Rp <?php echo $list->grocPrice ?>
                                                                <?php if($list->promoId != 0){ ?>
                                                                <span>Rp <?php echo $list->grocPrice ?></span>
                                                                <?php }?>
                                                            </h4>
														</div>
                                                        <form action="<?= base_url()?>grocellia/purchase/add" method="post">
                                                            <div class="snipcart-details top_brand_home_details">
                                                                <input type="number" name="quantity" value="1" min="1"> Kg
																<fieldset>
                                                                    <input type="hidden" name="grocId" value="<?= $list->grocId?>" />
																	<input type="hidden" name="item_name" value="<?php echo $list->grocName ?>" />
																	<input type="hidden" name="amount" value="<?php echo $list->grocPrice ?>" />
																	<input type="hidden" name="promoId" value="<?= $list->promoId ?>" />
																	<input type="submit" name="submit" value="Add to cart" class="button" />
																</fieldset>
														  </div>
                                                        </form>
													</div>
												</figure>
											</div>
										</div>
									</div>
								</div>
                                   	<?php 
                                }
                                   	?>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!--- groceries --->