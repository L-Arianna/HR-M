<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pegawai_model');
        $this->load->model('Gaji_model');
        $this->load->model('Kat_jabatan');
        $this->load->model('Kat_golongan');
        $this->load->model('Kat_pend');
        $this->load->model('Grade_model');
    }


    public function index()
    {
        $peg = $this->Pegawai_model->listing();


        $data = [
            'title' => 'Data pegawai',
            'peg' => $peg,
            'user' =>  $this->db->get_where('tb_user', ['username' =>
            $this->session->userdata('username')])->row_array(),

            'content' => 'admin/pegawai/list'
        ];
        $this->load->view('admin/layout/wrapper', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required|is_unique[dat_pegawai.nip]');
        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'trim|required|regex_match[/^([a-z ])+$/i]');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat lahir', 'trim|required|regex_match[/^([a-z ])+$/i]');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal lahir', 'trim|required');

        $this->form_validation->set_rules('nomor_ktp', 'Nomor KTP', 'numeric');
        $this->form_validation->set_rules('npwp', 'Nomor NPWP', 'trim');

        $this->form_validation->set_rules('alamat', 'Alamat tinggal', 'trim|required');
        $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'trim|required');
        $this->form_validation->set_rules('rt', 'RT', 'trim|required|numeric');
        $this->form_validation->set_rules('rw', 'RW', 'trim|required|numeric');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
        $this->form_validation->set_rules('desa', 'Dusun', 'trim|required');
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'trim|required');

        $this->form_validation->set_rules('nama_bank', 'Nama bank', 'trim');
        $this->form_validation->set_rules('no_rek', 'Nomor rekening', 'trim|numeric');
        $this->form_validation->set_rules('atas_nama', 'Atas nama rekening', 'trim');

        $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
        $this->form_validation->set_rules('agama', 'Agama', 'trim|required');
        $this->form_validation->set_rules('asal_negara', 'Asal Negara', 'trim|required');
        $this->form_validation->set_rules('status_nikah', 'Status Nikah', 'trim|required');

        $this->form_validation->set_rules('id_kat_jabatan', 'Nama Jabatan', 'trim|required');
        $this->form_validation->set_rules('id_grade', 'Grade Jabatan', 'trim|required');
        $this->form_validation->set_rules('id_kat_golongan', 'Golongan Pegawai', 'trim|required');
        $this->form_validation->set_rules('id_pendidikan', 'Nama Pendidikan', 'trim|required');

        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[dat_pegawai.email]|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[dat_pegawai.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('role_id', 'Hak Akses', 'trim|required');

        if ($this->form_validation->run() == FALSE) {

            $getnip = $this->Pegawai_model->kode();
            $jab = $this->Kat_jabatan->listing();
            $grade = $this->Grade_model->listing();
            $pend = $this->Kat_pend->listing();
            $data = [
                'title' => 'Tambah Data Pegawai',
                'getnip' => $getnip,
                'jab' => $jab,
                'pend' => $pend,
                'grade' => $grade,
                'user' =>  $this->db->get_where('tb_user', ['username' =>
                $this->session->userdata('username')])->row_array(),

                'content' => 'admin/pegawai/tambah'
            ];
            $this->load->view('admin/layout/wrapper', $data);
        } else {
            if (isset($_POST['submit'])) {

                // add to table gaji
                $data2 = [
                    'nip' => $this->input->post('nip'),
                    'id_kat_jabatan' => $this->input->post('id_kat_jabatan'),
                    'id_grade' => $this->input->post('id_grade'),
                    'id_kat_golongan' => $this->input->post('id_kat_golongan'),
                    'id_pendidikan' => $this->input->post('id_pendidikan'),
                    'status' => 'belum di bayar'

                ];
                $id = $this->Pegawai_model->tambah_gaji($data2);

                // add to table pegawai
                $data3 = array(
                    'nip' => $this->input->post('nip'),
                    'nama_pegawai' => $this->input->post('nama_pegawai'),
                    'tempat_lahir' => $this->input->post('tempat_lahir'),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                    'nomor_ktp' => $this->input->post('nomor_ktp'),
                    'npwp' => $this->input->post('npwp'),

                    'alamat' => $this->input->post('alamat'),
                    'kelurahan' => $this->input->post('kelurahan'),
                    'rt' => $this->input->post('rt'),
                    'rw' => $this->input->post('rw'),
                    'kecamatan' => $this->input->post('kecamatan'),
                    'desa' => $this->input->post('desa'),
                    'no_telp' => $this->input->post('no_telp'),

                    'nama_bank' => $this->input->post('nama_bank'),
                    'no_rek' => $this->input->post('no_rek'),
                    'atas_nama' => $this->input->post('atas_nama'),

                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'agama' => $this->input->post('agama'),
                    'status_nikah' => $this->input->post('status_nikah'),
                    'asal_negara' => $this->input->post('asal_negara'),

                    'id_kat_jabatan' => $this->input->post('id_kat_jabatan'),
                    'id_grade' => $this->input->post('id_grade'),
                    'id_kat_golongan' => $this->input->post('id_kat_golongan'),
                    'id_pendidikan' => $this->input->post('id_pendidikan'),

                    'email' => $this->input->post('email'),
                    'username' => htmlspecialchars($this->input->post('username'), true),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'role_id' => $this->input->post('role_id'),
                    'image' => 'default.jpg',
                    'is_active' => 1,
                    'date_created' => time()
                );
                $this->Pegawai_model->tambah($data3);
                $this->session->set_flashdata(
                    'sukses',
                    '<div class="alert alert-success" role="alert">Berhasil menambahkan data pegawai </div>'
                );
                redirect('Admin/Pegawai', 'refresh');
            }
        }
    }
    public function edit($nip)
    {

        $pegawai = $this->Pegawai_model->detail($nip);
        $jab = $this->Kat_jabatan->listing();
        $grade = $this->Grade_model->listing();
        $pend = $this->Kat_pend->listing();


        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'trim|required');

        if ($this->form_validation->run() == FALSE) {

            $data = [
                'pegawai' => $pegawai,
                'title' => 'Edit data ',
                'jab' => $jab,
                'pend' => $pend,
                'grade' => $grade,
                'user' =>  $this->db->get_where('tb_user', ['username' =>
                $this->session->userdata('username')])->row_array(),
                'content' => 'admin/pegawai/edit'
            ];
            $this->load->view('admin/layout/wrapper', $data);
        } else {
            if (isset($_POST['submit'])) {

                $data = [
                    'nip' => $nip,
                    'nip' => $this->input->post('nip'),
                    'id_kat_jabatan' => $this->input->post('id_kat_jabatan'),
                    'id_grade' => $this->input->post('id_grade'),
                    'id_kat_golongan' => $this->input->post('id_kat_golongan'),
                    'id_pendidikan' => $this->input->post('id_pendidikan'),
                ];
                $id = $this->Pegawai_model->edit_gaji($data);


                $data = [
                    'nip' => $nip,
                    'nama_pegawai' => $this->input->post('nama_pegawai'),
                    'tempat_lahir' => $this->input->post('tempat_lahir'),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                    'nomor_ktp' => $this->input->post('nomor_ktp'),
                    'npwp' => $this->input->post('npwp'),
                    'alamat' => $this->input->post('alamat'),
                    'kelurahan' => $this->input->post('kelurahan'),
                    'rt' => $this->input->post('rt'),
                    'rw' => $this->input->post('rw'),
                    'kecamatan' => $this->input->post('kecamatan'),
                    'desa' => $this->input->post('desa'),
                    'no_telp' => $this->input->post('no_telp'),
                    'nama_bank' => $this->input->post('nama_bank'),
                    'no_rek' => $this->input->post('no_rek'),
                    'atas_nama' => $this->input->post('atas_nama'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'agama' => $this->input->post('agama'),
                    'status_nikah' => $this->input->post('status_nikah'),
                    'asal_negara' => $this->input->post('asal_negara'),
                    'id_kat_jabatan' => $this->input->post('id_kat_jabatan'),
                    'id_grade' => $this->input->post('id_grade'),
                    'id_kat_golongan' => $this->input->post('id_kat_golongan'),
                    'id_pendidikan' => $this->input->post('id_pendidikan'),
                    'email' => $this->input->post('email'),
                    'username' => htmlspecialchars($this->input->post('username'), true),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'role_id' => $this->input->post('role_id')
                ];


                $this->Pegawai_model->edit($data);
                $this->session->set_flashdata(
                    'sukses',
                    '<div class="alert alert-success" role="alert">Berhasil update data pegawai </div>'
                );
                redirect('Admin/Pegawai');
                // var_dump($data);
            }
        }
    }
    public function resign($nip)
    {
        $pegawai = $this->Pegawai_model->detail($nip);
        $this->form_validation->set_rules('keterangan', 'Keterangan resign pegawai', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'Tambah pegawai resign',
                'pegawai' => $pegawai,
                'user' =>  $this->db->get_where('tb_user', ['username' =>
                $this->session->userdata('username')])->row_array(),

                'content' => 'admin/pegawai/resign'
            ];
            $this->load->view('admin/layout/wrapper', $data);
        } else {
            if (isset($_POST['submit'])) {

                $data1 = [
                    'nip' => $this->input->post('nip'),
                    'tgl_resign' => $this->input->post('tgl_resign'),
                    'keterangan' => $this->input->post('keterangan'),
                ];
                $id = $this->Pegawai_model->tambah_resign($data1);
                $data = [
                    'nip' => $nip,
                    'id_resign' => $id,
                    'is_active' => $this->input->post('is_active')
                ];
                $this->Pegawai_model->edit($data);
                $this->session->set_flashdata(
                    'sukses',
                    '<div class="alert alert-success" role="alert">Berhasil menambahkan data resign pegawai </div>'
                );
                redirect('Admin/Pegawai');
                // var_dump($data);
            }
        }
    }

    public function hapus($nip)
    {
        $data2 = [
            'nip' => $nip
        ];
        $id = $this->Pegawai_model->hapus_gaji($data2);
        $data = [
            'nip' => $nip
        ];
        $this->Pegawai_model->hapus($data);
        $this->session->set_flashdata(
            'sukses',
            '<div class="alert alert-danger" role="alert">Berhasil hapus data pegawai </div>'
        );
        redirect('Admin/Pegawai', 'refresh');
    }


    function simpan_nip()
    {
        $nip = $this->input->post('nip');
        $this->Pegawai_model->simpan_nip($nip);
        redirect('Admin/Pegawai/tambah');
    }

    public function listgrade()
    {
        $id_grade = $this->input->post('id_grade');
        $grade = $this->Kat_golongan->viewByGolongan($id_grade);

        $lists = "<option value=''>Pilih</option>";

        foreach ($grade as $data) {
            $lists .= "<option value='" . $data->id_kat_golongan  . "'>" . $data->nama_golongan . "</option>";
            //$lists = "'" . $data->id_kat_golongan  . "'/" . $data->nama_golongan . "";
        }

        $callback = array('list_grade' => $lists);

        echo json_encode($callback);
    }
}

/* End of file Pegawai.php */
