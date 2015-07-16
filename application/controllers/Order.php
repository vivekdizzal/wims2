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
    }

    public function order_on_hold() {
        $date = date("2015-04-17");

        $data['high'] = $this->order_model->get_order_on_hold('2', $date);
        $data['normal'] = $this->order_model->get_order_on_hold('1', $date);
        $data['low'] = $this->order_model->get_order_on_hold('0', $date);
        $this->template->build('hold/orders_on_hold', $data);
    }

    public function order_on_hold_popup() {
        if ($this->input->post()) {
            $data['ord_id'] = $_POST['ord_id'];
//            $data['ord_code'] = $_POST['ord_ref_id'];
            $data['is_hold'] = WORK_NOT_IN_HOLD;
            $this->order_model->update_hold_status($data);
            redirect('order/order_on_hold');
        }
        $data['ord_id'] = $_GET['ord_id'];
        $data['ord_code'] = $_GET['ord_ref_id'];
//        $data['hold'] = $this->order_model->get_order_hold_status($data);
        $this->load->view('hold/hold_popup', $data);
    }

}
