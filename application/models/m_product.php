<?php defined('BASEPATH') or exit('No direct script access allowed');

class m_product extends CI_Model
{
    public function getDataCustomerService()
    {
        $this->db->select('*');
        $this->db->from('product');
        $query = $this->db->get();
        return $query->result();
    }
    public function setData($data)
    {
        return $this->db->insert('product', $data);
    }
    public function updateData($data, $id)
    {
        $this->db->where('id_produk', $id);
        $this->db->update('product', $data);
    }
    public function getDataDetail($id)
    {
        $this->db->where('id_produk', $id);
        $query = $this->db->get('product');
        return $query->row();
    }
    public function deleteData($id)
    {
        $this->db->where('id_produk', $id);
        $this->db->delete('product');
    }
    public function upload()
    {
        $config['upload_path']          = './upload/product/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = $this->id_produk;
        $config['overwrite']            = true;
        $config['max_size']             = 5120; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('userfile')) {
            return $this->upload->data("file_name");
        }
        return "default.jpg";
    }
}
