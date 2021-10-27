<?php
defined('BASEPATH') or exit('No direct script access allowed');

class role extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('m_role');
    }
    public function index()
    {
        check_not_login();
        $data['data'] = $this->m_role->getData();
        $this->load->view('_partials/header');
        $this->load->view('pages/role/role', $data);
        $this->load->view('_partials/js');
    }
    public function add()
    {
        check_not_login();
        $role = $this->m_role;
        $validation = $this->form_validation;

        $validation->set_rules($role->rules());

        if ($validation->run()) {
            $role->setData();
            $this->session->set_flashdata('msg', '
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                Role berhasil baru ditambahkan
            </div>');
            redirect('role');
        }
        $this->load->view('_partials/header');
        $this->load->view('pages/role/tambah');
        $this->load->view('_partials/js');
    }
    public function edit($id_role = null)
    {
        check_not_login();
        if (!isset($id_role)) redirect('role');

        $role = $this->m_role;
        $validation = $this->form_validation;
        $validation->set_rules($role->rules());

        if ($validation->run()) {

            $role->updateData();

            $this->session->set_flashdata('msg', '
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                Role berhasil diubah
            </div>');
            redirect('role');
        }
        $data['data'] = $role->getDataDetail($id_role);
        if (!$data['data']) show_404();

        $this->load->view('_partials/header');
        $this->load->view('pages/role/edit', $data);
        $this->load->view('_partials/js');
    }
    public function delete($id)
    {
        check_not_login();
        $this->m_role->deleteData($id);
        $err = $this->db->error();

        if ($err['code'] != 0) {
            $this->session->set_flashdata('msg', '
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            Role ini sudah berelasi
        </div>');
            redirect('role');
        } else {
            $this->session->set_flashdata('msg', '
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                Role berhasil dihapus
            </div>');
            redirect('role');
        }
    }
}
