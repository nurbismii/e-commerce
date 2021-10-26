<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_users extends CI_Model
{

    private $table = "users";

    public $id_user;
    public $nama;
    public $username;
    public $password;
    public $email;
    public $picture;
    public $id_role;
    public $created_at;

    public function rules()
    {
        return [

            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required',
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required',
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required',
            ],

        ];
    }

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
        $role = "2";
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

    public function getData()
    {
        return $this->db->get($this->table)->result();
    }
    public function getDataDetail($id_user)
    {
        return $this->db->get_where($this->table, ['id_user' => $id_user])->row();
    }
    public function setData()
    {
        $post = $this->input->post();
        $this->nama = $post['nama'];
        $this->username = $post['username'];
        $this->password = md5($post['password']);
        $this->email = $post['email'];
        $this->picture = $this->_upload();
        $this->id_role = $post['id_role'];
        $this->created_at = date("Y-m-d H:i:s");

        return $this->db->insert($this->table, $this);
    }
    // update data
    public function updateData()
    {
        $post = $this->input->post();
        $this->id_user = $post['id_user'];
        $this->nama = $post['nama'];
        $this->username = $post['username'];
        $this->password = md5($post['password']);
        $this->email = $post['email'];
        if (!empty($_FILES["userfile"]["nama"])) {
            $this->picture = $this->_upload();
        } else {
            $this->picture = $post["foto_lama"];
        }
        $this->created_at = date("Y-m-d H:i:s");

        return $this->db->update($this->table, $this, array('id_user' => $post['id_user']));
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
    public function deleteData($id)
    {
        $this->deleteFoto($id);
        $this->db->where('id_user', $id);
        $this->db->delete('users');
    }
    public function deleteFoto($id)
    {
        $user = $this->getDataDetail($id);
        if ($user->picture != "default.jpg") {
            $filename = explode(".", $user->picture)[0];
            return array_map('unlink', glob(FCPATH . "upload/product/$filename.*"));
        }
    }
    public function _upload()
    {
        $config['upload_path']          = './upload/user/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = $this->id_user;
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
