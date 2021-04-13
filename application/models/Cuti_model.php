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
		$this->db->select('dat_cuti. *, dat_pegawai.* , tb_kat_cuti.*');
		$this->db->from('dat_cuti');
		$this->db->join('dat_pegawai', 'dat_pegawai.nip = dat_cuti.nip', 'left');
		$this->db->join('tb_kat_cuti', 'tb_kat_cuti.id_kat_cuti = dat_cuti.id_kat_cuti', 'left');
		$this->db->group_by('dat_cuti.id');
		$this->db->order_by('id', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id)
	{
		$this->db->select('*');
		$this->db->from('dat_cuti');
		$this->db->where('id', $id);
		$this->db->order_by('id', 'asc');
		$query = $this->db->get();
		return $query->row();
	}

	public function tambah($data)
	{
		$this->db->insert('dat_cuti', $data);
	}

	public function edit($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('dat_cuti', $data);
	}

	public function hapus($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->delete('dat_cuti', $data);
	}
}

/* End of file Tgl_model.php */
