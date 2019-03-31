<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('article/partial_meta'); ?>
    <title>Edit Article - <?php echo $article->caption; ?></title>
    <?php $this->load->view('article/assets_header'); ?>
    <script src="<?php echo base_url('assets/vendor/tinymce/js/tinymce/tinymce.dev.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/tinymce/js/tinymce/plugins/table/plugin.dev.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/tinymce/js/tinymce/plugins/paste/plugin.dev.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/tinymce/js/tinymce/plugins/spellchecker/plugin.dev.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/tinymce/js/tinymce/plugins/codesample/plugin.dev.js'); ?>"></script>

</head>
    <body>
        <div id="wrapper">
            <?php $this->load->view('article/partial_navigation'); ?>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Edit Article</h1>
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
                                            <?php echo form_open_multipart('article/edit/'.$article->id);?>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <label for="image">Existing Image</label>
                                                    <div class="form-group">
                                                          <div class="row" style="margin-bottom:5px">
                                                              <div class="col-xs-12 col-sm-6 col-md-3">
                                                                  <img src="<?php echo base_url('').$article->crop; ?>" alt="<?php echo $article->caption ?>" width="400px" height="200px"/>
                                                              </div>
                                                          </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <label for="image">Change Image</label>
                                                    <div class="form-group">
                                                        <div id="image-preview">
                                                          <label for="image-upload" id="image-label">Upload Image</label>
                                                          <input type="file" name="userfile" id="image-upload" value="<?php echo $article->file; ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="clearfix"></div>

                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="category">Category</label>
                                                        <select class="form-control" name="category">
                                                            <option value="<?php echo $article->category; ?>"><?php echo $article->category; ?></option>
                                                            <option value="technology">Technology</option>
                                                            <option value="life">Life</option>
                                                            <option value="love">Love</option>
                                                            <option value="family">Family</option>
                                                            <option value="work">Work</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="editorspick">Editors' pick</label>
                                                        <select class="form-control" name="editorspick">
                                                            <option value="<?php echo $article->editor_pick; ?>"><?php echo $article->editor_pick; ?></option>
                                                            <option value="1">YES</option>
                                                            <option value="0">NO</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="frontpage">Frontpage</label>
                                                        <select class="form-control" name="frontpage">
                                                            <option value="<?php echo $article->frontpage; ?>"><?php echo $article->frontpage; ?></option>
                                                            <option value="1">YES</option>
                                                            <option value="0">NO</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="frontpage">Tutorial</label>
                                                        <select class="form-control" name="tutorial">
                                                            <option value="<?php echo $article->tutorial; ?>"><?php echo $article->tutorial; ?></option>
                                                            <option value="1">YES</option>
                                                            <option value="0">NO</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="clearfix"></div>

                                            <div class="form-group">
                                                <label for="caption">Title of Article</label>
                                                <input type="text" class="form-control" name="caption" value="<?php echo $article->caption; ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="excerpt">Excerpt of Article</label>
                                                <textarea class="form-control" name="excerpt"><?php echo htmlspecialchars($article->excerpt, ENT_QUOTES, 'UTF-8') ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="description">Description of Article</label>
                                                <textarea id="description" name="description"><?php echo htmlspecialchars($article->description, ENT_QUOTES, 'UTF-8') ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="meta_title">(SEO) Meta Title</label>
                                                <input id="meta_title" type="text" class="form-control" name="meta_title" value="<?php echo $article->caption; ?>">
                                            </div>

                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">
                                                        <label for="meta_description">(SEO) Meta Description</label>
                                                    </h3>
                                                </div>
                                                <div class="panel-body">
                                                    <textarea id="meta_description" class="form-control" name="meta_description"><?php echo htmlspecialchars($article->meta_description, ENT_QUOTES, 'UTF-8') ?></textarea>

                                                </div>
                                                <div class="panel-footer">
                                                    <div id="result"></div>
                                                    Minimal Characters : 70 | Maximal Characters : 160
                                                </div>
                                            </div>

                                            <div class="clearfix"></div>
                                            <br>

                                            <button type="submit" class="btn btn-outline btn-primary col-lg-5 pull-left">Update</button>
                                            <a href="/article" type="button" class="btn btn-outline btn-warning col-lg-5 pull-right">Cancel</a>
                                            <?php echo form_close();?>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds | Memory usage <strong>{memory_usage}</strong> | <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php $this->load->view('article/assets_footer'); ?>
        <script src="<?php echo base_url('assets/js/wordcount.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/upload-preview.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/tiny.js'); ?>"></script>
    </body>
</html>
