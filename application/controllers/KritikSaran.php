<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KritikSaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('KritikSaran_model');
    }

    public function index()
    {
        $data['title'] = 'Kritik & Saran';


        $this->load->view('layouts/_header', $data);
        if ($_SESSION['role'] == 'customer')
            $this->load->view('kritik_saran/create');
        if ($_SESSION['role'] == 'admin') {
            $totalData = $this->db->get('kritik_saran')->num_rows();

            $this->load->library('pagination');

            $config['base_url'] = 'http://localhost/ci-coffee-shop/KritikSaran/index';
            $config['total_rows'] = $totalData;
            $config['per_page'] = 5;

            $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination">';
            $config['full_tag_close'] = '</ul></nav>';

            $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
            $config['cur_tag_close'] = '</a></li>';

            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';

            $config['next_link'] = '&raquo;';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';

            $config['prev_link'] = '&laquo;';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';

            $config['attributes'] = array('class' => 'page-link');

            $this->pagination->initialize($config);

            $start = $this->uri->segment(3);
            $data['data'] = $this->KritikSaran_model->getData($config, $start);
            $this->load->view('kritik_saran/index', $data);
        }
        $this->load->view('layouts/_footer');
    }

    public function store()
    {
        if ($this->KritikSaran_model->store($_SESSION['id'])) {
            $this->session->set_flashdata('pesan', 'Data berhasil disimpan');
            redirect('KritikSaran/index');
        } else {
            $this->session->set_flashdata('pesan', 'Terjadi kesalahan');
            redirect('KritikSaran/index');
        }
    }

    public function delete($id)
    {
        if ($this->KritikSaran_model->delete($id)) {
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus');
            redirect('KritikSaran/index');
        } else {
            $this->session->set_flashdata('pesan', 'Terjadi kesalahan');
            redirect('KritikSaran/index');
        }
    }
}
