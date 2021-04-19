<?php

defined('BASEPATH') or exit('No direct script access allowed');

class E_Library extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Gudang');
        $this->load->model('E_Lib_Model');
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

    function list_admin()
    {
        $data = [
            'title' => 'E-Library',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'content' => 'admin/elibrary/listAdmin',
            'elib' => $this->E_Lib_Model->listing()
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
            'content' => 'admin/elibrary/tambahAdmin',
            'katelib' => $this->Gudang->show_all_kat_book()
        ];
        $this->session->set_flashdata(
            'sukses',
            ''
        );
        $this->load->view('admin/layout/wrapper', $data);
    }

    function add()
    {
        $this->form_validation->set_rules('judulbook', 'Judul', 'trim|required');
        $this->form_validation->set_rules('keteranganbook', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'Tambah E-Library',
                'user' =>  $this->db->get_where('tb_user', ['username' =>
                $this->session->userdata('username')])->row_array(),
                'content' => 'admin/elibrary/tambahAdmin',
                'katelib' => $this->Gudang->show_all_kat_book()
            ];
            $this->session->set_flashdata(
                'sukses',
                '<div class="alert alert-warning" role="alert">Harap isi Semua Data</div>'
            );
            $this->load->view('admin/layout/wrapper', $data);
            //exit();
        } else {
            $judul = htmlspecialchars($this->input->post('judulbook'));
            $keterangan = htmlspecialchars($this->input->post('keteranganbook'));
            $kategori = htmlspecialchars($this->input->post('kategori'));
            //$file = $_FILES['filebook1']['name'];
            if ($this->form_validation->run() == False) {
                $data = [
                    'title' => 'Tambah E-Library',
                    'user' =>  $this->db->get_where('tb_user', ['username' =>
                    $this->session->userdata('username')])->row_array(),
                    'content' => 'admin/elibrary/tambahAdmin',
                    'katelib' => $this->Gudang->show_all_kat_book()
                ];
                $this->session->set_flashdata(
                    'sukses',
                    '<div class="alert alert-warning" role="alert">Harap isi Semua Data</div>'
                );
                $this->load->view('admin/layout/wrapper', $data);
            } else {
                $arr = array();
                for ($i = 0; $i < 3; $i++) {
                    if (empty($_FILES['filebook1']['name'])) {
                        $data = [
                            'title' => 'Tambah E-Library',
                            'user' =>  $this->db->get_where('tb_user', ['username' =>
                            $this->session->userdata('username')])->row_array(),
                            'content' => 'admin/elibrary/tambahAdmin',
                            'katelib' => $this->Gudang->show_all_kat_book()
                        ];
                        $this->session->set_flashdata(
                            'sukses',
                            '<div class="alert alert-warning" role="alert">Filebook Kosong</div>'
                        );
                    }
                    //$nama_file = "E-Lib__" . date('YmdHis') . $i;
                    $config['upload_path']          = './assets/upload-pdf';
                    $config['allowed_types']        = 'pdf';
                    //$config['file_name']            = $nama_file;
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);
                    //$arr[$i] = $nama_file;
                    $arr[$i] = $this->upload->data('file_name');

                    if (!$this->upload->do_upload('filebook1')) {
                        $error = array('error' => $this->upload->display_errors());
                        echo json_encode($error);
                        //redirect('Admin/E_Library/tambah_admin/', 'refresh');
                    }
                    if (!$this->upload->do_upload('filebook2')) {
                        $error = array('error' => $this->upload->display_errors());
                        echo json_encode($error);
                        //redirect('Admin/E_Library/tambah_admin/', 'refresh');
                    }
                    if (!$this->upload->do_upload('filebook3')) {
                        $error = array('error' => $this->upload->display_errors());
                        echo json_encode($error);
                        //redirect('Admin/E_Library/tambah_admin/', 'refresh');
                    }
                }
                $imp = implode("/", $arr);
                $data = array('upload_data' => $this->upload->data());
                echo json_encode($imp);
                /*
                $data = array(
                    'judul_book' => $judul,
                    'keterangan_book' => $keterangan,
                    'kategori_book' => $kategori,
                    'file_book' => $imp
                );
                //echo json_encode($data);
                $insert = $this->E_Lib_Model->tambah($data);
                if ($insert) {
                    $this->session->set_flashdata(
                        'sukses',
                        '<div class="alert alert-warning" role="alert">Harap isi Semua Data</div>'
                    );
                    redirect('Admin/E_Library/list_admin', 'refresh');
                } else {
                    $this->session->set_flashdata(
                        'sukses',
                        '<div class="alert alert-success" role="alert">Data berhasil ditambah</div>'
                    );
                    redirect('Admin/E_Library/list_admin', 'refresh');
                }*/
            }
        }
    }

    function edit()
    {
        $idbook = $this->uri->segment(4);

        $data = [
            'title' => 'Edit Surat Keluar',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'elib' => $this->E_Lib_Model->detail($idbook),
            'katelib' => $this->Gudang->show_all_kat_book(),
            'content' => 'admin/elibrary/edit'
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }

    function update()
    {
        $this->form_validation->set_rules('judulbook', 'Judul', 'trim|required');
        $this->form_validation->set_rules('keteranganbook', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'Tambah E-Library',
                'user' =>  $this->db->get_where('tb_user', ['username' =>
                $this->session->userdata('username')])->row_array(),
                'content' => 'admin/elibrary/tambahAdmin',
                'katelib' => $this->Gudang->show_all_kat_book()
            ];
            $this->session->set_flashdata(
                'sukses',
                '<div class="alert alert-warning" role="alert">Harap isi Semua Data</div>'
            );
            $this->load->view('admin/layout/wrapper', $data);
            //exit();
        } else {
            $idbook = htmlspecialchars($this->input->post('idelib'));
            $judul = htmlspecialchars($this->input->post('judulbook'));
            $keterangan = htmlspecialchars($this->input->post('keteranganbook'));
            $kategori = htmlspecialchars($this->input->post('kategori'));
            $filelama = htmlspecialchars($this->input->post('filebooklama'));

            if (empty($_FILES['filebook']['name'])) {
                $data = array(
                    'judul_book' => $judul,
                    'keterangan_book' => $keterangan,
                    'kategori_book' => $kategori,
                    'file_book' => $filelama
                );
                $where = ['id_book' => $idbook];
                $insert = $this->E_Lib_Model->update($data, $where);
                if ($insert) {
                    $this->session->set_flashdata(
                        'sukses',
                        '<div class="alert alert-warning" role="alert">Harap isi Semua Data</div>'
                    );
                    redirect('Admin/E_Library/list_admin', 'refresh');
                } else {
                    $this->session->set_flashdata(
                        'sukses',
                        '<div class="alert alert-success" role="alert">Data berhasil ditambah</div>'
                    );
                    redirect('Admin/E_Library/list_admin', 'refresh');
                }
            } else {
                $nama_file = "E-Lib__" . time();
                $config['upload_path']          = './assets/upload-pdf';
                $config['allowed_types']        = 'pdf';
                //$config['max_size']             = 100;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;
                $config['file_name']            = $nama_file;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('filebook')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata(
                        'error',
                        '<div class="alert alert-success" role="alert">' . $error . ' </div>'
                    );
                    redirect('Admin/E_Library/edit/', 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());

                    $data = array(
                        'judul_book' => $judul,
                        'keterangan_book' => $keterangan,
                        'kategori_book' => $kategori,
                        'file_book' => $nama_file
                    );
                    //echo json_encode($data);
                    $where = ['id_book' => $idbook];
                    $insert = $this->E_Lib_Model->update($data, $where);
                    unlink('assets/upload-pdf/' . $filelama . ".pdf");
                    if ($insert) {
                        $this->session->set_flashdata(
                            'sukses',
                            '<div class="alert alert-warning" role="alert">Harap isi Semua Data</div>'
                        );
                        redirect('Admin/E_Library/list_admin', 'refresh');
                    } else {
                        $this->session->set_flashdata(
                            'sukses',
                            '<div class="alert alert-success" role="alert">Data berhasil ditambah</div>'
                        );
                        redirect('Admin/E_Library/list_admin', 'refresh');
                    }
                }
            }
        }
    }

    function tes()
    {
        //$x = $this->Gudang->show_all_kat_book();
        //echo json_encode($x);
        echo date('YmdHis');
    }
}

/* End of file E_Library.php */
