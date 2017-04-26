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
    
    function profile()
    {
        if(isset($_POST['submit']))
        {
            $username=  $this->input->post('username');
            $password=  $this->input->post('password');
            $data    =  array('username'=>$username,'password'=>  md5($password));
            $this->app_model->update($username,$password);
            redirect('admin/profile');
        }
        else
        {
            $username = $this->session->userdata['username'];
            //$password = $this->session->userdata['password'];
            //$data   =  array('username'=>$username,'password'=>  md5($password));
            $data = array('title'=>'Profile',$username);
            //$data = array('r'=>'$username');
            $this->app_model->getByID($username);
            $this->template->load('template','profile',$data);
        }
    }
}