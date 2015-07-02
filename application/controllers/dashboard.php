<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('users_model');
        $this->load->model('merchant_model');
        $this->load->model('admin_model');
        if (!$this->session->userdata('admin')) {
            redirect('login');
        }
    }

    public function index() {
//        $data['role_details'] = $this->session->userdata('role_details');
//        if ($data['role_details']->merchants_list == 1) {
//            $admin_id = $this->session->userdata('admin')->logged_id;
//            $data['log_info'] = $this->users_model->logingInfo($admin_id);
//            $data['merchant_list'] = $this->merchant_model->getAllMerchants();
//           
//        } else {
//            $this->load->view('admin/access', $data);
//        }
        $data['role_details'] = $this->session->userdata('role_details');
        $admin_id = $this->session->userdata('admin')->logged_id;
        $data['log_info'] = $this->users_model->logingInfo($admin_id);
        $data['deals_count'] = $this->admin_model->getDealsCount($admin_id);
        $logged_user_id = $this->session->userdata('admin');
        $data['user_logged_name'] = $this->users_model->getUserLoggedInName($logged_user_id->logged_id);
        $this->load->view('admin/dashboard', $data);
    }

    public function merchantList() {
        $data['role_details'] = $this->session->userdata('role_details');
        if ($data['role_details']->merchants_list == 1) {
            $admin_id = $this->session->userdata('admin')->logged_id;
            $data['log_info'] = $this->users_model->logingInfo($admin_id);
            $data['merchant_list'] = $this->merchant_model->getAllMerchants();
            $logged_user_id = $this->session->userdata('admin');
            $data['user_logged_name'] = $this->users_model->getUserLoggedInName($logged_user_id->logged_id);
            $this->load->view('admin/merchants/merchant_show', $data);
        } else {
            $this->load->view('admin/access', $data);
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */