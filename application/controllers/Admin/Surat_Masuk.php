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
            'title' => 'Surat Masuk',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'content' => 'admin/suratmasuk/list',
            'suratmasuk' => $this->Surat_Masuk_Model->listing(),
            'y' => $this->Kat_jabatan->listing()
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }

    function tambah()
    {
        $data = [
            'title' => 'Tambah Surat Masuk',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'content' => 'admin/suratmasuk/tambah',
            'jabatan' => $this->Kat_jabatan->listing()
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }

    function add()
    {
        $this->form_validation->set_rules('nomorsuratmasuk', 'Number', 'trim|required');
        $this->form_validation->set_rules('diterimasuratmasuk', 'Date', 'trim|required');
        $this->form_validation->set_rules('pengirimsuratmasuk', 'Send', 'trim|required');
        $this->form_validation->set_rules('kepadasuratmasuk', 'To', 'trim|required');
        $this->form_validation->set_rules('deposisisuratmasuk', 'Deposisi', 'trim|required');
        $this->form_validation->set_rules('ringkasansuratmasuk', 'Number', 'trim|required');
        $this->form_validation->set_rules('statussuratmasuk', 'Status', 'trim|required');
        //$this->form_validation->set_rules('tembusan', 'Tembusan', 'trim|required');
        //$this->form_validation->set_rules('filesuratmasuk', 'File', 'trim|required');

        if ($this->form_validation->run() == FALSE or empty($_FILES['filesuratmasuk']['name'])) {
            $data = [
                'title' => 'Tambah Surat Masuk',
                'user' =>  $this->db->get_where('tb_user', ['username' =>
                $this->session->userdata('username')])->row_array(),
                'content' => 'admin/suratmasuk/tambah',
                'jabatan' => $this->Kat_jabatan->listing()
            ];
            $this->load->view('admin/layout/wrapper', $data);
            //exit();
        } else {

            $nomor = htmlspecialchars($this->input->post('nomorsuratmasuk'));
            $kepada = htmlspecialchars($this->input->post('kepadasuratmasuk'));
            $pengirim = $this->input->post('pengirimsuratmasuk');
            $deposisi = htmlspecialchars($this->input->post('deposisisuratmasuk'));
            $ringkasan = $this->input->post('ringkasansuratmasuk');
            $tembusan = $this->input->post('tembusan');
            $status = htmlspecialchars($this->input->post('statussuratmasuk'));
            //$filesurat = $this->input->post('filesuratmasuk');
            $tbn = implode(",", $tembusan);

            $nama_file = "File__" . time();
            $config['upload_path']          = './assets/upload-pdf';
            $config['allowed_types']        = 'pdf';
            //$config['max_size']             = 100;
            //$config['max_width']            = 1024;
            //$config['max_height']           = 768;
            $config['file_name']            = $nama_file;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('filesuratmasuk')) {
                $error = array('error' => $this->upload->display_errors());
                $isi = 'Data Kosong |' . $error;
                $this->flashdatas($isi);
                redirect('Admin/Surat_Masuk/tambah/', 'refresh');
            } else {
                $data = array('upload_data' => $this->upload->data());

                $data = array(
                    'nomor_surat_masuk' => $nomor,
                    'kepada_surat_masuk' => $kepada,
                    'pengirim_surat_masuk' => $pengirim,
                    'deposisi_surat_masuk' => $deposisi,
                    'ringkasan_surat_masuk' => $ringkasan,
                    'status_surat_masuk' => $status,
                    'file_surat_masuk' => $nama_file,
                    'tembusan_surat_masuk' => $tbn
                );
                $insert = $this->Surat_Masuk_Model->tambah($data);
                $isi = 'Berhasil Simpan Data!';
                $this->flashdatas($isi);
                redirect('Admin/Surat_Masuk', 'refresh');
            }
        }
    }

    function edit()
    {
        $idsuratmasuk = $this->uri->segment(4);

        $data = [
            'title' => 'Edit Surat Masuk',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'surat_masuk' => $this->Surat_Masuk_Model->detail($idsuratmasuk),
            'jabatan' => $this->Kat_jabatan->listing(),
            'content' => 'admin/suratmasuk/edit'
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }
    function update()
    {

        $idsuratmasuk = htmlspecialchars($this->input->post('idsuratmasuk'));
        $this->form_validation->set_rules('nomorsuratmasuk', 'Number', 'trim|required');
        $this->form_validation->set_rules('diterimasuratmasuk', 'Date', 'trim|required');
        $this->form_validation->set_rules('pengirimsuratmasuk', 'Send', 'trim|required');
        $this->form_validation->set_rules('kepadasuratmasuk', 'To', 'trim|required|alpha');
        $this->form_validation->set_rules('deposisisuratmasuk', 'Deposisi', 'trim|required');
        $this->form_validation->set_rules('ringkasansuratmasuk', 'Number', 'trim|required');
        $this->form_validation->set_rules('statussuratmasuk', 'Status', 'trim|required');
        //$this->form_validation->set_rules('tembusan', 'Tembusan', 'trim|required');
        //$this->form_validation->set_rules('filesuratmasuk', 'File', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'Edit Surat Masuk',
                'user' =>  $this->db->get_where('tb_user', ['username' =>
                $this->session->userdata('username')])->row_array(),
                'jabatan' => $this->Kat_jabatan->listing(),
                'surat_masuk' => $this->Surat_Masuk_Model->detail($idsuratmasuk),
                'content' => 'admin/suratmasuk/edit'
            ];
            $this->load->view('admin/layout/wrapper', $data);
            //redirect(base_url('Admin/Surat_Masuk/edit', $data));
        } else {

            $w = htmlspecialchars($this->input->post('idsuratmasuk'));
            $nomor = htmlspecialchars($this->input->post('nomorsuratmasuk'));
            $kepada = htmlspecialchars($this->input->post('kepadasuratmasuk'));
            $pengirim = $this->input->post('pengirimsuratmasuk');
            $deposisi = htmlspecialchars($this->input->post('deposisisuratmasuk'));
            $ringkasan = $this->input->post('ringkasansuratmasuk');
            $tembusan = $this->input->post('tembusan');
            $status = htmlspecialchars($this->input->post('statussuratmasuk'));
            $filesurat = $this->input->post('filesuratmasuk');
            $filelama = $this->input->post('namafilelama');
            $tbn = implode(",", $tembusan);

            $nama_file = "File__" . time();
            $config['upload_path']          = './assets/upload-pdf';
            $config['allowed_types']        = 'pdf';
            //$config['max_size']             = 100;
            //$config['max_width']            = 1024;
            //$config['max_height']           = 768;
            $config['file_name']            = $nama_file;

            if (empty($_FILES['filesuratmasuk']['name'])) {
                $data = [
                    'nomor_surat_masuk' => $nomor,
                    'kepada_surat_masuk' => $kepada,
                    'pengirim_surat_masuk' => $pengirim,
                    'deposisi_surat_masuk' => $deposisi,
                    'ringkasan_surat_masuk' => $ringkasan,
                    'status_surat_masuk' => $status,
                    //'file_surat_masuk' => $nama_file,
                    'tembusan_surat_masuk' => $tbn
                ];
                $where = ['id_surat_masuk' => $w];
                $this->Surat_Masuk_Model->update($data, $where);
                $isi = 'Berhasil Update data';
                $this->flashdatas($isi);
                redirect('Admin/Surat_Masuk/', 'refresh');
            } else {
                $this->load->library('upload', $config);

                unlink('assets/upload-pdf/' . $filelama);

                if (!$this->upload->do_upload('filesuratmasuk')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata(
                        'sukses',
                        '<div class="alert alert-success" role="alert">' . $error . ' </div>'
                    );
                    redirect('Admin/Surat_Masuk/edit/' . $w . '', 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());

                    $data = [
                        'nomor_surat_masuk' => $nomor,
                        'kepada_surat_masuk' => $kepada,
                        'pengirim_surat_masuk' => $pengirim,
                        'deposisi_surat_masuk' => $deposisi,
                        'ringkasan_surat_masuk' => $ringkasan,
                        'status_surat_masuk' => $status,
                        'file_surat_masuk' => $nama_file,
                        'tembusan_surat_masuk' => $tbn
                    ];
                    $where = ['id_surat_masuk' => $w];
                    $this->Surat_Masuk_Model->update($data, $where);
                    $isi = 'Berhasil Update Data!';
                    $this->flashdatas($isi);
                    redirect('Admin/Surat_Masuk/', 'refresh');
                }
            }
        }
    }
    function lihatsurat()
    {
        $idsuratmasuk = $this->uri->segment(4);
        $data = [
            'title' => 'Lihat Surat PDF',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'surat_masuk' => $this->Surat_Masuk_Model->detail($idsuratmasuk),
            'content' => 'admin/suratmasuk/lihatsurat'
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }
    function cek_all_jabatan()
    {
        echo json_encode($this->Kat_jabatan->listing());
    }

    function delete()
    {
        $idsuratmasuk = $this->uri->segment(4);
        $filesuratmasuk = $this->uri->segment(5);

        $data = [
            'id_surat_masuk' => $idsuratmasuk
        ];
        $this->Surat_Masuk_Model->delete($data);
        $this->session->set_flashdata(
            'sukses',
            '<div class="alert alert-danger" role="alert">Berhasil hapus Surat Masuk </div>'
        );
        if ($filesuratmasuk == '') {
        } else {
            unlink('assets/upload-pdf/' . $filesuratmasuk . '.pdf');
        }
        redirect('Admin/Surat_Masuk', 'refresh');
    }
    function multidelete()
    {
        $ch = $this->input->post('idsurat');
        //echo json_encode($ch);
        $jml = count($ch);
        if (empty($ch)) {
            $isi = 'Data Kosong';
            $this->flashdatas($isi);
            redirect('Admin/Surat_Masuk', 'refresh');
        } else {
            for ($i = 0; $i < $jml; $i++) {
                $y = $this->Surat_Masuk_Model->detail($ch[$i]);
                $idsurat =  $y->id_surat_masuk;
                $ul = unlink('assets/upload-pdf/' . $y->file_surat_masuk . ".pdf");
                $data = [
                    'id_surat_masuk' => $idsurat
                ];
                $del = $this->Surat_Masuk_Model->delete($data);
            }
            $isi = 'Berhasil Hapus Data!';
            $this->flashdatas($isi);
            redirect('Admin/Surat_Masuk', 'refresh');
        }
    }

    function flashdatas($isi)
    {
        $this->session->set_flashdata(
            'sukses',
            '<div class="alert alert-secondary border-0 bg-secondary alert-dismissible fade show">
            <div class="text-white text-center">' . $isi . '</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'
        );
    }
}

/* End of file Surat_Masuk.php */
