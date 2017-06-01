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
        $data['message']="";
        $this->template->load('template','pengumuman_1',$data);
    }
    
    
    function Hasil_pengumuman(){
        $id_users=  $this->session->userdata['username'];
        $data_konten	= $this->app_model->pengumuman_dospem($id_users)->result_array();
        $this->load->model('app_model');
        $data = array(
            'message'=>'',
            'npm'=> $data_konten[0]['npm'],
            'nama'=> $data_konten[0]['nama'],
            'kelas'=>$data_konten[0]['kelas'],
            'no_hp'=>$data_konten[0]['no_hp'],
            'periode'=>$data_konten[0]['periode'],
            'nama_dosen'=>$data_konten[0]['nama_dosen'],
        );
        $data['title']="Pengumuman Pendaftaran";
        $this->template->load('template','pengumuman',$data);
    }
}