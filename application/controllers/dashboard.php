<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('m_product');
    }
    public function index()
    {
        check_not_login();
        $this->load->view('_partials/header');
        $this->load->view('dashboard');
        $this->load->view('_partials/js');
    }
    public function home()
    {
        $keyword = $this->input->get('keyword');
        $data = $this->m_product->ambil_data($keyword);
        $data = array(
            'keyword'    => $keyword,
            'produk'        => $data
        );
        $data['produk'] = $this->m_product->get();
        $this->load->view('_partials/header');
        $this->load->view('pages/transaksi/produk/v_produk', $data);
        $this->load->view('_partials/js');
    }
}
