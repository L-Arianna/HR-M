<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard pegawai',
			'user' =>  $this->db->get_where('dat_pegawai', ['username' =>
			$this->session->userdata('username')])->row_array(),
			'content' => 'pegawai/dashboard/list'
		];
		$this->load->view('pegawai/layout/wrapper', $data);
	}
}

/* End of file Dashboard.php */
