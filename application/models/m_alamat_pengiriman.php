<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_alamat_pengiriman extends CI_Model
{
    private $table = "alamat_pengiriman";

    public $id;
    public $user_id;
    public $nama_penerima;
    public $telepon;
    public $alamat;
    public $provinsi;
    public $kota;
    public $kecamatan;
    public $kelurahan;
    public $kodepos;

    public function rules()
    {
        return [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required',

                'field' => 'telepon',
                'label' => 'Telepon',
                'rules' => 'required',

                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required',
            ]
        ];
    }

    public function getData($id)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('user_id', $id);

        $query = $this->db->get();

        return $query->result();
    }

    public function setData()
    {
        $post = $this->input->post();
        $this->user_id = $post['user_id'];
        $this->nama = $post['nama_penerima'];
        $this->telepon = $post['telepon'];
        $this->alamat = $post['alamat'];
        $this->provinsi = $post['provinsi'];
        $this->kota = $post['kota'];
        $this->kecamatan = $post['kecamatan'];
        $this->kelurahan = $post['kelurahan'];
        $this->kodepos = $post['kodepos'];

        return $this->db->insert($this->table, $this);
    }
    public function updateData()
    {
        $post = $this->input->post();
        $this->id = $post['id'];
        $this->nama_penerima = $post['nama_penerima'];
        $this->telepon = $post['telepon'];
        $this->alamat = $post['alamat'];
        $this->provinsi = $post['provinsi'];
        $this->kota = $post['kota'];
        $this->kecamatan = $post['kecamatan'];
        $this->kelurahan = $post['kelurahan'];
        $this->kodepos = $post['kodepos'];

        return $this->db->update($this->table, $this, array('id' => $post['id']));
    }
    public function getDataDetail($id)
    {
        return $this->db->get_where($this->table, ['id'  => $id])->row();
    }
}
