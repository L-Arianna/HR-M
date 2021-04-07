<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kat_jabatan extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('tb_kat_jabatan');
		$this->db->order_by('id_kat_jabatan', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function viewByJabatan($id_kat_jabatan)
	{
		$this->db->where('id_kat_jabatan', $id_kat_jabatan);
		$result = $this->db->get('tb_kat_jabatan')->result();
		return $result;
	}

	public function detail($id_kat_jabatan)
	{
		$this->db->select('*');
		$this->db->from('tb_kat_jabatan');
		$this->db->where('id_kat_jabatan', $id_kat_jabatan);
		$this->db->order_by('id_kat_jabatan', 'asc');
		$query = $this->db->get();
		return $query->row();
	}

	public function tambah($data)
	{
		$this->db->insert('tb_kat_jabatan', $data);
	}

	public function edit($data)
	{
		$this->db->where('id_kat_jabatan', $data['id_kat_jabatan']);
		$this->db->update('tb_kat_jabatan', $data);
	}

	public function hapus($data)
	{
		$this->db->where('id_kat_jabatan', $data['id_kat_jabatan']);
		$this->db->delete('tb_kat_jabatan', $data);
	}
}

/* End of file Kat_jabatan.php */
