<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grocery extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('users_model');
        $this->load->model('review_model');
        $this->load->model('grocery_model');
        $this->load->model('category_model');
        $this->load->model('brand_model');
        $this->load->model('deals_model');
        $this->load->model('admin_model');
        $this->load->library('form_validation');
    }

    public function index($pagination = NULL) {
        /* For Trending pagination*/
       
        if(!$pagination){
            $start = 0;
        }else{
            $start = ($pagination - 1) * 8;
        }
        $limit = 8;
        $data['pagination'] = $pagination;
        $data['trending_offers'] = $this->grocery_model->getallTrendingOffers($start,$limit); 
        $data['total_product'] = $this->grocery_model->getallTrendingOffersCountRows();
        //print_r( $data['total_product']);
        $count_page = ceil($data['total_product']/8);
        if($pagination == $count_page){
            $rem = $data['total_product']%8;
            $start = $start - (8 - $rem);
        }
       
        /* Trending Pagination End */
        $data['shop_list'] = $this->deals_model->getShopList(); //change
        $data['groceries'] = $this->grocery_model->getGroceryOffers($id = null);
	$data['banner_images'] = $this->admin_model->getBannerImages(3);	
        $offersCount = count($this->grocery_model->getValidGroceries());
        $data['page'] = ceil($offersCount / 9);
        $data['page_value'] = 1;
        $data['brand_list'] = $this->brand_model->getBrandList();
        $data['city_list'] = $this->users_model->getCityList();
        $data['sub_category'] = $this->category_model->getsubCategory();
        $data['categoryMegamenu'] = $this->category_model->getCategoryMegaMenu();
        $data['city_list'] = $this->users_model->getCityList();           
        $data['subCategory'] = $this->category_model->getgrocerysubCategory();
        $data['advertisement'] = $this->category_model->getAdvertismentForGrocery();
        $this->load->view('grocery/groceryShop', $data);
    }
    
     public function offers($city=NULL,$pagination=NULL) {
         
         if(!$pagination){
            $start = 0;
        }else{
            $start = ($pagination - 1) * 8;
        }
        $limit = 8;
        $data['pagination'] = $pagination;
        $data['trending_offers'] = $this->grocery_model->getallTrendingOffers($start,$limit); 
        $data['total_product'] = $this->grocery_model->getallTrendingOffersCountRows();
        //print_r( $data['total_product']);
        $count_page = ceil($data['total_product']/8);
        if($pagination == $count_page){
            $rem = $data['total_product']%8;
            $start = $start - (8 - $rem);
        }
         
         
         
        $data['shop_list'] = $this->deals_model->getShopList(); //change
        $dealtext = 'off,offer,discount,free';
        $data['groceries'] = $this->grocery_model->getGroceryOffers($id = null,0,$dealtext,$city);
        $offersCount = count($this->grocery_model->getValidGroceries());
        $data['page'] = ceil($offersCount / 9);
        $data['page_value'] = 1;
        $data['brand_list'] = $this->brand_model->getBrandList();
        $data['city_list'] = $this->users_model->getCityList();
        $data['sub_category'] = $this->category_model->getsubCategory();
	$data['banner_images'] = $this->admin_model->getBannerImages(3);
        $data['categoryMegamenu'] = $this->category_model->getCategoryMegaMenu();
        $data['city_list'] = $this->users_model->getCityList();
        $this->load->view('grocery/groceryShop', $data);
    }

    public function groceryDetails($id) {
        if ($id) {
            $data = array();
            
            $data['deal_details'] = $this->grocery_model->getGroceryOffers($id);
            $data['review_details'] = $this->admin_model->reviewListProduct($id);
            $data['avgRate'] = $this->admin_model->averageRate($id);
            if ($data['deal_details']) {
                if (isset($this->session->userdata('user')->id)) {
                    $user_id = $this->session->userdata('user')->id;
                } else {
                    $user_id = null;
                }
                $update = array(
                    'no_clicks' => $data['deal_details']->no_clicks + 1
                );
                $this->db->update('deals', $update, array('id' => $id));
                $dealCategory = $data['deal_details']->category_id;
                $data['similarDeals'] = $this->deals_model->getDealsByCategory($dealCategory, $start = null, $id);
                $count = count($data['similarDeals']);
                $data['page'] = ceil($count / 6);
                $data['page_value'] = 1;
                $data['deal_images'] = $this->deals_model->getDealImages($id);
                $data['categoryMegamenu'] = $this->category_model->getCategoryMegaMenu();
                $data['city_list'] = $this->users_model->getCityList();
                $data['brand_list'] = $this->brand_model->getBrandList();
                $data['shop_list'] = $this->deals_model->getShopList(); //change       
                $this->load->view('grocery/groceryDetails', $data);
            } else {
                $data['categoryMegamenu'] = $this->category_model->getCategoryMegaMenu();
                $data['city_list'] = $this->users_model->getCityList();
                $data['brand_list'] = $this->brand_model->getBrandList();
                $data['shop_list'] = $this->deals_model->getShopList(); //change
                $this->load->view('grocery/groceryDetails', $data);
            }
        } else {
            redirect('home');
        }
    }

    public function pagination() {
        $start = $_POST['start'];
        
        $location = $_POST['location'];
        $brand = $_POST['brand'];
        $search_key = $_POST['search_key'];
        if ($search_key) {
            $data['groceries'] = $this->grocery_model->getGrocerySearchPaginationResults($brand, $location, $search_key, $start);
        } else {
            $data['groceries'] = $this->grocery_model->getGroceryOffers($id = null, $start);
        }
       
        $data['categoryMegamenu'] = $this->category_model->getCategoryMegaMenu();
        $data['city_list'] = $this->users_model->getCityList();
        $data['advertisement'] = $this->category_model->getAdvertismentForGrocery($start);
        $this->load->view('grocery/ajaxGroceryPagination', $data);
       
    }

   

    public function search() {
       
        $location = $_POST['location'];
        $brand = $_POST['brand'];
        $search_key = $_POST['search_key'];
        $groceries = $this->grocery_model->getSearchResults($brand, $location, $search_key);
        
        $groceryCount = count($groceries);
        $data['page'] = ceil($groceryCount / 9);
        $data['page_value'] = 1;
        if (!empty($groceryCount)) {
            $data['search_key'] = $search_key;           
            $data['location'] = $location;
            $data['brand'] = $brand;
            $data['groceries'] = $this->grocery_model->getGrocerySearchPaginationResults($brand, $location, $search_key);
        
            
        }
        $this->load->view('grocery/ajaxGrocerySearch', $data);
    }

    public function getSuggestion() {
        $key = $_POST['key'];
        $suggestion_key = array();
        $data = array();
        $data['suggestion_key'] = $this->grocery_model->getSearchKeySuggestion($key);
        $this->load->view('grocery/ajaxSearchKeySuggestion', $data);
    }
    
    public function trendinPagination(){
       $pagination = $this->input->post('pagination');
        if(!$pagination){
            $start = 0;
        }else{
            $start = ($pagination - 1) * 8;
        }
        $limit = 8;
        $data['pagination'] = $pagination;
        $data['trending_offers'] = $this->grocery_model->getallTrendingOffers($start,$limit); 
        $data['total_product'] = $this->grocery_model->getallTrendingOffersCountRows();
        //print_r( $data['total_product']);
        $count_page = ceil($data['total_product']/8);
        if($pagination == $count_page){
            $rem = $data['total_product']%8;
            $start = $start - (8 - $rem);
        }
        //print_r($data);
        $this->load->view('grocery/ajaxTrendingPagination',$data);
    }

}

/* End of file grocery.php */
/* Location: ./application/controllers/grocery.php */
