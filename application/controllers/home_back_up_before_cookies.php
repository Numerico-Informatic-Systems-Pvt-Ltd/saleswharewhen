<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('session');
        $this->load->library('parser');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('cookie');
        $this->load->model('users_model');
        $this->load->model('merchant_model');
        $this->load->model('deals_model');
        $this->load->model('category_model');
        $this->load->model('brand_model');
        $this->load->model('review_model');
        $this->load->model('admin_model');
    }

    public function index() {
        $data['banner_images'] = $this->admin_model->getBannerImages(2);
        //$data['deals'] = $this->deals_model->getDealList(1);
        $data['special_deals'] = $this->deals_model->getDealList(2);
        $data['deals'] = $this->deals_model->getDealList(1);
        //print_r($data['special_deals']); die;
        $data['main_category'] = $this->category_model->getParentCategory();
        $data['brand_list'] = $this->brand_model->getBrandList();
        $data['city_list'] = $this->users_model->getCityList();
        $data['shop_list'] = $this->deals_model->getShopList(); //change
        $data['country_list'] = $this->deals_model->getCountryList();
        $data['sub_category'] = $this->category_model->getsubCategory();
        $cookieDetails =array(
            'retailer_value'=>$this->input->cookie('retailer', TRUE),
            'country_value'=>$this->input->cookie('country', TRUE),
            'city_value'=>$this->input->cookie('city', TRUE)
        );
        //print_r($cookieDetails);
        if(!empty($cookieDetails['city_value']) || !empty($cookieDetails['country_value'])) {
        $data['city_name']=$this->deals_model->getCityName($cookieDetails['city_value']);
        $data['city_list']=$this->deals_model->getCityListName($cookieDetails['country_value']);
        }
       
        $data['cookie_details'] = $cookieDetails;
        $this->load->view('home/listing', $data);
    }

    public function ajaxgetcityofCountry() {

        $country = $this->input->post('country');
        $citylist = $this->deals_model->getcityForSearch($country);
        echo json_encode($citylist);
    }

   public function listing($category, $city_id = null) {

        if ($category) {
            $data = array();
            $data['main_category'] = $this->category_model->getParentCategory();
            $data['categoryDetails'] = $this->category_model->getCategory($category);
            $data['subCategory'] = $this->category_model->getsubCategory($category);
            $allCategoryDeals = $this->deals_model->getDealsCategoryListing($category, $city_id);
            $data['deals'] = $this->deals_model->getDealsCategoryListingPagination($category, 0, $city_id);
            $data['advertisement'] = $this->category_model->getAdvertisment($category);

            $data['brand_list'] = $this->brand_model->getBrandList();
            $data['category_advertisements'][] = $this->deals_model->getCategorySliderAdvertisements($category);

            $data['category_advertisements'][] = $this->deals_model->getAllAdvertisements($category);

            $data['shop_list'] = $this->deals_model->getShopList(); //change
            $totalDeal = count($allCategoryDeals);
            $data['page'] = ceil($totalDeal / 16);
            $data['page_value'] = 1;
            $data['category'] = $category;
            $data['categoryMegamenu'] = $this->category_model->getCategoryMegaMenu();
            $data['city_list'] = $this->users_model->getCityList();            
            if(!empty($data['categoryDetails']->category))
            {
            $str[$data['categoryDetails']->id] = $data['categoryDetails']->category;
            $data['breadCums'] = $this->getBreadCum($data['categoryDetails']->parent_id,$str);
            }
            //print_r($data['breadCums']); die;
            $this->load->view('home/categoryListing', $data);
        } else {
            redirect('home');
        }
    }
    
    public function getBreadCum($parent_id,$str){
        
        if($parent_id == 0){            
            return $str;
        }else{            
            $subcategory_name = $this->deals_model->getSubcategoryName($parent_id);
            $str[$subcategory_name->id] = $subcategory_name->category;
            $str = $this->getBreadCum($subcategory_name->parent_id,$str);
            return $str;
        }
        
    }


    public function categoryPagination($city_id = null) {
        $data['brand_list'] = $this->brand_model->getBrandList();
        $data['shop_list'] = $this->deals_model->getShopList(); //change
        $start = $_POST['start'];
        $category = $_POST['category'];
        $data = array();
        $data['categoryMegamenu'] = $this->category_model->getCategoryMegaMenu();
        $data['city_list'] = $this->users_model->getCityList();
        $data['advertisement'] = $this->category_model->getAdvertisment($category, $start);
        $data['deals'] = $this->deals_model->getDealsCategoryListingPagination($category, $start, $city_id);
        $this->load->view('home/ajaxPagination', $data);
    }

    public function productDetails($id) {
        $data['brand_list'] = $this->brand_model->getBrandList();
        $data['shop_list'] = $this->deals_model->getShopList(); //change
        if ($id) {
            $data = array();
            $data['deal_details'] = $this->deals_model->getDealDetails($id);
            if (!empty($data['deal_details'])) {
                if (isset($this->session->userdata('user')->id)) {
                    $user_id = $this->session->userdata('user')->id;
                } else {
                    $user_id = null;
                }
                $data['check_coupons'] = $this->deals_model->checkCoupons($id, $user_id);
                $update = array(
                    'no_clicks' => $data['deal_details']->no_clicks + 1
                );
                $this->db->update('deals', $update, array('id' => $id));
                $dealCategory = $data['deal_details']->category_id;
                $totalSimilarDeals = $this->deals_model->getDealsByCategory($dealCategory, $start = false, $id);
                $count = count($totalSimilarDeals);
                $data['page'] = ceil($count / 6);
                $data['page_value'] = 1;
                $data['similarDeals'] = $this->deals_model->getDealsByCategory($dealCategory, $start = true, $id);
                $data['deal_images'] = $this->deals_model->getDealImages($id);
                $data['review_details'] = $this->admin_model->reviewListProduct($id);
                $data['avgRate'] = $this->admin_model->averageRate($id);
                $data['brand_list'] = $this->brand_model->getBrandList();
                $data['shop_list'] = $this->deals_model->getShopList(); //change
                $data['categoryMegamenu'] = $this->category_model->getCategoryMegaMenu();
                $data['city_list'] = $this->users_model->getCityList();
                if ($data['deal_details']->item_type == 1 || $data['deal_details']->item_type == 2) {
                    $this->load->view('home/productDetails', $data);
                } else {
                    $this->load->view('home/couponDetails', $data);
                }
            } else {
                $this->load->view('home/productDetails', $data);
            }
        } else {
            redirect('home');
        }
    }

    public function paginationSimilarProducts() {
        $data['brand_list'] = $this->brand_model->getBrandList();
        $data['shop_list'] = $this->deals_model->getShopList(); //change
        $start = $_POST['start'];
        $catg_id = $_POST['catg'];
        $data['similarDeals'] = $this->deals_model->getDealsByCategory($catg_id, $start);
        $this->load->view('home/ajaxSimilarProducts', $data);
    }

    public function dealsByRetailer($id) {
        $data['brand_list'] = $this->brand_model->getBrandList();
        $data['shop_list'] = $this->deals_model->getShopList(); //change
        if ($id) {
            $deals_count = count($this->deals_model->getAllDealsByBrand($id, $item_type = null));
            $data['city_list'] = $this->users_model->getCityList();
            //$coupon_count = count($this->deals_model->getAllDealsByBrand($id,3));
            $data['page'] = ceil($deals_count / 3);
            $data['page_value'] = 1;
            $data['deals'] = $this->deals_model->getDealsByBrand($id);
            $data['coupons'] = $this->deals_model->getDealsByBrand($id, 3);
            $data['brand'] = $this->brand_model->getBrandDetail($id);
            $data['other_locations'] = $this->brand_model->getBrandLocations($id);
            $data['getReviewBrand'] = $this->review_model->getReviewBrand($id);
            $system_ip = $_SERVER['REMOTE_ADDR'];
            $data['getVote'] = $this->review_model->getVote($id, $system_ip);
            $data['showVote'] = $this->review_model->showVote($id);
            $data['categoryMegamenu'] = $this->category_model->getCategoryMegaMenu();

            $this->load->view('home/brandListing', $data);
        } else {
            redirect('home');
        }
    }

    public function paginationBrand() {
        $data['brand_list'] = $this->brand_model->getBrandList();
        $data['shop_list'] = $this->deals_model->getShopList(); //change
        $start = $_POST['start'];
        $brand_id = $_POST['brand'];
        $data['deals'] = $this->deals_model->getDealsByBrand($brand_id, $item_type = null, $start);
        //echo"<pre>";print_r($data['deals']);
        $this->load->view('home/ajaxBrandPagination', $data);
        //exit;
    }

    public function search() {

        $data = array();
        if ($this->input->get()) {
            $search_key = $this->input->get('search_key');
            $data['search_key'] = $search_key;
            $search_results = $this->deals_model->getInnerSearchResult($search_key);
            if (!empty($search_results)) {
                $total_inner_search_result = count($search_results);

                $data['page'] = ceil($total_inner_search_result / 16);
                $data['page_value'] = 1;
                $data['deals'] = $this->deals_model->getInnerSearchPaginationResult($search_key);
            }
        }
        $data['brand_list'] = $this->brand_model->getBrandList();
        $data['shop_list'] = $this->deals_model->getShopList(); //change
        $data['categoryMegamenu'] = $this->category_model->getCategoryMegaMenu();
        $data['city_list'] = $this->users_model->getCityList();
        $this->load->view('home/innerSearch', $data);
    }

    public function innerSearchPagination() {
        $start = $_POST['start'];
        $data['search_key'] = $_POST['key'];
        $data['deals'] = $this->deals_model->getInnerSearchPaginationResult($data['search_key'], $start);
        $data['categoryMegamenu'] = $this->category_model->getCategoryMegaMenu();
        $data['city_list'] = $this->users_model->getCityList();
        $this->load->view('home/ajaxInnerSearchPagination', $data);
    }

    public function manageCoupons($coupon_id = null) {
        $user_id = $this->session->userdata('user')->id;
        $coupon_details = $this->deals_model->getDealDetails($coupon_id);
        $coupon_image_url = base_url() . 'assets/frontend/images/' . $coupon_details->banner;
        $coupon_entry = array(
            'deal_id' => $coupon_id,
            'user_id' => $user_id
        );
        $this->db->insert('manage_coupons', $coupon_entry);
        $update_coupon_stock = array(
            'coupon_stock' => $coupon_details->coupon_stock - 1
        );
        $this->db->update('deals', $update_coupon_stock, array('id' => $coupon_id));
        $email_id = $this->session->userdata('user')->email_id;
        $this->email_coupon($email_id, $coupon_image_url, $user_id);
    }

    public function email_coupon($email_id, $coupon_image_url, $user_id) {

        date_default_timezone_set('Etc/UTC');
        require_once($_SERVER['DOCUMENT_ROOT'] . '/application/libraries/phpmailer/PHPMailerAutoload.php');
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Debugoutput = 'html';
        $mail->Host = "mail.nisclient.com";
        //$mail->Port = 25;
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = "noreply@nisclient.com";
        $mail->Password = "@admin2013";
        $mail->setFrom('noreply@nisclient.com', 'SalesWhereWhen');
        $mail->addReplyTo($email_id, 'Admin SalesWhereWhen');
        $mail->addAddress($email_id, 'Admin SalesWhereWhen');
        $mail->Subject = 'Coupon Information';
        $mail->Body = "Please find the atachment for the Coupon ";
        $mail->AltBody = 'This is a plain-text message body';
        $this->generateCoupon($coupon_image_url, $user_id, $email_id);
        $mail->addAttachment($_SERVER['DOCUMENT_ROOT'] . '/images/coupons/' . 'coupon_' . $user_id . '.pdf');
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            //echo "Message sent!";
            unlink($_SERVER['DOCUMENT_ROOT'] . '/images/coupons/' . 'coupon_' . $user_id . '.pdf');
            redirect('home/index');
        }
    }

    public function generateCoupon($coupon_image_url, $user_id, $email_id) {

        require_once($_SERVER['DOCUMENT_ROOT'] . '/application/libraries/fpdf/fpdf.php');
        require_once($_SERVER['DOCUMENT_ROOT'] . '/application/libraries/fpdf/fpdi.php');
        $pdf = new FPDI();

        $pageCount = $pdf->setSourceFile($_SERVER['DOCUMENT_ROOT'] . "/application/libraries/coupon.pdf");

        $tplIdx = $pdf->importPage(1, '/MediaBox');
        $count = 0;
        $y = 145.5;
        $i = 1;
        $amt = 0;
        $pdf->addPage();
        $pdf->useTemplate($tplIdx, 3, 3, 210, 300);
        $pdf->SetFont('Arial', '', '9');
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Text(50, 80, 'User ID :');
        $pdf->Text(100, 80, $user_id);
        $pdf->Text(50, 90, 'Email ID :');
        $pdf->Text(100, 90, $email_id);
        $pdf->Image($coupon_image_url, 50, 100);
        $save_status = 1;
        if (!$save_status) {
            $pdf->Output();
        } else {
            $pdf->Output($_SERVER['DOCUMENT_ROOT'] . '/images/coupons/' . 'coupon_' . $user_id . '.pdf', 'F');
        }
    }

    /* homeSearch function is search function for home page */

    public function homeSearch() {
        $data = array();
        $catg = $_POST['catg'];
        $location = $_POST['location'];
        $brand = $_POST['brand'];
        $search_key = $_POST['search_key'];
        $data['alldeals'] = $this->deals_model->getHomeSearchResults($catg, $brand, $location, $search_key);

        if (!empty($data['alldeals'])) {
            $totalDeal = count($data['alldeals']);
            $data['page'] = ceil($totalDeal / 16);
            $data['page_value'] = 1;
            $data['deals'] = $this->deals_model->getHomeSearchPagination($catg, $brand, $location, $search_key);
            $data['search_key'] = $search_key;
            $data['catg'] = $catg;
            $data['location'] = $location;
            $data['brand'] = $brand;
        }

        $this->load->view('home/ajaxHomeSearch', $data);
    }

    public function getSuggestion() {
        $key = $_POST['key'];
        $suggestion_key = array();
        $data = array();
        $data['suggestion_key'] = $this->deals_model->getSearchKeySuggestion($key);
        $this->load->view('home/ajaxSearchKeySuggestion', $data);
    }

    public function searchPagination() {
        $start = $_POST['start'];
        $data['search_key'] = $_POST['key'];
        $data['catg'] = $_POST['category'];
        $data['location'] = $_POST['location'];
        $data['brand'] = $_POST['brand'];
        $data['deals'] = $this->deals_model->getHomeSearchPagination($data['catg'], $data['brand'], $data['location'], $data['search_key'], $start);
        $this->load->view('home/ajaxHomeSearchPagination', $data);
    }

    public function content() {
        $data['suman'] = array();
        $page = $this->uri->segment(3);
        $data['content'] = $this->admin_model->getPageDetailsSlug($page);
        $data['brand_list'] = $this->brand_model->getBrandList();
        $data['shop_list'] = $this->deals_model->getShopList(); //change
        $data['categoryMegamenu'] = $this->category_model->getCategoryMegaMenu();
        $data['city_list'] = $this->users_model->getCityList();
        $this->load->view('pages/page', $data);
    }

    public function construction() {
        $this->load->view('home/construction');
    }

    public function subscribeMail() {
        $type = $_POST['type'];
        $mail = $_POST['subscribe_email'];
        $query = $this->db->get_where('subscription_app', array('subscribe_email' => $mail));
        if ($query->num_rows() > 0) {
            $data = "Your Mail Already exists in our Database";
        } else {
            $input = array('type' => $type, 'subscribe_email' => $mail, 'status' => 1);
            $this->db->insert('subscription_app', $input);
            if ($this->db->affected_rows() > 0) {
                $data = "'<p>We now have your mail id and will let you know when <br>the <span class='app'>APP</span> is <span>Coming...!</span></p>'";
            }
        }
        echo $data;
        exit;
    }

    public function email_notifications() {
        $current_url = $this->input->post('current_url');
        $item_url = $this->input->post('item_url');
        $image_url = $this->input->post('image_url');
        $item_id = $this->input->post('item_id');
        $email_id = $this->input->post('emailid');
        $data['item_desc'] = $this->deals_model->itemDescriptionForMail($item_id);
        $data['item_details'] = array(
            'item_url' => $item_url,
            'image_url' => $image_url,
            'item_id' => $item_id
        );

        $mail_template = $this->parser->parse('mailtemplate/couponsSubscribe', $data, TRUE);
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
        $mail->addReplyTo($email_id, 'Admin SalesWhereWhen');
        $mail->addAddress($email_id, 'Admin SalesWhereWhen');
        $mail->Subject = 'Subscription Information';
        $mail->Body = $mail_template;
        $mail->AltBody = 'This is a plain-text message body';
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            redirect($current_url);
        }
    }

    public function insertAlert() {


        $seesion_alert_cart = $this->session->userdata('session_alert_me');
        foreach ($seesion_alert_cart as $create) {
            //print_r($create); die;
            $create = array(
                'type' => $create['type'],
                'type_data' => $create['type_data'],
                'alert_type' => $create['alert_type'],
                'item' => $create['item'],
                'band' => $create['band'],
                'shop' => $create['shop'],
                'status' => 1
            );
            $this->db->insert('alert', $create);
        }
        $this->session->unset_userdata('session_alert_me');
        redirect("home");
    }

    public function insertAlertSeesion() {

        //print_r($this->input->post()); die;

        $type = $this->input->post('alert_type');
        if ($type == 1) {
            $type_data = $this->input->post('email');
        } else if ($type == 2) {
            $type_data = $this->input->post('phone');
        } else if ($type == 3) {
            $input = array(
                'email_id' => $this->input->post('username'),
                'password' => md5($this->input->post('password'))
            );
            $login = $this->users_model->user_login($input, 'users');
            $type_data = $login->id;
        }
        $create = array(
            'type' => $type,
            'type_data' => $type_data,
            'alert_type' => $this->input->post('deal_type'),
            'item' => $this->input->post('name'),
            'band' => implode(",", $this->input->post('brand')),
            'shop' => $this->input->post('retailer'),
            'status' => 1
        );
        $seesion_alert_cart = $this->session->userdata('session_alert_me');
        if (!empty($seesion_alert_cart)) {
            $alert_array = $seesion_alert_cart;
        } else {
            $alert_array = array();
        }
        if ($create) {
            $alert_array[] = $create;
        }
        $this->session->set_userdata('session_alert_me', $alert_array);
    }

    public function alertMeCart() {
        $data[] = array("suman");
        $seesion_alert_cart = $this->session->userdata('session_alert_me');
        //print_r($seesion_alert_cart); die;
        if (!empty($seesion_alert_cart)) {
            foreach ($seesion_alert_cart as $key => $cart) {
                //print_r($cart['band']); die;
                $brand = $this->deals_model->fetchBrandArray($cart['band']);
                $shop = $this->deals_model->fetchShopAlert($cart['shop']);
                $data['alert_brand'][$key] = $brand;
                $data['alert_shop'][$key] = $shop;
                $data['alert_data'][$key] = $cart['type_data'];
                $data['alert_item'][$key] = $cart['item'];
                if ($cart['type'] == 1) {
                    $data['alert_type'][$key] = "Email";
                } else if ($cart['type'] == 2) {
                    $data['alert_type'][$key] = "Text Message";
                } else if ($cart['type'] == 3) {
                    $data['alert_type'][$key] = "SWW Account";
                }
                $data['key'][$key] = $key;
            }
        }
        $data['brand_list'] = $this->brand_model->getBrandList();
        $data['shop_list'] = $this->deals_model->getShopList(); //change
        $data['categoryMegamenu'] = $this->category_model->getCategoryMegaMenu();
        $data['city_list'] = $this->users_model->getCityList();
        $this->load->view('users/sessionAlertCart', $data);
    }

    public function removeAlertItem($id) {
        $seesion_alert_cart = $this->session->userdata('session_alert_me');
        //print_r($id);
        //echo "<br>";
        //print_r($seesion_alert_cart); die;
        if ($id) {
            $del_key = ($id - 1);
            unset($seesion_alert_cart[$del_key]);
        }
        $this->session->set_userdata('session_alert_me', $seesion_alert_cart);
        redirect("home/alertMeCart");
    }

    public function onlineCoupons($catgId = NULL, $pagination = NULL) {
        $data['brand_list'] = $this->brand_model->getBrandList();
        $data['shop_list'] = $this->deals_model->getShopList(); //change
        $data['categoryMegamenu'] = $this->category_model->getCategoryMegaMenu();
        $data['city_list'] = $this->users_model->getCityList();
        $data['main_category'] = $this->category_model->getParentCategory();
        $data['categoryDetails'] = $this->category_model->getCategory($catgId);
        if (!$pagination) {
            $start = 0;
        } else {
            $start = ($pagination - 1) * 8;
        }
        $limit = 8;
        $data['pagination'] = $pagination;
        $data['onlineCoupons'] = $this->deals_model->getOnlineCoupons($catgId, NULL, NULL, $start, $limit);
        $data['total_product'] = $this->deals_model->getOnlineCouponsCountRows($catgId);

        $count_page = ceil($data['total_product'] / 8);
        if ($pagination == $count_page) {
            $rem = $data['total_product'] % 8;
            $start = $start - (8 - $rem);
        }
        $data['couponsCategory'] = $this->deals_model->getCouponsCategory();
        //$data['advertisement'] = $this->category_model->getAdvertisment($catgId); for later use
        $this->load->view('home/onlineCoupons', $data);
    }

    public function onlineCouponsOffers($catgId = NULL, $city = NULL, $pagination = NULL) {
        $data['brand_list'] = $this->brand_model->getBrandList();
        $data['shop_list'] = $this->deals_model->getShopList(); //change
        $data['categoryMegamenu'] = $this->category_model->getCategoryMegaMenu();
        $data['city_list'] = $this->users_model->getCityList();
        $data['main_category'] = $this->category_model->getParentCategory();
        $data['categoryDetails'] = $this->category_model->getCategory($catgId);
        $dealtext = 'off,offer,discount,free,less';
        if (!$pagination) {
            $start = 0;
        } else {
            $start = ($pagination - 1) * 8;
        }
        $limit = 8;
        $data['pagination'] = $pagination;
        $data['onlineCoupons'] = $this->deals_model->getOnlineCoupons($catgId, $dealtext, $city, $start, $limit);
        $data['total_product'] = $this->deals_model->getOnlineCouponsCountRows($catgId, $dealtext, $city);
        $count_page = ceil($data['total_product'] / 8);
        if ($pagination == $count_page) {
            $rem = $data['total_product'] % 8;
            $start = $start - (8 - $rem);
        }
        $data['couponsCategory'] = $this->deals_model->getCouponsCategory();
        //$data['advertisement'] = $this->category_model->getAdvertisment($catgId); for later use
        $this->load->view('home/onlineCoupons', $data);
    }

    public function onlineCouponsPagination($catgId = NULL, $pagination = NULL) {
        $dealtext = 'off,offer,discount,free,less';
        $pagination = $this->input->post('pagination');
        if (!$pagination) {
            $start = 0;
        } else {
            $start = ($pagination - 1) * 8;
        }
        $limit = 8;
        $data['pagination'] = $pagination;
        $data['onlineCoupons'] = $this->deals_model->getOnlineCoupons($catgId, $dealtext, NULL, $start);
        $data['total_product'] = $this->deals_model->getOnlineCouponsCountRows($catgId);
        $count_page = ceil($data['total_product'] / 8);
        if ($pagination == $count_page) {
            $rem = $data['total_product'] % 8;
            $start = $start - (8 - $rem);
        }

        $this->load->view('home/onlineCouponsPagination', $data);
    }

    public function frontHomeSearch($pagination = NULL) {

        $data['brand_list'] = $this->brand_model->getBrandList();
        $data['shop_list'] = $this->deals_model->getShopList(); //change
        $data['categoryMegamenu'] = $this->category_model->getCategoryMegaMenu();
        $data['city_list'] = $this->users_model->getCityList();
        $data['add_image_right_part'] = $this->deals_model->getAdvertisementsforSearchRight();

        $look_for = $this->input->post('look_for');
        $retailer = $this->input->post('retailer');
        $city = $this->input->post('city');
        $ser_key = $this->input->post('ser_key');
        
        /* For Cookie Item Remember */
        $cookie_country_value = $this->input->post('cookie_country_value');
        $cookie_city_value = $this->input->post('cookie_city_value');
        $cookie_retailer_value = $this->input->post('cookie_retailer_value');
              
        $country_cookie = array(
            'name'   => 'country',
            'value'  => $cookie_country_value,
            'expire' => 86500,
            'secure' => FALSE
        );
        $city_cookie = array(
            'name'   => 'city',
            'value'  => $cookie_city_value,
            'expire' => 86500,
            'secure' => FALSE
        );        
        $retailer_cookie = array(
            'name'   => 'retailer',
            'value'  => $cookie_retailer_value,
            'expire' => 86500,
            'secure' => FALSE
        );

        $this->input->set_cookie($country_cookie); 
        $this->input->set_cookie($city_cookie);
        $this->input->set_cookie($retailer_cookie);
        $cookieDetails =array(
            'retailer_value'=>$this->input->cookie('retailer', TRUE),
            'country_value'=>$this->input->cookie('country', TRUE),
            'city_value'=>$this->input->cookie('city', TRUE)
        );
         
        /* For Cookie Item Remember End*/  
        
        /* For Search Item Show */
        if ($this->input->post()) {
            $arr_search = array(
                'look_for' => $look_for,
                'retailer' => $retailer,
                'city' => $city,
                'ser_key' => $ser_key
            );
            $data['arr_search'] = $arr_search;
        }
        /* For Search Item Show End */

        if (!$pagination) {
            $start = 0;
            //print_r($start);die;
        } else {
            $start = ($pagination - 1) * 8;
            //print_r($start);die;
        }
        $limit = 8;
        $data['pagination'] = $pagination;


        $data['homeSearchResult'] = $this->deals_model->getHomeSearchResultWallmart($look_for, $retailer, $city, $ser_key, $start, $limit);
        $data['searchResult'] = count($data['homeSearchResult']);
        $data['total_product'] = $this->deals_model->getHomeSearchResultWallmartNumRows($look_for, $retailer, $city, $ser_key);
        if ($data['searchResult'] == 0) {
            $data['homeSearchResult'] = $this->deals_model->getHomeSearchResultWallmartRetailer($look_for, $retailer, $city, $ser_key, $start, $limit);
            $data['total_product'] = $this->deals_model->getHomeSearchResultWallmartRetailerNumRows($look_for, $retailer, $city, $ser_key);
        }

        $count_page = ceil($data['total_product'] / 8);
        if ($pagination == $count_page) {
            $rem = $data['total_product'] % 8;
            $start = $start - (8 - $rem);
        }

        $data['main_category'] = $this->category_model->getParentCategory();
        $data['cookie_details'] = $cookieDetails;
        $this->load->view('home/walmart', $data);
    }

    public function ajaxsearchHomePagination() {
        $pagination = $this->input->post('pagination');
        $look_for = $this->input->post('look_for');
        $retailer = $this->input->post('retailer');
        $city = $this->input->post('city');
        $ser_key = $this->input->post('ser_key');

        if (!$pagination) {
            $start = 0;
        } else {
            $start = ($pagination - 1) * 8;
        }
        $limit = 8;
        $data['pagination'] = $pagination;

        $data['homeSearchResult'] = $this->deals_model->getHomeSearchResultWallmart($look_for, $retailer, $city, $ser_key, $start, $limit);
        $data['searchResult'] = count($data['homeSearchResult']);
        if ($data['searchResult'] == 0) {
            $data['homeSearchResult'] = $this->deals_model->getHomeSearchResultWallmartRetailer($look_for, $retailer, $city, $ser_key, $start, $limit);
            $data['total_product'] = $this->deals_model->getHomeSearchResultWallmartRetailerNumRows($look_for, $retailer, $city, $ser_key);
        }
        $data['total_product'] = $this->deals_model->getHomeSearchResultWallmartNumRows($look_for, $retailer, $city, $ser_key);

        $count_page = ceil($data['total_product'] / 8);
        if ($pagination == $count_page) {
            $rem = $data['total_product'] % 8;
            $start = $start - (8 - $rem);
        }

        $this->load->view('home/ajaxsearchHomePagination', $data);
    }

    public function ajaxInnerSearchFilter($pagination = NULL) {
        $data['brand_list'] = $this->brand_model->getBrandList();
        $data['shop_list'] = $this->deals_model->getShopList(); //change
        $data['categoryMegamenu'] = $this->category_model->getCategoryMegaMenu();
        $data['city_list'] = $this->users_model->getCityList();

        $look_for = $this->input->post('look_for');
        $retailer = $this->input->post('retailer');
        $city = $this->input->post('city');
        $ser_key = $this->input->post('ser_key');
        /* For Search Item Show */
        if ($this->input->post()) {
            $arr_search = array(
                'look_for' => $look_for,
                'retailer' => $retailer,
                'city' => $city,
                'ser_key' => $ser_key
            );
            $data['arr_search'] = $arr_search;
            //print_r($arr_search);
        }
        /* For Search Item Show End */

        if (!$pagination) {
            $start = 0;
            //print_r($start);die;
        } else {
            $start = ($pagination - 1) * 8;
            //print_r($start);die;
        }
        $limit = 8;
        $data['pagination'] = $pagination;

        $data['homeSearchResult'] = $this->deals_model->getHomeSearchResultWallmart($look_for, $retailer, $city, $ser_key, $start, $limit);
        $data['searchResult'] = count($data['homeSearchResult']);
        $data['total_product'] = $this->deals_model->getHomeSearchResultWallmartNumRows($look_for, $retailer, $city, $ser_key);
        if ($data['searchResult'] == 0) {
            $data['homeSearchResult'] = $this->deals_model->getHomeSearchResultWallmartRetailer($look_for, $retailer, $city, $ser_key, $start, $limit);
            $data['total_product'] = $this->deals_model->getHomeSearchResultWallmartRetailerNumRows($look_for, $retailer, $city, $ser_key);
        }
        $count_page = ceil($data['total_product'] / 8);
        if ($pagination == $count_page) {
            $rem = $data['total_product'] % 8;
            $start = $start - (8 - $rem);
        }

        $data['main_category'] = $this->category_model->getParentCategory();
        $this->load->view('home/ajaxInnerSearchFilter', $data);
    }

    public function frontHomeSearchforall($pagination = null) {
        $data['brand_list'] = $this->brand_model->getBrandList();
        $data['shop_list'] = $this->deals_model->getShopList(); //change
        $data['categoryMegamenu'] = $this->category_model->getCategoryMegaMenu();
        $data['city_list'] = $this->users_model->getCityList();
        $data['add_image_top'] = $this->deals_model->getAdvertisementsforSearchTop();
        $data['add_image_right_part'] = $this->deals_model->getAdvertisementsforSearchRight();
        $look_for = $this->input->post('look_for');
        $retailer = $this->input->post('retailer');
        $city = $this->input->post('city');
        $ser_key = $this->input->post('ser_key');
        
        /* For Cookie Item Remember */
        $cookie_country_value = $this->input->post('cookie_country_value');
        $cookie_city_value = $this->input->post('cookie_city_value');
        $cookie_retailer_value = $this->input->post('cookie_retailer_value');
              
        $country_cookie = array(
            'name'   => 'country',
            'value'  => $cookie_country_value,
            'expire' => 86500,
            'secure' => FALSE
        );
        $city_cookie = array(
            'name'   => 'city',
            'value'  => $cookie_city_value,
            'expire' => 86500,
            'secure' => FALSE
        );        
        $retailer_cookie = array(
            'name'   => 'retailer',
            'value'  => $cookie_retailer_value,
            'expire' => 86500,
            'secure' => FALSE
        );

        $this->input->set_cookie($country_cookie); 
        $this->input->set_cookie($city_cookie);
        $this->input->set_cookie($retailer_cookie);
        $cookieDetails =array(
            'retailer_value'=>$this->input->cookie('retailer', TRUE),
            'country_value'=>$this->input->cookie('country', TRUE),
            'city_value'=>$this->input->cookie('city', TRUE)
        );
     
        
        /* For Search Item Show */
        if ($this->input->post()) {
            $arr_search = array(
                'look_for' => $look_for,
                'retailer' => $retailer,
                'city' => $city,
                'ser_key' => $ser_key
            );
            $data['arr_search'] = $arr_search;
        }
        /* For Search Item Show End */

        if (!$pagination) {
            $start = 0;
            //print_r($start);die;
        } else {
            $start = ($pagination - 1) * 8;
            //print_r($start);die;
        }
        $limit = 8;
        $data['pagination'] = $pagination;

        $data['homeSearchResult'] = $this->deals_model->getHomeSearchResultWallmart($look_for, $retailer, $city, $ser_key, $start, $limit);
        $data['searchResult'] = count($data['homeSearchResult']);
        $data['total_product'] = $this->deals_model->getHomeSearchResultWallmartNumRows($look_for, $retailer, $city, $ser_key);
        if ($data['searchResult'] == 0) {
            $data['homeSearchResult'] = $this->deals_model->getHomeSearchResultWallmartRetailer($look_for, $retailer, $city, $ser_key, $start, $limit);
            $data['total_product'] = $this->deals_model->getHomeSearchResultWallmartRetailerNumRows($look_for, $retailer, $city, $ser_key);
        }

        $count_page = ceil($data['total_product'] / 8);
        if ($pagination == $count_page) {
            $rem = $data['total_product'] % 8;
            $start = $start - (8 - $rem);
        }

        $data['main_category'] = $this->category_model->getParentCategory();
        $data['cookie_details'] = $cookieDetails;
        $this->load->view('home/frontHomeSearchforall', $data);
    }

    public function ajaxsearchHomePaginationforAll() {
        $name_value = 0;
        $price_value = 0;
        $location_value =0;
        $pagination = $this->input->post('pagination');
        $look_for = $this->input->post('look_for');
        $retailer = $this->input->post('retailer');
        $city = $this->input->post('city');
        $ser_key = $this->input->post('ser_key');
        if ($this->input->post('name_value')) {
            $name_value = $this->input->post('name_value');
        }
        if ($this->input->post('price_value')) {
            $price_value = $this->input->post('price_value');
        }
        if ($this->input->post('location_value')) {
            $location_value = $this->input->post('location_value');
        }
        if (!$pagination) {
            $start = 0;
        } else {
            $start = ($pagination - 1) * 8;
        }
        $limit = 8;
        $data['pagination'] = $pagination;

        $data['homeSearchResult'] = $this->deals_model->getHomeSearchResultWallmart($look_for, $retailer, $city, $ser_key, $start, $limit, $name_value,$price_value);
        $data['searchResult'] = count($data['homeSearchResult']);
        if ($data['searchResult'] == 0) {
            $data['homeSearchResult'] = $this->deals_model->getHomeSearchResultWallmartRetailer($look_for, $retailer, $city, $ser_key, $start, $limit);
            $data['total_product'] = $this->deals_model->getHomeSearchResultWallmartRetailerNumRows($look_for, $retailer, $city, $ser_key);
        }
        $data['total_product'] = $this->deals_model->getHomeSearchResultWallmartNumRows($look_for, $retailer, $city, $ser_key);

        $count_page = ceil($data['total_product'] / 8);
        if ($pagination == $count_page) {
            $rem = $data['total_product'] % 8;
            $start = $start - (8 - $rem);
        }

        $this->load->view('home/ajaxsearchHomePaginationforAll', $data);
    }
	
    public function destroryUserregistrerSession(){
	$this->session->unset_userdata('registerUser');
	$this->session->sess_destroy();
	redirect('home');
	}
    public function frontHomeSearchforallSortByName($pagination = null) {
        $name_value = 0;
        $price_value = 0;
        $location_value =0;
        $data['brand_list'] = $this->brand_model->getBrandList();
        $data['shop_list'] = $this->deals_model->getShopList(); //change
        $data['categoryMegamenu'] = $this->category_model->getCategoryMegaMenu();
        $data['city_list'] = $this->users_model->getCityList();
        $data['add_image_top'] = $this->deals_model->getAdvertisementsforSearchTop();
        $data['add_image_right_part'] = $this->deals_model->getAdvertisementsforSearchRight();
        $look_for = $this->input->post('look_for');
        $retailer = $this->input->post('retailer');
        $city = $this->input->post('city');
        $ser_key = $this->input->post('ser_key');
        if ($this->input->post('name_value')) {
            $name_value = $this->input->post('name_value');
        }
        if ($this->input->post('price_value')) {
            $price_value = $this->input->post('price_value');
        }
        if ($this->input->post('location_value')) {
            $location_value = $this->input->post('location_value');
        }

        /* For Search Item Show */
        if ($this->input->post()) {
            $arr_search = array(
                'look_for' => $look_for,
                'retailer' => $retailer,
                'city' => $city,
                'ser_key' => $ser_key
            );
            $data['arr_search'] = $arr_search;
        }
        /* For Search Item Show End */

        if (!$pagination) {
            $start = 0;
            //print_r($start);die;
        } else {
            $start = ($pagination - 1) * 8;
            //print_r($start);die;
        }
        $limit = 8;
        $data['pagination'] = $pagination;

        $data['homeSearchResult'] = $this->deals_model->getHomeSearchResultWallmart($look_for, $retailer, $city, $ser_key, $start, $limit, $name_value, $price_value,$location_value);
        $data['searchResult'] = count($data['homeSearchResult']);
        $data['total_product'] = $this->deals_model->getHomeSearchResultWallmartNumRows($look_for, $retailer, $city, $ser_key);
        if ($data['searchResult'] == 0) {
            $data['homeSearchResult'] = $this->deals_model->getHomeSearchResultWallmartRetailer($look_for, $retailer, $city, $ser_key, $start, $limit);
            $data['total_product'] = $this->deals_model->getHomeSearchResultWallmartRetailerNumRows($look_for, $retailer, $city, $ser_key);
        }

        $count_page = ceil($data['total_product'] / 8);
        if ($pagination == $count_page) {
            $rem = $data['total_product'] % 8;
            $start = $start - (8 - $rem);
        }

        $data['main_category'] = $this->category_model->getParentCategory();
        $this->load->view('home/frontHomeSearchforallSortByName', $data);
    }
    
    public function ajaxSimilarItems(){
        $shopId = $this->input->post('shopid');
        $category_id = $this->input->post('category_id');
        $data['homeSearchResult'] = $this->deals_model->getSimilarItems($shopId,$category_id);
        $this->load->view('home/ajaxSimilarItems',$data);
    }

}
