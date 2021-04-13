<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cuti_d extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cuti_model');
	}

	public function index()
	{
		$cuti = $this->Cuti_model->listing();

		$data = [
			'title' => 'Daftar data cuti pegawai',
			'cuti' => $cuti,
			'content' => 'admin/cuti/dat_cuti',
			'user' =>  $this->db->get_where('tb_user', ['username' =>
			$this->session->userdata('username')])->row_array()
		];
		$this->load->view('admin/layout/wrapper', $data);
	}
}

/* End of file Cuti_d.php */
