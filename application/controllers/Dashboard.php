<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Dashboard Controller
 */
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('ArticleModel','ImageModel'));
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
                'totalArticle'  => $this->ArticleModel->totalArticle(),
                'totalImage'    => $this->ImageModel->totalImage(),
                'totalTutorial' => $this->countFiles(),
            );
            // echo "<pre>"; print_r($data); die;
            $this->load->view('dashboard/index', $data);
        }
    }

    public function countFiles()
    {
        $directory = './tutorial/';
        $files = glob($directory . '*.html');

        if ( $files !== false )
        {
            $filecount = count( $files );
            return $filecount;
        }
        else
        {
            return 0;
        }
    }
}
