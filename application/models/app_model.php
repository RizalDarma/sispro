<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_model extends CI_Model {
    //Mengecek user sudah login atau belum
    public function check_login($username,$password){
        $query = "select * from app_users where username='".$username."' and password='".md5($password)."'";
        $hasil = $this->db->query($query);
        return $hasil;
    }
    //Mengecek user sudah login atau belum
    public function islogin(){
        if($this->session->userdata['username']==NULL){
            redirect('login');
        }
    }
    //Memperbaharui Data Berdasarkan Kategori
    public function update($username, $password){
        $query = "UPDATE `app_users` SET `password`='".$password."' WHERE username='".$username."'";
        $hasil = $this->db->query($query);
        return $hasil;
    }
    //Mengambil Data Berdasarkan Kategori
    public  function getByID($username){
        $query = "select * from app_users where username='".$username."'";
        $hasil = $this->db->query($query);
        return $hasil;
    }
    //Menampilkan Nama Users
    public function getUsers(){
        
    }
}