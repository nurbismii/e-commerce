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
        $data['data'] = $this->m_order->getData();
        $data['info'] = $this->m_order->get_data_info();
        $this->load->view('_partials/header');
        $this->load->view('pages/transaksi/order', $data);
        $this->load->view('_partials/js');
    }
    public function add()
    {
        $order = $this->m_order;

        $data = array(
            'produk_id' => $this->input->post('produk_id'),
            'user_id' => $this->input->post('user_id'),
            'pesan' => $this->input->post('pesan'),
            'status' => $this->input->post('status'),
        );
        $order->setData($data);
        $this->session->set_flashdata('msg', '
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            Konfirmasi telah dikirim
        </div>');
        redirect('order');
    }
    public function update()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');

        $data = array(
            'id' => $id,
            'status' => $status
        );
        $this->m_order->update($data, $id);
        $this->m_order->deleteData($id);
        $this->session->set_flashdata('msg', '
        <div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            Status pengiriman berhasil diubah
        </div>');
        redirect('order');
    }
    #delete order history
    public function delete($id)
    {
        $this->m_order->deleteData($id);
        $this->session->set_flashdata('msg', '
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                Produk berhasil dihapus
            </div>');
        redirect('shopping/history');
    }
}
