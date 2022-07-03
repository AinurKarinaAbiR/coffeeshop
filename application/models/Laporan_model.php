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

    public function getTotalPemasukan()
    {
        $this->db->select('nominal');
        $this->db->select_sum('nominal');
        $this->db->where('jenis =', 'pemasukan');

        return $this->db->get($this->_table)->result_array()[0]['nominal'];
    }

    public function getTotalPengeluaran()
    {
        $this->db->select('nominal');
        $this->db->select_sum('nominal');
        $this->db->where('jenis =', 'pengeluaran');

        return $this->db->get($this->_table)->result_array()[0]['nominal'];
    }

    public function laporan($jenis, $dari, $sampai)
    {
        if ($jenis != 'all')
            $this->db->where('jenis =', $jenis);

        $this->db->where('created_at >=', $dari . ' 00:00:00');
        $this->db->where('created_at <=', $sampai . ' 23:59:59');

        return $this->db->get('laporan')->result();
    }
}
