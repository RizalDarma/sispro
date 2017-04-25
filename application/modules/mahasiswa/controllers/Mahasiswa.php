<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->app_model->islogin();
        if ($this->session->userdata['level']<>'mahasiswa'){
            redirect('login');
        }
    }
    
    public function index(){
        $data = array('title'=>'Mahasiswa');
        $this->template->load('template','mahasiswa_dashboard',$data);
    }
    
    
}