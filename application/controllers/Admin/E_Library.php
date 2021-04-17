<?php

defined('BASEPATH') or exit('No direct script access allowed');

class E_Library extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->model('Buku_Tamu_Model');
    }
    public function index()
    {
        $data = [
            'title' => 'E-Library',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'content' => 'admin/elibrary/list'
        ];
        $this->session->set_flashdata(
            'sukses',
            ''
        );
        $this->load->view('admin/layout/wrapper', $data);
    }

    function index_admin()
    {
        $data = [
            'title' => 'E-Library',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'content' => 'admin/elibrary/listAdmin'
        ];
        $this->session->set_flashdata(
            'sukses',
            ''
        );
        $this->load->view('admin/layout/wrapper', $data);
    }

    function tambah_admin()
    {
        $data = [
            'title' => 'E-Library',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'content' => 'admin/elibrary/tambahAdmin'
        ];
        $this->session->set_flashdata(
            'sukses',
            ''
        );
        $this->load->view('admin/layout/wrapper', $data);
    }
}

/* End of file E_Library.php */
