<?phpclass Cad extends CI_Controller {    public function __construct() {        parent::__construct();        $this->load->model('cad_model');        $this->load->library('email');        $this->load->library('upload');    }    public function index() {        $date = date("2015-04-17");        $this->load->model('cad_model');        $data['completed'] = $this->cad_model->get_cad_status('2', $date);        $data['pending'] = $this->cad_model->get_cad_status('1', $date);        $data['hold'] = $this->cad_model->get_cad_status('0', $date);        $this->template->build("cad/cad_orders", $data);    }    public function cad_new_job() {        header('Access-Control-Allow-Origin: *');        $this->load->view('cad/cad_popup');    }    public function cad_mail_to_customer() {        header('Access-Control-Allow-Origin: *');        if ($this->input->post()) {            $data = $this->input->post();                        $config['protocol']    = 'smtp';            $config['smtp_host']    = 'ssl://smtp.gmail.com';            $config['smtp_port']    = '465';            $config['smtp_timeout'] = '7';            $config['smtp_user']    = 'sribabuixly@gmail.com';            $config['smtp_pass']    = '123456sri';            $config['charset']    = 'utf-8';            $config['newline']    = "\r\n";            $config['mailtype'] = 'text'; // or html            $config['validation'] = TRUE; // bool whether to validate email or not                  $this->email->initialize($config);//            $config = Array(//                'protocol' => 'smtp',//                'smtp_host' => 'ssl://smtp.googlemail.com',//                'smtp_port' => 465,//                'smtp_user' => 'sribabuixly@gmail.com', // change it to yours//                'smtp_pass' => '123456sri', // change it to yours//                'mailtype' => 'html',//                'charset' => 'iso-8859-1',//                'wordwrap' => TRUE//            );           // $this->upload->initialize($config);//            if (!$this->upload->do_upload('attachment')) {//                $error = array('error' => $this->upload->display_errors());//                $this->template->build('admin/add_user', $error);//            } else {//                $uploaded = $this->upload->data();//                $data["attachment"] = $uploaded["file_name"];//                //echo json_encode(array("status" => "success", "filename" => $uploaded["file_name"]));//            }           // $this->load->library('upload', $config);            $this->email->set_newline("\r\n");            $this->email->from('sribabuixly@gmail.com', 'sribabu');            $this->email->to('sribabuixly@gmail.com');            $this->email->cc('sribabuixly@gmail.com');            $this->email->attach('http://www.beamon.com/wims2/upload/abc.jpg');            $this->email->subject('test');            $this->email->send();            if (!$this->email->send()) {                echo "Error Sending email";            } else {                redirect('cad');            }        }        $this->load->view('cad/mail_to_customer');    }    public function upload_attachment() {        $config['upload_path'] = realpath(APPPATH . '../upload/');        $config['allowed_types'] = 'gif|jpg|png';        $config['file_name'] = "cad.jpg";        $this->upload->initialize($config);        if (!$this->upload->do_upload('usr_photo')) {            $error = array('error' => $this->upload->display_errors());            $this->template->build('admin/add_user', $error);        } else {            $uploaded = $this->upload->data();            $data["attachment"] = $uploaded["file_name"];            echo json_encode(array("status" => "success", "filename" => $uploaded["file_name"]));        }    }}