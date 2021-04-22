<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Khazanah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //$this->load->model('Kat_jabatan');
    }

    public function index()
    {
        $data = [
            'title' => 'Khazanah',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'content' => 'admin/khazanah/tambah'
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }
}

/* End of file Khazanah.php */
