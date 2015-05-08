<?php

class Cad extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('cad_model');
        $this->load->library('email');
    }
    
    public function index() {
        
    $date = date("2015-04-17");
        $this->load->model('cad_model');
        $data['completed'] = $this->cad_model->get_cad_status('2', $date);
        $data['pending'] = $this->cad_model->get_cad_status('1', $date);
        $data['hold'] = $this->cad_model->get_cad_status('0', $date);
        

        $this->template->build("cad/cad_orders", $data);
    }
    
    public function cad_new_job() {
        
        $this->load->view('cad/cad_popup');
    }
    
    public function cad_mail_to_customer() {
        if($this->input->post()) {
       //     print_r($this->input->post());//exit;
            $data = $this->input->post();
            
            //$config['upload_path'] = 'http://localhost/wims/assets/images/';
            $config['upload_path'] = realpath(APPPATH . '../upload/');
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = "cad.jpg";
            $this->upload->initialize($config);
if (!$this->upload->do_upload('usr_photo')) {           
                $error = array('error' => $this->upload->display_errors());
                $this->template->build('admin/add_user', $error);
            } else {
                $uploaded = $this->upload->data();
                $data["attachment"] = $uploaded["file_name"];
                //$this->user_model->add_user($data);
                //redirect('admin/user_list');
            }
            $this->load->library('upload', $config);
            $this->email->set_newline("\r\n");
            $this->email->from('$_SESSION["usr_email"]', '$_SESSION["usr_name"]');
            $this->email->to('$data["email"]');
            $this->email->cc('$data["ccemail"]');
            $this->email->attach('http://localhost/wims/upload/$data["attachment"]');
            $this->email->subject('$data["subject"]');
            }
        $this->load->view('cad/mail_to_customer');
    }
    
}