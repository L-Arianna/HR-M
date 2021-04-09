<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Payroll extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Gaji_model');
		$this->load->model('Slip_gaji');
	}


	public function index()
	{
		if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
			$filter = $_GET['filter']; // Ambil data filder yang dipilih user

			if ($filter == '1') { // Jika filter nya 1 (per tanggal)
				$tgl = $_GET['tanggal'];

				$ket = 'Data Pembayaran Gaji Tanggal ' . date('d-m-y', strtotime($tgl));
				$url_cetak = 'Admin/Payroll/filter=1&tanggal=' . $tgl;
				$gaji = $this->Slip_gaji->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di Slip_gaji
			} else if ($filter == '2') { // Jika filter nya 2 (per bulan)
				$bulan = $_GET['bulan'];
				$tahun = $_GET['tahun'];
				$nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

				$ket = 'Data Pembayaran Gaji Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
				$url_cetak = 'Admin/Payroll/filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
				$gaji = $this->Slip_gaji->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di Slip_gaji
			} else { // Jika filter nya 3 (per tahun)
				$tahun = $_GET['tahun'];

				$ket = 'Data Pembayaran Gaji Tahun ' . $tahun;
				$url_cetak = 'Admin/Payroll/filter=3&tahun=' . $tahun;
				$gaji = $this->Slip_gaji->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di Slip_gaji
			}
		} else { // Jika user tidak mengklik tombol tampilkan
			$ket = 'Semua Data Pembayaran Gaji';
			$url_cetak = 'Admin/Payroll/cetak';
			$gaji = $this->Slip_gaji->listing(); // Panggil fungsi view_all yang ada di Slip_gaji
		}

		$option_tahun = $this->Slip_gaji->option_tahun();

		$data = [
			'title' => 'Pembayaran gaji',
			'user' =>  $this->db->get_where('tb_user', ['username' =>
			$this->session->userdata('username')])->row_array(),
			'gaji' => $gaji,
			'ket' => $ket,
			'option_tahun' => $option_tahun,
			'url_cetak' => $url_cetak,
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
