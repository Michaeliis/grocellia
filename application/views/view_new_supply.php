<head><title>New Supply</title></head>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            New <strong>Supply</strong>
                        </div>
                        <div class="card-body card-block">
                            <form action="<?= base_url('supply/new_supply_item')?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="supplier" class=" form-control-label">Supplier</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="supplier" id="supplier" class="form-control">
                                            <option value="0">Please select</option>
                                            <?php foreach($supplier as $suppliers){?>
                                            <option value="<?= $suppliers->userId?>"><?= $suppliers->userName?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="submit" class="btn btn-primary btn-sm" value="Submit"/>
                                    <input type="reset" class="btn btn-danger btn-sm" value="Reset"/>

                                </div>
                            </form>
                            </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        