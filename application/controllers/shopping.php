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
        $this->load->model('m_alamat_pengiriman');
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
        $id = $this->session->userdata('id_user');

        $data['pembayaran'] = $this->m_metode_pembayaran->getData();
        $data['kategori'] = $this->m_keranjang->get_kategori_all();
        $data['alamat'] = $this->m_alamat_pengiriman->getData($id);

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
    #menghapus isi keranajng
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
    #update keranjang
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
    #proses buat pesanan
    public function order()
    {
        $id = $this->session->userdata('id_user');

        if (!$this->m_alamat_pengiriman->getData($id)) {
            $this->session->set_flashdata('msg', '
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        Masukan alamat pengiriman terlebih dahulu
                    </div>');
            redirect('shopping/checkout');
        } else {
            //-------------------------Input data transaksi--------------------------
            $cart = array(
                'user_id' => $this->input->post('user_id'),
                'no_invoice' => $this->input->post('invoice'),
                'status_pembayaran' => $this->input->post('status_pembayaran'),
                'status_pengiriman' => $this->input->post('status_pengiriman'),
                'subtotal' => $this->input->post('subtotal'),
                'total' => $this->input->post('total'),
                'tanggal_pesanan' => date('Y-m-d H:i:s')
            );
            $cart_id = $this->m_keranjang->cart($cart);
            //-------------------------Input data order------------------------------
            $order = array(
                'alamat_id' => $this->input->post('alamat_id'),
                'tanggal' => date('Y-m-d H:i:s'),
                'cart_id' => $cart_id
            );
            $order_id = $this->m_keranjang->order($order);
            //-------------------------Input data detail order-----------------------
            if ($cart = $this->cart->contents()) {
                foreach ($cart as $item) {
                    $data_detail = array(
                        'order_id' => $order_id,
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
                        $this->m_keranjang->detail_order($data_detail);
                        $stok = $cek->jumlah - $item['qty'];
                        $this->m_keranjang->update_stok($item['id'], $stok);
                    }
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
        $this->load->view('pages/keranjang/order-success', $data);
        $this->load->view('_partials/js');
    }
}
