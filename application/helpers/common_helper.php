<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function get_cad_order_status($id, $min, $max) {
    $CI = get_instance();
    $CI->db->select('update_time');
    $CI->db->select('update_status');
    $CI->db->where('order_status_id', $id);
    // $CI->db->where('update_status >=', $min);
    $where = '(update_status= "5" or update_status = "0")';
    $CI->db->where($where);
    $CI->db->order_by('update_status', "desc");
    $CI->db->limit('1');
    $query = $CI->db->get(TBL_ORDER_STATUS_UPDATE);
    return $query->result_array();
}

function get_order_status($id, $min, $max) {
    $CI = get_instance();
    $CI->db->select('update_time');
    $CI->db->select('update_status');
    $CI->db->where('order_status_id', $id);
    $CI->db->where('update_status >=', $min);
    $CI->db->where('update_status <=', $max);
    $CI->db->order_by('update_status', "desc");
    $CI->db->limit('1');
    $query = $CI->db->get(TBL_ORDER_STATUS_UPDATE);
    return $query->result_array();
}

function user_has_right($rights_id) {
    $CI = get_instance();
    $CI->load->model('user_model');
    $user_id = $CI->session->userdata('user_id');
    $query = $CI->db->query("select * from " . TBL_USERS_RIGHTS . " where usr_id=" . $user_id);
    $rights = $query->result();
    $user_right = array();
    foreach ($rights as $right) {
        array_push($user_right, $right->sm_id);
    }// print_r($user_right);exit;
    if (in_array($rights_id, $user_right)) {
        return TRUE;
    } else {
        return FALSE;
    }
}

function get_frame_sizes() {
    $CI = get_instance();
    $CI->db->select('*');
    $query = $CI->db->get(TBL_FRAME_USED);
    $data = "";
    foreach ($query->result_array() as $values) {
        $data .= '"' . $values["frame"] . '",';
    }

    return trim($data, ",");
}

function get_cad_mail_subject($mail_id = '') {
    $CI = get_instance();
    $CI->db->select('*');
    if (!empty($mail_id)) {
        $CI->db->where('mail_id', $mail_id);
    }
    $query = $CI->db->get(TBL_MAIL_TEMPLATES);
    return $query->result_array();
}

function change_working_status($fieldname, $fieldvalue, $ord_id) {
    $CI = get_instance();
    $CI->db->where('ord_id', $ord_id);
    $data[$fieldname] = $fieldvalue;
    // $CI->db->
    $CI->db->update(TBL_ORDER_STATUS, $data);
}

function working_status_updates($update_status, $update_remarks, $ord_id) {
    $CI = get_instance();
    //$data['ord_id'] = $ord_id;
    $data['update_status'] = $update_status;
    $data['update_by'] = $CI->session->userdata('user_id');
    $data['update_time'] = date('Y-m-d H-i-s');
    $data['update_remarks'] = $update_remarks;
    $CI->db->insert(TBL_ORDER_STATUS_UPDATE, $data);
}

function get_aper_count($id, $field, $table) {
    $CI = get_instance();
    $CI->db->select($field);
    $CI->db->where('order_status_id', $id);
    $query = $CI->db->get($table);
    return $query->result();
}

function get_upload_details($order_status_id, $file_type) {
    $CI = get_instance();
    $CI->db->select('file_type');
    $CI->db->where('order_status_id', $order_status_id);
    $CI->db->where('file_type', $file_type);
    $query = $CI->db->get(TBL_ORDER_STATUS_FILES);
    return $query->result();
}

function get_foil_thickness($cad_checklist_id) {
    $CI = get_instance();
    $CI->db->select('thickness');
    $CI->db->where('cad_checklist_id', $cad_checklist_id);
    return $CI->db->get(TBL_FOIL_THICKNESS)->row_array();
}

function get_fiducials($cad_checklist_id, $table, $select) {
    $CI = get_instance();
    $CI->db->select($select);
    $CI->db->where('cad_checklist_id', $cad_checklist_id);
    return $CI->db->get($table)->result_array();
}

function get_border($id) {
    $CI = get_instance();
    $CI->db->select('border_size');
    $CI->db->where('border_id', $id);
    return $CI->db->get(TBL_FRAME_BORDERS)->row_array();
}

function GetSingleReconrd($tbl, $sf, $wf, $val) {
    $CI = get_instance();
    $SQL = "SELECT " . $sf . " AS val FROM " . $tbl . " WHERE " . $wf . " = '" . $val . "' ";
    $result = $CI->db->query($SQL);
    if (!empty($result)) {
        $obj = $result->result();
        return $obj[0]->val;
    }
}

function MyFormatDate($MyDate) {
    /*
      Take a date in yyyy-mm-dd format and return it to the user
      in a PHP timestamp
     */
    $date_array = explode("-", $MyDate); // split the array

    $var_year = $date_array[0];
    $var_month = $date_array[1];
    $var_day = $date_array[2];

    //$var_Dt =  $var_day."-".substr(date('F', mktime(0, 0, 0, $var_month,1)),0,3)."-".$var_year;
    $var_Dt = $var_month . "-" . $var_day . "-" . $var_year;
    //$var_Dt =  $var_day."-".$var_month."-".$var_year;

    return($var_Dt); // return it to the user
}

function Find_Time($Time) {
    if ($Time < 1) {
        $Time = $Time + 12;
        $Time = number_format($Time, 2) . " AM";
    } elseif ($Time < 11.59) {
        $Time = number_format($Time, 2) . " AM";
    } else {
        $Time = $Time - 12;
        if ($Time < 1) {
            $Time = $Time + 12;
            $Time = number_format($Time, 2) . " PM";
        } else {
            $Time = number_format($Time, 2) . " PM";
        }
    }
    return str_replace(".", ":", $Time);
}

function GetShippingAdd($ship_id) {
    $CI = get_instance();
    $sql = "SELECT * FROM tbl_order_shipping WHERE ship_id  = " . $ship_id;
    $result = $CI->db->query($sql);
    if ($result->num_rows()>0) {
        $obj = $result->result();
        $obj = $obj[0];
        $add = "";
        if ($obj->ship_addr1 != "") {
            $add .= $obj->ship_addr1;
        }
        if ($obj->ship_addr2 != "") {
            $add .= ", " . $obj->ship_addr2;
        }
        if ($obj->ship_city != "") {
            $add .= ", " . $obj->ship_city;
        }
        if ($obj->ship_state != 0) {
            $add .= ", " . GetSingleReconrd("mst_state", "state_name", "state_id", $obj->ship_state);
        }
        $add .= ", " . GetSingleReconrd("mst_country", "country_name", "country_id", $obj->ship_country);

        if ($obj->ship_postcode != "") {
            $add .= " - " . $obj->ship_postcode;
        }
    } else {
        $add = "-";
    }
    return $add;
}

function get_order_file($ord_id) {
    $CI = get_instance();
    $sel_ord_file = $CI->db->query("SELECT ord_file FROM tbl_order_file WHERE ord_id=" . $ord_id);
    if ($sel_ord_file->num_rows()>0) {
        return $sel_ord_file->result_array();
    }
}
