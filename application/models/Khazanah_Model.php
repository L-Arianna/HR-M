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
        //$this->db->select('id_kat_jabatan', 'nip', 'nama_pegawai', 'password', 'nama_jabatan');
        $this->db->from($this->table);
        $this->db->join('tbl_kegiatan_khazanah', 'tbl_kegiatan_khazanah.id_keg_khazanah = tbl_khazanah.kegiatan_khazanah');
        $query = $this->db->get();
        return $query->result();
    }

    function joinpegawai($where)
    {
        $this->db->select('dat_pegawai.id_kat_jabatan, dat_pegawai.nip , dat_pegawai.nama_pegawai , dat_pegawai.password , tb_kat_jabatan.nama_jabatan');
        $this->db->from('dat_pegawai');
        $this->db->join('tb_kat_jabatan', 'tb_kat_jabatan.id_kat_jabatan = dat_pegawai.id_kat_jabatan');
        $this->db->where('dat_pegawai.id_kat_jabatan', $where);

        $query = $this->db->get();
        return $query->result();
    }
    public function tambah($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function tambahjam($data)
    {
        $this->db->insert('tbl_jam_khazanah', $data);
    }
    public function listingjam()
    {
        $this->db->from('tbl_jam_khazanah');
        $query = $this->db->get();
        return $query->result();
    }

    function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function count_status_kemarin()
    {
        $this->db->from($this->table);
        $this->db->select('*, SUBSTRING(masuk_khazanah, 1,10) as tgl');
        $this->db->where('status_khazanah != ', 2);
        $query = $this->db->get();
        return $query->result();
    }

    function count_status_nol()
    {
        $this->db->from($this->table);
        $this->db->select('*,COUNT(status_khazanah) as jumlah');

        $this->db->where('status_khazanah', 0);
        $query = $this->db->get();
        return $query->result();
    }

    function count_status_dua()
    {
        $this->db->from($this->table);
        $this->db->select('COUNT(status_khazanah) as jumlah');

        $this->db->where('status_khazanah', 2);
        $query = $this->db->get();
        return $query->result();
    }

    function count_status_satu()
    {
        $this->db->from($this->table);
        $this->db->select('*,COUNT(status_khazanah) as jumlah');
        $this->db->where('status_khazanah', 1);
        $query = $this->db->get();
        return $query->result();
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

    function multi($id)
    {
        $this->db->select('dat_pegawai.id_kat_jabatan, dat_pegawai.nip , dat_pegawai.nama_pegawai , dat_pegawai.password , tb_kat_jabatan.nama_jabatan');
        $this->db->from('dat_pegawai');
        $this->db->join('tb_kat_jabatan', 'tb_kat_jabatan.id_kat_jabatan = dat_pegawai.id_kat_jabatan');
        $this->db->where('dat_pegawai.id_kat_jabatan', $id);

        $query = $this->db->get();
        return $query->result();
    }

    function multi2($idp)
    {
        //$this->db->select('dat_pegawai.id_kat_jabatan, dat_pegawai.nip , dat_pegawai.nama_pegawai , dat_pegawai.password , tb_kat_jabatan.nama_jabatan');
        $this->db->from('tb_gaji');
        $this->db->join('tb_kat_jabatan', 'tb_kat_jabatan.id_kat_jabatan = tb_gaji.id_kat_jabatan');
        $this->db->where('tb_gaji.id_kat_jabatan', $idp);

        $query = $this->db->get();
        return $query->result();
    }
}

/* End of file Khazanah.php */
