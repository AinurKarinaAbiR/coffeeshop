<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran_model extends CI_Model
{
    private $_table = "pembayaran";
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function getData($idUser)
    {
        $this->db->select('pembayaran.*, pesanan.subtotal, users.nama');
        // $this->db->from($this->_table);
        $this->db->join('pesanan', 'pesanan.no_pesanan = pembayaran.no_pesanan');
        $this->db->join('users', 'users.id = pembayaran.id_user');
        $this->db->group_by('pesanan.no_pesanan');
        $this->db->select_sum('pesanan.subtotal');
        $this->db->order_by('pesanan.no_pesanan DESC');

        return $_SESSION['role'] == 'admin' ? $this->db->get($this->_table)->result_array() : $this->db->get_where($this->_table, array('pembayaran.id_user' => $idUser))->result_array();
    }

    public function uploadBukti($filename)
    {
        $this->db->select('pembayaran.*,pesanan.subtotal');
        // $this->db->from($this->_table);
        $this->db->join('pesanan', 'pesanan.no_pesanan = pembayaran.no_pesanan');
        $this->db->group_by('pesanan.no_pesanan');
        $this->db->select_sum('pesanan.subtotal');
        $current = $this->db->get_where($this->_table, ['pembayaran.id' => $this->input->post('id')])->row_array();

        $this->db->where('id', $this->input->post('id'));

        $data = array(
            'bukti_pembayaran' => $filename,
            'is_lunas' => $current['is_reservasi'] ? 0 : 1,
            'total_bayar' => $current['is_reservasi'] ? (int) $this->input->post('dp') : $current['subtotal'],
        );

        return $this->db->update($this->_table, $data);
    }

    public function confirm($id)
    {
        $this->db->select('pembayaran.*,pesanan.subtotal');
        // $this->db->from($this->_table);
        $this->db->join('pesanan', 'pesanan.no_pesanan = pembayaran.no_pesanan');
        $this->db->group_by('pesanan.no_pesanan');
        $this->db->select_sum('pesanan.subtotal');
        $current = $this->db->get_where($this->_table, ['pembayaran.id' => $id])->row_array();

        $this->db->where('id', $id);

        $data = array(
            'is_lunas' => 1,
            'total_bayar' => $current['subtotal'],
        );

        $this->db->update($this->_table, $data);

        $lap = array(
            'nominal' => $current['subtotal'],
            'jenis' => 'pemasukan',
            'ket' => '-',
            'created_at' => date('Y-m-d H:i:s')
        );

        return $this->db->insert('laporan', $lap);
    }

    public function getPrintPembayaran($id)
    {
        $this->db->select('pembayaran.*, pesanan.subtotal, users.nama');
        $this->db->join('pesanan', 'pesanan.no_pesanan = pembayaran.no_pesanan');
        $this->db->join('users', 'users.id = pembayaran.id_user');

        return $this->db->get_where($this->_table, ['pembayaran.id' => $id])->row_array();
    }

    public function getPrintItem($id)
    {
        $this->db->select('pesanan.quantity, menu.kopi, menu.harga');
        $this->db->join('pesanan', 'pesanan.no_pesanan = pembayaran.no_pesanan');
        $this->db->join('menu', 'menu.id = pesanan.menu_id');

        return $this->db->get_where($this->_table, ['pembayaran.id' => $id])->result_array();
    }

    public function getItemSaled($dari, $sampai)
    {
        $this->db->select('pesanan.quantity, menu.id as id_menu, menu.kopi, sum(pesanan.quantity) as total');
        $this->db->join('pesanan', 'pesanan.no_pesanan = pembayaran.no_pesanan');
        $this->db->join('menu', 'menu.id = pesanan.menu_id');
        $this->db->where('pembayaran.date_created >=', $dari);
        $this->db->where('pembayaran.date_created <=', $sampai);
        $this->db->group_by('id_menu');
        $this->db->select_sum('pesanan.quantity');
        $this->db->order_by('menu.kopi ASC');

        return $this->db->get($this->_table)->result_array();
    }

    public function getTotalPenjualan()
    {
        $this->db->select('total_bayar');
        $this->db->select_sum('total_bayar');
        $this->db->where('is_lunas =', 1);

        return $this->db->get($this->_table)->result_array()[0]['total_bayar'];
    }

    /* Reservasi */
    public function terimaReservasi($id)
    {
        $this->db->where('id', $id);

        $data = array(
            'status_reservasi' => 'diterima',
        );

        return $this->db->update($this->_table, $data);
    }

    public function tolakReservasi($id)
    {
        $this->db->where('id', $id);

        $data = array(
            'status_reservasi' => 'ditolak',
            'alasan_penolakan' => $this->input->post('alasan'),
        );

        return $this->db->update($this->_table, $data);
    }
    /* End Reservasi */
}
