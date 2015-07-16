<?php

class cad_model1 extends CI_Model {

    function get_cad_status($priority, $cad_status, $date) {
//            $CI = &get_instance();
//        //setting the second parameter to TRUE (Boolean) the function will return the database object.
//        $this->db = $CI->load->database('wims1db', TRUE);
        $this->db->select('to.ord_id,to.ad_dt,tc.cust_name,tc.contact_name,tc.contact_no,te.eng_email,to.order_code,tos.cad_status,to.ad_by');
        $this->db->join(TBL_ORDER . " to", 'tos.ord_id = to.ord_id');
        $this->db->join(TBL_CUSTOMER . " tc", 'to.cust_id = tc.cust_id');
        $this->db->join(TBL_ENGINEER . " te", 'to.ad_by = te.eng_id');
        $this->db->join(TBL_JOBS . " toj", 'tos.ord_id = toj.ord_id');
        $this->db->where_in('cad_status', array(WORK_NOT_STARTED, WORK_STARTED));
        $this->db->where('tos.is_hold', WORK_NOT_IN_HOLD);
        $this->db->where('toj.job_priority', $priority);
        $this->db->where('to.ord_dt', $date);
        $query = $this->db->get(TBL_ORDER_STATUS . " tos");
        return $query->result_array();
    }

    function cad_status($data) {
//            $CI = &get_instance();
//        //setting the second parameter to TRUE (Boolean) the function will return the database object.
//        $this->wims1db = $CI->load->database('wims1db', TRUE);
        $this->db->where('job_id', $data['job_id']);
        $this->db->update('tbl_jobs', $data);
    }

    function update_job($data) {
//    $CI = &get_instance();
//        //setting the second parameter to TRUE (Boolean) the function will return the database object.
//        $this->wims1db = $CI->load->database('wims1db', TRUE);
        unset($data['job_cad_status']);
        $this->db->insert(TBL_JOBS_UPDATES, $data);
    }

    function upload_archive($data) {
        $this->db->insert(TBL_ORDER_STATUS_FILES, $data);
    }

    function update_archive($data) {
        $this->db->where('order_status_id', $data['order_status_id']);
        $this->db->where('file_type', $data['file_type']);
        $this->db->update(TBL_ORDER_STATUS_FILES, $data);
    }

    function uploaded_files_details($order_status_id, $file_type) {
        $this->db->select('*');
        $this->db->where('order_status_id', $order_status_id);
        $this->db->where('file_type', $file_type);
        $query = $this->db->get(TBL_ORDER_STATUS_FILES);
//        print_r($query->row_array());exit;
        return $query->row_array();
    }

    function get_order_status($id) {
        $this->db->where('ord_id', $id);
        return $this->db->get(TBL_ORDER_STATUS)->row_array();
    }

    function change_cad_working($id) {
        $this->db->where('id', $id);
        $data['cad_status'] = 1;
        $this->db->update(TBL_ORDER_STATUS, $data);
    }

    function change_cad_working_history($data) {
        $data['update_by'] = $this->session->userdata('user_id');
        $data['update_time'] = date("Y-m-d H:i:s");
        $this->db->insert(TBL_ORDER_STATUS_UPDATE, $data);
    }

    function compare_check_list($data) {
        $this->db->select($data['cl_data']);
        $this->db->where($data['cl_data'], $data['cl_value']);
        return $this->db->get(TBL_CAD_CHECKLIST)->row_array();
    }

    function compare_order_datas($order_id, $field_name, $field_value) {

        $this->db->select($field_name);
        $this->db->where('ord_id', $order_id);
        $this->db->where($field_name, $field_value);
        return count($this->db->get(TBL_ORDER)->result_array());
    }

    function get_borders($frame_name) {
        $this->db->select("frame_id");
        $this->db->where("frame", $frame_name);
        $frame_id = $this->db->get(TBL_FRAME_USED)->row_array();
//        return ($frame_id);
        $this->db->select("*");
        $this->db->where("frame_used_id", $frame_id["frame_id"]);
        return $this->db->get(TBL_FRAME_BORDERS)->result_array();
    }

