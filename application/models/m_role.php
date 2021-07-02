<?php defined('BASEPATH') or exit('No direct script access allowed');

class m_role extends CI_Model
{
    private $table = "role";

    public $id_role;
    public $role;

    public function rules()
    {
        return [
            [
                'field' => 'role',
                'label' => 'Role',
                'rules' => 'required',
            ],
        ];
    }
    public function getData()
    {
        return $this->db->get($this->table)->result();
    }
    public function getDataDetail($id_role)
    {
        return $this->db->get_where($this->table, ['id_role' => $id_role])->row();
    }
    public function setData()
    {
        $post = $this->input->post();
        $this->role = $post['role'];

        return $this->db->insert($this->table, $this);
    }
    public function updateData()
    {
        $post = $this->input->post();
        $this->id_role = $post['id_role'];
        $this->role = $post['role'];

        return $this->db->update($this->table, $this, array('id_role' => $post['id_role']));
    }
    public function deleteData($id)
    {
        $this->db->where($this->id_role, $id);
        $this->db->delete($this->table);
    }
}
