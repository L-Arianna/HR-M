<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Gaji_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listing()
    {
        $this->db->select('tb_gaji. *, dat_pegawai.*, tb_kat_golongan.nama_golongan, tb_kat_jabatan.nama_jabatan, tb_pendidikan.nama_pendidikan, tb_grade.nama_grade');
        $this->db->from('tb_gaji');
        $this->db->join('tb_kat_jabatan', 'tb_kat_jabatan.id_kat_jabatan = tb_gaji.id_kat_jabatan', 'left');
        $this->db->join('tb_kat_golongan', 'tb_kat_golongan.id_kat_golongan = tb_gaji.id_kat_golongan', 'left');
        $this->db->join('tb_pendidikan', 'tb_pendidikan.id_pendidikan = tb_gaji.id_pendidikan', 'left');
        $this->db->join('dat_pegawai', 'dat_pegawai.nip = tb_gaji.nip', 'left');
        $this->db->join('tb_grade', 'tb_grade.id_grade = tb_gaji.id_grade', 'left');
        $this->db->group_by('tb_gaji.id_gaji');
        $this->db->order_by('id_gaji', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function viewByGaji($id_gaji)
    {
        $this->db->where('id_gaji', $id_gaji);
        $result = $this->db->get('tb_gaji')->result();
        return $result;
    }

    public function detail($id_gaji)
    {

        $this->db->select('tb_gaji. *, tb_kat_jabatan. *, tb_kat_golongan.*, tb_pendidikan.*, tb_grade.*, dat_pegawai.*');
        $this->db->from('tb_gaji');
        $this->db->join('tb_grade', 'tb_grade.id_grade = tb_gaji.id_grade', 'left');
        $this->db->join('dat_pegawai', 'dat_pegawai.nip = tb_gaji.nip', 'left');
        $this->db->join('tb_kat_jabatan', 'tb_kat_jabatan.id_kat_jabatan = tb_gaji.id_kat_jabatan', 'left');
        $this->db->join('tb_kat_golongan', 'tb_kat_golongan.id_kat_golongan = tb_gaji.id_kat_golongan', 'left');
        $this->db->join('tb_pendidikan', 'tb_pendidikan.id_pendidikan = tb_gaji.id_pendidikan', 'left');
        $this->db->group_by('tb_gaji.id_gaji');
        $this->db->where('id_gaji', $id_gaji);
        $this->db->order_by('id_gaji', 'asc');
        $query = $this->db->get();
        return $query->row();
    }

    public function viewgaji($id_gaji)
    {

        $this->db->select('tb_gaji. *, tb_kat_jabatan. *, tb_kat_golongan.*, tb_pendidikan.*');
        $this->db->from('tb_gaji');
        $this->db->join('tb_kat_jabatan', 'tb_kat_jabatan.id_kat_jabatan = tb_gaji.id_kat_jabatan', 'left');
        $this->db->join('tb_kat_golongan', 'tb_kat_golongan.id_kat_golongan = tb_gaji.id_kat_golongan', 'left');
        $this->db->join('tb_pendidikan', 'tb_pendidikan.id_pendidikan = tb_gaji.id_pendidikan', 'left');
        $this->db->group_by('tb_gaji.id_gaji');
        $this->db->where('id_gaji', $id_gaji);
        $this->db->order_by('id_gaji', 'asc');
        $query = $this->db->get();
        return $query->result();
    }


    public function view_by_date($date)
    {

        $this->db->select('tb_gaji. *, dat_pegawai.*, tb_kat_golongan.nama_golongan, tb_kat_jabatan.nama_jabatan, tb_pendidikan.nama_pendidikan, tb_grade.nama_grade');
        $this->db->join('tb_kat_jabatan', 'tb_kat_jabatan.id_kat_jabatan = tb_gaji.id_kat_jabatan', 'left');
        $this->db->join('tb_kat_golongan', 'tb_kat_golongan.id_kat_golongan = tb_gaji.id_kat_golongan', 'left');
        $this->db->join('tb_pendidikan', 'tb_pendidikan.id_pendidikan = tb_gaji.id_pendidikan', 'left');
        $this->db->join('dat_pegawai', 'dat_pegawai.nip = tb_gaji.nip', 'left');
        $this->db->join('tb_grade', 'tb_grade.id_grade = tb_gaji.id_grade', 'left');
        $this->db->group_by('tb_gaji.id_gaji');
        $this->db->order_by('id_gaji', 'asc');
        $this->db->where('DATE(tgl)', $date); // Tambahkan where tanggal nya
        return $this->db->get('tb_gaji')->result(); // Tampilkan data tb_gaji sesuai tanggal yang diinput oleh user pada filter
    }

    public function view_by_month($month, $year)
    {
        $this->db->select('tb_gaji. *, dat_pegawai.*, tb_kat_golongan.nama_golongan, tb_kat_jabatan.nama_jabatan, tb_pendidikan.nama_pendidikan, tb_grade.nama_grade');
        $this->db->join('tb_kat_jabatan', 'tb_kat_jabatan.id_kat_jabatan = tb_gaji.id_kat_jabatan', 'left');
        $this->db->join('tb_kat_golongan', 'tb_kat_golongan.id_kat_golongan = tb_gaji.id_kat_golongan', 'left');
        $this->db->join('tb_pendidikan', 'tb_pendidikan.id_pendidikan = tb_gaji.id_pendidikan', 'left');
        $this->db->join('dat_pegawai', 'dat_pegawai.nip = tb_gaji.nip', 'left');
        $this->db->join('tb_grade', 'tb_grade.id_grade = tb_gaji.id_grade', 'left');
        $this->db->group_by('tb_gaji.id_gaji');
        $this->db->order_by('id_gaji', 'asc');
        $this->db->where('MONTH(tgl)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(tgl)', $year); // Tambahkan where tahun

        return $this->db->get('tb_gaji')->result(); // Tampilkan data tb_gaji sesuai bulan dan tahun yang diinput oleh user pada filter
    }

    public function view_by_year($year)
    {

        $this->db->select('tb_gaji. *, dat_pegawai.*, tb_kat_golongan.nama_golongan, tb_kat_jabatan.nama_jabatan, tb_pendidikan.nama_pendidikan, tb_grade.nama_grade');
        $this->db->join('tb_kat_jabatan', 'tb_kat_jabatan.id_kat_jabatan = tb_gaji.id_kat_jabatan', 'left');
        $this->db->join('tb_kat_golongan', 'tb_kat_golongan.id_kat_golongan = tb_gaji.id_kat_golongan', 'left');
        $this->db->join('tb_pendidikan', 'tb_pendidikan.id_pendidikan = tb_gaji.id_pendidikan', 'left');
        $this->db->join('dat_pegawai', 'dat_pegawai.nip = tb_gaji.nip', 'left');
        $this->db->join('tb_grade', 'tb_grade.id_grade = tb_gaji.id_grade', 'left');
        $this->db->group_by('tb_gaji.id_gaji');
        $this->db->order_by('id_gaji');
        $this->db->where('YEAR(tgl)', $year); // Tambahkan where tahun

        return $this->db->get('tb_gaji')->result(); // Tampilkan data tb_gaji sesuai tahun yang diinput oleh user pada filter
    }


    public function option_tahun()
    {
        $this->db->select('YEAR(tgl) AS tahun'); // Ambil Tahun dari field tgl
        $this->db->from('tb_gaji'); // select ke tabel tb_gaji
        $this->db->order_by('YEAR(tgl)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(tgl)'); // Group berdasarkan tahun pada field tgl

        return $this->db->get()->result(); // Ambil data pada tabel tb_gaji sesuai kondisi diatas
    }




    public function tambah($data)
    {
        $this->db->insert('tb_gaji', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_gaji', $data['id_gaji']);
        $this->db->update('tb_gaji', $data);
    }

    public function hapus($data)
    {
        $this->db->where('id_gaji', $data['id_gaji']);
        $this->db->delete('tb_gaji', $data);
    }
}

/* End of file Gaji_model.php */
