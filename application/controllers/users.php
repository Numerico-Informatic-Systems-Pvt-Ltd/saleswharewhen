<?php

/*
 * Functions of this Controller is accessible only for users.
 * profile function is for user profile view
 * changepassword function is for changing user login password by logged in user 
 * updateProfile function is for updating user profile 
 * myopinion function is a list of user reviews given for various deals
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('users_model');
        $this->load->model('category_model');
        $this->load->model('brand_model');
        $this->load->model('deals_model');
        $this->load->library('form_validation');
        if (!$this->session->userdata('user')) {
            redirect('login/user');
        }
    }

    public function myAccount() {
        $user_id = $this->session->userdata('user')->id;
        $data['cityList'] = $this->users_model->getCityList();
        $data['userLogin'] = $this->users_model->getUserDetails($user_id);
        $data['categoryMegamenu'] = $this->category_model->getCategoryMegaMenu();
        $data['city_list'] = $this->users_model->getCityList();
        $data['brand_list'] = $this->brand_model->getBrandList();
        $data['shop_list'] = $this->deals_model->getShopList(); //change
        if (!$this->input->post()) {
            $this->load->view('users/myAccount', $data);
        } else {

            $userprofile = $this->input->post();
            $this->db->update('users', $userprofile, array('id' => $user_id));
            redirect('users/myAccount');
        }
    }

    public function editProfile() {
        $user_id = $this->session->userdata('user')->id;
        $data['user_details'] = $this->users_model->getUsersList($user_id);
        if ($this->input->post()) {
            
        }
        $this->load->view('users/update_profile', $data);
    }

    public function changePassword() {
        $user_id = $this->session->userdata('user')->id;
        if (!$this->input->post()) {
            $this->load->view('users/myAccount');
        } else {
            $pass_update = array(
                'password' => md5($this->input->post('new_password')),
                'forgot_password'=>1
            );
            $this->db->update('users', $pass_update, array('id' => $user_id));
            redirect('logout/user');
        }
    }

    public function checkPassword() {
        $old_pass = $this->input->post('oldpass');
        $user_id = $this->session->userdata('user')->id;
        $cha_pass = $this->users_model->checkPass($user_id);
        //print_r($cha_pass->password);
        if (md5($old_pass) == $cha_pass->password) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function myopinion() {
        
    }

    

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */
?>
