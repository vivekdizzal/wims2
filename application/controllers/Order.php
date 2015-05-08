<?php

class Order extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('date');
        $this->load->model('order_model');
        // $this->load->view('new_orders');
    }

    public function index() {

        $this->template->build("order/new_orders");
    }

    public function order_status() {
        $date = date("2015-04-17");
        $data['high'] = $this->order_model->get_order_status('0', $date);
        $data['medium'] = $this->order_model->get_order_status('1');
        $data['low'] = $this->order_model->get_order_status('0');
        $this->template->build("order/new_orders", $data);
        //print_r($data);exit;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

