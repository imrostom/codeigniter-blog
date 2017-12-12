<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Post_model extends CI_Model{
    public function get_published_category(){
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('publication_status',1);
        $info = $this->db->get();
        return $info->result();
    }
    
    public function save_post_info($data){
        return $this->db->insert('tbl_post', $data);
    }
    
    public function get_all_post_info(){
        $this->db->select('*,tbl_post.publication_status as pstatus');
        $this->db->from('tbl_post');
        $this->db->join('tbl_category','tbl_category.category_id=tbl_post.post_category');
        $this->db->join('tbl_admin','tbl_admin.admin_id=tbl_post.author_id');
        $info = $this->db->get();
        return $info->result();
    }
    
    public function unpublished_post_info($id){
        $this->db->set('publication_status', 0);
        $this->db->where('post_id', $id);
        return $this->db->update('tbl_post');
    }
    
    public function published_post_info($id){
        $this->db->set('publication_status',1);
        $this->db->where('post_id',$id);
        return $this->db->update('tbl_post');
    }
    
    public function deleted_post_info($id){
        $this->db->where('post_id', $id);
        return $this->db->delete('tbl_post');
    }
    
    public function get_post_by_id($id){
        $this->db->select('*,tbl_post.publication_status as pstatus');
        $this->db->from('tbl_post');
        $this->db->join('tbl_category','tbl_category.category_id=tbl_post.post_category');
        $this->db->where('post_id',$id);
        $info = $this->db->get();
        return $info->row();
    }
    
    public function update_post_info($data,$post_id){
        $this->db->where('post_id',$post_id);
        return $this->db->update('tbl_post',$data);
    }
}