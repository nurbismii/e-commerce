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
        $this->load->model('m_category');
    }
    public function index()
    {
        check_not_login();
        $data['data'] = $this->m_product->getData();
        $data['data_'] = $this->m_product->get();
        $this->load->view('_partials/header');
        $this->load->view('pages/product/product', $data);
        $this->load->view('_partials/js');
    }

    public function add()
    {
        check_not_login();
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

        $data['kategori'] = $this->m_category->getData();

        $this->load->view('_partials/header');
        $this->load->view('pages/product/tambah', $data);
        $this->load->view('_partials/js');
    }
    public function edit($id_produk = null)
    {
        check_not_login();
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

        $data['kategori'] = $this->m_category->getData();
        $this->load->view('_partials/header');
        $this->load->view('pages/product/edit', $data);
        $this->load->view('_partials/js');
    }
    public function delete($id)
    {
        check_not_login();
        $this->m_product->deleteData($id);
        $this->session->set_flashdata('msg', '
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                Produk berhasil dihapus
            </div>');
        redirect('product');
    }

    public function category($id_kategori = null)
    {
        $kategori = $this->m_category->get_kategori($id_kategori);
        $data = array(
            'title' => $kategori,
            'produk' => $this->m_category->get_all_produk($id_kategori),
            'isi' => 'v_produk'
        );
        $this->load->view('_partials/header');
        $this->load->view('pages/home/produk', $data);
        $this->load->view('_partials/js');
    }

    public function detail()
    {
        $id = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['kategori'] = $this->m_keranjang->get_kategori_all();
        $data['data'] = $this->m_product->getDataDetail($id);
        $this->load->view('_partials/header');
        $this->load->view('pages/home/detail_produk', $data);
        $this->load->view('_partials/js');
    }

    public function show()
    {
        $data['produk'] = $this->m_product->get();
        $this->load->view('_partials/header');
        $this->load->view('pages/home/produk', $data);
        $this->load->view('_partials/js');
    }

    function tambah()
    {
        check_already_login();
        if (!$this->session->userdata('id_user')) {
            $this->load->view('_partials/auth_header');
            $this->load->view('auth/login');
            $this->load->view('_partials/auth_js');
        } else {
            $data_produk = array(
                'id' => $this->input->post('id'),
                'name' => $this->input->post('nama'),
                'price' => $this->input->post('harga'),
                'gambar' => $this->input->post('foto'),
                'qty' => $this->input->post('jumlah')
            );
            $this->cart->insert($data_produk);
            $this->session->set_flashdata('msg', '
                <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    Produk berhasil ditambahkan ke keranjang
                </div>');
            return redirect('product/kategori');
        }
    }
}
