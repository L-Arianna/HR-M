<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Buku_Tamu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //$this->load->model('Kat_jabatan');
    }

    public function index()
    {
        $data = [
            'title' => 'Buku Tamu',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'content' => 'admin/bukutamu/list',
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }

    function tambah()
    {
        $data = [
            'title' => 'Tambah Data Buku Tamu',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'content' => 'admin/bukutamu/tambah'
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }
}

/* End of file Buku_Tamu.php */
