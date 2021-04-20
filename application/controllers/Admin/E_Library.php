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
            'content' => 'admin/elibrary/list',
            'kate' => $this->Gudang->show_all_kat_book(),
            'lib' => $this->E_Lib_Model->join()
        ];
        $this->session->set_flashdata(
            'sukses',
            ''
        );
        $this->load->view('admin/layout/wrapper', $data);
    }

    function download()
    {
        $this->load->helper('download');
        $nama_file = $this->uri->segment(4);
        $path = 'assets/upload-pdf/' . $nama_file;
        $x = force_download($path, Null);
        if (!$x) {
            $data = [
                'title' => 'E-Library',
                'user' =>  $this->db->get_where('tb_user', ['username' =>
                $this->session->userdata('username')])->row_array(),
                'content' => 'admin/elibrary/list',
                'kate' => $this->Gudang->show_all_kat_book(),
                'lib' => $this->E_Lib_Model->join()
            ];
            $this->session->set_flashdata(
                'sukses',
                '<div class="alert alert-warning" role="alert">Data error Harap Upload Ulang</div>'
            );
            $this->load->view('admin/layout/wrapper', $data);
        }
    }

    function tes2()
    {
        echo json_encode($this->E_Lib_Model->join());
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

        /*if ($this->form_validation->run() == FALSE) {
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
        } else {*/
        $judul = htmlspecialchars($this->input->post('judulbook'));
        $keterangan = htmlspecialchars($this->input->post('keteranganbook'));
        $kategori = htmlspecialchars($this->input->post('kategori'));
        $file = $_FILES['filebook']['name'];
        $arr = array();

        //echo count($file);

        $nama_file = "Lib__" . time();
        $config['upload_path']          = './assets/upload-pdf';
        $config['allowed_types']        = 'pdf';
        $config['file_name']            = $nama_file;

        $this->load->library('upload', $config);
        //Multi
        for ($i = 0; $i < count($file); $i++) {
            if (!empty($_FILES['filebook']['size']['$i'])) {
                if (!$this->upload->do_upload('filebook')) {
                    $error = $this->upload->display_errors();
                    echo $error;
                } else {
                    $pdf2 = $this->upload->data('file_name');
                    echo $nama = $pdf2 . "/";
                }
            } else {
                echo "kosong";
            }
        }

        //$nama = $pdf[$i] . '/' . $pdf[$i];
        //echo $nama;

        /*if (!$this->upload->do_upload('filebook1')) {
                    $error = array('error' => $this->upload->display_errors());
                    redirect('Admin/E_Library/tambah_admin/', 'refresh');
                }
                $pdf1 = $this->upload->data('file_name');
                if (!$this->upload->do_upload('filebook2')) {
                    $error = array('error' => $this->upload->display_errors());
                    redirect('Admin/E_Library/tambah_admin/', 'refresh');
                }
                $pdf2 = $this->upload->data('file_name');
                if (!$this->upload->do_upload('filebook3')) {
                    $error = array('error' => $this->upload->display_errors());
                    redirect('Admin/E_Library/tambah_admin/', 'refresh');
                }
                $pdf3 = $this->upload->data('file_name');
                $imp = $pdf1 . "/" . $pdf2 . "/" . $pdf3;
                */
        //$data = array('upload_data' => $this->upload->data());
        //echo json_encode($imp);

        /*$data = array(
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
            }
        }*/
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
            $filelama = $this->input->post('filelama');

            if (empty($_FILES['filebook1']['name'])) {
                $data = array(
                    'judul_book' => $judul,
                    'keterangan_book' => $keterangan,
                    'kategori_book' => $kategori
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
                $nama_file = "Lib__" . time();
                $config['upload_path']          = './assets/upload-pdf';
                $config['allowed_types']        = 'pdf';
                //$config['max_size']             = 100;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;
                $config['file_name']            = $nama_file;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('filebook1')) {
                    $error = array('error' => $this->upload->display_errors());
                    redirect('Admin/E_Library/tambah_admin/', 'refresh');
                }
                $pdf1 = $this->upload->data('file_name');
                if (!$this->upload->do_upload('filebook2')) {
                    $error = array('error' => $this->upload->display_errors());
                    redirect('Admin/E_Library/tambah_admin/', 'refresh');
                }
                $pdf2 = $this->upload->data('file_name');
                if (!$this->upload->do_upload('filebook3')) {
                    $error = array('error' => $this->upload->display_errors());
                    redirect('Admin/E_Library/tambah_admin/', 'refresh');
                }
                $pdf3 = $this->upload->data('file_name');

                $data = array('upload_data' => $this->upload->data());
                $imp = $pdf1 . "/" . $pdf2 . "/" . $pdf3;

                $data = array(
                    'judul_book' => $judul,
                    'keterangan_book' => $keterangan,
                    'kategori_book' => $kategori,
                    'file_book' => $imp
                );
                //echo json_encode($data);
                $where = ['id_book' => $idbook];
                $insert = $this->E_Lib_Model->update($data, $where);
                for ($i = 0; $i < count($filelama); $i++) {
                    unlink('assets/upload-pdf/' . $filelama[$i]);
                }

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
    function multidelete()
    {
        $md = $this->input->post('idlib');
        //echo json_encode($ch);
        if (empty($md)) {
            $this->session->set_flashdata(
                'sukses',
                '<div class="alert alert-danger" role="alert">Data Kosong</div>'
            );
            redirect('Admin/E_Library/list_admin', 'refresh');
        } else {
            for ($i = 0; $i < count($md); $i++) {
                $y = $this->E_Lib_Model->detail($md[$i]);
                //$filelama =  $y->file_surat_keluar . ".pdf";
                $idb =  $y->id_book;
                $fn = $y->file_book;
                if ($fn == '' or $fn == null) {
                    $data = [
                        'id_book' => $idb
                    ];
                    $x = $this->E_Lib_Model->delete($data);
                    //echo $x;
                } else {
                    $exp = explode("/", $fn);
                    for ($i = 0; $i < count($exp); $i++) {
                        unlink('assets/upload-pdf/' . $exp[$i]);
                    }

                    $data = [
                        'id_book' => $idb
                    ];
                    $x = $this->E_Lib_Model->delete($data);
                    //echo $x;
                }
            }
            $this->session->set_flashdata(
                'sukses',
                '<div class="alert alert-success" role="alert">Berhasil hapus Surat Keluar </div>'
            );
            redirect('Admin/E_Library/list_admin', 'refresh');
            //unlink('assets/upload-pdf/' . $filelama);
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
