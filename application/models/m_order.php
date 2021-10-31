<?php defined('BASEPATH') or exit('No direct script access allowed');

class m_order extends CI_Model
{
    private $table = "order";

    public $id;
    public $status_pembayaran;
    public $status_pengiriman;
    public $no_resi;


    public function rules()
    {
        return
            [
                [
                    'field' => 'id',
                    'label' => 'Id',
                    'rules' => 'required'
                ]
            ];
    }
    //mengambil keseluruhan data tabel cart
    public function getOrder()
    {
        $this->db->select('*,');
        $this->db->from('detail_cart');
        $this->db->join('product', 'detail_cart.produk=product.id_produk', 'left');
        $this->db->join('order', 'detail_cart.order_id=order.id', 'left');
        $this->db->join('cart', 'order.cart_id=cart.id', 'left');
        $this->db->join('pembayaran', 'cart.pembayaran_id=pembayaran.id_norek', 'left');
        $this->db->order_by('cart.id', 'DESC');
        $query = $this->db->get();

        return $query->result();
    }

    public function getOrderDetail($id)
    {
        $this->db->select('*');
        $this->db->from('detail_cart');
        $this->db->join('product', 'detail_cart.produk=product.id_produk', 'left');
        $this->db->join('order', 'detail_cart.order_id=order.id', 'left');
        $this->db->join('cart', 'order.cart_id=cart.id', 'left');
        $this->db->join('pembayaran', 'cart.pembayaran_id=pembayaran.id_norek', 'left');
        $this->db->where('cart.id', $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function join($id)
    {
        $this->db->select('*,');
        $this->db->from('detail_cart');
        $this->db->join('product', 'detail_cart.produk=product.id_produk', 'left');
        $this->db->join('order', 'detail_cart.order_id=order.id', 'left');
        $this->db->join('cart', 'order.cart_id=cart.id', 'left');
        $this->db->join('pembayaran', 'cart.pembayaran_id=pembayaran.id_norek', 'left');
        $this->db->where('cart.user_id', $id);
        $this->db->order_by('cart.id', 'DESC');
        $query = $this->db->get();

        return $query->result();
    }

    public function bukti_bayar()
    {
        $post = $this->input->post();
        $this->id = $post['id'];
        $this->bukti_bayar = $this->_upload();

        return $this->db->update('cart', $this, array('id' => $post['id']));
    }
    // update field null
    public function statusUpdate($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('cart', $data);
    }

    public function _upload()
    {
        $config['upload_path']          = './upload/bukti/';
        $config['allowed_types']        = 'jpg|png|jpeg|jfif';
        $config['file_name']            = $this->id;
        $config['overwrite']            = true;
        $config['max_size']             = 10000; // 1MB
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
        $order = $this->getOrderDetail($id);
        if ($order->bukti_bayar != "default.jpg") {
            $filename = explode(".", $order->bukti_bayar)[0];
            return array_map('unlink', glob(FCPATH . "upload/bukti/$filename.*"));
        }
    }
}
