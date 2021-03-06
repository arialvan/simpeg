<?php
class M_pegawai extends CI_Model{

   function __construct()
    {
        parent::__construct();
    }

/*PEGAWAI*/
    function show_pegawai(){
        $query = $this->db->get('tb_pegawai')->result();
        return $query;
    }

    function show_pegawai_setting(){
        $this->db->select('nip,nama_peg,status_peg,status_profesi,status_profil')
                 ->from('tb_pegawai');
        $query = $this->db->get()->result();
        return $query;
    }

/*PEGAWAI*/
    function show_pegawai_profil(){
        $query = $this->db->get('tb_pegawai_profil')->result();
        return $query;
    }
/*PEGAWAI*/
    function show_pegawai_stprof(){
        $this->db->select('*')
                        ->from('tb_pegawai')
                        ->where(array('status_profil' => 0))
                        ->order_by('nip');
        $query=$this->db->get()->result();
        return $query;
    }
 /*PEGAWAI VIEWS*/

    function show_viewpages(){
        $query = $this->db->get('pegview')->result();
        return $query;
    }

    function show_viewpages_edit($where,$table){
        return $this->db->get_where($table,$where);
    }


/*INSERT PEGAWAI*/
    function insert_pegawai($data,$table) {
        $msg = '<i class="fa fa-check text-success"></i> Simpan Data Berhasil';
        $this->db->insert($table, $data);
        if($this->db->affected_rows() < 1 ){
            $msg = '<i class="fa fa-close text-danger"></i> Simpan data gagal.';
        }
        return $msg;
    }

/*INSERT PROFIL PEGAWAI*/
    function insert_profil_pegawai($data,$table) {
        $this->db->insert($table, $data);
    }
/*EDIT PEGAWAI*/
    function edit_pegawai($where,$table){
        return $this->db->get_where($table,$where);
    }
/*UPDATE PEGAWAI*/
    function update_pegawai($where,$data,$table){
        $msg = '<i class="fa fa-check text-success"></i> Simpan Data Berhasil';
	$this->db->where($where);
	$this->db->update($table,$data);
        if($this->db->affected_rows() < 1 ){
            $msg = '<i class="fa fa-close text-danger"></i> Simpan data gagal.';
        }
        return $msg;
    }
/*UPDATE PEGAWAI PROFIL*/
    function update_pegawai_profil($where,$data,$table){
	$this->db->where($where);
	$this->db->update($table,$data);
    }

/*UPDATE PEGAWAI ATASAN*/
    function update_pegawai_atasan($where,$data,$table){
	$this->db->where($where);
	$this->db->update($table,$data);
    }
/*HAPUS DATA PEGAWAI*/
    function hapus_pegawai($where,$table){
        $msg = '<i class="fa fa-check text-success"></i> Hapus Data Berhasil';
	$this->db->where($where);
	$this->db->delete($table);
        if($this->db->affected_rows() < 1 ){
            $msg = '<i class="fa fa-close text-danger"></i> Hapus data gagal.';
        }
    }

/* RIWAYAT PENDIDIKAN JOIN PENDIDIKAN */
    function riwayatpendidikan($id){
        $this->db->select('*');
        $this->db->from('tb_riwayatpendidikan');
        $this->db->join('tb_pendidikan', 'tb_pendidikan.id_pendidikan = tb_riwayatpendidikan.id_pendidikan');
        //$this->db->join('tb_pegawai', 'tb_pegawai.nip = tb_riwayatpendidikan.nip','left');
        $this->db->where('tb_riwayatpendidikan.nip', $id);
        $query = $this->db->get()->result();

        return $query;
    }
/* RIWAYAT JABATAN JOIN JABATAN */
    function riwayatjabatan($id){
        $this->db->select('*');
        $this->db->from('tb_riwayatjabatan');
        $this->db->join('tb_jabatan_struktural', 'tb_jabatan_struktural.id_jabatan = tb_riwayatjabatan.id_jabatan');
        //$this->db->join('tb_pegawai', 'tb_pegawai.nip = tb_riwayatjabatan.nip','left');
        $this->db->where('tb_riwayatjabatan.nip', $id);
        $query = $this->db->get()->result();

        return $query;
    }
/* RIWAYAT DIKLAT*/
    function riwayatdiklat($where,$table){
       return $this->db->get_where($table,$where);
    }
/* RIWAYAT SEMINAR*/
    function riwayatseminar($where,$table){
       return $this->db->get_where($table,$where);
    }

/*INSERT ORGANISASI */
    function insert_organisasi($data,$table) {
        $this->db->insert($table, $data);
    }

/*SHOW ORGANISASI */
    function show_organisasi(){
        $query = $this->db->get('organisasi')->result();
        return $query;
    }

/*AMBIL UNIT */
    function ambil_unit() {
	$sql=$this->db->get('tb_unit');
	if($sql->num_rows()>0){
		foreach ($sql->result_array() as $row)
			{
				$result['-']= '- Pilih Unit -';
				$result[$row['id_unit']]= ucwords(strtolower($row['unit_organisasi']));
			}
			return $result;
		}
	}

/*AMBIL UNIT KERJA*/
    public function ambil_jabatan($id){
        $this->db->select('*');
        $this->db->from('tb_kelompok_organisasi');
        $this->db->join('tb_jabatan_struktural', 'tb_kelompok_organisasi.id_jabatan = tb_jabatan_struktural.id_jabatan');
        $this->db->where('tb_kelompok_organisasi.id_unit', $id);
	$this->db->group_by('tb_kelompok_organisasi.id_jabatan');
	$sql=$this->db->get('tb_jabatan_struktural');
	if($sql->num_rows()>0){
		foreach ($sql->result_array() as $row)
        {
            $result[$row['id_jabatan']]= ucwords(strtolower($row['jabatan_struktural']));
        }
		} else {
		   $result['-']= '- Belum Ada Jabatan -';
		}
        return $result;
	}


