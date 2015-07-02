<?php

Class users_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function login($data) {
        $query = $this->db->get_where('merchant', array('email_id' => $data['email'], 'password' => $data['password'], 'type' => $data['type']));
        $result = ($query->num_rows() > 0) ? $query->first_row() : '';
        return $result;
    }

    function logingInfo($id) {
        $query = $this->db->get_where('admin', array('id' => $id));
        $result = ($query->num_rows() > 0) ? $query->first_row() : '';
        return $result;
    }

    /* user login function is used as common login function for both user and merchant in the frontend */

    function user_login($data, $table) {
        $query = $this->db->get_where($table, array('email_id' => $data['email_id'], 'password' => $data['password'], 'status' => 1));
        $result = ($query->num_rows() > 0) ? $query->first_row() : '';
        return $result;
    }

    /* this function will show allthe active & inactive users */

    function getUsersList($id = null) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('city', 'city.city_id = users.city');
        if ($id) {
            $this->db->where(array('users.id' => $id, 'users.is_deleted' => 1));
            $query = $this->db->get();
            $results = $query->first_row();
        } else {
            $this->db->where(array('users.is_deleted' => 1));
            $query = $this->db->get();
            $results = $query->result();
        }

        return $results;
    }

    /* this function will show citylist */

    function getCityList() {
        $this->db->select('*');
        $this->db->from('city');
        $this->db->order_by("city_name", "asc");
        $query = $this->db->get();
        return $query->result();
    }

    /* this function is a common function for changing password */

    function changePassword($input, $table) {
        $this->db->update($table, $input, array('id' => $input->id));
        $result = ($this->db->affected_rows() != 1) ? '' : 1;
        return $result;
    }

    /* this function will fetch  individual user details */

    public function getUserDetails($id) {
        $this->db->select('*');
        $this->db->from('users u');
        $this->db->join('city c', 'c.city_id = u.city', 'LEFT');
        $this->db->where(array('u.id' => $id, 'u.status' => 1, 'u.is_deleted' => 1));
        $query = $this->db->get();
        $results = ($query->num_rows() > 0) ? $query->first_row() : '';
        return $results;
    }

    /* this function will insert & update individual user */

    public function manageUser($input, $id = null) {
        //print_r($input);exit;
        if ($id) {
            $this->db->update('users', $input, array('id' => $id));
            $result = ($this->db->affected_rows() != 1) ? '' : 1;
        } else {
            $this->db->insert('users', $input);
            $result = $this->db->insert_id();
        }
        return $result;
    }

    public function emailCheck($email) {
        $sql = "SELECT email_id FROM users WHERE email_id = '" . $email . "'";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->first_row();
        }
    }

    public function passwordReset($random_password, $user_email) {

        $update = array(
            'password' => md5($random_password),
            'forgot_password'=>0
        );

        $this->db->update('users', $update, array('email_id' => $user_email));
    }

    public function getUsers() {
        $query = $this->db->get_where('users', array('is_deleted' => 1));
        $results = $query->result();
        return $results;
    }

    public function checkPass($userid) {
        $sql = "SELECT password FROM users WHERE id = '" . $userid . "'";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->first_row();
        }
    }

    public function checkFacebookId($fuserid) {
        $sql = "SELECT * FROM users WHERE facebook_login_id = '" . $fuserid . "'";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->first_row();
        }
    }
    public function checkEmail($email) {
        $sql = "SELECT * FROM merchant WHERE email_id = '" . $email . "'";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->first_row()->id;
        }
        else{
            return FALSE;
        }
    }
	public function getUserInfo($id) {
        $sql = "SELECT * FROM users WHERE id = '" . $id . "' AND is_deleted = 1 ";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->first_row();
        }
    }

    public function getUsersWithCheckFb($id) {
        $sql = "select * from users WHERE facebook_login_id = '" . $id . "' ";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            $result = $query->first_row()->id;
            return $result;
        } else {
            return false;
        }
    }

    public function getUsersWithMail($mail) {
        $sql = "select * from users WHERE email_id = '" . $mail . "' ";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            $result = $query->first_row()->id;
            return $result;
        } else {
            return false;
        }
    }
    
    public function getUserLoggedInName($user_id){
        $sql = "select first_name,last_name from merchant WHERE id = '" . $user_id . "' ";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            $result = $query->first_row();
            return $result;
        }
    }
    
    public function checkmerchantEmail($email){
        $sql = "select id from merchant WHERE email_id = '" . $email . "' ";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {            
            return FALSE;
        }
        else {
            return TRUE;
        }
    }

public function logingInfoDetails($userid) {
        $sql = "SELECT password FROM merchant WHERE id = '" . $userid . "'";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->first_row()->password;
        }
    }

}

?>
