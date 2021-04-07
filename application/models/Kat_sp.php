<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kat_sp extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('tb_kat_peringatan');
		$this->db->order_by('id_kat_peringatan', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_kat_peringatan)
	{
		$this->db->select('*');
		$this->db->from('tb_kat_peringatan');
		$this->db->where('id_kat_peringatan', $id_kat_peringatan);
		$this->db->order_by('id_kat_peringatan', 'asc');
		$query = $this->db->get();
		return $query->row();
	}

	public function tambah($data)
	{
		$this->db->insert('tb_kat_peringatan', $data);
	}

	public function edit($data)
	{
		$this->db->where('id_kat_peringatan', $data['id_kat_peringatan']);
		$this->db->update('tb_kat_peringatan', $data);
	}

	public function hapus($data)
	{
		$this->db->where('id_kat_peringatan', $data['id_kat_peringatan']);
		$this->db->delete('tb_kat_peringatan', $data);
	}
}

/* End of file Kat_sp.php */
