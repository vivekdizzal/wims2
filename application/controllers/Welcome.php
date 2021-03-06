<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            if (user_has_right(ADMIN)) {
                redirect('admin/order_status');
            } else if (user_has_right(CAD)) {
                redirect('cad');
            } else if (user_has_right(LASER)) {
                redirect('laser');
            } else if (user_has_right(PRODUCTION)) {
                redirect('production');
            }
        }
        $this->load->helper(array('form'));
        if (isset($_POST["submit-login"])) {
            //This method will have the credentials validation
            $this->load->library('form_validation');

            $this->form_validation->set_rules('usr_logname', 'Username', 'trim|required');
            $this->form_validation->set_rules('usr_logpwd', 'Password', 'trim|required|callback_check_database');

            if ($this->form_validation->run()) {
                if (user_has_right(ADMIN)) {
                    redirect('users');
                } else if (user_has_right(CAD)) {
                    redirect('cad');
                } else if (user_has_right(LASER)) {
                    redirect('laser');
                } else if (user_has_right(PRODUCTION)) {
                    redirect('production');
                }
            }
        }
        $this->load->view('welcome_message');
    }

    public function check_database($password) {
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('usr_logname');

        //query the database
        $result = $this->user_model->login($username, $password);

        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'id' => $row->usr_id,
                    'user_logname' => $row->usr_logname
                );

                $this->session->set_userdata('logged_in', $sess_array);
                $this->session->set_userdata('user_id', $row->usr_id);
                $this->session->set_userdata('userlogname', $row->usr_logname);
                $this->session->set_userdata('user_name', $row->usr_name);
                $this->session->set_userdata('user_mobile', $row->usr_mobile);
                $this->session->set_userdata('user_email', $row->usr_email);
                $this->session->set_userdata('user_designation', $row->usr_designation);
                $this->session->set_userdata('user_city', $row->usr_city);
                $this->session->set_userdata('profile_image', $row->usr_photo);
                $this->session->set_userdata('user_type', $row->usr_type);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }

    function logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('userlogname');
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('user_mobile');
        $this->session->unset_userdata('user_email');
        $this->session->unset_userdata('user_designation');
        $this->session->unset_userdata('user_city');
        $this->session->unset_userdata('profile_image');
        $this->session->unset_userdata('user_type');
        $this->session->sess_destroy();
        redirect('welcome');
    }

    public function forget_password() {
        $this->load->helper(array('form'));
//        if (isset($_POST["submit-button"])) {
        //This method will have the credentials validation
        $this->load->library('form_validation');

        $this->form_validation->set_rules('usr_logname', 'User Login Name', 'trim|required');
        $this->form_validation->set_rules('usr_email', 'Email', 'trim|required|callback_check_db');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('forget_password');
        } else {
            $this->load->view('new_password');
        }

//        $this->load->view('forget_password');
    }

    public function check_db($email) {
        $username = $this->input->post('usr_logname');
        $result = $this->user_model->forget_password($username, $email);
        if ($result) {
            foreach ($result as $row) {
                $this->session->set_userdata('user_id', $row->usr_id);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_db', 'Invalid username or email');
            return false;
        }
    }

    public function new_password() {
        $this->load->helper(array('form'));
        $this->load->library('form_validation');

        if ($this->input->post()) {
            $this->form_validation->set_rules('usr_logpwd', 'New Password', 'trim|required');
            $this->form_validation->set_rules('conf_pwd', 'Confirm Password', 'trim|required|matches[usr_logpwd]');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('new_password', $this->form_validation->set_message('new_password', 'Passwords do not match'));
                $this->form_validation->set_message('new_password', 'Passwords do not match');
            } else {
//            if ($this->input->post('usr_logpwd') == $this->input->post('conf_pwd')) {
                $data['usr_id'] = $this->session->userdata('user_id');
                $data['usr_logpwd'] = $this->input->post('usr_logpwd');
                $this->user_model->update_password($data);
                $this->session->unset_userdata('logged_in');
                $this->session->unset_userdata('user_id');
                redirect('welcome');
            }
//            else {
//                echo '<script> alert("Passwords do not match"); </script>';
//                $this->load->view('new_password');
//                $this->form_validation->set_message('new_password', 'Passwords do not match');
//                return false;
//            }
        }
    }

}
