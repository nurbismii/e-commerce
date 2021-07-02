<?php
defined('BASEPATH') or exit('No direct script access allowed');

class transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_transaksi');
    }
    public function index()
    {
        $this->load->view('_partials/header');
        $this->load->view('pages/transaksi/');
        $this->load->view('_partials/js');
    }

    public function add()
    {
        $id_produk = $this->input->post('id_produk');
        $id_user = $this->input->post('id_user');
        $jumlah = $this->input->post('jumlah');

        $insert = array(
            'id_produk' => $id_produk,
            'id_user' => $id_user,
            'jumlah' => $jumlah,
        );

        $this->m_transaksi->setData($insert);
        $this->session->set_flashdata('msg', '
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            Item telah ditambahkan ke kerajang belanja
        </div>');
        redirect('transaksi/cart');
    }
    public function update()
    {
        $id_cart = $this->input->post('id_cart');
        $id_produk = $this->input->post('id_produk');
        $id_user = $this->input->post('id_user');
        $jumlah = $this->input->post('jumlah');

        $update = array(
            'id_cart' => $id_cart,
            'id_produk' => $id_produk,
            'id_user' => $id_user,
            'jumlah' => $jumlah,
        );
        $this->m_transaksi->updateData($update, $id_cart);
        $this->session->set_flashdata('msg', '
        <div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            Isi keranjang berhasil diubah
        </div>');
        redirect('transaksi/cart');
    }
    public function delete($id)
    {
        $this->m_transaksi->deleteData($id);
        $this->session->set_flashdata('msg', '
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            Produk berhasil dihapus dari keranjang
        </div>');
        redirect('transaksi/cart');
    }

    public function cart()
    {
        $data['cart'] = $this->m_transaksi->getData();
        $data['cart_'] = $this->m_transaksi->get();
        $this->load->view('_partials/header');
        $this->load->view('pages/transaksi/keranjang/cart', $data);
        $this->load->view('_partials/js');
    }
}
