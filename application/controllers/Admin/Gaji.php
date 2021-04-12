<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gaji extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Gaji_model');
        $this->load->model('Kat_jabatan');
        $this->load->model('Kat_golongan');
        $this->load->model('Kat_pend');
        $this->load->model('Pegawai_model');
    }

    public function index()
    {
        $pegawai = $this->Pegawai_model->listing();
        if (isset($_POST['submit'])) {
            if ((!empty($_POST['bulan'])) && (!empty($_POST['tahun']))) {
                $bulan          = $_POST['bulan'];
                $tahun          = $_POST['tahun'];
            } elseif (!empty($_POST['bulan'])) {
                $bulan           = $_POST['bulan'];
                $tahun           = date('Y');
            } elseif (!empty($_POST['tahun'])) {
                $bulan          = date('m');
                $tahun          = $_POST['tahun'];
            } else {
                $bulan           = date('m');
                $tahun           = date('Y');
            }
        } else {
            $bulan           = date('m');
            $tahun           = date('Y');
        }
        $data = [
            'title' => 'Data slip gaji pegawai',
            'modal_title' => 'tambah slip gaji',
            'content' => 'admin/gaji/list',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'pegawai' => $pegawai,
            'bulan' => $bulan,
            'tahun' => $tahun,
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }

    public function tambah($nip)
    {
        $pegawai = $this->Pegawai_model->detail($nip);
        $this->form_validation->set_rules('tgl', 'tanggal gaji pegawai', 'trim|required');
        $this->form_validation->set_rules('makan', 'Tunjangan Makan', 'trim|required|numeric');
        $this->form_validation->set_rules('kesehatan_k', 'Kesehatan Pegawai', 'trim|required|numeric');
        $this->form_validation->set_rules('pulsa', 'Tunjangan Pulsa', 'trim|required|numeric');
        $this->form_validation->set_rules('transport', 'Tunjangan Transport', 'trim|required|numeric');
        $this->form_validation->set_rules('tunj_lainnya', 'Tunjangan Lainnya', 'trim|required|numeric');
        $this->form_validation->set_rules('gaji_kotor', 'Jumlah Gaji Kotor', 'trim|required|numeric');
        $this->form_validation->set_rules('jml_potongan', 'Tunjangan Makan', 'trim|required|numeric');
        $this->form_validation->set_rules('jml_potongan', 'Total Potongan', 'trim|required|numeric');
        $this->form_validation->set_rules('gaji_net', 'Jumlah Gaji Bersih', 'trim|required|numeric');
        $this->form_validation->set_rules('gaji_kotor', 'Jumlah Gaji Kotor', 'trim|required|numeric');

        if ($this->form_validation->run() ==  FALSE) {

            $data = [
                'title' => 'Tambah slip gaji pegawai',
                'pegawai' => $pegawai,
                'user' =>  $this->db->get_where('tb_user', ['username' =>
                $this->session->userdata('username')])->row_array(),
                'content' => 'admin/gaji/tambah'
            ];
            $this->load->view('admin/layout/wrapper', $data);
        } else {

            $data = [
                'nip' => $nip,
                // 'nip' => $this->input->post('nip'),
                'id_kat_jabatan' => $this->input->post('id_kat_jabatan'),
                'id_grade' => $this->input->post('id_grade'),
                'id_kat_golongan' => $this->input->post('id_kat_golongan'),
                'id_pendidikan' => $this->input->post('id_pendidikan'),
                'tgl' => $this->input->post('tgl'),
                'makan' => $this->input->post('makan'),
                'pulsa' => $this->input->post('pulsa'),
                'transport' => $this->input->post('transport'),
                'kesehatan_k' => $this->input->post('kesehatan_k'),
                'tot_pot_bpjs' => $this->input->post('tot_pot_bpjs'),
                'tunj_lainnya' => $this->input->post('tunj_lainnya'),
                'jml_potongan' => $this->input->post('jml_potongan'),
                'gaji_kotor' => $this->input->post('gaji_kotor'),
                'gaji_net' => $this->input->post('gaji_net'),
                'status' => 'belum bayar'
            ];
            // $this->Slip_gaji->tambah($data);
            $this->Gaji_model->tambah($data);
            $this->session->set_flashdata(
                'sukses',
                '<div class="alert alert-success" role="alert">Berhasil menambahkan gaji </div>'
            );
            redirect('admin/gaji', 'refresh');
        }
    }



    public function edit($id_gaji)
    {
        $gaji = $this->Gaji_model->detail($id_gaji);


        $this->form_validation->set_rules('makan', 'Tunjangan Makan', 'trim|required|numeric');
        $this->form_validation->set_rules('kesehatan_k', 'Kesehatan Pegawai', 'trim|required|numeric');
        $this->form_validation->set_rules('pulsa', 'Tunjangan Pulsa', 'trim|required|numeric');
        $this->form_validation->set_rules('transport', 'Tunjangan Transport', 'trim|required|numeric');
        $this->form_validation->set_rules('tunj_lainnya', 'Tunjangan Lainnya', 'trim|required|numeric');
        $this->form_validation->set_rules('gaji_kotor', 'Jumlah Gaji Kotor', 'trim|required|numeric');
        $this->form_validation->set_rules('jml_potongan', 'Tunjangan Makan', 'trim|required|numeric');
        $this->form_validation->set_rules('jml_potongan', 'Total Potongan', 'trim|required|numeric');
        $this->form_validation->set_rules('gaji_net', 'Jumlah Gaji Bersih', 'trim|required|numeric');
        $this->form_validation->set_rules('gaji_kotor', 'Jumlah Gaji Kotor', 'trim|required|numeric');


        if ($this->form_validation->run() ==  FALSE) {
            $data = [
                'title' => 'Edit data gaji',
                'gaji' => $gaji,
                'user' =>  $this->db->get_where('tb_user', ['username' =>
                $this->session->userdata('username')])->row_array(),
                'content' => 'admin/gaji/edit'
            ];
            $this->load->view('admin/layout/wrapper', $data);
        } else {
            $data = [
                'id_gaji' => $id_gaji,
                'nip' => $this->input->post('nip'),
                'id_kat_jabatan' => $this->input->post('id_kat_jabatan'),
                'id_grade' => $this->input->post('id_grade'),
                'id_kat_golongan' => $this->input->post('id_kat_golongan'),
                'id_pendidikan' => $this->input->post('id_pendidikan'),
                'makan' => $this->input->post('makan'),
                'pulsa' => $this->input->post('pulsa'),
                'transport' => $this->input->post('transport'),
                'kesehatan_k' => $this->input->post('kesehatan_k'),
                'tot_pot_bpjs' => $this->input->post('tot_pot_bpjs'),
                'tunj_lainnya' => $this->input->post('tunj_lainnya'),
                'jml_potongan' => $this->input->post('jml_potongan'),
                'gaji_kotor' => $this->input->post('gaji_kotor'),
                'gaji_net' => $this->input->post('gaji_net'),
                'status' => 'belum dibayar'
            ];
            $this->Gaji_model->edit($data);
            $this->session->set_flashdata(
                'sukses',
                '<div class="alert alert-success" role="alert">Berhasil edit data gaji </div>'
            );
            redirect('admin/gaji', 'refresh');
        }
    }


    public function hapus($id_gaji)
    {
        $data = [
            'id_gaji' => $id_gaji
        ];
        $this->Gaji_model->hapus($data);
        $this->session->set_flashdata(
            'sukses',
            '<div class="alert alert-danger" role="alert">Berhasil hapus kategori gaji</div>'
        );
        redirect('admin/gaji', 'refresh');
    }

    public function detail($id_gaji)
    {

        $gaji = $this->Gaji_model->detail($id_gaji);
        $data = [
            'gaji' => $gaji,
            'title' => 'Detail slip gaji',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'content' => 'admin/gaji/detail'
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }
}


/* End of file Gaji.php */
