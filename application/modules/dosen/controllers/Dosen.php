<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->app_model->islogin();
        if ($this->session->userdata['level']<>'dosen'){
            redirect('login');
        }
    }
    
    public function index(){
        $data = array('title'=>'Dosen');
        $this->template->load('template','dosen_dashboard',$data);
    }
    
    public function check_mahasiswa(){
        $dosen = $this->session->userdata['username'];
        $data = array('title'=>'Ini List Mahasiswa '.$dosen);
        $this->template->load('template','dosen_dashboard',$data);
    }
}