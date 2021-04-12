<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Payroll extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Gaji_model');
		$this->load->model('Pegawai_model');
	}


	public function index()
	{
		$pegawai = $this->Pegawai_model->listing();
		if (isset($_POST['submit'])) {
			if ((!empty($_POST['bulan'])) && (!empty($_POST['tahun']))) {
				$bulan          = $_POST['bulan'];
				$tahun          = $_POST['tahun'];
			} elseif (!empty($_POST['bulan'])) {
				$bulan           = $_POST['bulan'];
				$tahun           = date('Y');
			} elseif (!empty($_POST['tahun'])) {
				$bulan          = date('m');
				$tahun          = $_POST['tahun'];
			} else {
				$bulan           = date('m');
				$tahun           = date('Y');
			}
		} else {
			$bulan           = date('m');
			$tahun           = date('Y');
		}
		$option_tahun = $this->Gaji_model->option_tahun();

		$data = [
			'title' => 'Pembayaran gaji',
			'user' =>  $this->db->get_where('tb_user', ['username' =>
			$this->session->userdata('username')])->row_array(),
			'pegawai' => $pegawai,
			'option_tahun' => $option_tahun,
			'bulan' => $bulan,
			'tahun' => $tahun,
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
