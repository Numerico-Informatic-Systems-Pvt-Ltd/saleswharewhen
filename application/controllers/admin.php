<?php

/*
 * Functions of This Controller are accessible to admin only in admin panel.
 * getUsers Function is to get User list of this website.
 * manageDeal Function is for adding or updating deals by admin.
 * dealListing Function is for geting a deal list in admin area
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library("navigation");
        $this->load->model('users_model');
        $this->load->model('deals_model');
        $this->load->model('shop_model');
        $this->load->model('category_model');
        $this->load->model('grocery_model');
        $this->load->model('admin_model');
        $this->load->model('brand_model');
        $this->load->model('merchant_model');
        $this->load->library('form_validation');
        $this->load->library('parser');
        if (!$this->session->userdata('admin')) {
            redirect('login');
        }
    }

    public function index() {
        $admin_id = $this->session->userdata('admin')->logged_id;
        $data['role_details'] = $this->session->userdata('role_details');
        //print_r($data['role_details']); die;
        $data['log_info'] = $this->users_model->logingInfo($admin_id);
        $data['merchant_list'] = $this->merchant_model->getAllMerchants();
        $logged_user_id = $this->session->userdata('admin');
        $data['user_logged_name'] = $this->users_model->getUserLoggedInName($logged_user_id->logged_id);
        $this->load->view('admin/merchants/merchant_show', $data);
    }

    public function getUsers() {
        $logged_user_id = $this->session->userdata('admin');
        $data['user_logged_name'] = $this->users_model->getUserLoggedInName($logged_user_id->logged_id);
        $data['role_details'] = $this->session->userdata('role_details');
        if ($data['role_details']->user_list == 1) {
            $data['users'] = $this->users_model->getUsersList();
            $this->load->view('admin/users_list', $data);
        } else {
            $this->load->view('admin/access', $data);
        }
    }

    public function uploadImage($file, $folder, $width, $height) {
        if (!is_dir(FCPATH . '/images/' . $folder)) {
            mkdir(FCPATH . '/images/' . $folder);
        }
        $config = array();
        $config['upload_path'] = 'images/' . $folder . '/'; // Location to save the image
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['overwrite'] = false;
        $config['remove_spaces'] = true;
        $config['max_size'] = '10000'; // in KB
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload($file)) {
            $this->load->library('image_lib'); //codeigniter default function
            $configThumb = array();
            $configThumb['image_library'] = 'gd2';
            $configThumb['source_image'] = 'images/' . $folder . '/' . $this->upload->file_name;
            $configThumb['create_thumb'] = false;
            $configThumb['maintain_ratio'] = TRUE;
            $configThumb['master_dim'] = 'width';
            $configThumb['width'] = $width; // image re-size  properties
            $configThumb['height'] = $height; // image re-size  properties 
            $configThumb['new_image'] = 'images/' . $folder . '/' . 'thumb_' . $this->upload->file_name; // image re-size  properties 
            $upload_data['con'] = $configThumb;
            $this->image_lib->initialize($configThumb);
            $this->image_lib->resize();
            $this->image_lib->clear();
            $upload_data['thumb'] = 'thumb_' . $this->upload->file_name;
            $upload_data['image'] = $this->upload->file_name;
        } else {
            $upload_data['error'] = $this->upload->display_errors();
        }
        return $upload_data;
    }

    public function uploadDealImage($file, $folder) {
        if (!is_dir(FCPATH . '/images/' . $folder . '/original')) {
            mkdir(FCPATH . '/images/' . $folder . '/original');
        }
        if (!is_dir(FCPATH . '/images/' . $folder . '/thumb')) {
            mkdir(FCPATH . '/images/' . $folder . '/thumb');
        }
        if (!is_dir(FCPATH . '/images/' . $folder . '/listing')) {
            mkdir(FCPATH . '/images/' . $folder . '/listing');
        }
        if (!is_dir(FCPATH . '/images/' . $folder . '/products')) {
            mkdir(FCPATH . '/images/' . $folder . '/products');
        }
        if (!is_dir(FCPATH . '/images/' . $folder . '/special')) {
            mkdir(FCPATH . '/images/' . $folder . '/special');
        }
        $config = array();
        $config['upload_path'] = 'images/' . $folder . '/original/'; // Location to save the image
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['overwrite'] = false;
        $config['remove_spaces'] = true;
        $config['max_size'] = '10000'; // in KB
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload($file)) {
            $this->load->library('image_lib');
            $configListingThumb = array();
            $configListingThumb['image_library'] = 'gd2';
            $configListingThumb['source_image'] = 'images/' . $folder . '/original/' . $this->upload->file_name;
            $configListingThumb['create_thumb'] = false;
            $configListingThumb['maintain_ratio'] = false;
            $configListingThumb['master_dim'] = 'width';
            $configListingThumb['width'] = 240; // image re-size  properties
            $configListingThumb['height'] = 183; // image re-size  properties
            $configListingThumb['new_image'] = 'images/' . $folder . '/listing/' . $this->upload->file_name; // image re-size  properties
            $upload_data['con'] = $configListingThumb;
            $this->image_lib->initialize($configListingThumb);
            $this->image_lib->resize();
            $this->image_lib->clear();
            $configThumb = array();
            $configThumb['image_library'] = 'gd2';
            $configThumb['source_image'] = 'images/' . $folder . '/original/' . $this->upload->file_name;
            $configThumb['create_thumb'] = false;
            $configThumb['maintain_ratio'] = false;
            $configThumb['master_dim'] = 'width';
            $configThumb['width'] = 108; // image re-size  properties
            $configThumb['height'] = 82; // image re-size  properties
            $configThumb['new_image'] = 'images/' . $folder . '/thumb/' . $this->upload->file_name; // image re-size  properties
            $upload_data['con'] = $configThumb;
            $this->image_lib->initialize($configThumb);
            $this->image_lib->resize();
            $this->image_lib->clear();
            $configProduct = array();
            $configProduct['image_library'] = 'gd2';
            $configProduct['source_image'] = 'images/' . $folder . '/original/' . $this->upload->file_name;
            $configProduct['create_thumb'] = false;
            $configProduct['maintain_ratio'] = false;
            $configProduct['master_dim'] = 'width';
            $configProduct['width'] = 324; // image re-size  properties
            $configProduct['height'] = 201; // image re-size  properties
            $configProduct['new_image'] = 'images/' . $folder . '/products/' . $this->upload->file_name; // image re-size  properties
            $upload_data['con'] = $configProduct;
            $this->image_lib->initialize($configProduct);
            $this->image_lib->resize();
            $this->image_lib->clear();
            $configSpecial = array();
            $configSpecial['image_library'] = 'gd2';
            $configSpecial['source_image'] = 'images/' . $folder . '/original/' . $this->upload->file_name;
            $configSpecial['create_thumb'] = false;
            $configSpecial['maintain_ratio'] = false;
            $configSpecial['master_dim'] = 'width';
            $configSpecial['width'] = 490; // image re-size  properties
            $configSpecial['height'] = 217; // image re-size  properties
            $configSpecial['new_image'] = 'images/' . $folder . '/special/' . $this->upload->file_name; // image re-size  properties
            $upload_data['con'] = $configSpecial;
            $this->image_lib->initialize($configSpecial);
            $this->image_lib->resize();
            $this->image_lib->clear();
            $upload_data['image'] = $this->upload->file_name;
        } else {
            $upload_data['error'] = $this->upload->display_errors();
        }
        return $upload_data;
    }

    public function manageDeal($id = null) {
        $logged_user_id = $this->session->userdata('admin');
        $data['user_logged_name'] = $this->users_model->getUserLoggedInName($logged_user_id->logged_id);
        $data['admin_id'] = $this->session->userdata('admin')->logged_id;
        $data['role_details'] = $this->session->userdata('role_details');
        if ($data['role_details']->deal_post == 1) {            
            $data['shop_list'] = $this->shop_model->getShopListByMerchant();
            $data['brand_list'] = $this->brand_model->getBrandallList();
            $data['category_list'] = $this->category_model->getsubCategory();
            $data['parent_category'] = $this->navigation->create($this->category_model->getMainCategory());

            if ($id) {
                $data['deal_details'] = $this->deals_model->getDealDetails($id,$logged_user_id->logged_id);
                $data['category'] = $this->category_model->getCategory($id);
            }
            if ($this->input->post()) {
                $update_success = '';
                $this->form_validation->set_rules('shop_id', 'Shop Name', 'trim|required|max_length[200]');
                $this->form_validation->set_rules('item_type', 'Item Type', 'trim|required|max_length[200]');
                if ($this->input->post('item_type') == 1 || $this->input->post('item_type') == 4 || $this->input->post('item_type') == 3 || $this->input->post('item_type') == 2) {
                    $this->form_validation->set_rules('product_name', 'Product Name', 'trim|required|max_length[200]');
                }
                if ($this->input->post('item_type') == 2) {
                    $this->form_validation->set_rules('deal_site_url', 'Deal Redirect Site URL', 'trim|required');
                }
                if ($this->input->post('item_type') == 3) {
                    $this->form_validation->set_rules('coupon_stock', 'Total No. of Coupons', 'trim|required');
                }
                $this->form_validation->set_rules('description', 'Description', 'trim|required');
                $this->form_validation->set_rules('deal_text', 'Deal Text', 'trim|required|max_length[200]');
                $this->form_validation->set_rules('brand_id', 'Brand Name', 'trim|required|max_length[200]');
                $this->form_validation->set_rules('category_id', 'Category Name', 'trim|required|max_length[200]');
                $this->form_validation->set_rules('coupon_price', 'Coupon Price', 'trim|required|max_length[200]');
                $this->form_validation->set_rules('valid_from', 'Valid From', 'trim|required|max_length[200]');
                $this->form_validation->set_rules('valid_till', 'Valid Till', 'trim|required|max_length[200]');
                $this->form_validation->set_rules('deal_type', 'Deal Type', 'trim|required|max_length[200]');
                $this->form_validation->set_message('max_length', 'Max 200 characters only allowed');
                $this->form_validation->set_message('required', '%s can\'t be blank');
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('admin/deals/manage_deal', $data);
                } else {
                    $folder = 'deals';
                    $input = $this->input->post();
                    if ($_FILES['banner']['name'] != "") {
                        $upload = $this->uploadDealImage('banner', $folder);
                        $input['banner'] = $upload['image'];
                    }
                    if ($_FILES['logo']['name'] != "") {
                        $folder_brand = 'brands';
                        $upload = $this->uploadImage('logo', $folder_brand, 45, 30);
                        $input['logo'] = $upload['thumb'];
                    }
                    $update_success = ($id) ? $this->deals_model->manage($input, $id) : $this->deals_model->manage($input);
                    $deal_id = ($id) ? $id : $update_success;
                    if (!id) {
                        $this->deals_model->addDealImage($input['banner'], $deal_id);
                    }
                    $folder_thumb = 'thumb';
                    if (!is_dir(FCPATH . '/images/deals/' . $folder_thumb)) {
                        mkdir(FCPATH . '/images/deals/' . $folder_thumb);
                    }
                    $configDealImage['upload_path'] = 'images/deals/original/'; // Location to save the image
                    $configDealImage['allowed_types'] = 'gif|jpg|png|jpeg';
                    $configDealImage['overwrite'] = false;
                    $configDealImage['remove_spaces'] = true;
                    $configDealImage['max_size'] = '1000'; // in KB
                    $this->load->library('upload', $configDealImage);
                    $this->upload->initialize($configDealImage);

                    for ($i = 1; $i < 6; $i++) {
                        $file_name = 'deal_image' . $i;
                        if ($this->upload->do_upload($file_name)) {
                            $this->load->library('image_lib');
                            $configThumb = array();
                            $configThumb['image_library'] = 'gd2';
                            $configThumb['source_image'] = 'images/deals/original/' . $this->upload->file_name;
                            $configThumb['create_thumb'] = false;
                            $configThumb['maintain_ratio'] = TRUE;
                            $configThumb['master_dim'] = 'width';
                            $configThumb['width'] = 108; // image re-size  properties
                            $configThumb['height'] = 82; // image re-size  properties
                            $configThumb['new_image'] = 'images/deals/thumb/' . $this->upload->file_name; // image re-size  properties
                            $upload_data['con'] = $configThumb;
                            $this->image_lib->initialize($configThumb);
                            $this->image_lib->resize();
                            $this->image_lib->clear();

                            $configProduct = array();
                            $configProduct['image_library'] = 'gd2';
                            $configProduct['source_image'] = 'images/deals/original/' . $this->upload->file_name;
                            $configProduct['create_thumb'] = false;
                            $configProduct['maintain_ratio'] = false;
                            $configProduct['master_dim'] = 'width';
                            $configProduct['width'] = 324; // image re-size  properties
                            $configProduct['height'] = 201; // image re-size  properties
                            $configProduct['new_image'] = 'images/' . $folder . '/products/' . $this->upload->file_name; // image re-size  properties

                            $upload_data['con'] = $configProduct;
                            $this->image_lib->initialize($configProduct);
                            $this->image_lib->resize();

                            $files[] = $this->upload->file_name;
                        }
                    }

                    $item_type = $this->input->post('item_type');
                    if ($this->input->post('item_type') == 1 || $this->input->post('item_type') == 4) {
                        $item_data = $this->input->post('product_name');
                    }
                    $item_shop = $this->input->post('shop_id');
                    $item_brand = $this->input->post('brand_id');
                    $item_email = $this->deals_model->fetchAlertEmail($item_type, $item_data, $item_shop, $item_brand);
                    //print_r($item_email); die;
                    foreach ($item_email as $email) {
                        require_once($_SERVER['DOCUMENT_ROOT'] . '/application/libraries/phpmailer/PHPMailerAutoload.php');
                        $mail = new PHPMailer();
                        $mail->isSMTP();
                        $mail->SMTPDebug = 0;
                        $mail->Debugoutput = 'html';
                        $mail->Host = "mail.nisclient.com";
                        $mail->SMTPSecure = "ssl";
                        $mail->Port = 465;
                        $mail->SMTPAuth = true;
                        $mail->Username = "noreply@nisclient.com";
                        $mail->Password = "@admin2013";
                        $mail->setFrom('noreply@nisclient.com', 'SalesWhereWhen');
                        $mail->addReplyTo($email->type_data, 'Admin SalesWhereWhen.');
                        $mail->addAddress($email->type_data, 'SalesWhereWhen');
                        $mail->Subject = 'Product available';
                        //$confirmationURL = base_url() . 'signup/confirmRegistration/' . $encrept_id . '/' . $encrept_type;
                        $mail->Body = "Your Alert product available.";
                        $mail->AltBody = 'This is a plain-text message body';
                        if (!$mail->send()) {
                            //echo "Mailer Error: " . $mail->ErrorInfo; die;
                            /* echo '<script> alert("Invalid Email Id ! PleaseEnter Valid Email."); </script>';
                              echo "Mailer Error: " . $mail->ErrorInfo; */
                        }
                    }
                    $this->deals_model->manageDealImages($files, $deal_id);
                    ($update_success) ? redirect('admin/dealListing') : redirect('admin/manageDeal');
                }
            } else {
                $this->load->view('admin/deals/manage_deal', $data);
            }
        } else {
            $this->load->view('admin/access', $data);
        }
    }

    

    public function dealListing() {
        $logged_user_id = $this->session->userdata('admin');        
        $data['user_logged_name'] = $this->users_model->getUserLoggedInName($logged_user_id->logged_id);
        $data['role_details'] = $this->session->userdata('role_details');
        if ($data['role_details']->deal_list == 1) {
            $data['deals'] = $this->deals_model->getDealDetails(NULL,$logged_user_id->logged_id);
            $this->load->view('admin/deals/deal_listing', $data);
        } else {
            $this->load->view('admin/access', $data);
        }
    }

    public function addGrocery() {
        $logged_user_id = $this->session->userdata('admin');
        $data['user_logged_name'] = $this->users_model->getUserLoggedInName($logged_user_id->logged_id);
        $data['brandDetails'] = $this->grocery_model->getBrand();
        $data['role_details'] = $this->session->userdata('role_details');

        if (!$this->input->post()) {
            $this->load->view('admin/grocery/add_grocery', $data);
        } else {
            $grocery_name = $this->input->post('name');
            if (!empty($grocery_name)) {
                $array_grocery_brand = array(
                    'name' => $this->input->post('name'),
                    'time' => date('Y-m-d H:i:s'),
                    'merchant_id' => $this->session->userdata('admin')->logged_id
                );
                $folder = 'grocery_brand';
                if ($_FILES['image']['name'] != "") {
                    $upload = $this->uploadImage('image', $folder);
                    $array_grocery_brand['image'] = $upload['image'];
                }
                $this->db->insert('grocery_brand', $array_grocery_brand);
                $lastBrandID = mysql_insert_id();
            }
            $brandId = $this->input->post('brand_id');
            if (empty($brandId)) {
                $brandId = $lastBrandID;
            }
            $array_brand = array(
                'brand_id' => $brandId,
                'shop_name' => $this->input->post('shop_name'),
                'address' => $this->input->post('address'),
                'location' => $this->input->post('location'),
                'contact_no' => $this->input->post('contact_no'),
                'description' => $this->input->post('description'),
                'short_description' => $this->input->post('short_description'),
                'posted_by' => '0',
                'time' => date('Y-m-d H:i:s')
            );
            /* date('Y-m-d H:i:s')
             * $array_brand = $this->input->post();
              $array_brand['posted_by'] = 0;
              $array_brand['time'] = date('Y-m-d H:i:s'); */
            $new_folder = 'grocery_shop';
            if ($_FILES['shop_image']['name'] != "") {
                $upload = $this->uploadImage('shop_image', $new_folder);
                $array_brand['shop_image'] = $upload['image'];
                $array_brand['shop_thumb'] = $upload['thumb'];
            }
            $this->db->insert('grocery_brand_details', $array_brand);
            redirect('admin');
        }
    }

    public function manageShop($id = null) {
        $logged_user_id = $this->session->userdata('admin');
        $data['user_logged_name'] = $this->users_model->getUserLoggedInName($logged_user_id->logged_id);
        $data['role_details'] = $this->session->userdata('role_details');
        if ($data['role_details']->shop_add == 1) {
            $data['admin_id'] = $this->session->userdata('admin')->logged_id;
            $data['city_list'] = $this->users_model->getCityList();
            if ($id) {
                $data['shop_details'] = $this->shop_model->getShopDetails($id);
            }
            if (!$this->input->post()) {

                $this->load->view('admin/shop/manage', $data);
            } else {
                $update_success = false;
                $this->form_validation->set_rules('shop_name', 'Shop Name', 'trim|required|max_length[255]');
                $this->form_validation->set_rules('shop_city', 'City Name', 'trim|required|max_length[255]');
                $this->form_validation->set_rules('shop_address', 'Shop Address', 'trim|required|max_length[255]');
                $this->form_validation->set_rules('shop_mobile', 'Shop Mobile', 'required|numeric|max_length[13]');
                $this->form_validation->set_rules('shop_url', 'Shop Url', 'trim|required');
                $this->form_validation->set_rules('shop_location_map', 'Shop Location Map', 'trim|required');

                $this->form_validation->set_message('max_length', 'Max 255 characters only allowed');
                $this->form_validation->set_message('required', '%s can\'t be blank');
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('admin/shop/manage', $data);
                } else {
                    $shop_data = $this->input->post();
                    $folder = 'shop';
                    if ($_FILES['shop_img']['name'] != "") {
                        $upload = $this->uploadImage('shop_img', $folder);
                        $shop_data['shop_img'] = $upload['image'];
                        $shop_data['shop_thumb'] = $upload['thumb'];
                    }
                    if ($_FILES['shop_logo']['name'] != "") {
                        $upload = $this->uploadImage('shop_logo', $folder);
                        $shop_data['shop_logo'] = $upload['image'];
                        $shop_data['logo_thumb'] = $upload['thumb'];
                    }
                    $shop_data['merchant_id'] = $data['admin_id'];
                    ($id) ? $this->shop_model->manageShop($shop_data, $id) : $this->shop_model->manageShop($shop_data, $id = null);
                    $update_success = ($this->db->affected_rows() != 1) ? false : true;
                    ($update_success) ? redirect('admin/shopList') : redirect('admin/manageShop');
                }
            }
        } else {
            $this->load->view('admin/access', $data);
        }
    }

    public function shopList() {
        $logged_user_id = $this->session->userdata('admin');
        $data['user_logged_name'] = $this->users_model->getUserLoggedInName($logged_user_id->logged_id);
        $data['role_details'] = $this->session->userdata('role_details');
        if ($data['role_details']->shop_list == 1) {
            $data['shop_list'] = $this->shop_model->getShops();
            $this->load->view('admin/shop/shoplist', $data);
        } else {
            $this->load->view('admin/access', $data);
        }
    }

    public function imageList() {
        $logged_user_id = $this->session->userdata('admin');
        $data['user_logged_name'] = $this->users_model->getUserLoggedInName($logged_user_id->logged_id);
        $data['role_details'] = $this->session->userdata('role_details');
        if ($data['role_details']->image_list == 1) {
            $data['imageList'] = $this->admin_model->getImageDetails();
            $this->load->view('admin/imageList', $data);
        } else {
            $this->load->view('admin/access', $data);
        }
    }

    public function manageImages($id = null) {
        $data = array();
        $logged_user_id = $this->session->userdata('admin');
        $data['user_logged_name'] = $this->users_model->getUserLoggedInName($logged_user_id->logged_id);
        
        $data['role_details'] = $this->session->userdata('role_details');
        if ($data['role_details']->manage_slider == 1) {
            if ($id) {
                $data['image_details'] = $this->admin_model->getImageDetails($id);
            }
            if (!($this->input->post())) {
                $this->load->view('admin/manageImages', $data);
            } else {
                $update_succes = 'false';
                $this->form_validation->set_rules('image_type', 'Image Type', 'trim|required');
                if ($this->input->post('image_type') == 2) {
                    $this->form_validation->set_rules('image_size', 'Image Size', 'trim|required');
                }
                $this->form_validation->set_rules('image_url', 'Image Url', 'trim|required');
                $this->form_validation->set_rules('display_on', 'Images Display On', 'trim|required');
                $this->form_validation->set_rules('display_off', 'Images Display Off', 'trim|required');
                $this->form_validation->set_message('required', '%s can\'t be blank');
                if ($this->form_validation->run() == FALSE) {
                    print_r("error");
                    die;
                    $this->load->view('admin/manageImages', $data);
                } else {
                    $input = $this->input->post();
                    $input['display_on'] = date('Y-m-d h:i:s', strtotime($this->input->post('display_on')));
                    $input['display_off'] = date('Y-m-d h:i:s', strtotime($this->input->post('display_off')));
                    $folder = 'admin';
                    if ($_FILES['image_name']['name'] != '') {
                        $type = '';
                        $width = '';
                        $height = '';
                        $type = $this->input->post('image_size');
                        if ($type == 1) {
                            $width = '585';
                            $height = '423';
                        } else if ($type == 2) {
                            $width = '219';
                            $height = '240';
                        } else if ($type == 3) {
                            $width = '219';
                            $height = '183';
                        }
                        $upload = $this->uploadImage('image_name', $folder, $width, $height);
                        if ($type) {
                            $input['image_name'] = $upload['thumb'];
                        } else {
                            $input['image_name'] = $upload['image'];
                        }
                    }
                    if ($id) {
                        $update_succes = $this->admin_model->manageImages($input, $id);
                    } else {
                        $update_succes = $this->admin_model->manageImages($input);
                    }
                    if ($update_succes) {
                        redirect('admin/imageList');
                    }
                }
            }
        } else {
            $this->load->view('admin/access', $data);
        }
    }

    public function brandList() {
        $logged_user_id = $this->session->userdata('admin');
        $data['user_logged_name'] = $this->users_model->getUserLoggedInName($logged_user_id->logged_id);
        
        $data['role_details'] = $this->session->userdata('role_details');
        if ($data['role_details']->brand_list == 1) {

            $data['brand_list'] = $this->brand_model->getBrands();
            $this->load->view('admin/brand/brandlist', $data);
        } else {
            $this->load->view('admin/access', $data);
        }
    }

    public function manageBrands($id = null) {
        
        $data = array();
        $logged_user_id = $this->session->userdata('admin');
        $data['user_logged_name'] = $this->users_model->getUserLoggedInName($logged_user_id->logged_id);        
        $data['role_details'] = $this->session->userdata('role_details');
        if ($data['role_details']->brand_add == 1) {
            $data['admin_id'] = $this->session->userdata('admin')->logged_id;
            if ($id) {
                $data['brand_details'] = $this->brand_model->getBrandDetail($id);
                $data['other_locations'] = $this->brand_model->getBrandLocations($id);
                if ($data['other_locations']) {
                    $data['count_locations'] = count($data['other_locations']);
                }
            }
            if (!$this->input->post()) {
                $this->load->view('admin/brand/manageBrands', $data);
            } else {
                $updateSuccess = 'false';
                $this->form_validation->set_rules('name', 'Name ', 'trim|required');
                $this->form_validation->set_rules('head_contact', 'Head Office Contact', 'trim|required');
                $this->form_validation->set_rules('head_office', 'Head Office Address', 'trim|required');
                $this->form_validation->set_rules('site_office', 'Site Office Address', 'trim|required');
                $this->form_validation->set_rules('site_contact', 'Site Contact', 'required|numeric|max_length[13]');
                $this->form_validation->set_rules('speciality', 'Speciality', 'trim|required');
                $this->form_validation->set_rules('location', 'Location', 'trim|required');
                $this->form_validation->set_rules('brand_location_map', 'Brand Location Map', 'trim|required');
                $this->form_validation->set_message('max_length', 'Max 255 characters only allowed');
                $this->form_validation->set_message('required', '%s can\'t be blank');
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('admin/brand/manageBrands', $data);
                } else {
                    $inputs['name'] = $this->input->post('name');
                    $inputs['head_contact'] = $this->input->post('head_contact');
                    $inputs['head_office'] = $this->input->post('head_office');
                    $inputs['site_office'] = $this->input->post('site_office');
                    $inputs['site_contact'] = $this->input->post('site_contact');
                    $inputs['speciality'] = $this->input->post('speciality');
                    $inputs['location'] = $this->input->post('location');
                    $inputs['brand_location_map'] = $this->input->post('brand_location_map');
                    $inputs['status'] = $this->input->post('status');
                    $inputs['posted_on'] = date('Y-m-d h:i:s', time());


                    $folder = 'brands';
                    if ($_FILES['brand_image']['name'] != "") {
                        $width = 45;
                        $height = 30;
                        $upload = $this->uploadImage('brand_image', $folder, $width, $height);
                        $inputs['brand_image'] = $upload['image'];
                        $inputs['brand_logo'] = $upload['thumb'];
                    }
                    $count = $this->input->post('count');
                    if ($count) {
                        $contact_input = array();
                        for ($i = 0; $i < $count; $i++) {
                            $contact_input['location' . $i] = $this->input->post('location' . $i);
                            $contact_input['contact' . $i] = $this->input->post('contact' . $i);
                            if ($id && (!empty($other_locations))) {
                                $contact_input['brand_ocation_id' . $i] = $this->input->post('brand_ocation_id' . $i);
                            }
                        }
                    }
                    if ($id) {
                        $updateSuccess = $this->brand_model->manageBrand($inputs, $id);
                        if (!empty($contact_input)) {
                            $this->brand_model->updateBrandLocations($contact_input, $id);
                        }
                    } else {
                        $inputs['merchant_id'] = $data['admin_id'];
                        //print_r($inputs); die;
                        $updateSuccess = $this->brand_model->manageBrand($inputs);
                        if (!empty($contact_input)) {
                            $this->brand_model->manageBrandLocations($contact_input, $updateSuccess);
                        }
                    }
                    if ($updateSuccess) {
                        redirect('admin/brandList');
                    }
                }
            }
        } else {
            $this->load->view('admin/access', $data);
        }
    }

    public function manageMerchant($id = null) {
        $logged_user_id = $this->session->userdata('admin');
        $data['user_logged_name'] = $this->users_model->getUserLoggedInName($logged_user_id->logged_id);
        $data['role_details'] = $this->session->userdata('role_details');
        if ($id) {
            $data['details'] = $this->merchant_model->getMerchantDetails($id);
            $password = $data['details']->password;
        }
        $data['city_list'] = $this->users_model->getCityList();
        if (!($this->input->post())) {
            $this->load->view('admin/merchants/manageMerchant', $data);
        } else {
            $updateSuccess = 'false';
            $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
            $this->form_validation->set_rules('email_id', 'Emailid', 'trim|required');
            if (!$id) {
                $this->form_validation->set_rules('password', 'Password ', 'trim|required');
            }
            $this->form_validation->set_rules('city', 'City ', 'trim|required');
            //$this->form_validation->set_rules('zone', 'Zone ', 'trim|required');
            $this->form_validation->set_rules('contact_no', 'Contact No ', 'required|numeric|max_length[13]');
            $this->form_validation->set_rules('gender', 'Gender ', 'trim|required');
            $this->form_validation->set_rules('dob', 'Date Of Birth ', 'trim|required');
            //$this->form_validation->set_rules('oldpassword', 'Old Password ', 'trim|required');
            //$this->form_validation->set_rules('newpassword', 'New Password ', 'trim|required');
            $this->form_validation->set_message('max_length', 'Max 255 characters only allowed');
            $this->form_validation->set_message('required', '%s can\'t be blank');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/merchants/manageMerchant', $data);
            } else {
                $inputs['first_name'] = $this->input->post('first_name');
                $inputs['last_name'] = $this->input->post('last_name');
                $inputs['email_id'] = $this->input->post('email_id');
                $inputs['address'] = $this->input->post('address');
                $inputs['city'] = $this->input->post('city');
                $inputs['zone'] = $this->input->post('zone');
                $inputs['contact_no'] = $this->input->post('contact_no');
                $inputs['gender'] = $this->input->post('gender');
                $inputs['status'] = $this->input->post('status');
                $inputs['type'] = $this->input->post('type');
                $inputs['dob'] = date('Y-m-d h:i:s', strtotime($this->input->post('dob')));
                $folder = 'merchant_profile_images';
                if ($_FILES['profile_image']['name'] != '') {
                    $upload = $this->uploadImage('profile_image', $folder);
                    $inputs['profile_image'] = $upload['image'];
                }
                if ($id) {
                    $newpassword = '';
                    $oldPassword = $this->input->post('oldpassword');
                    $newpassword = md5($this->input->post('newpassword'));

                    if (!empty($oldPassword)) {

                        if ($oldPassword == $password) {
                            $inputs['password'] = $newpassword;
                        }
                    }

                    $updateSuccess = $this->merchant_model->manageMerchant($inputs, $id);
                } else {
                    $inputs['password'] = md5($this->input->post('password'));
                    $updateSuccess = $this->merchant_model->manageMerchant($inputs);
                }
                if ($updateSuccess) {
                    redirect('admin');
                }
            }
        }
    }

    public function manageUser($id = null) {
        $logged_user_id = $this->session->userdata('admin');
        $data['user_logged_name'] = $this->users_model->getUserLoggedInName($logged_user_id->logged_id);
        $data['role_details'] = $this->session->userdata('role_details');
        if ($id) {
            $data['details'] = $this->users_model->getUsersList($id);
            $password = $data['details']->password;
        }
        $data['city_list'] = $this->users_model->getCityList();
        if (!($this->input->post())) {
            $this->load->view('admin/manageUser', $data);
        } else {
            $updateSuccess = 'false';
            $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
            $this->form_validation->set_rules('email_id', 'Emailid', 'trim|required');
            if (!$id) {
                $this->form_validation->set_rules('password', 'Password ', 'trim|required');
            }
            $this->form_validation->set_rules('city', 'City ', 'trim|required');
            //$this->form_validation->set_rules('zone', 'Zone ', 'trim|required');
            $this->form_validation->set_rules('contact_no', 'Contact No ', 'required|numeric|max_length[13]');
            $this->form_validation->set_rules('gender', 'Gender ', 'trim|required');
            $this->form_validation->set_rules('dob', 'Date Of Birth ', 'trim|required');
            //$this->form_validation->set_rules('oldpassword', 'Old Password ', 'trim|required');
            //$this->form_validation->set_rules('newpassword', 'New Password ', 'trim|required');
            $this->form_validation->set_message('max_length', 'Max 255 characters only allowed');
            $this->form_validation->set_message('required', '%s can\'t be blank');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/merchants/manageMerchant', $data);
            } else {
                $inputs['first_name'] = $this->input->post('first_name');
                $inputs['last_name'] = $this->input->post('last_name');
                $inputs['email_id'] = $this->input->post('email_id');
                $inputs['address'] = $this->input->post('address');
                $inputs['city'] = $this->input->post('city');
                $inputs['zone'] = $this->input->post('zone');
                $inputs['contact_no'] = $this->input->post('contact_no');
                $inputs['gender'] = $this->input->post('gender');
                $inputs['status'] = $this->input->post('status');
                $inputs['dob'] = date('Y-m-d h:i:s', strtotime($this->input->post('dob')));
                $folder = 'user_profile_images';
                if ($_FILES['profile_image']['name'] != '') {
                    $upload = $this->uploadImage('profile_image', $folder);
                    $inputs['profile_image'] = $upload['image'];
                }
                if ($id) {
                    $oldPassword = md5($this->input->post('oldpassword'));
                    $newPassword = md5($this->input->post('newpassword'));
                    if ($oldPassword == $password) {
                        $inputs['password'] = $newPassword;
                    }
                    $updateSuccess = $this->users_model->manageUser($inputs, $id);
                } else {
                    $inputs['password'] = md5($this->input->post('password'));
                    $updateSuccess = $this->users_model->manageUser($inputs);
                }
                if ($updateSuccess) {
                    redirect('admin/getUsers');
                }
            }
        }
    }

    public function pageList() {
        $logged_user_id = $this->session->userdata('admin');
        $data['user_logged_name'] = $this->users_model->getUserLoggedInName($logged_user_id->logged_id);
        $data['role_details'] = $this->session->userdata('role_details');
        if ($data['role_details']->page_list == 1) {
            $data['pages'] = $this->admin_model->getPages();
            $this->load->view('admin/pageList', $data);
        } else {
            $this->load->view('admin/access', $data);
        }
    }

    public function managePage($id = null) {

        $data = array();
        $logged_user_id = $this->session->userdata('admin');
        $data['user_logged_name'] = $this->users_model->getUserLoggedInName($logged_user_id->logged_id);
        $data['role_details'] = $this->session->userdata('role_details');
        if ($data['role_details']->page_add == 1) {


            if ($id) {
                $data['page_details'] = $this->admin_model->getPageDetails($id);
            }
            if (!$this->input->post()) {
                $this->load->view('admin/managePage', $data);
            } else {
                $updateSuccess = 'false';
                $this->form_validation->set_rules('page_content', 'Page Content', 'trim|required');
                $this->form_validation->set_rules('page_title', 'Page Title', 'trim|required');
                $this->form_validation->set_rules('slug', 'Page Slug', 'trim|required');
                $this->form_validation->set_message('required', '%s can\'t be blank');
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('admin/managePage', $data);
                } else {
                    $inputs = $this->input->post();
                    if ($id) {
                        $updateSuccess = $this->admin_model->managePage($inputs, $id);
                    } else {
                        $updateSuccess = $this->admin_model->managePage($inputs);
                    }
                    if ($updateSuccess) {
                        redirect('admin/pageList');
                    }
                }
            }
        } else {
            $this->load->view('admin/access', $data);
        }
    }

    public function reviewListing() {
        $logged_user_id = $this->session->userdata('admin');
        $data['user_logged_name'] = $this->users_model->getUserLoggedInName($logged_user_id->logged_id);
        $data['role_details'] = $this->session->userdata('role_details');
        if ($data['role_details']->review_list == 1) {
            $data['reviewListing'] = $this->admin_model->reviewList();
            $this->load->view('admin/reviews/reviewListing', $data);
            //print_r($data['reviewListing']);
        } else {
            $this->load->view('admin/access', $data);
        }
    }

    public function manageAdvertisements($id = null) {
        $logged_user_id = $this->session->userdata('admin');
        $data['user_logged_name'] = $this->users_model->getUserLoggedInName($logged_user_id->logged_id);
        $data['role_details'] = $this->session->userdata('role_details');
        if ($data['role_details']->advertisement_add == 1) {
          
            $data['parent_category'] = $this->category_model->getMainCategory();
            if ($id) {

                $data['adver'] = $this->admin_model->getAdvertisement($id);
            }
            if (!$this->input->post()) {

                $this->load->view('admin/advertisements/manageAdvertisements', $data);
            } else {
                    
                
                $update_success = false;
                $this->form_validation->set_rules('category', 'Category Name', 'trim|required|max_length[200]');
                $this->form_validation->set_rules('adv_title', 'Title', 'trim|required|max_length[200]');
                $this->form_validation->set_message('max_length', 'Max 200 characters only allowed');
                $this->form_validation->set_message('required', '%s can\'t be blank');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('admin/advertisements/manageAdvertisements', $data);
                } else {
                    $folder = 'advertisements';
                    $create = $this->input->post();
                    if($create['image_type_category']!=0){
                        $create['image_type']=$this->input->post('image_type_category');
                        unset($create['image_type_category']);
                        unset($create['image_type_home']);
                    }
                    else {
                        $create['image_type']=$this->input->post('image_type_home');
                        unset($create['image_type_category']);
                        unset($create['image_type_home']);
                    }
                    
                    if ($_FILES['adv_image']['name'] != "") {
                        if (!is_dir(FCPATH . '/images/' . $folder)) {
                            mkdir(FCPATH . '/images/' . $folder);
                        }

                        $config['upload_path'] = 'images/' . $folder . '/'; // Location to save the image
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $config['overwrite'] = false;
                        $config['remove_spaces'] = true;
                        $config['max_size'] = '10000'; // in KB
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('adv_image')) {

                            $configThumb['image_library'] = 'gd2';
                            $configThumb['source_image'] = 'images/' . $folder . '/' . $this->upload->file_name;
                            $configThumb['create_thumb'] = false;
                            $configThumb['maintain_ratio'] = false;
                            $configThumb['master_dim'] = 'width';
//                            $configThumb['width'] = 1000; // image re-size  properties
//                            $configThumb['height'] = 200; // image re-size  properties 
                            $configThumb['new_image'] = 'images/' . $folder . '/thumb' . $this->upload->file_name; // image re-size  properties 
                            $this->load->library('image_lib', $configThumb); //codeigniter default function
                            $this->image_lib->resize();
                            $create['adv_image'] = 'thumb' . $this->upload->file_name;
                            //print_r($create);die;
                        } else {
                            $data['adv_image'] = $this->upload->display_errors();
                            redirect("admin/listAdvertisemets");
                        }
                    }
//                    echo '<pre>';
//                    print_r($create);
//                    print_r($_FILES);die;
                    $update_success = ($id) ? $this->db->update('advertisment', $create, array('id' => $id)) : $this->db->insert('advertisment', $create);
                    ($update_success) ? redirect('admin/listAdvertisemets') : redirect('admin/manageAdvertisements');
                }
               
            }
        
            
            
            
         } else {
            $this->load->view('admin/access', $data);
        }
    }

    public function listAdvertisemets() {
        $logged_user_id = $this->session->userdata('admin');
        $data['user_logged_name'] = $this->users_model->getUserLoggedInName($logged_user_id->logged_id);
        $data['role_details'] = $this->session->userdata('role_details');
        if ($data['role_details']->advertisement_list == 1) {
            $data['adv_data'] = $this->admin_model->getAdvertisementsDetails();
            $this->load->view('admin/advertisements/listAdvertisemets', $data);
        } else {
            $this->load->view('admin/access', $data);
        }
    }
    
    
    public function manageAlert(){
        $data = array();
        $logged_user_id = $this->session->userdata('admin');
        $data['user_logged_name'] = $this->users_model->getUserLoggedInName($logged_user_id->logged_id);
        $data['role_details'] = $this->session->userdata('role_details');
        if(!$this->input->post()){
            $this->load->view('admin/alert/manageAlert',$data);
        }else{
            
            $limit_end = 3;
            $data['email_items'] = $this->admin_model->getAllAlertMailDetails($limit_end);
            //echo '<pre>';
            //print_r($data['email_items']);die;
            if(!empty($data['email_items'])){
                
                foreach($data['email_items'] as $email_item){
                    
                    $data['product_details'] = $this->admin_model->getProductDetailsForMail($email_item);
                    //print_r($data['product_details']);
                    if(!empty($data['product_details'])){
                        $this->sendAlertMailTemplate($data['product_details'],$email_item);
                    }else {
			$data['mail_failed'] = FALSE;
			$this->load->view('admin/alert/manageAlert',$data);
			}
                    
                }
                
            }
            //$this->load->view('admin/alert/manageAlert',$data);
        }
    }  
   
    public function sendAlertMailTemplate($product_details, $email_item) {
        //print_r($product_details);die;
        $email_id = $email_item->type_data;       
        $data['allProducts'] = $product_details;
        $mail_template = $this->parser->parse('mailtemplate/sendAlertMailTemplate', $data, TRUE);        
        date_default_timezone_set('Etc/UTC');
        require_once($_SERVER['DOCUMENT_ROOT'] . '/application/libraries/phpmailer/PHPMailerAutoload.php');
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Debugoutput = 'html';
        $mail->Host = "mail.nisclient.com";
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = "noreply@nisclient.com";
        $mail->Password = "@admin2013";
        $mail->setFrom('noreply@nisclient.com', 'SalesWhereWhen');
        $mail->addReplyTo($email_id, 'Admin SalesWhereWhen.');
        $mail->addAddress($email_id, 'SalesWhereWhen');
        $mail->Subject = 'Product Alert Mail';        
        $mail->Body = $mail_template;
        $mail->AltBody = 'This is a plain-text message body';
        if (!$mail->send()) {
            //echo "Mailer Error: " . $mail->ErrorInfo; die;
            echo '<script> alert("Invalid Email Id ! PleaseEnter Valid Email."); </script>';
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            $data['mail_send'] = true;
            $alert_mail_sent_id = array(
                'alert_id'=>$email_item->id,
                'emailed_date'=>date("Y-m-d H:i:s")
            );
            
            $this->db->insert('alert_mail_sent',$alert_mail_sent_id);
            redirect('admin/manageAlert');
        }
    }
    
    public function ajaxcategoryForGrocery(){
        $category_type = $this->input->post('itemtype');
            if(!$category_type){
                $category_type = 1;
            }
        $data['parent_category'] = $this->navigation->create($this->category_model->ajaxgrocerygetMainCategory($category_type));
              
        $this->load->view('admin/grocery/groceryCategory',$data);
    }

