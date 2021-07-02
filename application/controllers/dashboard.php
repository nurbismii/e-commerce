<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_product');
    }
    public function index()
    {
        check_not_login();
        $data['data'] = $this->m_product->getData();
        $this->load->view('_partials/header');
        $this->load->view('dashboard', $data);
        $this->load->view('_partials/js');
    }
}
