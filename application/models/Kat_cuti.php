<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Kat_cuti extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function listing()
        {
            $this->db->select('*');
            $this->db->from('tb_kat_cuti');
            $this->db->order_by('id_kat_cuti', 'asc');
            $query = $this->db->get();
            return $query->result();
        }
    
        public function detail($id_kat_cuti)
        {
            $this->db->select('*');
            $this->db->from('tb_kat_cuti');
            $this->db->where('id_kat_cuti', $id_kat_cuti);
            $this->db->order_by('id_kat_cuti', 'asc');
            $query = $this->db->get();
            return $query->row();   
        }
    
        public function tambah($data)
        {
            $this->db->insert('tb_kat_cuti', $data);
        }
    
        public function edit($data)
        {
            $this->db->where('id_kat_cuti', $data['id_kat_cuti']);
            $this->db->update('tb_kat_cuti', $data);
        }
    
        public function hapus($data)
        {
            $this->db->where('id_kat_cuti', $data['id_kat_cuti']);
            $this->db->delete('tb_kat_cuti', $data);
        }
}

/* End of file Kat_cuti.php */
