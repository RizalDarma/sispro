<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->app_model->islogin();
        if ($this->session->userdata['level']<>'dosen'){
            redirect('login');
        }
    }
    
    public function index(){
        $data = array('title'=>'Dosen');
        $this->template->load('template','dosen_dashboard',$data);
    }
    
    public function check_mahasiswa($offset=0,$order_column='nama_dosen',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='nama_dosen';
        if(empty($order_type)) $order_type='asc';
        //$limit=10;
        $dosen = $this->session->userdata['nama'];
        $kode = $this->session->userdata['id_users'];
        $this->load->model('app_model');
            $data = array(
            'title'=>'List Mahasiswa ',
            'anggota'=> $this->app_model->daftar_mahasiswa($kode)->result(),
            'dd1' => $this->app_model->pilih_periode(),
            'periode' => $this->input->post('periode') ? $this->input->post('periode') : ''
            );
            //$config['base_url']=site_url('admin/pendaftaran/');
            //$config['total_rows']=$this->app_model->jumlah();
            //$config['per_page']=$this->limit;
            //$config['uri_segment']=3;
            //$this->pagination->initialize($config);
            //$data['pagination']=$this->pagination->create_links();
            $data['message']='';
            $this->template->load('template','list_mahasiswa',$data);
    }
    
    public function data_dosen(){
        $no_tlp = $this->input->post('no_telp');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $id = $this->session->userdata['id_users'];
        if(isset ($_POST['submit'])){
            $this->app_model->biodata_dospem($id, $email, $alamat, $no_tlp);
            $data = array('title'=>'Isi Biodata', 'message'=>"<div class='alert alert-success'>Data Berhasil Dirubah</div>");
            $this->template->load('template','data_dosen',$data);
        }else{
        $dosen = $this->session->userdata['nama'];
        $data = array('title'=>'Isi Biodata', 'message'=>'');
        $this->template->load('template','data_dosen',$data);
        }
    }
    
    function profile()
    {
        if(isset($_POST['submit']))
        {
            $id_users=  $this->session->userdata['id_users'];
            $password=  $this->input->post('password');
            //$data    =  array('username'=>$username,'password'=>  md5($password));
            $this->app_model->update($id_users,$password);
            $data['title'] = "Profile";
            $data['message']="<div class='alert alert-success'>Data Berhasil Dirubah</div>";
            $this->template->load('template','profile',$data);
        }
        else
        {
            $username = $this->session->userdata['username'];
            //$password = $this->session->userdata['password'];
            //$data   =  array('username'=>$username,'password'=>  md5($password));
            $data = array('title'=>'Profile',$username);
            //$data = array('r'=>'$username');
            $this->app_model->getByID($username);
            $data['message']="";
            $this->template->load('template','profile',$data);
        }
    }
}