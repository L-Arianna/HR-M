<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}


	public function index()
	{
		$usr = $this->User_model->listing();


		$this->form_validation->set_rules('nama', 'Nama lengkap', 'trim|required');
		$this->form_validation->set_rules('role_id', 'Hak akses', 'trim|required|is_unique[tb_user.role_id]');
		$this->form_validation->set_rules('username', 'username', 'trim|required|is_unique[tb_user.username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');


		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'data admin',
				'user' =>  $this->db->get_where('tb_user', ['username' =>
				$this->session->userdata('username')])->row_array(),
				'usr' => $usr,
				'content' => 'admin/user/list'
			];
			$this->load->view('admin/layout/wrapper', $data);
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'username' => htmlspecialchars($this->input->post('username'), true),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role_id' => $this->input->post('role_id'),
				'image' => 'default.jpg',
				'is_active' => 1,
				'date_created' => time()
			];
			$this->User_model->tambah($data);
			$this->session->set_flashdata(
				'sukses',
				'<div class="alert alert-success" role="alert">Berhasil menambahkan data admin </div>'
			);
			redirect('admin/user', 'refresh');
		}
	}
}

/* End of file User.php */
