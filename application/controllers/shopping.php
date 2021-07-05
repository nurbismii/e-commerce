<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class shopping extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('m_product');
        $this->load->model('m_keranjang');
    }

    public function tampil_cart()
    {
        $data['produk'] = $this->m_keranjang->get_produk_all();
        $data['kategori'] = $this->m_keranjang->get_kategori_all();
        $this->load->view('_partials/header');
        $this->load->view('pages/transaksi/keranjang/cart', $data);
        $this->load->view('_partials/js');
    }

    public function check_out()
    {
        $data['kategori'] = $this->m_keranjang->get_kategori_all();
        $this->load->view('_partials/header');
        $this->load->view('pages/transaksi/check_out', $data);
        $this->load->view('_partials/js');
    }

    public function detail_produk()
    {
        $id = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['kategori'] = $this->m_keranjang->get_kategori_all();
        $data['data'] = $this->m_product->getDataDetail($id);
        $this->load->view('_partials/header');
        $this->load->view('pages/transaksi/produk/detail_produk', $data);
        $this->load->view('_partials/js');
    }

    function tambah()
    {
        $data_produk = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('nama'),
            'price' => $this->input->post('harga'),
            'gambar' => $this->input->post('foto'),
            'qty' => $this->input->post('jumlah')
        );
        $this->cart->insert($data_produk);
        $this->session->set_flashdata('msg', '
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                Produk berhasil ditambahkan ke keranjang
            </div>');
        redirect('product/all_category');
    }

    function hapus($rowid)
    {
        if ($rowid == "all") {
            $this->cart->destroy();
        } else {
            $data = array(
                'rowid' => $rowid,
                'qty' => 0
            );
            $this->cart->update($data);
        }
        redirect('shopping/tampil_cart');
    }

    function ubah_cart()
    {
        $cart_info = $_POST['cart'];
        foreach ($cart_info as $id => $cart) {
            $rowid = $cart['rowid'];
            $price = $cart['price'];
            $gambar = $cart['gambar'];
            $amount = $price * $cart['qty'];
            $qty = $cart['qty'];
            $data = array(
                'rowid' => $rowid,
                'price' => $price,
                'gambar' => $gambar,
                'amount' => $amount,
                'qty' => $qty
            );
            $this->cart->update($data);
        }
        redirect('shopping/tampil_cart');
    }

    public function proses_order()
    {
        //-------------------------Input data transaksi--------------------------
        $data_user = array(
            'id_user' => $this->input->post('user_id'),
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'telp' => $this->input->post('telp')
        );
        $transaksi_id = $this->m_keranjang->tambah_transaksi($data_user);
        //-------------------------Input data order------------------------------
        $data_order = array(
            'tanggal' => date('Y-m-d H:i:s'),
            'transaksi_id' => $transaksi_id
        );
        $id_order = $this->m_keranjang->tambah_order($data_order);
        //-------------------------Input data detail order-----------------------
        if ($cart = $this->cart->contents()) {
            foreach ($cart as $item) {
                $data_detail = array(
                    'order_id' => $id_order,
                    'produk' => $item['id'],
                    'qty' => $item['qty'],
                    'harga' => $item['price']
                );
                $this->m_keranjang->tambah_detail_order($data_detail);
            }
        }
        //-------------------------Hapus shopping cart--------------------------
        $this->cart->destroy();
        $data['kategori'] = $this->m_keranjang->get_kategori_all();
        $this->load->view('_partials/header');
        $this->load->view('pages/transaksi/sukses', $data);
        $this->load->view('_partials/js');
    }
}
