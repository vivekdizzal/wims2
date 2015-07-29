<?php

class User_model extends CI_Model {

    function login($username, $password) {
        $this->db->select('*');
        $this->db->from(TBL_USERS);
        $this->db->where('usr_logname', $username);
        $this->db->where('usr_logpwd', md5("$password:KabiCis4"));
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function forget_password($username, $email) {
        $this->db->select('usr_id', 'usr_logname', 'usr_email');
        $this->db->from(TBL_USERS);
        $this->db->where('usr_logname', $username);
        $this->db->where('usr_email', $email);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function update_password($data) {
        $password = $data['usr_logpwd'];
        $data['usr_logpwd'] = md5("$password:KabiCis4");
        $this->db->where('usr_id', $data['usr_id']);
        $this->db->update(TBL_USERS, $data);
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
        $this->db->where('usr_id', $id);
        $this->db->delete(TBL_USERS_RIGHTS);
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

    function get_job_update_join($id, $max = '', $min = '') {
        $this->db->select('*');
        $this->db->join(TBL_ORDER_STATUS_UPDATE . " tosu", 'tu.usr_id = tosu.update_by');
        $this->db->where('tosu.order_status_id', $id);
        if (!empty($max)) {
            $this->db->where('update_status >=', $min);
            $this->db->where('update_status <=', $max);
        }
        $this->db->order_by("tosu.update_time", "desc");
        $query = $this->db->get(TBL_USERS . " tu");
        return $query->result_array();
    }

    function update_priority($data) {

        unset($data['submit']);
        unset($data['order_status_id']);
        $this->db->where('ord_id', $data['ord_id']);
        $this->db->update(TBL_JOBS, $data);
    }

    function priority_update($data) {
        unset($data['submit']);
        unset($data['is_hold']);
        unset($data['job_priority']);
        unset($data['ord_id']);
        $this->db->insert(TBL_ORDER_STATUS_UPDATE, $data);
    }

    function update_tooling($data) {
        $this->db->where('ord_id', $data['ord_id']);
        $this->db->update('tbl_jobs', $data);
    }

    function update_job($data) {
        unset($data['submit']);
        unset($data['update_type']);
        if ($data['job_status'] == '-1') {
            $this->db->where('ord_id', $data['ord_id']);
            $this->db->update('tbl_jobs', $data);
        }
        unset($data['job_status']);
        unset($data['job_priority']);
        $this->db->insert(TBL_JOBS_UPDATES, $data);
    }

    function check_ref_no($refno) {

        $this->db->select('*');
        $this->db->from(TBL_CUSTOMER);
        $this->db->where('cust_ref', $refno);
        $query = $this->db->get();
        return $query->result();
    }

    function has_permission($id, $right) {
        $user_right = $this->user_rights($id);
        $rights = $this->rights('1');
        if (in_array($rights, $user_right)) {
            return true;
        } else {
            return false;
        }
    }

}
