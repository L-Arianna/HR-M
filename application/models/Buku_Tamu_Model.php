<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Buku_Tamu_Model extends CI_Model
{
    var $table = 'tbl_buku_tamu';
    var $primaryKey = 'id_tamu';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listing($r)
    {
        $this->db->Like('start_tamu', $r);
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result();
    }
    public function hari_ini()
    {
        $start = date_create();
        $r = date_format($start, 'Y-m-d');
        $this->db->select('*,SUBSTRING(start_tamu, 1, 10) as start');
        //$this->db->where('start', '2021-04-14');

        $this->db->from($this->table);

        $query = $this->db->get();
        return $query->result();
    }
    public function tambah($data)
    {
        $x = $this->db->insert($this->table, $data);
        if ($x) {
            return true;
        } else {
            echo $this->db->error();
        }
    }
    public function detail($idbukutamu)
    {
        $this->db->from($this->table);
        $this->db->where($this->primaryKey, $idbukutamu);
        $query = $this->db->get();
        return $query->row();
    }

    function update($data, $where)
    {
        //$this->db->update($this->table, $data, $where);
        //return $this->db->affected_rows();
        $this->db->where($this->primaryKey, $where);
        $x = $this->db->update($this->table, $data);
        if ($x) {
            return true;
        } else {
            return false;
        }
    }
    public function delete($data)
    {
        $this->db->where($this->primaryKey, $data);
        $x = $this->db->delete($this->table);
        if ($x) {
            return true;
        } else {
            return false;
        }
    }
}

/* End of file Buku_Tamu_Model.php */
