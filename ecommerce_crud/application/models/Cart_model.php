<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model
{
    function getProductsInfo($product_id)
    {

        $product= $this->db->select('*')->from('products')->where('id', $product_id)->get()->row();
        //echo '<pre>';
        //print_r($products);

        return $product;
    }
}