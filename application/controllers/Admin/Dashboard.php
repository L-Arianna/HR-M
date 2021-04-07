<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{



	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'user' =>  $this->db->get_where('tb_user', ['username' =>
			$this->session->userdata('username')])->row_array(),
			'content' => 'admin/dashboard/list'
		];
		$this->load->view('admin/layout/wrapper', $data);
	}
}

/* End of file Dashboard.php */
