<?php defined('BASEPATH') or exit('No direct script access allowed');

class m_product extends CI_Model
{

    private $table = "product";

    public $id_produk;
    public $nama;
    public $harga;
    public $jumlah;
    public $berat;
    public $satuan;
    public $deskripsi;
    public $foto;
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
                [
                    'field' => 'deskripsi',
                    'label' => 'Deskripsi',
                    'rules' => 'required',
                ],
                [
                    'field' => 'berat',
                    'label' => 'Berat',
                    'rules' => 'required',
                ],

            ];
    }
    public function __construct()
    {
        $this->load->database();
    }

    public function join()
    {
        $this->db->select('product.*,kategori');
        $this->db->from('product');
        $this->db->join('category', 'category.id_kategori=product.id_kategori', 'left');

        $query = $this->db->get();
        return $query->result();
    }

    public function get()
    {
        return $this->db->get($this->table)->result();
    }

    public function getDataDetail($id)
    {
        $this->db->select('product.*,kategori');
        $this->db->from('product');
        $this->db->join('category', 'category.id_kategori=product.id_kategori', 'left');
        $this->db->where('product.id_produk', $id);

        $query = $this->db->get();

        return $query->row();
    }
    public function setData()
    {
        $post = $this->input->post();
        $this->id_produk = $post['id_produk'];
        $this->nama = $post['nama'];
        $this->harga = $post['harga'];
        $this->jumlah = $post['jumlah'];
        $this->berat = $post['berat'];
        $this->satuan = $post['satuan'];
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
        $this->berat = $post['berat'];
        $this->satuan = $post['satuan'];
        if (!empty($_FILES["userfile"]["nama"])) {
            $this->foto = $this->_upload();
        } else {
            $this->foto = $post["foto_lama"];
        }
        $this->deskripsi = $post['deskripsi'];
        $this->id_kategori = $post['kategori'];
        $this->updated_at = date("Y-m-d H:i:s");

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
        $config['allowed_types']        = 'jpg|png|jpeg|jfif';
        $config['file_name']            = $this->id_produk;
        $config['overwrite']            = true;
        $config['max_size']             = 2048; // 1MB
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

    public function cari_produk()
    {
        $cari = $this->input->GET('cari', TRUE);
        $data = $this->db->query("SELECT * FROM v_products WHERE nama like '%$cari'");
        return $data->result();
    }
}
