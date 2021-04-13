<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function index()
	{


		$username = $this->input->post('username');
		$user = $this->db->get_where('tb_user', ['username' => $username])->row_array();
		$pegawai = $this->db->get_where('dat_pegawai', ['username' => $username])->row_array();

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');


		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Sign in your account'
			];
			$this->load->view('auth', $data);
		} else {
			if ($user) {
				if ($user['role_id'] == 1) {
					$this->_login();
				}
			} elseif ($pegawai) {
				if ($pegawai['role_id'] == 1) {
					$this->_login_pegawai();
				}
			}
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('tb_user', ['username' => $username])->row_array();
		if ($user) {
			if ($user['is_active'] == 1) {
				if (password_verify($password, $user['password'])) {
					$data = [
						'id_user' => $user['id_user'],
						'username' => $user['username'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						// print_r($this->session->userdata());
						redirect('Admin/Dashboard');
					} elseif ($user['role_id'] == 2) {
						redirect('operator/dashboard');
					}
				} else {
					$this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">
					username dan password salah!
					</div>');
					redirect('Auth');
				}
			} elseif ($user['is_active'] == 0) {
				$this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">
			username dan password tidak aktif, silahkan hubungi admin!
			</div>');
				// SETALAH PESAN ERROR MAKA AKAN DI KEMBALIKAN PADA HALAMAN LOGIN
				redirect('Auth');
			}
		} else {
			//MENAMPILKAN NOTIFIKASI ERROR 
			$this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">
			username atau password tidak terdaftar
			</div>');
			// SETALAH PESAN ERROR MAKA AKAN DI KEMBALIKAN PADA HALAMAN LOGIN
			redirect('auth');
		}
	}
	private function _login_pegawai()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('dat_pegawai', ['username' => $username])->row_array();
		if ($user) {
			if ($user['is_active'] == 1) {
				if (password_verify($password, $user['password'])) {
					$data = [
						'nip' => $user['nip'],
						'nama_pegawai' => $user['nama_pegawai'],
						'username' => $user['username'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						// print_r($this->session->userdata());
						redirect('Pegawai/Dashboard');
					}
				} else {
					$this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">
					username dan password salah!
					</div>');
					redirect('Auth');
				}
			} elseif ($user['is_active'] == 0) {
				$this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">
			username dan password tidak aktif, silahkan hubungi admin!
			</div>');
				// SETALAH PESAN ERROR MAKA AKAN DI KEMBALIKAN PADA HALAMAN LOGIN
				redirect('Auth');
			}
		} else {
			//MENAMPILKAN NOTIFIKASI ERROR 
			$this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">
			username atau password tidak terdaftar
			</div>');
			// SETALAH PESAN ERROR MAKA AKAN DI KEMBALIKAN PADA HALAMAN LOGIN
			redirect('Auth');
		}
	}


	//FUNCTION LOGOUT
	public function logout()
	{

		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role_id');

		//MENAMPILKAN NOTIFIKASI LOGOUT BERHASIL 
		$this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">
            Anda berhasil keluar!
            </div>');

		// SETALAH LOGOUT MAKA AKAN DI ARAHKAN PADA HALAMAN LOGIN(auth)
		redirect('Auth');
	}
}

/* End of file Auth.php */
