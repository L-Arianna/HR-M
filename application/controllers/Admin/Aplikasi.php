<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Aplikasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Gudang');
    }

    public function index()
    {
        $data = [
            'title' => 'Aplikasi',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'content' => 'admin/aplikasi/list'
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }

    function tambah()
    {
        $data = [
            'title' => 'Formulir Aplikasi Pinjaman',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'content' => 'Admin/Aplikasi/tambah',
            'dropdownproduk' => $this->Gudang->show_all_produk()
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }
}

/* End of file Aplikasi.php */
