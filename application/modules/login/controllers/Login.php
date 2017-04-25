<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->login();
    }
    
    public function login(){
        if (isset($_POST['submit'])){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $hasil = $this->app_model->check_login($username,$password);
            if($hasil->num_rows()>0){
                echo"berhasil login";
                $r = $hasil->row_array();
                $data = array(
                    'username'=>$r['username'],
                    'nama'=>$r['nama'],
                    'level'=>$r['level']
                );
                
                $this->session->set_userdata($data);
                if ($r['level']=='mahasiswa'){
                    redirect('mahasiswa');
                }elseif($r['level']=='dosen'){
                    redirect('dosen');
                }elseif($r['level']=='admin'){
                    redirect('admin');
                }
                
            }else{
                $this->load->view('login_view');
            }
        }else{
            $this->load->view('login_view');
        }
    }
    
    public function logout(){
        $this->session->sess_destroy();
        $this->login();
    }
}