<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KritikSaran_model extends CI_Model
{
    private $_table = "kritik_saran";
    public function __construct()
    {
        parent::__construct();
    }

    public function getData($config, $start)
    {
        $this->db->select('kritik_saran.*, users.username');
        $this->db->join('users', 'kritik_saran.id_user = users.id');
        $this->db->order_by('kritik_saran.id desc');
        $query = $this->db->get($this->_table, $config['per_page'], $start);
        return $query->result_array();
    }

    public function store($idUser)
    {
        $data = array(
            'id_user' => $idUser,
            'kritik' => $this->input->post('kritik'),
            'saran' => $this->input->post('saran'),
        );

        return $this->db->insert($this->_table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->_table);
    }
}
