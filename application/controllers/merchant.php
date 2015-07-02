<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Merchant extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('users_model');
        $this->load->model('merchant_model');
        if (!$this->session->userdata('merchant')) {
            redirect('login/merchant');
        }
    }
    public function profile(){
        $merchant_id = $this->session->userdata('merchant')->id;
        $data['merchant_details']=$this->merchant_model->getMerchantDetails($merchant_id);
        echo "<pre>";print_r($data['merchant_details']);exit;
        $this->load->view('merchant/profile');
    }
    public function editProfile(){
        $data['merchant_id'] = $this->session->userdata('merchant')->id;
        $data['merchant_details']=$this->merchant_model->getMerchantDetails($data['merchant_id']);
        if($this->input->post()){
            $merchant_details = $this->input->post();
            $this->merchant_model->manageMerchant($merchant_details,$data['merchant_id']);
        }
        $this->load->view('merchant/update_profile',$data);
    }
    public function changepassword(){
        
    }
    
}

/* End of file merchant.php */
/* Location: ./application/controllers/merchant.php */