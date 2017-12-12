<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function add_category() {
        $data = array();
        $data['maincontent'] = $this->load->view('admin/pages/add_category', '', true);
        $this->load->view('admin/master', $data);
    }
    
    public function edit_category($id) {
        $data = array();
        
        $data['edit_category_by_id'] = $this->Category_Model->edit_category_by_id($id);
        
        $data['maincontent'] = $this->load->view('admin/pages/edit_category',$data, true);
        $this->load->view('admin/master', $data);
    }

    public function save_category() {
        $data = array();

        $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required');
        $this->form_validation->set_rules('category_description', 'Category Description', 'trim|required');
        $this->form_validation->set_rules('publication_status', 'Publication Status', 'trim|required');

        $data['category_name'] = $this->input->post('category_name');
        $data['category_description'] = $this->input->post('category_description');
        $data['publication_status'] = $this->input->post('publication_status');
        if ($this->form_validation->run() == true) {
            $result = $this->Category_Model->save_category_info($data);
            if ($result) {
                $this->session->set_flashdata('message', 'Category Inserted Sucessfully');
                redirect('Category/add_category');
            } else {
                $this->session->set_flashdata('message', 'Category Inserted failr');
                redirect('Category/add_category');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('Category/add_category');
        }
    }

    public function manage_category() {
        $data = array();
        $data['get_all_category'] = $this->Category_Model->get_all_category();
        $data['maincontent'] = $this->load->view('admin/pages/manage_category', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function published_category($id) {
        $result = $this->Category_Model->published_category_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Published Category Sucessfully');
            redirect('Category/manage_category');
        } else {
            $this->session->set_flashdata('message', 'Published Category  Failed');
             redirect('Category/manage_category');
        }
    }
    
    public function unpublished_category($id) {
        $result = $this->Category_Model->unpublished_category_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'UnPublished Category Sucessfully');
            redirect('Category/manage_category');
        } else {
            $this->session->set_flashdata('message', 'UnPublished Category  Failed');
             redirect('Category/manage_category');
        }
    }
    
    public function delete_category($id) {
        $result = $this->Category_Model->delete_category_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Deleted Category Sucessfully');
            redirect('Category/manage_category');
        } else {
            $this->session->set_flashdata('message', 'Deleted Category  Failed');
             redirect('Category/manage_category');
        }
    }
    
    public function update_category(){
        $data = array();

        $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required');
        $this->form_validation->set_rules('category_description', 'Category Description', 'trim|required');
        $this->form_validation->set_rules('publication_status', 'Publication Status', 'trim|required');

        $data['category_name'] = $this->input->post('category_name');
        $data['category_description'] = $this->input->post('category_description');
        $data['publication_status'] = $this->input->post('publication_status');
        
        $category_id = $this->input->post('category_id');
        
        if ($this->form_validation->run() == true) {
            $result = $this->Category_Model->update_category_info($data,$category_id);
            if ($result) {
                $this->session->set_flashdata('message', 'Category Updated Sucessfully');
                redirect('Category/edit_category/'.$category_id);
            } else {
                $this->session->set_flashdata('message', 'Category Updated Fail');
                redirect('Category/edit_category/'.$category_id);
            }
        } 
        else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('Category/edit_category/'.$category_id);
        }
    }

}
