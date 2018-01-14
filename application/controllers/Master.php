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
            $data['name'] = $this->session->userdata('username');
            $data['jabatan'] = $this->M_master->show_jabatan();
            //$data['pangkat'] = $this->M_master->show_pangkat();
            $data['golongan'] = $this->M_master->show_golongan();
            $data['agama'] = $this->M_master->show_agama();
            $data['pendidikan'] = $this->M_master->show_pendidikan();
            $data['mapel'] = $this->M_master->show_mapel();
            $this->load->view('layout/header',$data);
            $this->load->view('layout/side_menu');
            $this->load->view('pages/master/master_view');
            $this->load->view('layout/footer');
        }
        
/*PROSES TAMBAH JABATAN*/
        public function TambahJabatan(){ 
            $query = $this->M_master->M_insert_jabatan();
            echo $query;
            redirect('Master/');
        }
/*PROSES TAMBAH JABATAN*/
//        public function TambahPangkat(){ 
//            $query = $this->M_master->M_insert_pangkat();
//            echo $query;
//            redirect('Master/');
//        }
/*PROSES TAMBAH JABATAN*/
        public function TambahGolongan(){ 
            $query = $this->M_master->M_insert_golongan();
            echo $query;
            redirect('Master/');
        }
/*PROSES TAMBAH JABATAN*/
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
//LOGOUT
    public function is_logged_in() {
        $is_logged_in = $this->session->userdata('is_login');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('Login?msg=9');
            die();
        }
    }
}
