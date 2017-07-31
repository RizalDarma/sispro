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
        $idku = $this->session->userdata['id_users'];
        $hasil = $this->app_model->cekdataku($idku);
        if($hasil->num_rows()>0){
            redirect ('Mahasiswa/pengumuman_1');
        }else{
        if(isset($_POST['submit']))
        {
            $id_users=  $this->session->userdata['id_users'];
            $nama= $this->session->userdata['nama'];
            $npm= $this->session->userdata['username'];
            $email=  $this->input->post('email');
            $nomor= $this->input->post('nomor');
            $k1= $this->input->post('nama_kriteria1');
            $k2= $this->input->post('nama_kriteria2');
            $k3= $this->input->post('nama_kriteria3');
            $k4= $this->input->post('nama_kriteria4');
            $judul= $this->input->post('judul');
            $kelas= $this->input->post('kelas');
            $periode= $this->input->post('periode');
            if($k1== '' && $k2== '' && $k3== '' && $k4 == ''){
                $this->load->model('app_model');
                $data = array('title'=>'Data Mahasiswa',
                'dd' => $this->app_model->kriteria1(),
                'nama_kriteria' => $this->input->post('nama_kriteria1') ? $this->input->post('nama_kriteria1') : '',
                'dd1' => $this->app_model->kriteria2(),
                'nama_kriteria2' => $this->input->post('nama_kriteria2') ? $this->input->post('nama_kriteria2') : '',
                'dd2' => $this->app_model->kriteria3(),
                'nama_kriteria3' => $this->input->post('nama_kriteria3') ? $this->input->post('nama_kriteria3') : '',
                'dd3' => $this->app_model->kriteria4(),
                'nama_kriteria4' => $this->input->post('nama_kriteria4') ? $this->input->post('nama_kriteria4') : '',);
                $this->template->load('template','data_mahasiswa_view',$data);
            }else{
            $this->app_model->bayes($k1,$k2,$k3,$k4,$id_users,$nama,$judul,$npm,$nomor,$email,$kelas,$periode);
            $data['title'] = "Pengumuman";
            $data['message']="<div class='alert alert-success'>Proses Pendaftaran Berhasil</div>";
            $this->template->load('template','pengumuman_1',$data);
            }
        }
        else{
            $this->load->model('app_model');
            $data = array('title'=>'Data Mahasiswa',
            'dd' => $this->app_model->kriteria1(),
            'nama_kriteria' => $this->input->post('nama_kriteria1') ? $this->input->post('nama_kriteria1') : '',
            'dd1' => $this->app_model->kriteria2(),
            'nama_kriteria2' => $this->input->post('nama_kriteria2') ? $this->input->post('nama_kriteria2') : '',
            'dd2' => $this->app_model->kriteria3(),
            'nama_kriteria3' => $this->input->post('nama_kriteria3') ? $this->input->post('nama_kriteria3') : '',
            'dd3' => $this->app_model->kriteria4(),
            'nama_kriteria4' => $this->input->post('nama_kriteria4') ? $this->input->post('nama_kriteria4') : '',);
            $this->template->load('template','data_mahasiswa_view',$data);
        }
        }
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
    
    public function pengumuman_1(){
        $data['title'] = "Pengumuman";
        $data['message']="<div class='alert alert-success'>Proses Pendaftaran Berhasil</div>";
        $this->template->load('template','pengumuman_1',$data);
    }
    
    
    function Hasil_pengumuman(){
        $id_users=  $this->session->userdata['username'];
        $data_konten	= $this->app_model->pengumuman_dospem($id_users)->result_array();
        $this->load->model('app_model');
       
        $data = array(
            'npm'=> $data_konten[0]['npm'],
            'nama'=> $data_konten[0]['nama'],
            'kelas'=>$data_konten[0]['kelas'],
            'no_hp'=>$data_konten[0]['no_hp'],
            'judulp'=>$data_konten[0]['judul'],
            'periode'=>$data_konten[0]['periode'],
            'nama_dosen'=>$data_konten[0]['nama_dosen'],
            'status'=>$data_konten[0]['status'],
        );
        if($data_konten[0]['status']=="N"){
            $data['message']="<div class='alert alert-danger'>HASIL PENGUMUMAN BELUM KELUAR</div>";
        }else{
            $data['message']="";
        }
        $data['title']="Pengumuman Pendaftaran";
        $this->template->load('template','pengumuman',$data);
    }
    
    function view_data(){
        $id = $this->session->userdata['id_users'];
        
        $data_konten = $this->app_model->view_biodata($id)->result_array();
        $data_konten2 = $this->app_model->view_biodata2($id)->result_array();
        $this->load->model('app_model');
        $data = array(
            'npm' => $data_konten2[0]['npm'],
            'nama' => $data_konten2[0]['nama'],
            'no_tlp' => $data_konten[0]['Notlp_Dosen'],
            'alamat' => $data_konten[0]['Alamat_Dosen'],
            'email' => $data_konten[0]['Email_Dosen'],
            'status'=> $data_konten2[0]['status'],
            'title' => 'Informasi Dosen Pembimbing'
        );
        if($data_konten2[0]['status']=='N')
            redirect ('Mahasiswa/Hasil_pengumuman');
        else
        $this->template->load('template','biodata',$data);
    }
    
    function edit_judul(){
        $id = $this->session->userdata['id_users'];
        $data_konten = $this->app_model->editjudul($id)->result_array();
        $this->load->model('app_model');
        $data = array(
            'judulp'=>  $data_konten[0]['judul'],
           );
        if(isset($_POST['submit'])){
            $judul = $this->input->post('judul');
            //echo $judul;
            //die;
            $this->app_model->judulbaru($judul,$id);
            redirect('Mahasiswa/Hasil_pengumuman');
        }  elseif(isset($_POST['submit1'])) {
           redirect ('Mahasiswa/Hasil_pengumuman'); 
        }  else {
           
            $this->template->load('template','editjudul',$data);
        }
    }
    
    function print_data(){
        $id = $this->session->userdata['id_users'];
        $data_konten = $this->app_model->cekdataku2($id)->result_array();
        $data = array(
            'judulp'=>  $data_konten[0]['judul'],
            'nama'=>  $data_konten[0]['nama'],
            'nim'=>  $data_konten[0]['npm'],
            'dospem'=>  $data_konten[0]['dosen'],
            'nidn'=>  $data_konten[0]['username'],
           );
        $this->load->view('mahasiswa/berita_acara',$data);
    }
}