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

        $data['pembayaran'] = $this->m_metode_pembayaran->getData();
        $data['kategori'] = $this->m_keranjang->get_kategori_all();

        $this->load->view('_partials/header');
        $this->load->view('pages/keranjang/checkout', $data);
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
                'berat' => $this->input->post('berat'),
                'satuan' => $this->input->post('satuan'),
                'qty' => $this->input->post('jumlah'),

            );
            $this->cart->insert($data_produk);
            $this->session->set_flashdata('msg', '
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    Berhasil ditambahkan ke keranjang
                </div>');
            return redirect('home/produk');
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
            $berat = $cart['berat'];
            $satuan = $cart['satuan'];
            $amount = $price * $cart['qty'];
            $qty = $cart['qty'];
            $data = array(
                'rowid' => $rowid,
                'price' => $price,
                'gambar' => $gambar,
                'amount' => $amount,
                'berat' => $berat,
                'satuan' => $satuan,
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
        //-------------------------Input data transaksi--------------------------
        $cart = array(
            'user_id' => $this->input->post('user_id'),
            'pembayaran_id' => $this->input->post('pembayaran_id'),
            'no_invoice' => $this->input->post('invoice'),
            'nama_penerima' => $this->input->post('nama_penerima'),
            'telepon' => $this->input->post('telepon'),
            'provinsi' => $this->input->post('provinsi'),
            'kota' => $this->input->post('kota'),
            'alamat' => $this->input->post('alamat'),
            'kode_pos' => $this->input->post('kodepos'),
            'jasa_layanan' => $this->input->post('paket'),
            'estimasi' => $this->input->post('estimasi'),
            'ongkir' => $this->input->post('ongkir'),
            'berat' => $this->input->post('berat'),
            'status_pembayaran' => $this->input->post('status_pembayaran'),
            'status_pengiriman' => $this->input->post('status_pengiriman'),
            'ekspedisi' => $this->input->post('ekspedisi'),
            'subtotal' => $this->input->post('subtotal'),
            'total' => $this->input->post('total_bayar'),
        );
        $cart_id = $this->m_keranjang->cart($cart);
        //-------------------------Input data order------------------------------
        $order = array(
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
                );
                // $cek = $this->m_keranjang->cek_stok($item['id']);
                //if ($cek->jumlah < $item['qty']) {
                //} else {
                $this->m_keranjang->detail_order($data_detail);
                //    $stok = $cek->jumlah - $item['qty'];
                //   $this->m_keranjang->update_stok($item['id'], $stok);
                // }
            }
        }
        //-------------------------Hapus shopping cart--------------------------
        $this->cart->destroy();
        $data['kategori'] = $this->m_keranjang->get_kategori_all();
        $data['data'] = $this->m_order->getOrder();
        $this->session->set_flashdata('msg', '
            <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                Silahkan lakukan pembayaran dan akan di proses 2x24 jam.
            </div>');
        return redirect('order/pesananku');
    }
}
