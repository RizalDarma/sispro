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
    //Memperbaharui Password User Berdasarkan Kategori
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
    private $primary1="id_Dosen";
    //Menampilkan Data dosen
    public function datadosen($limit=10,$offset=0,$order_column='',$order_type='asc'){
        if(empty($order_column) || empty($order_type))
            $this->db->order_by($this->id_dosen,'asc');
        else
            $this->db->order_by($order_column,$order_type);
        return $this->db->query("SELECT * FROM biodata_dosen");
    }
    private $primary2="id_users";
    //Menampilkan Data dosen
    public function datausers($limit=10,$offset=0,$order_column='',$order_type='asc'){
        if(empty($order_column) || empty($order_type))
            $this->db->order_by($this->id_users,'asc');
        else
            $this->db->order_by($order_column,$order_type);
        return $this->db->query("SELECT * FROM app_users");
    }
    
    //Memperbaharui Data User Berdasarkan Kategori
    public function updateuser($id_users,$nama_users,$usernama,$password,$level){
        if($password==""){
           $query = "UPDATE `app_users` SET `username`='$usernama',`nama`='$nama_users',`level`='$level' WHERE `id_users`='$id_users'"; 
        } else {
           $query = "UPDATE `app_users` SET `username`='$usernama',`nama`='$nama_users',`password`='md5($password)',`level`='$level' WHERE `id_users`='$id_users'"; 
        }
        $hasil = $this->db->query($query);
        return $hasil;
    }
   
    function getSlider($where){
		return $this->db->query("select * from `app_users` where id_users = '$where';");
	}
    
        function kriteria1(){
            $this->db->order_by('nama_kriteria','asc');
            $result = $this->db->get('kriteria1');
            
            $dd[''] = '';
            if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
                $dd[$row->nama_kriteria] = $row->nama_kriteria;
                }
            }
            return $dd;
        }
        
        function kriteria2(){
            $this->db->order_by('nama_kriteria','asc');
            $result = $this->db->get('kriteria2');
            
            $dd1[''] = '';
            if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
                $dd1[$row->nama_kriteria] = $row->nama_kriteria;
                }
            }
            return $dd1;
        }
        
        function kriteria3(){
            $this->db->order_by('nama_kriteria','asc');
            $result = $this->db->get('kriteria3');
            
            $dd2[''] = '';
            if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
                $dd2[$row->nama_kriteria] = $row->nama_kriteria;
                }
            }
            return $dd2;
        }
        
        function kriteria4(){
            $this->db->order_by('nama_kriteria','asc');
            $result = $this->db->get('kriteria3');
            
            $dd3[''] = '';
            if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
                $dd3[$row->nama_kriteria] = $row->nama_kriteria;
                }
            }
            return $dd3;
        }
}