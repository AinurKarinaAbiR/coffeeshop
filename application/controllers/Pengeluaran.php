<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengeluaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengeluaran_model');
        $pesanan = $this->db->get_where('pesanan', ['lunas' => 0, 'id_user', $_SESSION['id']])->result_array();
        $this->data['notif_pesanan'] = 0;
        foreach ($pesanan as $p) {
            $this->data['notif_pesanan'] += $p['quantity'];
        }
    }

    public function index()
    {
        $this->data['title'] = 'Pengeluaran';


        $this->load->view('layouts/_header', $this->data);
        if ($_SESSION['role'] == 'admin') {
            $totalData = $this->db->get('pengeluaran')->num_rows();

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
            $this->data['data'] = $this->Pengeluaran_model->getData($config, $start);
            $this->load->view('pengeluaran/index', $this->data);
        }
        $this->load->view('layouts/_footer');
    }

    public function create()
    {
        $this->data['title'] = 'Pengeluaran';
        $this->load->view('layouts/_header', $this->data);
        $this->load->view('pengeluaran/create');
        $this->load->view('layouts/_footer');
    }

    function upload_foto()
    {
        $config['upload_path']          = './assets/bukti_pengeluaran/';
        $config['allowed_types']        = 'jpg|png';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $config['file_name'] = $_FILES['bukti']['name'];
        $this->load->library('upload', $config);
        $this->upload->do_upload('bukti');
        return $this->upload->data();
    }

    public function store()
    {
        $fileBukti = $this->upload_foto();

        if ($this->Pengeluaran_model->store($fileBukti['file_name'])) {
            $this->session->set_flashdata('pesan', 'Data berhasil disimpan');
            redirect('pengeluaran/index');
        } else {
            $this->session->set_flashdata('pesan', 'Terjadi kesalahan');
            redirect('pengeluaran/index');
        }
    }

    public function delete($id)
    {
        if ($this->Pengeluaran_model->delete($id)) {
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus');
            redirect('pengeluaran/index');
        } else {
            $this->session->set_flashdata('pesan', 'Terjadi kesalahan');
            redirect('pengeluaran/index');
        }
    }
}
