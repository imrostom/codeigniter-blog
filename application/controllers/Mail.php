<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends CI_Controller {

    public function message() {
        $data = array();
        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['subject'] = $this->input->post('subject');
        $data['message'] = $this->input->post('message');

        $name = $data['name'];
        $email = $data['email'];
        $subject = $data['subject'];
        $message = $data['message'];



        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');

        if ($this->form_validation->run() == true) {
            // Configure email library
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.googlemail.com';
            $config['smtp_port'] = 465;
            $config['smtp_user'] = 'rostomali4444@gmail.com';
            $config['smtp_pass'] = 'engrrostomali';

            // Load email library and passing configured values to email library 
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");

            // Sender email address
            $this->email->from($email, $name);
            // Receiver email address
            $this->email->to('rostomali4444@gmail.com');
            // Subject of email
            $this->email->subject($subject);
            // Message in email
            $this->email->message($message);

            if ($this->email->send()) {
                $this->session->set_flashdata('message','Email Sending Sucessfully');
                redirect('Site/contact');
            } else {
                $this->session->set_flashdata('message','Email Sending fail');
                redirect('Site/contact');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('Site/contact');
        }
    }

}
