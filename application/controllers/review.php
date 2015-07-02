<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Review extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('users_model');
        $this->load->model('review_model');
        $this->load->library('form_validation');
        /* if (!$this->session->userdata('admin')) {
          redirect('login');
          } */
    }

    public function getReview() {

        if (!$this->input->post()) {
            $this->load->view('review/getReview');
        } else {
            $current_url = $this->input->post('current_url');
            $arrar_review = array(
                'user_id' => $this->session->userdata('user')->id,
                'item_id' => $this->input->post('item_id'),
                'rate' => $this->input->post('rate'),
                'review_title' => $this->input->post('review_title'),
                'review_description' => $this->input->post('review_description'),
                'review_date' => date('Y-m-d H:i:s')
            );
            $this->db->insert('review', $arrar_review);           
            redirect($current_url);
        }
    }

    public function getVote() {
        $pid = $this->uri->segment(3);
        $data['getVote'] = $this->review_model->getVote($pid);
        if (!$this->input->post()) {
            $this->load->view('review/getVote', $data);
        }
    }

    public function ajaxUpdateVote() {       
        $voted_for = $this->input->post('voted_for');
        $ipaddress = $this->input->post('ipaddress');
        $data['update'] = $this->review_model->updateVote($voted_for, $ipaddress);
        $html = '';
        $html.='<small class="small darkgrey-txt display-block margin-top-spacing-5"><span style="text-align:centre;">Thank you for <br />your vote.</span></small>';
        echo $html;
    }
public function reviewForBrand(){
        $brand_review = array(            
            'user_id' => $this->session->userdata('user')->id,            
            'item_type'=> 2 , // 2 for brand
            'item_id' => $this->input->post('item_id'),
            'rate' => $this->input->post('rate'),
            'review_title' => $this->input->post('review_title'),
            'review_description' => $this->input->post('review_description'),
            'review_date' => date('Y-m-d H:i:s')
        );        
        $this->db->insert('review',$brand_review);
        $html='';
        $html.='success'; 
        echo $html;
    }

}

/* End of file review.php */
/* Location: ./application/controllers/review.php */
