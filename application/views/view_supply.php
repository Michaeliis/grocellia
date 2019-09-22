<head><title>Supply History</title></head>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                        <div class="table-data__tool">
                            <div class="table-data__tool-left">
                                <h3 class="title-5 m-b-35">Supply History</h3>
                            </div>
                            <div class="table-data__tool-right">
                                <a href="<?php echo base_url(). 'staff/pdf' ?>" class="au-btn au-btn-icon au-btn--green au-btn--small"><i class="zmdi zmdi-plus"></i>export to pdf</a>
                                <a href="<?php echo base_url(). 'staff/excel' ?>" class="au-btn au-btn-icon au-btn--green au-btn--small"><i class="zmdi zmdi-plus"></i>Export to Excel</a>
                                <a href="<?php echo base_url(). 'upload' ?>" class="au-btn au-btn-icon au-btn--green au-btn--small"><i class="zmdi zmdi-plus"></i>Upload Images</a>
                            </div>
                        </div>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>Supply ID</th>
                                        <th>Staff</th>
                                        <th>Supplier</th>
                                        <th>Store</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Price Total</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($supply as $list){ ?>
                                    <tr class="tr-shadow">
                                        <td><?php echo $list->supplyId ?></td>
                                        <td><?php echo $list->staffName ?></td>
                                        <td><?php echo $list->suppName ?></td>
                                        <td><?php echo $list->storeAddress ?></td>
                                        <td><?php echo $list->supplyPrice ?></td>
                                        <td><?php echo $list->supplyQuantity ?></td>
                                        <td><?php echo $list->supplyTotal ?></td>
                                        <td><?php echo $list->supplyDate ?></td>
                                        
                                        <td class="desc"><?php if($list->supplyStatus == '1'){  ?><span style="color:green">Ready to Take</span>
                                        <?php }else if($list->supplyStatus == '0'){?>
                                        <span style="color:red">Not Available</span>
                                        <?php }else if($list->supplyStatus == '2'){?>
                                        <span style="color:orange">Already Taken</span>
                                        <?php }?></td>
                                        <td>
                                            <div class="table-data-feature">
                                                <?php if($list->supplyStatus == '1') {?>
                                                <a href="<?php echo base_url(). 'transaction/takeTransaction/'.$list->supplyId; ?>" style="background:green; color:white">
                                                    Take Order
                                                </a>
                                                <?php } else{ ?>
                                                <span style="background:grey; color:white">
                                                    Take Order
                                                </span>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="spacer"></tr>
                                <?php } ?>
                                </tbody>
                            </table>
                            
                            <div class="page-button">
                                Page : 
                                <?php 
                                if($pageTotal < 6){
                                    for($i = 1; $i <= $pageTotal; $i++){
                                        if($i == $page){?>
                                        <a href="<?= base_url() ?>grocery/page/<?= $i ?>"><center><span style="width:30px; display:inline-block; background:green; color:white"><?= $i ?></span></center></a>
                                        <?php } else{ ?>
                                        <a href="<?= base_url() ?>grocery/page/<?= $i ?>"><center><span style="width:30px; display:inline-block; color:green"><?= $i ?></span></center></a>
                                        <?php } ?>
                                <?php }
                                } else{
                                    for($i = $page-3; $i < $page+3; $i++){
                                        if($i == $page){?>
                                        <a href="<?= base_url() ?>grocery/page/<?= $i ?>"><center><span style="width:30px; display:inline-block; background:green; color:white"><?= $i ?></span></center></a>
                                        <?php } else{ ?>
                                        <a href="<?= base_url() ?>grocery/page/<?= $i ?>"><center><span style="width:30px; display:inline-block; color:green"><?= $i ?></span></center></a>
                                        <?php } ?>
                                <?php }
                                }?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->