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
        $this->load->model('m_metode_pembayaran');
        $this->load->model('m_order');
    }

    public function cart()
    {
        $data['produk'] = $this->m_keranjang->get_produk_all();
        $data['kategori'] = $this->m_keranjang->get_kategori_all();
        $this->load->view('_partials/header');
        $this->load->view('pages/keranjang/cart', $data);
        $this->load->view('_partials/js');
    }

    public function checkout()
    {
        $data['kategori'] = $this->m_keranjang->get_kategori_all();
        $this->load->view('_partials/header');
        $this->load->view('pages/keranjang/checkout', $data);
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
            return redirect('product/show');
        }
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
        $this->session->set_flashdata('msg', '
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                Isi keranjang berhasil diubah
            </div>');
        redirect('shopping/cart');
    }

    function updatecart()
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
        $this->session->set_flashdata('msg', '
            <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                Isi keranjang berhasil diubah
            </div>');
        redirect('shopping/cart');
    }

    public function order()
    {
        //-------------------------Input data transaksi--------------------------
        $data_user = array(
            'id_user' => $this->input->post('user_id'),
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'telp' => $this->input->post('telp'),
            'status' => $this->input->post('status')
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
                    'harga' => $item['price'],
                );
                $cek = $this->m_keranjang->cek_stok($item['id']);
                if ($cek->jumlah < $item['qty']) {
                    $this->session->set_flashdata('msg', '
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        Produk yang di inginkan tidak mencukupi atau lagi kosong silahkan lihat stok yang tersedia
                    </div>');
                    redirect('product/show');
                } else {
                    $this->m_keranjang->tambah_detail_order($data_detail);
                    $stok = $cek->jumlah - $item['qty'];
                    $this->m_keranjang->update_stok($item['id'], $stok);
                }
            }
        }
        //-------------------------Hapus shopping cart--------------------------
        $this->cart->destroy();
        $data['kategori'] = $this->m_keranjang->get_kategori_all();
        $data['data'] = $this->m_metode_pembayaran->getData();
        $this->session->set_flashdata('msg', '
            <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                Silahkan lakukan pembayaran dan akan di proses 3x24 jam.
                Konfirmasi ke nomor 085282810040 Setelah melakukan pembayaran.
            </div>');
        $this->load->view('_partials/header');
        $this->load->view('pages/transaksi/order-success', $data);
        $this->load->view('_partials/js');
    }
    # History belanja
    public function history()
    {
        $data['data'] = $this->m_order->get_data_info();
        $this->load->view('_partials/header');
        $this->load->view('pages/riwayat/history', $data);
        $this->load->view('_partials/js');
    }
}
