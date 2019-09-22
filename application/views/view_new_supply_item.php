<head><title>New Supply</title></head>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            New <strong>Supply</strong>
                        </div>
                        <div class="card-body card-block">
                            <form action="<?= base_url('supply/insert_supply')?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="supplier" class=" form-control-label">Supplier</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type=text name="supplier" id="quantity" class="form-control" value="<?= $supplier?>" readonly>
                                    </div>
                                </div>
                                
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="grocery" class=" form-control-label">Grocery</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="grocery" id="grocery" class="form-control">
                                            <option value="0">Please select grocery</option>
                                            <?php foreach($grocery as $groceries){?>
                                            <option value="<?= $groceries->grocId?>"><?= $groceries->grocName?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="store" class=" form-control-label">Store</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="store" id="store" class="form-control">
                                            <option value="0">Please select store</option>
                                            <?php foreach($store as $stores){?>
                                            <option value="<?= $stores->storeId?>"><?= $stores->storeAddress?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="quantity" class=" form-control-label">Quantity</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type=number name="quantity" id="quantity" class="form-control">
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
        