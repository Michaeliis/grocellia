<head><title>Supplier</title></head>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <h3 class="title-5 m-b-35">Supplier</h3>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <a href="<?php echo base_url(). 'supplier/input_supplier' ?>" class="au-btn au-btn-icon au-btn--green au-btn--small"><i class="zmdi zmdi-plus"></i>add item</a>
                                        <a href="<?php echo base_url(). 'supplier/pdf' ?>" class="au-btn au-btn-icon au-btn--green au-btn--small"><i class="zmdi zmdi-plus"></i>Export to pdf</a>
                                        <a href="<?php echo base_url(). 'supplier/excel' ?>" class="au-btn au-btn-icon au-btn--green au-btn--small"><i class="zmdi zmdi-plus"></i>Export to Excel</a>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>Supplier ID</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Supplied Item</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach($supplier as $list){ ?>
                                            <tr class="tr-shadow">
                                                <td><?php echo $list->userId ?></td>
                                                <td><?php echo $list->userName ?></td>
                                                <td><?php echo $list->userAddress ?></td>
                                                <td><?php echo $list->userPhone ?></td>
                                                <td>
                                                    <span class="block-email"><?php echo $list->userEmail ?></span>
                                                </td>
                                                <td><center><a href="<?= base_url()?>supplier/view/<?= $list->userId?>/1" class="btn btn-success">View</a><br><br><a href="<?= base_url()?>supplier/add/<?= $list->userId?>" class="btn btn-info">Add</a></center></td>
                                                <td class="desc"><?php if($list->userStatus == '1'){  ?>
                                                    <span style="color:green">Available</span>
                                                    <?php }else{?>
                                                    <span style="color:red">Not Available</span>
                                                    <?php }?>
                                                </td>
                                                
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href="<?php echo base_url(). 'supplier/edit_supplier/'.$list->userId; ?>">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button></a>
                                                        <a href="<?php echo base_url(). 'supplier/delete_supplier/'.$list->userId; ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button></a>
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
                                        <a href="<?= base_url() ?>supplier/page/<?= $i ?>"><center><span style="width:30px; display:inline-block; background:green; color:white"><?= $i ?></span></center></a>
                                        <?php } else{ ?>
                                        <a href="<?= base_url() ?>grocery/page/<?= $i ?>"><center><span style="width:30px; display:inline-block; color:green"><?= $i ?></span></center></a>
                                        <?php } ?>
                                <?php }
                                } else{
                                    for($i = $page-3; $i <= $page+3; $i++){
                                        if($i == $page){?>
                                        <a href="<?= base_url() ?>supplier/page/<?= $i ?>"><center><span style="width:30px; display:inline-block; background:green; color:white"><?= $i ?></span></center></a>
                                        <?php } else{ ?>
                                        <a href="<?= base_url() ?>grocery/page/<?= $i ?>"><center><span style="width:30px; display:inline-block; color:green"><?= $i ?></span></center></a>
                                        <?php } ?>
                                <?php }
                                }?>
                                
                            </div>
                                </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->