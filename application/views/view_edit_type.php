<head><title>New Type</title></head>

<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                Edit <strong>Grocery Type</strong>
            </div>
            <div class="card-body card-block">
                <form action="<?= base_url()?>grocery/insert_type" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <?php foreach($edit as $edits){ ?>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label">ID</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="id" name="id" placeholder="Enter name" class="form-control" readonly value='<?= $edits->typeId?>'>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="name" name="name" placeholder="Enter name" class="form-control" value='<?= $edits->typeId?>'>
                            <small class="form-text text-muted">Masukkan nama tipe</small>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="photo" class=" form-control-label">Photo</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="file" id="photo" name="photo" class="form-control-file">
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