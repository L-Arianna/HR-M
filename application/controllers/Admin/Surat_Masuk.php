<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Surat_Masuk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //$this->load->model('Gudang');
    }

    public function index()
    {
        $data = [
            'title' => 'Aplikasi',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'content' => 'admin/suratmasuk/list'
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }
}

/* End of file Surat_Masuk.php */
