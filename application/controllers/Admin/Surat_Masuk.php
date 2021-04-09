<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Surat_Masuk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kat_jabatan');
        $this->load->model('Gudang');
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

    function tambah()
    {
        $data = [
            'title' => 'Aplikasi',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'content' => 'admin/suratmasuk/tambah',
            'jabatan' => $this->Kat_jabatan->listing(),
            'statussurat' => $this->Gudang->show_all_status_surat_masuk()
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }

    function add()
    {
        $this->_validate_surat_masuk();
    }

    private function _validate_surat_masuk()
    {
        $this->form_validation->set_rules('nomorsuratmasuk', 'Number', 'trim|required');
        $this->form_validation->set_rules('diterimasuratmasuk', 'Date', 'trim|required');
        $this->form_validation->set_rules('kepadasuratmasuk', 'To', 'trim|required');
        $this->form_validation->set_rules('deposisisuratmasuk', 'Deposisi', 'trim|required');
        $this->form_validation->set_rules('ringkasansuratmasuk', 'Number', 'trim|required');
        $this->form_validation->set_rules('statussuratmasuk', 'Status', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        }
    }

    function cek_all_jabatan()
    {
        echo json_encode($this->Kat_jabatan->listing());
    }
}

/* End of file Surat_Masuk.php */
