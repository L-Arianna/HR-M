<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kat_golongan extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('tb_kat_golongan');
		$this->db->order_by('id_kat_golongan', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_kat_golongan)
	{
		$this->db->select('*');
		$this->db->from('tb_kat_golongan');
		$this->db->where('id_kat_golongan', $id_kat_golongan);
		$this->db->order_by('id_kat_golongan', 'asc');
		$query = $this->db->get();
		return $query->row();
	}

	public function viewByGolongan($id_grade)
	{
		$this->db->where('id_grade', $id_grade);
		$result = $this->db->get('tb_kat_golongan')->result();
		return $result;
	}

	public function tambah($data)
	{
		$this->db->insert('tb_kat_golongan', $data);
	}

	public function edit($data)
	{
		$this->db->where('id_kat_golongan', $data['id_kat_golongan']);
		$this->db->update('tb_kat_golongan', $data);
	}

	public function hapus($data)
	{
		$this->db->where('id_kat_golongan', $data['id_kat_golongan']);
		$this->db->delete('tb_kat_golongan', $data);
	}
}

/* End of file Kat_golongan.php */
