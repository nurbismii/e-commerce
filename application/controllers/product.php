<?php
defined('BASEPATH') or exit('No direct script access allowed');

class product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('m_product');
        $this->load->model('m_keranjang');
    }
    public function index()
    {
        $data['data'] = $this->m_product->getData();
        $data['data_'] = $this->m_product->get();
        $this->load->view('_partials/header');
        $this->load->view('pages/product/product', $data);
        $this->load->view('_partials/js');
    }

    public function add()
    {
        $product = $this->m_product;
        $validation = $this->form_validation;

        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->setData();
            $this->session->set_flashdata('msg', '
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                Produk berhasil ditambahkan
            </div>');
            redirect('product');
        }
        $this->load->view('_partials/header');
        $this->load->view('pages/product/tambah');
        $this->load->view('_partials/js');
    }
    public function edit($id_produk = null)
    {

        if (!isset($id_produk)) redirect('product');

        $product = $this->m_product;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {

            $product->updateData();

            $this->session->set_flashdata('msg', '
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                Produk berhasil diubah
            </div>');
            redirect('product');
        }

        $data['data'] = $product->getDataDetail($id_produk);
        if (!$data['data']) show_404();

        $this->load->view('_partials/header');
        $this->load->view('pages/product/edit', $data);
        $this->load->view('_partials/js');
    }
    public function delete($id)
    {
        $this->m_product->deleteData($id);
        $this->session->set_flashdata('msg', '
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                Produk berhasil dihapus
            </div>');
        redirect('product');
    }
    public function all_category()
    {
        $data['data'] = $this->m_product->getData();
        $this->load->view('_partials/header');
        $this->load->view('pages/transaksi/produk/v_produk', $data);
        $this->load->view('_partials/js');
    }
    public function shirt()
    {
        $data['data'] = $this->m_product->getData();
        $data['data_'] = $this->m_product->get();
        $this->load->view('_partials/header');
        $this->load->view('pages/transaksi/produk/baju', $data);
        $this->load->view('_partials/js');
    }
    public function glasses()
    {
        $data['data'] = $this->m_product->getData();
        $data['data_'] = $this->m_product->get();
        $this->load->view('_partials/header');
        $this->load->view('pages/transaksi/produk/kacamata', $data);
        $this->load->view('_partials/js');
    }
    public function pants()
    {
        $data['data'] = $this->m_product->getData();
        $data['data_'] = $this->m_product->get();
        $this->load->view('_partials/header');
        $this->load->view('pages/transaksi/produk/celana', $data);
        $this->load->view('_partials/js');
    }
    public function sweater()
    {
        $data['data'] = $this->m_product->getData();
        $data['data_'] = $this->m_product->get();
        $this->load->view('_partials/header');
        $this->load->view('pages/transaksi/produk/sweater', $data);
        $this->load->view('_partials/js');
    }
    public function shoes()
    {
        $data['data'] = $this->m_product->getData();
        $data['data_'] = $this->m_product->get();
        $this->load->view('_partials/header');
        $this->load->view('pages/transaksi/produk/sepatu', $data);
        $this->load->view('_partials/js');
    }
}
