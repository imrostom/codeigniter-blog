<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $admin_id = $this->session->userdata('admin_id');
        
        if($admin_id==false){
            redirect('Login/index');
        }
        
        
    }
    
    public function index() {
        $data = array();
        $data['maincontent'] = $this->load->view('admin/pages/dashboard','',true);
        $this->load->view('admin/master',$data);
    }
    
    
    public function logout(){
           $this->session->unset_userdata('admin_name');
           $this->session->unset_userdata('admin_id');
           $this->session->set_userdata('message','Admin Succesfully Logout..');
           redirect('Login/index');
    }

}
