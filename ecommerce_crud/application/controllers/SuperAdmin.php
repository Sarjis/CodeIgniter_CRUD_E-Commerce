<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuperAdmin extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $admin_id = $this->session->userdata('id');

        if ($admin_id == Null) {
            redirect('admin');
        }
    }

    function index()
    {
        $data['body'] = $this->load->view('admin/dashboard/dashboard', '', true);
        $this->load->view('admin/admin-master', $data);
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('name');
        $sdata = array();
        $sdata['message'] = 'You are successfully logout !';
        $this->session->set_userdata($sdata);

        redirect('admin');
    }
}