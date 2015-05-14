<?php

class admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('upload');
        $this->load->helper('form');
        $this->load->model('user_model');
//        if($_SESSION['user_type'] != '1') {
//           echo "<script type='text/javascript'>alert('Access denied');</script>";
//            redirect('/admin');
//        }        
    }

    public function index() {
        $date = date("2015-05-04");
        $this->load->model('order_model');
        $data['high'] = $this->order_model->get_order_status('2', $date);
        $data['medium'] = $this->order_model->get_order_status('1', $date);
        $data['low'] = $this->order_model->get_order_status('0', $date);
        $this->template->build("admin/dashboard", $data);
    }

    public function user_list() {

        $data['users'] = $this->user_model->user_list();
        $this->template->build('admin/user_list', $data);
    }

    public function order_status() {
        $date = date("2015-05-04");
        $this->load->model('order_model');
        $data['high'] = $this->order_model->get_order_status('2', $date);
        $data['medium'] = $this->order_model->get_order_status('1', $date);
        $data['low'] = $this->order_model->get_order_status('0', $date);
        $this->template->build("order/new_orders", $data);
    }

    public function add_user() {

        if ($this->input->post()) {
            $data = $this->input->post();
            $config['upload_path'] = realpath(APPPATH . '../upload/');
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = "abc.jpg";
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('usr_photo')) {           // print_r($data);exit;
                $error = array('error' => $this->upload->display_errors());
                $this->template->build('admin/add_user', $error);
            } else {
                $uploaded = $this->upload->data();
                $data["usr_photo"] = $uploaded["file_name"];
                $this->user_model->add_user($data);
                redirect('admin/user_list');
            }
        }
        $this->template->build('admin/add_user');
    }

    public function edit_user() {

        $user_id = $this->uri->segment(3);
        if ($this->input->post()) {
            $data = $this->input->post();
            if (!empty($_FILES['usr_photo']['name'])) {

                if (file_exists(realpath(APPPATH . '/upload/' . $_FILES['usr_photo']['name']))) {
                    if (@unlink(realpath(APPPATH . '/upload/' . $_FILES['usr_photo']['name']))) {
                        unlink($_FILES['usr_photo']['name']);
                        echo "true";
                    } else {
                        echo "false";
                    }
                }
                $config['upload_path'] = realpath(APPPATH . '../upload/');
                $config['allowed_types'] = 'gif|jpg|png';
                $config['file_name'] = "abc.jpg";
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('usr_photo')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->template->build('admin/add_user', $error);
                } else {
                    $uploaded = $this->upload->data();
                    $data["usr_photo"] = $uploaded["file_name"];
                    $this->user_model->update_user($data);
                    redirect('admin/user_list');
                }
            } else {
                $this->user_model->update_user($data);
                redirect('admin/user_list');
            }
        }
        $data['usr_id'] = $user_id;
        $data['profile'] = $this->user_model->edit_user($user_id);
        $this->template->build('admin/edit_profile', $data);
    }

//    public function update_profile() {
//
//        if ($this->input->post()) {
//            $data = $this->input->post();
//            if (!empty($_FILES['usr_photo']['name'])) {
//
//                if (file_exists(realpath(APPPATH . '/upload/' . $_FILES['usr_photo']['name']))) {
//                    if (@unlink(realpath(APPPATH . '/upload/' . $_FILES['usr_photo']['name']))) {
//                        unlink($_FILES['usr_photo']['name']);
//                        echo "true";
//                    } else {
//                        echo "false";
//                    }
//                }
//                $config['upload_path'] = realpath(APPPATH . '../upload/');
//                $config['allowed_types'] = 'gif|jpg|png';
//                $config['file_name'] = "abc.jpg";
//                $this->upload->initialize($config);
//                if (!$this->upload->do_upload('usr_photo')) {
//                    $error = array('error' => $this->upload->display_errors());
//                    $this->template->build('admin/add_user', $error);
//                } else {
//                    $uploaded = $this->upload->data();
//                    $data["usr_photo"] = $uploaded["file_name"];
//                    $this->user_model->update_user($data);
//                    redirect('admin/user_list');
//                }
//            } else {
//                $this->user_model->update_user($data);
//                redirect('admin/user_list');
//            }
//        }
//    }

    public function delete_user() {

        $user_id = $this->uri->segment(3);
        $data['usr_id'] = $user_id;
        $this->user_model->delete_user($user_id);
        redirect('admin/user_list');
    }

    public function customer_list() {

        $data['customers'] = $this->user_model->customer_list();
        $this->template->build('admin/customer_list', $data);
    }

    public function new_customer() {
        if ($this->input->post()) {
            $data = $this->input->post();
            if ($data['submit'] == 'Submit') {
                $this->user_model->new_customer($data);
                redirect('admin/customer_list');
            } else {
                redirect('admin/customer_list');
            }
        }
        $this->template->build('admin/new_customer');
    }

    public function edit_customer() {

        $cust_id = $this->uri->segment(3);
        if ($this->input->post()) {
            $data = $this->input->post();
            if ($data['submit'] == 'Submit') {
                $this->user_model->update_customer($data);
                redirect('admin/customer_list');
            } else {
                redirect('admin/customer_list');
            }
        }
        $data['cust_id'] = $cust_id;
        $data['customer'] = $this->user_model->edit_customer($cust_id);
        $this->template->build('admin/edit_customer', $data);
    }

