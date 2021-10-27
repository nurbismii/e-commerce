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
        if (($this->session->userdata('id_role') == 2) || ($this->session->userdata('id_role') == "")) {
            $data['kategori'] = $this->m_category->getData();
            $this->load->view('_partials/header');
            $this->load->view('pages/home/home', $data);
            $this->load->view('_partials/js');
        } else {
            $this->load->view('_partials/header');
            $this->load->view('pages/home/dashboard');
            $this->load->view('_partials/js');
        }
    }

    public function kategori($id_kategori = null)
    {
        $kategori = $this->m_category->get_kategori($id_kategori);
        $data = array(
            'title' => $kategori,
            'produk' => $this->m_category->get_all_produk($id_kategori),
            'isi' => 'v_produk'
        );
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
        $this->load->view('_partials/header');
        $this->load->view('pages/home/tentang');
        $this->load->view('_partials/js');
    }

    public function kontak()
    {

        $this->load->view('_partials/header');
        $this->load->view('pages/home/kontak');
        $this->load->view('_partials/js');
    }

    public function cari()
    {
        $data['cari'] = $this->m_product->cari_produk();
        $this->load->view('_partials/header');
        $this->load->view('pages/result', $data);
        $this->load->view('_partials/js');
    }

    function tambah()
    {
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
            return redirect('home/kategori');
        }
    }
}
