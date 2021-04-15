<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Buku_Tamu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Buku_Tamu_Model');
    }

    public function index()
    {

        $data = [
            'title' => 'Buku Tamu',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'content' => 'admin/bukutamu/list',
            'buku_tamu' => $this->Buku_Tamu_Model->listing(),
            'cart' => $this->Buku_Tamu_Model->tes()
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

    function add()
    {
        $this->form_validation->set_rules('nama', 'Name', 'trim|required');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        if ($this->form_validation->run() == False) {
            $data = [
                'title' => 'Tambah Surat Masuk',
                'user' =>  $this->db->get_where('tb_user', ['username' =>
                $this->session->userdata('username')])->row_array(),
                'content' => 'admin/bukutamu/tambah'
            ];
            $this->load->view('admin/layout/wrapper', $data);
        } else {
            $nama = htmlspecialchars($this->input->post('nama'));
            $tujuan = htmlspecialchars($this->input->post('tujuan'));
            $ket = htmlspecialchars($this->input->post('keterangan'));
            $start = date_create();
            $x = date_format($start, 'Y-m-d H:i:s');
            $data = array(
                'nama_tamu' => $nama,
                'tujuan_tamu' => $tujuan,
                'keterangan_tamu' => $ket,
                'start_tamu' => $x
            );
            //var_dump($data);
            $insert = $this->Buku_Tamu_Model->tambah($data);
            if ($insert) {
                $this->session->set_flashdata(
                    'sukses',
                    '<div class="alert alert-success" role="alert">Berhasil menambahkan data </div>'
                );
                redirect('Admin/Buku_Tamu', 'refresh');
            } else {
                $this->session->set_flashdata(
                    'sukses',
                    '<div class="alert alert-warning" role="alert">Gagal menambahkan data </div>'
                );
                redirect('Admin/Buku_Tamu', 'refresh');
            }
        }
    }

    function edit()
    {
        $idbukutamu = $this->uri->segment(4);

        $data = [
            'title' => 'Edit Buku Tamu',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'tamu' => $this->Buku_Tamu_Model->detail($idbukutamu),
            'content' => 'admin/bukutamu/edit'
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }
    function tamu_selesai()
    {
        $where = $this->uri->segment(4);
        $start = date_create();
        $x = date_format($start, 'Y-m-d H:i:s');
        $data = array(
            'end_tamu' => $x
        );
        //echo json_encode($data);
        //$where = ['id_tamu' => $id_tamu];
        $update = $this->Buku_Tamu_Model->update($data, $where);
        if ($update == true) {
            $this->session->set_flashdata(
                'sukses',
                '<div class="alert alert-success" role="alert">Tamu Sudah Selesai </div>'

            );
            redirect('Admin/Buku_Tamu', 'refresh');
        } else {
            $this->session->set_flashdata(
                'sukses',
                '<div class="alert alert-warning" role="alert">Gagal menambahkan data </div>'
            );
            redirect('Admin/Buku_Tamu', 'refresh');
        }
    }
    function update()
    {
        $this->form_validation->set_rules('nama', 'Name', 'trim|required');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        if ($this->form_validation->run() == False) {
            $data = [
                'title' => 'Tambah Surat Masuk',
                'user' =>  $this->db->get_where('tb_user', ['username' =>
                $this->session->userdata('username')])->row_array(),
                'content' => 'admin/bukutamu/tambah'
            ];
            $this->load->view('admin/layout/wrapper', $data);
        } else {

            $where = $this->input->post('id_buku_tamu');
            $nama = htmlspecialchars($this->input->post('nama'));
            $tujuan = htmlspecialchars($this->input->post('tujuan'));
            $ket = htmlspecialchars($this->input->post('keterangan'));

            $data = array(
                'nama_tamu' => $nama,
                'tujuan_tamu' => $tujuan,
                'keterangan_tamu' => $ket
            );
            //echo json_encode($data);
            //$where = ['id_tamu' => $id_tamu];
            $update = $this->Buku_Tamu_Model->update($data, $where);
            if ($update == true) {
                $this->session->set_flashdata(
                    'sukses',
                    '<div class="alert alert-success" role="alert">Berhasil menambahkan data </div>'

                );
                redirect('Admin/Buku_Tamu', 'refresh');
            } else {
                $this->session->set_flashdata(
                    'sukses',
                    '<div class="alert alert-warning" role="alert">Gagal menambahkan data </div>'
                );
                redirect('Admin/Buku_Tamu', 'refresh');
            }
        }
    }
    function hapus()
    {
        $data = $this->uri->segment(4);

        $x = $this->Buku_Tamu_Model->delete($data);
        if ($x == true) {
            $this->session->set_flashdata(
                'sukses',
                '<div class="alert alert-success" role="alert">Berhasil hapus Tamu </div>'
            );
            redirect('Admin/Buku_Tamu', 'refresh');
        } else {
            $this->session->set_flashdata(
                'sukses',
                '<div class="alert alert-danger" role="alert">Gagal hapus Tamu </div>'
            );
            redirect('Admin/Buku_Tamu', 'refresh');
        }
    }
    function tes()
    {
        $start = date_create();
        $r = date_format($start, 'Y-m-d');
        $h = $this->Buku_Tamu_Model->listing();
        $arr = array($r);
        //echo json_encode($h);
        foreach ($h as $value) {
            if (array_search($value->start, $arr) !== false) {
                echo json_encode($value->nama_tamu);
                //echo count($jml);
            }
        }
        //echo count($h);
    }
    function tes2()
    {
        $start = date_create();
        $r = date_format($start, '2021-04-14');
        $h = $this->Buku_Tamu_Model->tes();
        $arr = array($r);
        $arr2 = array();
        echo json_encode($h);
        /*foreach ($h as $value) {

            $pecah = explode('-', $value->start);
            echo $pecah[2] . '-' . $pecah[1] . '-' . $pecah[0] . ',';
        }*/
    }
}

/* End of file Buku_Tamu.php */
