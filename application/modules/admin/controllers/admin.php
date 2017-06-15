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
    private $limit=10;
    function Pendaftaran($offset=0,$order_column='npm',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='npm';
        if(empty($order_type)) $order_type='asc';
        
        $kode =  $this->input->post('periode');
        
        if(isset ($_POST['submit'])){
            $this->load->model('app_model');
            $data = array(
            'title'=> 'Data Pendaftaran',
            'anggota'=> $this->app_model->daftar_($kode)->result(),
            'dd1' => $this->app_model->pilih_periode(),
            'periode' => $this->input->post('periode') ? $this->input->post('periode') : ''
            );
            $config['base_url']=site_url('admin/pendaftaran/');
            $config['total_rows']=$this->app_model->jumlah();
            $config['per_page']=$this->limit;
            $config['uri_segment']=3;
            $this->pagination->initialize($config);
            $data['pagination']=$this->pagination->create_links();
            $data['message']='';
            $this->template->load('template','pendaftaran',$data);
        }elseif(isset ($_POST['submit2'])){
            $this->load->model('app_model');
            $this->app_model->Testing($kode);
            $data = array(
            'title'=> 'Data Pendaftaran',
            'anggota'=> $this->app_model->daftar_($kode)->result(),
            'dd1' => $this->app_model->pilih_periode(),
            'periode' => $this->input->post('periode') ? $this->input->post('periode') : ''
            );
            $config['base_url']=site_url('admin/pendaftaran/');
            $config['total_rows']=$this->app_model->jumlah();
            $config['per_page']=$this->limit;
            $config['uri_segment']=3;
            $this->pagination->initialize($config);
            $data['pagination']=$this->pagination->create_links();
            $data['message']='';
            $this->template->load('template','pendaftaran',$data);
        }else{
            $this->load->model('app_model');
            $data = array(
            'title'=> 'Data Pendaftaran',
            'anggota'=> $this->app_model->daftar($this->limit,$offset,$order_column,$order_type)->result(),
            'dd1' => $this->app_model->pilih_periode(),
            'periode' => $this->input->post('periode') ? $this->input->post('periode') : ''
            );
            $config['base_url']=site_url('admin/pendaftaran/');
            $config['total_rows']=$this->app_model->jumlah();
            $config['per_page']=$this->limit;
            $config['uri_segment']=3;
            $this->pagination->initialize($config);
            $data['pagination']=$this->pagination->create_links();
            $data['message']='';
            $this->template->load('template','pendaftaran',$data);
        }
        //$data['title']="Data Pendaftaran";
        //if($order_column=="npm") $order_column='Tahun_Periode';
        
    }
    
    function Pendaftaran_(){
        if(isset($_POST['submit'])){
            $kode=  $this->input->post('periode');
            if($kode="ALL"){
                redirect ('Admin/Pendaftaran');
            }else{
                $data['anggota']=$this->app_model->daftar_($kode)->result();
                $data['title']="Data Pendaftaran";
                $this->template->load('template','Pendaftaran_',$data);   
            }
        }else{
            $this->load->model('app_model');
            $data = array(
                'dd' => $this->app_model->pilih_periode(),
                'periode' => $this->input->post('periode') ? $this->input->post('periode') : ''
                );
            $this->template->load('template','Pendaftaran_',$data);
        }
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
        $data_konten	= $this->app_model->getusers($kode)->result_array();


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
    
    function add_users(){
        if(isset($_POST['submit1'])){
            $nama   = $this->input->post('nama');
            $username  = $this->input->post('username');
            $password = $this->input->post('password');
            $periode  = $this->input->post('periode');
            $level =   $this->input->post('level');
            $this->app_model->add_users($nama,$username,$password,$periode,$level);
            redirect ('admin/Users');
        }
        elseif(isset($_POST['submit2'])){
            redirect ('admin/Users');
        }
    }
    function tambah_users(){
        if(isset($_POST['submit'])){
            $this->load->model('app_model');
            $data = array('title'=>'Add Users',
            'dd' => $this->app_model->levelusers(),
            'level' => $this->input->post('level') ? $this->input->post('level') : '',
            'dd1' => $this->app_model->pilih_periode(),
            'periode' => $this->input->post('periode') ? $this->input->post('periode') : ''
            );
            $this->template->load('template','tambah_users',$data);
        }
        else{
            $this->load->model('app_model');
            $data = array('title'=>'Add Users',
            'dd' => $this->app_model->levelusers(),
            'level' => $this->input->post('level') ? $this->input->post('level') : '',
            );
            $this->template->load('template','tambah_users',$data);
        }
    }
    
    function view_detail($kode) {
        $data_konten	= $this->app_model->caridata($kode)->result_array();
       
        $data = array(
            'nama'=>$data_konten[0]['nama'],
            'k_judul'=>$data_konten[0]['k_judul'],
            'k_program'=>$data_konten[0]['k_program'],
            'metode'=>$data_konten[0]['metode'],
            'pendaftar'=>$data_konten[0]['pendaftar'],
            'email'=>$data_konten[0]['email'],
            'judul'=>$data_konten[0]['judul']
        );
        $this->template->load('template','view_detail',$data);
    }
    
    function hapus_data($kode){
        $data_konten	= $this->app_model->hapus_pendaftar($kode);
        redirect ('Admin/Pendaftaran');
    }
    
    function hapus_user($kode){
        $data_konten	= $this->app_model->hapus_users($kode);
        $data['message']="<div class='alert alert-danger'>Data Berhasil Dihapus</div>"; 
    }
    
    //Menampilkan Data Users
    function Dataset($offset=0,$order_column='ID_data',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='ID_data';
        if(empty($order_type)) $order_type='asc';
        
        $data['anggota']=$this->app_model->datatraining($this->limit,$offset,$order_column,$order_type)->result();
        $data['title']="Data Training";
        
        $config['base_url']=site_url('admin/Dataset/');
        $config['total_rows']=$this->app_model->jumlah();
        $config['per_page']=$this->limit;
        $config['uri_segment']=3;
        $this->pagination->initialize($config);
        $data['pagination']=$this->pagination->create_links();
        $data['message']="";
        $this->template->load('template','Training',$data);
    }
    
    function edit_data($kode){
        
        $data_konten	= $this->app_model->caridata($kode)->result_array();
        $this->load->model('app_model');
        $data = array(
            'message'=>'',
            'title'=>'',
            'npm'=> $data_konten[0]['npm'],
            'nama'=> $data_konten[0]['nama'],
            'dd' => $this->app_model->pilih_dosen(),
            'dosen' => $this->input->post('dosen') ? $this->input->post('dosen') : '',
        );
        $this->template->load('template','edit_data',$data);
        }
        
        function ubah_pembimbing(){
        if(isset($_POST['submit'])){
         $npm = $this->input->post('npm');
         $nama = $this->input->post('nama');
         $dosen = $this->input->post('dosen');
         $this->app_model->update_pembimbing($nama,$npm,$dosen);
         redirect ('Admin/Pendaftaran');
        }
    }
    
    function setting(){
        $px = $this->input->post('periodex');
        if(isset ($_POST['submit'])){
            $this->app_model->Tperiode($px);
            $this->load->model('app_model');
            $data = array(
              'title'=>'',
              'periode'=> $this->app_model->periode()->result()
            );
            $this->template->load('template','setting',$data);
        }else{
            //$data_konten = $this->app_model->periode()->result_array();
            $this->load->model('app_model');
            $data = array(
              'title'=>'',
              'periode'=> $this->app_model->periode()->result()
            );
            $this->template->load('template','setting',$data);
        }
    }
    
    function deleted($dx){
        $this->app_model->deleted($dx);
        redirect ('Admin/setting');
    }
}