<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gudang extends CI_Model
{
    var $table = 'tbl_dropdown_produk';
    var $column_order = array('nama_dropdown_produk', 'kode_dropdown_produk', null); //set column field database for datatable orderable
    var $column_search = array('nama_dropdown_produk', 'kode_dropdown_produk'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('id_dropdown_produk' => 'desc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function jointable()
    {
        $this->db->from($this->table);
        //$this->db->join('merk', 'merk.id_merk = produk.merk_produk');
        //$this->db->join('detailproduk', 'detailproduk.produk_detailproduk = produk.id_produk');
    }

    private function _get_datatables_query()
    {

        //$this->db->from($this->table);
        $this->jointable();

        $i = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables_produk()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_produk()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_produk()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_by_id_produk($iddropdownproduk)
    {
        //$this->db->from($this->table);
        $this->jointable();

        $this->db->where('id_dropdown_produk', $iddropdownproduk);
        $query = $this->db->get();

        return $query->row();
    }

    public function produk_save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function produk_update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function produk_delete_by_id($iddropdownproduk)
    {
        $this->db->where('id_dropdown_produk', $iddropdownproduk);
        $this->db->delete($this->table);
    }

    public function show_all_produk()
    {
        return $this->db->from($this->jointable())->get()->result();
    }

    //Model Pendidikan
    var $table_pendidikan = 'tbl_dropdown_pendidikan';
    var $column_order_pendidikan = array('nama_dropdown_pendidikan', null); //set column field database for datatable orderable
    var $column_search_pendidikan = array('nama_dropdown_pendidikan'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order_pendidikan = array('id_dropdown_pendidikan' => 'desc'); // default order 

    function jointablependidikan()
    {
        $this->db->from($this->table_pendidikan);
    }

    private function _get_datatables_query_pendidikan()
    {

        //$this->db->from($this->table);
        $this->jointablependidikan();

        $i = 0;

        foreach ($this->column_search_pendidikan as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search_pendidikan) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_pendidikan[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_pendidikan)) {
            $order = $this->order_pendidikan;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables_pendidikan()
    {
        $this->_get_datatables_query_pendidikan();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_pendidikan()
    {
        $this->_get_datatables_query_pendidikan();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_pendidikan()
    {
        $this->db->from($this->table_pendidikan);
        return $this->db->count_all_results();
    }

    public function get_by_id_pendidikan($iddropdownpendidikan)
    {
        //$this->db->from($this->table);
        $this->jointablependidikan();

        $this->db->where('id_dropdown_pendidikan', $iddropdownpendidikan);
        $query = $this->db->get();

        return $query->row();
    }

    public function pendidikan_save($data)
    {
        $this->db->insert($this->table_pendidikan, $data);
        return $this->db->insert_id();
    }

    public function pendidikan_update($where, $data)
    {
        $this->db->update($this->table_pendidikan, $data, $where);
        return $this->db->affected_rows();
    }

    public function pendidikan_delete_by_id($iddropdownpendidikan)
    {
        $this->db->where('id_dropdown_pendidikan', $iddropdownpendidikan);
        $this->db->delete($this->table_pendidikan);
    }

    public function show_all_pendidikan()
    {
        return $this->db->from($this->jointablependidikan())->get()->result();
    }

    //Model Tipe Pekerjaan
    var $table_tipe_pekerjaan = 'tbl_dropdown_pekerjaan';
    var $column_order_tipe_pekerjaan = array('nama_dropdown_pekerjaan', null); //set column field database for datatable orderable
    var $column_search_tipe_pekerjaan = array('nama_dropdown_pekerjaan'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order_tipe_pekerjaan = array('id_dropdown_pekerjaan' => 'desc'); // default order 

    function jointabletipepekerjaan()
    {
        $this->db->from($this->table_tipe_pekerjaan);
    }

    private function _get_datatables_query_tipe_pekerjaan()
    {

        //$this->db->from($this->table);
        $this->jointabletipepekerjaan();

        $i = 0;

        foreach ($this->column_search_tipe_pekerjaan as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search_tipe_pekerjaan) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_tipe_pekerjaan[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_tipe_pekerjaan)) {
            $order = $this->order_tipe_pekerjaan;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables_tipe_pekerjaan()
    {
        $this->_get_datatables_query_tipe_pekerjaan();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_tipe_pekerjaan()
    {
        $this->_get_datatables_query_tipe_pekerjaan();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_tipe_pekerjaan()
    {
        $this->db->from($this->table_tipe_pekerjaan);
        return $this->db->count_all_results();
    }

    public function get_by_id_tipe_pekerjaan($iddropdownpekerjaan)
    {
        //$this->db->from($this->table);
        $this->jointabletipepekerjaan();

        $this->db->where('id_dropdown_pekerjaan', $iddropdownpekerjaan);
        $query = $this->db->get();

        return $query->row();
    }

    public function tipe_pekerjaan_save($data)
    {
        $this->db->insert($this->table_tipe_pekerjaan, $data);
        return $this->db->insert_id();
    }

    public function tipe_pekerjaan_update($where, $data)
    {
        $this->db->update($this->table_tipe_pekerjaan, $data, $where);
        return $this->db->affected_rows();
    }

    public function tipe_pekerjaan_delete_by_id($iddropdownpekerjaan)
    {
        $this->db->where('id_dropdown_pekerjaan', $iddropdownpekerjaan);
        $this->db->delete($this->table_tipe_pekerjaan);
    }

    public function show_all_tipe_pekerjaan()
    {
        return $this->db->from($this->jointabletipepekerjaan())->get()->result();
    }

    //Model Bidang Usaha
    var $table_bidang_usaha = 'tbl_dropdown_bidangusaha';
    var $column_order_bidang_usaha = array('nama_dropdown_bidangusaha', null); //set column field database for datatable orderable
    var $column_search_bidang_usaha = array('nama_dropdown_bidangusaha'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order_bidang_usaha = array('id_dropdown_bidangusaha' => 'desc'); // default order 

    function jointablebidang_usaha()
    {
        $this->db->from($this->table_bidang_usaha);
    }

    private function _get_datatables_query_bidang_usaha()
    {

        //$this->db->from($this->table);
        $this->jointablebidang_usaha();

        $i = 0;

        foreach ($this->column_search_bidang_usaha as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search_bidang_usaha) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_bidang_usaha[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_bidang_usaha)) {
            $order = $this->order_bidang_usaha;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables_bidang_usaha()
    {
        $this->_get_datatables_query_bidang_usaha();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_bidang_usaha()
    {
        $this->_get_datatables_query_bidang_usaha();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_bidang_usaha()
    {
        $this->db->from($this->table_bidang_usaha);
        return $this->db->count_all_results();
    }

    public function get_by_id_bidang_usaha($iddropdownbidangusaha)
    {
        //$this->db->from($this->table);
        $this->jointablebidang_usaha();

        $this->db->where('id_dropdown_bidangusaha', $iddropdownbidangusaha);
        $query = $this->db->get();

        return $query->row();
    }

    public function bidang_usaha_save($data)
    {
        $this->db->insert($this->table_bidang_usaha, $data);
        return $this->db->insert_id();
    }

    public function bidang_usaha_update($where, $data)
    {
        $this->db->update($this->table_bidang_usaha, $data, $where);
        return $this->db->affected_rows();
    }

    public function bidang_usaha_delete_by_id($iddropdownbidangusaha)
    {
        $this->db->where('id_dropdown_bidangusaha', $iddropdownbidangusaha);
        $this->db->delete($this->table_bidang_usaha);
    }

    public function show_all_bidang_usaha()
    {
        return $this->db->from($this->jointablebidang_usaha())->get()->result();
    }

    //Model Bidang Usaha
    var $table_status_surat_masuk = 'tbl_dropdown_statussuratmasuk';
    var $column_order_status_surat_masuk = array('nama_dropdown_statussuratmasuk', null); //set column field database for datatable orderable
    var $column_search_status_surat_masuk = array('nama_dropdown_statussuratmasuk'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order_status_surat_masuk = array('id_dropdown_statussuratmasuk' => 'desc'); // default order 

    function jointablestatus_surat_masuk()
    {
        $this->db->from($this->table_status_surat_masuk);
    }

    private function _get_datatables_query_status_surat_masuk()
    {

        //$this->db->from($this->table);
        $this->jointablestatus_surat_masuk();

        $i = 0;

        foreach ($this->column_search_status_surat_masuk as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search_status_surat_masuk) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_status_surat_masuk[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_status_surat_masuk)) {
            $order = $this->order_status_surat_masuk;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables_status_surat_masuk()
    {
        $this->_get_datatables_query_status_surat_masuk();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_status_surat_masuk()
    {
        $this->_get_datatables_query_status_surat_masuk();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_status_surat_masuk()
    {
        $this->db->from($this->table_status_surat_masuk);
        return $this->db->count_all_results();
    }

    public function get_by_id_status_surat_masuk($iddropdownstatussuratmasuk)
    {
        //$this->db->from($this->table);
        $this->jointablestatus_surat_masuk();

        $this->db->where('id_dropdown_statussuratmasuk', $iddropdownstatussuratmasuk);
        $query = $this->db->get();

        return $query->row();
    }

    public function status_surat_masuk_save($data)
    {
        $this->db->insert($this->table_status_surat_masuk, $data);
        return $this->db->insert_id();
    }

    public function status_surat_masuk_update($where, $data)
    {
        $this->db->update($this->table_status_surat_masuk, $data, $where);
        return $this->db->affected_rows();
    }

    public function status_surat_masuk_delete_by_id($iddropdownstatussuratmasuk)
    {
        $this->db->where('id_dropdown_statussuratmasuk', $iddropdownstatussuratmasuk);
        $this->db->delete($this->table_status_surat_masuk);
    }

    public function show_all_status_surat_masuk()
    {
        return $this->db->from($this->jointablestatus_surat_masuk())->get()->result();
    }

    //Model Kat Library
    var $table_kat_lib = 'tbl_kat_book';
    var $column_order_kat_lib = array('nama_kat_book', null); //set column field database for datatable orderable
    var $column_search_kat_lib = array('nama_kat_book'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order_kat_lib = array('id_kat_book' => 'desc'); // default order 

    function jointablekat_lib()
    {
        $this->db->from($this->table_kat_lib);
    }

    private function _get_datatables_query_kat_lib()
    {

        //$this->db->from($this->table);
        $this->jointablekat_lib();

        $i = 0;

        foreach ($this->column_search_kat_lib as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search_kat_lib) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_kat_lib[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_kat_lib)) {
            $order = $this->order_kat_lib;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables_kat_lib()
    {
        $this->_get_datatables_query_kat_lib();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_kat_lib()
    {
        $this->_get_datatables_query_kat_lib();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_kat_lib()
    {
        $this->db->from($this->table_kat_lib);
        return $this->db->count_all_results();
    }

    public function get_by_id_kat_lib($idkatbook)
    {
        //$this->db->from($this->table);
        $this->jointablekat_lib();

        $this->db->where('id_kat_book', $idkatbook);
        $query = $this->db->get();

        return $query->row();
    }

    public function kat_lib_save($data)
    {
        $this->db->insert($this->table_kat_lib, $data);
        return $this->db->insert_id();
    }

    public function kat_lib_update($where, $data)
    {
        $this->db->update($this->table_kat_lib, $data, $where);
        return $this->db->affected_rows();
    }

    public function kat_lib_delete_by_id($idkatbook)
    {
        $this->db->where('id_kat_book', $idkatbook);
        $this->db->delete($this->table_kat_lib);
    }

    public function show_all_kat_book()
    {
        return $this->db->from($this->jointablekat_lib())->get()->result();
    }
}

/* End of file Gudang.php */
