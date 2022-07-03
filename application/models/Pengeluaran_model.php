<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengeluaran_model extends CI_Model
{
    private $_table = "pengeluaran";
    public function __construct()
    {
        parent::__construct();
    }

    public function getData($config, $start)
    {
        $this->db->select('*');
        $this->db->order_by('id desc');
        $query = $this->db->get($this->_table, $config['per_page'], $start);
        return $query->result_array();
    }

    public function store()
    {
        $data = array(
            'judul' => $this->input->post('judul'),
            'keterangan' => $this->input->post('keterangan'),
            'nominal' => $this->input->post('nominal'),
        );

        $this->db->insert($this->_table, $data);

        $lap = array(
            'nominal' => $this->input->post('nominal'),
            'jenis' => 'pengeluaran',
            'ket' => $this->input->post('keterangan'),
            'created_at' => date('Y-m-d H:i:s')
        );

        return $this->db->insert('laporan', $lap);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->_table);
    }

    public function getTotalPembelian()
    {
        $this->db->select('nominal');
        $this->db->select_sum('nominal');

        return $this->db->get($this->_table)->result_array()[0]['nominal'];
    }
}
