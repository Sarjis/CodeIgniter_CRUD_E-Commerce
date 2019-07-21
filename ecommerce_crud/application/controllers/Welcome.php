<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('welcome_model');
        $this->load->model('product');
    }

    public function index()
    {
        $top_products['top_products'] = $this->product->get_all_top_product();
        $data['slider'] = $this->load->view('front-end/pages/slider', $top_products, true);

        $data['products'] = $this->welcome_model->get_all_published_product_info();

        $data['category_brand'] = $this->load->view('front-end/pages/category-brand', '', true);
        $data['front_end_body'] = $this->load->view('front-end/pages/front-end-body', $data, true);
        $data['title'] = 'Home';
        $this->load->view('front-end/master', $data);
    }

    public function accounts()
    {
        $data['title'] = 'Accounts';
        $data['slider'] = '';
        $data['category_brand'] = '<h1 align="center">This site not DEVELOPED yet</h1>';
        $this->load->view('front-end/master', $data);
    }

    public function productDetails($id)
    {
        $data['product_details'] = $this->db->select('*')->from('products')->where('id', $id)->get()->row();
        $data['title'] = 'Product Details';
        $data['slider'] = '';
        $data['front_end_body'] = $this->load->view('front-end/pages/product-details', $data, true);
        $data['category_brand'] = $this->load->view('front-end/pages/category-brand', '', true);
        $this->load->view('front-end/master', $data);
    }

    function notFoundPage()
    {
        $this->load->view('front-end/pages/not-found-page');
    }
}
