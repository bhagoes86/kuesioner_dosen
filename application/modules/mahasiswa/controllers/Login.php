<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('Gmodel');
        $this->isLoggedIn();
    }
    function isLoggedIn(){
    	if($this->session->userdata('loggedin') == true){
    		header("location:".base_url('mahasiswa/index'));
    	}
    }
    function index(){
		$this->load->view('main_html/login');
    }
    function do_login(){
        $params = $this->input->post();
        if($params != null){
            $dataSelect['username'] = $params['nim'];
            $dataSelect['password'] = md5($params['password']);
            $selectData = $this->Gmodel->rawQuery("SELECT * FROM tt_kelas
                                                    INNER JOIN tm_mahasiswa ON tm_mahasiswa.kd_mahasiswa = tt_kelas.kd_mahasiswa
                                                    WHERE tm_mahasiswa.nim LIKE '".$dataSelect['username']."%'
                                                    AND tm_mahasiswa.password = '".$dataSelect['password']."'
                                                    AND tm_mahasiswa.`status` = 0;");
            if($selectData->num_rows() > 0){
                $dataSession = array();
                $dataSession['loggedin'] = true;
                $dataSession['nama'] = $selectData->row()->nama;
                $dataSession['nim'] = $selectData->row()->nim;
                $dataSession['kd_mahasiswa'] = sha1($selectData->row()->kd_mahasiswa);
                $this->session->set_userdata($dataSession);
                // $this->isLoggedIn();
                echo 'true';
            }else{
                echo 'false';
            }
        }else{
            echo 'false';
        }
    }
}