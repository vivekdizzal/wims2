<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function get_order_status($id) {
    $CI = get_instance();
    $CI->db->select('*');
    $CI->db->where('ord_id', $id);
    $CI->db->order_by('update_time', 'desc');
    $CI->db->limit('1');
    $query = $CI->db->get(TBL_ORDER_STATUS_UPDATE);
    return $query->result_array();
}
