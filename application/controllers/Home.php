<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($_SESSION['role'] == 'admin') {
			$this->load->model('Pembayaran_model');
			$this->load->model('Pengeluaran_model');
		}

		$pesanan = $this->db->get_where('pesanan', ['lunas' => 0])->result_array();
		$this->data['notif_pesanan'] = 0;
		foreach ($pesanan as $p) {
			$this->data['notif_pesanan'] += $p['quantity'];
		}
	}

	public function index()
	{
		$session = $this->session->userdata;
		$this->data['transactions'] = null;

		if ($session['username']) {
			$this->data['title'] = 'Coffee Shop';

			/* Note : Versi sebelumnya */
			// if ($_SESSION['role'] == 'admin') {
			// 	if ($this->input->get('dari') && $this->input->get('sampai')) {
			// 		$dari = $this->input->get('dari') . ' 00:00:00';
			// 		$sampai = $this->input->get('sampai') . ' 23:59:59';

			// 		$data['transactions'] = $this->Pembayaran_model->getItemSaled($dari, $sampai);
			// 	}
			// }

			/* Note : Versi baru */
			$this->data['total_penjualan'] = $this->Pembayaran_model->getTotalPenjualan();
			$this->data['total_pembelian'] = $this->Pengeluaran_model->getTotalPembelian();

			$this->load->view('layouts/_header', $this->data);
			$this->load->view('home/index', $this->data);
			$this->load->view('layouts/_footer');
		} else {
			redirect('auth');
		}
	}
}
