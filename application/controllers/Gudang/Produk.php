<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Gudang');
    }

    public function index()
    {
        $data = [
            'title' => 'Dropdown Produk',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'content' => 'admin/dropdown/produk'
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }

    public function ajax_list()
    {
        $list = $this->Gudang->get_datatables_produk();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $person->nama_dropdown_produk;
            $row[] = $person->kode_dropdown_produk;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit" onclick="produk_edit_ajax(' . "'" . $person->id_dropdown_produk . "'" . ')"><i class="bx bx-edit-alt"></i></a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_produk(' . "'" . $person->id_dropdown_produk . "'" . ')"><i class="bx bx-trash-alt"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Gudang->count_all_produk(),
            "recordsFiltered" => $this->Gudang->count_filtered_produk(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($iddropdownproduk)
    {
        $data = $this->Gudang->get_by_id_produk($iddropdownproduk);
        //$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $this->_validate();

        $nama = strip_tags(str_replace("'", "", $this->input->post('namadropdownproduk')));
        $kode = strip_tags(str_replace("'", "", $this->input->post('kodedropdownproduk')));
        $data = array(
            'nama_dropdown_produk' => $nama,
            'kode_dropdown_produk' => $kode
        );
        $insert = $this->Gudang->produk_save($data);
        if ($insert) {
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE));
        }
    }

    public function ajax_update()
    {
        $this->_validate();
        $id = strip_tags(str_replace("'", "", $this->input->post('iddropdownproduk')));
        $nama = strip_tags(str_replace("'", "", $this->input->post('namadropdownproduk')));
        $kode = strip_tags(str_replace("'", "", $this->input->post('kodedropdownproduk')));
        $data = array(
            'nama_dropdown_produk' => $nama,
            'kode_dropdown_produk' => $kode
        );
        $update = $this->Gudang->produk_update(array('id_dropdown_produk' => $id), $data);
        if ($update) {
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE));
        }
    }

    public function ajax_delete($iddropdownproduk)
    {
        $this->Gudang->produk_delete_by_id($iddropdownproduk);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('namadropdownproduk') == '') {
            $data['inputerror'][] = 'namadropdownproduk';
            $data['error_string'][] = 'Nama Produk is required';
            $data['status'] = FALSE;
        }

        if ($this->input->post('kodedropdownproduk') == '') {
            $data['inputerror'][] = 'kodedropdownproduk';
            $data['error_string'][] = 'Kode Produk is required';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    public function all()
    {
        echo json_encode($this->Gudang->show_all_produk());
    }

    //Pendidikan Terakhir Controller
    public function pendidikanterakhir()
    {
        $data = [
            'title' => 'Dropdown Pendidikan Terakhir',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'content' => 'admin/dropdown/pendidikanterakhir'
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }

    public function ajax_list_pendidikan()
    {
        $list = $this->Gudang->get_datatables_pendidikan();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $person->nama_dropdown_pendidikan;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit" onclick="pendidikan_edit_ajax(' . "'" . $person->id_dropdown_pendidikan . "'" . ')"><i class="bx bx-edit-alt"></i></a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_pendidikan(' . "'" . $person->id_dropdown_pendidikan . "'" . ')"><i class="bx bx-trash-alt"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Gudang->count_all_pendidikan(),
            "recordsFiltered" => $this->Gudang->count_filtered_pendidikan(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit_pendidikan($iddropdownpendidikan)
    {
        $data = $this->Gudang->get_by_id_pendidikan($iddropdownpendidikan);
        //$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }

    public function ajax_add_pendidikan()
    {
        $this->_validate_pendidikan();

        $nama = strip_tags(str_replace("'", "", $this->input->post('namadropdownpendidikan')));
        $data = array(
            'nama_dropdown_pendidikan' => $nama
        );
        $insert = $this->Gudang->pendidikan_save($data);
        if ($insert) {
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE));
        }
    }

    public function ajax_update_pendidikan()
    {
        $this->_validate_pendidikan();
        $idp = strip_tags(str_replace("'", "", $this->input->post('iddropdownpendidikan')));
        $nama = strip_tags(str_replace("'", "", $this->input->post('namadropdownpendidikan')));
        $data = array(
            'nama_dropdown_pendidikan' => $nama,
        );
        $update = $this->Gudang->pendidikan_update(array('id_dropdown_pendidikan' => $idp), $data);
        if ($update) {
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE));
        }
    }

    public function ajax_delete_pendidikan($iddropdownpendidikan)
    {
        $this->Gudang->pendidikan_delete_by_id($iddropdownpendidikan);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate_pendidikan()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('namadropdownpendidikan') == '') {
            $data['inputerror'][] = 'namadropdownpendidikan';
            $data['error_string'][] = 'Nama Pendidikan is required';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    public function all_pendidikan()
    {
        echo json_encode($this->Gudang->show_all_pendidikan());
    }

    //Pekerjaan Controller
    public function pekerjaan()
    {
        $data = [
            'title' => 'Dropdown Pekerjaan',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'content' => 'admin/dropdown/pekerjaan'
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }

    public function ajax_list_tipe_pendapatan()
    {
        $list = $this->Gudang->get_datatables_tipe_pekerjaan();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $person->nama_dropdown_pekerjaan;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit" onclick="tipe_pendapatan_edit_ajax(' . "'" . $person->id_dropdown_pekerjaan . "'" . ')"><i class="bx bx-edit-alt"></i></a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_tipe_pendapatan(' . "'" . $person->id_dropdown_pekerjaan . "'" . ')"><i class="bx bx-trash-alt"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Gudang->count_all_tipe_pekerjaan(),
            "recordsFiltered" => $this->Gudang->count_filtered_tipe_pekerjaan(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit_tipe_pendapatan($iddropdownpekerjaan)
    {
        $data = $this->Gudang->get_by_id_tipe_pekerjaan($iddropdownpekerjaan);
        //$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }

    public function ajax_add_tipe_pendapatan()
    {
        $this->_validate_tipe_pekerjaan();

        $nama = strip_tags(str_replace("'", "", $this->input->post('namadropdownpekerjaan')));
        $data = array(
            'nama_dropdown_pekerjaan' => $nama
        );
        $insert = $this->Gudang->tipe_pekerjaan_save($data);
        if ($insert) {
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE));
        }
    }

    public function ajax_update_tipe_pendapatan()
    {
        $this->_validate_tipe_pekerjaan();
        $idpe = strip_tags(str_replace("'", "", $this->input->post('iddropdownpekerjaan')));
        $nama = strip_tags(str_replace("'", "", $this->input->post('namadropdownpekerjaan')));
        $data = array(
            'nama_dropdown_pekerjaan' => $nama,
        );
        $update = $this->Gudang->tipe_pekerjaan_update(array('id_dropdown_pekerjaan' => $idpe), $data);
        if ($update) {
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE));
        }
    }

    public function ajax_delete_tipe_pendapatan($iddropdownpekerjaan)
    {
        $this->Gudang->tipe_pekerjaan_delete_by_id($iddropdownpekerjaan);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate_tipe_pekerjaan()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('namadropdownpekerjaan') == '') {
            $data['inputerror'][] = 'namadropdownpekerjaan';
            $data['error_string'][] = 'Nama Pendidikan is required';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    public function all_tipe_pekerjaan()
    {
        echo json_encode($this->Gudang->show_all_produk_tipe_pekerjaan());
    }

    //Controller Status Surat Masuk
    public function status_surat_masuk()
    {
        $data = [
            'title' => 'Dropdown Status Surat Masuk',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'content' => 'admin/dropdown/statussuratmasuk'
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }

    public function ajax_list_status_surat_masuk()
    {
        $list = $this->Gudang->get_datatables_status_surat_masuk();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $person->nama_dropdown_statussuratmasuk;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit" onclick="status_surat_masuk_edit_ajax(' . "'" . $person->id_dropdown_statussuratmasuk . "'" . ')"><i class="bx bx-edit-alt"></i></a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_status_surat_masuk(' . "'" . $person->id_dropdown_statussuratmasuk . "'" . ')"><i class="bx bx-trash-alt"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Gudang->count_all_status_surat_masuk(),
            "recordsFiltered" => $this->Gudang->count_filtered_status_surat_masuk(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit_status_surat_masuk($iddropdownstatussuratmasuk)
    {
        $data = $this->Gudang->get_by_id_status_surat_masuk($iddropdownstatussuratmasuk);
        //$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }

    public function ajax_add_status_surat_masuk()
    {
        $this->_validate_status_surat_masuk();

        $nama = strip_tags(str_replace("'", "", $this->input->post('namadropdownstatussuratmasuk')));
        $data = array(
            'nama_dropdown_statussuratmasuk' => $nama
        );
        $insert = $this->Gudang->status_surat_masuk_save($data);
        if ($insert) {
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE));
        }
    }

    public function ajax_update_status_surat_masuk()
    {
        $this->_validate_status_surat_masuk();
        $idssm = strip_tags(str_replace("'", "", $this->input->post('iddropdownstatussuratmasuk')));
        $nama = strip_tags(str_replace("'", "", $this->input->post('namadropdownstatussuratmasuk')));
        $data = array(
            'nama_dropdown_statussuratmasuk' => $nama,
        );
        $update = $this->Gudang->status_surat_masuk_update(array('id_dropdown_statussuratmasuk' => $idssm), $data);
        if ($update) {
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE));
        }
    }

    public function ajax_delete_status_surat_masuk($iddropdownstatussuratmasuk)
    {
        $this->Gudang->status_surat_masuk_delete_by_id($iddropdownstatussuratmasuk);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate_status_surat_masuk()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('namadropdownstatussuratmasuk') == '') {
            $data['inputerror'][] = 'namadropdownstatussuratmasuk';
            $data['error_string'][] = 'Nama Status Surat Masuk is required';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    public function all_status_surat_masuk()
    {
        echo json_encode($this->Gudang->show_all_status_surat_masuk());
    }

    //Controller Pengirim Surat

    public function bidang_usaha()
    {
        $data = [
            'title' => 'Dropdown Bidang Usaha',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'content' => 'admin/dropdown/bidangusaha'
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }

    public function ajax_list_bidang_usaha()
    {
        $list = $this->Gudang->get_datatables_bidang_usaha();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $person->nama_dropdown_bidangusaha;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit" onclick="bidang_usaha_edit_ajax(' . "'" . $person->id_dropdown_bidangusaha . "'" . ')"><i class="bx bx-edit-alt"></i></a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_bidang_usaha(' . "'" . $person->id_dropdown_bidangusaha . "'" . ')"><i class="bx bx-trash-alt"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Gudang->count_all_bidang_usaha(),
            "recordsFiltered" => $this->Gudang->count_filtered_bidang_usaha(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit_bidang_usaha($iddropdownbidangusaha)
    {
        $data = $this->Gudang->get_by_id_bidang_usaha($iddropdownbidangusaha);
        //$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }

    public function ajax_add_bidang_usaha()
    {
        $this->_validate_bidang_usaha();

        $nama = strip_tags(str_replace("'", "", $this->input->post('namadropdownbidangusaha')));
        $data = array(
            'nama_dropdown_bidangusaha' => $nama
        );
        $insert = $this->Gudang->bidang_usaha_save($data);
        if ($insert) {
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE));
        }
    }

    public function ajax_update_bidang_usaha()
    {
        $this->_validate_bidang_usaha();
        $idpe = strip_tags(str_replace("'", "", $this->input->post('iddropdownbidangusaha')));
        $nama = strip_tags(str_replace("'", "", $this->input->post('namadropdownbidangusaha')));
        $data = array(
            'nama_dropdown_bidangusaha' => $nama,
        );
        $update = $this->Gudang->bidang_usaha_update(array('id_dropdown_bidangusaha' => $idpe), $data);
        if ($update) {
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE));
        }
    }

    public function ajax_delete_bidang_usaha($iddropdownbidangusaha)
    {
        $this->Gudang->bidang_usaha_delete_by_id($iddropdownbidangusaha);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate_bidang_usaha()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('namadropdownbidangusaha') == '') {
            $data['inputerror'][] = 'namadropdownbidangusaha';
            $data['error_string'][] = 'Nama Bidamg Usaha is required';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    public function all_bidang_usaha()
    {
        echo json_encode($this->Gudang->show_all_bidang_usaha());
    }

    //Manage Kategori e-Library
    public function kat_lib()
    {
        $data = [
            'title' => 'Kategori E-Library',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'content' => 'admin/dropdown/katelib'
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }

    public function ajax_list_kat_lib()
    {
        $list = $this->Gudang->get_datatables_kat_lib();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $person->nama_kat_book;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit" onclick="kat_lib_edit_ajax(' . "'" . $person->id_kat_book . "'" . ')"><i class="bx bx-edit-alt"></i></a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_kat_lib(' . "'" . $person->id_kat_book . "'" . ')"><i class="bx bx-trash-alt"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Gudang->count_all_kat_lib(),
            "recordsFiltered" => $this->Gudang->count_filtered_kat_lib(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit_kat_lib($idkatbook)
    {
        $data = $this->Gudang->get_by_id_kat_lib($idkatbook);
        echo json_encode($data);
    }

    public function ajax_add_kat_lib()
    {
        $this->_validate_kat_lib();

        $nama = strip_tags(str_replace("'", "", $this->input->post('namakatbook')));
        $data = array(
            'nama_kat_book' => $nama
        );
        $insert = $this->Gudang->kat_lib_save($data);
        if ($insert) {
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE));
        }
    }

    public function ajax_update_kat_lib()
    {
        $this->_validate_kat_lib();
        $idpe = strip_tags(str_replace("'", "", $this->input->post('idkatbook')));
        $nama = strip_tags(str_replace("'", "", $this->input->post('namakatbook')));
        $data = array(
            'nama_kat_book' => $nama,
        );
        $update = $this->Gudang->kat_lib_update(array('id_kat_book' => $idpe), $data);
        if ($update) {
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE));
        }
    }

    public function ajax_delete_kat_lib($idkatbook)
    {
        $this->Gudang->kat_lib_delete_by_id($idkatbook);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate_kat_lib()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('namakatbook') == '') {
            $data['inputerror'][] = 'namakatbook';
            $data['error_string'][] = 'Nama Kategori Book is required';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    public function all_kat_book()
    {
        echo json_encode($this->Gudang->show_all_kat_book());
    }

    //Manage Kegiatan Khazanah
    public function keg_khazanah()
    {
        $data = [
            'title' => 'Kegiatan Khazanah',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'content' => 'admin/dropdown/kegkhazanah'
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }

    public function ajax_list_keg_khazanah()
    {
        $list = $this->Gudang->get_datatables_keg_khazanah();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $person->jenis_keg_khazanah;
            $row[] = $person->idbuku_keg_khazanah;
            $row[] = $person->nobuku_keg_khazanah;
            $row[] = $person->stok_keg_khazanah;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit" onclick="keg_khazanah_edit_ajax(' . "'" . $person->id_keg_khazanah . "'" . ')"><i class="bx bx-edit-alt"></i></a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_keg_khazanah(' . "'" . $person->id_keg_khazanah . "'" . ')"><i class="bx bx-trash-alt"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Gudang->count_all_keg_khazanah(),
            "recordsFiltered" => $this->Gudang->count_filtered_keg_khazanah(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit_keg_khazanah($idkegkhazanah)
    {
        $data = $this->Gudang->get_by_id_keg_khazanah($idkegkhazanah);
        echo json_encode($data);
    }

    public function ajax_add_keg_khazanah()
    {
        $this->_validate_keg_khazanah();

        $jenis = strip_tags(str_replace("'", "", $this->input->post('jeniskegkhazanah')));
        $idbuku = strip_tags(str_replace("'", "", $this->input->post('idbukukegkhazanah')));
        $nobuku = strip_tags(str_replace("'", "", $this->input->post('nobukukegkhazanah')));
        $stok = strip_tags(str_replace("'", "", $this->input->post('stokkegkhazanah')));
        $data = array(
            'jenis_keg_khazanah' => $jenis,
            'idbuku_keg_khazanah' => $idbuku,
            'nobuku_keg_khazanah' => $nobuku,
            'stok_keg_khazanah' => $stok
        );
        $insert = $this->Gudang->keg_khazanah_save($data);
        if ($insert) {
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE));
        }
    }

    public function ajax_update_keg_khazanah()
    {
        $this->_validate_keg_khazanah();
        $idkek = strip_tags(str_replace("'", "", $this->input->post('idkegkhazanah')));
        $jenis = strip_tags(str_replace("'", "", $this->input->post('jeniskegkhazanah')));
        $idbuku = strip_tags(str_replace("'", "", $this->input->post('idbukukegkhazanah')));
        $nobuku = strip_tags(str_replace("'", "", $this->input->post('nobukukegkhazanah')));
        $stok = strip_tags(str_replace("'", "", $this->input->post('stokkegkhazanah')));
        $data = array(
            'jenis_keg_khazanah' => $jenis,
            'idbuku_keg_khazanah' => $idbuku,
            'nobuku_keg_khazanah' => $nobuku,
            'stok_keg_khazanah' => $stok
        );
        $update = $this->Gudang->keg_khazanah_update(array('id_keg_khazanah' => $idkek), $data);
        if ($update) {
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE));
        }
    }

    public function ajax_delete_keg_khazanah($idkegkhazanah)
    {
        $this->Gudang->keg_khazanah_delete_by_id($idkegkhazanah);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate_keg_khazanah()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('jeniskegkhazanah') == '') {
            $data['inputerror'][] = 'jeniskegkhazanah';
            $data['error_string'][] = 'Jenis Khazanah is required';
            $data['status'] = FALSE;
        }

        if ($this->input->post('idbukukegkhazanah') == '') {
            $data['inputerror'][] = 'idbukukegkhazanah';
            $data['error_string'][] = 'Id Buku is required';
            $data['status'] = FALSE;
        }

        if ($this->input->post('nobukukegkhazanah') == '') {
            $data['inputerror'][] = 'nobukukegkhazanah';
            $data['error_string'][] = 'No Buku is required';
            $data['status'] = FALSE;
        }

        if ($this->input->post('stokkegkhazanah') == '') {
            $data['inputerror'][] = 'stokkegkhazanah';
            $data['error_string'][] = 'Stok is required';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    public function all_keg_khazanah()
    {
        echo json_encode($this->Gudang->show_all_keg_khazanah());
    }
}

/* End of file Produk.php */
