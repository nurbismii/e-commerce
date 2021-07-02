<?php
defined('BASEPATH') or exit('No direct script access allowed');

class category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_category');
    }
    public function index()
    {
        $data['data'] = $this->m_category->getData();
        $this->load->view('_partials/header');
        $this->load->view('pages/category/category', $data);
        $this->load->view('_partials/js');
    }
    public function add()
    {
        $category = $this->m_category;
        $validation = $this->form_validation;

        $validation->set_rules($category->rules());

        if ($validation->run()) {
            $category->setData();
            $this->session->set_flashdata('msg', '
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                Kategori baru berhasil ditambahkan
            </div>');
            redirect('category');
        }
        $this->load->view('_partials/header');
        $this->load->view('pages/category/tambah');
        $this->load->view('_partials/js');
    }
    public function edit($id_kategori = null)
    {

        if (!isset($id_kategori)) redirect('category');

        $category = $this->m_category;
        $validation = $this->form_validation;
        $validation->set_rules($category->rules());

        if ($validation->run()) {

            $category->updateData();

            $this->session->set_flashdata('msg', '
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                Kategori berhasil diubah
            </div>');
            redirect('category');
        }
        $data['data'] = $category->getDataDetail($id_kategori);
        if (!$data['data']) show_404();

        $this->load->view('_partials/header');
        $this->load->view('pages/category/edit', $data);
        $this->load->view('_partials/js');
    }
    public function delete($id)
    {
        $this->m_category->deleteData($id);
        $err = $this->db->error();

        if ($err['code'] != 0) {
            $this->session->set_flashdata('msg', '
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            Category ini sudah berelasi
        </div>');
            redirect('category');
        } else {
            $this->session->set_flashdata('msg', '
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                Category berhasil dihapus
            </div>');
            redirect('category');
        }
    }
}
