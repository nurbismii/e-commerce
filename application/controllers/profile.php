<?php
defined('BASEPATH') or exit('No direct script access allowed');

class profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('m_users');
        $this->load->model('m_keranjang');
        $this->load->model('m_order');
    }
    public function index()
    {
        $id = $this->session->userdata('id_user');

        $data['datas'] = $this->m_order->join($id);
        $data['data'] = $this->m_users->get($id);
        $this->load->view('pages/profile/index', $data);
    }
}
