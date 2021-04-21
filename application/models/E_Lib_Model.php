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

    function get_book_list($limit, $start)
    {
        $query = $this->db->get($this->table, $limit, $start);
        return $query;
    }

    public function listing()
    {
        //$this->db->select('*');
        $this->db->from($this->table);
        //$this->db->join('tbl_dropdown_statussuratmasuk', 'tbl_dropdown_statussuratmasuk.id_dropdown_statussuratmasuk = tbl_surat_keluar.status_surat_keluar');
        $query = $this->db->get();
        return $query->result();
    }
    function join()
    {
        $this->db->from($this->table);
        $this->db->join('tbl_kat_book', 'tbl_kat_book.id_kat_book = tbl_book.kategori_book');
        //$this->db->group_by('tbl_book.kategori_book');
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
