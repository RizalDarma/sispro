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
    
    public function data_mahasiswa(){
        $data = array('title'=>'Data Mahasiswa');
        $this->template->load('template','data_mahasiswa_view',$data);
    }
    
    function profile()
    {
        if(isset($_POST['submit']))
        {
            $id_users=  $this->session->userdata['id_users'];
            $password=  $this->input->post('password');
            //$data    =  array('username'=>$username,'password'=>md5($password));
            $this->app_model->update($id_users,$password);
            $data['title'] = "Profile";
            $data['message']="<div class='alert alert-success'>Data Berhasil Dirubah</div>";
            $this->template->load('template','profile',$data);
        }
        else
        {
            $username = $this->session->userdata['username'];
            $data['title'] = "Profile";
            $this->app_model->getByID($username);
            $data['message']="";
            $this->template->load('template','profile',$data);
        }
    }
    
    public function pengumuman(){
        $data = array('title'=>'Pengumuman');
        $this->template->load('template','pengumuman',$data);
    }
}