    function compare_frame_size($frame_used, $order_id) {
        $this->db->select('to.frm_size');
        $this->db->where('to.ord_id', $order_id);
        $frame = $this->db->get(TBL_ORDER . " to")->row_array();

        $this->db->select('mst_main_value');
        $this->db->where('mst_main_id', $frame["frm_size"]);
        $this->db->where('mst_main_value', $frame_used);
        $frame_result = $this->db->get(MST_MAIN)->row_array();
        return (!empty($frame_result)) ? true : false;
    }

//    function get_order_engineer($order_id) {
//        $this->db->select('te.eng_fname,te.eng_lname');
//        $this->db->join(TBL_ORDER . " to", 'to.eng_id = te.eng_id');
//        $this->db->where('to.ord_id', $order_id);
//        $query = $this->db->get(TBL_ENGINEER . " te");
//        return $query->row_array();
//    }

    function compare_foil_thickness($foil_thickness, $order_id, $key) {
        $this->db->select('to.' . $key . "_foil_thik");
        $this->db->where('to.ord_id', $order_id);
        $this->db->where('to.' . $key . "_foil_thik", $foil_thickness);
        $foil_thick = $this->db->get(TBL_ORDER . " to")->row_array();
        return (!empty($foil_thick)) ? true : false;
    }

    function compare_border_used($border_used, $order_id) {
//        $this->db->select('to.' . "_foil_thik");
//        $this->db->where('to.ord_id', $order_id);
//        $this->db->where('to.' . $key . "_foil_thik", $border_used);
//        $border = $this->db->get(TBL_ORDER . " to")->row_array();
//        return (!empty($foil_thick)) ? true : false;
    }

    function checklist_data($data) {
        $this->db->insert(TBL_CAD_CHECKLIST, $data);
        return $this->db->insert_id();
    }

    function get_checklist_stats($order_status_id) {
        $this->db->select('order_status_id');
        $this->db->where('order_status_id', $order_status_id);
        $stats = $this->db->get(TBL_CAD_CHECKLIST)->row_array();
        
        return (!empty($stats)) ? true : false;
    }

    function update_checklist($data) {
//        $this->db->where('order_status_id', $data['order_status_id']);
//        $this->db->update(TBL_CAD_CHECKLIST, $data);
    }

    function fiducial_qty($data) {
        $this->db->insert(TBL_FIDUCIAL_QUANTITY, $data);
    }

    function fiducial_dcode($data) {
        $this->db->insert(TBL_FIDUCIAL_DCODE, $data);
    }

    function foil_thickness($id, $foil) {
        $data['cad_checklist_id'] = $id;
        $data['thickness'] = $foil;
        $this->db->insert(TBL_FOIL_THICKNESS, $data);
    }

    function notes_to_laser($data) {
        $this->db->where('ord_id', $data['ord_id']);
        $this->db->update(TBL_ORDER_STATUS, $data);
    }

    function error_log($data) {
        $data['update_by'] = $this->session->userdata('user_id');
        $data['update_time'] = date("Y-m-d H:i:s");
        $this->db->insert(TBL_ORDER_STATUS_UPDATE, $data);
    }

    function mail_templates($data) {
        $this->db->insert(TBL_MAIL_TEMPLATES, $data);
    }

    function edit_templates($data) {
        $this->db->where('mail_id', $data['mail_id']);
        $this->db->update(TBL_MAIL_TEMPLATES, $data);
    }

    function get_templates($id = "") {
        $this->db->select('*');
        if (!empty($id)) {
            $this->db->where('mail_id', $id);
        }
        $query = $this->db->get(TBL_MAIL_TEMPLATES);
        return $query->result();
    }

    function delete_templates($id) {
        $this->db->where('mail_id', $id);
        $this->db->delete(TBL_MAIL_TEMPLATES);
    }

}
