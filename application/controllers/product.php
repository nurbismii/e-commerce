<?php
defined('BASEPATH') or exit('No direct script access allowed');

class product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_product');
    }
    public function index()
    {
        $this->load->view('_partials/header');
        $this->load->view('pages/product');
        $this->load->view('_partials/js');
    }
    public function addData()
    {
        $config['upload_path']          = './upload/image/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 5120; // 1MB
        $config['max_width']            = 5120;
        $config['max_height']           = 6120;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            echo "Gagal tambah file";
        } else {

            $foto = $this->upload->data();
            $foto = $foto['file_name'];

            $id_produk = $this->input->post('id_produk');
            $nama = $this->input->post('nama');
            $harga = $this->input->post('harga');
            $jumlah = $this->input->post('jumlah');
            $deskripsi = $this->input->post('deskripsi');
            $tanggal = date("Y-m-d H:i:s");

            $this->image = $this->model_cs->upload();

            $this->form_validation->set_rules('id_produk', 'Nama', 'required');
            $this->form_validation->set_rules('nama', 'Username', 'required');
            $this->form_validation->set_rules('deskripsi', 'Email', 'required');
            $this->form_validation->set_rules('harga', 'Password', 'required');

            $dataInsert = array(

                'id_produk' => $id_produk,
                'nama' => $nama,
                'harga' => $harga,
                'jumlah' => $jumlah,
                'deskripsi' => $deskripsi,
                'created_at' => $tanggal,
            );
            if ($this->form_validation->run() == true) {

                $result = $this->model_cs->setData($dataInsert);

                if ($result) {
                    $this->session->set_flashdata('msg', '
                    <div class="alert alert-success alert-dismissible" id_cs="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        Produk baru berhasil ditambahkan
                    </div>');
                    redirect('product');
                } else {
                    $this->session->set_flashdata('msg', '
                    <div class="alert alert-warning alert-dismissible" id_cs="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                       Produk baru tidak berhasil ditambahkan
                    </div>');
                    redirect('product');
                }
            } else {
                $this->session->set_flashdata('msg', '
                    <div class="alert alert-warning alert-dismissible" id_cs="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                       Gagal menambahkan produk silahkan coba lagi
                    </div>');
                redirect(base_url('product'));
            }
        }
        return "default.jpg";
    }
}
