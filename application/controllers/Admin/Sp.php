<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sp extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kat_sp');
    }

    public function index()
    {
        $sp = $this->Kat_sp->listing();


        $data = [
            'title' => 'Kategori peringatan pegawai',
            'sp' => $sp,
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'content' => 'admin/sp/list'
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }

    public function tambah()
    {


        $this->form_validation->set_rules('nama_peringatan', 'Nama Peringatan', 'trim|required|is_unique[tb_kat_peringatan.nama_peringatan]');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');


        if ($this->form_validation->run() == FALSE) {

            $data = [
                'title' => 'Tambah kategori peringatan',
                'user' =>  $this->db->get_where('tb_user', ['username' =>
                $this->session->userdata('username')])->row_array(),

                'content' => 'admin/sp/tambah'
            ];
            $this->load->view('admin/layout/wrapper', $data);
        } else {
            $data = [
                'nama_peringatan' => $this->input->post('nama_peringatan'),
                'keterangan' => $this->input->post('keterangan')
            ];
            $this->Kat_sp->tambah($data);
            $this->session->set_flashdata(
                'sukses',
                '<div class="alert alert-success" role="alert">Berhasil tambah kategori peringatan </div>'
            );
            redirect('admin/sp', 'refresh');
        }
    }

    public function edit($id_kat_peringatan)
    {
        $gol = $this->Kat_sp->detail($id_kat_peringatan);



        $this->form_validation->set_rules('nama_peringatan', 'Nama Peringatan', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'Edit kategori peringatan',
                'gol' => $gol,
                'user' =>  $this->db->get_where('tb_user', ['username' =>
                $this->session->userdata('username')])->row_array(),

                'content' => 'admin/sp/edit'
            ];
            $this->load->view('admin/layout/wrapper', $data);
        } else {
            $data = [
                'id_kat_peringatan' => $id_kat_peringatan,
                'nama_peringatan' => $this->input->post('nama_peringatan'),
                'keterangan' => $this->input->post('keterangan')
            ];
            $this->Kat_sp->edit($data);
            $this->session->set_flashdata(
                'sukses',
                '<div class="alert alert-success" role="alert">Berhasil update kategori peringatan </div>'
            );
            redirect('admin/sp', 'refresh');
        }
    }

    public function hapus($id_kat_peringatan)
    {
        $data = [
            'id_kat_peringatan' => $id_kat_peringatan
        ];
        $this->Kat_sp->hapus($data);
        $this->session->set_flashdata(
            'sukses',
            '<div class="alert alert-danger" role="alert">Berhasil hapus kategori peringatan </div>'
        );
        redirect('admin/sp', 'refresh');
    }
}

/* End of file Sp.php */
