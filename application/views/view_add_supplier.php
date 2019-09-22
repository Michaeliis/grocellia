<head><title>New Supply Item</title></head>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            New <strong>Supply Item</strong>
                        </div>
                        <div class="card-body card-block">
                            <form action="<?= base_url()?>supplier/insert_supplier_detail" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <?php foreach($supplier as $suppliers){?>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="supplier" class=" form-control-label">Supplier Id</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="supplierid" value="<?= $suppliers->userId?>" readonly>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="supplier" class=" form-control-label">Supplier</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="suppliername" value="<?= $suppliers->userName?>" readonly>
                                    </div>
                                </div>
                                <?php }?>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="grocery" class=" form-control-label">Grocery</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="grocery" id="grocery" class="form-control" required>
                                            <option>Select Grocery</option>
                                            <?php foreach($grocery as $groceries) {?>
                                            <option value="<?= $groceries->grocId?>"><?= $groceries->grocName?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="supplier" class=" form-control-label">Item Price</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="price" class="form-control">
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