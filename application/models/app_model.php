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
    //select detail
    public function caridata($where){
        return $this->db->query("select * from `pendaftaran` where `npm` = '$where';");
    }
    
    //hapus pendaftar
    public function hapus_pendaftar($where){
        return $this->db->query("delete from `pendaftaran` where `npm` = '$where';");
    }
    
    public function hapus_users($where){
        return $this->db->query("delete from `app_users` where `id_users` = '$where';");
    }
    
    private $primary="npm";
    //Menampilkan Data Pendaftaran
    public function daftar($limit=10,$offset=0,$order_column='',$order_type='asc'){
        if(empty($order_column) || empty($order_type))
            $this->db->order_by($this->npm,'asc');
        else
            $this->db->order_by($order_column,$order_type);
        
        return $this->db->query("SELECT pendaftaran.`npm`, pendaftaran.`nama`, pendaftaran.`kelas`,
            pendaftaran.`no_hp`, pendaftaran.`periode`, app_users.`nama` as nama_dosen FROM pendaftaran
            INNER JOIN app_users ON pendaftaran.`nama_dosen`=app_users.`id_users`");   
    }
    
    function daftar_mahasiswa($kode){
        return $this->db->query("SELECT * from pendaftaran where `nama_dosen`='$kode' and status='Y'");
    }
    
    function daftar_mahasiswa2($kode,$kode2){
        if($kode2==NULL || $kode2=="ALL"){
            return $this->db->query("SELECT * from pendaftaran where `nama_dosen`='$kode' and status='Y'");
        }else{
            return $this->db->query("SELECT * from pendaftaran where `nama_dosen`='$kode' AND `periode`='$kode2' and status='Y'");
        }   
    }
    
    public function daftar_($kode){
        if($kode=="ALL" || $kode==NULL){
            return $this->db->query("SELECT pendaftaran.`npm`, pendaftaran.`nama`, pendaftaran.`kelas`,
            pendaftaran.`no_hp`, pendaftaran.`periode`, app_users.`nama` as nama_dosen FROM pendaftaran
            INNER JOIN app_users ON pendaftaran.`nama_dosen`=app_users.`id_users`");
        }else{
        return $this->db->query("SELECT pendaftaran.`npm`, pendaftaran.`nama`, pendaftaran.`kelas`,
            pendaftaran.`no_hp`, pendaftaran.`periode`, app_users.`nama` as nama_dosen FROM pendaftaran
            INNER JOIN app_users ON pendaftaran.`nama_dosen`=app_users.`id_users` where pendaftaran.`periode`='$kode'");
        }
    }
    
    public function daftar_cetak($kode){
        if($kode=="ALL" || $kode==NULL){
            return $this->db->query("SELECT *, pendaftaran.`nama`, app_users.`nama` as nama_dosen FROM pendaftaran
            INNER JOIN app_users ON pendaftaran.`nama_dosen`=app_users.`id_users`");
        }else{
        return $this->db->query("SELECT *, pendaftaran.`nama`, app_users.`nama` as nama_dosen FROM pendaftaran
            INNER JOIN app_users ON pendaftaran.`nama_dosen`=app_users.`id_users` where pendaftaran.`periode`='$kode'");
        }
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
        return $this->db->query("SELECT app_users.`username` as Id_Dosen, app_users.`nama` as Nama_Dosen, biodata_dosen.`Notlp_Dosen`
            , biodata_dosen.`Email_Dosen`, biodata_dosen.`Alamat_Dosen` FROM biodata_dosen
            INNER JOIN app_users ON biodata_dosen.id_Dosen=app_users.id_users");
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
    //Menampilkan Data Training
    public function datatraining($limit=10,$offset=0,$order_column='',$order_type='asc'){
        if(empty($order_column) || empty($order_type))
            $this->db->order_by($this->ID_data,'asc');
        else
            $this->db->order_by($order_column,$order_type);
        return $this->db->query("SELECT * FROM tb_dataset");
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
   
    function getusers($where){
		return $this->db->query("select * from `app_users` where id_users = '$where';");
	}
    
        function  add_users($nama,$username,$password,$periode,$level){
            return $this->db->query("INSERT INTO `app_users`(`username`, `nama`, `password`, `level`, `Periode`) VALUES ('$username','$nama',md5('$password'),'$level','$periode')");
        }
        
        function pilih_dosen(){
            $this->db->order_by('nama','asc');
            $result = $this->db->query("SELECT `nama` FROM `app_users` WHERE `level`='dosen'");
            
            $dd[''] = '';
            if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
                $dd[$row->nama] = $row->nama;
                }
            }
            return $dd;
        }
        
        function pilih_periode(){
            $this->db->order_by('npm','asc');
            $result = $this->db->get('periode_daftar');
            
            $dd[''] = '';
            if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
                $dd[$row->npm] = $row->npm;
                }
            }
            return $dd;
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
            $result = $this->db->get('kriteria4');
            
            $dd3[''] = '';
            if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
                $dd3[$row->nama_kriteria] = $row->nama_kriteria;
                }
            }
            return $dd3;
        }
        /*
        function bayes2(){
            for ($k=1;$k<=4;$k++){
                
            }
        }*/
        
        
        //select kriteria 1 berdasarkan dosen
        function bayes($k1,$k2,$k3,$k4,$id_users,$nama,$judul,$npm,$nomor,$email,$kelas,$periode){
            //menghitung jumlah data kriteria 1 dibandingkan dengan setiap dosen
            $query = "select count(*) as k1 from tb_dataset where k_judul='$k1' and dosen='3'";
            $k1hasil_1 = $this->db->query($query)->row();
            $query = "select count(*) as k1 from tb_dataset where k_judul='$k1' and dosen='4'";
            $k1hasil_2 = $this->db->query($query)->row();
            $query = "select count(*) as k1 from tb_dataset where k_judul='$k1' and dosen='5'";
            $k1hasil_3 = $this->db->query($query)->row();
            $query = "select count(*) as k1 from tb_dataset where k_judul='$k1' and dosen='6'";
            $k1hasil_4 = $this->db->query($query)->row();
            $query = "select count(*) as k1 from tb_dataset where k_judul='$k1' and dosen='7'";
            $k1hasil_5 = $this->db->query($query)->row();
            $query = "select count(*) as k1 from tb_dataset where k_judul='$k1' and dosen='8'";
            $k1hasil_6 = $this->db->query($query)->row();
            $query = "select count(*) as k1 from tb_dataset where k_judul='$k1' and dosen='9'";
            $k1hasil_7 = $this->db->query($query)->row();
            $query = "select count(*) as k1 from tb_dataset where k_judul='$k1' and dosen='10'";
            $k1hasil_8 = $this->db->query($query)->row();
            $query = "select count(*) as k1 from tb_dataset where k_judul='$k1' and dosen='11'";
            $k1hasil_9 = $this->db->query($query)->row();
            $query = "select count(*) as k1 from tb_dataset where k_judul='$k1' and dosen='12'";
            $k1hasil_10 = $this->db->query($query)->row();
            $query = "select count(*) as k1 from tb_dataset where k_judul='$k1' and dosen='13'";
            $k1hasil_11 = $this->db->query($query)->row();
            $query = "select count(*) as k1 from tb_dataset where k_judul='$k1' and dosen='14'";
            $k1hasil_12 = $this->db->query($query)->row();
            $query = "select count(*) as k1 from tb_dataset where k_judul='$k1' and dosen='15'";
            $k1hasil_13 = $this->db->query($query)->row();
            $query = "select count(*) as k1 from tb_dataset where k_judul='$k1' and dosen='16'";
            $k1hasil_14 = $this->db->query($query)->row();
            
            //menghitung jumlah data kriteria 2 dibandingkan dengan setiap dosen
            $query = "select count(*) as k2 from tb_dataset where k_program='$k2' and dosen='3'";
            $k2hasil_1 = $this->db->query($query)->row();
            $query = "select count(*) as k2 from tb_dataset where k_program='$k2' and dosen='4'";
            $k2hasil_2 = $this->db->query($query)->row();
            $query = "select count(*) as k2 from tb_dataset where k_program='$k2' and dosen='5'";
            $k2hasil_3 = $this->db->query($query)->row();
            $query = "select count(*) as k2 from tb_dataset where k_program='$k2' and dosen='6'";
            $k2hasil_4 = $this->db->query($query)->row();
            $query = "select count(*) as k2 from tb_dataset where k_program='$k2' and dosen='7'";
            $k2hasil_5 = $this->db->query($query)->row();
            $query = "select count(*) as k2 from tb_dataset where k_program='$k2' and dosen='8'";
            $k2hasil_6 = $this->db->query($query)->row();
            $query = "select count(*) as k2 from tb_dataset where k_program='$k2' and dosen='9'";
            $k2hasil_7 = $this->db->query($query)->row();
            $query = "select count(*) as k2 from tb_dataset where k_program='$k2' and dosen='10'";
            $k2hasil_8 = $this->db->query($query)->row();
            $query = "select count(*) as k2 from tb_dataset where k_program='$k2' and dosen='11'";
            $k2hasil_9 = $this->db->query($query)->row();
            $query = "select count(*) as k2 from tb_dataset where k_program='$k2' and dosen='12'";
            $k2hasil_10 = $this->db->query($query)->row();
            $query = "select count(*) as k2 from tb_dataset where k_program='$k2' and dosen='13'";
            $k2hasil_11 = $this->db->query($query)->row();
            $query = "select count(*) as k2 from tb_dataset where k_program='$k2' and dosen='14'";
            $k2hasil_12 = $this->db->query($query)->row();
            $query = "select count(*) as k2 from tb_dataset where k_program='$k2' and dosen='15'";
            $k2hasil_13 = $this->db->query($query)->row();
            $query = "select count(*) as k2 from tb_dataset where k_program='$k2' and dosen='16'";
            $k2hasil_14 = $this->db->query($query)->row();
            
            //menghitung jumlah data kriteria 3 dibandingkan dengan setiap dosen
            $query = "select count(*) as k3 from tb_dataset where metode='$k3' and dosen='3'";
            $k3hasil_1 = $this->db->query($query)->row();
            $query = "select count(*) as k3 from tb_dataset where metode='$k3' and dosen='4'";
            $k3hasil_2 = $this->db->query($query)->row();
            $query = "select count(*) as k3 from tb_dataset where metode='$k3' and dosen='5'";
            $k3hasil_3 = $this->db->query($query)->row();
            $query = "select count(*) as k3 from tb_dataset where metode='$k3' and dosen='6'";
            $k3hasil_4 = $this->db->query($query)->row();
            $query = "select count(*) as k3 from tb_dataset where metode='$k3' and dosen='7'";
            $k3hasil_5 = $this->db->query($query)->row();
            $query = "select count(*) as k3 from tb_dataset where metode='$k3' and dosen='8'";
            $k3hasil_6 = $this->db->query($query)->row();
            $query = "select count(*) as k3 from tb_dataset where metode='$k3' and dosen='9'";
            $k3hasil_7 = $this->db->query($query)->row();
            $query = "select count(*) as k3 from tb_dataset where metode='$k3' and dosen='10'";
            $k3hasil_8 = $this->db->query($query)->row();
            $query = "select count(*) as k3 from tb_dataset where metode='$k3' and dosen='11'";
            $k3hasil_9 = $this->db->query($query)->row();
            $query = "select count(*) as k3 from tb_dataset where metode='$k3' and dosen='12'";
            $k3hasil_10 = $this->db->query($query)->row();
            $query = "select count(*) as k3 from tb_dataset where metode='$k3' and dosen='13'";
            $k3hasil_11 = $this->db->query($query)->row();
            $query = "select count(*) as k3 from tb_dataset where metode='$k3' and dosen='14'";
            $k3hasil_12 = $this->db->query($query)->row();
            $query = "select count(*) as k3 from tb_dataset where metode='$k3' and dosen='15'";
            $k3hasil_13 = $this->db->query($query)->row();
            $query = "select count(*) as k3 from tb_dataset where metode='$k3' and dosen='16'";
            $k3hasil_14 = $this->db->query($query)->row();
            
            //menghitung jumlah data kriteria 4 dibandingkan dengan setiap dosen
            $query = "select count(*) as k4 from tb_dataset where pendaftar='$k4' and dosen='3'";
            $k4hasil_1 = $this->db->query($query)->row();
            $query = "select count(*) as k4 from tb_dataset where pendaftar='$k4' and dosen='4'";
            $k4hasil_2 = $this->db->query($query)->row();
            $query = "select count(*) as k4 from tb_dataset where pendaftar='$k4' and dosen='5'";
            $k4hasil_3 = $this->db->query($query)->row();
            $query = "select count(*) as k4 from tb_dataset where pendaftar='$k4' and dosen='6'";
            $k4hasil_4 = $this->db->query($query)->row();
            $query = "select count(*) as k4 from tb_dataset where pendaftar='$k4' and dosen='7'";
            $k4hasil_5 = $this->db->query($query)->row();
            $query = "select count(*) as k4 from tb_dataset where pendaftar='$k4' and dosen='8'";
            $k4hasil_6 = $this->db->query($query)->row();
            $query = "select count(*) as k4 from tb_dataset where pendaftar='$k4' and dosen='9'";
            $k4hasil_7 = $this->db->query($query)->row();
            $query = "select count(*) as k4 from tb_dataset where pendaftar='$k4' and dosen='10'";
            $k4hasil_8 = $this->db->query($query)->row();
            $query = "select count(*) as k4 from tb_dataset where pendaftar='$k4' and dosen='11'";
            $k4hasil_9 = $this->db->query($query)->row();
            $query = "select count(*) as k4 from tb_dataset where pendaftar='$k4' and dosen='12'";
            $k4hasil_10 = $this->db->query($query)->row();
            $query = "select count(*) as k4 from tb_dataset where pendaftar='$k4' and dosen='13'";
            $k4hasil_11 = $this->db->query($query)->row();
            $query = "select count(*) as k4 from tb_dataset where pendaftar='$k4' and dosen='14'";
            $k4hasil_12 = $this->db->query($query)->row();
            $query = "select count(*) as k4 from tb_dataset where pendaftar='$k4' and dosen='15'";
            $k4hasil_13 = $this->db->query($query)->row();
            $query = "select count(*) as k4 from tb_dataset where pendaftar='$k4' and dosen='16'";
            $k4hasil_14 = $this->db->query($query)->row();
            
            //menghitung jumlah data setiap dosen
            $query = "select count(*) as dosen from tb_dataset where dosen='3'";
            $dosen_1 = $this->db->query($query)->row();
            $query = "select count(*) as dosen from tb_dataset where dosen='4'";
            $dosen_2 = $this->db->query($query)->row();
            $query = "select count(*) as dosen from tb_dataset where dosen='5'";
            $dosen_3 = $this->db->query($query)->row();
            $query = "select count(*) as dosen from tb_dataset where dosen='6'";
            $dosen_4 = $this->db->query($query)->row();
            $query = "select count(*) as dosen from tb_dataset where dosen='7'";
            $dosen_5 = $this->db->query($query)->row();
            $query = "select count(*) as dosen from tb_dataset where dosen='8'";
            $dosen_6 = $this->db->query($query)->row();
            $query = "select count(*) as dosen from tb_dataset where dosen='9'";
            $dosen_7 = $this->db->query($query)->row();
            $query = "select count(*) as dosen from tb_dataset where dosen='10'";
            $dosen_8 = $this->db->query($query)->row();
            $query = "select count(*) as dosen from tb_dataset where dosen='11'";
            $dosen_9 = $this->db->query($query)->row();
            $query = "select count(*) as dosen from tb_dataset where dosen='12'";
            $dosen_10 = $this->db->query($query)->row();
            $query = "select count(*) as dosen from tb_dataset where dosen='13'";
            $dosen_11 = $this->db->query($query)->row();
            $query = "select count(*) as dosen from tb_dataset where dosen='14'";
            $dosen_12 = $this->db->query($query)->row();
            $query = "select count(*) as dosen from tb_dataset where dosen='15'";
            $dosen_13 = $this->db->query($query)->row();
            $query = "select count(*) as dosen from tb_dataset where dosen='16'";
            $dosen_14 = $this->db->query($query)->row();
            
            //select total data
            $query = "select count(dosen) as total_data from tb_dataset";
            $toldat = $this->db->query($query)->row();
            $pembagi = intval($toldat->total_data);
            //jumlah data setiap kriteria dan dosen dibagi total data
            
            $e1h1 = intval($k1hasil_1->k1)/$pembagi;
            $e1h2 = intval($k1hasil_2->k1)/$pembagi;
            $e1h3 = intval($k1hasil_3->k1)/$pembagi;
            $e1h4 = intval($k1hasil_4->k1)/$pembagi;
            $e1h5 = intval($k1hasil_5->k1)/$pembagi;
            $e1h6 = intval($k1hasil_6->k1)/$pembagi;
            $e1h7 = intval($k1hasil_7->k1)/$pembagi;
            $e1h8 = intval($k1hasil_8->k1)/$pembagi;
            $e1h9 = intval($k1hasil_9->k1)/$pembagi;
            $e1h10 = intval($k1hasil_10->k1)/$pembagi;
            $e1h11 = intval($k1hasil_11->k1)/$pembagi;
            $e1h12 = intval($k1hasil_12->k1)/$pembagi;
            $e1h13 = intval($k1hasil_13->k1)/$pembagi;
            $e1h14 = intval($k1hasil_14->k1)/$pembagi;
            
            $e2h1 = intval($k2hasil_1->k2)/$pembagi;
            $e2h2 = intval($k2hasil_2->k2)/$pembagi;
            $e2h3 = intval($k2hasil_3->k2)/$pembagi;
            $e2h4 = intval($k2hasil_4->k2)/$pembagi;
            $e2h5 = intval($k2hasil_5->k2)/$pembagi;
            $e2h6 = intval($k2hasil_6->k2)/$pembagi;
            $e2h7 = intval($k2hasil_7->k2)/$pembagi;
            $e2h8 = intval($k2hasil_8->k2)/$pembagi;
            $e2h9 = intval($k2hasil_9->k2)/$pembagi;
            $e2h10 = intval($k2hasil_10->k2)/$pembagi;
            $e2h11 = intval($k2hasil_11->k2)/$pembagi;
            $e2h12 = intval($k2hasil_12->k2)/$pembagi;
            $e2h13 = intval($k2hasil_13->k2)/$pembagi;
            $e2h14 = intval($k2hasil_14->k2)/$pembagi;
            
            $e3h1 = intval($k3hasil_1->k3)/$pembagi;
            $e3h2 = intval($k3hasil_2->k3)/$pembagi;
            $e3h3 = intval($k3hasil_3->k3)/$pembagi;
            $e3h4 = intval($k3hasil_4->k3)/$pembagi;
            $e3h5 = intval($k3hasil_5->k3)/$pembagi;
            $e3h6 = intval($k3hasil_6->k3)/$pembagi;
            $e3h7 = intval($k3hasil_7->k3)/$pembagi;
            $e3h8 = intval($k3hasil_8->k3)/$pembagi;
            $e3h9 = intval($k3hasil_9->k3)/$pembagi;
            $e3h10 = intval($k3hasil_10->k3)/$pembagi;
            $e3h11 = intval($k3hasil_11->k3)/$pembagi;
            $e3h12 = intval($k3hasil_12->k3)/$pembagi;
            $e3h13 = intval($k3hasil_13->k3)/$pembagi;
            $e3h14 = intval($k3hasil_14->k3)/$pembagi;
            
            $e4h1 = intval($k4hasil_1->k4)/$pembagi;
            $e4h2 = intval($k4hasil_2->k4)/$pembagi;
            $e4h3 = intval($k4hasil_3->k4)/$pembagi;
            $e4h4 = intval($k4hasil_4->k4)/$pembagi;
            $e4h5 = intval($k4hasil_5->k4)/$pembagi;
            $e4h6 = intval($k4hasil_6->k4)/$pembagi;
            $e4h7 = intval($k4hasil_7->k4)/$pembagi;
            $e4h8 = intval($k4hasil_8->k4)/$pembagi;
            $e4h9 = intval($k4hasil_9->k4)/$pembagi;
            $e4h10 = intval($k4hasil_10->k4)/$pembagi;
            $e4h11 = intval($k4hasil_11->k4)/$pembagi;
            $e4h12 = intval($k4hasil_12->k4)/$pembagi;
            $e4h13 = intval($k4hasil_13->k4)/$pembagi;
            $e4h14 = intval($k4hasil_14->k4)/$pembagi;
            
            $h1 = intval($dosen_1->dosen)/$pembagi;
            $h2 = intval($dosen_2->dosen)/$pembagi;
            $h3 = intval($dosen_3->dosen)/$pembagi;
            $h4 = intval($dosen_4->dosen)/$pembagi;
            $h5 = intval($dosen_5->dosen)/$pembagi;
            $h6 = intval($dosen_6->dosen)/$pembagi;
            $h7 = intval($dosen_7->dosen)/$pembagi;
            $h8 = intval($dosen_8->dosen)/$pembagi;
            $h9 = intval($dosen_9->dosen)/$pembagi;
            $h10 =intval( $dosen_10->dosen)/$pembagi;
            $h11 =intval( $dosen_11->dosen)/$pembagi;
            $h12 =intval( $dosen_12->dosen)/$pembagi;
            $h13 =intval( $dosen_13->dosen)/$pembagi;
            $h14 =intval( $dosen_14->dosen)/$pembagi;
            
            if($e1h1==0){
                $e1h1=1;
            }
            if($e1h2==0){
                $e1h2=1;
            }
            if($e1h3==0){
                $e1h3=1;
            }
            if($e1h4==0){
                $e1h4=1;
            }
            if($e1h5==0){
                $e1h5=1;
            }
            if($e1h6==0){
                $e1h6=1;
            }
            if($e1h7==0){
                $e1h7=1;
            }
            if($e1h8==0){
                $e1h8=1;
            }
            if($e1h9==0){
                $e1h9=1;
            }
            if($e1h10==0){
                $e1h10=1;
            }
            if($e1h11==0){
                $e1h11=1;
            }
            if($e1h12==0){
                $e1h12=1;
            }
            if($e1h13==0){
                $e1h13=1;
            }
            if($e1h14==0){
                $e1h14=1;
            }
            
            if($e2h1==0){
                $e2h1=1;
            }
            if($e2h2==0){
                $e2h2=1;
            }
            if($e2h3==0){
                $e2h3=1;
            }
            if($e2h4==0){
                $e2h4=1;
            }
            if($e2h5==0){
                $e2h5=1;
            }
            if($e2h6==0){
                $e2h6=1;
            }
            if($e2h7==0){
                $e2h7=1;
            }
            if($e2h8==0){
                $e2h8=1;
            }
            if($e2h9==0){
                $e2h9=1;
            }
            if($e2h10==0){
                $e2h10=1;
            }
            if($e2h11==0){
                $e2h11=1;
            }
            if($e2h12==0){
                $e2h12=1;
            }
            if($e2h13==0){
                $e2h13=1;
            }
            if($e2h14==0){
                $e2h14=1;
            }
            
            if($e3h1==0){
                $e3h1=1;
            }
            if($e3h2==0){
                $e3h2=1;
            }
            if($e3h3==0){
                $e3h3=1;
            }
            if($e3h4==0){
                $e3h4=1;
            }
            if($e3h5==0){
                $e3h5=1;
            }
            if($e3h6==0){
                $e3h6=1;
            }
            if($e3h7==0){
                $e3h7=1;
            }
            if($e3h8==0){
                $e3h8=1;
            }
            if($e3h9==0){
                $e3h9=1;
            }
            if($e3h10==0){
                $e3h10=1;
            }
            if($e3h11==0){
                $e3h11=1;
            }
            if($e3h12==0){
                $e3h12=1;
            }
            if($e3h13==0){
                $e3h13=1;
            }
            if($e3h14==0){
                $e3h14=1;
            }
            
            if($e4h1==0){
                $e4h1=1;
            }
            if($e4h2==0){
                $e4h2=1;
            }
            if($e4h3==0){
                $e4h3=1;
            }
            if($e4h4==0){
                $e4h4=1;
            }
            if($e4h5==0){
                $e4h5=1;
            }
            if($e4h6==0){
                $e4h6=1;
            }
            if($e4h7==0){
                $e4h7=1;
            }
            if($e4h8==0){
                $e4h8=1;
            }
            if($e4h9==0){
                $e4h9=1;
            }
            if($e4h10==0){
                $e4h10=1;
            }
            if($e4h11==0){
                $e4h11=1;
            }
            if($e4h12==0){
                $e4h12=1;
            }
            if($e4h13==0){
                $e4h13=1;
            }
            if($e4h14==0){
                $e4h14=1;
            }
            
            $hn1 = $e1h1*$e2h1*$e3h1*$e4h1*$h1;
            $hn2 = $e1h2*$e2h2*$e3h2*$e4h2*$h2;
            $hn3 = $e1h3*$e2h3*$e3h3*$e4h3*$h3;
            $hn4 = $e1h4*$e2h4*$e3h4*$e4h4*$h4;
            $hn5 = $e1h5*$e2h5*$e3h5*$e4h5*$h5;
            $hn6 = $e1h6*$e2h6*$e3h6*$e4h6*$h6;
            $hn7 = $e1h7*$e2h7*$e3h7*$e4h7*$h7;
            $hn8 = $e1h8*$e2h8*$e3h8*$e4h8*$h8;
            $hn9 = $e1h9*$e2h9*$e3h9*$e4h9*$h9;
            $hn10 = $e1h10*$e2h10*$e3h10*$e4h10*$h10;
            $hn11 = $e1h11*$e2h11*$e3h11*$e4h11*$h11;
            $hn12 = $e1h12*$e2h12*$e3h12*$e4h12*$h12;
            $hn13 = $e1h13*$e2h13*$e3h13*$e4h13*$h13;
            $hn14 = $e1h14*$e2h14*$e3h14*$e4h14*$h14;
            
            $akhir1 = $hn1/($hn1+$hn2+$hn3+$hn4+$hn5+$hn6+$hn7+$hn8+$hn9+$hn10+$hn11+$hn12+$hn13+$hn14);
            $akhir2 = $hn2/($hn1+$hn2+$hn3+$hn4+$hn5+$hn6+$hn7+$hn8+$hn9+$hn10+$hn11+$hn12+$hn13+$hn14);
            $akhir3 = $hn3/($hn1+$hn2+$hn3+$hn4+$hn5+$hn6+$hn7+$hn8+$hn9+$hn10+$hn11+$hn12+$hn13+$hn14);
            $akhir4 = $hn4/($hn1+$hn2+$hn3+$hn4+$hn5+$hn6+$hn7+$hn8+$hn9+$hn10+$hn11+$hn12+$hn13+$hn14);
            $akhir5 = $hn5/($hn1+$hn2+$hn3+$hn4+$hn5+$hn6+$hn7+$hn8+$hn9+$hn10+$hn11+$hn12+$hn13+$hn14);
            $akhir6 = $hn6/($hn1+$hn2+$hn3+$hn4+$hn5+$hn6+$hn7+$hn8+$hn9+$hn10+$hn11+$hn12+$hn13+$hn14);
            $akhir7 = $hn7/($hn1+$hn2+$hn3+$hn4+$hn5+$hn6+$hn7+$hn8+$hn9+$hn10+$hn11+$hn12+$hn13+$hn14);
            $akhir8 = $hn8/($hn1+$hn2+$hn3+$hn4+$hn5+$hn6+$hn7+$hn8+$hn9+$hn10+$hn11+$hn12+$hn13+$hn14);
            $akhir9 = $hn9/($hn1+$hn2+$hn3+$hn4+$hn5+$hn6+$hn7+$hn8+$hn9+$hn10+$hn11+$hn12+$hn13+$hn14);
            $akhir10 = $hn10/($hn1+$hn2+$hn3+$hn4+$hn5+$hn6+$hn7+$hn8+$hn9+$hn10+$hn11+$hn12+$hn13+$hn14);
            $akhir11 = $hn11/($hn1+$hn2+$hn3+$hn4+$hn5+$hn6+$hn7+$hn8+$hn9+$hn10+$hn11+$hn12+$hn13+$hn14);
            $akhir12 = $hn12/($hn1+$hn2+$hn3+$hn4+$hn5+$hn6+$hn7+$hn8+$hn9+$hn10+$hn11+$hn12+$hn13+$hn14);
            $akhir13 = $hn13/($hn1+$hn2+$hn3+$hn4+$hn5+$hn6+$hn7+$hn8+$hn9+$hn10+$hn11+$hn12+$hn13+$hn14);
            $akhir14 = $hn14/($hn1+$hn2+$hn3+$hn4+$hn5+$hn6+$hn7+$hn8+$hn9+$hn10+$hn11+$hn12+$hn13+$hn14);
            
            if($akhir1>=$akhir2 && $akhir1>=$akhir3 && $akhir1>=$akhir4 && $akhir1>=$akhir5 && $akhir1>=$akhir6 && $akhir1>=$akhir7 && $akhir1>=$akhir8 && $akhir1>=$akhir9 && $akhir1>=$akhir10 && $akhir1>=$akhir11 && $akhir1>=$akhir12 && $akhir1>=$akhir13 && $akhir1>=$akhir14){
                $query = "select * from pendaftaran where id_user='$id_users'";
                $hasil = $this->db->query($query);
                $nama_dosen = "3";
                if($hasil->num_rows()>0){
                    $query = "UPDATE `pendaftaran` SET `npm`='$npm',`nama`='$nama',`kelas`='$kelas',`email`='$email',`no_hp`='$nomor',`k_judul`='$k1',`k_program`='$k2',`metode`='$k3',`pendaftar`='$k4',`judul`='$judul',`periode`='$periode',`nama_dosen`='$nama_dosen',`status`='N' WHERE id_user='$id_users';";
                    $final = $this->db->query($query);
                    return $final;
                }else{
                    $query = "INSERT INTO `pendaftaran`(`id_user`, `npm`, `nama`, `kelas`, `email`, `no_hp`, `k_judul`, `k_program`, `metode`, `pendaftar`, `judul`, `periode`, `nama_dosen`, `status`) VALUES ('$id_users','$npm','$nama','$kelas','$email','$nomor','$k1','$k2','$k3','$k4','$judul','$periode','$nama_dosen','N');";
                    $final = $this->db->query($query);
                    return $final;  
                }
            }elseif($akhir2>=$akhir1 && $akhir2>=$akhir3 && $akhir2>=$akhir4 && $akhir2>=$akhir5 && $akhir2>=$akhir6 && $akhir2>=$akhir7 && $akhir2>=$akhir8 && $akhir2>=$akhir9 && $akhir2>=$akhir10 && $akhir2>=$akhir11 && $akhir2>=$akhir12 && $akhir2>=$akhir13 && $akhir2>=$akhir14){
                $query = "select * from pendaftaran where id_user='$id_users'";
                $hasil = $this->db->query($query);
                $nama_dosen = "4";
                if($hasil->num_rows()>0){
                    $query = "UPDATE `pendaftaran` SET `npm`='$npm',`nama`='$nama',`kelas`='$kelas',`email`='$email',`no_hp`='$nomor',`k_judul`='$k1',`k_program`='$k2',`metode`='$k3',`pendaftar`='$k4',`judul`='$judul',`periode`='$periode',`nama_dosen`='$nama_dosen',`status`='N' WHERE id_user='$id_users';";
                    $final = $this->db->query($query);
                    return $final;
                }else{
                    $query = "INSERT INTO `pendaftaran`(`id_user`, `npm`, `nama`, `kelas`, `email`, `no_hp`, `k_judul`, `k_program`, `metode`, `pendaftar`, `judul`, `periode`, `nama_dosen`, `status`) VALUES ('$id_users','$npm','$nama','$kelas','$email','$nomor','$k1','$k2','$k3','$k4','$judul','$periode','$nama_dosen','N');";
                    $final = $this->db->query($query);
                    return $final;  
                }
            }elseif($akhir3>=$akhir1 && $akhir3>=$akhir2 && $akhir3>=$akhir4 && $akhir3>=$akhir5 && $akhir3>=$akhir6 && $akhir3>=$akhir7 && $akhir3>=$akhir8 && $akhir3>=$akhir9 && $akhir3>=$akhir10 && $akhir3>=$akhir11 && $akhir3>=$akhir12 && $akhir3>=$akhir13 && $akhir3>=$akhir14){
                $query = "select * from pendaftaran where id_user='$id_users'";
                $hasil = $this->db->query($query);
                $nama_dosen = "5";
                if($hasil->num_rows()>0){
                    $query = "UPDATE `pendaftaran` SET `npm`='$npm',`nama`='$nama',`kelas`='$kelas',`email`='$email',`no_hp`='$nomor',`k_judul`='$k1',`k_program`='$k2',`metode`='$k3',`pendaftar`='$k4',`judul`='$judul',`periode`='$periode',`nama_dosen`='$nama_dosen',`status`='N' WHERE id_user='$id_users';";
                    $final = $this->db->query($query);
                    return $final;
                }else{
                    $query = "INSERT INTO `pendaftaran`(`id_user`, `npm`, `nama`, `kelas`, `email`, `no_hp`, `k_judul`, `k_program`, `metode`, `pendaftar`, `judul`, `periode`, `nama_dosen`, `status`) VALUES ('$id_users','$npm','$nama','$kelas','$email','$nomor','$k1','$k2','$k3','$k4','$judul','$periode','$nama_dosen','N');";
                    $final = $this->db->query($query);
                    return $final;  
                }
            }elseif($akhir4>=$akhir1 && $akhir4>=$akhir2 && $akhir4>=$akhir3 && $akhir4>=$akhir5 && $akhir4>=$akhir6 && $akhir4>=$akhir7 && $akhir4>=$akhir8 && $akhir4>=$akhir9 && $akhir4>=$akhir10 && $akhir4>=$akhir11 && $akhir4>=$akhir12 && $akhir4>=$akhir13 && $akhir4>=$akhir14){
                $query = "select * from pendaftaran where id_user='$id_users'";
                $hasil = $this->db->query($query);
                $nama_dosen = "6";
                if($hasil->num_rows()>0){
                    $query = "UPDATE `pendaftaran` SET `npm`='$npm',`nama`='$nama',`kelas`='$kelas',`email`='$email',`no_hp`='$nomor',`k_judul`='$k1',`k_program`='$k2',`metode`='$k3',`pendaftar`='$k4',`judul`='$judul',`periode`='$periode',`nama_dosen`='$nama_dosen',`status`='N' WHERE id_user='$id_users';";
                    $final = $this->db->query($query);
                    return $final;
                }else{
                    $query = "INSERT INTO `pendaftaran`(`id_user`, `npm`, `nama`, `kelas`, `email`, `no_hp`, `k_judul`, `k_program`, `metode`, `pendaftar`, `judul`, `periode`, `nama_dosen`, `status`) VALUES ('$id_users','$npm','$nama','$kelas','$email','$nomor','$k1','$k2','$k3','$k4','$judul','$periode','$nama_dosen','N');";
                    $final = $this->db->query($query);
                    return $final;  
                }
            }elseif($akhir5>=$akhir1 && $akhir5>=$akhir2 && $akhir5>=$akhir3 && $akhir5>=$akhir4 && $akhir5>=$akhir6 && $akhir5>=$akhir7 && $akhir5>=$akhir8 && $akhir5>=$akhir9 && $akhir5>=$akhir10 && $akhir5>=$akhir11 && $akhir5>=$akhir12 && $akhir5>=$akhir13 && $akhir5>=$akhir14){
                $query = "select * from pendaftaran where id_user='$id_users'";
                $hasil = $this->db->query($query);
                $nama_dosen = "7";
                if($hasil->num_rows()>0){
                    $query = "UPDATE `pendaftaran` SET `npm`='$npm',`nama`='$nama',`kelas`='$kelas',`email`='$email',`no_hp`='$nomor',`k_judul`='$k1',`k_program`='$k2',`metode`='$k3',`pendaftar`='$k4',`judul`='$judul',`periode`='$periode',`nama_dosen`='$nama_dosen',`status`='N' WHERE id_user='$id_users';";
                    $final = $this->db->query($query);
                    return $final;
                }else{
                    $query = "INSERT INTO `pendaftaran`(`id_user`, `npm`, `nama`, `kelas`, `email`, `no_hp`, `k_judul`, `k_program`, `metode`, `pendaftar`, `judul`, `periode`, `nama_dosen`, `status`) VALUES ('$id_users','$npm','$nama','$kelas','$email','$nomor','$k1','$k2','$k3','$k4','$judul','$periode','$nama_dosen','N');";
                    $final = $this->db->query($query);
                    return $final;  
                }
            }elseif($akhir6>=$akhir1 && $akhir6>=$akhir2 && $akhir6>=$akhir3 && $akhir6>=$akhir4 && $akhir6>=$akhir5 && $akhir6>=$akhir7 && $akhir6>=$akhir8 && $akhir6>=$akhir9 && $akhir6>=$akhir10 && $akhir6>=$akhir11 && $akhir6>=$akhir12 && $akhir6>=$akhir13 && $akhir6>=$akhir14){
                $query = "select * from pendaftaran where id_user='$id_users'";
                $hasil = $this->db->query($query);
                $nama_dosen = "8";
                if($hasil->num_rows()>0){
                    $query = "UPDATE `pendaftaran` SET `npm`='$npm',`nama`='$nama',`kelas`='$kelas',`email`='$email',`no_hp`='$nomor',`k_judul`='$k1',`k_program`='$k2',`metode`='$k3',`pendaftar`='$k4',`judul`='$judul',`periode`='$periode',`nama_dosen`='$nama_dosen',`status`='N' WHERE id_user='$id_users';";
                    $final = $this->db->query($query);
                    return $final;
                }else{
                    $query = "INSERT INTO `pendaftaran`(`id_user`, `npm`, `nama`, `kelas`, `email`, `no_hp`, `k_judul`, `k_program`, `metode`, `pendaftar`, `judul`, `periode`, `nama_dosen`, `status`) VALUES ('$id_users','$npm','$nama','$kelas','$email','$nomor','$k1','$k2','$k3','$k4','$judul','$periode','$nama_dosen','N');";
                    $final = $this->db->query($query);
                    return $final;  
                }
            }elseif($akhir7>=$akhir1 && $akhir7>=$akhir2 && $akhir7>=$akhir3 && $akhir7>=$akhir4 && $akhir7>=$akhir5 && $akhir7>=$akhir6 && $akhir7>=$akhir8 && $akhir7>=$akhir9 && $akhir7>=$akhir10 && $akhir7>=$akhir11 && $akhir7>=$akhir12 && $akhir7>=$akhir13 && $akhir7>=$akhir14){
                $query = "select * from pendaftaran where id_user='$id_users'";
                $hasil = $this->db->query($query);
                $nama_dosen = "9";
                if($hasil->num_rows()>0){
                    $query = "UPDATE `pendaftaran` SET `npm`='$npm',`nama`='$nama',`kelas`='$kelas',`email`='$email',`no_hp`='$nomor',`k_judul`='$k1',`k_program`='$k2',`metode`='$k3',`pendaftar`='$k4',`judul`='$judul',`periode`='$periode',`nama_dosen`='$nama_dosen',`status`='N' WHERE id_user='$id_users';";
                    $final = $this->db->query($query);
                    return $final;
                }else{
                    $query = "INSERT INTO `pendaftaran`(`id_user`, `npm`, `nama`, `kelas`, `email`, `no_hp`, `k_judul`, `k_program`, `metode`, `pendaftar`, `judul`, `periode`, `nama_dosen`, `status`) VALUES ('$id_users','$npm','$nama','$kelas','$email','$nomor','$k1','$k2','$k3','$k4','$judul','$periode','$nama_dosen','N');";
                    $final = $this->db->query($query);
                    return $final;  
                }
            }elseif($akhir8>=$akhir1 && $akhir8>=$akhir2 && $akhir8>=$akhir3 && $akhir8>=$akhir4 && $akhir8>=$akhir5 && $akhir8>=$akhir6 && $akhir8>=$akhir7 && $akhir8>=$akhir9 && $akhir8>=$akhir10 && $akhir8>=$akhir11 && $akhir8>=$akhir12 && $akhir8>=$akhir13 && $akhir8>=$akhir14){
                $query = "select * from pendaftaran where id_user='$id_users'";
                $hasil = $this->db->query($query);
                $nama_dosen = "10";
                if($hasil->num_rows()>0){
                    $query = "UPDATE `pendaftaran` SET `npm`='$npm',`nama`='$nama',`kelas`='$kelas',`email`='$email',`no_hp`='$nomor',`k_judul`='$k1',`k_program`='$k2',`metode`='$k3',`pendaftar`='$k4',`judul`='$judul',`periode`='$periode',`nama_dosen`='$nama_dosen',`status`='N' WHERE id_user='$id_users';";
                    $final = $this->db->query($query);
                    return $final;
                }else{
                    $query = "INSERT INTO `pendaftaran`(`id_user`, `npm`, `nama`, `kelas`, `email`, `no_hp`, `k_judul`, `k_program`, `metode`, `pendaftar`, `judul`, `periode`, `nama_dosen`, `status`) VALUES ('$id_users','$npm','$nama','$kelas','$email','$nomor','$k1','$k2','$k3','$k4','$judul','$periode','$nama_dosen','N');";
                    $final = $this->db->query($query);
                    return $final;  
                }
            }elseif($akhir9>=$akhir1 && $akhir9>=$akhir2 && $akhir9>=$akhir3 && $akhir9>=$akhir4 && $akhir9>=$akhir5 && $akhir9>=$akhir6 && $akhir9>=$akhir7 && $akhir9>=$akhir8 && $akhir9>=$akhir10 && $akhir9>=$akhir11 && $akhir9>=$akhir12 && $akhir9>=$akhir13 && $akhir9>=$akhir14){
                $query = "select * from pendaftaran where id_user='$id_users'";
                $hasil = $this->db->query($query);
                $nama_dosen = "11";
                if($hasil->num_rows()>0){
                    $query = "UPDATE `pendaftaran` SET `npm`='$npm',`nama`='$nama',`kelas`='$kelas',`email`='$email',`no_hp`='$nomor',`k_judul`='$k1',`k_program`='$k2',`metode`='$k3',`pendaftar`='$k4',`judul`='$judul',`periode`='$periode',`nama_dosen`='$nama_dosen',`status`='N' WHERE id_user='$id_users';";
                    $final = $this->db->query($query);
                    return $final;
                }else{
                    $query = "INSERT INTO `pendaftaran`(`id_user`, `npm`, `nama`, `kelas`, `email`, `no_hp`, `k_judul`, `k_program`, `metode`, `pendaftar`, `judul`, `periode`, `nama_dosen`, `status`) VALUES ('$id_users','$npm','$nama','$kelas','$email','$nomor','$k1','$k2','$k3','$k4','$judul','$periode','$nama_dosen','N');";
                    $final = $this->db->query($query);
                    return $final;  
                }
            }elseif($akhir10>=$akhir1 && $akhir10>=$akhir2 && $akhir10>=$akhir3 && $akhir10>=$akhir4 && $akhir10>=$akhir5 && $akhir10>=$akhir6 && $akhir10>=$akhir7 && $akhir10>=$akhir8 && $akhir10>=$akhir9 && $akhir10>=$akhir11 && $akhir10>=$akhir12 && $akhir10>=$akhir13 && $akhir10>=$akhir14){
                $query = "select * from pendaftaran where id_user='$id_users'";
                $hasil = $this->db->query($query);
                $nama_dosen = "12";
                if($hasil->num_rows()>0){
                    $query = "UPDATE `pendaftaran` SET `npm`='$npm',`nama`='$nama',`kelas`='$kelas',`email`='$email',`no_hp`='$nomor',`k_judul`='$k1',`k_program`='$k2',`metode`='$k3',`pendaftar`='$k4',`judul`='$judul',`periode`='$periode',`nama_dosen`='$nama_dosen',`status`='N' WHERE id_user='$id_users';";
                    $final = $this->db->query($query);
                    return $final;
                }else{
                    $query = "INSERT INTO `pendaftaran`(`id_user`, `npm`, `nama`, `kelas`, `email`, `no_hp`, `k_judul`, `k_program`, `metode`, `pendaftar`, `judul`, `periode`, `nama_dosen`, `status`) VALUES ('$id_users','$npm','$nama','$kelas','$email','$nomor','$k1','$k2','$k3','$k4','$judul','$periode','$nama_dosen','N');";
                    $final = $this->db->query($query);
                    return $final;  
                }
            }elseif($akhir11>=$akhir1 && $akhir11>=$akhir2 && $akhir11>=$akhir3 && $akhir11>=$akhir4 && $akhir11>=$akhir5 && $akhir11>=$akhir6 && $akhir11>=$akhir7 && $akhir11>=$akhir8 && $akhir11>=$akhir9 && $akhir11>=$akhir10 && $akhir11>=$akhir12 && $akhir11>=$akhir13 && $akhir11>=$akhir14){
                $query = "select * from pendaftaran where id_user='$id_users'";
                $hasil = $this->db->query($query);
                $nama_dosen = "13";
                if($hasil->num_rows()>0){
                    $query = "UPDATE `pendaftaran` SET `npm`='$npm',`nama`='$nama',`kelas`='$kelas',`email`='$email',`no_hp`='$nomor',`k_judul`='$k1',`k_program`='$k2',`metode`='$k3',`pendaftar`='$k4',`judul`='$judul',`periode`='$periode',`nama_dosen`='$nama_dosen',`status`='N' WHERE id_user='$id_users';";
                    $final = $this->db->query($query);
                    return $final;
                }else{
                    $query = "INSERT INTO `pendaftaran`(`id_user`, `npm`, `nama`, `kelas`, `email`, `no_hp`, `k_judul`, `k_program`, `metode`, `pendaftar`, `judul`, `periode`, `nama_dosen`, `status`) VALUES ('$id_users','$npm','$nama','$kelas','$email','$nomor','$k1','$k2','$k3','$k4','$judul','$periode','$nama_dosen','N');";
                    $final = $this->db->query($query);
                    return $final;  
                }
            }elseif($akhir12>=$akhir1 && $akhir12>=$akhir2 && $akhir12>=$akhir3 && $akhir12>=$akhir4 && $akhir12>=$akhir5 && $akhir12>=$akhir6 && $akhir12>=$akhir7 && $akhir12>=$akhir8 && $akhir12>=$akhir9 && $akhir12>=$akhir10 && $akhir12>=$akhir11 && $akhir12>=$akhir13 && $akhir12>=$akhir14){
                $query = "select * from pendaftaran where id_user='$id_users'";
                $hasil = $this->db->query($query);
                $nama_dosen = "14";
                if($hasil->num_rows()>0){
                    $query = "UPDATE `pendaftaran` SET `npm`='$npm',`nama`='$nama',`kelas`='$kelas',`email`='$email',`no_hp`='$nomor',`k_judul`='$k1',`k_program`='$k2',`metode`='$k3',`pendaftar`='$k4',`judul`='$judul',`periode`='$periode',`nama_dosen`='$nama_dosen',`status`='N' WHERE id_user='$id_users';";
                    $final = $this->db->query($query);
                    return $final;
                }else{
                    $query = "INSERT INTO `pendaftaran`(`id_user`, `npm`, `nama`, `kelas`, `email`, `no_hp`, `k_judul`, `k_program`, `metode`, `pendaftar`, `judul`, `periode`, `nama_dosen`, `status`) VALUES ('$id_users','$npm','$nama','$kelas','$email','$nomor','$k1','$k2','$k3','$k4','$judul','$periode','$nama_dosen','N');";
                    $final = $this->db->query($query);
                    return $final;  
                }
            }elseif($akhir13>=$akhir1 && $akhir13>=$akhir2 && $akhir13>=$akhir3 && $akhir13>=$akhir4 && $akhir13>=$akhir5 && $akhir13>=$akhir6 && $akhir13>=$akhir7 && $akhir13>=$akhir8 && $akhir13>=$akhir9 && $akhir13>=$akhir10 && $akhir13>=$akhir11 && $akhir13>=$akhir12 && $akhir13>=$akhir14){
                $query = "select * from pendaftaran where id_user='$id_users'";
                $hasil = $this->db->query($query);
                $nama_dosen = "15";
                if($hasil->num_rows()>0){
                    $query = "UPDATE `pendaftaran` SET `npm`='$npm',`nama`='$nama',`kelas`='$kelas',`email`='$email',`no_hp`='$nomor',`k_judul`='$k1',`k_program`='$k2',`metode`='$k3',`pendaftar`='$k4',`judul`='$judul',`periode`='$periode',`nama_dosen`='$nama_dosen',`status`='N' WHERE id_user='$id_users';";
                    $final = $this->db->query($query);
                    return $final;
                }else{
                    $query = "INSERT INTO `pendaftaran`(`id_user`, `npm`, `nama`, `kelas`, `email`, `no_hp`, `k_judul`, `k_program`, `metode`, `pendaftar`, `judul`, `periode`, `nama_dosen`, `status`) VALUES ('$id_users','$npm','$nama','$kelas','$email','$nomor','$k1','$k2','$k3','$k4','$judul','$periode','$nama_dosen','N');";
                    $final = $this->db->query($query);
                    return $final;
                }
            }elseif($akhir14>=$akhir1 && $akhir14>=$akhir2 && $akhir14>=$akhir3 && $akhir14>=$akhir4 && $akhir14>=$akhir5 && $akhir14>=$akhir6 && $akhir14>=$akhir7 && $akhir14>=$akhir8 && $akhir14>=$akhir9 && $akhir14>=$akhir10 && $akhir14>=$akhir11 && $akhir14>=$akhir12 && $akhir14>=$akhir13){
                $query = "select * from pendaftaran where id_user='$id_users'";
                $hasil = $this->db->query($query);
                $nama_dosen = "16";
                if($hasil->num_rows()>0){
                    $query = "UPDATE `pendaftaran` SET `npm`='$npm',`nama`='$nama',`kelas`='$kelas',`email`='$email',`no_hp`='$nomor',`k_judul`='$k1',`k_program`='$k2',`metode`='$k3',`pendaftar`='$k4',`judul`='$judul',`periode`='$periode',`nama_dosen`='$nama_dosen',`status`='N' WHERE id_user='$id_users';";
                    $final = $this->db->query($query);
                    return $final;
                }else{
                    $query = "INSERT INTO `pendaftaran`(`id_user`, `npm`, `nama`, `kelas`, `email`, `no_hp`, `k_judul`, `k_program`, `metode`, `pendaftar`, `judul`, `periode`, `nama_dosen`, `status`) VALUES ('$id_users','$npm','$nama','$kelas','$email','$nomor','$k1','$k2','$k3','$k4','$judul','$periode','$nama_dosen','N');";
                    $final = $this->db->query($query);
                    return $final;  
                }
            }
        }
        
        function levelusers(){
            $this->db->order_by('level','asc');
            $result = $this->db->get('level_users');
            
            $dd[''] = '';
            if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
                $dd[$row->level] = $row->level;
                }
            }
            return $dd;
        }
        
        function update_pembimbing($nama,$npm,$dosen){
            $query_1 = "select id_users  from app_users where nama='$dosen'";
            $id = $this->db->query($query_1)->row();
            $simpan = intval($id->id_users);
            $query="UPDATE `pendaftaran` SET `nama_dosen`='$simpan' WHERE `npm`='$npm'";
            $hasil= $this->db->query($query);
            return $hasil;
        }
        
        function pengumuman_dospem($i){
        $hasil = $this->db->query("SELECT pendaftaran.`judul`, pendaftaran.`status`, pendaftaran.`npm`, pendaftaran.`nama`, pendaftaran.`kelas`,
            pendaftaran.`no_hp`, pendaftaran.`periode`, app_users.`nama` as nama_dosen FROM pendaftaran
            INNER JOIN app_users ON pendaftaran.`nama_dosen`=app_users.`id_users`  where npm='$i'");
        return $hasil;
    }
    
        function biodata_dospem($id, $email, $alamat, $no_telp){
            $cari = $this->db->query("Select * from biodata_dosen where id_Dosen='$id'");
            if($cari->num_rows()>0){
                $query = "UPDATE `biodata_dosen` SET `Notlp_Dosen`='$no_telp',`Alamat_Dosen`='$alamat',`Email_Dosen`='$email' WHERE id_Dosen='$id'";
                $final = $this->db->query($query);
                return $final;
            }else{
                $query = "INSERT INTO `biodata_dosen`(`Id_Dosen`, `Notlp_Dosen`, `Alamat_Dosen`, `Email_Dosen`) VALUES ('$id','$no_telp','$alamat','$email')";
                $final = $this->db->query($query);
                return $final;
            }
        }
        
        function view_biodata($id){
            $hasil = $this->db->query("SELECT biodata_dosen.`Notlp_Dosen`, biodata_dosen.`Alamat_Dosen` , biodata_dosen.`Email_Dosen` FROM biodata_dosen
            INNER JOIN pendaftaran ON pendaftaran.`nama_dosen`= biodata_dosen.`id_Dosen`  where id_user='$id'");
            return $hasil;
        }
        function view_biodata2($id){
            $hasil = $this->db->query("SELECT app_users.`username`  as  npm, app_users.`nama`, pendaftaran.`status` FROM pendaftaran
            INNER JOIN app_users ON pendaftaran.`nama_dosen`= app_users.`id_users`  where id_user='$id'");
            return $hasil;
        }
        
        function Testing($kode){
            $hasil = $this->db->query("UPDATE `pendaftaran` SET `status`='Y' WHERE periode='$kode'");
            return $hasil;
        }
        
        function periode(){
            $hasil = $this->db->query("SELECT `npm` as periode from periode_daftar");
            return $hasil;
        }
        
        function Tperiode($p){
            $hasil = $this->db->query("INSERT INTO `periode_daftar`(`npm`) VALUES ('$p')");
            return $hasil;
        }
        
        function deleted($dx){
            $hasil = $this->db->query("DELETE from `periode_daftar` where npm='$dx'");
            return $hasil;
        }
        
        function tdatasave($kri1,$kri2,$kri3,$kri4,$dosen){
            return $this->db->query("INSERT INTO `tb_dataset`(`k_judul`, `k_program`, `metode`, `pendaftar`, `dosen`) VALUES ('$kri1','$kri2','$kri3','$kri4','$dosen')");
        }
        
        function editjudul($id){
            $hasil = $this->db->query("select `judul` from pendaftaran where `id_user`='$id'");
            //$hasil  = strval($hasil);
            return $hasil;
        }
        
        function judulbaru($judul,$id){
            $simpan = $this->db->query("UPDATE `pendaftaran` SET `judul`='$judul' WHERE `id_user`='$id';");
        }
        
        function cekdataku($idku){
            $hasil = $this->db->query("select * from `pendaftaran` where `id_user`='$idku'");
            return $hasil;
        }
        
        function cekdataku2($idku){
            $hasil = $this->db->query("select pendaftaran.judul, app_users.username,pendaftaran.npm,pendaftaran.nama, app_users.nama as dosen from `pendaftaran` inner join `app_users` on `pendaftaran`.nama_dosen=`app_users`.id_users where `id_user`='$idku'");
            return $hasil;
        }
        
        function rekap($id){
            $hasil = $this->db->query("SELECT app_users.nama, app_users.username, count(*) as jumlah FROM `pendaftaran` INNER JOIN app_users ON pendaftaran.nama_dosen=app_users.id_users WHERE pendaftaran.nama_dosen='$id' ");
            return $hasil;
        }
}