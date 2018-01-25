<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	function __construct() {
            parent::__construct();
            $this->is_logged_in();
            $this->load->model('M_master');
            $this->load->helper(array('form', 'url'));
            $this->acl = $this->session->userdata('acl');

        }
        function ceklink($url) {
            $headers = @get_headers($url);
            $headers = (is_array($headers)) ? implode("\n ", $headers) : $headers;
            return (bool) preg_match('#^HTTP/.*\s+[(200|301|302)]+\s#i', $headers);

        }
public function index()
{
		if($this->session->userdata('user_level')==1)
		{
				$data['name'] = $this->session->userdata('username');
				$data['jabatan'] = $this->M_master->show_jabatan();
				$data['golongan'] = $this->M_master->show_golongan();
				$data['agama'] = $this->M_master->show_agama();
				$data['pendidikan'] = $this->M_master->show_pendidikan();
				$data['mapel'] = $this->M_master->show_mapel();
				$data['jfu'] = $this->M_master->show_jfu();
				$data['unit'] = $this->M_master->show_unit();
				$data['unitkerja'] = $this->M_master->show_unit_kerja();
				$data['satuankerja'] = $this->M_master->show_satuan_kerja();
				$this->load->view('layout/header',$data);
				$this->load->view('layout/side_menu');
				$this->load->view('pages/master/master_view');
				$this->load->view('layout/footer');
		}else{
				$data['name'] = $this->session->userdata('username');
				$this->load->view('layout/header',$data);
				$this->load->view('layout/side_menu');
				$this->load->view('pages/error.php');
				$this->load->view('layout/footer');
		}
}

/*PROSES TAMBAH JABATAN*/
        public function TambahJabatan(){
            $query = $this->M_master->M_insert_jabatan();
            echo $query;
            redirect('Master/');
        }
/*PROSES TAMBAH GOLONGAN*/
        public function TambahGolongan(){
            $query = $this->M_master->M_insert_golongan();
            echo $query;
            redirect('Master/');
        }
/*PROSES TAMBAH AGAMA*/
        public function TambahAgama(){
            $query = $this->M_master->M_insert_agama();
            echo $query;
            redirect('Master/');
        }
/*PROSES TAMBAH PENDIDIKAN*/
        public function TambahPendidikan(){
            $query = $this->M_master->M_insert_pendidikan();
            echo $query;
            redirect('Master/');
        }
/*PROSES TAMBAH MAPEL*/
        public function TambahMapel(){
            $query = $this->M_master->M_insert_mapel();
            echo $query;
            redirect('Master/');
        }
/*PROSES TAMBAH JFU*/
				public function TambahJfu(){
						$query = $this->M_master->M_insert_jfu();
						echo $query;
						redirect('Master/');
				}
/*PROSES TAMBAH UNIT*/
				public function TambahUnit(){
						$query = $this->M_master->M_insert_unit();
						echo $query;
						redirect('Master/');
				}
/*PROSES TAMBAH UNIT KERJA */
				public function TambahUnitKerja(){
						$query = $this->M_master->M_insert_unitkerja();
						echo $query;
						redirect('Master/');
				}
/*PROSES TAMBAH UNIT SATUAN KERJA */
				public function TambahUnitSatuanKerja(){
						$query = $this->M_master->M_insert_unitsatuankerja();
						echo $query;
						redirect('Master/');
				}

/*EDIT JABATAN STRUKTURAL */
public function EditJabatan($id) {
		if($this->session->userdata('user_level')==1)
		{
			$data['name'] = $this->session->userdata('username');
			$where = array('id_jabatan' => $id);
			$data['jabatan'] = $this->M_master->edit_jabatan($where, 'tb_jabatan_struktural')->result();
			$data['title'] = 'Edit Jabatan';
			$this->load->view('layout/header',$data);
			$this->load->view('layout/side_menu');
			$this->load->view('pages/master/jabatan_edit');
			$this->load->view('layout/footer');
		}else{
			$data['name'] = $this->session->userdata('username');
			$this->load->view('layout/header',$data);
			$this->load->view('layout/side_menu');
			$this->load->view('pages/error.php');
			$this->load->view('layout/footer');
		}
}

function UpdateJabatan() {
			$data = array('jabatan_struktural' => $this->input->post('jabatan_struktural'));
      $where = array('id_jabatan' => $this->input->post('id_jabatan'));
      $this->M_master->update_jabatan_struktural($where, $data, 'tb_jabatan_struktural');
      echo "Update Succes"; redirect('Master','refresh');
}

/*EDIT JABATAN JFU */
public function EditJfu($id) {
		if($this->session->userdata('user_level')==1)
		{
				$data['name'] = $this->session->userdata('username');
				$where = array('id_jfu' => $id);
				$data['jfu'] = $this->M_master->edit_jfu($where, 'tb_jabatan_jfu')->result();
				$data['title'] = 'Edit JFU';
				$this->load->view('layout/header',$data);
				$this->load->view('layout/side_menu');
				$this->load->view('pages/master/jfu_edit');
				$this->load->view('layout/footer');
		}else{
				$data['name'] = $this->session->userdata('username');
				$this->load->view('layout/header',$data);
				$this->load->view('layout/side_menu');
				$this->load->view('pages/error.php');
				$this->load->view('layout/footer');
		}
}

function UpdateJfu() {
		$data = array('jfu' => $this->input->post('jfu'));
		$where = array('id_jfu' => $this->input->post('id_jfu'));
		$this->M_master->update_jfu($where, $data, 'tb_jabatan_jfu');
		echo "Update Succes"; redirect('Master','refresh');
}

