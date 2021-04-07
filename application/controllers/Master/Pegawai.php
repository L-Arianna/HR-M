<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pegawai_model');
        $this->load->model('Gaji_model');
    }


    public function index()
    {
        $peg = $this->Pegawai_model->listing();
        $data = [
            'title' => 'Data pegawai',
            'peg' => $peg,
            'content' => 'master/pegawai/list'
        ];
        $this->load->view('master/layout/wrapper', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required|is_unique[dat_pegawai.nip]');
        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'trim|required|regex_match[/^([a-z ])+$/i]');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required|regex_match[/^([a-z ])+$/i]');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[dat_pegawai.email]|valid_email');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[tb_user.email]|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tb_user.username]');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tb_user.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');

        if ($this->form_validation->run() == FALSE) {

            $getnip =  $this->Pegawai_model->kode();
            $peg = $this->Pegawai_model->listing();
            $gaji = $this->Gaji_model->listing();
            $data = [
                'title' => 'Tambah Data Pegawai',
                'getnip' => $getnip,
                'peg' => $peg,
                'gaji' => $gaji,
                'content' => 'master/pegawai/tambah'
            ];
            $this->load->view('master/layout/wrapper', $data);
        } else {
            if (isset($_POST['submit'])) {
                $data1 = [
                    'nip' => $this->input->post('nip'),
                    'email' => $this->input->post('email'),
                    'username' => htmlspecialchars($this->input->post('username', true)),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'image' => 'default.jpg',
                    'role_id' => $this->input->post('role_id'),
                    'is_active' => 1,
                    'date_created' => time()

                ];
                $id = $this->Pegawai_model->tambah_user($data1);
                $data2 = array(
                    'id_gaji' =>  $this->input->post('id_gaji'),
                    'nip' => $this->input->post('nip'),
                    'nama_pegawai' => $this->input->post('nama_pegawai'),
                    'tempat_lahir' => $this->input->post('tempat_lahir'),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'alamat' => $this->input->post('alamat'),
                    'agama' => $this->input->post('agama'),
                    'status_nikah' => $this->input->post('status_nikah'),
                    'asal_negara' => $this->input->post('asal_negara'),
                    'no_telp' => $this->input->post('no_telp'),
                    'email' => $this->input->post('email'),
                    'username' => htmlspecialchars($this->input->post('username', true)),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'image' => 'default.jpg',
                    'role_id' => $this->input->post('role_id'),
                    'is_active' => 1,
                    'date_created' => time(),
                    'id_user' => $id
                );
                $this->Pegawai_model->tambah($data2);
                $this->session->set_flashdata(
                    'sukses',
                    '<div class="alert alert-success" role="alert">Berhasil menambahkan data pegawai </div>'
                );
                redirect('master/pegawai', 'refresh');
            }
        }
    }

    function simpan_nip()
    {
        $nip = $this->input->post('nip');
        $this->Pegawai_model->simpan_nip($nip);
        redirect('master/pegawai/tambah');
    }


    public function listgolongan()
    {
        $id_gaji = $this->input->post('id_gaji');
        $gaji = $this->Gaji_model->viewgaji($id_gaji);

        $lists = "<option value=''>Pilih</option>";

        foreach ($gaji as $data) {
            $lists .= "<option value='" . $data->id_gaji  . "'>" . $data->nama_golongan . "</option>";
        }

        $callback = array('list_golongan' => $lists);

        echo json_encode($callback);
    }

    public function listpendidikan()
    {
        $id_gaji = $this->input->post('id_gaji');
        $gaji = $this->Gaji_model->viewgaji($id_gaji);

        $lists = "<option value=''>Pilih</option>";

        foreach ($gaji as $data) {
            $lists .= "<option value='" . $data->id_gaji  . "'>" . $data->nama_pendidikan . "</option>";
        }

        $callback = array('list_pendidikan' => $lists);

        echo json_encode($callback);
    }

    public function listgapok()
    {
        $id_gaji = $this->input->post('id_gaji');
        $gaji = $this->Gaji_model->viewgaji($id_gaji);

        $lists = "<option value=''>Pilih</option>";

        foreach ($gaji as $data) {
            $lists .= "<option value='" . $data->id_kat_jabatan  . "'>" . number_format($data->gapok) . "</option>";
        }

        $callback = array('list_gapok' => $lists);

        echo json_encode($callback);
    }
}

/* End of file Pegawai.php */
