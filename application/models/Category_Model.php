<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Category_Model extends CI_Model {

    public function save_category_info($data) {
        return $this->db->insert('tbl_category', $data);
    }

    public function get_all_category() {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $info = $this->db->get();
        return $info->result();
    }

    public function published_category_info($id) {
        $this->db->set('publication_status', 1);
        $this->db->where('category_id', $id);
        return $this->db->update('tbl_category');
    }

    public function unpublished_category_info($id) {
        $this->db->set('publication_status', 0);
        $this->db->where('category_id', $id);
        return $this->db->update('tbl_category');
    }

    public function delete_category_info($id) {
        $this->db->where('category_id', $id);
        return $this->db->delete('tbl_category');
    }
    
    public function edit_category_by_id($id){
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('category_id', $id);
        $info = $this->db->get();
        return $info->row();
    }
    
    public function update_category_info($data,$category_id){
        $this->db->where('category_id',$category_id);
        return $this->db->update('tbl_category',$data);
    }
    
    public function update_theme_option_info($data){
        return $this->db->update('tbl_options',$data);
    }

}
