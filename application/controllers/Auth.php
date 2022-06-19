<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
    }

    public function index()
    {
        $data['title'] = 'Coffee Shop';
        $this->load->view('auth/login');
    }

    public function loginProcess()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password', TRUE);
        $hashPass = password_hash($password, PASSWORD_DEFAULT);
        $test     = password_verify($password, $hashPass);
        // query chek users
        $this->db->where('username', $username);
        //$this->db->where('password',  $test);
        $users = $this->db->get('users');
        if ($users->num_rows() > 0) {
            $user = $users->row_array();
            // echo ($user['password']);
            if (password_verify($password, $user['password'])) {
                // retrive user data to session
                $this->session->set_userdata($user);
                // echo 'home';
                redirect('home');
            } else {
                echo 'password salah';
                // redirect('auth');
            }
        } else {
            $this->session->set_flashdata('status_login', 'username atau password yang anda input salah');
            echo 'akun tidak ditemukan';
            // redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('status_login', 'Anda sudah berhasil keluar dari aplikasi');
        redirect('auth');
    }

    public function register()
    {
        $data['title'] = 'Coffee Shop';
        $this->load->view('auth/register');
    }

    public function registerProcess()
    {
        $this->Users_model->register();

        redirect('auth');
    }
}
