<?php
defined('BASEPATH') or exit('No direct script access allowed');

class alamatpengiriman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('m_alamat_pengiriman');
    }
    public function index()
    {
        $this->load->view('_partials/header');
        $this->load->view('pages/alamatpengiriman/index');
        $this->load->view('_partials/js');
    }
    #menambahkan alamat pengiriman
    public function store()
    {
        $alamat = $this->m_alamat_pengiriman;
        $validation = $this->form_validation;

        $validation->set_rules($alamat->rules());

        if ($validation->run()) {

            $alamat->setData();
            $this->session->set_flashdata('msg', '
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    Alamat berhasil ditambahkan
                </div>');
            return redirect('shopping/checkout');
        }
        $this->load->view('_partials/header');
        $this->load->view('pages/alamatpengiriman/index');
        $this->load->view('_partials/js');
    }
    #mengubah alamat pengiriman
    public function update($id)
    {
        if (!isset($id)) redirect('shopping/checkout');

        $alamat = $this->m_alamat_pengiriman;
        $validation = $this->form_validation;
        $validation->set_rules($alamat->rules());

        if ($validation->run()) {

            $alamat->updateData();

            $this->session->set_flashdata('msg', '
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    Alamat berhasil diubah
                </div>');
            redirect('product');
        }

        $data['data'] = $alamat->getDataDetail($id);
        if (!$data['data']) show_404();

        $this->load->view('_partials/header');
        $this->load->view('pages/product/edit', $data);
        $this->load->view('_partials/js');
    }
}
