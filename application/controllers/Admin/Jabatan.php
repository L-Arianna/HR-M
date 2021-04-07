<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kat_jabatan');
	}

	public function index()
	{
		$jabatan = $this->Kat_jabatan->listing();


		$data = [
			'title' => 'Jabatan pegawai',
			'jabatan' => $jabatan,
			'user' =>  $this->db->get_where('tb_user', ['username' =>
			$this->session->userdata('username')])->row_array(),

			'content' => 'admin/jabatan/list'
		];
		$this->load->view('admin/layout/wrapper', $data);
	}

	public function tambah()
	{


		$this->form_validation->set_rules('nama_jabatan', 'Nama jabatan', 'trim|required|is_unique[tb_kat_jabatan.nama_jabatan]', array(
			'is_unique' => 'Nama jabatan ini sudah ada'
		));
		$this->form_validation->set_rules('gapok', 'Gaji Pokok', 'trim|required|numeric');
		$this->form_validation->set_rules('gaji_jabatan', 'Gaji Jabatan', 'trim|required|numeric');
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Tambah jabatan',
				'user' =>  $this->db->get_where('tb_user', ['username' =>
				$this->session->userdata('username')])->row_array(),

				'content' => 'admin/jabatan/tambah'
			];
			$this->load->view('admin/layout/wrapper', $data);
		} else {
			$data = [
				'nama_jabatan' => $this->input->post('nama_jabatan'),
				'gapok' => $this->input->post('gapok'),
				'gaji_jabatan' => $this->input->post('gaji_jabatan')
			];
			$this->Kat_jabatan->tambah($data);
			$this->session->set_flashdata(
				'sukses',
				'<div class="alert alert-success" role="alert">Berhasil menambahkan kategori jabatan </div>'
			);
			redirect('admin/jabatan', 'refresh');
		}
	}

	public function edit($id_kat_jabatan)
	{
		$jabatan = $this->Kat_jabatan->detail($id_kat_jabatan);


		$this->form_validation->set_rules('nama_jabatan', 'Nama jabatan', 'trim|required');
		$this->form_validation->set_rules('gapok', 'Gaji Pokok', 'trim|required|numeric');
		$this->form_validation->set_rules('gaji_jabatan', 'Gaji Jabatan', 'trim|required|numeric');
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Edit kategori jabatan',
				'jabatan' => $jabatan,
				'user' =>  $this->db->get_where('tb_user', ['username' =>
				$this->session->userdata('username')])->row_array(),

				'content' => 'admin/jabatan/edit'
			];
			$this->load->view('admin/layout/wrapper', $data);
		} else {
			$data = [
				'id_kat_jabatan' => $id_kat_jabatan,
				'nama_jabatan' => $this->input->post('nama_jabatan'),
				'gapok' => $this->input->post('gapok'),
				'gaji_jabatan' => $this->input->post('gaji_jabatan')
			];
			$this->Kat_jabatan->edit($data);
			$this->session->set_flashdata(
				'sukses',
				'<div class="alert alert-success" role="alert">Berhasil update kategori jabatan </div>'
			);
			redirect('admin/jabatan', 'refresh');
		}
	}

	public function hapus($id_kat_jabatan)
	{
		$data = [
			'id_kat_jabatan' => $id_kat_jabatan
		];
		$this->Kat_jabatan->hapus($data);
		$this->session->set_flashdata(
			'sukses',
			'<div class="alert alert-danger" role="alert">Berhasil hapus kategori jabatan </div>'
		);
		redirect('admin/jabatan', 'refresh');
	}
}

/* End of file Jabatan.php */
