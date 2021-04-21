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

	public function getall()
	{
		$get_role = $this->session->userdata('username');
		$this->db->select('tb_detail_cuti. *, dat_pegawai.*, tb_kat_cuti.*');
		$this->db->from('tb_detail_cuti');
		$this->db->join('dat_pegawai', 'dat_pegawai.nip = tb_detail_cuti.nip', 'left');
		$this->db->join('tb_kat_cuti', 'tb_kat_cuti.id_kat_cuti = tb_detail_cuti.id_kat_cuti', 'left');
		$this->db->where('username', $get_role);
		$this->db->group_by('tb_detail_cuti.id_detail_cuti');
		$this->db->order_by('id_detail_cuti', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function getmanager()
	{
		$this->db->select('tb_detail_cuti. *, dat_pegawai.*, tb_kat_cuti.*');
		$this->db->from('tb_detail_cuti');
		$this->db->join('dat_pegawai', 'dat_pegawai.nip = tb_detail_cuti.nip', 'left');
		$this->db->join('tb_kat_cuti', 'tb_kat_cuti.id_kat_cuti = tb_detail_cuti.id_kat_cuti', 'left');
		$this->db->group_by('tb_detail_cuti.id_detail_cuti');
		$this->db->order_by('id_detail_cuti', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_detail_cuti)
	{

		$get_role = $this->session->userdata('username');
		$this->db->select('tb_detail_cuti. *, dat_pegawai.*, tb_kat_cuti.*');
		$this->db->from('tb_detail_cuti');
		$this->db->join('dat_pegawai', 'dat_pegawai.nip = tb_detail_cuti.nip', 'left');
		$this->db->join('tb_kat_cuti', 'tb_kat_cuti.id_kat_cuti = tb_detail_cuti.id_kat_cuti', 'left');
		$this->db->where('username', $get_role);
		$this->db->where('id_detail_cuti', $id_detail_cuti);
		$this->db->group_by('tb_detail_cuti.id_detail_cuti');
		$this->db->order_by('id_detail_cuti', 'asc');
		$query = $this->db->get();
		return $query->row();
	}

	public function tambah($data)
	{
		$this->db->insert('tb_detail_cuti', $data);
	}

	public function edit($data)
	{
		$this->db->where('id_detail_cuti', $data['id_detail_cuti']);
		$this->db->update('tb_detail_cuti', $data);
	}

	public function hapus($data)
	{
		$this->db->where('id_detail_cuti', $data['id_detail_cuti']);
		$this->db->delete('tb_detail_cuti', $data);
	}

	public function getaprove()
	{
		$get_role = $this->session->userdata('role_id');
		return $this->db->query("SELECT * FROM tb_user WHERE role_id > $get_role")->result();
	}

	public function getjumcuti()
	{
		$nip = $this->session->userdata('nip');
		$this->db->select('*');
		$this->db->from('tb_detail_cuti');
		$this->db->where('nip', $nip);
		$this->db->where('sisa_cuti');
		$query = $this->db->get();
		return $query->row();
	}
}

/* End of file Tgl_model.php */
