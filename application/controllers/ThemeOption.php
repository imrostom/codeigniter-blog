<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class ThemeOption extends CI_Controller{
    
    public function add_option(){
        $data = array();
        $data['maincontent'] = $this->load->view('admin/pages/theme_option', '', true);
        $this->load->view('admin/master', $data);
    }
   public function update_option(){
       $data = array();
       $this->form_validation->set_rules('logo', 'Logo', 'trim|required');
       $this->form_validation->set_rules('copyright', 'Copyright', 'trim|required');
       $this->form_validation->set_rules('fb_link', 'Facebook URL', 'trim|required');
       $this->form_validation->set_rules('tw_link', 'Twitter Url', 'trim|required');
       $this->form_validation->set_rules('ln_link', 'Linked In Url', 'trim|required');
       $this->form_validation->set_rules('wid_ab_title', 'Widget About Title', 'trim|required');
       $this->form_validation->set_rules('wid_ab_desc', 'Widget About Description', 'trim|required');
       
       $data['logo'] = $this->input->post('logo');
       $data['copyright'] = $this->input->post('copyright');
       $data['fb_link'] = $this->input->post('fb_link');
       $data['tw_link'] = $this->input->post('tw_link');
       $data['ln_link'] = $this->input->post('ln_link');
       $data['wid_ab_title'] = $this->input->post('wid_ab_title');
       $data['wid_ab_desc'] = $this->input->post('wid_ab_desc');
       
       
       
       if($this->form_validation->run() == true){
           $result = $this->Category_Model->update_theme_option_info($data);
            if ($result) {
                $this->session->set_flashdata('message', 'Option Update Sucessfully');
                redirect('ThemeOption/add_option');
            } else {
                $this->session->set_flashdata('message', 'Option Update failr');
                redirect('ThemeOption/add_option');
            }
       }
       
       else{
           $this->session->set_flashdata('message', validation_errors());
                redirect('ThemeOption/add_option');
       }
   }
}