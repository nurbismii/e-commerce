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
        $id = $this->session->userdata('id_user');
        $data['data'] = $this->m_order->join($id);
        $this->load->view('_partials/header');
        $this->load->view('pages/order/order', $data);
        $this->load->view('_partials/js');
    }
    public function update()
    {
        $id = $this->input->post('transaksi_id');
        $status = $this->input->post('status');

        $data = array(
            'id' => $id,
            'status' => $status

        );
        $this->m_order->update($data, $id);
        $this->session->set_flashdata('msg', '
        <div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            Status pengiriman berhasil diubah
        </div>');
        redirect('home');
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
