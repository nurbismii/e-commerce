<?php
defined('BASEPATH') or exit('No direct script access allowed');

class order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('m_order');
    }
    public function index()
    {
        $data['data'] = $this->m_order->getOrder();
        $this->load->view('_partials/header');
        $this->load->view('pages/order/orderan', $data);
        $this->load->view('_partials/js');
    }

    public function pesananku()
    {
        $id = $this->session->userdata('id_user');
        $data['data'] = $this->m_order->join($id);
        $this->load->view('_partials/header');
        $this->load->view('pages/order/order', $data);
        $this->load->view('_partials/js');
    }

    public function update()
    {

        $id = $this->input->post('id');
        $status_pengiriman = $this->input->post('status_pengiriman');
        $status_pembayaran = $this->input->post('status_pembayaran');
        $no_resi = $this->input->post('no_resi');

        $produk_id = $this->input->post('produk_id');
        $qty = $this->input->post('qty');

        if (!isset($id)) redirect('order');

        $order = $this->m_order;
        $validation = $this->form_validation;
        $validation->set_rules($order->rules());

        if ($validation->run()) {

            $datas = array(
                'id' => $id,
                'status_pengiriman' => $status_pengiriman,
                'status_pembayaran' => $status_pembayaran,
                'no_resi' => $no_resi
            );
            $this->m_order->statusUpdate($datas, $id);
        } else {
            $this->session->set_flashdata('msg', '
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                Gagal melakukan perubahan
            </div>');
            return redirect('order');
        }

        $cek = $this->m_keranjang->cek_stok($produk_id);

        if ($cek->jumlah < $qty) {
            $this->session->set_flashdata('msg', '
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    Stok kurang, ubah stok segera!!!
                </div>');
        } else {
            $stok = $cek->jumlah - $qty;
            $this->m_keranjang->update_stok($produk_id, $stok);
            $this->session->set_flashdata('msg', '
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    Berhasil melakukan perubahan
                </div>');
            return redirect('order');
        }
    }

    public function bukti_bayar($id = null)
    {
        if (!isset($id)) redirect('order');

        $order = $this->m_order;
        $validation = $this->form_validation;
        $validation->set_rules($order->rules());

        if ($validation->run()) {

            $order->bukti_bayar();

            $this->session->set_flashdata('msg', '
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                Bukti bayar berhasil di upload
            </div>');
            return redirect('order');
        }

        $data['data'] = $order->getOrderDetail($id);
        if (!$data['data']) show_404();

        $this->load->view('_partials/header');
        $this->load->view('pages/order/detail_order', $data);
        $this->load->view('_partials/js');
    }

    #delete order history
    public function deleteData($id)
    {
        $this->m_order->deleteData($id);
        $this->session->set_flashdata('msg', '
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                Pembelian berhasil dihapus
            </div>');
        return redirect('order');
    }
}
