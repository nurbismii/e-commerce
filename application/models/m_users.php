<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_users extends CI_Model
{
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $post['username']);
        $this->db->where('password', md5($post['password']));
        $query = $this->db->get();
        return $query;
    }
    //set data
    public function register($enc_password)
    {
        $role = "user";
        $data = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'role' => $role,
            'password' => $enc_password,
            'created_at' => date("Y-m-d H:i:s"),
        );
        return $this->db->insert('users', $data);
    }
    // update data
    public function updateData($data, $id)
    {
        $this->db->where('id_user', $id);
        $this->db->update('users', $data);
    }
    // get detail
    public function getDataDetail($id)
    {
        $this->db->where('id_user', $id);
        $query = $this->db->get('users');
        return $query->row();
    }
    // destroy data
    public function deleteData($id)
    {
        $this->db->where('id_users', $id);
        $this->db->delete('user');
    }
    // function check already username
    public function check_username_exists($username)
    {
        $query = $this->db->get_where('users', array('username' => $username));
        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    }
    // function check already email
    public function check_email_exists($email)
    {
        $query = $this->db->get_where('users', array('email' => $email));
        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    }
}
