<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model
{
    function get_all_top_product()
    {
        return $this->db->select('*')->from('products')->where('publication_status', 1)->get()->result();
    }

    protected function do_upload()
    {
        $config['upload_path'] = 'asset/uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 1000;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('product_image')) {
            $error = $this->upload->display_errors();
            return '';
//            $sdata['message'] = 'Please use a different image (max : width 1024, height 768, size 2 mb)';
//            $this->session->set_userdata($sdata);
        } else {
            $data = $this->upload->data();
//            echo '<pre>';
//            print_r($data);
//            exit();
            //$image_path = base_url("asset/uploads/$data[file_path]");
            $image_path = $config['upload_path'] . $data['file_name'];

            return $image_path;
        }
    }
//Array
//(
//[file_name] => bat4.jpg
//[file_type] => image/jpeg
//[file_path] => H:/Xampp/htdocs/ci/asset/uploads/
//[full_path] => H:/Xampp/htdocs/ci/asset/uploads/bat4.jpg
//[raw_name] => bat4
//[orig_name] => bat.jpg
//[client_name] => bat.jpg
//[file_ext] => .jpg
//[file_size] => 3.93
//[is_image] => 1
//[image_width] => 225
//[image_height] => 225
//[image_type] => jpeg
//[image_size_str] => width="225" height="225"
//)

    function dataSaving()
    {
        $data['category_id'] = $this->input->post('category_id');
        $data['brand_id'] = $this->input->post('brand_id');
        $data['product_name'] = $this->input->post('product_name');
        $data['product_price'] = $this->input->post('product_price');
        $data['product_quantity'] = $this->input->post('product_quantity');
        $data['short_description'] = $this->input->post('short_description');
        $data['long_description'] = $this->input->post('long_description');
        $data['publication_status'] = $this->input->post('publication_status');
        if ($this->input->post('top_product') == NULL) {
            $data['top_product'] = 0;
        } else {
            $data['top_product'] = 1;
        }
        return $data;
    }

    function saveProduct()
    {
        $data = array();
        $data = $this->dataSaving();
        $data['product_image'] = $this->do_upload();

//        echo '<pre>';
//        print_r($data);
//        exit();
        $this->db->insert('products', $data);
        redirect('product/add');
    }

    function manageProduct()
    {
        //$this->db->select('id,category_name,brand_name,product_name,product_price,product_quantity,product_image,publication_status,top_product');
//        $this->db->select('products.*,categories.category_name,brands.brand_name');
//        $this->db->from('products');
//        $this->db->join('categories', 'products.category_id = categories.id');
//        $this->db->join('brands', 'products.brand_id = brands.id');
//        $category_products = $this->db->get();


        $category_products['category_products'] = $this->db->select('products.*,categories.category_name,brands.brand_name')
            ->from('products')
            ->order_by("id","desc")
            ->join('categories', 'products.category_id = categories.id')
            ->join('brands', 'products.brand_id = brands.id')
            ->get()
            ->result();

//        echo '<pre>';
//        print_r($query->result());
        $data['body'] = $this->load->view('admin/product/manage-product', $category_products, true);
        $this->load->view('admin/admin-master', $data);


    }

    function publishProduct($id)
    {
        $data['publication_status'] = 0;
        $this->db->where('id', $id);
        $this->db->update('products', $data);
    }

    function unPublishProduct($id)
    {
        $data['publication_status'] = 1;
        $this->db->where('id', $id);
        $this->db->update('products', $data);
    }

    function editProduct($id)
    {
        $productById['categories'] = $this->category->get_all_category_With_id();
        $productById['brands'] = $this->brand->get_all_brand_With_id();
        $productById['productById'] = $this->db->select('*')->from('products')->where('id', $id)->get()->row();
//        print_r($productById);exit();
        $data['body'] = $this->load->view('admin/product/edit-product', $productById, true);
        $this->load->view('admin/admin-master', $data);
    }

    function deleteProduct($id)
    {
        $this->db->where('id', $id)->delete('products');
    }

    function updateProductInfo()
    {

        $data = array();
        $data = $this->dataSaving();
        $data['product_image'] = $this->do_upload();
        //echo '<pre>';
        //echo $this->input->post('id');
        //echo print_r();
        // exit();
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('products', $data);

    }

    function updateProductInfo_without_new_image()
    {
        $data = $this->dataSaving();
        //echo '<pre>';
        //echo $this->input->post('id');
        //echo print_r($data);
        // exit();
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('products', $data);

    }
}