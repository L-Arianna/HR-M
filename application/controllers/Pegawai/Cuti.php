<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cuti extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cuti_model');
	}

	public function index()
	{
		$data = [
			'title' => 'Daftar Pengajuan Cuti Pegawai',
			'user' =>  $this->db->get_where('dat_pegawai', ['username' =>
			$this->session->userdata('username')])->row_array(),
			'content' => 'pegawai/cuti/list'
		];
		$this->load->view('pegawai/layout/wrapper', $data);
	}

	public function tambah()
	{
		$getapprove = $this->Cuti_model->getaprove();
		$data = [
			'title' => 'Tambah Pengajuan Cuti Pegawai',
			'getapprove' => $getapprove,
			'user' =>  $this->db->get_where('dat_pegawai', ['username' =>
			$this->session->userdata('username')])->row_array(),
			'content' => 'pegawai/cuti/tambah'
		];
		$this->load->view('pegawai/layout/wrapper', $data);
	}
}

/* End of file Cuti.php */
