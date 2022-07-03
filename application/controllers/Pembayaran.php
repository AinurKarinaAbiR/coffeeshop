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

    public function uploadbukti($id, $total)
    {
        $data = $this->data;
        $data['id'] = $id;
        $data['title'] = 'Upload Bukti Pembayaran';
        $data['total'] = $total;

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
        $nominal_dp = $this->input->post('dp');
        // echo ('nominal dp :' . $nominal_dp);
        // echo ('<br>');
        // echo ('minimal dp :' . $this->input->post('min_dp'));
        if ($nominal_dp != null) {
            if ($nominal_dp < $this->input->post('min_dp')) {
                $this->session->set_flashdata('pesan', 'nominal dp kurang');
            } else {
                $fileBukti = $this->upload_foto();

                if ($this->Pembayaran_model->uploadBukti($fileBukti['file_name'])) {
                    $this->session->set_flashdata('pesan', 'data berhasil disimpan');
                } else {
                    $this->session->set_flashdata('pesan', 'terjadi kesalahan');
                }
            }
        } else
            $this->session->set_flashdata('pesan', 'nominal dp harus diisi');

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

    /* Reservasi */
    public function terimareservasi($id)
    {
        if ($this->Pembayaran_model->terimaReservasi($id)) {
            $this->session->set_flashdata('pesan', 'berhasil menolak');
        } else {
            $this->session->set_flashdata('pesan', 'terjadi kesalahan');
        }
        redirect('pembayaran');
    }

    public function tolakreservasi($id)
    {
        $this->data['title'] = 'Alasan Penolakan';
        $this->data['id'] = $id;

        $this->load->view('layouts/_header', $this->data);
        $this->load->view('pembayaran/form-tolak');
        $this->load->view('layouts/_footer');
    }

    public function prosesTolak($id)
    {
        if ($this->Pembayaran_model->tolakReservasi($id)) {
            $this->session->set_flashdata('pesan', 'berhasil menolak');

            redirect('pembayaran');
        } else {
            $this->session->set_flashdata('pesan', 'terjadi kesalahan');
        }
    }
    /* End Reservasi */

    public function print($id)
    {
        $data['data'] = $this->Pembayaran_model->getPrintPembayaran($id);
        $data['items'] = $this->Pembayaran_model->getPrintItem($id);

        $this->load->view('print/print', $data);
    }
}
