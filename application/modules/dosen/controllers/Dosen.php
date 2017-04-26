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
    
    function profile()
    {
        if(isset($_POST['submit']))
        {
            $username=  $this->input->post('username');
            $password=  $this->input->post('password');
            $data    =  array('username'=>$username,'password'=>  md5($password));
            $this->app_model->update($username,$password);
            redirect('Mahasiswa/profile');
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