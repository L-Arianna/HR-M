<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Surat_Masuk_Model extends CI_Model
{
    var $table = 'tbl_surat_masuk';
    var $primaryKey = 'id_surat_masuk';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listing()
    {
        //$this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('tbl_dropdown_statussuratmasuk', 'tbl_dropdown_statussuratmasuk.id_dropdown_statussuratmasuk = tbl_surat_masuk.status_surat_masuk');
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

    public function detail($idsuratmasuk)
    {
        $this->db->from($this->table);
        $this->db->where($this->primaryKey, $idsuratmasuk);
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
        $this->db->where($this->primaryKey, $data['id_surat_masuk']);
        $this->db->delete($this->table);
    }
    /*


    

    // INSERT TO TABLE USER
    public function tambah_user($data1)
    {
        $this->db->insert('tb_user', $data1);
        return $this->db->insert_id();
    }

    // INSERT TO TABLE GAJI
    public function tambah_gaji($data2)
    {
        $this->db->insert('tb_gaji', $data2);
        return $this->db->insert_id();
    }

    // INSERT TO TABLE GAJI
    public function tambah_resign($data2)
    {
        $this->db->insert('tb_resign', $data2);
        return $this->db->insert_id();
    }



    public function edit($data)
    {
        $this->db->where('nip', $data['nip']);
        $this->db->update('dat_pegawai', $data);
    }
    public function edit_gaji($data)
    {
        $this->db->where('nip', $data['nip']);
        $this->db->update('tb_gaji', $data);
        return $this->db->insert_id();
    }


    public function hapus($data)
    {
        $this->db->where('nip', $data['nip']);
        $this->db->delete('dat_pegawai', $data);
    }
    public function hapus_user($data)
    {
        $this->db->where('nip', $data['nip']);
        $this->db->delete('tb_user', $data);
        return $this->db->insert_id();
    }
    public function hapus_gaji($data)
    {
        $this->db->where('nip', $data['nip']);
        $this->db->delete('tb_gaji', $data);
        return $this->db->insert_id();
    }

    public function kode()
    {
        $this->db->select('RIGHT(dat_pegawai.nip,2) as nip', FALSE);
        $this->db->order_by('nip', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('dat_pegawai');  //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia    
            $data = $query->row();
            $kode = intval($data->nip) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $tgl = date('dmY');
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = "1" . "5" . $tgl . $batas;  //format kode
        return $kodetampil;
    }*/
}

/* End of file Surat_Masuk.php */
