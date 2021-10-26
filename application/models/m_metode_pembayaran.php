<?php defined('BASEPATH') or exit('No direct script access allowed');

class m_metode_pembayaran extends CI_Model
{
    private $table = "pembayaran";

    public $id_norek;
    public $nama_bank;
    public $no_rek;

    public function rules()
    {
        return [
            [
                'field' => 'no_rek',
                'label' => 'no_rek',
                'rules' => 'required',
            ],
        ];
    }
    public function getData()
    {
        return $this->db->get($this->table)->result();
    }
    public function getDataDetail($id_norek)
    {
        return $this->db->get_where($this->table, ['id_norek' => $id_norek])->row();
    }
    public function setData()
    {
        $post = $this->input->post();
        $this->nama_bank = $post['nama_bank'];
        $this->no_rek = $post['no_rek'];

        return $this->db->insert($this->table, $this);
    }
    public function updateData()
    {
        $post = $this->input->post();
        $this->id_norek = $post['id_norek'];
        $this->nama_bank = $post['nama_bank'];
        $this->no_rek = $post['no_rek'];

        return $this->db->update($this->table, $this, array('id_norek' => $post['id_norek']));
    }
    public function deleteData($id)
    {
        $this->db->where('id_norek', $id);
        $this->db->delete($this->table);
    }
}
