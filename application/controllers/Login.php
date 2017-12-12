<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $admin_id = $this->session->userdata('admin_id');
        
        if($admin_id==true){
            redirect('Admin/index');
        }
        
        
    }
    
    public function index(){
        $this->load->view('admin/pages/login');
    }
    
    public function admin_login_check(){
       $data = array();
       $data['admin_email'] = $this->input->post('admin_email');
       $data['admin_password'] = MD5($this->input->post('admin_password'));
       $result = $this->Login_Model->admin_login_check_info($data);
       
       if($result){
           $this->session->set_userdata('admin_name',$result->admin_name);
           $this->session->set_userdata('admin_id',$result->admin_id);
           redirect('Admin/index');
       }
       else{
           $this->session->set_userdata('message','Admin Email or Password Invalid');
           redirect('Login/index');
       }
    }
}