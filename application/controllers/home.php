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
        $this->load->view('_partials/header');
        $this->load->view('pages/home/index');
        $this->load->view('_partials/js');
    }
    public function cari()
    {
        $data['cari'] = $this->m_product->cari_produk();
        $this->load->view('_partials/header');
        $this->load->view('pages/result', $data);
        $this->load->view('_partials/js');
    }
}
