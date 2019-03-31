<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontpage extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model(array('ArticleModel', 'ImageModel'));
        $this->load->library('pagination');
    }

	public function index()
	{
        $data = array(
            'articles'      => $this->ArticleModel->frontpageArticle(),
            'editorspicks'  => $this->ArticleModel->editorsPicksArticle(),
            'tutorials'     => $this->ArticleModel->latestTutorial()
        );
        $this->load->view('frontpage/index', $data);
	}

    public function article($slug)
    {
        $data = array(
            'article'       => $this->ArticleModel->read($slug)->row(),
            'editorspicks'  => $this->ArticleModel->editorsPicksArticle(),
            'tutorials'     => $this->ArticleModel->latestTutorial()
        );
        $this->load->view('frontpage/article', $data);
    }

    public function viewImage($slug)
    {
        $image = $this->ImageModel->read($slug)->row();
        $this->load->view('frontpage/view_image', $image);
    }

    public function about()
    {
        $this->load->view('frontpage/about');
    }

    public function resume()
    {
        $this->load->view('frontpage/resume');
    }

    public function contact()
    {
        $data = array(
            'widget' => $this->recaptcha->getWidget(),
            'script' => $this->recaptcha->getScriptTag(),
        );

        $this->load->view('frontpage/contact', $data);
    }

    public function sendMail()
    {
        $recaptcha = $this->input->post('g-recaptcha-response');

        if (!empty($recaptcha)) {

            $response = $this->recaptcha->verifyResponse($recaptcha);

            if (isset($response['success']) and $response['success'] === true) {

                if ($this->input->server('REQUEST_METHOD') == 'POST') {
                    // $data = array(
                    //     'name'      => $this->input->post('name'),
                    //     'email'     => $this->input->post('email'),
                    //     'phone'     => $this->input->post('phone'),
                    //     'message'   => $this->input->post('message')
                    // );

                    // $this->email->from($data['email'], $data['name']);
                    // $this->email->to('admin@rikynurdiana.com');
                    // $this->email->set_header('From : ', $data['email']);
                    // $this->email->subject('Message from Contact Us [rikynurdiana.com]');
                    // $this->email->message($data['message']);

                    // if($this->email->send()) {
                    //     $this->session->set_flashdata('email_success','Email Has Been Sent ! Thank You..');
                    //     redirect('contact');
                    // } else {
                    //     $this->session->set_flashdata('email_fail',show_error($this->email->print_debugger()));
                    //     redirect('contact');
                    // }
                    $me         = 'admin@rikynurdiana.com';
                    $name       = $this->input->post('name');
                    $email      = $this->input->post('email');
                    $phone      = $this->input->post('phone');
                    $subject    = 'Message from Contact Us [rikynurdiana.com]';
                    $message    = $this->input->post('message');

                    $headers = "From: admin@rikynurdiana.com \r\n";
                    $headers .= "Reply-to: " . $email . "\r\n";
                    $mail_sent = @mail($me , $subject,
                        "====================" . "\r\n" .
                        "name : " . $name . "\r\n" .
                        "phone : " . $phone . "\r\n" .
                        "email : " . $email . "\r\n" .
                        "====================" . "\r\n" .
                        $message, $headers);

                    if($mail_sent) {
                        $this->session->set_flashdata('email_success','Email Has Been Sent ! Thank You..');
                        redirect('contact');
                    } else {
                        $this->session->set_flashdata('email_fail',show_error($this->email->print_debugger()));
                        redirect('contact');
                    }
                } else {
                    return false;
                }

            } else {
                $this->session->set_flashdata('email_fail',show_error($this->email->print_debugger()));
                redirect('contact');
            }

        } else {
            $this->session->set_flashdata('email_fail',show_error($this->email->print_debugger()));
            redirect('contact');
        }
    }

    public function page() {
        $this->index();
    }

    public function imageCloud()
    {
        $hal = number_format($this->uri->segment(3));
        $per_page = 9;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['base_url'] = base_url() . '/frontpage/imagecloud/';
        $config['per_page'] = $per_page;
        $config['total_rows'] = $this->ImageModel->totalImage();

        $pcfg = array(
            'base_url'      => base_url() . '/frontpage/imagecloud/',
            'per_page'      => $per_page,
            'total_rows'    => $this->ImageModel->totalImage(),
            'first_link'    => 'First',
            'last_link'     => 'Last',
        );

        $this->pagination->initialize($config);

        $data = array(
            'images'  => $this->ImageModel->getImages($per_page,$hal),
            'jmldata' => $pcfg['total_rows']
        );

        // echo "<pre>"; print_r($data); die;
        $this->load->view('frontpage/imagecloud', $data);
    }

    public function blog()
    {
        $hal = number_format($this->uri->segment(3));
        $per_page = 10;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['base_url'] = base_url() . '/frontpage/blog/';
        $config['per_page'] = $per_page;
        $config['total_rows'] = $this->ArticleModel->totalArticle();

        $pcfg = array(
            'base_url'      => base_url() . '/frontpage/blog/',
            'per_page'      => $per_page,
            'total_rows'    => $this->ArticleModel->totalArticle(),
            'first_link'    => 'First',
            'last_link'     => 'Last',
        );

        $this->pagination->initialize($config);

        $data = array(
            'articles'  => $this->ArticleModel->getArticle($per_page,$hal),
            'jmldata'   => $pcfg['total_rows']
        );

        // echo "<pre>"; print_r($data); die;
        $this->load->view('frontpage/list_article', $data);
    }

    public function error404()
    {
        $this->load->view('errors/error404');
    }
}
