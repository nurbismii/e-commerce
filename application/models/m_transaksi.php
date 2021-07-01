<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_transaksi extends CI_Model
{
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
        $this->db->where('id_cart', $id);
        $query = $this->db->get('cart');
        return $query->row();
    }
    public function deleteData($id)
    {
        $this->db->where('id_cart', $id);
        $this->db->delete('cart');
    }
}
