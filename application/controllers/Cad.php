<?phpclass Cad extends CI_Controller {    public function __construct() {        parent::__construct();        if (!$this->session->userdata('logged_in')) {            redirect('welcome');        }        $this->load->model('user_model');        $this->load->model('cad_model1');        $this->load->model('customer_model');        $this->load->library('email');        $this->load->library('upload');        $this->load->model('beamon_model');        $this->load->model('order_model');        $this->load->helper('date');        $this->load->library('ckeditor');        $this->load->library('ckfinder');        $this->ckeditor->basePath = base_url() . 'asset/ckeditor/';        $this->ckeditor->config['toolbar'] = array(            array('Source', '-', 'Bold', 'Italic', 'Underline', '-', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo', '-', 'NumberedList', 'BulletedList')        );        $this->ckeditor->config['language'] = 'it';        $this->ckeditor->config['width'] = '730px';        $this->ckeditor->config['height'] = '300px';//Add Ckfinder to Ckeditor        $this->ckfinder->SetupCKEditor($this->ckeditor, '../../asset/ckfinder/');    }    public function index() {        $date = '2015-05-15';        $data['high'] = $this->cad_model1->get_cad_status('2', '1', $date);        $data['normal'] = $this->cad_model1->get_cad_status('1', '1', $date);        $data['low'] = $this->cad_model1->get_cad_status('0', '1', $date);        $this->template->build("cad/cad_orders", $data);    }    public function cad_new_job() {        header('Access-Control-Allow-Origin: *');        $data["order_id"] = $_GET['job_id'];        $data["engg_id"] = $_GET['engg_id'];        $data["order_status"] = $this->cad_model1->get_order_status($data["order_id"]);        $data['user'] = $this->user_model->get_job_update_join($data["order_status"]["id"]);//        $data['order'] = $this->order_model->get_order_details($order_id);//        //        $data['jobs'] = $this->user_model->get_job_updates($id, TBL_JOBS, 'job_id');//        $data['updates'] = $this->user_model->get_job_updates($id, TBL_JOBS_UPDATES, 'job_id');//        $cust_id = $data['jobs'][0]->cust_id;//        $data['customer'] = $this->user_model->get_job_updates($cust_id, TBL_CUSTOMER, 'cust_id');//        $data['user'] = $this->user_model->get_job_update_join($data['jobs'][0]->job_id);        $this->load->view('cad/cad_popup', $data);    }    public function cad_mail_to_customer() {        header('Access-Control-Allow-Origin: *');        if ($this->input->post()) {            $config['protocol'] = 'smtp';            $config['smtp_host'] = 'ssl://smtp.gmail.com';            $config['smtp_port'] = '25';            $config['smtp_port'] = '465';            $config['smtp_timeout'] = '7';            $config['smtp_user'] = 'sribabuixly@gmail.com';            $config['smtp_pass'] = '123456sri';            $config['charset'] = 'utf-8';            $config['newline'] = "\r\n";            $config['mailtype'] = 'text'; // or html            $config['validation'] = TRUE; // bool whether to validate email or not                  $this->email->initialize($config);            $this->email->set_newline("\r\n");            $this->email->from('sribabuixly@gmail.com', 'sribabu');            $this->email->to($_POST["email"]);            $this->email->cc($_POST["cc_email"]);            $filnames = $_POST["file_names"];            $filenames = explode(",", $filnames);            foreach ($filenames as $filename) {                $this->email->attach(base_url() . '/upload/' . $filename);            }            $this->email->subject($_POST["subject"]);            $this->email->message($_POST["message"]);            $email_sent = $this->email->send();            if ($email_sent) {                $data['is_hold'] = WORK_IN_HOLD;                $data['ord_id'] = $_POST['ord_id'];                change_working_status('is_hold', WORK_IN_HOLD, $data['ord_id']);                working_status_updates(QUERY_SENT_TO_CUSTOMER, $_POST['subject'], $data['ord_id']);//                //$this->user_model->update_priority($data);//                $data['update_time'] = date('Y-m-d H:i:s');//                $data['update_status'] = '1';//                // $data['update_to'] = 'Hold';//                $data['update_remarks'] = $_POST['subject'];//                $data['update_by'] = $_SESSION['user_id'];//                $this->user_model->priority_update($data);                echo json_encode(array("status" => true, "message" => "Email sent successfully"));            } else {                echo json_encode(array("status" => false, "message" => "Email not sent successfully"));            }        } else {            $data['ord_id'] = $_GET['ord_id'];            $customer_id = $_GET['engg_id']; //$this->uri->segment(3);            $data["customer"] = $this->customer_model->get_engineer_details($customer_id);            $this->load->view('cad/mail_to_customer', $data);        }    }    public function upload_attachment() {//$path = realpath(APPPATH . '../upload/'.$ord_id);//if(!is_dir($path)){//        $config['upload_path'] =  mkdir($path);//}  else {//    $config['upload_path'] =  mkdir($path);//}        $config['upload_path'] = realpath(APPPATH . '../upload/');        $config['allowed_types'] = 'gif|jpg|png|pdf';//        $config['file_name'] = date("YmdHis").$_FILES["file1"]["tmp_name"];        $this->upload->initialize($config);        if (!$this->upload->do_upload('file1')) {            $error = array('error' => $this->upload->display_errors());            //$this->template->build('admin/add_user', $error);        } else {            $uploaded = $this->upload->data();            $data["attachment"] = $uploaded["file_name"];            echo json_encode(array("status" => "success", "savedfilename" => $uploaded["file_name"], "filename" => $_FILES["file1"]["name"]));        }    }//    public function view_job_info() {////        if ($this->input->post()) {//            $data = $this->input->post();//            if ($data['update_type'] = 0) {//                $this->user_model->update_job($data);//            } else if ($data['update_type'] = 1) {//                $data['job_status'] = -1;//                $this->user_model->update_job($data);//            } redirect('admin/order_status');//        }//        $id = $_GET['job_id'];//        $data['jobs'] = $this->user_model->get_job_updates($id, TBL_JOBS, 'job_id');//        $data['updates'] = $this->user_model->get_job_updates($id, TBL_JOBS_UPDATES, 'job_id');//        $cust_id = $data['jobs'][0]->cust_id;//        $data['customer'] = $this->user_model->get_job_updates($cust_id, TBL_CUSTOMER, 'cust_id');//        $data['user'] = $this->user_model->get_job_update_join($data['jobs'][0]->job_id);//        $this->load->view('admin/update_job_popup', $data);//    }    public function send_to_laser() {        // $data['cad_status'] = '2';        $data['ord_id'] = $_POST['ord_id'];        $data['cad_remarks'] = $_POST['update_remarks'];        change_working_status('cad_status', WORK_COMPLETED, $data['ord_id']);        change_working_status('cad_remarks',$data['cad_remarks'], $data['ord_id']);        working_status_updates(CAD_COMPLETED, $_POST['update_remarks'], $data['ord_id']);        echo json_encode(array("status" => true, "message" => "Cad Work Completed."));//        $this->cad_model1->cad_status($data);//        $data['update_date'] = date('Y-m-d');//        $data['update_time'] = date('Y-m-d H:i:s');//        $data['job_cad_status'] = $data['update_for'] = '2';//        $data['update_status'] = '1';//        $data['update_to'] = 'CAD - Completed';//        $data['update_by'] = $_SESSION['user_id'];//        $data['update_remarks'] = $_POST['update_remarks'];//        $this->cad_model1->update_job($data);//        //  redirect('cad');    }    public function checklist() {        $data['ord_id'] = $_POST['ord_id'];        $data['ord_sts_id'] = $_POST['ord_sts_id'];        $this->load->view('cad/checklist', $data);    }    public function upload_to_archive() {        $config['upload_path'] = realpath(APPPATH . '../upload/');        $config['allowed_types'] = 'gif|jpg|png|pdf|zip|rar';        //  $config['file_name'] = date("YmdHis") . $_FILES["file"]["tmp_name"];        $this->upload->initialize($config);        if (!$this->upload->do_upload('file')) {            $error = array('error' => $this->upload->display_errors());            echo json_encode(array("status" => "failure", "message" => "File not uploaded."));            //$this->template->build('admin/add_user', $error);        } else {            $uploaded = $this->upload->data();            $data["file_name"] = $uploaded["file_name"];            $data["order_status_id"] = $_POST["order_id"];            $data['file_type'] = $_POST['type_of_upload'];            $this->cad_model1->upload_archive($data);            echo json_encode(array("status" => "success", "message" => "File Uploaded successfully.","savedfilename" => $uploaded["file_name"], "filename" => $_FILES["file"]["name"]));                    }    }    public function change_cad_status() {        $order_id = $this->uri->segment(3);        $data["order_status"] = $this->cad_model1->get_order_status($order_id);        if ($data["order_status"]['cad_status'] == 0) {            $this->cad_model1->change_cad_working($data["order_status"]['id']);            $encode = array("status" => true, "message" => "Cad Status Changed to Working.");        } elseif ($data["order_status"]['cad_status'] == 1 && $data["order_status"]['is_hold'] == 0) {            $encode = array("status" => false, "message" => "Cad status is already in working");        } elseif ($data["order_status"]['cad_status'] == 2) {            $encode = array("status" => false, "message" => "The Cad is already Completed");        } elseif ($data["order_status"]['is_hold'] == 0) {            $encode = array("status" => false, "message" => "Sorry ! The Cad design is in hold sent for clarification to the Client.");        }        echo json_encode($encode);    }    public function get_mail_subject() {        $data['eng_id'] = $_POST['eng_id'];        $data['mail_id'] = $_POST['mail_id'];        $data['ord_id'] = $_POST['ord_id'];        $data['customer'] = $this->customer_model->get_engineer_details($data['eng_id']);        $data['message'] = get_cad_mail_subject($data['mail_id']);        $names = array(            "{{FIRST_NAME}}" => $data['customer']['eng_fname'],            "{{ENGG_NAME}}" => $_SESSION['user_name']        );        $mail_body = strtr($data['message'][0]['mail_body'], $names);        echo $mail_body;    }    public function compare_check_list() {        $result = $this->cad_model1->compare_order_datas($_POST["order_id"], $_POST["to_check"], ($_POST["value"] == 'true') ? 1 : 0 );        if ($result) {            echo json_encode(array("status" => true));        } else {            echo json_encode(array("status" => false, "message" => "The value does not match with the order."));        }        exit;    }}