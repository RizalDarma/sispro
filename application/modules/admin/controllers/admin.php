<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->app_model->islogin();
        if ($this->session->userdata['level']<>'admin'){
            redirect('login');
        }
        $this->load->library(array('pagination'));
    }
    
    public function index(){
        $data = Array();
        $this->template->load('template','admin_dashboard',$data);
    }
    //Merubah Password
    function profile()
    {
        if(isset($_POST['submit']))
        {
            $id_users=  $this->session->userdata['id_users'];
            $password=  $this->input->post('password');
            if($password==NULL){
                redirect('admin/profile');
            }else{
            $this->app_model->update($id_users,$password);
            $data['title'] = "Profile";
            $data['message']="<div class='alert alert-success'>Data Berhasil Dirubah</div>";
            $this->template->load('template','profile',$data);
            }
        }
        else
        {
            $username = $this->session->userdata['username'];
            $data = array('title'=>'Profile',$username);
            $this->app_model->getByID($username);
            $data['message']="";
            $this->template->load('template','profile',$data);
        }
    }
    //Menampilkan data pendaftaran
    private $limit=20;
    function Pendaftaran($offset=0,$order_column='npm',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='npm';
        if(empty($order_type)) $order_type='asc';
        
        $data['anggota']=$this->app_model->daftar($this->limit,$offset,$order_column,$order_type)->result();
        $data['title']="Data Pendaftaran";
        
        $config['base_url']=site_url('admin/pendaftaran/');
        $config['total_rows']=$this->app_model->jumlah();
        $config['per_page']=$this->limit;
        $config['uri_segment']=3;
        $this->pagination->initialize($config);
        $data['pagination']=$this->pagination->create_links();
        $data['message']='';
        $this->template->load('template','pendaftaran',$data);
    }
    //Menampilkan Data Dosen
    function Datadosen($offset=0,$order_column='id_Dosen',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='id_Dosen';
        if(empty($order_type)) $order_type='asc';
        
        $data['anggota']=$this->app_model->datadosen($this->limit,$offset,$order_column,$order_type)->result();
        $data['title']="Data Dosen";
        
        $config['base_url']=site_url('admin/datadosen/');
        $config['total_rows']=$this->app_model->jumlah();
        $config['per_page']=$this->limit;
        $config['uri_segment']=3;
        $this->pagination->initialize($config);
        $data['pagination']=$this->pagination->create_links();
        $data['message']='';
        $this->template->load('template','datadosen',$data);
    }
    //Menampilkan Data Users
    function Users($offset=0,$order_column='id_users',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='id_users';
        if(empty($order_type)) $order_type='asc';
        
        $data['anggota']=$this->app_model->datausers($this->limit,$offset,$order_column,$order_type)->result();
        $data['title']="Data User";
        
        $config['base_url']=site_url('admin/Users/');
        $config['total_rows']=$this->app_model->jumlah();
        $config['per_page']=$this->limit;
        $config['uri_segment']=3;
        $this->pagination->initialize($config);
        $data['pagination']=$this->pagination->create_links();
        $data['message']="";
        $this->template->load('template','Users',$data);
    }
    //merubah data berdasarkan id users
    function ubahdata()
    {
        if(isset($_POST['submit']))
        {
            $id_users=  $this->input->post('id_users');
            $nama_users= $this->input->post('nama');
            $usernama= $this->input->post('usernama');
            $password=  $this->input->post('password');
            $level= $this->input->post('level');
            $this->app_model->updateuser($id_users,$nama_users,$usernama,$password,$level);
            $data['title'] = "Data User";
            $data['message']="<div class='alert alert-success'>Data Berhasil Rubah</div>";
            redirect('admin/Users');
        }
    }
    //seleksi data users berdasarkan id users
    function dataku($kode){
        $data_konten	= $this->app_model->getSlider($kode)->result_array();


		$data = array(
			'kode'		=> $data_konten[0]['id_users'],
			'nama'		=> $data_konten[0]['nama'],
			'usernama'	=> $data_konten[0]['username'],
			'level'		=> $data_konten[0]['level'],
                        'Periode'	=> $data_konten[0]['Periode']
		);
                $data['title'] = "Edit Data";
                $data['message']="";
                $this->template->load('template','editusers',$data);
    }
    
    
}