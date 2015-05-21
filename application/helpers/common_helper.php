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
