<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BrandController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('brand');
        $admin_id = $this->session->userdata('id');
        if ($admin_id == Null) {
            redirect('admin');
        }
    }

    function index()
    {
        $data['body'] = $this->load->view('admin/brand/manage-brand', '', true);
        $this->load->view('admin/admin-master', $data);
    }

    public function addBrand()
    {
        $data['body'] = $this->load->view('admin/brand/add-brand', '', true);
        $this->load->view('admin/admin-master', $data);
    }

    public function saveBrand()
    {
        $this->brand->storeBrand();
        $sdata['message'] = 'Brand Saved Successfully';
        $this->session->set_userdata($sdata);
        redirect('brand/add');
    }

    public function manageBrand()
    {
        $brands['brands'] = $this->brand->getAllBrandInformation();
        $data['body'] = $this->load->view('admin/brand/manage-brand', $brands, true);
        $this->load->view('admin/admin-master', $data);
    }

    public function publishBrand($id)
    {
        $this->brand->publishBrand($id);
        redirect('brand/manage');
    }

    public function unPublishBrand($id)
    {
        $this->brand->unPublishBrand($id);
        redirect('brand/manage');
    }

    public function updateBrandInfo()
    {
        $this->brand->updateBrandInfo();
        $sdata['message'] = 'Brand Updated Successfully';
        $this->session->set_userdata($sdata);
        redirect('brand/manage');
    }

    public function editBrand($id)
    {
        $this->brand->editBrand($id);
    }

    public function deleteBrand($id)
    {
        $this->brand->updateBrandInfo($id);
        redirect('brand/manage');
    }

}