<?php

defined('BASEPATH') or exit('No direct script access allowed');

class E_Library extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('Gudang');
        $this->load->model('E_Lib_Model');
    }
    public function index()
    {
        //konfigurasi pagination
        $config['base_url'] = base_url('Admin/E_Library/'); //site url
        $config['total_rows'] = $this->db->count_all('tbl_kat_book'); //total row
        $config['per_page'] = 1;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['data'] = $this->E_Lib_Model->get_book_list($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        $data = [
            'title' => 'E-Perpustakaan',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'content' => 'admin/elibrary/list',
            'kate' => $this->Gudang->show_all_kat_book(),
            'lib' => $this->E_Lib_Model->join(),
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
            'title' => 'E-Perpustakaan',
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
            'title' => 'E-Perpustakaan',
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
            $file = $_FILES['filebook']['name'];
            $arr = array();

            $data = [];

            $nama_file = "Lib__" . time();
            $config['upload_path']          = './assets/upload-pdf';
            $config['allowed_types']        = 'pdf';
            $config['file_name']            = $nama_file;

            $this->load->library('upload', $config);
            //Multi
            for ($i = 0; $i < count($file); $i++) {
                if (!empty($_FILES['filebook']['name'][$i])) {
                    $_FILES['file']['name'] = $_FILES['filebook']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['filebook']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['filebook']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['filebook']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['filebook']['size'][$i];

                    if ($this->upload->do_upload('file')) {
                        $uploadData = $this->upload->data();
                        $filename = $uploadData['file_name'];

                        $data[] = $filename . '/';
                    }
                }
            }
            //$filena = array('satu', 'dua', 'tiga');
            $x = implode('', $data);
            //echo json_encode($x);
            $datax = array(
                'judul_book' => $judul,
                'keterangan_book' => $keterangan,
                'kategori_book' => $kategori,
                'file_book' => $x
            );
            //echo json_encode($data);
            $insert = $this->E_Lib_Model->tambah($datax);
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
            $file = $_FILES['filebook']['name'];

            $data = [];

            $nama_file = "Lib__" . time();
            $config['upload_path']          = './assets/upload-pdf';
            $config['allowed_types']        = 'pdf';
            $config['file_name']            = $nama_file;

            $this->load->library('upload', $config);

            for ($i = 0; $i < count($file); $i++) {
                if (!empty($_FILES['filebook']['name'][$i])) {
                    $_FILES['file']['name'] = $_FILES['filebook']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['filebook']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['filebook']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['filebook']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['filebook']['size'][$i];

                    $namafile = 'Lib__' . time();
                    $config['upload_path'] = './assets/upload-pdf/';
                    $config['allowed_types'] = 'pdf';
                    $config['file_name'] = $namafile;

                    if ($this->upload->do_upload('file')) {
                        $uploadData = $this->upload->data();
                        $filename = $uploadData['file_name'];

                        $data[] = $filename;
                    }
                }
            }
            if ($filelama) {
                for ($i = 0; $i < count($filelama); $i++) {
                    //$data[] = $filelama[$i];
                    array_push($data, $filelama[$i]);
                }
            } else {
                echo "file Tidak Ada";
            }

            $x = implode('/', $data);
            //echo $x;
            $data = array(
                'judul_book' => $judul,
                'keterangan_book' => $keterangan,
                'kategori_book' => $kategori,
                'file_book' => $x
            );
            //echo json_encode($data);
            $where = ['id_book' => $idbook];
            $insert = $this->E_Lib_Model->update($data, $where);
            //for ($i = 0; $i < count($filelama); $i++) {
            //    unlink('assets/upload-pdf/' . $filelama[$i]);
            //}

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

    function hapus()
    {
        $namafile = $this->uri->segment(5);
        $idbook = $this->uri->segment(4);
        $edit = $this->E_Lib_Model->detail($idbook);
        $fe = file_exists('./assets/upload-pdf/' . $namafile);

        if ($fe == true) {
            unlink('assets/upload-pdf/' . $namafile);
            $namabaru = str_replace($namafile . '/', '', $edit->file_book);
            $data = array(
                'file_book' => $namabaru
            );
            //echo json_encode($data);
            $where = ['id_book' => $idbook];
            $insert = $this->E_Lib_Model->update($data, $where);
        } else {
            $namabaru = str_replace($namafile . '/', '', $edit->file_book);
            $data = array(
                'file_book' => $namabaru
            );
            //echo json_encode($data);
            $where = ['id_book' => $idbook];
            $insert = $this->E_Lib_Model->update($data, $where);
        }
        redirect('Admin/E_Library/edit/' . $idbook, 'refresh');
    }

    function tes()
    {
        //$x = $this->Gudang->show_all_kat_book();
        //echo json_encode($x);
        //echo date('YmdHis');
        $a = array();
        $b = array_push($a, 'satu');
        $c = array_push($a, 'dua');

        //echo json_encode($a);
        //echo implode('-', $a);
    }
}

/* End of file E_Library.php */
