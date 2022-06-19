<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    private $_table = "menu";
    public function __construct()
    {
        parent::__construct();
    }

    public function getMenu($config, $start)
    {
        return $this->db->get($this->_table, $config['per_page'], $start)->result_array();
    }

    public function store($file)
    {
        $data = array(
            'kopi' => $this->input->post('nama'),
            'deskripsi' => $this->input->post('deskripsi'),
            'image' => $file,
            'harga' => $this->input->post('harga'),
        );
        return $this->db->insert($this->_table, $data);
    }

    public function edit($id)
    {
        return $this->db->get_where($this->_table, ['id' => $id])->row_array();
    }

    public function update($id, $file)
    {
        $data = array(
            'kopi' => $this->input->post('nama'),
            'deskripsi' => $this->input->post('deskripsi'),
            'harga' => $this->input->post('harga'),
        );

        if ($file != '') {
            $this->db->where('id', $id);
            $this->db->update($this->_table, array('image' => $file));
        }
        $this->db->where('id', $id);

        return $this->db->update($this->_table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->_table);
    }
}
