<?php
class M_master extends CI_Model{
  
   
   function __construct()
    {
        parent::__construct();
    }
        
/*ESELON*/
    function show_eselon(){
        $query = $this->db->get('tb_eselon')->result(); 
        return $query;
    }
/*GOLONGAN*/
    function show_golongan(){
        $query = $this->db->get('tb_golongan')->result(); 
        return $query;
    }
/*JABATAN*/
    function show_jabatan(){
        $query = $this->db->get('tb_jabatan_struktural')->result(); 
        return $query;
    }
/*UNIT*/
    function show_unit(){
        $query = $this->db->get('tb_unit')->result(); 
        return $query;
    }
/*UNIT KERJA*/
    function show_unit_kerja(){
        $query = $this->db->get('tb_unit_kerja')->result(); 
        return $query;
    }
/*SATUAN KERJA*/
    function show_satuan_kerja(){
        $query = $this->db->get('tb_satuan_kerja')->result(); 
        return $query;
    }
/*JFU*/
    function show_jfu(){
        $this->db->order_by('jfu', 'ASC');
        $query = $this->db->get('tb_jabatan_jfu')->result(); 
        return $query;
    }
/*AGAMA*/
    function show_agama(){
        $query = $this->db->get('tb_agama')->result(); 
        return $query;
    }
/*PENDIDIKAN*/
    function show_pendidikan(){
        $query = $this->db->get('tb_pendidikan')->result(); 
        return $query;
    }
/*Mapel*/
    function show_mapel(){
        $query = $this->db->get('tb_mapel')->result(); 
        return $query;
    }

/* #INSERT DATABASE */
//Insert Jabatan
    function M_insert_jabatan() {
        $msg = '<i class="fa fa-check text-success"></i> Simpan Data Berhasil';
        $data['nama_jabatan']   = $this->input->post('nama_jabatan', TRUE);
        $query = $this->db->insert('tb_jabatan', $data);
        if($this->db->affected_rows() < 1 ){ 
            $msg = '<i class="fa fa-close text-danger"></i> Simpan data gagal.';
        }
        return $msg;
    }
//Insert Jabatan
    function M_insert_pangkat() {
        $msg = '<i class="fa fa-check text-success"></i> Simpan Data Berhasil';
        $data['nama_pangkat']   = $this->input->post('nama_pangkat', TRUE);
        $query = $this->db->insert('tb_pangkat', $data);
        if($this->db->affected_rows() < 1 ){ 
            $msg = '<i class="fa fa-close text-danger"></i> Simpan data gagal.';
        }
        return $msg;
    }
//Insert Golongan
    function M_insert_golongan() {
        $msg = '<i class="fa fa-check text-success"></i> Simpan Data Berhasil';
        $data['nama_golongan']   = $this->input->post('nama_golongan', TRUE);
        $query = $this->db->insert('tb_golongan', $data);
        if($this->db->affected_rows() < 1 ){ 
            $msg = '<i class="fa fa-close text-danger"></i> Simpan data gagal.';
        }
        return $msg;
    }
//Insert Agama
    function M_insert_agama() {
        $msg = '<i class="fa fa-check text-success"></i> Simpan Data Berhasil';
        $data['agama']   = $this->input->post('agama', TRUE);
        $query = $this->db->insert('tb_agama', $data);
        if($this->db->affected_rows() < 1 ){ 
            $msg = '<i class="fa fa-close text-danger"></i> Simpan data gagal.';
        }
        return $msg;
    }   
//Insert Pendidikan
    function M_insert_pendidikan() {
        $msg = '<i class="fa fa-check text-success"></i> Simpan Data Berhasil';
        $data['nama_pendidikan']   = $this->input->post('nama_pendidikan', TRUE);
        $query = $this->db->insert('tb_pendidikan', $data);
        if($this->db->affected_rows() < 1 ){ 
            $msg = '<i class="fa fa-close text-danger"></i> Simpan data gagal.';
        }
        return $msg;
    }   
//Insert Mapel
    function M_insert_mapel() {
        $msg = '<i class="fa fa-check text-success"></i> Simpan Data Berhasil';
        $data['nama_mapel']   = $this->input->post('nama_mapel', TRUE);
        $query = $this->db->insert('tb_mapel', $data);
        if($this->db->affected_rows() < 1 ){ 
            $msg = '<i class="fa fa-close text-danger"></i> Simpan data gagal.';
        }
        return $msg;
    }         
}