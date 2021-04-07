<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cuti extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kat_cuti');
    }

    public function index()
    {
        $cuti = $this->Kat_cuti->listing();


        $data = [
            'title' => 'Kategori cuti pegawai',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'content' => 'admin/cuti/list',
            'cuti' => $cuti
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama_cuti', 'Nama Cuti', 'trim|required|is_unique[tb_kat_cuti.nama_cuti]');
        $this->form_validation->set_rules('jumlah_hari', 'Jumlah Hari', 'trim|required');

        if ($this->form_validation->run() == FALSE) {

            $data = [
                'title' => 'Tambah kategori cuti',
                'user' =>  $this->db->get_where('tb_user', ['username' =>
                $this->session->userdata('username')])->row_array(),
                'content' => 'admin/cuti/tambah'
            ];
            $this->load->view('admin/layout/wrapper', $data);
        } else {

            $data = [
                'nama_cuti' => $this->input->post('nama_cuti'),
                'jumlah_hari' => $this->input->post('jumlah_hari')
            ];
            $this->Kat_cuti->tambah($data);
            $this->session->set_flashdata(
                'sukses',
                '<div class="alert alert-success" role="alert">Berhasil tambah kategori cuti </div>'
            );
            redirect('admin/cuti', 'refresh');
        }
    }

    public function edit($id_kat_cuti)
    {
        $cuti = $this->Kat_cuti->detail($id_kat_cuti);
        $this->form_validation->set_rules('nama_cuti', 'Nama Cuti', 'trim|required');
        $this->form_validation->set_rules('jumlah_hari', 'Jumlah Hari', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'Edit kategori cuti',
                'cuti' => $cuti,
                'user' =>  $this->db->get_where('tb_user', ['username' =>
                $this->session->userdata('username')])->row_array(),

                'content' => 'admin/cuti/edit'
            ];
            $this->load->view('admin/layout/wrapper', $data);
        } else {
            $data = [
                'id_kat_cuti' => $id_kat_cuti,
                'nama_cuti' => $this->input->post('nama_cuti'),
                'jumlah_hari' => $this->input->post('jumlah_hari')
            ];
            $this->Kat_cuti->edit($data);
            $this->session->set_flashdata(
                'sukses',
                '<div class="alert alert-success" role="alert">Berhasil update kategori cuti </div>'
            );
            redirect('admin/cuti', 'refresh');
        }
    }

    public function hapus($id_kat_cuti)
    {
        $data = [
            'id_kat_cuti' => $id_kat_cuti
        ];
        $this->Kat_cuti->hapus($data);
        $this->session->set_flashdata(
            'sukses',
            '<div class="alert alert-danger" role="alert">Berhasil hapus kategori cuti </div>'
        );
        redirect('admin/cuti', 'refresh');
    }
}

/* End of file Cuti.php */
