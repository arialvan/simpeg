<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
var $acl;
	public function __construct() {
            parent::__construct();
            $this->is_logged_in();
            $this->load->model('M_pegawai');
            $this->load->model('M_master');
            $this->load->helper(array('form','url'));
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
            $this->load->view('layout/header',$data);
            $this->load->view('layout/side_menu');
            $this->load->view('dashboard');
            $this->load->view('layout/footer');
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
