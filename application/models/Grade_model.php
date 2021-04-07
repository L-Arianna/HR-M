<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Grade_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('tb_grade');
		$this->db->order_by('id_grade', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_grade)
	{
		$this->db->select('*');
		$this->db->from('tb_grade');
		$this->db->where('id_grade', $id_grade);
		$this->db->order_by('id_grade', 'asc');
		$query = $this->db->get();
		return $query->row();
	}

	public function viewByGolongan($id_grade)
	{
		$this->db->where('id_grade', $id_grade);
		$result = $this->db->get('tb_grade')->result();
		return $result;
	}

	public function tambah($data)
	{
		$this->db->insert('tb_grade', $data);
	}

	public function edit($data)
	{
		$this->db->where('id_grade', $data['id_grade']);
		$this->db->update('tb_grade', $data);
	}

	public function hapus($data)
	{
		$this->db->where('id_grade', $data['id_grade']);
		$this->db->delete('tb_grade', $data);
	}
}

/* End of file Grade_model.php */
