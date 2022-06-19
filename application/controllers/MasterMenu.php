<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterMenu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
    }

    public function index()
    {
        $data['title'] = 'Menu';

        $totalMenu = $this->db->get('menu')->num_rows();

        $this->load->library('pagination');

        $config['base_url'] = 'http://localhost/ci-coffee-shop/MasterMenu/index';
        $config['total_rows'] = $totalMenu;
        $config['per_page'] = 4;

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
        $data['menu'] = $this->Menu_model->getMenu($config, $start);

        $this->load->view('layouts/_header', $data);
        $this->load->view('master_menu/index');
        $this->load->view('layouts/_footer');
    }

    public function tambah()
    {
        $data['title'] = 'Menu';

        $this->load->view('layouts/_header', $data);
        $this->load->view('master_menu/create');
        $this->load->view('layouts/_footer');
    }

    public function store()
    {
        $file = $this->upload_img();

        if ($this->Menu_model->store($file['file_name'])) {
            $this->session->set_flashdata('pesan', 'Data berhasil disimpan');
            redirect('MasterMenu/index');
        } else {
            $this->session->set_flashdata('pesan', 'Terjadi kesalahan');
            redirect('MasterMenu/index');
        }
    }

    function upload_img()
    {
        $config['upload_path']          = './assets/img/menu/';
        $config['allowed_types']        = 'jpg|png';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $config['file_name'] = $_FILES['gambar']['name'];
        $this->load->library('upload', $config);
        $this->upload->do_upload('gambar');
        return $this->upload->data();
    }

    public function edit($id)
    {
        $data['title'] = 'Menu';

        $data['data'] = $this->Menu_model->edit($id);

        $this->load->view('layouts/_header', $data);
        $this->load->view('master_menu/edit', $data);
        $this->load->view('layouts/_footer');
    }

    public function update($id)
    {
        $file = $this->upload_img();

        if ($this->Menu_model->update($id, $file['file_name'])) {
            $this->session->set_flashdata('pesan', 'Data berhasil disimpan');
            redirect('MasterMenu/index');
        } else {
            $this->session->set_flashdata('pesan', 'Terjadi kesalahan');
            redirect('MasterMenu/index');
        }
    }

    public function delete($id)
    {
        if ($this->Menu_model->delete($id)) {
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus');
            redirect('MasterMenu/index');
        } else {
            $this->session->set_flashdata('pesan', 'Terjadi kesalahan');
            redirect('MasterMenu/index');
        }
    }
}
