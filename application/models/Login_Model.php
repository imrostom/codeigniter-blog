<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Login_Model extends CI_Model{
    public function admin_login_check_info($data){
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where($data);
        $info = $this->db->get();
        return $info->row();
    }
}