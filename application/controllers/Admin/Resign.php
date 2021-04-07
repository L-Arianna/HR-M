<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Resign extends CI_Controller
{



	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pegawai_model');
		$this->load->model('Resign_model');
	}


	public function index()
	{
		$resign = $this->Resign_model->listing();
		$data = [
			'title' => 'Daftar pegawai resign',
			'resign' => $resign,
			'user' =>  $this->db->get_where('tb_user', ['username' =>
			$this->session->userdata('username')])->row_array(),
			'content' => 'admin/resign/list'
		];
		$this->load->view('admin/layout/wrapper', $data);
	}

	public function hapus($id_resign)
	{
		$data = [
			'id_resign' => $id_resign
		];
		$this->Resign_model->hapus($data);
		$this->session->set_flashdata(
			'sukses',
			'<div class="alert alert-danger" role="alert">Berhasil hapus data resign </div>'
		);
		redirect('admin/resign', 'refresh');
	}
}

/* End of file Resign.php */
