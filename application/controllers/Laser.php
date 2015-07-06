<?php

class Laser extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('cad_model');
        $this->load->model('laser_model');
    }

    public function index() {
        $date = date("2015-04-17");

        $data['high'] = $this->laser_model->get_laser_status('2', '2', '1', $date);
        $data['normal'] = $this->laser_model->get_laser_status('1', '2', '1', $date);
        $data['low'] = $this->laser_model->get_laser_status('0', '2', '1', $date);
        $this->template->build('laser/laser_orders', $data);
    }

    public function laser_popup() {

        $this->load->view('laser/laser_popup');
    }

}
