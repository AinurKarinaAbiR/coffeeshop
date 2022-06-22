<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
    private $_table = "laporan";
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function getTotalPenjualan()
    {
        $this->db->select('nominal');
        $this->db->select_sum('nominal');
        $this->db->where('jenis =', 'penjualan');

        return $this->db->get($this->_table)->result_array()[0]['nominal'];
    }

    public function getTotalPembelian()
    {
        $this->db->select('nominal');
        $this->db->select_sum('nominal');
        $this->db->where('jenis =', 'pembelian');

        return $this->db->get($this->_table)->result_array()[0]['nominal'];
    }

    public function laporan() {
        return $this->db->get('laporan')->result();
    }
}
