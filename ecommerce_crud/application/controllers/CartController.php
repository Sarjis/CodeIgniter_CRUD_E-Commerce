<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CartController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cart_model');
       // $this->load->library('cart');
    }

    function addToCart()
    {
        $product_id = $this->input->post('id');
        $product = $this->Cart_model->getProductsInfo($product_id);

        $qty = $this->input->post('product_quantity');

        $cartData = array(
            'id' => $product->id,
            'qty' => $qty,
            'price' => $product->product_price,
            'name' => $product->product_name,
            'options' => array('product_image' => $product->product_image)
        );

        $this->cart->insert($cartData);

        redirect('cart/show');
    }

    function showCart()
    {
        $data['title'] = 'cart';
        $data['front_end_body'] = $this->load->view('front-end/pages/cart-products', '', true);
        $this->load->view('front-end/master', $data);

    }

    function cartDelete($rowId)
    {
        $data = array(
            'rowid' => $rowId,
            'qty' => 0
        );

        $this->cart->update($data);

        redirect('cart/show');
    }

    function updateCartInfo()
    {
        $rowId = $this->input->post('rowid');
        $qty = $this->input->post('product_quantity');

        $data = array(
            'rowid' => $rowId,
            'qty' => $qty
        );

        $this->cart->update($data);
        redirect('cart/show');
    }
}
