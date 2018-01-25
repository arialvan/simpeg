<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class ServicePegawai extends REST_Controller {
    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model('M_pegawai');
    }

    //Menampilkan data pegawai
    function index_get() {
        $id = $this->get('nip');
        if ($id == '') {
            $kontak = $this->M_pegawai->show_pegawai_service();
        } else {
          $where = array('nip' => $id);
          $kontak = $this->M_pegawai->show_pegawai_services($where, 'tb_pegawai')->result();
        }
        $this->response($kontak, 200);
    }


    //Mengirim atau menambah data kontak baru
    	// function index_post() {
      //       $data = array(
      //                   'id'=> $this->post('id'),
      //                   'nama'          => $this->post('nama'),
      //                   'nomor'    => $this->post('nomor'));
      //       $insert = $this->db->insert('telepon', $data);
      //       if ($insert) {
      //           $this->response($data, 200);
      //       } else {
      //           $this->response(array('status' => 'fail', 502));
      //       }
      //   }

        //Memperbarui data kontak yang telah ada
    	// function index_put() {
      //       $id = $this->put('id');
      //       $data = array(
      //                   'id'       => $this->put('id'),
      //                   'nama'          => $this->put('nama'),
      //                   'nomor'    => $this->put('nomor'));
      //       $this->db->where('id', $id);
      //       $update = $this->db->update('telepon', $data);
      //       if ($update) {
      //           $this->response($data, 200);
      //       } else {
      //           $this->response(array('status' => 'fail', 502));
      //       }
      //   }


        //Menghapus salah satu data kontak
      	// function index_delete() {
        //       $id = $this->delete('id');
        //       $this->db->where('id', $id);
        //       $delete = $this->db->delete('telepon');
        //       if ($delete) {
        //           $this->response(array('status' => 'success'), 201);
        //       } else {
        //           $this->response(array('status' => 'fail', 502));
        //       }
        //   }

    //Masukan function selanjutnya disini
    // public function is_logged_in() {
    //     $is_logged_in = $this->session->userdata('is_login');
    //     if (!isset($is_logged_in) || $is_logged_in != true) {
    //         redirect('Login?msg=9');
    //         die();
    //     }
    // }
}
?>
