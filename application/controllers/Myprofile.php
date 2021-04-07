<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Myprofile extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Kat_pend');
		$this->load->model('Pegawai_model');
	}


	public function index()
	{
		$personal = $this->User_model->topbar();
		$data['pegawai'] = $this->db->get_where('dat_pegawai', ['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[8]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[8]|matches[new_password1]');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'My Profile',
				'personal' => $personal,
				'user' =>  $this->db->get_where('dat_pegawai', ['username' =>
				$this->session->userdata('username')])->row_array(),
				'content' => 'profile'
			];
			$this->load->view('pegawai/layout/wrapper', $data);
		} else {
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if (!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('suksess', '<div class="alert alert-danger" role="alert">
            Password salah
            </div>');
				redirect('profile');
			} else {
				if ($current_password == $new_password) {
					$this->session->set_flashdata('suksess', '<div class="alert alert-danger" role="alert">
                  New Password cannot be the same as current password
                  </div>');
					redirect('profile');
				} else {
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
					$this->db->set('password', $password_hash);
					$this->db->where('username', $this->session->userdata('username'));
					$this->db->update('tb_user');
					// END UPDATE PADA DATABASE
					$this->session->set_flashdata('suksess', '<div class="alert alert-primary" role="alert">
                  Password Change
                  </div>');
					redirect('profile');
				}
			}
		}
	}

	public function edit()
	{

		$data = [

			'content' => 'myprofile'
		];
		$user =  $this->db->get_where('tb_user', ['role_id' =>
		$this->session->userdata('role_id')])->row_array();
		if ($user['role_id'] == 1) {
			$this->load->view('admin/layout/wrapper', $data);
		} else {
			$this->load->view('pegawai/layout/wrapper', $data);
		}
	}
}

/* End of file Profile.php */
