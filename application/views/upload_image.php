<head><title>New Image</title></head>
<!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Add Image</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <?php echo form_open_multipart('upload/do_upload');?>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Image</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="file-input" name="userfile" class="form-control-file">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" class="btn btn-primary btn-sm" value="upload">
                                    </div>
                                </div>
                                </form>
        </div>
    </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->