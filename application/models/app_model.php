<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_model extends CI_Model {
    private $table="pendaftaran";
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
    public function update($id_users, $password){
        $query = "UPDATE `app_users` SET `password`='".md5($password)."' WHERE id_users='".$id_users."'";
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
    private $primary="npm";
    //Menampilkan Data Pendaftaran
    public function daftar($limit=10,$offset=0,$order_column='',$order_type='asc'){
        if(empty($order_column) || empty($order_type))
            $this->db->order_by($this->npm,'asc');
        else
            $this->db->order_by($order_column,$order_type);
        return $this->db->query("SELECT * FROM pendaftaran");
    }
    function jumlah(){
        return $this->db->count_all($this->table);
    }
}