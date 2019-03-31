<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('auth/partial_meta'); ?>
    <title>rikynurdiana.com</title>
    <?php $this->load->view('auth/assets_header'); ?>
</head>
    <body>
        <div id="wrapper">
            <?php $this->load->view('auth/partial_navigation'); ?>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header"><?php echo lang('deactivate_heading');?></h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <?php echo sprintf(lang('deactivate_subheading'), $user->username);?>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <?php echo form_open("auth/deactivate/".$user->id);?>
                                            <p>
                                                <?php echo lang('deactivate_confirm_y_label', 'confirm');?>
                                                <input type="radio" name="confirm" value="yes" checked="checked" />
                                                <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
                                                <input type="radio" name="confirm" value="no" />
                                              </p>

                                            <?php echo form_hidden($csrf); ?>
                                            <?php echo form_hidden(array('id'=>$user->id)); ?>

                                            <button type="submit" class="btn btn-outline btn-primary col-lg-5 pull-left"><?php echo lang('deactivate_submit_btn');?></button>
                                            <a href="/auth" type="button" class="btn btn-outline btn-warning col-lg-5 pull-right">Cancel</a>
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
        <?php $this->load->view('auth/assets_footer'); ?>
    </body>
</html>
