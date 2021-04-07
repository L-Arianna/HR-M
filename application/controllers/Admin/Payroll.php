<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Payroll extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Gaji_model');
	}


	public function index()
	{
		$gaji = $this->Gaji_model->listing();

		$data = [
			'title' => 'Pembayaran gaji',
			'user' =>  $this->db->get_where('tb_user', ['username' =>
			$this->session->userdata('username')])->row_array(),
			'gaji' => $gaji,
			'content' => 'admin/payroll/list'
		];
		$this->load->view('admin/layout/wrapper', $data);
	}

	public function bayar($id_gaji)
	{
		$gaji = $this->Gaji_model->detail($id_gaji);
		$data = [
			'gaji' => $gaji,
		];
		$this->load->view('admin/layout/wrapper', $data);
		$status = $this->input->post('status');

		$data = [
			'id_gaji' => $id_gaji,
			'status' => $status
		];
		$this->Gaji_model->edit($data);
		$this->session->set_flashdata(
			'sukses',
			'<div class="alert alert-success" role="alert">Berhasil membayar gaji pegawai </div>'
		);
		redirect('admin/payroll', 'refresh');
		// var_dump($data);
	}
}

/* End of file Payroll.php */
