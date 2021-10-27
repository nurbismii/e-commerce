<?php defined('BASEPATH') or exit('No direct script access allowed');

class m_order extends CI_Model
{
    private $table = "order";

    public function getData()
    {
        return $this->db->get($this->table)->result();
    }
    public function update($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }
    public function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }
    public function join($id)
    {
        $this->db->select('*');
        $this->db->from('alamat_pengiriman');
        $this->db->join('order', 'alamat_pengiriman.id=order.alamat_id', 'left');
        $this->db->join('cart', 'order.cart_id=cart.id', 'left');
        $this->db->join('detail_cart', 'order.id=detail_cart.order_id', 'left');
        $this->db->join('product', 'detail_cart.produk=product.id_produk', 'left');
        $this->db->where('alamat_pengiriman.user_id', $id);
        $query = $this->db->get();

        return $query->result();
    }
}
