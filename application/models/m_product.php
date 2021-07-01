<?php defined('BASEPATH') or exit('No direct script access allowed');

class m_product extends CI_Model
{

    private $table = "product";
    private $v_table = "v_products";

    public $id_produk;
    public $nama;
    public $harga;
    public $jumlah;
    public $deskripsi;
    public $id_kategori;
    public $created_at;
    public $updated_at;

    public function rules()
    {
        return
            [
                [
                    'field' => 'id_produk',
                    'label' => 'Id_produk',
                    'rules' => 'required',
                ],
                [
                    'field' => 'nama',
                    'label' => 'Nama',
                    'rules' => 'required',
                ],
                [
                    'field' => 'harga',
                    'label' => 'Harga',
                    'rules' => 'required',
                ],
            ];
    }

    public function getData()
    {
        return $this->db->get($this->v_table)->result();
    }
    public function get()
    {
        return $this->db->get($this->table)->result();
    }
    public function getDataDetail($id_produk)
    {
        return $this->db->get_where($this->table, ['id_produk' => $id_produk])->row();
    }
    public function setData()
    {
        $post = $this->input->post();
        $this->id_produk = $post['id_produk'];
        $this->nama = $post['nama'];
        $this->harga = $post['harga'];
        $this->jumlah = $post['jumlah'];
        $this->deskripsi = $post['deskripsi'];
        $this->foto = $this->_upload();
        $this->id_kategori = $post['kategori'];
        $this->created_at = date("Y-m-d H:i:s");

        return $this->db->insert($this->table, $this);
    }
    public function updateData()
    {
        $post = $this->input->post();
        $this->id_produk = $post['id_produk'];
        $this->nama = $post['nama'];
        $this->harga = $post['harga'];
        $this->jumlah = $post['jumlah'];
        $this->deskripsi = $post['deskripsi'];
        $this->id_kategori = $post['kategori'];
        $this->updated_at = date("Y-m-d H:i:s");

        if (!empty($_FILES['foto']['nama'])) {
            $this->foto = $this->_upload();
        } else {
            $this->foto = $post['foto_lama'];
        }
        return $this->db->update($this->table, $this, array('id_produk' => $post['id_produk']));
    }
    public function deleteData($id)
    {
        $this->deleteFoto($id);
        $this->db->where('id_produk', $id);
        $this->db->delete('product');
    }
    public function _upload()
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
    public function deleteFoto($id)
    {
        $produk = $this->getDataDetail($id);
        if ($produk->foto != "default.jpg") {
            $filename = explode(".", $produk->foto)[0];
            return array_map('unlink', glob(FCPATH . "upload/product/$filename.*"));
        }
    }
}