/*EDIT UNIT ORGANISASI */
      public function EditUnit($id) {
          $data['name'] = $this->session->userdata('username');
          $where = array('id_unit' => $id);
          $data['unit'] = $this->M_master->edit_unit($where, 'tb_unit')->result();
          $data['title'] = 'Edit Unit Organisasi';
          $this->load->view('layout/header',$data);
          $this->load->view('layout/side_menu');
          $this->load->view('pages/master/unit_edit');
          $this->load->view('layout/footer');
  		}

	    	function UpdateUnit() {
						$data = array(
													'unit_organisasi' => $this->input->post('unit_organisasi'),
													'ket_organisasi' => $this->input->post('ket_organisasi')
												 );
            $where = array('id_unit' => $this->input->post('id_unit'));
            $this->M_master->update_unit($where, $data, 'tb_unit');
            echo "Update Succes"; redirect('Master','refresh');
		   }

/*EDIT UNIT KERJA */
     public function EditUnitKerja($id) {
         $data['name'] = $this->session->userdata('username');
         $where = array('id_unit_kerja' => $id);
         $data['unitkerja'] = $this->M_master->edit_unitkerja($where, 'tb_unit_kerja')->result();
         $data['title'] = 'Edit Unit Kerja';
         $this->load->view('layout/header',$data);
         $this->load->view('layout/side_menu');
         $this->load->view('pages/master/unitkerja_edit');
         $this->load->view('layout/footer');
 		}

	    	function UpdateUnitKerja() {
					 $data = array('unit_kerja' => $this->input->post('unit_kerja'));
           $where = array('id_unit_kerja' => $this->input->post('id_unit_kerja'));
           $this->M_master->update_unitkerja($where, $data, 'tb_unit_kerja');
           echo "Update Succes"; redirect('Master','refresh');
		   }

/*EDIT UNIT KERJA */
    public function EditSatuanKerja($id) {
        $data['name'] = $this->session->userdata('username');
        $where = array('id_satuan_kerja' => $id);
        $data['satuankerja'] = $this->M_master->edit_satuankerja($where, 'tb_satuan_kerja')->result();
        $data['title'] = 'Edit Unit Satuan Kerja';
        $this->load->view('layout/header',$data);
        $this->load->view('layout/side_menu');
        $this->load->view('pages/master/unitsatuankerja_edit');
        $this->load->view('layout/footer');
		}

	    	function UpdateSatuanKerja() {
					$data = array('satuan_kerja' => $this->input->post('satuan_kerja'));
          $where = array('id_satuan_kerja' => $this->input->post('id_satuan_kerja'));
          $this->M_master->update_satuankerja($where, $data, 'tb_satuan_kerja');
          echo "Update Succes"; redirect('Master','refresh');
		   }

/*EDIT UNIT SATUAN KERJA */
   public function EditGolongan($id) {
       $data['name'] = $this->session->userdata('username');
       $where = array('id_gol' => $id);
       $data['golongan'] = $this->M_master->edit_golongan($where, 'tb_golongan')->result();
       $data['title'] = 'Edit Golongan';
       $this->load->view('layout/header',$data);
       $this->load->view('layout/side_menu');
       $this->load->view('pages/master/golongan_edit');
       $this->load->view('layout/footer');
		}

	    	function UpdateGolongan() {
					$data = array(
												'nama_golongan' => $this->input->post('nama_golongan'),
												'nama_jabatan' => $this->input->post('nama_jabatan'),
												'last_update' => date('Y-m-d H:i:s')
											 );
         $where = array('id_gol' => $this->input->post('id_gol'));
         $this->M_master->update_golongan($where, $data, 'tb_golongan');
         echo "Update Succes"; redirect('Master','refresh');
		   }

/*EDIT AGAMA */
  public function EditAgama($id) {
      $data['name'] = $this->session->userdata('username');
      $where = array('id_agama' => $id);
      $data['agama'] = $this->M_master->edit_agama($where, 'tb_agama')->result();
      $data['title'] = 'Edit Agama';
      $this->load->view('layout/header',$data);
      $this->load->view('layout/side_menu');
      $this->load->view('pages/master/agama_edit');
      $this->load->view('layout/footer');
		}

	    	function UpdateAgama() {
					$data = array('agama' => $this->input->post('agama'));
        $where = array('id_agama' => $this->input->post('id_agama'));
        $this->M_master->update_agama($where, $data, 'tb_agama');
        echo "Update Succes"; redirect('Master','refresh');
		   }

/*EDIT PENDIDIKAN */
 public function EditPendidikan($id) {
     $data['name'] = $this->session->userdata('username');
     $where = array('id_pendidikan' => $id);
     $data['pendidikan'] = $this->M_master->edit_pendidikan($where, 'tb_pendidikan')->result();
     $data['title'] = 'Edit Pendidikan';
     $this->load->view('layout/header',$data);
     $this->load->view('layout/side_menu');
     $this->load->view('pages/master/pendidikan_edit');
     $this->load->view('layout/footer');
		}

	    	function UpdatePendidikan() {
					$data = array('nama_pendidikan' => $this->input->post('nama_pendidikan'));
       $where = array('id_pendidikan' => $this->input->post('id_pendidikan'));
       $this->M_master->update_pendidikan($where, $data, 'tb_pendidikan');
       echo "Update Succes"; redirect('Master','refresh');
		   }
//LOGOUT
    public function is_logged_in() {
        $is_logged_in = $this->session->userdata('is_login');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('Login?msg=9');
            die();
        }
    }
}
