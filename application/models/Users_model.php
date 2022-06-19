<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
    private $_table = "users";
    public function __construct()
    {
        parent::__construct();
    }

    public function register()
    {
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $data = array(
            'nama' => $this->input->post('username'),
            'username' => $this->input->post('username'),
            'password' => $password,
            'role' => 'customer',
        );
        return $this->db->insert('users', $data);
    }
}
