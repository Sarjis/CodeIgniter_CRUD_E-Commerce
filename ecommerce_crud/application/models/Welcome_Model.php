<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_Model extends CI_Model
{
    function get_all_published_product_info()
    {
        $get_all_published_product_info = $this->db->select('*')->from('products')->where('publication_status',1)->get()->result();
        return $get_all_published_product_info;
    }
}