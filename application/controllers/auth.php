<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('m_users');
		$this->load->library('cart');
		$this->load->model('m_product');
		$this->load->model('m_category');
	}

	public function index()
	{
		$data['produk'] = $this->m_product->get();
		$data['kategori'] = $this->m_category->getData();
		$this->load->view('_partials/header');
		$this->load->view('pages/home/home', $data);
		$this->load->view('_partials/js');
	}

	public function loginshop()
	{
		check_already_login();
		$this->load->view('_partials/auth_header');
		$this->load->view('auth/login');
		$this->load->view('_partials/auth_js');
	}
	public function register()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
		$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password2', 'Repeat Password', 'matches[password]');

		if ($this->form_validation->run() === FALSE) {

			$this->load->view('_partials/auth_header');
			$this->load->view('auth/register');
			$this->load->view('_partials/auth_js');
		} else {

			$password = md5($this->input->post('password'));

			$this->m_users->register($password);
			$this->session->set_flashdata('msg', '
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				Registrasi berhasil
			</div>');
			redirect(base_url('auth/loginshop'));
		}
	}
	public function login()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$query = $this->m_users->login($post);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$user_data = array(
					'id_user' => $row->id_user,
					'id_role' => $row->id_role,
					'username' => $row->username,
					'nama' => $row->nama,
					'picture' => $row->picture,
					'email' => $row->email
				);
				$this->session->set_userdata($user_data);
				redirect('home');
			} else {
				$this->session->set_flashdata('msg', '
                    <div class="alert alert-warning alert-dismissible" id_cs="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        Username atau password salah
                    </div>');
				redirect('auth/loginshop');
			}
		}
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/loginshop');
	}
	public function check_username_exists($username)
	{
		$this->form_validation->set_message('check_username_exists', 'Username sudah digunakan');
		if ($this->m_users->check_username_exists($username)) {
			return true;
		} else {
			return false;
		}
	}
	public function check_email_exists($email)
	{
		$this->form_validation->set_message('check_email_exists', 'Email sudah digunakan');
		if ($this->m_users->check_email_exists($email)) {
			return true;
		} else {
			return false;
		}
	}
}
