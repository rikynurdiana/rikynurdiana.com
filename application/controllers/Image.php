<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Blog Controller
 */
class Image extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('ImageModel'));
        $this->form_validation->set_error_delimiters(
            $this->config->item('error_start_delimiter', 'ion_auth'),
            $this->config->item('error_end_delimiter', 'ion_auth')
        );
    }

    public function index()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        } else {
            $data = array(
                'images'   => $this->ImageModel->all()
            );
            $this->load->view('image/index', $data);
        }
    }

    public function add()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        } else {
            if (empty($_FILES['userfile']['name'])) {
                $this->form_validation->set_rules('userfile', 'Image', 'required');
            }
            $this->form_validation->set_rules('caption', 'Caption', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'caption' => $this->input->post('caption')
                );

                $this->load->view('image/add_image', $data);
            } else {
                /* Start Uploading File */
                $data = array();

                $file_element_name = 'userfile';

                $user_upload_path = 'uploads/images/';

                $config['upload_path'] = './' . $user_upload_path;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['encrypt_name'] = FALSE;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload($file_element_name)) {
                    $data = array(
                        'error'  => $this->upload->display_errors()
                    );

                    $this->load->view('image/add_image', $data);
                } else {
                    $data_upload = $this->upload->data();

                    $file_name          = $data_upload["file_name"];
                    $file_name_thumb    = $data_upload['raw_name'].'_thumb' . $data_upload['file_ext'];
                    $file_name_mo       = $data_upload['raw_name'].'_mo' . $data_upload['file_ext'];

                    $this->load->library('image_lib');
                    $config_resize['image_library'] = 'gd2';
                    $config_resize['create_thumb'] = TRUE;
                    $config_resize['maintain_ratio'] = TRUE;
                    $config_resize['master_dim'] = 'auto';
                    $config_resize['quality'] = "100%";
                    $config_resize['source_image'] = './' . $user_upload_path . $file_name;

                    $config_resize['height'] = 300;
                    $config_resize['width'] = 300;

                    $this->image_lib->initialize($config_resize);
                    $this->image_lib->resize();

                    $data["file_name_url"] = base_url() . $user_upload_path . $file_name;
                    $data["file_name_thumb_url"] = base_url() . $user_upload_path . $file_name_thumb;

                    $this->image_moo
                         ->load('./' . $user_upload_path . $file_name)
                         ->resize_crop(300,300)
                         ->save($user_upload_path . $file_name_mo);

                    $data = array(
                        'file'          => $user_upload_path . $file_name ,
                        'thumbnail'     => $user_upload_path . $file_name_thumb,
                        'crop'          => $user_upload_path . $file_name_mo ,
                        'caption'       => $this->input->post('caption'),
                        'imagecloud'    => $this->input->post('imagecloud'),
                        'slug'          => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('caption')))),
                        'created_at'    => date("Y-m-d h:i:sa")
                    );

                    $this->ImageModel->create($data);
                    $this->session->set_flashdata('add_success','New Image Has Been Added');
                    redirect('image');
                }

            }

        }
    }

    public function edit($id)
    {
        if ( ! $this->ion_auth->logged_in()) {
            redirect('auth/login');
        } else {
            $this->form_validation->set_rules('caption', 'Caption', 'required');

            $image = $this->ImageModel->find($id)->row();

            $data = array(
                'image' => $image
            );

            if ($this->form_validation->run() == FALSE) {
                // echo "<pre>"; print_r($image); die;
                $this->load->view('image/edit_image', $data);
            } else {
                $data = array();

                $file_element_name = 'userfile';

                $user_upload_path = 'uploads/images/';

                $config['upload_path'] = './' . $user_upload_path;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['encrypt_name'] = FALSE;

                $this->load->library('upload', $config);

                if (isset($_FILES['userfile']['name'])) {
                    $config = array(
                        'upload_path'   => 'assets/uploads/imagecloud',
                        'allowed_types' => 'gif|jpg|png|jpeg'
                    );

                    $this->load->library('upload' , $config);

                    if ( ! $this->upload->do_upload()) {
                        $error = array('error' => $this->upload->display_errors());
                        $data = array(
                            'image' => $this->ImageModel->find($id)->row(),
                            'error' => $error
                        );
                        $this->load->view('image/edit_image', $data);
                    }
                }

                if ($_FILES['userfile']['name'] == '') {
                    $data = array(
                        'caption'       => $this->input->post('caption'),
                        'imagecloud'    => $this->input->post('imagecloud'),
                        'slug'          => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('caption')))),
                        'updated_at'    => date("Y-m-d h:i:sa")
                    );
                } else {
                    $data_upload = $this->upload->data();

                    $file_name          = $data_upload["file_name"];
                    $file_name_thumb    = $data_upload['raw_name'].'_thumb' . $data_upload['file_ext'];
                    $file_name_mo       = $data_upload['raw_name'].'_mo' . $data_upload['file_ext'];

                    $this->load->library('image_lib');
                    $config_resize['image_library'] = 'gd2';
                    $config_resize['create_thumb'] = TRUE;
                    $config_resize['maintain_ratio'] = TRUE;
                    $config_resize['master_dim'] = 'auto';
                    $config_resize['quality'] = "100%";
                    $config_resize['source_image'] = './' . $user_upload_path . $file_name;

                    $config_resize['height'] = 300;
                    $config_resize['width'] = 300;

                    $this->image_lib->initialize($config_resize);
                    $this->image_lib->resize();

                    $data["file_name_url"] = base_url() . $user_upload_path . $file_name;
                    $data["file_name_thumb_url"] = base_url() . $user_upload_path . $file_name_thumb;

                    $this->image_moo
                         ->load('./' . $user_upload_path . $file_name)
                         ->resize_crop(300,300)
                         ->save($user_upload_path . $file_name_mo);

                    $data = array(
                        'file'          => $user_upload_path . $file_name ,
                        'thumbnail'     => $user_upload_path . $file_name_thumb,
                        'crop'          => $user_upload_path . $file_name_mo ,
                        'caption'       => $this->input->post('caption'),
                        'imagecloud'    => $this->input->post('imagecloud'),
                        'slug'          => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('caption')))),
                        'updated_at'    => date("Y-m-d h:i:sa")
                    );

                    unlink($image->file);
                    unlink($image->thumbnail);
                    unlink($image->crop);
                }

                // echo "<pre>"; print_r($data); die;
                $this->ImageModel->update($id,$data);
                $this->session->set_flashdata('edit_success','Image Has Been Update');
                redirect('image');
            }
        }
    }

    public function delete($id)
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        } else {
            $image = $this->ImageModel->find($id)->row();
            unlink($image->file);
            unlink($image->thumbnail);
            unlink($image->crop);
            $this->ImageModel->delete($id);
            $this->session->set_flashdata('delete_success','Selected Image has Been Delete');
            redirect('image');
        }
    }
}
