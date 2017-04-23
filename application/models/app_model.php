<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_model extends CI_Model {
    
    public function check_login($username,$password){
        $query = "select * from app_users where username='".$username."' and password='".md5($password)."'";
        $hasil = $this->db->query($query);
        return $hasil;
    }
    
    public function islogin(){
        if($this->session->userdata['username']==NULL){
            redirect('login');
        }
    }
}