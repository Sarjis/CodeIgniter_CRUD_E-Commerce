<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product');
        $admin_id = $this->session->userdata('id');
        if ($admin_id == Null) {
            redirect('admin');
        }
    }

    function saveProduct()
    {
        $this->product->saveProduct();
        $sdata['message'] = 'Product Saved Successfully!';
        $this->session->set_userdata($sdata);
        redirect('product/add');
    }

    function addProduct()
    {

        $category_and_brand['categories'] = $this->category->get_all_category_With_id();
        $category_and_brand['brands'] = $this->brand->get_all_brand_With_id();

        $data['body'] = $this->load->view('admin/product/add-product', $category_and_brand, true);
        $this->load->view('admin/admin-master', $data);
    }

    function manageProduct()
    {
        $this->product->manageProduct();
    }

    function publishProduct($id)
    {
        $this->product->publishProduct($id);
        redirect('product/manage');

    }

    function unPublishProduct($id)
    {
        $this->product->unPublishProduct($id);
        redirect('product/manage');
    }

    function editProduct($id)
    {
        $this->product->editProduct($id);
    }

    function deleteProduct($id)
    {
        $this->product->deleteProduct($id);
    }

    function updateProductInfo()
    {
        if ($_FILES['product_image']['name'] == '' || $_FILES['product_image']['size'] == 0)
        {
            $this->product->updateProductInfo_without_new_image();
            $sdata['message'] = 'Product Saved Successfully. Note: Your previous image still same!';
            $this->session->set_userdata($sdata);
            redirect('product/manage');
        }
        else
            {
            $path = $this->input->post('product_image_old', true);
            $this->product->updateProductInfo();
            unlink($path);
            $sdata['message'] = "Product Saved Successfully. Note: You've selected new image!";
            $this->session->set_userdata($sdata);
            redirect('product/manage');
            }
    }
}