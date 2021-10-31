<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class m_keranjang extends CI_Model
{

    public function get_produk_all()
    {
        $query = $this->db->get('product');
        return $query->result_array();
    }
    public function get_produk_kategori($id_kategori)
    {
        if ($id_kategori > 0) {
            $this->db->where('id_kategori', $id_kategori);
        }
        $query = $this->db->get('product');
        return $query->result_array();
    }

    public function get_kategori_all()
    {
        $query = $this->db->get('category');
        return $query->result_array();
    }

    public  function get_produk_id($id)
    {
        $this->db->select('product.*,kategori');
        $this->db->from('product');
        $this->db->join('category', 'product.id_kategori=category.id_kategori', 'left');
        $this->db->where('id_produk', $id);
        return $this->db->get();
    }

    public function cart($data)
    {
        $this->db->insert('cart', $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }

    public function order($data)
    {
        $this->db->insert('order', $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }

    public function detail_order($data)
    {
        $this->db->insert('detail_cart', $data);
    }

    public function cek_stok($id)
    {
        $query = $this->db->query("SELECT id_produk, jumlah from product where id_produk = '" . $id . "'");
        return $query->row();
    }

    public function update_stok($id, $jumlah)
    {
        $this->id_produk = $id;
        $this->jumlah = $jumlah;

        return $this->db->update('product', $this, array('id_produk' => $id));
    }
}
