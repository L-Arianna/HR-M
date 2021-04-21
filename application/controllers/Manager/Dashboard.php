<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cuti_model');
	}

	public function index()
	{

		$getall = $this->Cuti_model->getmanager();

		$data = [
			'title' => 'Dashboard Manager',
			'getall' => $getall,
			'user' =>  $this->db->get_where('tb_user', ['username' =>
			$this->session->userdata('username')])->row_array(),
			'content' => 'manager/dashboard/list'
		];
		$this->load->view('manager/layout/wrapper', $data);
	}
}

/* End of file Dashboard.php */
