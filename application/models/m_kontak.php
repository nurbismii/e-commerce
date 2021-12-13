<?php defined('BASEPATH') or exit('No direct script access allowed');

class m_kontak extends CI_Model
{
    private $table = "kontak";

    public $id_post;
    public $id_user;
    public $pesan;
    public $email;

    public function rules()
    {
        return [
            [
                'field' => 'id_user',
                'label' => 'Id_user',
                'rules' => 'required',

                'field' => 'pesan',
                'label' => 'Pesan',
                'rules' => 'required',

                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required',
            ]
        ];
    }

    public function getData()
    {
        $this->db->get($this->table)
            ->result();
    }
    public function setData()
    {
        $post = $this->input->post();
        $this->id_user = $post['id_user'];
        $this->pesan = $post['pesan'];
        $this->email = $post['email'];

        return $this->db->insert($this->table, $this);
    }
    public function deleteData($id)
    {
        $this->db->where('id_post', $id);
        $this->db->delete($this->table);
    }
}
