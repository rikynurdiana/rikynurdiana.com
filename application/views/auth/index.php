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
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo lang('index_heading');?>
                            Management
                            <span class="pull-right">
                                <a type="button" class="btn btn-outline btn-primary" href="/auth/create_user"><i class="fa fa-user"></i> <?php echo lang('index_create_user_link')?></a> &nbsp;
                                <a type="button" class="btn btn-outline btn-success" href="/auth/create_group"><i class="fa fa-users"></i> <?php echo lang('index_create_group_link')?></a>
                            </span>
                        </h1>
                    </div>
                </div>



                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <p><?php echo lang('index_subheading');?></p>
                            </div>
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th><?php echo lang('index_fname_th');?></th>
                                                <th><?php echo lang('index_lname_th');?></th>
                                                <th><?php echo lang('index_email_th');?></th>
                                                <th><?php echo lang('index_groups_th');?></th>
                                                <th><?php echo lang('index_status_th');?></th>
                                                <th width="100px" class="text-center"><?php echo lang('index_action_th');?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($users as $user):?>
                                            <tr class="odd gradeX">
                                                <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
                                                <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
                                                <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
                                                <td class="center">
                                                    <?php foreach ($user->groups as $group):?>
                                                        <?php echo anchor("/auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
                                                    <?php endforeach?>
                                                </td>
                                                <td class="center">
                                                    <?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?>
                                                </td>
                                                <td>
                                                <div class="pull-left">
                                                    <a href="<?php echo base_url('auth/edit_user').'/'.$user->id;?>" class="btn btn-outline btn-warning">edit</a>
                                                </div>
                                                <div class="pull-right">
                                                    <a href="<?php echo base_url('auth/delete').'/'.$user->id;?>" class="btn btn-outline btn-danger" onclick="return confirm(\'Are you sure?\')">delete</a>
                                                </div>
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>

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
        <?php $this->load->view('auth/assets_footer'); ?>
    </body>
</html>
