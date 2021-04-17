<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Surat_Keluar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kat_jabatan');
        $this->load->model('Gudang');
        $this->load->model('Surat_Keluar_Model');
    }

    public function index()
    {
        $data = [
            'title' => 'Surat Keluar',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'content' => 'admin/suratkeluar/list',
            'suratkeluar' => $this->Surat_Keluar_Model->listing()
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }

    function tambah()
    {
        $data = [
            'title' => 'Tambah Surat Keluar',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'content' => 'admin/suratkeluar/tambah',
            'jabatan' => $this->Kat_jabatan->listing(),
            'statussurat' => $this->Gudang->show_all_status_surat_masuk()
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }
    function add()
    {
        $this->form_validation->set_rules('nomorsuratkeluar', 'Number', 'trim|required');
        $this->form_validation->set_rules('kepada', 'To', 'trim|required');
        $this->form_validation->set_rules('perihal', 'Perihal', 'trim|required');
        $this->form_validation->set_rules('lampiran', 'Lampiran', 'trim|required');
        $this->form_validation->set_rules('tembusan', 'Tembusan', 'trim|required');
        $this->form_validation->set_rules('pengirimsurat', 'Send', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Ket', 'trim|required');
        $this->form_validation->set_rules('statussuratkeluar', 'Status', 'trim|required');
        $this->form_validation->set_rules('indexsberkassurat', 'Indexs', 'trim|required');
        //$this->form_validation->set_rules('filesuratkeluar', 'File', 'trim|required');

        if ($this->form_validation->run() == FALSE or empty($_FILES['filesuratkeluar']['name'])) {
            $data = [
                'title' => 'Tambah Surat Keluar',
                'user' =>  $this->db->get_where('tb_user', ['username' =>
                $this->session->userdata('username')])->row_array(),
                'content' => 'admin/suratkeluar/tambah',
                'jabatan' => $this->Kat_jabatan->listing(),
                'statussurat' => $this->Gudang->show_all_status_surat_masuk()
            ];
            $this->load->view('admin/layout/wrapper', $data);
            //exit();
        } else {

            $nomor = htmlspecialchars($this->input->post('nomorsuratkeluar'));
            $kepada = htmlspecialchars($this->input->post('kepada'));
            $perihal = htmlspecialchars($this->input->post('perihal'));
            $lampiran = htmlspecialchars($this->input->post('lampiran'));
            $tembusan = htmlspecialchars($this->input->post('tembusan'));
            $pengirim = $this->input->post('pengirimsurat');
            $keterangan = htmlspecialchars($this->input->post('keterangan'));
            $status = $this->input->post('statussuratkeluar');
            $indexs = $this->input->post('indexsberkassurat');
            //$filesurat = $this->input->post('filesuratkeluar');
            //$tbn = implode(",", $tembusan);

            $nama_file = "File__" . time();
            $config['upload_path']          = './assets/upload-pdf';
            $config['allowed_types']        = 'pdf';
            //$config['max_size']             = 100;
            //$config['max_width']            = 1024;
            //$config['max_height']           = 768;
            $config['file_name']            = $nama_file;


            $this->load->library('upload', $config);


            if (!$this->upload->do_upload('filesuratkeluar')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata(
                    'error',
                    '<div class="alert alert-success" role="alert">' . $error . ' </div>'
                );
                redirect('Admin/Surat_Keluar/tambah/', 'refresh');
            } else {
                $data = array('upload_data' => $this->upload->data());

                $data = array(
                    'nomor_surat_keluar' => $nomor,
                    'kepada_surat_keluar' => $kepada,
                    'perihal_surat_keluar' => $perihal,
                    'lampiran_surat_keluar' => $lampiran,
                    'tembusan_surat_keluar' => $tembusan,
                    'pengirim_surat_keluar' => $pengirim,
                    'keterangan_surat_keluar' => $keterangan,
                    'status_surat_keluar' => $status,
                    'indexs_berkas_surat' => $indexs,
                    'file_surat_keluar' => $nama_file
                );
                $insert = $this->Surat_Keluar_Model->tambah($data);
                if ($insert) {
                    redirect('Admin/Surat_Keluar', 'refresh');
                } else {
                    redirect('Admin/Surat_Keluar', 'refresh');
                }
            }
        }
    }

    function edit()
    {
        $idsuratkeluar = $this->uri->segment(4);

        $data = [
            'title' => 'Edit Surat Keluar',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'jabatan' => $this->Kat_jabatan->listing(),
            'statussurat' => $this->Gudang->show_all_status_surat_masuk(),
            'surat_keluar' => $this->Surat_Keluar_Model->detail($idsuratkeluar),
            'content' => 'admin/suratkeluar/edit'
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }
    function update()
    {

        $idsuratkeluar = htmlspecialchars($this->input->post('idsuratkeluar'));
        $this->form_validation->set_rules('nomorsuratkeluar', 'Number', 'trim|required');
        $this->form_validation->set_rules('kepada', 'To', 'trim|required');
        $this->form_validation->set_rules('perihal', 'Perihal', 'trim|required');
        $this->form_validation->set_rules('lampiran', 'Lampiran', 'trim|required');
        $this->form_validation->set_rules('tembusan', 'Tembusan', 'trim|required');
        $this->form_validation->set_rules('pengirimsurat', 'Send', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Ket', 'trim|required');
        $this->form_validation->set_rules('statussuratkeluar', 'Status', 'trim|required');
        $this->form_validation->set_rules('indexsberkassurat', 'Indexs', 'trim|required');
        //$this->form_validation->set_rules('filesuratkeluar', 'File', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'Edit Surat Masuk',
                'user' =>  $this->db->get_where('tb_user', ['username' =>
                $this->session->userdata('username')])->row_array(),
                'jabatan' => $this->Kat_jabatan->listing(),
                'statussurat' => $this->Gudang->show_all_status_surat_masuk(),
                'surat_keluar' => $this->Surat_Keluar_Model->detail($idsuratkeluar),
                'content' => 'admin/suratkeluar/edit'
            ];
            $this->load->view('admin/layout/wrapper', $data);
        } else {

            $nomor = htmlspecialchars($this->input->post('nomorsuratkeluar'));
            $kepada = htmlspecialchars($this->input->post('kepada'));
            $perihal = htmlspecialchars($this->input->post('perihal'));
            $lampiran = htmlspecialchars($this->input->post('lampiran'));
            $tembusan = htmlspecialchars($this->input->post('tembusan'));
            $pengirim = $this->input->post('pengirimsurat');
            $keterangan = htmlspecialchars($this->input->post('keterangan'));
            $status = $this->input->post('statussuratkeluar');
            $indexs = $this->input->post('indexsberkassurat');

            $filesurat = $this->input->post('filesuratkeluar');
            $filelama = $this->input->post('namafilelama');
            //$tbn = implode(",", $tembusan);

            $nama_file = "File__" . time();
            $config['upload_path']          = './assets/upload-pdf';
            $config['allowed_types']        = 'pdf';
            //$config['max_size']             = 100;
            //$config['max_width']            = 1024;
            //$config['max_height']           = 768;
            $config['file_name']            = $nama_file;

            if (empty($_FILES['filesuratkeluar']['name'])) {
                $data = [
                    'nomor_surat_keluar' => $nomor,
                    'kepada_surat_keluar' => $kepada,
                    'perihal_surat_keluar' => $perihal,
                    'lampiran_surat_keluar' => $lampiran,
                    'tembusan_surat_keluar' => $tembusan,
                    'pengirim_surat_keluar' => $pengirim,
                    'keterangan_surat_keluar' => $keterangan,
                    'status_surat_keluar' => $status,
                    'indexs_berkas_surat' => $indexs
                ];
                $where = ['id_surat_keluar' => $idsuratkeluar];
                $this->Surat_Keluar_Model->update($data, $where);

                redirect('Admin/Surat_Keluar/', 'refresh');
            } else {
                $this->load->library('upload', $config);


                if (!$this->upload->do_upload('filesuratkeluar')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata(
                        'sukses',
                        '<div class="alert alert-success" role="alert">' . $error . ' </div>'
                    );
                    redirect('Admin/Surat_Keluar/edit/' . $idsuratkeluar . '', 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());

                    $data = [
                        'nomor_surat_keluar' => $nomor,
                        'kepada_surat_keluar' => $kepada,
                        'perihal_surat_keluar' => $perihal,
                        'lampiran_surat_keluar' => $lampiran,
                        'tembusan_surat_keluar' => $tembusan,
                        'pengirim_surat_keluar' => $pengirim,
                        'keterangan_surat_keluar' => $keterangan,
                        'status_surat_keluar' => $status,
                        'indexs_berkas_surat' => $indexs,
                        'file_surat_keluar' => $nama_file
                    ];

                    unlink('assets/upload-pdf/' . $filelama);
                    $where = ['id_surat_keluar' => $idsuratkeluar];
                    $this->Surat_Keluar_Model->update($data, $where);
                    $this->session->set_flashdata(
                        'sukses',
                        '<div class="alert alert-success" role="alert">Berhasil Update </div>'
                    );
                    redirect('Admin/Surat_Keluar/', 'refresh');
                }
            }
        }
    }
    function lihatsurat()
    {
        $idsuratkeluar = $this->uri->segment(4);
        $data = [
            'title' => 'Lihat Surat PDF',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'surat_keluar' => $this->Surat_Keluar_Model->detail($idsuratkeluar),
            'content' => 'admin/suratkeluar/lihatsurat'
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }
    function delete()
    {
        $idsuratkeluar = $this->uri->segment(4);
        $filesuratmasuk = $this->uri->segment(5);

        $data = [
            'id_surat_keluar' => $idsuratkeluar
        ];
        $this->Surat_Keluar_Model->delete($data);
        $this->session->set_flashdata(
            'sukses',
            '<div class="alert alert-danger" role="alert">Berhasil hapus Surat Keluar </div>'
        );
        if ($filesuratmasuk == '') {
        } else {
            unlink('assets/upload-pdf/' . $filesuratmasuk . '.pdf');
        }
        redirect('Admin/Surat_Keluar', 'refresh');
    }
    function multidelete()
    {
        $ch = $this->input->post('idsurat');
        //echo json_encode($ch);
        if (empty($ch)) {
            $this->session->set_flashdata(
                'sukses',
                '<div class="alert alert-danger" role="alert">Data Kosong</div>'
            );
            redirect('Admin/Surat_Keluar', 'refresh');
        } else {
            for ($i = 0; $i < count($ch); $i++) {
                $y = $this->Surat_Keluar_Model->detail($ch[$i]);
                //$filelama =  $y->file_surat_keluar . ".pdf";
                $idsurat =  $y->id_surat_keluar;
                $ul = unlink('assets/upload-pdf/' . $y->file_surat_keluar . ".pdf");
                $data = [
                    'id_surat_keluar' => $idsurat
                ];
                $del = $this->Surat_Keluar_Model->delete($data);
            }
            $this->session->set_flashdata(
                'sukses',
                '<div class="alert alert-success" role="alert">Berhasil hapus Surat Keluar </div>'
            );
            redirect('Admin/Surat_Keluar', 'refresh');
            //unlink('assets/upload-pdf/' . $filelama);
        }
    }
}

/* End of file Surat_Keluar.php */
