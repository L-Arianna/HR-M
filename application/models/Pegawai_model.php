<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listing()
    {
        $this->db->select('*');
        $this->db->from('dat_pegawai');
        $this->db->order_by('nip', 'asc');
        $query = $this->db->get();
        return $query->result();
    }




    public function detail($nip)
    {
        $this->db->select('dat_pegawai.*, tb_kat_jabatan.*, tb_kat_golongan.* , tb_grade.*, tb_pendidikan.*');
        $this->db->from('dat_pegawai');
        $this->db->join('tb_kat_jabatan', 'tb_kat_jabatan.id_kat_jabatan = dat_pegawai.id_kat_jabatan', 'left');
        $this->db->join('tb_kat_golongan', 'tb_kat_golongan.id_kat_golongan = dat_pegawai.id_kat_golongan', 'left');
        $this->db->join('tb_grade', 'tb_grade.id_grade = dat_pegawai.id_grade', 'left');
        $this->db->join('tb_pendidikan', 'tb_pendidikan.id_pendidikan = dat_pegawai.id_pendidikan', 'left');
        $this->db->where('nip', $nip);
        $this->db->order_by('nip', 'asc');
        $query = $this->db->get();
        return $query->row();
    }



    public function tambah($data)
    {
        $this->db->insert('dat_pegawai', $data);
    }

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
    }
}

/* End of file Kat_cuti.php */
