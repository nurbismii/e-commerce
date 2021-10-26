<?php
defined('BASEPATH') or exit('No direct script access allowed');

class home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('m_product');
        $this->load->model('m_category');
    }
    public function index()
    {
        $data['kategori'] = $this->m_category->getData();
        $this->load->view('_partials/header');
        $this->load->view('pages/home/home', $data);
        $this->load->view('_partials/js');
    }

    public function kategori()
    {
        $data['kategori'] = $this->m_category->getData();
        $this->load->view('_partials/header');
        $this->load->view('pages/home/kategori', $data);
        $this->load->view('_partials/js');
    }

    public function produk()
    {
        $data['produk'] = $this->m_product->get();
        $this->load->view('_partials/header');
        $this->load->view('pages/home/produk', $data);
        $this->load->view('_partials/js');
    }

    public function tentang()
    {
        $data['produk'] = $this->m_product->get();
        $this->load->view('_partials/header');
        $this->load->view('pages/home/produk', $data);
        $this->load->view('_partials/js');
    }

    public function kontak()
    {
        $data['produk'] = $this->m_product->get();
        $this->load->view('_partials/header');
        $this->load->view('pages/home/produk', $data);
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
