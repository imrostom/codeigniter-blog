<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

    public function index() {
        echo "Create Controller";
    }

    public function home() {

        $config['base_url'] = base_url('Site/home');
        $config['total_rows'] = $this->db->get('tbl_post')->num_rows();
        $config['per_page'] = 2;
        $config['num_links'] = 2;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['prev_link'] = '&lt; Previous';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['last_link'] = false;
        $config['next_link'] = 'Next &gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';

        $this->pagination->initialize($config);

        $data = array();
        $cdata = array();
        $this->load->view('Site/inc/header');
        $cdata['get_all_category_info'] = $this->Site_Model->get_all_category_info();
        $cdata['get_all_recent_post_info'] = $this->Site_Model->get_all_recent_post_info();
        $cdata['get_all_popular_post_info'] = $this->Site_Model->get_all_popular_post_info();
        $data['get_all_post_info'] = $this->Site_Model->get_all_post_info($config['per_page'], $this->uri->segment('3'));


        $data['sidebar'] = $this->load->view('Site/inc/sidebar', $cdata, true);
        $this->load->view('Site/pages/home', $data);
        $this->load->view('Site/inc/footer');
    }

    public function contact() {
        $this->load->view('Site/inc/header');
        $this->load->view('Site/pages/contact');
        $this->load->view('Site/inc/footer');
    }

    public function terms() {
        $this->load->view('Site/inc/header');
        $this->load->view('Site/pages/terms');
        $this->load->view('Site/inc/footer');
    }

    public function single($id) {
        $data = array();
        $this->load->view('Site/inc/header');
        $cdata['get_all_category_info'] = $this->Site_Model->get_all_category_info();
        $data['get_all_post_info_by_id'] = $this->Site_Model->get_all_post_info_by_id($id);
        $cdata['get_all_recent_post_info'] = $this->Site_Model->get_all_recent_post_info();
        $cdata['get_all_popular_post_info'] = $this->Site_Model->get_all_popular_post_info();
        $get_post_view = $this->Site_Model->get_post_view($id);



        $up_post_view = $get_post_view->post_view + 1;



        $cdata['up_post_view'] = $this->Site_Model->up_post_view($id, $up_post_view);

        $data['sidebar'] = $this->load->view('Site/inc/sidebar', $cdata, true);
        $this->load->view('Site/pages/single', $data);
        $this->load->view('Site/inc/footer');
    }

    public function all_category_post_by_id($id) {
        $data = array();
        $cdata = array();
        $this->load->view('Site/inc/header');
        $cdata['get_all_category_info'] = $this->Site_Model->get_all_category_info();
        $data['get_all_post_info'] = $this->Site_Model->get_all_post_info_cat_id($id);
        $cdata['get_all_popular_post_info'] = $this->Site_Model->get_all_popular_post_info();
        $cdata['get_all_recent_post_info'] = $this->Site_Model->get_all_recent_post_info();
        $data['sidebar'] = $this->load->view('Site/inc/sidebar', $cdata, true);
        $this->load->view('Site/pages/home', $data);
        $this->load->view('Site/inc/footer');
    }

    public function search() {


        $data = array();
        $cdata = array();

        $search = $this->input->post('search');

        $data['search'] = $search;
        $config['base_url'] = base_url('Site/search');
        $config['total_rows'] = $this->total_search_row($search);
        $config['per_page'] = 2;
        $config['num_links'] = 2;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['prev_link'] = '&lt; Previous';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['last_link'] = false;
        $config['next_link'] = 'Next &gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';

        $this->pagination->initialize($config);


        $this->load->view('Site/inc/header');
        $cdata['get_all_category_info'] = $this->Site_Model->get_all_category_info();
        $cdata['get_all_recent_post_info'] = $this->Site_Model->get_all_recent_post_info();
        $cdata['get_all_popular_post_info'] = $this->Site_Model->get_all_popular_post_info();
        $data['get_all_post_info'] = $this->Site_Model->get_search_info($search, $config['per_page'], $this->uri->segment('3'));


        $data['sidebar'] = $this->load->view('Site/inc/sidebar', $cdata, true);
        $this->load->view('Site/pages/search', $data);
        $this->load->view('Site/inc/footer');
    }

    public function total_search_row($search) {
        $this->db->select('*');
        $this->db->from('tbl_post');
        $this->db->like('post_title', $search);
        $this->db->or_like('post_description', $search);
        $this->db->where('publication_status', 1);
        $res = $this->db->get();
        return $res->num_rows();
    }
    
   public function error(){
      $this->load->view('Site/inc/header');
        $this->load->view('Site/pages/error');
        $this->load->view('Site/inc/footer');
   }

}
