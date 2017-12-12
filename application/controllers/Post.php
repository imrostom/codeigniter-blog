<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

    public function add_post() {
        $data = array();
        $data['get_published_category'] = $this->Post_Model->get_published_category();
        $data['maincontent'] = $this->load->view('admin/pages/add_post', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function edit_post($id) {
        $data = array();
        $data['get_published_category'] = $this->Post_Model->get_published_category();
        $data['get_post_by_id'] = $this->Post_Model->get_post_by_id($id);
        
        $data['maincontent'] = $this->load->view('admin/pages/edit_post', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function save_post() {
        $data = array();
        $this->form_validation->set_rules('post_title', 'Post Title', 'trim|required');
        $this->form_validation->set_rules('post_description', 'Post Descriptoin', 'trim|required');
        $this->form_validation->set_rules('post_category', 'Post Category', 'trim|required');
        $this->form_validation->set_rules('publication_status', 'Publication Status', 'trim|required');

        $data['post_title'] = $this->input->post('post_title');
        $data['post_description'] = $this->input->post('post_description');
        //$data['post_image'] = "Post Image Will Here";
        $data['post_category'] = $this->input->post('post_category');
        $data['publication_status'] = $this->input->post('publication_status');
        $data['author_id'] = $this->session->userdata('admin_id');
        
if(!empty($_FILES['post_image']['name'])){
        $config['upload_path'] = './post_image/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 300;
        $config['max_width'] = 1500;
        $config['max_height'] = 1222;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('post_image')) {
            $error = $this->upload->display_errors();

            $this->session->set_flashdata('message', $error);
            redirect('Post/add_post');
        } else {
            $post_image = $this->upload->data();

            $data['post_image'] = $post_image['file_name'];
        }
}
        if ($this->form_validation->run() == true) {



            $result = $this->Post_Model->save_post_info($data);
            if ($result) {
                $this->session->set_flashdata('message', 'Post Inserted Sucessfully');
                redirect('Post/add_post');
            } else {
                $this->session->set_flashdata('message', 'Post Inserted fail');
                redirect('Post/add_post');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('Post/add_post');
        }
    }

    public function manage_post() {
        $data = array();
        $data['get_all_post_info'] = $this->Post_Model->get_all_post_info();
        $data['maincontent'] = $this->load->view('admin/pages/manage_post', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function unpublished_post($id){
        $result = $this->Post_Model->unpublished_post_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'UnPublished Post Sucessfully');
            redirect('Post/manage_post');
        } else {
            $this->session->set_flashdata('message', 'UnPublished Post  Failed');
            redirect('Post/manage_post');
        }
    }
    
    public function published_post($id){
        $result = $this->Post_Model->published_post_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Published Post Sucessfully');
            redirect('Post/manage_post');
        } else {
            $this->session->set_flashdata('message', 'Published Post  Failed');
            redirect('Post/manage_post');
        }
    }
    
    public function deleted_post($id){
        $result = $this->Post_Model->deleted_post_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Deleted Post Sucessfully');
            redirect('Post/manage_post');
        } else {
            $this->session->set_flashdata('message', 'Deleted Post  Failed');
            redirect('Post/manage_post');
        }
    }
    
    
    public function update_post(){
        $data = array();
        $this->form_validation->set_rules('post_title', 'Post Title', 'trim|required');
        $this->form_validation->set_rules('post_description', 'Post Descriptoin', 'trim|required');
        $this->form_validation->set_rules('post_category', 'Post Category', 'trim|required');
        $this->form_validation->set_rules('publication_status', 'Publication Status', 'trim|required');

        $data['post_title'] = $this->input->post('post_title');
        $data['post_description'] = $this->input->post('post_description');
        //$data['post_image'] = "Post Image Will Here";
        $data['post_category'] = $this->input->post('post_category');
        $data['publication_status'] = $this->input->post('publication_status');
        $data['author_id'] = $this->session->userdata('admin_id');
        
        $post_id = $this->input->post('post_id');
        
        $file = $_FILES['post_image'];
        
        if(!empty($_FILES['post_image']['name'])){
        
        $config['upload_path'] = './post_image/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 300;
        $config['max_width'] = 1500;
        $config['max_height'] = 1222;

        $this->upload->initialize($config);
        
        if (!$this->upload->do_upload('post_image')) {
            $error = $this->upload->display_errors();

            $this->session->set_flashdata('message', $error);
            redirect('Post/edit_post/'.$post_id);
        } else {
            $post_image = $this->upload->data();

            $data['post_image'] = $post_image['file_name'];
        }
        
        }

        if ($this->form_validation->run() == true) {

            $result = $this->Post_Model->update_post_info($data,$post_id);
            if ($result) {
                $this->session->set_flashdata('message', 'Post Updated Sucessfully');
                redirect('Post/edit_post/'.$post_id);
            } else {
                $this->session->set_flashdata('message', 'Post Updated fail');
                redirect('Post/edit_post/'.$post_id);
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('Post/edit_post/'.$post_id);
        }
    }

}
