<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Shop extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('users_model');
        $this->load->library('form_validation');
    }
    public function signup(){
        if (!$this->input->post()) {
            $this->load->view('merchant/shop/signup');
        } else {
            $update_success = false;
            $this->form_validation->set_rules('shop_name', 'shop_address','shop_city', 'trim|required|max_length[255]');
            $this->form_validation->set_message('max_length', 'Max 255 characters only allowed');
            $this->form_validation->set_message('required', '%s can\'t be blank');
            $shop_signup = $this->input->post();
            $folder = 'shop';
            if ($_FILES['shop_img']['name'] != "") {
                if (!is_dir(FCPATH . '/images/'.$folder)) {
                    mkdir(FCPATH . '/images/'.$folder);
                }
                $config['upload_path'] = 'images/'.$folder.'/'; // Location to save the image
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['overwrite'] = false;
                $config['remove_spaces'] = true;
                $config['max_size'] = '10000'; // in KB
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('shop_img')){
                    $configThumb['image_library'] = 'gd2';
                    $configThumb['source_image'] = 'images/'.$folder.'/' . $this->upload->file_name;
                    $configThumb['create_thumb'] = false;
                    $configThumb['maintain_ratio'] = TRUE;
                    $configThumb['master_dim'] = 'width';
                    $configThumb['width'] = 800; // image re-size  properties
                    $configThumb['height'] = 800; // image re-size  properties 
                    $configThumb['new_image'] = 'images/'.$folder.'/'.'thumb_shop_' . $this->upload->file_name; // image re-size  properties 
                    $this->load->library('image_lib', $configThumb); //codeigniter default function
                    $this->image_lib->resize();
                    $shop_signup['shop_thumb'] = 'thumb_shop_' . $this->upload->file_name;
                    $shop_signup['shop_img'] = $this->upload->file_name;
                } else {
                    $data['shop_img'] = $this->upload->display_errors();
                }
                
            }
            if ($_FILES['shop_logo']['name'] != "") {
                if (!is_dir(FCPATH . '/images/'.$folder)) {
                    mkdir(FCPATH . '/images/'.$folder);
                }
                $configLogo['upload_path'] = 'images/'.$folder.'/'; // Location to save the image
                $configLogo['allowed_types'] = 'gif|jpg|png|jpeg';
                $configLogo['overwrite'] = false;
                $configLogo['remove_spaces'] = true;
                $configLogo['max_size'] = '10000'; // in KB
                $this->load->library('upload', $configLogo);
                $this->upload->initialize($configLogo);
                if ($this->upload->do_upload('shop_logo')){
                    $configLogoThumb['image_library'] = 'gd2';
                    $configLogoThumb['source_image'] = 'images/'.$folder.'/' . $this->upload->file_name;
                    $configLogoThumb['create_thumb'] = false;
                    $configLogoThumb['maintain_ratio'] = TRUE;
                    $configLogoThumb['master_dim'] = 'width';
                    $configLogoThumb['width'] = 800; // image re-size  properties
                    $configLogoThumb['height'] = 800; // image re-size  properties 
                    $configLogoThumb['new_image'] = 'images/'.$folder.'/'.'thumb_logo_' . $this->upload->file_name; // image re-size  properties 
                    $this->load->library('image_lib', $configLogoThumb); //codeigniter default function
                    $this->image_lib->resize();
                    $shop_signup['shop_thumb'] = 'thumb_logo_' . $this->upload->file_name;
                    $shop_signup['shop_logo'] = $this->upload->file_name;
                } else {
                    $data['shop_logo'] = $this->upload->display_errors();
                }
                
            }
            $this->db->insert('shop', $shop_signup);
            $update_success  = ($this->db->affected_rows() != 1) ? false : true;
            ($update_success)? redirect('home'): $this->load->view('merchant/shop/signup');
        }
    }
    
   
}
