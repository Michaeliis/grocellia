<head><title>New Store</title></head>
<!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        Add <strong>Store</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="<?php echo base_url('store/insert_store'); ?>" method="post" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Store Address</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="address" placeholder="Name" class="form-control">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" class="btn btn-primary btn-sm" value="Submit">
                                        <input type="reset" class="btn btn-danger btn-sm" value="Reset">
                                    </div>
                                </div>
                                </form>
        </div>
    </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->