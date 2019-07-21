<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Category extends CI_Model
{
    function showCategory()
    {
        return $this->db->select('*')->from('categories')->get()->result();
    }
//    function storeCategory()
//    {
//        $data['category_name'] = $this->input->post('category_name', true);
//        $data['category_description'] = $this->input->post('category_description', true);
//        $data['publication_status'] = $this->input->post('publication_status', true);
//        $this->db->insert('categories', $data);
//    }
//
//    function get_all_published_category_name_with_id() // direct view -> model
//    {
//        // front -end use
//        $this->db->select('id,category_name');
//        $this->db->from('categories');
//        $this->db->where('publication_status', 1);
//        $data = $this->db->get();
//        $result = $data->result();
//        return $result;
//    }
//
//    function getAllCategoryInformation()
//    {
//        // back -end use
////        $this->db->select('*');
////        $this->db->from('categories');
////        $data = $this->db->get();
////        $result = $data->result();
//
//        $categories = $this->db->select('*')->from('categories')->get()->result();
////        echo '<pre>';
////        echo print_r($categories);
//        return $categories;
//    }
//
//    function get_all_category_With_id()
//    {
//        $categories = $this->db->select('id,category_name')->from('categories')->get()->result();
//        return $categories;
//    }
//
//    public function deleteCategory($id)
//    {
//        $this->db->where('id', $id);
//        $this->db->delete('categories');
////        $this->deleteCategory($id);
//        redirect('category/manage');
//    }
//
//    public function publishCategory($id)
//    {
//        $data['publication_status'] = 0;
//        $this->db->where('id', $id);
//        $this->db->update('categories', $data);
//    }
//
//    public function unPublishCategory($id)
//    {
//        $data['publication_status'] = 1;
//        $this->db->where('id', $id);
//        $this->db->update('categories', $data);
//    }
//
//    public function updateCategoryInfo()
//    {
//        $data['category_name'] = $this->input->post('category_name', true);
//        $data['category_description'] = $this->input->post('category_description', true);
//        $data['publication_status'] = $this->input->post('publication_status', true);
//        $this->db->where('id', $this->input->post('id', true));
//        $this->db->update('categories', $data);
//        $sdata['message'] = 'Category Updated Successfully!';
//        $this->session->set_userdata($sdata);
//    }
//
//    public function editCategory($id)
//    {
//        $data['category'] = $this->db->select('*')->from('categories')->where('id', $id)->get()->row();
//
//        return $data;
//    }
}