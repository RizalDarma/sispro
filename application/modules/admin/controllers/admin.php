<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->app_model->islogin();
        if ($this->session->userdata['level']<>'admin'){
            redirect('login');
        }
    }
    
    public function index(){
        $data = Array();
        $this->template->load('template','admin_dashboard',$data);
    }
    
    
}