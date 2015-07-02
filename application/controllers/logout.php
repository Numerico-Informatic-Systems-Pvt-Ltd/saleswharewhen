<?php
    /*Functions of this Controller have created for logout functionality of admin,merchant,user
     * index function is for admin login     
     * user function is for user login
     * merchant function is for merchant login
     */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class logout extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {
        $this->session->unset_userdata('admin');
        $this->session->sess_destroy();
        redirect('home');
    }
    public function user(){
        //$pagelink = $_GET['pagelink'];
        $this->session->unset_userdata('user');
        $this->session->sess_destroy();
        redirect('home');
    }
    public function merchant(){
        //$pagelink = $_GET['pagelink'];
        $this->session->unset_userdata('merchant');
        $this->session->sess_destroy();
        redirect('home');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */