<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('m_product');
        $this->load->model('m_keranjang');
        $this->load->model('m_users');
    }
    public function index()
    {
        $data['paket_terkirim'] = $this->m_keranjang->paket_terkirim();
        $data['jumlah_customer'] = $this->m_users->jumlah_customer();
        $data['transaksi_tertunda'] = $this->m_keranjang->transaksi_tertunda();
        $this->load->view('_partials/header');
        $this->load->view('pages/home/dashboard', $data);
        $this->load->view('_partials/js');
    }
}
