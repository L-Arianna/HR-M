<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Khazanah_Model extends CI_Model
{
    var $table = 'tbl_khazanah';
    var $primaryKey = 'id_khazanah';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listing()
    {
        //$this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('tbl_kegiatan_khazanah', 'tbl_kegiatan_khazanah.id_keg_khazanah = tbl_khazanah.kegiatan_khazanah');
        $query = $this->db->get();
        return $query->result();
    }
    public function tambah($data)
    {
        $this->db->insert($this->table, $data);
    }

    function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function detail($idkhazanah)
    {
        $this->db->from($this->table);
        $this->db->where($this->primaryKey, $idkhazanah);
        $query = $this->db->get();
        return $query->row();
    }

    function update($data, $where)
    {
        //$this->db->update($this->table, $data, $where);
        //return $this->db->affected_rows();
        $this->db->where($where);
        $this->db->update($this->table, $data);
    }

    public function delete($data)
    {
        $this->db->where($this->primaryKey, $data['id_khazanah']);
        $this->db->delete($this->table);
    }
}

/* End of file Khazanah.php */
