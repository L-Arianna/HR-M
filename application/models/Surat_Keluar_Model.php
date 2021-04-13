<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Surat_Keluar_Model extends CI_Model
{
    var $table = 'tbl_surat_keluar';
    var $primaryKey = 'id_surat_keluar';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listing()
    {
        //$this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('tbl_dropdown_statussuratmasuk', 'tbl_dropdown_statussuratmasuk.id_dropdown_statussuratmasuk = tbl_surat_keluar.status_surat_keluar');
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

    public function detail($idsuratkeluar)
    {
        $this->db->from($this->table);
        $this->db->where($this->primaryKey, $idsuratkeluar);
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
        $this->db->where($this->primaryKey, $data['id_surat_keluar']);
        $this->db->delete($this->table);
    }
}

/* End of file Surat_Keluar_Model.php */
