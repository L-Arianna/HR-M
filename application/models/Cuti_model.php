<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cuti_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing()
	{
		$this->db->select('tb_cuti. *, dat_pegawai.* , tb_kat_cuti.*');
		$this->db->from('tb_cuti');
		$this->db->join('dat_pegawai', 'dat_pegawai.nip = tb_cuti.nip', 'left');
		$this->db->join('tb_kat_cuti', 'tb_kat_cuti.id_kat_cuti = tb_cuti.id_kat_cuti', 'left');
		$this->db->group_by('tb_cuti.id');
		$this->db->order_by('id', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id)
	{
		$this->db->select('*');
		$this->db->from('tb_cuti');
		$this->db->where('id', $id);
		$this->db->order_by('id', 'asc');
		$query = $this->db->get();
		return $query->row();
	}

	public function tambah($data)
	{
		$this->db->insert('tb_cuti', $data);
	}

	public function edit($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('tb_cuti', $data);
	}

	public function hapus($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->delete('tb_cuti', $data);
	}

	public function getaprove()
	{
		$get_role = $this->session->userdata('id_kat_jabatan');
		return $this->db->query("SELECT * FROM tb_kat_jabatan WHERE id_kat_jabatan = $get_role")->result();
		// $get_role = $this->session->userdata('id_bidang');
		// return $this->db->query("SELECT * FROM tb_kat_jabatan WHERE id_bidang = $get_role")->result();
	}
}

/* End of file Tgl_model.php */
