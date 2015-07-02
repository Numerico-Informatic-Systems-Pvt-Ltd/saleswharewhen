<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
	$this->load->library("navigation");
        $this->load->model('category_model');
        $this->load->model('users_model');
        if (!$this->session->userdata('admin')) {
            redirect('login');
        }
    }
    public function listing(){
        $logged_user_id = $this->session->userdata('admin');
        $data['role_details'] = $this->session->userdata('role_details');
        $data['user_logged_name'] = $this->users_model->getUserLoggedInName($logged_user_id->logged_id);
		$data['role_details'] = $this->session->userdata('role_details');
		if($data['role_details']->category_list == 1){
			//$data['categoris'] = $this->category_model->getCategoryList();
		 $data['categoris'] = $this->navigation->create($this->category_model->getMainCategory());
			$this->load->view('admin/category/listing', $data);
		}else{
			$this->load->view('admin/access', $data);
		}
    }

    public function manage($id=null) {
        $logged_user_id = $this->session->userdata('admin');
        $data['user_logged_name'] = $this->users_model->getUserLoggedInName($logged_user_id->logged_id);
		$data['role_details'] = $this->session->userdata('role_details');
		if($data['role_details']->category_add == 1){
			if($id){
				$data['category'] = $this->category_model->getCategory($id);
			}
		   $data['parent_category'] = $this->navigation->create($this->category_model->getMainCategory());
			if (!$this->input->post()) {
				$this->load->view('admin/category/manage', $data);
			} else {
				$update_success = false;
				$this->form_validation->set_rules('category', 'Category Name', 'trim|required|max_length[200]');
				$this->form_validation->set_message('max_length', 'Max 200 characters only allowed');
				$this->form_validation->set_message('required', '%s can\'t be blank');
	
				if ($this->form_validation->run() == FALSE) {
					$this->load->view('admin/category/manage', $data);
				} else {
					$folder = 'category';
					$create = $this->input->post();
					if ($_FILES['category_image']['name'] != "") {
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
						if ($this->upload->do_upload('category_image')) {
	
							$configThumb['image_library'] = 'gd2';
							$configThumb['source_image'] = 'images/'.$folder.'/' . $this->upload->file_name;
							$configThumb['create_thumb'] = false;
							$configThumb['maintain_ratio'] = TRUE;
							$configThumb['master_dim'] = 'width';
							$configThumb['width'] = 150; // image re-size  properties
							$configThumb['height'] = 150; // image re-size  properties 
							$configThumb['new_image'] = 'images/'.$folder.'/thumb' . $this->upload->file_name; // image re-size  properties 
							$this->load->library('image_lib', $configThumb); //codeigniter default function
							$this->image_lib->resize();
							$create['category_image'] = $this->upload->file_name;
						} else {
							$data['category_image'] = $this->upload->display_errors();
							redirect("category/listing");
						}
					}
					$update_success  = ($id) ? $this->category_model->manage($create,$id) : $this->category_model->manage($create);
					($update_success)? redirect('category/listing'):redirect('category/manage');
				}
			}
		}else{
			$this->load->view('admin/access', $data);
		}
    }

    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
