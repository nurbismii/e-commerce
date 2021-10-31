<?php
defined('BASEPATH') or exit('No direct script access allowed');

class setting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('m_setting');
    }
    public function index()
    {
        $data['setting'] = $this->m_setting->getData();
        $this->load->view('_partials/header');
        $this->load->view('pages/setting/index', $data);
        $this->load->view('_partials/js');
    }
    public function store()
    {
        $setting = $this->m_setting;
        $validation = $this->form_validation;

        $validation->set_rules($setting->rules());

        if ($validation->run()) {

            $setting->setData();
            $this->session->set_flashdata('msg', '
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    Alamat berhasil ditambahkan
                </div>');
            return redirect('setting');
        }
        $this->load->view('_partials/header');
        $this->load->view('pages/setting/create');
        $this->load->view('_partials/js');
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('setting');

        $setting = $this->m_setting;
        $validation = $this->form_validation;
        $validation->set_rules($setting->rules());

        if ($validation->run()) {

            $setting->updateData();

            $this->session->set_flashdata('msg', '
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    Alamat berhasil diubah
                </div>');
            redirect('setting');
        }

        $data['setting'] = $this->m_setting->getDataDetail($id);
        if (!$data['setting']) show_404();

        $this->load->view('_partials/header');
        $this->load->view('pages/setting/edit', $data);
        $this->load->view('_partials/js');
    }
}
