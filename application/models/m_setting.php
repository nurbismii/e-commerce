<?php defined('BASEPATH') or exit('No direct script access allowed');

class m_setting extends CI_Model
{
    private $table = "set_lokasi";

    public $id;
    public $nama_toko;
    public $alamat_toko;
    public $lokasi;
    public $telepon_toko;

    public function rules()
    {
        return
            [
                [
                    'field' => 'nama',
                    'label' => 'Nama toko',
                    'rules' => 'required',

                    'field' => 'alamat',
                    'label' => 'Alamat',
                    'rules' => 'required',

                    'field' => 'telepon',
                    'label' => 'telepon',
                    'rules' => 'required',
                ]
            ];
    }
    public function getLokasi()
    {
        return $this->db->get($this->table)->row();
    }
    public function getData()
    {
        return $this->db->get($this->table)->result();
    }
    public function setData()
    {
        $post = $this->input->post();
        $this->nama_toko = $post['nama'];
        $this->alamat_toko = $post['alamat'];
        $this->lokasi = $post['kota'];
        $this->telepon_toko = $post['telepon'];

        return $this->db->insert($this->table, $this);
    }
    public function updateData()
    {
        $post = $this->input->post();
        $this->id = $post['id'];
        $this->nama_toko = $post['nama'];
        $this->alamat_toko = $post['alamat'];
        $this->lokasi = $post['kota'];
        $this->telepon_toko = $post['telepon'];

        return $this->db->update($this->table, $this, array('id' => $post['id']));
    }
    public function getDataDetail($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }
    public function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }
}
