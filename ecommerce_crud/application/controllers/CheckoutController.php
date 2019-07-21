<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CheckoutController extends CI_Controller
{
    function index()
    {
        $data['checkout'] = $this->load->view('front-end/pages/checkout', '', true);
        $data['title'] = 'Checkout';
        $this->load->view('front-end/master', $data);
    }

}