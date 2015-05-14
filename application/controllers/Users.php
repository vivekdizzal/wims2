<?php

class users extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

public function index() {
        $date = date("2015-05-04");
        $this->load->model('order_model');
        $data['high'] = $this->order_model->get_order_status('2', $date);
        $data['medium'] = $this->order_model->get_order_status('1', $date);
        $data['low'] = $this->order_model->get_order_status('0', $date);
        $this->template->build("order/dashboard", $data);
    }

    
}