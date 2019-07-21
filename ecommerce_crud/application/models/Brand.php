<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends CI_Model
{
    function storeBrand()
    {
        $data['brand_name'] = $this->input->post('brand_name');
        $data['brand_description'] = $this->input->post('brand_description');
        $data['publication_status'] = $this->input->post('publication_status');
        $this->db->insert('brands', $data);
    }

    function getAllBrandInformation()
    {
        return $this->db->select('*')->from('brands')->get()->result();
    }

    function get_all_brand_With_id()
    {
        $brands = $this->db->select('id,brand_name')->from('brands')->get()->result();
        return $brands;
    }

    function get_all_published_brand_name_with_id() //direct view -> model
    {
        $brands = $this->db->select('id,brand_name')->from('brands')->where('publication_status',1)->get()->result();
        return $brands;
    }

    public function publishBrand($id)
    {
        $data['publication_status'] = 0;
        $this->db->where('id', $id);
        $this->db->update('brands', $data);
//        echo '<pre>';
//        print_r($data['publication_status']);
//        exit();
        //redirect('brand/manage');
    }

    public function unPublishBrand($id)
    {
        $data['publication_status'] = 1;
        $this->db->where('id', $id);
        $this->db->update('brands', $data);
       // redirect('brand/manage');
    }

    public function updateBrandInfo()
    {
        $data['brand_name'] = $this->input->post('brand_name', true);
        $data['brand_description'] = $this->input->post('brand_description', true);
        $data['publication_status'] = $this->input->post('publication_status', true);
        $this->db->where('id', $this->input->post('id', true));
        $this->db->update('brands', $data);
        //redirect('brand/manage');
    }

    public function editBrand($id)
    {
        $brand['brand'] = $this->db->select('*')->from('brands')->where('id', $id)->get()->row();

        $data['body'] = $this->load->view('admin/brand/edit-brand', $brand, true);
        $this->load->view('admin/admin-master', $data);
    }

    public function deleteBrand($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('brands');
        //redirect('brand/manage');
    }
}