<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kontak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kontak');
    }
    public function add()
    {
        $kontak= $this->m_kontak;
        $validation = $this->form_validation;

        $validation->set_rules($kontak->rules());

        if ($validation->run()) {
            $kontak->setData();
            $this->session->set_flashdata('msg', '
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                Pesan telah dikirim
            </div>');
            return redirect('home/kontak');
        }
        else{
            return redirect('home/kontak');
        }
    }
}
