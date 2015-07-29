<?php

class users extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
         if (!$this->session->userdata('logged_in')) {
            redirect('welcome');
        }
    }

public function index() {
        $date = date("2015-05-04");
        $this->load->model('order_model');
        $data['high'] = $this->order_model->get_order_status($date,'2');
        $data['medium'] = $this->order_model->get_order_status($date,'1');
        $data['low'] = $this->order_model->get_order_status($date,'0');
        $this->template->build("order/dashboard", $data);
    }

    
}