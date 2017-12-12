<?php

class Site_model extends CI_Model{
    public function get_all_category_info(){
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('publication_status',1);
        $info = $this->db->get();
        return $info->result();
    }
    
    public function get_all_post_info($limit,$offset){
        $this->db->select('*');
        $this->db->from('tbl_post');
        $this->db->join('tbl_category','tbl_category.category_id=tbl_post.post_category');
        $this->db->join('tbl_admin','tbl_admin.admin_id=tbl_post.author_id');
        $this->db->where('tbl_post.publication_status',1);
        $this->db->limit($limit,$offset);
        $info = $this->db->get();
        return $info->result();
    }
    
    public function get_all_post_info_cat_id($id){
        $this->db->select('*');
        $this->db->from('tbl_post');
        $this->db->join('tbl_category','tbl_category.category_id=tbl_post.post_category');
        $this->db->join('tbl_admin','tbl_admin.admin_id=tbl_post.author_id');
        $this->db->where('tbl_post.publication_status',1);
        $this->db->where('tbl_post.post_category',$id);
        $info = $this->db->get();
        return $info->result();
    }
    
    public function get_all_post_info_by_id($id){
        $this->db->select('*');
        $this->db->from('tbl_post');
        $this->db->join('tbl_category','tbl_category.category_id=tbl_post.post_category');
        $this->db->join('tbl_admin','tbl_admin.admin_id=tbl_post.author_id');
        $this->db->where('tbl_post.publication_status',1);
        $this->db->where('tbl_post.post_id',$id);
        $info = $this->db->get();
        return $info->row();
    }
    
    public function get_all_recent_post_info(){
        $this->db->select('*');
        $this->db->from('tbl_post');
        $this->db->where('publication_status',1);
        $this->db->order_by('post_id', 'DESC');
        $this->db->limit(5);
        $info = $this->db->get();
        return $info->result();
    }
    
    public function get_post_view($id){
        $this->db->select('*');
        $this->db->from('tbl_post');
        $this->db->where('post_id',$id);
        $info = $this->db->get();
        return $info->row();
    }
    
    public function up_post_view($id,$up_post_view){
        $this->db->set('post_view',$up_post_view);
        $this->db->where('post_id',$id);
        return $this->db->update('tbl_post');
    }
    
    public function get_all_popular_post_info(){
        $this->db->select('*');
        $this->db->from('tbl_post');
        $this->db->where('publication_status',1);
        $this->db->order_by('post_view','DESC');
        $this->db->limit(5);
        $info = $this->db->get();
        return $info->result();
    }
    
    public function get_search_info($search,$limit,$offset){
        $this->db->select('*');
        $this->db->from('tbl_post');
        $this->db->join('tbl_category','tbl_category.category_id=tbl_post.post_category');
        $this->db->join('tbl_admin','tbl_admin.admin_id=tbl_post.author_id');
        $this->db->where('tbl_post.publication_status',1);
        $this->db->like('tbl_post.post_title',$search);
        $this->db->or_like('tbl_post.post_description',$search);
        $this->db->limit($limit,$offset);
        $info = $this->db->get();
        return $info->result();
    }
}