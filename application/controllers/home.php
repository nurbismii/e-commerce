<?php
defined('BASEPATH') or exit('No direct script access allowed');

class home extends CI_Controller
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
        $data['produk'] = $this->m_product->get();
        $this->load->view('_partials/header');
        $this->load->view('pages/transaksi/produk/v_produk', $data);
        $this->load->view('_partials/js');
    }
    public function hasil_pencarian()
    {
        $data['cari'] = $this->m_product->cari_produk();
        $this->load->view('_partials/header');
        $this->load->view('pages/result', $data);
        $this->load->view('_partials/js');
    }
}