      public function ambil_tb_jabatan()
        {
            $state=$this->input->post("state");
            $sql="select * FROM tb_kelompok_organisasi join tb_jabatan_struktural "
               . "on tb_kelompok_organisasi.id_jabatan=tb_jabatan_struktural.id_jabatan "
               . "where tb_kelompok_organisasi.id_unit ='$state' group by tb_kelompok_organisasi.id_jabatan";
            $query=$this->db->query($sql);
            return $query;
        }

        public function ambil_tb_unitkerja()
        {
            $state  = $this->input->post("state");
            $ex     = explode('#',$state);
            $idjab  = $ex[0];
            $idunit = $ex[1];

            $sql="select * FROM tb_kelompok_organisasi join tb_unit_kerja on tb_kelompok_organisasi.id_unit_kerja=tb_unit_kerja.id_unit_kerja
                  where tb_kelompok_organisasi.id_unit='$idunit' and  tb_kelompok_organisasi.id_jabatan ='$idjab'
                  group by tb_kelompok_organisasi.id_unit_kerja"; //tb_kelompok_organisasi.id_unit='$idunit' and
            $query=$this->db->query($sql);
            return $query;
        }

        public function ambil_tb_satuankerja()
        {
            $state  = $this->input->post("state");
            $ex     = explode('#',$state);
            $idjab  = $ex[0];
            $idunit = $ex[1];

            $sql="select * FROM tb_kelompok_organisasi join tb_satuan_kerja on tb_kelompok_organisasi.id_satuan_kerja=tb_satuan_kerja.id_satuan_kerja
                  where tb_kelompok_organisasi.id_unit='$idunit' and tb_kelompok_organisasi.id_unit_kerja ='$idjab'
                  group by tb_kelompok_organisasi.id_satuan_kerja";
            $query=$this->db->query($sql);
            return $query;
        }

        public function ambil_tb_jfu()
        {
            $state=$this->input->post("state");
            $sql="select * FROM tb_kelompok_organisasi join tb_jabatan_jfu on tb_kelompok_organisasi.id_jfu=tb_jabatan_jfu.id_jfu
            where tb_kelompok_organisasi.id_satuan_kerja ='$state'";
            $query=$this->db->query($sql);
            return $query;
        }

}
