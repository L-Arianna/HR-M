<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Khazanah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Gudang');
        $this->load->model('Khazanah_Model');
    }

    function multian()
    {
        $id = 2;
        $array = array();
        $query = $this->Khazanah_Model->multi($id);
        foreach ($query as $value) {
            $idp = $value->id_kat_jabatan;
            if ($value->id_kat_jabatan == 2) {
                $value->id_kat_jabatan = $this->Khazanah_Model->multi2($idp);
            } else {
                $value->id_kat_jabatan = array('2', '5', '9');
            }
        }
        foreach ($query as $key => $value) {
            foreach ($value->id_kat_jabatan as $key2 => $val) {
                //echo $val->id_gaji;
                if ($val->id_pendidikan == 4) {
                    $val->id_pendidikan = "empat";
                } else {
                    $val->id_pendidikan = "four";
                }
            }
        }
        echo json_encode($query);
        /*$cars = array(
            array("Volvo", 22, 18),
            array("BMW", array(15, 12), 13),
            array("Saab", 5, 2),
            array("Land Rover", 17, 15)
        );*/

        //echo json_encode($cars);
    }
    function tes()
    {
        $start = date_create();
        $b = date_format($start, 'Y-m-d H:i:s');
        //echo json_encode($this->Khazanah_Model->count_status_kemarin());
        $X = $this->Khazanah_Model->count_status_kemarin();
        foreach ($X as $value) {
            if ($value->tgl < $b) {
                $a[] = $value->tgl;
            }
        }
        echo count($a);
    }

    public function index()
    {
        $data = [
            'title' => 'Khazanah',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'content' => 'admin/khazanah/list',
            'khazanah' => $this->Khazanah_Model->listing(),
            'statusnol' => $this->Khazanah_Model->count_status_nol(),
            'statussatu' => $this->Khazanah_Model->count_status_satu(),
            'statusdua' => $this->Khazanah_Model->count_status_dua(),
            'listingjam' => $this->Khazanah_Model->listingjam(),
            'kemarin' => $this->Khazanah_Model->count_status_kemarin()
        ];
        $this->load->view('layout/wrapper', $data);
    }

    function add()
    {
        $where = '3';
        $this->form_validation->set_rules('kegiatan', 'Kegiatan', 'trim|required');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'trim|required');
        $this->form_validation->set_rules('filelokasi', 'Filelokasi', 'trim|required');
        $this->form_validation->set_rules('petugas', 'Petugas', 'trim|required');
        $this->form_validation->set_rules('pengawas', 'Pengawas', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'Tambah',
                'user' =>  $this->db->get_where('tb_user', ['username' =>
                $this->session->userdata('username')])->row_array(),
                'content' => 'admin/khazanah/tambah',
                'kegiatan' => $this->Gudang->show_all_keg_khazanah(),
                'pengawas' => $this->Khazanah_Model->joinpegawai($where)
            ];
            $this->load->view('layout/wrapper', $data);
        } else {
            $kegiatan = htmlspecialchars($this->input->post('kegiatan'));
            $tujuan = htmlspecialchars($this->input->post('tujuan'));
            $filelokasi = htmlspecialchars($this->input->post('filelokasi'));
            $petugas = htmlspecialchars($this->input->post('petugas'));
            $pengawas = htmlspecialchars($this->input->post('pengawas'));
            $keterangan = htmlspecialchars($this->input->post('keterangan'));

            $data = array(
                'kegiatan_khazanah' => $kegiatan,
                'tujuan_khazanah' => $tujuan,
                'filelokasi_khazanah' => $filelokasi,
                'petugas_khazanah' => $petugas,
                'pengawas_khazanah' => $pengawas,
                'keterangan_khazanah' => $keterangan
            );
            //echo json_encode($data);

            $x = $this->Khazanah_Model->tambah($data);
            $isi = 'Berhasil Simpan Data';
            $this->flashdatas($isi);
            redirect('Admin/Khazanah', 'refresh');
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


    function otorisasi()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $username = $this->session->userdata('username'); //berdasarkan session bisa di ganti dengan yang lain
        $tuju = htmlspecialchars($this->input->post('tujuan'));
        $pass = htmlspecialchars($this->input->post('password'));
        $user = $this->db->get_where('tb_user', ['username' => $username])->row_array();
        if (password_verify($pass, $user['password'])) {
            //$this->acc($id);
            if ($tuju == 0) {
                $this->acc($id);
            } else {
                $this->selesai($id);
            }
        } else {
            $isi = 'Kata Sandi Anda Salah!';
            $this->flashdatas($isi);
            redirect('Admin/Khazanah', 'refresh');
        }
    }

    function acc($id)
    {
        //$idkhazanah = $this->uri->segment(4);
        $start = date_create();
        $b = date_format($start, 'Y-m-d H:i:s');

        $data = array(
            'masuk_khazanah' => $b,
            'status_khazanah' => 1
        );

        $where = ['id_khazanah' => $id];
        //echo json_encode($data);
        $x = $this->Khazanah_Model->update($data, $where);
        $isi = 'Sudah ACC!';
        $this->flashdatas($isi);
        redirect('Admin/Khazanah', 'refresh');
    }

    function selesai($id)
    {
        //$idkhazanah = $this->uri->segment(4);
        $start = date_create();
        $b = date_format($start, 'Y-m-d H:i:s');

        $data = array(
            'keluar_khazanah' => $b,
            'status_khazanah' => 2
        );

        $where = ['id_khazanah' => $id];
        //echo json_encode($data);
        $x = $this->Khazanah_Model->update($data, $where);
        $isi = 'Sudah Selesai!';
        $this->flashdatas($isi);
        redirect('Admin/Khazanah', 'refresh');
    }

    function edit()
    {
        $where = '3';
        $idkhazanah = $this->uri->segment(4);
        $data = [
            'title' => 'Khazanah',
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),
            'content' => 'admin/khazanah/edit',
            'kegiatan' => $this->Gudang->show_all_keg_khazanah(),
            'khazanah' => $this->Khazanah_Model->detail($idkhazanah),
            'pengawas' => $this->Khazanah_Model->joinpegawai($where)
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }

    function update()
    {
        $idkhazanah = $this->input->post('idkhazanah');
        $this->form_validation->set_rules('kegiatan', 'Kegiatan', 'trim|required');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'trim|required');
        $this->form_validation->set_rules('filelokasi', 'Filelokasi', 'trim|required');
        $this->form_validation->set_rules('petugas', 'Petugas', 'trim|required');
        $this->form_validation->set_rules('pengawas', 'Pengawas', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'Khazanah',
                'user' =>  $this->db->get_where('tb_user', ['username' =>
                $this->session->userdata('username')])->row_array(),
                'content' => 'admin/khazanah/edit',
                'kegiatan' => $this->Gudang->show_all_keg_khazanah(),
                'khazanah' => $this->Khazanah_Model->detail($idkhazanah)
            ];
            $this->load->view('layout/wrapper', $data);
        } else {
            $kegiatan = htmlspecialchars($this->input->post('kegiatan'));
            $tujuan = htmlspecialchars($this->input->post('tujuan'));
            $filelokasi = htmlspecialchars($this->input->post('filelokasi'));
            $petugas = htmlspecialchars($this->input->post('petugas'));
            $pengawas = htmlspecialchars($this->input->post('pengawas'));
            $keterangan = htmlspecialchars($this->input->post('keterangan'));

            $data = array(
                'kegiatan_khazanah' => $kegiatan,
                'tujuan_khazanah' => $tujuan,
                'filelokasi_khazanah' => $filelokasi,
                'petugas_khazanah' => $petugas,
                'pengawas_khazanah' => $pengawas,
                'keterangan_khazanah' => $keterangan
            );

            //echo json_encode($data);

            $where = ['id_khazanah' => $idkhazanah];
            $x = $this->Khazanah_Model->update($data, $where);
            $isi = 'Berhasil Update Data!';
            $this->flashdatas($isi);
            redirect('Admin/Khazanah', 'refresh');
        }
    }
    function multidelete2()
    {
        $ch = $this->input->post('idkhazanah');
        //echo json_encode($ch);
        if (empty($ch)) {
            $isi = 'Data Kosong';
            $this->flashdatas($isi);
            redirect('Admin/Khazanah', 'refresh');
        } else {
            for ($i = 0; $i < count($ch); $i++) {
                //$y = $this->Khazanah_Model->detail($ch[$i]);
                //$id =  $y->id_surat_keluar;
                $data = [
                    'id_khazanah' => $ch[$i]
                ];
                //echo json_encode($data);
                $del = $this->Khazanah_Model->delete($data);
            }
            $isi = 'Berhasil Hapus Data';
            $this->flashdatas($isi);
            redirect('Admin/Khazanah', 'refresh');
        }
    }
}

/* End of file Khazanah.php */
