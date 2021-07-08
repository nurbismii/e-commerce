<?php defined('BASEPATH') or exit('No direct script access allowed');

class m_order extends CI_Model
{
    private $v_table = "v_order";
    private $table = "transaksi_temp";

    public function get_data_info()
    {
        return $this->db->get('v_order')->result();
    }
    public function getData()
    {
        return $this->db->get($this->v_table)->result();
    }
    public function setData($data)
    {
        return $this->db->insert('order_info', $data);
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
    public function get_id($id)
    {
        $query = $this->db->query("SELECT id from transaksi_temp where id = '" . $id . "'");
        return $query->row();
    }
}
