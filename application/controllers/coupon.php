<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Coupon extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('coupons_model');
    }

    
}

/* End of file coupons.php */
/* Location: ./application/controllers/coupons.php */