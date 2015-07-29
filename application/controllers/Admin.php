<?php

class admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('upload');
        $this->load->helper('form');
        $this->load->model('user_model');
        if (!$this->session->userdata('logged_in')) {
            redirect('welcome');
        }
        if (!(user_has_right(ADMIN))) {
            redirect('/');
        }
    }

    public function index() {
        $date = date("Y-m-d");
        $this->load->model('order_model');
        $data['high'] = $this->order_model->get_order_status($date, '2');
        $data['medium'] = $this->order_model->get_order_status($date, '1');
        $data['low'] = $this->order_model->get_order_status($date, '0');
        $this->template->build("admin/dashboard", $data);
    }

    public function user_list() {

        $data['users'] = $this->user_model->user_list();
        $this->template->build('admin/user_list', $data);
    }

    public function order_status() {
        $date = date("Y-m-d");
        $this->load->model('order_model');
        $order = $this->uri->segment(3);
        if (!empty($order)) {
            $data['high'] = $this->order_model->get_order_status($date, '2', $order);
            $data['medium'] = $this->order_model->get_order_status($date, '1', $order);
            $data['low'] = $this->order_model->get_order_status($date, '0', $order);
        } else {
            $data['high'] = $this->order_model->get_order_status($date, '2');
            $data['medium'] = $this->order_model->get_order_status($date, '1');
            $data['low'] = $this->order_model->get_order_status($date, '0');
        }
        $this->template->build("order/new_order", $data);
    }

    public function add_user() {

        if ($this->input->post()) {
            $data = $this->input->post();
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
                $this->user_model->add_user($data);
                //redirect('admin/user_list');
                echo json_encode(array("status" => TRUE, "message" => "User added successfully."));
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
                    // echo json_encode(array("status" => "success", "message" => "File not Uploaded."));
                } else {
                    $uploaded = $this->upload->data();
                    $data["usr_photo"] = $uploaded["file_name"];
                    $this->user_model->update_user($data);
                 // echo json_encode(array("status" => "success", "message" => "File Uploaded successfully.","savedfilename" => $uploaded["file_name"], "filename" => $_FILES["file"]["name"]));
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

    public function set_priority() {
        if ($this->input->post()) {
            $data = $this->input->post();
//             print_r($data);exit;
            $this->user_model->update_priority($data);
            $data['update_time'] = date('Y-m-d H:i:s');
            $data['update_status'] = '0';
            $data['update_remarks'] = 'Priority Changed';
            $data['update_by'] = $_SESSION['user_id'];
            $this->user_model->priority_update($data);
            redirect('admin/order_status');
        }
        $data['ord_id'] = $_GET['ord_id'];
        $data['order_status_id'] = $_GET['id'];
        $data['jobs'] = $this->user_model->get_job_updates($data['ord_id'], TBL_JOBS, 'ord_id');
        $data['order'] = $this->user_model->get_job_updates($data['ord_id'], TBL_ORDER, 'ord_id');
//      $data['updates'] = $this->user_model->get_job_updates($data['order_status_id'], TBL_ORDER_STATUS, 'ord_id');
        $cust_id = $data['jobs'][0]->cust_id;
        $data['customer'] = $this->user_model->get_job_updates($cust_id, TBL_CUSTOMER, 'cust_id');
        $data['user'] = $this->user_model->get_job_update_join($data['order_status_id']);
        $this->load->view('admin/set_priority', $data);
    }

    public function update_tooling() {
        $data['ord_id'] = $_POST['ord_id'];
        if ($data['ord_id']) {

            if ($_POST["job_tooling"] == 1) {
                $data['job_tooling'] = 0;
            } else {
                $data['job_tooling'] = 1;
            }
            $this->user_model->update_tooling($data);
        }
    }

    public function update_job_status() {
        if ($this->input->post()) {
            $data['ord_id'] = $_POST['ord_id'];
            $data['ord_id'] = $_POST['ord_id'];
            if ($_POST["is_hold"] == 0) {
                $data['is_hold'] = 1;
            }
            $this->user_model->update_tooling($data);
        }
        $id = $_GET['ord_id'];
        $data['jobs'] = $this->user_model->get_job_updates($id, TBL_ORDER, 'ord_id');
        $data['updates'] = $this->user_model->get_job_updates($id, TBL_ORDER_STATUS, 'ord_id');
        $data['hold'] = $this->user_model->get_job_updates($id, TBL_ORDER_STATUS_UPDATE, 'ord_id');
        $cust_id = $data['jobs'][0]->cust_id;
        $data['customer'] = $this->user_model->get_job_updates($cust_id, TBL_CUSTOMER, 'cust_id');
        $data['user'] = $this->user_model->get_job_update_join($data['jobs'][0]->ord_id);
        $this->load->view('admin/hold', $data);
    }

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
        $id = $_GET['ord_id'];
        $status_id = $_GET['id'];
        $data['jobs'] = $this->user_model->get_job_updates($id, TBL_JOBS, 'ord_id');
        $data['updates'] = $this->user_model->get_job_updates($id, TBL_ORDER, 'ord_id');
        $cust_id = $data['jobs'][0]->cust_id;
        $data['customer'] = $this->user_model->get_job_updates($cust_id, TBL_CUSTOMER, 'cust_id');
        $data['user'] = $this->user_model->get_job_update_join($status_id);
        $data['ord_id'] = $id;
        $this->load->view('admin/update_job_popup', $data);
    }

    public function job_history() {
        $id = $_GET['ord_id'];
        $max = $_GET['max'];
        $min = $_GET['min'];
        $status_id = $_GET['status_id'];
        $data['jobs'] = $this->user_model->get_job_updates($id, TBL_JOBS, 'ord_id');
        $data['updates'] = $this->user_model->get_job_updates($id, TBL_ORDER, 'ord_id');
        $cust_id = $data['jobs'][0]->cust_id;
        $data['customer'] = $this->user_model->get_job_updates($cust_id, TBL_CUSTOMER, 'cust_id');
        $data['user'] = $this->user_model->get_job_update_join($status_id, $max, $min);
        $data['ord_id'] = $id;
        $this->load->view('admin/update_job_popup', $data);
    }

    public function check_ref_no() {
        $refno = $_REQUEST["fieldValue"];
        $conditions = $this->user_model->check_ref_no($refno);
        if (empty($conditions)) {
            echo json_encode(array("cust_ref", true));
        } else {
            echo json_encode(array("cust_ref", false));
        }
        exit;
    }
}

?>