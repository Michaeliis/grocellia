<head><title>Grocery</title></head>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                        <div class="table-data__tool">
                            <div class="table-data__tool-left">
                                <h3 class="title-5 m-b-35">Grocery Type</h3>
                            </div>
                            <div class="table-data__tool-right">
                                <a href="<?php echo base_url(). 'grocery/input_type' ?>" class="au-btn au-btn-icon au-btn--green au-btn--small"><i class="zmdi zmdi-plus"></i>add item</a>
                                <a href="<?php echo base_url(). 'upload' ?>" class="au-btn au-btn-icon au-btn--green au-btn--small"><i class="zmdi zmdi-plus"></i>Upload Images</a>
                            </div>
                        </div>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>Type ID</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($type as $list){ ?>
                                    <tr class="tr-shadow">
                                        <td><?php echo $list->typeId ?></td>
                                        <?php if(!$list->typeImage){ ?>
                                        <td>
                                            Image is not uploaded yet
                                        </td>
                                            <?php } else { ?>
                                        <td>
                                            <img src="<?php echo base_url(); ?>assets/uploads/<?php echo $list->typeImage ?>" height="100" width="100"><br>
                                        </td>
                                            <?php } ?>
                                        <td><?php echo $list->typeName ?></td>
                                        <td class="desc"><?php if($list->typeStatus == '1'){  ?><span style="color:green">Available</span><?php }else{?><span style="color:red">Not Available</span><?php }?></td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="<?php echo base_url(). 'grocery/edit_type/'.$list->typeId; ?>">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </button>
                                                </a>
                                                <a href="<?php echo base_url(). 'grocery/delete_type/'.$list->typeId; ?>"><button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
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