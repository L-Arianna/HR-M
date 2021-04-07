<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->order_by('id_user', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_user)
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('id_user', $id_user);
		$this->db->order_by('id_user', 'asc');
		$query = $this->db->get();
		return $query->row();
	}


	public function topbar()
	{
		$this->db->select('tb_user.*, dat_pegawai.*');
		$this->db->from('tb_user');
		$this->db->join('dat_pegawai', 'dat_pegawai.nip = tb_user.nip', 'left');
		$this->db->group_by('tb_user.id_user');
		$this->db->order_by('id_user', 'asc');
		$query = $this->db->get();
		return $query->row();
	}


	public function tambah($data)
	{
		$this->db->insert('tb_user', $data);
	}

	public function edit($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('tb_user', $data);
	}

	public function hapus($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->delete('tb_user', $data);
	}
}

/* End of file Kat_sp.php */
