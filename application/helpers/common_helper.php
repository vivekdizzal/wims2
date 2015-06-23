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
    $CI->db->where('ord_id', $id);
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
    $CI->db->where('ord_id', $id);
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
    }
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
    $data['ord_id'] = $ord_id;
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

function get_upload_details($order_status_id,$file_type) {
     $CI = get_instance();
    $CI->db->select('file_type');
    $CI->db->where('order_status_id', $order_status_id);
    $CI->db->where('file_type', $file_type);
    $query = $CI->db->get(TBL_ORDER_STATUS_FILES);
    if(!empty($query->result()))
    {return TRUE;}
else      {return FALSE;}
}
