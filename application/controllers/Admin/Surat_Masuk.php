<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Surat_Masuk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kat_jabatan');
        $this->load->model('Gudang');
        $this->load->model('Surat_Masuk_Model');
    }

    public function index()
    {
        $data = [
            'title' => 'Aplikasi',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'content' => 'admin/suratmasuk/list',
            'suratmasuk' => $this->Surat_Masuk_Model->listing()
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

    function tes()
    {
        //$x = $this->Kat_jabatan->viewByJabatan(2);
        //echo json_encode($x);
        $surat = $this->Surat_Masuk_Model->listing();
        $count = $this->Surat_Masuk_Model->count_all();
        $n = 0;
        foreach ($surat as $value) {
            for ($i = 0; $i < $count; $i++) {
                $data[$n] = $value->tembusan_surat_masuk;
            }
            $n++;
        }

        echo json_encode($data);
        $s = array(
            '0' => 'satu',
            '1' => 'dua',
            '2' => 'tiga',
            '3' => 'empat',
            '4' => 'lima'
        );
        foreach ($data as $c) {
            echo $s[$c];
        }
    }

    function add()
    {
        $this->_validate_surat_masuk();
        $nomor = htmlspecialchars($this->input->post('nomorsuratmasuk'));
        $kepada = htmlspecialchars($this->input->post('kepadasuratmasuk'));
        $pengirim = $this->input->post('pengirimsuratmasuk');
        $deposisi = htmlspecialchars($this->input->post('deposisisuratmasuk'));
        $ringkasan = $this->input->post('ringkasansuratmasuk');
        $tembusan = $this->input->post('tembusan');
        $status = htmlspecialchars($this->input->post('statussuratmasuk'));
        //$filesurat = $this->input->post('filesuratmasuk');
        $tbn = implode(",", $tembusan);


        $data = array(
            'nomor_surat_masuk' => $nomor,
            'kepada_surat_masuk' => $kepada,
            'pengirim_surat_masuk' => $pengirim,
            'deposisi_surat_masuk' => $deposisi,
            'ringkasan_surat_masuk' => $ringkasan,
            'status_surat_masuk' => $status,
            //'' => $filesurat,
            'tembusan_surat_masuk' => $tbn
        );
        $insert = $this->Surat_Masuk_Model->tambah($data);
        if ($insert) {
            $this->session->set_flashdata(
                'sukses',
                '<div class="alert alert-success" role="alert">Berhasil menambahkan data </div>'
            );
            redirect('Admin/Surat_Masuk', 'refresh');
        } else {
            $this->session->set_flashdata(
                'sukses',
                '<div class="alert alert-warning" role="alert">Gagal menambahkan data </div>'
            );
            redirect('Admin/Surat_Masuk', 'refresh');
        }
    }

    private function _validate_surat_masuk()
    {
        $this->form_validation->set_rules('nomorsuratmasuk', 'Number', 'trim|required');
        $this->form_validation->set_rules('diterimasuratmasuk', 'Date', 'trim|required');
        $this->form_validation->set_rules('pengirimsuratmasuk', 'Send', 'trim|required');
        $this->form_validation->set_rules('kepadasuratmasuk', 'To', 'trim|required');
        $this->form_validation->set_rules('deposisisuratmasuk', 'Deposisi', 'trim|required');
        $this->form_validation->set_rules('ringkasansuratmasuk', 'Number', 'trim|required');
        $this->form_validation->set_rules('statussuratmasuk', 'Status', 'trim|required');
        $this->form_validation->set_rules('tembusan', 'Tembusan', 'trim|required');
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
