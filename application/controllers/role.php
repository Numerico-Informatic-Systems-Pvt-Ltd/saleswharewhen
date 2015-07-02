<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Role extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('role_model');
		$this->load->model('users_model');
        if (!$this->session->userdata('admin')) {
            redirect('login');
        }
    }

    

    public function rolePermission() {
        $admin_id = $this->session->userdata('admin')->logged_id;
		$data['role_details'] = $this->session->userdata('role_details');
        $data['log_info'] = $this->users_model->logingInfo($admin_id);
        $role_name = $this->uri->segment(3);
		$data['role'] = $this->role_model->fetchMerchantType();
		
		$data['role_name'] = $role_name;
		if($role_name){
			$uid = $this->role_model->fetchRoleid($role_name);
			if(!$uid){
				$insert = array(
					'type' => $role_name
				);
				$this->db->insert('role_permission', $insert);
			}
		}
        if ($this->input->post()) {
            $roles = $this->input->post('roles');
			//print_r($this->input->post()); die;
            $type = $this->input->post('hid');
			if(isset($roles[0])){
				$roles_0 = 1;
			}else{
				$roles_0 = 0;
			}
			if(isset($roles[1])){
				$roles_1 = 1;
			}else{
				$roles_1 = 0;
			}
			if(isset($roles[2])){
				$roles_2 = 1;
			}else{
				$roles_2 = 0;
			}
			if(isset($roles[3])){
				$roles_3 = 1;
			}else{
				$roles_3 = 0;
			}
			if(isset($roles[4])){
				$roles_4 = 1;
			}else{
				$roles_4 = 0;
			}
			if(isset($roles[4])){
				$roles_4 = 1;
			}else{
				$roles_4 = 0;
			}
			if(isset($roles[5])){
				$roles_5 = 1;
			}else{
				$roles_5 = 0;
			}
			if(isset($roles[6])){
				$roles_6 = 1;
			}else{
				$roles_6 = 0;
			}
			if(isset($roles[7])){
				$roles_7 = 1;
			}else{
				$roles_7 = 0;
			}
			if(isset($roles[8])){
				$roles_8 = 1;
			}else{
				$roles_8 = 0;
			}
			if(isset($roles[9])){
				$roles_9 = 1;
			}else{
				$roles_9 = 0;
			}
			if(isset($roles[10])){
				$roles_10 = 1;
			}else{
				$roles_10 = 0;
			}
			if(isset($roles[11])){
				$roles_11 = 1;
			}else{
				$roles_11 = 0;
			}
			if(isset($roles[12])){
				$roles_12 = 1;
			}else{
				$roles_12 = 0;
			}
			if(isset($roles[13])){
				$roles_13 = 1;
			}else{
				$roles_13 = 0;
			}
			if(isset($roles[14])){
				$roles_14 = 1;
			}else{
				$roles_14 = 0;
			}
			if(isset($roles[15])){
				$roles_15 = 1;
			}else{
				$roles_15 = 0;
			}
			if(isset($roles[16])){
				$roles_16 = 1;
			}else{
				$roles_16 = 0;
			}
			
            $update = array(
                'merchants_list' => $roles_0,
                'user_list' => $roles_1,
                'category_list' => $roles_2,
                'category_add' => $roles_3,
				'brand_list' => $roles_4,
                'brand_add' => $roles_5,
                'shop_list' => $roles_6,
                'shop_add' => $roles_7,
				'deal_list' => $roles_8,
                'deal_post' => $roles_9,
                'review_list' => $roles_10,
                'advertisement_add' => $roles_11,
				'advertisement_list' => $roles_12,
                'page_add' => $roles_13,
                'page_list' => $roles_14,
				'image_list' => $roles_15,
				'manage_slider' => $roles_16
            );
			$uid = $this->role_model->fetchRoleid($type);
			if($uid){
				$this->db->where('id', $uid);
				$this->db->update('role_permission', $update);
			}
        }
		if($role_name){
			$data['details'] = $this->role_model->fetchRoleDetails($role_name);
		}
        $this->load->view('admin/manageRole', $data);
    }

   

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
