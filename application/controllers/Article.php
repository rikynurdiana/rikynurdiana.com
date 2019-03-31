<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Blog Controller
 */
class Article extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('ArticleModel'));
        $this->form_validation->set_error_delimiters(
            $this->config->item('error_start_delimiter', 'ion_auth'),
            $this->config->item('error_end_delimiter', 'ion_auth')
        );
    }

    public function index()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login');
        } else {
            $data = array(
                'articles'   => $this->ArticleModel->all()
            );
            $this->load->view('article/index', $data);
        }
    }

    public function add()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login');
        } else {
            if (empty($_FILES['userfile']['name'])) {
                $this->form_validation->set_rules('userfile', 'Image', 'required');
            }
            $this->form_validation->set_rules('category', 'Category', 'required');
            $this->form_validation->set_rules('editorspick', 'Editors pick', 'required');
            $this->form_validation->set_rules('tutorial', 'Tutorial', 'required');
            $this->form_validation->set_rules('frontpage', 'Editors pickFrontpage', 'required');
            $this->form_validation->set_rules('caption', 'Caption', 'required');
            $this->form_validation->set_rules('excerpt', 'Excerpt', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('meta_title', 'meta title', 'required');
            $this->form_validation->set_rules('meta_description', 'meta description', 'required');


            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'caption'           => $this->input->post('caption'),
                    'excerpt'           => $this->input->post('excerpt'),
                    'description'       => $this->input->post('description'),
                    'category'          => $this->input->post('category'),
                    'editor_pick'       => $this->input->post('editorspick'),
                    'tutorial'          => $this->input->post('tutorial'),
                    'frontpage'         => $this->input->post('frontpage'),
                    'meta_title'        => $this->input->post('meta_title'),
                    'meta_description'  => $this->input->post('meta_description')
                );

                if (isset($_POST['description'])) {
                    $description = $_POST['description'];
                }
                $this->load->view('article/add_article', $data);
            } else {
                /* Start Uploading File */
                $data = array();

                $file_element_name = 'userfile';

                $user_upload_path = 'uploads/articles/';

                $config['upload_path'] = './' . $user_upload_path;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['encrypt_name'] = FALSE;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload()) {
                    $data = array(
                        'error'             => $this->upload->display_errors(),
                        'caption'           => $this->input->post('caption'),
                        'excerpt'           => $this->input->post('excerpt'),
                        'description'       => $this->input->post('description'),
                        'category'          => $this->input->post('category'),
                        'editor_pick'       => $this->input->post('editorspick'),
                        'tutorial'          => $this->input->post('tutorial'),
                        'frontpage'         => $this->input->post('frontpage'),
                        'meta_title'        => $this->input->post('meta_title'),
                        'meta_description'  => strip_tags($this->input->post('meta_description'))
                    );

                    $this->load->view('article/add_article', $data);
                } else {
                    $data_upload = $this->upload->data();


                    $file_name          = $data_upload["file_name"];
                    $file_name_thumb    = $data_upload['raw_name'].'_thumb' . $data_upload['file_ext'];
                    $file_name_mo       = $data_upload['raw_name'].'_mo' . $data_upload['file_ext'];
                    $file_icon          = $data_upload['raw_name'].'_kotak' . $data_upload['file_ext'];

                    $this->load->library('image_lib');
                    $config_resize['image_library'] = 'gd2';
                    $config_resize['create_thumb'] = TRUE;
                    $config_resize['maintain_ratio'] = TRUE;
                    $config_resize['master_dim'] = 'auto';
                    $config_resize['quality'] = "100%";
                    $config_resize['source_image'] = './' . $user_upload_path . $file_name;

                    $config_resize['width'] = 500;

                    $this->image_lib->initialize($config_resize);
                    $this->image_lib->resize();

                    $data["file_name_url"] = base_url() . $user_upload_path . $file_name;
                    $data["file_name_thumb_url"] = base_url() . $user_upload_path . $file_name_thumb;

                    $this->image_moo
                         ->load('./' . $user_upload_path . $file_name)
                         ->resize_crop(500,200)
                         ->save($user_upload_path . $file_name_mo);

                    $this->image_moo
                         ->load('./' . $user_upload_path . $file_name)
                         ->resize_crop(50,50)
                         ->save($user_upload_path . $file_icon);

                    $data = array(
                        'file'              => $user_upload_path . $file_name ,
                        'thumbnail'         => $user_upload_path . $file_name_thumb,
                        'crop'              => $user_upload_path . $file_name_mo ,
                        'icon'              => $user_upload_path . $file_icon ,
                        'caption'           => $this->input->post('caption'),
                        'excerpt'           => $this->input->post('excerpt'),
                        'description'       => $this->input->post('description'),
                        'category'          => $this->input->post('category'),
                        'editor_pick'       => $this->input->post('editorspick'),
                        'tutorial'          => $this->input->post('tutorial'),
                        'frontpage'         => $this->input->post('frontpage'),
                        'meta_title'        => $this->input->post('meta_title'),
                        'meta_description'  => strip_tags($this->input->post('meta_description')),
                        'slug'              => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('caption')))),
                        'create_at'         => date("Y-m-d h:i:sa")
                    );

                    $this->ArticleModel->create($data);
                    $this->session->set_flashdata('add_success','New Article Has Been Added');
                    redirect('/article');
                }
            }
        }
    }

    public function edit($id)
    {
        if ( ! $this->ion_auth->logged_in()) {
            redirect('/auth/login');
        } else {
            $this->form_validation->set_rules('category', 'Category', 'required');
            $this->form_validation->set_rules('editorspick', 'Editors pick', 'required');
            $this->form_validation->set_rules('tutorial', 'Tutorial', 'required');
            $this->form_validation->set_rules('frontpage', 'Editors pickFrontpage', 'required');
            $this->form_validation->set_rules('caption', 'Caption', 'required');
            $this->form_validation->set_rules('excerpt', 'Excerpt', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('meta_title', 'meta title', 'required');
            $this->form_validation->set_rules('meta_description', 'meta description', 'required');

            $article = $this->ArticleModel->find($id)->row();

            $data = array(
                'article'   => $article
            );

            if ($this->form_validation->run() == FALSE) {
                // echo "<pre>"; print_r($article); die;

                $this->load->view('article/edit_article', $data);
            } else {
                $data = array();

                $file_element_name = 'userfile';

                $user_upload_path = 'uploads/articles/';

                $config['upload_path'] = './' . $user_upload_path;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['encrypt_name'] = FALSE;

                $this->load->library('upload', $config);

                if (isset($_FILES['userfile']['name'])) {
                    $config = array(
                        'upload_path'   => 'assets/uploads/imagearticle',
                        'allowed_types' => 'gif|jpg|png|jpeg'
                    );

                    $this->load->library('upload' , $config);

                    if ( ! $this->upload->do_upload()) {
                        $error = array('error' => $this->upload->display_errors());
                        $data = array(
                            'article'   => $this->ArticleModel->find($id)->row(),
                            'error'     => $this->upload->display_errors()
                        );
                        $this->load->view('article/edit_article', $data);
                    }
                }

                if ($_FILES['userfile']['name'] == '') {
                    $data = array(
                        'caption'           => $this->input->post('caption'),
                        'excerpt'           => $this->input->post('excerpt'),
                        'description'       => $this->input->post('description'),
                        'category'          => $this->input->post('category'),
                        'editor_pick'       => $this->input->post('editorspick'),
                        'tutorial'          => $this->input->post('tutorial'),
                        'frontpage'         => $this->input->post('frontpage'),
                        'meta_title'        => $this->input->post('meta_title'),
                        'meta_description'  => strip_tags($this->input->post('meta_description')),
                        'slug'              => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('caption')))),
                        'update_at'         => date("Y-m-d h:i:sa")
                    );
                } else {
                    $data_upload = $this->upload->data();

                    $file_name          = $data_upload["file_name"];
                    $file_name_thumb    = $data_upload['raw_name'].'_thumb' . $data_upload['file_ext'];
                    $file_name_mo       = $data_upload['raw_name'].'_mo' . $data_upload['file_ext'];
                    $file_icon          = $data_upload['raw_name'].'_kotak' . $data_upload['file_ext'];

                    $this->load->library('image_lib');
                    $config_resize['image_library'] = 'gd2';
                    $config_resize['create_thumb'] = TRUE;
                    $config_resize['maintain_ratio'] = TRUE;
                    $config_resize['master_dim'] = 'auto';
                    $config_resize['quality'] = "100%";
                    $config_resize['source_image'] = './' . $user_upload_path . $file_name;

                    $config_resize['width'] = 500;

                    $this->image_lib->initialize($config_resize);
                    $this->image_lib->resize();

                    $data["file_name_url"] = base_url() . $user_upload_path . $file_name;
                    $data["file_name_thumb_url"] = base_url() . $user_upload_path . $file_name_thumb;

                    $this->image_moo
                         ->load('./' . $user_upload_path . $file_name)
                         ->resize_crop(500,200)
                         ->save($user_upload_path . $file_name_mo);

                    $this->image_moo
                         ->load('./' . $user_upload_path . $file_name)
                          ->resize_crop(50,50)
                         ->save($user_upload_path . $file_icon);

                    $data = array(
                        'file'              => $user_upload_path . $file_name ,
                        'thumbnail'         => $user_upload_path . $file_name_thumb,
                        'crop'              => $user_upload_path . $file_name_mo ,
                        'icon'              => $user_upload_path . $file_icon ,
                        'caption'           => $this->input->post('caption'),
                        'excerpt'           => $this->input->post('excerpt'),
                        'description'       => $this->input->post('description'),
                        'category'          => $this->input->post('category'),
                        'editor_pick'       => $this->input->post('editorspick'),
                        'tutorial'          => $this->input->post('tutorial'),
                        'frontpage'         => $this->input->post('frontpage'),
                        'meta_title'        => $this->input->post('meta_title'),
                        'meta_description'  => strip_tags($this->input->post('meta_description')),
                        'slug'              => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('caption')))),
                        'update_at'         => date("Y-m-d h:i:sa")
                    );

                    unlink($article->file);
                    unlink($article->thumbnail);
                    unlink($article->crop);
                    unlink($article->icon);
                }

                // echo "<pre>"; print_r($data); die;
                $this->ArticleModel->update($id,$data);
                $this->session->set_flashdata('edit_success','Article Has Been Update');
                redirect('article');
            }
        }
    }

    public function delete($id)
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login');
        } else {
            $article = $this->ArticleModel->find($id)->row();
            unlink($article->file);
            unlink($article->thumbnail);
            unlink($article->crop);
            unlink($article->icon);
            $this->ArticleModel->delete($id);
            $this->session->set_flashdata('delete_success','Selected Article has Been Delete');
            redirect('article');
        }
    }
}
