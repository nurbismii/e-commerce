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
        $this->load->view('_partials/header');
        $this->load->view('pages/transaksi/order', $data);
        $this->load->view('_partials/js');
    }
    public function add()
    {
        $order = $this->m_order;

        $data = array(
            'transaksi_id' => $this->input->post('transaksi_id'),
            'produk_id' => $this->input->post('produk_id'),
            'user_id' => $this->input->post('user_id'),
            'pesan' => $this->input->post('pesan'),
            'status' => $this->input->post('status'),
        );

        $order->setData($data);
        $this->m_order->deleteData($_POST['transaksi_id']);
        $this->session->set_flashdata('msg', '
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            Konfirmasi telah dikirim
        </div>');
        redirect('order');
    }
    public function edit($id_produk = null)
    {

        if (!isset($id_produk)) redirect('order');

        $order = $this->m_order;
        $validation = $this->form_validation;
        $validation->set_rules($order->rules());

        if ($validation->run()) {

            $order->updateData();

            $this->session->set_flashdata('msg', '
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                Produk berhasil diubah
            </div>');
            redirect('order');
        }

        $data['data'] = $order->getDataDetail($id_produk);
        if (!$data['data']) show_404();

        $this->load->view('_partials/header');
        $this->load->view('pages/order/edit', $data);
        $this->load->view('_partials/js');
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
