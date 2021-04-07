<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grade extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Grade_model');
	}


	public function index()
	{

		$grade = $this->Grade_model->listing();
		$data = [
			'title' => 'Daftar Grade Jabatan',
			'grade' => $grade,
			'user' =>  $this->db->get_where('tb_user', ['username' =>
			$this->session->userdata('username')])->row_array(),

			'content' => 'admin/grade/list'
		];
		$this->load->view('admin/layout/wrapper', $data);
	}

	public function tambah()
	{


		$this->form_validation->set_rules('nama_grade', 'Nama Grade', 'trim|required|is_unique[tb_grade.nama_grade]|regex_match[/^([a-z ])+$/i]');
		// $this->form_validation->set_rules('gaji_grade', 'Gaji Grade', 'trim|required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'tambah grade jabatan',
				'user' =>  $this->db->get_where('tb_user', ['username' =>
				$this->session->userdata('username')])->row_array(),

				'content' => 'admin/grade/tambah'
			];
			$this->load->view('admin/layout/wrapper', $data);
		} else {

			$data = [
				'nama_grade' => $this->input->post('nama_grade'),
			];
			$this->Grade_model->tambah($data);
			$this->session->set_flashdata(
				'sukses',
				'<div class="alert alert-success" role="alert">Berhasil menambahkan grade jabatan </div>'
			);
			redirect('admin/grade', 'refresh');
		}
	}

	public function edit($id_grade)
	{
		$grade = $this->Grade_model->detail($id_grade);



		$this->form_validation->set_rules('nama_grade', 'Nama Grade', 'trim|required|regex_match[/^([a-z ])+$/i]');
		// $this->form_validation->set_rules('gaji_grade', 'Gaji Grade', 'trim|required|numeric');

		if ($this->form_validation->run() == FALSE) {

			$data = [
				'title' => 'Edit grade jabatan',
				'grade' => $grade,
				'user' =>  $this->db->get_where('tb_user', ['username' =>
				$this->session->userdata('username')])->row_array(),

				'content' => 'admin/grade/edit'
			];
			$this->load->view('admin/layout/wrapper', $data);
		} else {

			$data = [
				'id_grade' => $id_grade,
				'nama_grade' => $this->input->post('nama_grade')
			];
			$this->Grade_model->edit($data);
			$this->session->set_flashdata(
				'sukses',
				'<div class="alert alert-success" role="alert">Berhasil update grade jabatan </div>'
			);
			redirect('admin/grade', 'refresh');
		}
	}

	public function hapus($id_grade)
	{
		$data = [
			'id_grade' => $id_grade
		];
		$this->Grade_model->hapus($data);
		$this->session->set_flashdata(
			'sukses',
			'<div class="alert alert-danger" role="alert">Berhasil hapus grade jabatan </div>'
		);
		redirect('admin/grade', 'refresh');
	}
}
