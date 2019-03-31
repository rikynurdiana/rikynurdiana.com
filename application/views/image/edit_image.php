<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('image/partial_meta'); ?>
    <title>Edit Image - <?php echo $image->caption; ?></title>
    <?php $this->load->view('image/assets_header'); ?>
    <script src="<?php echo base_url('assets/vendor/tinymce/js/tinymce/tinymce.dev.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/tinymce/js/tinymce/plugins/table/plugin.dev.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/tinymce/js/tinymce/plugins/paste/plugin.dev.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/tinymce/js/tinymce/plugins/spellchecker/plugin.dev.js'); ?>"></script>
</head>
    <body>
        <div id="wrapper">
            <?php $this->load->view('image/partial_navigation'); ?>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Edit Image</h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Form Edit Image
                                </div>
                                <div class="panel-body">
                                    <?php if(validation_errors() || isset($error)) : ?>
                                        <div class="alert alert-danger" role="alert" align="center">
                                            <?=validation_errors()?>
                                            <?=(isset($error)?$error:'')?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <?php echo form_open_multipart('image/edit/'.$image->id);?>
                                            <div class="col-lg-6">
                                                <label for="image">Existing Image</label>
                                                <div class="form-group">
                                                    <div class="row" style="margin-bottom:5px">
                                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                                            <img src="<?php echo base_url('').$image->crop; ?>" alt="<?php echo $image->caption; ?>" width="400px" height="400px"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <label for="image">Change Image</label>
                                                    <div class="form-group">
                                                        <div id="imagecloud-preview">
                                                          <label for="image-upload" id="image-label">Upload Image</label>
                                                          <input type="file" name="userfile" id="image-upload" value="<?php echo $image->file; ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="clearfix"></div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="caption">Caption for Image</label>
                                                    <input type="text" class="form-control" name="caption" value="<?php echo $image->caption; ?>">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="imagecloud">Image Cloud</label>
                                                    <select class="form-control" name="imagecloud">
                                                        <option value="<?php echo $image->imagecloud; ?>"><?php echo $image->imagecloud; ?></option>
                                                        <option value="1">YES</option>
                                                        <option value="0">NO</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="clearfix"></div>
                                            <br>

                                            <div class="col-lg-6">
                                                <button type="submit" class="btn btn-outline btn-block btn-primary col-lg-5 pull-left">Update</button>
                                            </div>

                                            <div class="col-lg-6">
                                                <a href="/image" type="button" class="btn btn-outline btn-block btn-warning col-lg-5 pull-right">Cancel</a>
                                            </div>

                                            <?php echo form_close();?>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="panel-footer">
                                    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds | Memory usage <strong>{memory_usage}</strong> | <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php $this->load->view('image/assets_footer'); ?>
        <script src="<?php echo base_url('assets/js/jquery.uploadPreview.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/upload-preview.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/tiny.js'); ?>"></script>
    </body>
</html>
