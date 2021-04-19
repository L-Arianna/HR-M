<?php

defined('BASEPATH') or exit('No direct script access allowed');

class E_Lib_Model extends CI_Model
{
    var $table = 'tbl_book';
    var $primaryKey = 'id_book';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listing()
    {
        //$this->db->select('*');
        $this->db->from($this->table);
        //$this->db->join('tbl_dropdown_statussuratmasuk', 'tbl_dropdown_statussuratmasuk.id_dropdown_statussuratmasuk = tbl_surat_keluar.status_surat_keluar');
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

    public function detail($idbook)
    {
        $this->db->from($this->table);
        $this->db->where($this->primaryKey, $idbook);
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
        $this->db->where($this->primaryKey, $data['id_book']);
        $this->db->delete($this->table);
    }
}

/* End of file Surat_Keluar_Model.php */
