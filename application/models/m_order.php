<?php defined('BASEPATH') or exit('No direct script access allowed');

class m_order extends CI_Model
{
    private $v_table = "v_order";
    private $table = "transaksi_temp";

    public $id;
    public $order_id;
    public $produk;
    public $qty;
    public $harga;


    public function rules()
    {
        return [
            [
                'field' => 'nama_produk',
                'label' => 'namaProduk',
                'rules' => 'required',
            ],
        ];
    }
    public function getData()
    {
        return $this->db->get($this->v_table)->result();
    }
    public function get_data()
    {
        return $this->db->get($this->table)->result();
    }
    public function getDataDetail($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }
    public function setData()
    {
        return $this->db->insert($this->table, $this);
    }
    public function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }
}