public function changePassword() {
        $admin_id = $this->session->userdata('admin')->logged_id;
	 $logged_user_id = $this->session->userdata('admin');
        $data['user_logged_name'] = $this->users_model->getUserLoggedInName($logged_user_id->logged_id);
        $data['role_details'] = $this->session->userdata('role_details');
        $data['log_info'] = $this->users_model->logingInfo($admin_id);
        $old_password = $this->users_model->logingInfoDetails($admin_id);
        
        if ($this->input->post()) {
            $this->form_validation->set_rules('old', 'Old Password', 'trim|required|max_length[200]');
            $this->form_validation->set_rules('new', 'New Password', 'trim|required|max_length[200]');
            
            $this->form_validation->set_message('max_length', 'Max 200 characters only allowed');
            $this->form_validation->set_message('required', '%s can\'t be blank');
            
            if($old_password != md5($this->input->post('old'))){
                $data['password_not_match'] = true;
                //print_r("not match"); die;
                $this->load->view('admin/change_password', $data);
            }else{
                $update = array(
                    'password' => md5($this->input->post('new'))
                 );
                $this->db->update('merchant', $update, array('id' => $admin_id));
                $data['password_change_update'] = true;
                $this->load->view('admin/change_password', $data);
                
            }
        }else{
            //print_r($data['log_info']); die;
            $this->load->view('admin/change_password', $data);
        }
    }

}
