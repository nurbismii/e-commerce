<?php
defined('BASEPATH') or exit('No direct script access allowed');

class metode_pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('m_metode_pembayaran');
    }
    public function index()
    {
        $data['data'] = $this->m_metode_pembayaran->getData();
        $this->load->view('_partials/header');
        $this->load->view('pages/pembayaran/pembayaran', $data);
        $this->load->view('_partials/js');
    }
    public function add()
    {
        $pembayaran = $this->m_metode_pembayaran;
        $validation = $this->form_validation;

        $validation->set_rules($pembayaran->rules());

        if ($validation->run()) {
            $pembayaran->setData();
            $this->session->set_flashdata('msg', '
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                Berhasil ditambahkan
            </div>');
            redirect('metode_pembayaran');
        }
        $this->load->view('_partials/header');
        $this->load->view('pages/pembayaran/tambah');
        $this->load->view('_partials/js');
    }
    public function edit($id_norek = null)
    {

        if (!isset($id_norek)) redirect('metode_pembayaran');

        $pembayaran = $this->m_metode_pembayaran;
        $validation = $this->form_validation;
        $validation->set_rules($pembayaran->rules());

        if ($validation->run()) {

            $pembayaran->updateData();

            $this->session->set_flashdata('msg', '
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                Berhasil diubah
            </div>');
            redirect('metode_pembayaran');
        }
        $data['data'] = $pembayaran->getDataDetail($id_norek);
        if (!$data['data']) show_404();

        $this->load->view('_partials/header');
        $this->load->view('pages/pembayaran/edit', $data);
        $this->load->view('_partials/js');
    }
    public function delete($id)
    {
        $this->m_metode_pembayaran->deleteData($id);
        $err = $this->db->error();

        if ($err['code'] != 0) {
            $this->session->set_flashdata('msg', '
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            Bank ini sudah berelasi
        </div>');
            redirect('metode_pembayaran');
        } else {
            $this->session->set_flashdata('msg', '
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                No Rekening berhasil dihapus
            </div>');
            redirect('metode_pembayaran');
        }
    }
}
