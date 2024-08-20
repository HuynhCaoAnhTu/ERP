<?= $this->extend("layout/master") ?>

<?= $this->section("content") ?>
<!-- code here.. -->
<div class="container">
    <h2 class="text-center mt-5 mb-3">Multitple File Upload</h2>
    <div class="card">
        <div class="card-body">
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success">
                    <b><?php echo session()->getFlashdata('success') ?></b>
                </div>
            <?php endif ?>
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger">
                    <b><?php echo session()->getFlashdata('error') ?></b>
                </div>
            <?php endif ?>
  
            <form class="row" method="post" action="<?php echo base_url('/multiple-file-upload'); ?>" enctype="multipart/form-data">
                <div class="col-auto">
                    <input type="file" name="fileuploads[]" class=" form-control" multiple >
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-outline-primary mb-3">Upload Files</button>
                </div>
            </form>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Filename</th>
						<th>Category</th>
                        <th>Filepath</th>
                        <th>File Type</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($fileUploads as $fileUpload):?>
                    <tr>
                        <td><?= $fileUpload->filename ?></td>
						<td><?= $fileUpload->filecategory ?></td>
                        <td><?= $fileUpload->filepath ?></td>
                        <td><?= $fileUpload->type ?></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
                      
            </table>
        </div>
    </div>
  
</div>
<?= $this->endSection() ?>

<?= $this->section("pageScript") ?>
<!-- write script here.. -->
<?= $this->endSection() ?>