<?php defined('BASEPATH') or exit('No direct script access allowed');

class m_category extends CI_Model
{
    private $table = "category";

    public $id_kategori;
    public $kategori;

    public function rules()
    {
        return [
            [
                'field' => 'kategori',
                'label' => 'Kategori',
                'rules' => 'required',
            ],
        ];
    }
    public function getData()
    {
        return $this->db->get($this->table)->result();
    }
    public function getDataDetail($id_kategori)
    {
        return $this->db->get_where($this->table, ['id_kategori' => $id_kategori])->row();
    }
    public function setData()
    {
        $post = $this->input->post();
        $this->kategori = $post['kategori'];

        return $this->db->insert($this->table, $this);
    }
    public function updateData()
    {
        $post = $this->input->post();
        $this->id_kategori = $post['id_kategori'];
        $this->kategori = $post['kategori'];

        return $this->db->update($this->table, $this, array('id_kategori' => $post['id_kategori']));
    }
    public function deleteData($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('category');
    }
}
