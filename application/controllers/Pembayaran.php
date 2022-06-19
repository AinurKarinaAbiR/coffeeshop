<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pembayaran_model');

        $pesanan = $this->db->get_where('pesanan', ['lunas' => 0])->result_array();
        $this->data['notif_pesanan'] = 0;
        foreach ($pesanan as $p) {
            $this->data['notif_pesanan'] += $p['quantity'];
        }
    }

    public function index()
    {
        $data = $this->data;

        $data['title'] = 'Riwayat Pembayaran';

        $data['data'] = $this->Pembayaran_model->getData($_SESSION['id']);

        $this->load->view('layouts/_header', $data);
        $this->load->view('pembayaran/index', $data);
        $this->load->view('layouts/_footer');
    }

    public function uploadbukti($id)
    {
        $data = $this->data;
        $data['id'] = $id;
        $data['title'] = 'Upload Bukti Pembayaran';


        $this->load->view('layouts/_header', $data);
        $this->load->view('pembayaran/upload', $data);
        $this->load->view('layouts/_footer');
    }

    function upload_foto()
    {
        $config['upload_path']          = './assets/bukti_pembayaran/';
        $config['allowed_types']        = 'jpg|png';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $config['file_name'] = $_FILES['bukti']['name'];
        $this->load->library('upload', $config);
        $this->upload->do_upload('bukti');
        return $this->upload->data();
    }

    public function uploadProcess()
    {
        $fileBukti = $this->upload_foto();

        if ($this->Pembayaran_model->uploadBukti($fileBukti['file_name'])) {
            $this->session->set_flashdata('pesan', 'data berhasil disimpan');
        } else {
            $this->session->set_flashdata('pesan', 'terjadi kesalahan');
        }

        redirect('pembayaran');
    }

    public function confirm($id)
    {
        // echo $id;
        if ($this->Pembayaran_model->confirm($id)) {
            $this->session->set_flashdata('pesan', 'data berhasil disimpan');
        } else {
            $this->session->set_flashdata('pesan', 'terjadi kesalahan');
        }

        redirect('pembayaran');
    }

    public function print($id)
    {
        $data['data'] = $this->Pembayaran_model->getPrintPembayaran($id);
        $data['items'] = $this->Pembayaran_model->getPrintItem($id);

        $this->load->view('print/print', $data);
    }
}
