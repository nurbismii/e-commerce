<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('m_product');
    }
    public function index()
    {
        check_not_login();
        $this->load->view('_partials/header');
        $this->load->view('pages/home/dashboard');
        $this->load->view('_partials/js');
    }
}
