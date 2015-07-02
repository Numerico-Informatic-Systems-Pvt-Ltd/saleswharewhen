<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Deals extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('users_model');
        $this->load->model('deals_model');
        $this->load->model('shop_model');
        $this->load->model('category_model');
        if (!$this->session->userdata('merchant')) {
            redirect('login/merchant');
        }
    }
	public function manage($id=null){
            if($id){
                $data['deal_details']=$this->deals_model->getDealDetails($id);
            }
            if($this->input->post()){
                $update_success = '';
                $this->form_validation->set_rules('shop_id', 'Shop Name', 'trim|required|max_length[200]');
                $this->form_validation->set_message('max_length', 'Max 200 characters only allowed');
                $this->form_validation->set_message('required', '%s can\'t be blank');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('admin/deals/manage', $data);
                } else {
                    $folder = 'offers';
                    $input = $this->input->post();
                    if ($_FILES['banner']['name'] != "") {
                    if (!is_dir(FCPATH . '/images/'.$folder)) {
                        mkdir(FCPATH . '/images/'.$folder);
                    }
                    $config['upload_path'] = 'images/'.$folder.'/'; // Location to save the image
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['overwrite'] = false;
                    $config['remove_spaces'] = true;
                    $config['max_size'] = '10000'; // in KB
                    $config['max_width'] = '600';
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('banner')) {
                        $input['banner'] = $this->upload->file_name;
                    } else {
                        $data['banner'] = $this->upload->display_errors();
                    }
                    if ($this->upload->do_upload('logo')) {
                        $input['logo'] = $this->upload->file_name;
                    } else {
                        $data['logo'] = $this->upload->display_errors();
                    }
                }
                $update_success = ($id) ? $this->deals_model->manage($input,$id) : $this->deals_model->manage($input);
                $deal_id = ($id) ? $id : $update_success;
                $folder_new = $deal_id;
                if (!is_dir(FCPATH . '/images/offers/'.$folder_new)) {
                    mkdir(FCPATH . '/images/offers/'.$folder_new);
                }
                $configDealImage['upload_path'] = 'images/offers/'.$folder_new.'/'; // Location to save the image
                $configDealImage['allowed_types'] = 'gif|jpg|png|jpeg';
                $configDealImage['overwrite'] = false;
                $configDealImage['remove_spaces'] = true;
                $configDealImage['max_size'] = '1000'; // in KB
                $this->load->library('upload', $configDealImage);
                $this->upload->initialize($configDealImage);
                for($i=1;$i<6;$i++){
                    $file_name = 'deal_image'.$i;
                    if($this->upload->do_upload($file_name)){
                    $files[] = $this->upload->file_name;
                    }
                }
                //print_r($files);exit;
                $this->deals_model->manageDealImages($files,$deal_id);
                ($update_success)? redirect('merchant/listing'):redirect('merchant/manage');
                }

            }else{
                $data['merchant'] = $this->session->userdata('merchant')->id;
                $data['shop_list'] = $this->shop_model->getShopListByMerchant($data['merchant']);
                $data['category_list'] = $this->category_model->getCategory();
                $this->load->view('merchant/deals/manage',$data);
            }
                        
	}
	
	public function listing(){
            $merchant_id = $this->session->userdata('merchant')->id;
            $data['deals']= $this->deals_model->getDealsByMerchant($merchant_id);   
            $this->load->view('merchant/deals/listing',$data);
	}
        
}

?>
