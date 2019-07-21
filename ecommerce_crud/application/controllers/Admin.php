<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $admin_id = $this->session->userdata('id');

        if ($admin_id != Null) {
            redirect('dashboard');
        }
    }

    public function index()
    {
        $this->load->view('admin/login/login');
    }

    public function loginMethod()
    {

        $email = $this->input->post('email', TRUE);
        $password = md5($this->input->post('password', TRUE));

        $this->load->model('user');
        $db_result = $this->user->getUserData($email, $password);

        if ($db_result) {
            $sdata['id'] = $db_result->id;
            $sdata['name'] = $db_result->name;
            $this->session->set_userdata($sdata);
            redirect('dashboard');

        } else {
            $sdata['message'] = 'Invalid Email or Password';
            $this->session->set_userdata($sdata);
            redirect('admin');
        }
    }

    function register()
    {
        $this->load->view('admin/register/user_register');
    }

    function registration()
    {
        $this->form_validation->set_rules('name', 'name', 'required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('password1', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|matches[password1]');
        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|is_unique[users.email]');

        if ($this->form_validation->run()) {
            $this->load->model('user');
            $this->user->storeUserData();

            $sdata['message'] = 'Now you can login here !';
            $this->session->set_userdata($sdata);
            redirect('admin');
        } else {
//            $sdata['message'] = 'Information is incorrectly typed !';
//            $this->session->set_userdata($sdata);
            $this->load->view('admin/register/user_register');
            //redirect('register');
        }

//        echo '<pre>';
//        echo print_r($_POST);
    }

}
