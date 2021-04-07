<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Golongan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kat_golongan');
        $this->load->model('Grade_model');
    }


    public function index()
    {
        $gol = $this->Kat_golongan->listing();
        $data = [
            'title' => 'Golongan Pegawai',
            'gol' => $gol,
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),

            'content' => 'admin/golongan/list'
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }

    public function tambah()
    {

        $grade = $this->Grade_model->listing();


        $this->form_validation->set_rules('nama_golongan', 'Nama Golongan', 'trim|required|is_unique[tb_kat_golongan.nama_golongan]', array(
            'is_unique' => 'Nama golongan sudah ada'
        ));
        $this->form_validation->set_rules('gaji_gol', 'Gaji Golongan', 'trim|required|numeric');
        $this->form_validation->set_rules('id_grade', 'Nama Grade', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'Tambah golongan pegawai',
                'grade' => $grade,
                'user' =>  $this->db->get_where('tb_user', ['username' =>
                $this->session->userdata('username')])->row_array(),

                'content' => 'admin/golongan/tambah'
            ];
            $this->load->view('admin/layout/wrapper', $data);
        } else {
            $data = [
                'nama_golongan' => $this->input->post('nama_golongan'),
                'id_grade' => $this->input->post('id_grade'),
                'gaji_gol' => $this->input->post('gaji_gol')
            ];
            $this->Kat_golongan->tambah($data);
            $this->session->set_flashdata(
                'sukses',
                '<div class="alert alert-success" role="alert">Berhasil menambahkan kategori golongan </div>'
            );
            redirect('admin/golongan', 'refresh');
        }
    }

    public function edit($id_kat_golongan)
    {
        $gol = $this->Kat_golongan->detail($id_kat_golongan);



        $this->form_validation->set_rules('nama_golongan', 'Nama Golongan', 'trim|required');
        $this->form_validation->set_rules('gaji_gol', 'Gaji Golongan', 'trim|required|numeric');
        $this->form_validation->set_rules('id_grade', 'Nama Grade', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'Edit golongan pegawai',
                'gol' => $gol,
                'user' =>  $this->db->get_where('tb_user', ['username' =>
                $this->session->userdata('username')])->row_array(),

                'content' => 'admin/golongan/edit'
            ];
            $this->load->view('admin/layout/wrapper', $data);
        } else {
            $data = [
                'id_kat_golongan' => $id_kat_golongan,
                'id_grade' => $this->input->post('id_grade'),
                'nama_golongan' => $this->input->post('nama_golongan'),
                'gaji_gol' => $this->input->post('gaji_gol')
            ];
            $this->Kat_golongan->edit($data);
            $this->session->set_flashdata(
                'sukses',
                '<div class="alert alert-success" role="alert">Berhasil menambahkan kategori golongan </div>'
            );
            redirect('admin/golongan', 'refresh');

            // var_dump($data);
        }
    }

    public function hapus($id_kat_golongan)
    {
        $data = [
            'id_kat_golongan' => $id_kat_golongan
        ];
        $this->Kat_golongan->hapus($data);
        $this->session->set_flashdata(
            'sukses',
            '<div class="alert alert-danger" role="alert">Berhasil hapus kategori golongan </div>'
        );
        redirect('admin/golongan', 'refresh');
    }
}

/* End of file Golongan.php */
