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
    
    function profile()
    {
        if(isset($_POST['submit']))
        {
            $username=  $this->input->post('username');
            $password=  $this->input->post('password');
            $data    =  array('username'=>$username,'password'=>  md5($password));
            $this->app_model->update($username,$password);
            $data['title'] = "Profile";
            $data['message']="<div class='alert alert-success'>Data Berhasil Dirubah</div>";
            $this->template->load('template','profile',$data);
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
        
        
        if($this->uri->segment(3)=="delete_success")
            $data['message']="<div class='alert alert-success'>Data berhasil dihapus</div>";
        else if($this->uri->segment(3)=="add_success")
            $data['message']="<div class='alert alert-success'>Data Berhasil disimpan</div>";
        else
            $data['message']='';
            $this->template->load('template','pendaftaran',$data);
    }
    
    
}