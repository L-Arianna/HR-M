<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kat_pend extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('tb_pendidikan');
		$this->db->order_by('id_pendidikan', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function viewByPend($id_pendidikan)
	{
		$this->db->where('id_pendidikan', $id_pendidikan);
		$result = $this->db->get('tb_pendidikan')->result();
		return $result; 
	}

	public function detail($id_pendidikan)
	{
		$this->db->select('*');
		$this->db->from('tb_pendidikan');
		$this->db->where('id_pendidikan', $id_pendidikan);
		$this->db->order_by('id_pendidikan', 'asc');
		$query = $this->db->get();
		return $query->row();
	}

	public function tambah($data)
	{
		$this->db->insert('tb_pendidikan', $data);
	}

	public function edit($data)
	{
		$this->db->where('id_pendidikan', $data['id_pendidikan']);
		$this->db->update('tb_pendidikan', $data);
	}

	public function hapus($data)
	{
		$this->db->where('id_pendidikan', $data['id_pendidikan']);
		$this->db->delete('tb_pendidikan', $data);
	}
}

/* End of file Kat_pend.php */
