<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Resign_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing()
	{
		$this->db->select('tb_resign.*, dat_pegawai.nama_pegawai');
		$this->db->from('tb_resign');
		$this->db->join('dat_pegawai', 'dat_pegawai.nip = tb_resign.nip', 'left');
		$this->db->group_by('tb_resign.id_resign');
		$this->db->order_by('id_resign', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_resign)
	{
		$this->db->select('*');
		$this->db->from('tb_resign');
		$this->db->where('id_resign', $id_resign);
		$this->db->order_by('id_resign', 'asc');
		$query = $this->db->get();
		return $query->row();
	}

	public function tambah($data)
	{
		$this->db->insert('tb_resign', $data);
	}

	public function edit($data)
	{
		$this->db->where('id_resign', $data['id_resign']);
		$this->db->update('tb_resign', $data);
	}

	public function hapus($data)
	{
		$this->db->where('id_resign', $data['id_resign']);
		$this->db->delete('tb_resign', $data);
	}
}

/* End of file Kat_sp.php */
