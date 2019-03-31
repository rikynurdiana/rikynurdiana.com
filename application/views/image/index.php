<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('image/partial_meta'); ?>
    <title>rikynurdiana.com - Admin Dashboard</title>
    <?php $this->load->view('image/assets_header'); ?>
</head>
    <body>
        <div id="wrapper">
            <?php $this->load->view('image/partial_navigation'); ?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Image Cloud Management
                            <span class="pull-right">
                                <a type="button" class="btn btn-outline btn-primary" href="/image/add">
                                    <i class="fa fa-plus"></i>
                                    Add New Image
                                </a>
                            </span>
                        </h1>
                    </div>
                </div>

                <?php if ( $this->session->flashdata('add_success') ): ?>
                    <div class="alert alert-info">
                        <?php echo $this->session->flashdata('add_success'); ?>
                    </div>
                <?php endif; ?>

                <?php if ( $this->session->flashdata('edit_success') ): ?>
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata('edit_success'); ?>
                    </div>
                <?php endif; ?>

                <?php if ( $this->session->flashdata('delete_success') ): ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('delete_success'); ?>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            List of all data images cloud
                            </div>
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th width="200px" class="text-center">Image</th>
                                                <th width="200px" class="text-center">Title</th>
                                                <th width="50px" class="text-center">IC</th>
                                                <th width="60px" class="text-center">Create</th>
                                                <th width="60px" class="text-center">Update</th>
                                                <th width="120px" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($images as $image):?>
                                            <tr class="odd gradeX">
                                                <td class="text-center">
                                                    <img src="<?php echo base_url('') . $image->crop; ?>" width="100%" class="img-responsive">
                                                </td>
                                                <td><?php echo substr($image->caption, 0, 100); ?></td>
                                                <td class="text-center">
                                                    <?php if ($image->imagecloud == 1): ?>
                                                        <i class="fa fa-check-square fa-2x"></i>
                                                    <?php else: ?>
                                                        <i class="fa fa-minus-square fa-2x"></i>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center"><?php echo date('d M Y H:i:s',strtotime($image->created_at)); ?></td>
                                                <td class="text-center"><?php echo date('d M Y H:i:s',strtotime($image->updated_at)); ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('image/edit').'/'.$image->id ?>" class="btn btn-outline btn-warning" data-toggle="tooltip" title="edit article"><i class="fa fa-pencil"></i></a>
                                                    <a href="<?php echo base_url('image/delete').'/'.$image->id ?>" class="btn btn-outline btn-danger" data-toggle="tooltip" title="delete article" onclick="return confirm(\'Are you sure?\')"><i class="fa fa-trash-o"></i></a>
                                                    <a href="<?php echo base_url('imagecloud').'/'.$image->slug ?>" class="btn btn-outline btn-info" data-toggle="tooltip" title="view article"><i class="fa fa-eye"></i></a>
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
        <?php $this->load->view('image/assets_footer'); ?>
    </body>
</html>
