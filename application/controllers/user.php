<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('m_users');
    }
    public function index()
    {
        $data['data'] = $this->m_users->getData();
        $this->load->view('_partials/header');
        $this->load->view('pages/user/user', $data);
        $this->load->view('_partials/js');
    }

    public function add()
    {
        $user = $this->m_users;
        $validation = $this->form_validation;

        $validation->set_rules($user->rules());

        if ($validation->run()) {
            $user->setData();
            $this->session->set_flashdata('msg', '
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                User baru berhasil ditambahkan
            </div>');
            redirect('user');
        }
        $this->load->view('_partials/header');
        $this->load->view('pages/user/tambah');
        $this->load->view('_partials/js');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('user');

        $user = $this->m_users;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if ($validation->run()) {

            $user->updateData();

            $this->session->set_flashdata('msg', '
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                Data user berhasil diubah
            </div>');
            redirect('user');
        } else {
            $this->session->set_flashdata('msg', '
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                Confirm password sebelum simpan perubahan
            </div>');
        }

        $data['data'] = $user->getDataDetail($id);
        if (!$data['data']) show_404();

        $this->load->view('_partials/header');
        $this->load->view('pages/user/edit', $data);
        $this->load->view('_partials/js');
    }

    public function delete($id)
    {
        $this->m_users->deleteData($id);
        $this->session->set_flashdata('msg', '
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                User berhasil dihapus
            </div>');
        redirect('user');
    }
}
