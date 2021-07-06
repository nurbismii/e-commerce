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
        $this->db->delete($this->table);
    }
    // get
    public function get_kategori($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('kategori', $id_kategori);
        return $this->db->get()->row();
    }
    public function get_all_produk($id)
    {
        $this->db->select('product.*,kategori');
        $this->db->from('product');
        $this->db->join('category', 'category.id_kategori=product.id_kategori', 'left');
        $this->db->where('product.id_kategori', $id);
        return $this->db->get()->result();
    }
}
