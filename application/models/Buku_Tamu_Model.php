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

    public function tes($a, $b)
    {
        //$a = '07-04-2021';
        //$b = '20-04-2021';
        $this->db->select('*,SUBSTRING(start_tamu, 1, 10) as start, count(nama_tamu)as jml');
        $this->db->where('start_tamu BETWEEN "' . date('Y-m-d', strtotime($a)) . '" and "' . date('Y-m-d', strtotime($b)) . '"');

        $this->db->group_by('start');
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result();
    }

    public function listing()
    {
        $this->db->select('*,SUBSTRING(start_tamu, 1, 10) as start');
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
