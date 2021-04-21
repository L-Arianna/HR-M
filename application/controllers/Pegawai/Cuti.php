<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cuti extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cuti_model');
		$this->load->model('Kat_cuti');
	}

	public function index()
	{
		$getall = $this->Cuti_model->getall();

		$data = [
			'title' => 'Daftar Pengajuan Cuti Pegawai',
			'getall' => $getall,
			'user' =>  $this->db->get_where('dat_pegawai', ['username' =>
			$this->session->userdata('username')])->row_array(),
			'content' => 'pegawai/cuti/list'
		];
		$this->load->view('pegawai/layout/wrapper', $data);
	}

	public function tambah()
	{
		$getapprove = $this->Cuti_model->getaprove();
		$getcuti = $this->Kat_cuti->listing();
		$jumcuti = $this->Cuti_model->getjumcuti();
		$this->form_validation->set_rules('no_hp_darurat', 'Nomor HP Darurat', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat Pegawai', 'trim|required');
		$this->form_validation->set_rules('id_kat_cuti', 'Jenis Cuti', 'trim|required');
		$this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai', 'trim|required');
		$this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan Cuti', 'trim|required');
		$this->form_validation->set_rules('id_user', 'Menyetujui', 'trim|required');


		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Tambah Pengajuan Cuti Pegawai',
				'getapprove' => $getapprove,
				'getcuti' => $getcuti,
				'jumcuti' => $jumcuti,
				'user' =>  $this->db->get_where('dat_pegawai', ['username' =>
				$this->session->userdata('username')])->row_array(),
				'content' => 'pegawai/cuti/tambah'
			];
			$this->load->view('pegawai/layout/wrapper', $data);
		} else {

			$data = [
				'nip' => $this->input->post('nip'),
				'id_kat_cuti' => $this->input->post('id_kat_cuti'),
				'id_user' => $this->input->post('id_user'),
				'status' => 'pending',
				'no_hp_darurat' => $this->input->post('no_hp_darurat'),
				'alamat' => $this->input->post('alamat'),
				'tgl_mulai' => $this->input->post('tgl_mulai'),
				'tgl_selesai' => $this->input->post('tgl_selesai'),
				'keterangan' => $this->input->post('keterangan'),
				'total' => $this->input->post('total'),
				'jumlah_ambil' => $this->input->post('jumlah_ambil'),
				'sisa_cuti' => $this->input->post('sisa_cuti'),
				'tgl' => $this->input->post('tgl')

			];
			$this->Cuti_model->tambah($data);
			// var_dump($data);
			$this->session->set_flashdata(
				'sukses',
				'<div class="alert alert-success" role="alert">Berhasil Menambahkan Pengajuan Cuti </div>'
			);
			redirect('Pegawai/Cuti', 'refresh');
		}
	}

	public function edit($id_detail_cuti)
	{
		$cuti = $this->Cuti_model->detail($id_detail_cuti);

		$this->form_validation->set_rules('no_hp_darurat', 'Nomor HP Darurat', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat Pegawai', 'trim|required');
		$this->form_validation->set_rules('id_kat_cuti', 'Jenis Cuti', 'trim|required');
		$this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai', 'trim|required');
		$this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan Cuti', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Edit Pengajuan Cuti Pegawai',
				'cuti' => $cuti,
				'user' =>  $this->db->get_where('dat_pegawai', ['username' =>
				$this->session->userdata('username')])->row_array(),
				'content' => 'pegawai/cuti/edit'
			];
			$this->load->view('pegawai/layout/wrapper', $data);
		} else {
			$data = [
				'id_detail_cuti' => $id_detail_cuti,
				'nip' => $this->input->post('nip'),
				'id_kat_cuti' => $this->input->post('id_kat_cuti'),
				// 'id_user' => $this->input->post('id_user'),
				'status' => 'pending',
				'no_hp_darurat' => $this->input->post('no_hp_darurat'),
				'alamat' => $this->input->post('alamat'),
				'tgl_mulai' => $this->input->post('tgl_mulai'),
				'tgl_selesai' => $this->input->post('tgl_selesai'),
				'keterangan' => $this->input->post('keterangan'),
				'total' => $this->input->post('total'),
				'jumlah_ambil' => $this->input->post('jumlah_ambil'),
				'sisa_cuti' => $this->input->post('sisa_cuti'),
				'tgl' => $this->input->post('tgl')

			];
			$this->Cuti_model->edit($data);

			// var_dump($data);

			$this->session->set_flashdata(
				'sukses',
				'<div class="alert alert-success" role="alert">Berhasil Update Pengajuan Cuti </div>'
			);
			redirect('Pegawai/Cuti', 'refresh');
		}
	}

	public function hapus($id_detail_cuti)
	{
		$data = [
			'id_detail_cuti' => $id_detail_cuti
		];
		$this->Cuti_model->hapus($data);
		$this->session->set_flashdata(
			'sukses',
			'<div class="alert alert-danger" role="alert">Berhasil hapus Pengajuan Cuti </div>'
		);
		redirect('Pegawai/Cuti', 'refresh');
	}
}

/* End of file Cuti.php */
