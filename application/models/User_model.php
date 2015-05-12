<?php

class User_model extends CI_Model {

    function login($username, $password) {

        $this->db->select('*');
        $this->db->from(TBL_USERS);
        $this->db->where('usr_logname', $username);
        $this->db->where('usr_logpwd', $password);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function user_list() {
        $this->db->select('*');
        $query = $this->db->get(TBL_USERS);
        return $query->result();
    }

    function add_user($data) {
        unset($data['submit']);
        //$data['usr_logpwd'] = MD5($data['usr_logpwd']);
        $this->db->insert(TBL_USERS, $data);
    }

    function edit_user($user_id) {

        $query = $this->db->query("select * from " . TBL_USERS . " where usr_id=" . $user_id);
        return $query->row_array();
    }

    function update_user($data) {
        unset($data['submit']);
        $this->db->where('usr_id', $data['usr_id']);
        $this->db->update(TBL_USERS, $data);
    }

    function delete_user($user_id) {

        $this->db->where('usr_id', $user_id);
        $this->db->delete(TBL_USERS);
    }

    function customer_list() {
        $this->db->select('*');
        $query = $this->db->get(TBL_CUSTOMER);
        return $query->result();
    }

    function new_customer($data) {
        unset($data['submit']);
        $this->db->insert(TBL_CUSTOMER, $data);
    }

    function edit_customer($cust_id) {

        $query = $this->db->query("select * from " . TBL_CUSTOMER . " where cust_id=" . $cust_id);
        return $query->row_array();
    }

    function update_customer($data) {
        unset($data['submit']);
        $this->db->where('cust_id', $data['cust_id']);
        $this->db->update(TBL_CUSTOMER, $data);
    }

    function delete_customer($cust_id) {

        $this->db->where('cust_id', $cust_id);
        $this->db->delete(TBL_CUSTOMER);
    }

    function user_rights($usr_id) {

        $query = $this->db->query("select * from " . TBL_USERS_RIGHTS . " where usr_id=" . $usr_id);
        return $query->result();
    }

    function rights($id) {
        $query = $this->db->query("select * from " . MST_SUB_MENU . " where mm_id=" . $id);
        return $query->result();
    }

    function delete_rights($id) {
        // unset($data['submit']);

        $this->db->where('usr_id', $id);
        $this->db->delete(TBL_USERS_RIGHTS);
        //  print_r($data);exit;
    }

    function update_rights($id, $data) {
        unset($data['submit']);
        $this->db->insert(TBL_USERS_RIGHTS, $data);
    }

    function get_job_updates($id, $table, $where) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where, $id);
        if ($table == TBL_JOBS_UPDATES) {
            $this->db->order_by("update_time", "desc");
        }
        $query = $this->db->get();
        return $query->result();
    }

    function get_job_update_join($id) {
        $this->db->select('*');
        $this->db->join(TBL_JOBS_UPDATES . " tj", 'tc.usr_id = tj.update_by');
        $this->db->where('job_id', $id);
        $this->db->order_by("update_time", "desc");
        $query = $this->db->get(TBL_USERS . " tc");
        return $query->result_array();
    }

    function update_priority($data) {
        unset($data['submit']);
        unset($data['update_remarks']);
        $this->db->where('job_id', $data['job_id']);
        $this->db->update(TBL_JOBS, $data);
    }

    function update_job($data) {
        unset($data['submit']);
        unset($data['update_remarks']);
        unset($data['update_type']);
        $this->db->where('job_id', $data['job_id']);
        $this->db->update(TBL_JOBS, $data);
    }

    function check_ref_no($refno) {

        $this->db->select('*');
        $this->db->from(TBL_CUSTOMER);
        $this->db->where('cust_ref', $refno);
        $query = $this->db->get();
        return $query->result();
    }

    function has_permission($id) {
        $user_right = $this->user_rights($id);
        $rights = $this->rights('1');
//        print_r($rights);
//        $this->db->select('sm_id');
//        $this->db->from(TBL_USERS_RIGHTS);
//        $this->db->where('usr_id',$id);
//        $query = $this->db->get();
        return $user_right->result();
    }

}
