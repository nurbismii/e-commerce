<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_transaksi extends CI_Model
{


    private $table = "transaksi_temp";
    private $v_table = "v_transact";

    public $id_transaksi;
    public $id_produk;
    public $id_user;
    public $id_pembayaran;
    public $jumlah_pesanan;
    public $alamat;
    public $pesan;
    public $jasa_pengiriman;
    public $tanggal;

    public function rules()
    {
        return
            [
                [
                    'field' => 'id_user',
                    'label' => 'Id_user',
                    'rules' => 'required',
                ],
                [
                    'field' => 'pesan',
                    'label' => 'Pesan',
                    'rules' => 'required',
                ],
                [
                    'field' => 'alamat',
                    'label' => 'Alamat',
                    'rules' => 'required',
                ],
            ];
    }

    public function getTransaksi()
    {
        return $this->db->get($this->v_table)->result();
    }

    public function getData()
    {
        $this->db->select('*');
        $this->db->from('cart');
        $query = $this->db->get();
        return $query->result();
    }
    public function get()
    {
        $this->db->select('*');
        $this->db->from('v_cart');
        $query = $this->db->get();
        return $query->result();
    }
    public function jumlahCart()
    {
        return $this->db->get('cart')->num_rows();
    }
    public function setData($data)
    {
        $this->db->insert('cart', $data);
    }
    public function updateData($data, $id)
    {
        $this->db->where('id_cart', $id);
        $this->db->update('cart', $data);
    }
    public function getDataDetail($id)
    {
        $this->db->where('id_user', $id);
        $query = $this->db->get('v_cart');
        return $query->row();
    }
    public function deleteData($id)
    {
        $this->db->where('id_cart', $id);
        $this->db->delete('cart');
    }
    public function _upload()
    {
        $config['upload_path']          = './upload/product/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = $this->id_produk;
        $config['overwrite']            = true;
        $config['max_size']             = 5120; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('userfile')) {
            return $this->upload->data("file_name");
        }
        return "default.jpg";
    }
}
