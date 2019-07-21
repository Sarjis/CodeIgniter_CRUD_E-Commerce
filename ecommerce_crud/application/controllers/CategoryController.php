<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $admin_id = $this->session->userdata('id');

        if ($admin_id == Null) {
            redirect('admin');
        }
    }

    // ajax start
    function index()
    {
        $data['body'] = $this->load->view('admin/category/manage-category', '', true);
        $this->load->view('admin/admin-master', $data);
    }

    function showCategory()
    {
        $data=$this->category->showCategory();
        echo json_encode($data);
    }


    // ajax end


    public function addCategory()
    {
        $data['body'] = $this->load->view('admin/category/add-category', '', true);
        $this->load->view('admin/admin-master', $data);
    }

    public function saveCategory()
    {
//        $this->load->model('category');
        $this->category->storeCategory();

        $sdata['message'] = 'Category Saved Successfully';
        $this->session->set_userdata($sdata);
        redirect('category/add');
    }

    public function manageCategory()
    {
//        $this->load->model('category');
        $categories['categories'] = $this->category->getAllCategoryInformation();
//        echo '<pre>';
//        echo print_r($categories);
        $data['body'] = $this->load->view('admin/category/manage-category', $categories, true);
        $this->load->view('admin/admin-master', $data);
    }

    public function publishCategory($id)
    {
        $this->category->publishCategory($id);
        redirect('category/manage');
    }

    public function unPublishCategory($id)
    {
        $this->category->unPublishCategory($id);
        redirect('category/manage');
    }

    public function updateCategoryInfo()
    {
        $this->category->updateCategoryInfo();
        redirect('category/manage');
    }

    public function editCategory($id)
    {
        $data = $this->category->editCategory($id);
        $data['body'] = $this->load->view('admin/category/edit-category', $data, true);
        $this->load->view('admin/admin-master', $data);
    }

    public function deleteCategory($id)
    {
//        $this->db->where('id', $id);
//        $this->db->delete('categories');
        $this->category->deleteCategory($id);
        redirect('category/manage');
    }
}