//    public function update_customer() {
//        if ($this->input->post()) { print_r($_POST);
//            $data = $this->input->post();
//            if ($data['submit'] == 'Submit') {
//                $this->user_model->update_customer($data);
//                redirect('admin/customer_list');
//            } else {
//                redirect('admin/customer_list');
//            }
//        }
//    }

    public function delete_customer() {

        $cust_id = $this->uri->segment(3);
        $data['cust_id'] = $cust_id;
        $this->user_model->delete_customer($cust_id);
        redirect('admin/customer_list');
    }

    public function user_rights() {

        if ($this->input->post()) {
            $data = $this->input->post();
            $id = $this->input->post('usr_id');

            //Delete all the user rights
            $this->user_model->delete_rights($id);
            //Save the new rights
            foreach ($data['sm_id'] as $datatoSave) {
                $data['sm_id'] = $datatoSave;
                $this->user_model->update_rights($id, $data);
            }redirect('admin/user_list');
        }
        $usr_id = $this->uri->segment(3);
        $data['usr_id'] = $usr_id;
        $data['user'] = $this->user_model->user_rights($usr_id);
        if (!empty($data['user'])) {
            $data['rights'] = $this->user_model->rights($data['user']['0']->mm_id);
            $data['givenright'] = json_decode(json_encode($data), true);
            //print_r($data);exit;
            $this->template->build('admin/user_rights', $data);
        } else {
            $mm_id = 1;
            $data['rights'] = $this->user_model->rights($mm_id);
            $this->template->build('admin/user_rights', $data);
        }
    }

//    public function update_rights() {
//
//        if ($this->input->post()) {
//            $data = $this->input->post();
//            $id = $this->input->post('usr_id');
//
//            //Delete all the user rights
//            $this->user_model->delete_rights($id);
//            //Save the new rights
//            foreach ($data['sm_id'] as $datatoSave) {
//                $data['sm_id'] = $datatoSave;
//                $this->user_model->update_rights($id, $data);
//            }redirect('admin/user_list');
//        }
//    }

    public function set_priority() {

        if ($this->input->post()) {
            $data = $this->input->post();
            $this->user_model->update_priority($data);
            $data['update_date'] = date('Y-m-d');
            $data['update_time'] = date('Y-m-d H:i:s');
            $data['update_status'] = '1';
            $data['update_to'] = 'Set Priority';
            $data['update_by'] = $_SESSION['user_id'];
            $this->user_model->priority_update($data);
            redirect('admin/order_status');
        }
        $id = $_GET['job_id'];
        $data['jobs'] = $this->user_model->get_job_updates($id, TBL_JOBS, 'job_id');
        $data['updates'] = $this->user_model->get_job_updates($id, TBL_JOBS_UPDATES, 'job_id');
        $cust_id = $data['jobs'][0]->cust_id;
        $data['customer'] = $this->user_model->get_job_updates($cust_id, TBL_CUSTOMER, 'cust_id');
        $data['user'] = $this->user_model->get_job_update_join($data['jobs'][0]->job_id);
        //print_r($data['user']);
        $this->load->view('admin/set_priority', $data);
    }

    public function update_tooling() {

        $data['job_id'] = $_POST['job_id'];
        if ($data['job_id']) {

            if ($_POST["job_tooling"] == 1) {
                $data['job_tooling'] = 0;
            } else {
                $data['job_tooling'] = 1;
            }
            $this->user_model->update_tooling($data);
        }
    }

//    public function update_priority() {
//        if ($this->input->post()) {
//            $data = $this->input->post();
//            $this->user_model->update_priority($data);
//            redirect('admin/order_status');
//        }
//    }

    public function view_job_info() {

        if ($this->input->post()) {
            $data = $this->input->post();
            print_r($data);
            if ($data['update_type'] = 0) {
                $this->user_model->update_job($data);
            } else if ($data['update_type'] = 1) {
                $data['job_status'] = -1;
                $this->user_model->update_job($data);
            } redirect('admin/order_status');
        }
        $id = $_GET['job_id'];
        $data['jobs'] = $this->user_model->get_job_updates($id, TBL_JOBS, 'job_id');
        $data['updates'] = $this->user_model->get_job_updates($id, TBL_JOBS_UPDATES, 'job_id');
        $cust_id = $data['jobs'][0]->cust_id;
        $data['customer'] = $this->user_model->get_job_updates($cust_id, TBL_CUSTOMER, 'cust_id');
        $data['user'] = $this->user_model->get_job_update_join($data['jobs'][0]->job_id);
        // print_r($data['user']);
        $this->load->view('admin/update_job_popup', $data);
    }

//    public function update_job() {
//        if ($this->input->post()) {
//           $data = $this->input->post();
//            if ($data['update_type'] = 0) {
//                $this->user_model->update_job($data);
//            } else if ($data['update_type'] = 1) {
//                $data['job_status'] = -1;
//                $this->user_model->update_job($data);
//            }  //else {
//        }
//        redirect('admin/order_status');
//    }

    public function check_ref_no() {
        $refno = $_REQUEST["fieldValue"];
        $conditions = $this->user_model->check_ref_no($refno);
        //print_r($conditions);
        if (empty($conditions)) {
            echo json_encode(array("cust_ref", true));
        } else {
            echo json_encode(array("cust_ref", false));
        }
        exit;
    }

}

?>