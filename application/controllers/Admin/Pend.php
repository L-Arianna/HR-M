<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pend extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kat_pend');
	}

	public function index()
	{
		$pend = $this->Kat_pend->listing();
		$data = [
			'title' => 'Pendidikan pegawai',
			'pend' => $pend,
			'user' =>  $this->db->get_where('tb_user', ['username' =>
			$this->session->userdata('username')])->row_array(),
			'content' => 'admin/pend/list'
		];
		$this->load->view('admin/layout/wrapper', $data);
	}
	public function tambah()
	{


		$this->form_validation->set_rules('nama_pendidikan', 'Nama Pendidikan', 'trim|required|is_unique[tb_pendidikan.nama_pendidikan]', array(
			'is_unique' => 'Pendidikan ini sudah ada'
		));
		$this->form_validation->set_rules('gaji_pend', 'Gaji Pendidikan', 'trim|required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Tambah data pendidikan',
				'user' =>  $this->db->get_where('tb_user', ['username' =>
				$this->session->userdata('username')])->row_array(),
				'content' => 'admin/pend/tambah'
			];
			$this->load->view('admin/layout/wrapper', $data);
		} else {
			$data = [
				'nama_pendidikan' => $this->input->post('nama_pendidikan'),
				'gaji_pend' => $this->input->post('gaji_pend')
			];
			$this->Kat_pend->tambah($data);
			$this->session->set_flashdata(
				'sukses',
				'<div class="alert alert-success" role="alert">Berhasil menambahkan kategori pendidikan </div>'
			);
			redirect('admin/pend', 'refresh');
		}
	}

	public function edit($id_pendidikan)
	{
		$pend = $this->Kat_pend->detail($id_pendidikan);


		$this->form_validation->set_rules('nama_pendidikan', 'Nama Pendidikan', 'trim|required');
		$this->form_validation->set_rules('gaji_pend', 'Gaji Pendidikan', 'trim|required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Edit data pendidikan',
				'pend' => $pend,
				'user' =>  $this->db->get_where('tb_user', ['username' =>
				$this->session->userdata('username')])->row_array(),
				'content' => 'admin/pend/edit'
			];
			$this->load->view('admin/layout/wrapper', $data);
		} else {
			$data = [
				'id_pendidikan' => $id_pendidikan,
				'nama_pendidikan' => $this->input->post('nama_pendidikan'),
				'gaji_pend' => $this->input->post('gaji_pend')
			];
			$this->Kat_pend->edit($data);
			$this->session->set_flashdata(
				'sukses',
				'<div class="alert alert-success" role="alert">Berhasil update kategori pendidikan </div>'
			);
			redirect('admin/pend', 'refresh');
		}
	}

	public function hapus($id_pendidikan)
	{
		$data = [
			'id_pendidikan' => $id_pendidikan
		];
		$this->Kat_pend->hapus($data);
		$this->session->set_flashdata(
			'sukses',
			'<div class="alert alert-danger" role="alert">Berhasil hapus kategori pendidikan </div>'
		);
		redirect('admin/pendidikan', 'refresh');
	}
}

/* End of file Pend.php */
