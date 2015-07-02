<?php

Class deals_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /* This function will fetch all the active & inactive deal deals in admin panel */

    public function getDealDetails($id = null,$logged_user_id=NULL) {
        $this->db->select('m.email_id,b.id as brandId,b.brand_logo,b.name as brand_name,d.merchant_id,s.id as shopid,s.logo_thumb,s.shop_name,s.shop_address,s.shop_city,s.shop_mobile,s.shop_highlights,s.shop_url,s.shop_location_map,m.email_id,sc.category as parentCatg,c.category,c.parent_id,d.*');
        $this->db->from('deals d');
        $this->db->join('category c', 'c.id = d.category_id', 'LEFT');
        $this->db->join('category sc', 'sc.id = c.parent_id', 'LEFT');
        $this->db->join('shop s', 's.id = d.shop_id', 'LEFT');
        $this->db->join('brand b', 'b.id = d.brand_id', 'LEFT');
        $this->db->join('merchant m', 'm.id = d.merchant_id', 'LEFT');
        if ($id) {
            $this->db->where(array('d.id' => $id, 'd.is_deleted' => 1));
            $query = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->first_row() : '';
        } else {
            $this->db->where(array('d.is_deleted' => 1,'d.merchant_id'=>$logged_user_id));
            $query = $this->db->get();
            $result = $query->result();
        }
        //echo"<pre>";print_r($result);exit;
        return $result;
    }

    public function manage($input, $id = null) {
        if ($id) {
            $this->db->update('deals', $input, array('id' => $id));
            $result = ($this->db->affected_rows() != 1) ? '' : 1;
        } else {
            $this->db->insert('deals', $input);
            $result = $this->db->insert_id();
        }
        return $result;
    }

    public function manageDealImages($files, $deal_id) {
        foreach ($files as $file) {
            $input = array(
                'deal_id' => $deal_id,
                'deal_image' => $file
            );
            $this->db->insert('deal_images', $input);
        }
    }

    public function addDealImage($file, $deal_id) {
        $input = array(
            'deal_id' => $deal_id,
            'deal_image' => $file
        );
        $this->db->insert('deal_images', $input);
    }

    public function getDealsByMerchant($merchant_id, $id = null) {
        if ($id) {
            $query = $this->db->get_where('deals', array('id' => $id, 'merchant_id' => $merchant_id, 'status' => 1, 'is_deleted' => 1));
            $result = $query->first_row();
        } else {
            $query = $this->db->get_where('deals', array('merchant_id' => $merchant_id, 'status' => 1, 'is_deleted' => 1));
            $result = $query->result();
        }
        return $result;
    }

    /* This function is used for fetching similar products in details page */

    public function getDealsByCategory($category, $start, $id = null) {
        $current_date = date("Y-m-d", time());
        $this->db->select('m.email_id,b.name as brand_name,s.id as shopid,s.logo_thumb,s.shop_name,s.shop_url,m.email_id,c.category,d.*');
        $this->db->from('deals d');
        $this->db->join('category c', 'c.id = d.category_id', 'LEFT');
        $this->db->join('shop s', 's.id = d.shop_id', 'LEFT');
        $this->db->join('brand b', 'b.id = d.brand_id', 'LEFT');
        $this->db->join('merchant m', 'm.id = d.merchant_id', 'LEFT');
        if ($id) {
            $this->db->where(array('d.category_id' => $category, 'd.valid_till >' => $current_date, 'd.id !=' => $id, 'd.status' => 1, 'd.is_deleted' => 1));
        } else {
            $this->db->where(array('d.category_id' => $category, 'd.status' => 1, 'd.is_deleted' => 1));
        }
        if ($start == true) {
            $this->db->limit(6, $start);
        }
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    /* This function will fetch all the active deal deals in frontend home page */

    public function getDealList($type, $search_key = Null) {
        $current_date = date("Y-m-d", time());
        $this->db->select('m.email_id,b.id as brandId,b.brand_logo,b.name as brand_name,s.id as shopid,s.logo_thumb,s.shop_name,s.shop_address,s.shop_city,s.shop_highlights,s.shop_url,m.email_id,sc.category as parentCatg,c.category,c.parent_id,d.*');
        $this->db->from('deals d');
        $this->db->join('category c', 'c.id = d.category_id', 'LEFT');
        $this->db->join('category sc', 'sc.id = c.parent_id', 'LEFT');
        $this->db->join('shop s', 's.id = d.shop_id', 'LEFT');
        $this->db->join('brand b', 'b.id = d.brand_id', 'LEFT');
        $this->db->join('merchant m', 'm.id = d.merchant_id', 'LEFT');
        $this->db->where(array(
            'd.valid_till >' => $current_date,
            'd.item_type !=' => 4,
            'd.deal_type' => $type,
            'd.status' => 1,
            'd.is_deleted' => 1,
        ));
        if ($search_key) {
            $this->db->like('d.product_name', $search_key);
            $this->db->or_like('s.shop_name', $search_key);
        }
        $query = $this->db->get();
        if ($query->num_rows() && $type == 1) {
            foreach ($query->result() as $row) {
                if ($row->item_type != 1) {
                    $result[3][] = $row;
                } else {
                    $result[$row->item_type][] = $row;
                }
            }
            $query->free_result();
        } else {
            $result = $query->result();
        }
        return $result;
    }

    /* public function getDealList($type = NULL){
      if($type){
      $this->db->select('*');
      $this->db->from('deals');
      $this->db->where(array('deal_type'=>$type,'status'=>1,'is_deleted'=>1));
      if($type == 1){
      $this->db->limit(15);
      }else{
      $this->db->limit(2);
      }
      $this->db->order_by("id", "asc");
      $query = $this->db->get();
      $result= $query->result();
      return $result;

      }else{
      $current_date = date("Y-m-d", time());
      $sql = "select * from deals where status = 1 AND is_deleted = 1 AND `valid_till`>".$current_date." order by `valid_till`,`no_clicks`";
      $query = $this->db->query($sql);
      if ($query->num_rows()) {
      foreach ($query->result() as $row) {
      if($row->item_type != 1 && $row->item_type != 4){
      $result[3][] = $row;
      }else{
      $result[$row->item_type][] = $row;
      }
      }
      $query->free_result();
      return $result;
      }
      }
      } */

    public function getDealImages($id) {
        $this->db->select('di.*');
        $this->db->from('deal_images di');
        $this->db->join('deals d', 'd.id = di.deal_image', 'LEFT');
        $this->db->where(array('di.deal_id' => $id, 'di.status' => 1));
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function getInnerSearchResult($search_key) {
        $current_date = date("Y-m-d", time());
        $this->db->select('b.id as brandId,b.brand_logo,ci.city_name,b.name as brand_name,s.id as shopid,s.logo_thumb,s.shop_name,s.shop_address,s.shop_city,s.shop_highlights,s.shop_url,sc.category as parentCatg,c.category,c.parent_id,d.*');
        $this->db->from('deals d');
        $this->db->join('category c', 'c.id = d.category_id', 'LEFT');
        $this->db->join('category sc', 'sc.id = c.parent_id', 'LEFT');
        $this->db->join('shop s', 's.id = d.shop_id', 'LEFT');
        $this->db->join('brand b', 'b.id = d.brand_id', 'LEFT');
        $this->db->join('city ci', 'ci.city_id = s.shop_city', 'LEFT');
        $this->db->where(array(
            'd.item_type !=' => 4,
            'd.valid_till >' => $current_date,
            'd.status' => 1,
            'd.is_deleted' => 1,
        ));
        $this->db->like('d.product_name', $search_key);
        $this->db->or_like('s.shop_name', $search_key);
        $this->db->or_like('d.deal_text', $search_key);
        $this->db->order_by('d.id', 'DESC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function getDealsByBrand($brand_id, $item_type = null, $start = null) {
        $this->db->select('m.email_id,b.name as brand_name,s.id as shopid,s.*,m.email_id,sc.category as parentCatg,c.category,c.parent_id,d.*');
        $this->db->from('deals d');
        $this->db->join('category c', 'c.id = d.category_id', 'LEFT');
        $this->db->join('category sc', 'sc.id = c.parent_id', 'LEFT');
        $this->db->join('shop s', 's.id = d.shop_id', 'LEFT');
        $this->db->join('brand b', 'b.id = d.brand_id', 'LEFT');
        $this->db->join('merchant m', 'm.id = d.merchant_id', 'LEFT');
        if ($item_type) {
            $this->db->where(array('d.brand_id' => $brand_id, 'd.item_type' => $item_type, 'd.status' => 1, 'd.is_deleted' => 1));
        } else {
            $this->db->where(array('d.brand_id' => $brand_id, 'd.status' => 1, 'd.is_deleted' => 1));
        }
        $this->db->limit(3, $start);
        $query = $this->db->get();
        $result = $query->result();
        //echo"<pre>";print_r($result);exit;
        return $result;
    }

    public function getAllDealsByBrand($brand_id, $item_type = null) {
        $this->db->select('m.email_id,b.name as brand_name,s.id as shopid,s.*,m.email_id,sc.category as parentCatg,c.category,c.parent_id,d.*');
        $this->db->from('deals d');
        $this->db->join('category c', 'c.id = d.category_id', 'LEFT');
        $this->db->join('category sc', 'sc.id = c.parent_id', 'LEFT');
        $this->db->join('shop s', 's.id = d.shop_id', 'LEFT');
        $this->db->join('brand b', 'b.id = d.brand_id', 'LEFT');
        $this->db->join('merchant m', 'm.id = d.merchant_id', 'LEFT');
        if ($item_type) {
            $this->db->where(array('d.brand_id' => $brand_id, 'd.item_type' => $item_type, 'd.status' => 1, 'd.is_deleted' => 1));
        } else {
            $this->db->where(array('d.brand_id' => $brand_id, 'd.status' => 1, 'd.is_deleted' => 1));
        }
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    

    public function getCityID($city = NULL) {
        $sql = 'SELECT * from city WHERE city_name = "' . $city . '"';
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            $row = $query->first_row();
            return $row->city_id;
        }
    }

    public function getHomeSearchResults($catg, $brand, $location, $search_key) {

        $sql = "SELECT b.id as brandId,b.brand_logo,b.name as brand_name,s.id as shopid,s.logo_thumb,s.shop_name,s.shop_address,s.shop_city,s.shop_highlights,s.shop_url,d.* "
                . " FROM deals d LEFT JOIN brand b ON b.id = d.brand_id "
                . " LEFT JOIN shop s ON s.id = d.shop_id ";
        if ($catg == 0 && $brand == 0 && $location == 0 && $search_key == NULL) {

            $ip = $_SERVER['REMOTE_ADDR'];
            //$ip = '167.129.197.0';
            $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
            if (!empty($details->city)) {
                $city = $details->city;
                $location = $this->getCityID($city);
                if (!empty($location)) {

                    $sql.=" WHERE s.shop_city = $location AND d.status =1 AND d.is_deleted =1";
                } else {
                    $sql.=" WHERE  d.status =1 AND d.is_deleted =1";
                }
            }
        } else if ($catg != 0 && $brand != 0 && $search_key != NULL && $location != 0) {


            $sql.=" WHERE  d.item_type = $catg  AND d.shop_id = $brand AND s.shop_city = $location AND d.status =1 AND d.is_deleted =1 AND (d.product_name LIKE '%$search_key%' OR s.shop_name LIKE '%$search_key%' OR d.deal_text LIKE '%$search_key%')";
        } else if ($catg == 0 && $brand == 0 && $search_key != NULL && $location != 0) {

            $sql.=" WHERE d.item_type !=4 AND  s.shop_city = $location AND d.status =1 AND d.is_deleted =1 AND (d.product_name LIKE '%$search_key%' OR s.shop_name LIKE '%$search_key%' OR d.deal_text LIKE '%$search_key%')";
        } else if ($catg != 0 && $brand == 0 && $search_key != NULL && $location != 0) {

            $sql.=" WHERE  d.item_type = $catg  AND s.shop_city = $location AND d.status =1 AND d.is_deleted =1 AND (d.product_name LIKE '%$search_key%' OR s.shop_name LIKE '%$search_key%' OR d.deal_text LIKE '%$search_key%')";
        } else if ($catg == 0 && $brand != 0 && $search_key != NULL && $location != 0) {

            $sql.=" WHERE d.item_type !=4  AND d.shop_id = $brand AND s.shop_city = $location AND d.status =1 AND d.is_deleted =1 AND (d.product_name LIKE '%$search_key%' OR s.shop_name LIKE '%$search_key%' OR d.deal_text LIKE '%$search_key%')";
        } else if ($catg == 0 && $brand == 0 && $search_key == NULL && $location != 0) {

            $sql.=" WHERE d.item_type !=4 AND  s.shop_city = $location AND d.status =1 AND d.is_deleted =1";
        }
        //echo $sql;die;
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->result();
        }
    }

    public function getHomeSearchPagination($catg, $brand, $location, $search_key, $start = null) {
        $sql = "SELECT b.id as brandId,b.brand_logo,b.name as brand_name,s.id as shopid,s.logo_thumb,s.shop_name,s.shop_address,s.shop_city,s.shop_highlights,s.shop_url,d.* "
                . " FROM deals d LEFT JOIN brand b ON b.id = d.brand_id "
                . " LEFT JOIN shop s ON s.id = d.shop_id ";
        if ($catg == 0 && $brand == 0 && $location == 0 && $search_key == NULL) {

            $ip = $_SERVER['REMOTE_ADDR'];
            //$ip = '167.129.197.0';
            $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
            if (!empty($details->city)) {
                $city = $details->city;
                $location = $this->getCityID($city);
                if (!empty($location)) {

                    $sql.=" WHERE s.shop_city = $location AND d.status =1 AND d.is_deleted =1";
                } else {
                    $sql.=" WHERE  d.status =1 AND d.is_deleted =1";
                }
            }
        } else if ($catg != 0 && $brand != 0 && $search_key != NULL && $location != 0) {


            $sql.=" WHERE  d.item_type = $catg  AND d.shop_id = $brand AND s.shop_city = $location AND d.status =1 AND d.is_deleted =1 AND (d.product_name LIKE '%$search_key%' OR s.shop_name LIKE '%$search_key%' OR d.deal_text LIKE '%$search_key%')";
        } else if ($catg == 0 && $brand == 0 && $search_key != NULL && $location != 0) {

            $sql.=" WHERE d.item_type !=4 AND  s.shop_city = $location AND d.status =1 AND d.is_deleted =1 AND (d.product_name LIKE '%$search_key%' OR s.shop_name LIKE '%$search_key%' OR d.deal_text LIKE '%$search_key%')";
        } else if ($catg != 0 && $brand == 0 && $search_key != NULL && $location != 0) {

            $sql.=" WHERE  d.item_type = $catg  AND s.shop_city = $location AND d.status =1 AND d.is_deleted =1 AND (d.product_name LIKE '%$search_key%' OR s.shop_name LIKE '%$search_key%' OR d.deal_text LIKE '%$search_key%')";
        } else if ($catg == 0 && $brand != 0 && $search_key != NULL && $location != 0) {

            $sql.=" WHERE d.item_type !=4  AND d.shop_id = $brand AND s.shop_city = $location AND d.status =1 AND d.is_deleted =1 AND (d.product_name LIKE '%$search_key%' OR s.shop_name LIKE '%$search_key%' OR d.deal_text LIKE '%$search_key%')";
        } else if ($catg == 0 && $brand == 0 && $search_key == NULL && $location != 0) {

            $sql.=" WHERE d.item_type !=4 AND  s.shop_city = $location AND d.status =1 AND d.is_deleted =1";
        }
        $sql.=" ORDER BY d.id DESC LIMIT 0,16";
        //echo $sql;die;
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->result();
        }
    }

    public function checkCoupons($coupon_id, $user_id) {
        $sql = "SELECT * FROM manage_coupons WHERE deal_id = '" . $coupon_id . "' AND user_id = '" . $user_id . "'";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->first_row();
        }
    }

    public function getSearchKeySuggestion($key) {
        $this->db->select('b.name as brand_name,s.id as shopid,s.logo_thumb,s.shop_name,s.shop_address,s.shop_city,s.shop_highlights,s.shop_url,d.*');
        $this->db->from('deals d');
        $this->db->join('shop s', 's.id = d.shop_id', 'LEFT');
        $this->db->join('brand b', 'b.id = d.brand_id', 'LEFT');
        $this->db->where(array(
            'd.item_type !=' => 4,
            'd.status' => 1,
            'd.is_deleted' => 1,
        ));
        $this->db->like('d.product_name', $key);
        $this->db->or_like('d.deal_text', $key);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

   

    public function getInnerSearchPaginationResult($search_key, $start = null) {
        $current_date = date("Y-m-d", time());
        $this->db->select('b.id as brandId,b.brand_logo,ci.city_name,b.name as brand_name,s.id as shopid,s.logo_thumb,s.shop_name,s.shop_address,s.shop_city,s.shop_highlights,s.shop_url,sc.category as parentCatg,c.category,c.parent_id,d.*');
        $this->db->from('deals d');
        $this->db->join('category c', 'c.id = d.category_id', 'LEFT');
        $this->db->join('category sc', 'sc.id = c.parent_id', 'LEFT');
        $this->db->join('shop s', 's.id = d.shop_id', 'LEFT');
        $this->db->join('brand b', 'b.id = d.brand_id', 'LEFT');
        $this->db->join('city ci', 'ci.city_id = s.shop_city', 'LEFT');
        $this->db->where(array(
            'd.item_type !=' => 4,
            'd.valid_till >' => $current_date,
            'd.status' => 1,
            'd.is_deleted' => 1,
        ));
        $this->db->like('d.product_name', $search_key);
        $this->db->or_like('s.shop_name', $search_key);
        $this->db->or_like('d.deal_text', $search_key);
        $this->db->order_by('d.id', 'DESC');
        $this->db->limit(16, $start);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    /* This will fetch deal list for a particular parent category */
    /*    public function getDealsCategoryListing($id){
      $current_date = date("Y-m-d", time());
      $this->db->select('b.id as brandId,b.brand_logo,b.name as brand_name,s.id as shopid,s.logo_thumb,s.shop_name,s.shop_address,s.shop_city,s.shop_highlights,s.shop_url,sc.category as parentCatg,c.category,c.parent_id,d.*');
      $this->db->from('deals d');
      $this->db->join('category c', 'c.id = d.category_id','LEFT');
      $this->db->join('category sc', 'sc.id = c.parent_id','LEFT');
      $this->db->join('shop s', 's.id = d.shop_id','LEFT');
      $this->db->join('brand b', 'b.id = d.brand_id','LEFT');
      $this->db->where(array(
      'd.item_type !='=>4,
      'd.valid_till >'=>$current_date,
      'c.parent_id >'=>$id,
      'd.status'=> 1,
      'd.is_deleted'=>1,
      ));
      $this->db->order_by('d.id','DESC');
      //$this->db->limit(16, $start);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
      }
      public function getDealsCategoryListingPagination($id,$start=null){
      $current_date = date("Y-m-d", time());
      $this->db->select('b.id as brandId,b.brand_logo,b.name as brand_name,s.id as shopid,s.logo_thumb,s.shop_name,s.shop_address,s.shop_city,s.shop_highlights,s.shop_url,sc.category as parentCatg,c.category,c.parent_id,d.*');
      $this->db->from('deals d');
      $this->db->join('category c', 'c.id = d.category_id','LEFT');
      $this->db->join('category sc', 'sc.id = c.parent_id','LEFT');
      $this->db->join('shop s', 's.id = d.shop_id','LEFT');
      $this->db->join('brand b', 'b.id = d.brand_id','LEFT');
      $this->db->where(array(
      'd.item_type !='=>4,
      'd.valid_till >'=>$current_date,
      'c.parent_id >'=>$id,
      'd.status'=> 1,
      'd.is_deleted'=>1,
      ));
      $this->db->order_by('d.id','DESC');
      $this->db->limit(16, $start);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
      }
     */

    public function getDealsCategoryListing($id, $city_id = null) {
        $current_date = date("Y-m-d", time());
        $sql = "select b.id as brandId,ci.city_name,s.shop_city,b.brand_logo,b.name as brand_name,s.id as shopid,s.logo_thumb,s.shop_name,s.shop_address,s.shop_city,s.shop_highlights,s.shop_url,c.category as parentCatg,c.category,c.parent_id,d.* "
                . "from ( "
                . "Select * FROM deals where category_id in ( "
                . "Select id from category where parent_id = $id union "
                . "(Select id from category where parent_id in "
                . "(Select id from category where parent_id = $id) ))) as d "
                . "LEFT JOIN category as c ON c.id = d.category_id "
                . "LEFT JOIN shop as s ON s.id = d.shop_id "
                . "LEFT JOIN brand as b ON b.id = d.brand_id "
                . " LEFT JOIN city AS ci ON ci.city_id = s.shop_city "
                . "WHERE d.item_type !=4 AND d.valid_till >= $current_date AND d.status = 1 AND d.is_deleted =1";
        if ($city_id != null) {
            $sql.=" AND s.shop_city = '" . $city_id . "'";
        }
        $sql.= " ORDER BY d.id DESC";

        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->result();
        }
    }

    public function getDealsCategoryListingPagination($id, $start = 0, $city_id=null) {
        $current_date = date("Y-m-d", time());
        $sql = "select b.id as brandId,ci.city_name,s.shop_city,b.brand_logo,b.name as brand_name,s.id as shopid,s.logo_thumb,s.shop_name,s.shop_address,s.shop_city,s.shop_highlights,s.shop_url,c.category as parentCatg,c.category,c.parent_id,d.* "
                . "from ( "
                . "Select * FROM deals where category_id in (( "
                . "Select id from category where parent_id = $id union "
                    . "Select id from category where id = $id union "
                . "(Select id from category where parent_id in "
                . "(Select id from category where parent_id = $id) )))) as d "
                . "LEFT JOIN category as c ON c.id = d.category_id "
                . "LEFT JOIN shop as s ON s.id = d.shop_id "
                . "LEFT JOIN brand as b ON b.id = d.brand_id "
                . " LEFT JOIN city as ci ON ci.city_id = s.shop_city "
                . "WHERE  d.valid_till >= $current_date AND d.status = 1 AND d.is_deleted =1 ";
        if ($city_id != null) {
            $sql.=" AND s.shop_city = '" . $city_id . "'";
        }
        $sql.= " ORDER BY d.id DESC LIMIT $start,10";
        //echo $sql;die;
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->result();
        }
    }

    public function itemDescriptionForMail($item_id) {
        $sql = "SELECT * FROM deals WHERE id = '" . $item_id . "'";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->first_row();
        }
    }

    public function getShopList() {
        $sql = "SELECT * FROM shop WHERE is_deleted = 1 ORDER BY shop_name ASC";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->result();
        }
    }

    public function fetchAlertEmail($item_type, $item_data, $item_shop, $item_brand) {
        if ($item_type == 1) {
            $sql = "SELECT * FROM alert WHERE type = 1 AND item LIKE '%" . $item_data . "%' AND shop = '" . $item_shop . "' AND (`band` LIKE '" . $item_brand . "' OR `band` LIKE '" . $item_brand . ",%' OR `band` LIKE '%," . $item_brand . ",%' OR `band` LIKE '%," . $item_brand . "') AND status = 1";
        } else {
            $sql = "SELECT * FROM alert WHERE type = 1 AND shop = '" . $item_shop . "' AND(`band` LIKE '" . $item_brand . "' OR `band` LIKE '" . $item_brand . ",%' OR `band` LIKE '%," . $item_brand . ",%' OR `band` LIKE '%," . $item_brand . "') AND status = 1";
        }
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->result();
        }
    }

    public function fetchBrandArray($array_brand) {
        $ex_brand = explode(",", $array_brand);
        foreach ($ex_brand as $brand) {

            $sql = "SELECT category FROM category WHERE id = '" . $brand . "' ";
            $query = $this->db->query($sql);
            if ($query->num_rows()) {
                $result[] = $query->first_row()->category;
            }
        }
        $return_result = implode(",", $result);
        return $return_result;
    }

    public function fetchShopAlert($shop) {
        $sql = "SELECT shop_name FROM shop WHERE id = '" . $shop . "' ";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->first_row()->shop_name;
        }
    }

    public function getCountryList() {
        $sql = "SELECT distinct(country)  FROM city";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->result();
        }
    }

    public function getcityForSearch($country) {

        $sql = "SELECT city_name,city_id  FROM city where country = '" . $country . "' ORDER BY city_name";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->result();
        }
    }

    public function getOnlineCoupons($catgId, $dealtext = NULL, $city = NULL, $start = 0, $limit = 8) {
        $current_date = date("Y-m-d", time());
        $sql = "SELECT b.id as brandId,s.shop_city,b.brand_logo,ci.city_name,b.name as brand_name,s.id as shopid,s.logo_thumb,s.shop_name,s.shop_address,s.shop_city,s.shop_highlights,s.shop_url,c.category as parentCatg,c.category,c.parent_id,d.* FROM deals AS d "
                . " LEFT JOIN category AS c ON c.id = d.category_id "
                . " LEFt JOIN brand AS  b ON b.id = d.brand_id "
                . " LEFT JOIN shop AS s ON s.id = d.shop_id "
                . " LEFT JOIN city as ci ON ci.city_id = s.shop_city "
                . " WHERE d.coupon_stock > 0 AND d.item_type =3 AND d.valid_till >= $current_date AND d.status = 1 AND d.is_deleted =1";

        if ($catgId != null) {
            $sql.=" AND d.category_id = '" . $catgId . "'";
        }
        if ($city != NULL) {
            $sql.=" AND s.shop_city = '" . $city . "'";
        }
        if ($dealtext != NULL) {
            $arr = explode(",", $dealtext);
            $sql.=" AND (d.deal_text LIKE '%$arr[0]%' OR d.deal_text LIKE '%$arr[1]%' OR d.deal_text LIKE '%$arr[2]%' OR d.deal_text LIKE '%$arr[3]%' OR d.deal_text LIKE '%$arr[4]%')";
        }
        $sql.=" LIMIT " . $start . "," . $limit . "";
        //echo $sql;
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->result();
        }
    }

    public function getOnlineCouponsCountRows($catgId, $dealtext = NULL, $city = NULL) {
        $current_date = date("Y-m-d", time());
        $sql = "SELECT b.id as brandId,s.shop_city,b.brand_logo,ci.city_name,b.name as brand_name,s.id as shopid,s.logo_thumb,s.shop_name,s.shop_address,s.shop_city,s.shop_highlights,s.shop_url,c.category as parentCatg,c.category,c.parent_id,d.* FROM deals AS d "
                . " LEFT JOIN category AS c ON c.id = d.category_id "
                . " LEFt JOIN brand AS  b ON b.id = d.brand_id "
                . " LEFT JOIN shop AS s ON s.id = d.shop_id "
                . " LEFT JOIN city as ci ON ci.city_id = s.shop_city "
                . " WHERE d.coupon_stock > 0 AND d.item_type =3 AND d.valid_till >= $current_date AND d.status = 1 AND d.is_deleted =1";

        if ($catgId != null) {
            $sql.=" AND d.category_id = '" . $catgId . "'";
        }
        if ($city != NULL) {
            $sql.=" AND s.shop_city = '" . $city . "'";
        }
        if ($dealtext != NULL) {
            $arr = explode(",", $dealtext);
            $sql.=" AND (d.deal_text LIKE '%$arr[0]%' OR d.deal_text LIKE '%$arr[1]%' OR d.deal_text LIKE '%$arr[2]%' OR d.deal_text LIKE '%$arr[3]%' OR d.deal_text LIKE '%$arr[4]%')";
        }
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->num_rows();
        }
    }

    public function getCouponsCategory() {
        $current_date = date("Y-m-d", time());
        $sql = "SELECT distinct(d.category_id) as id,c.category,c.parent_id,c.category_image FROM deals AS d INNER JOIN category AS c ON c.id = d.category_id "
                . " WHERE d.coupon_stock > 0 AND d.item_type =3 AND d.valid_till >= $current_date AND d.status = 1 AND d.is_deleted =1";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->result();
        }
    }

    public function getHomeSearchResultWallmart($look_for, $retailer, $city, $ser_key, $start = 0, $limit = 8, $name_value = 2,$price_value=2,$location_value=NULL) {

        $current_date = date("Y-m-d", time());
        $sql = "SELECT b.id as brandId,b.brand_logo,b.name as brand_name,s.id as shopid,s.logo_thumb,s.shop_logo,s.shop_name,s.shop_address,s.shop_city,s.shop_mobile,s.shop_highlights,s.shop_location_map,s.shop_url,d.*,c.city_name "
                . " FROM deals d LEFT JOIN brand b ON b.id = d.brand_id "
                . " LEFT JOIN shop s ON s.id = d.shop_id "
                . " LEFT JOIN city c ON c.city_id = s.shop_city ";

        $sql.=" WHERE d.valid_till >= '" . $current_date . "' AND d.status = 1 AND d.is_deleted =1 ";
        if ($look_for != 0) {

            $sql.=" AND d.item_type = '" . $look_for . "' ";
        }
        if ($retailer != 0) {

            $sql.=" AND d.shop_id = '" . $retailer . "' ";
        }
        if ($city != 0) {

            $sql.=" AND s.shop_city = '" . $city . "' ";
        } else {

            $ip = $_SERVER['REMOTE_ADDR'];
            //$ip = '167.129.197.0'; // given static IP Address
            $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
            if (!empty($details->city)) {
                $city = $details->city;
                $location = $this->getCityID($city);
                if (!empty($location)) {

                    $sql.=" AND s.shop_city = $location ";
                }
            }
        }
        if($location_value==1){
            $ip = $_SERVER['REMOTE_ADDR'];
            $ip = '167.129.197.0'; // given static IP Address
            $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
            if (!empty($details->city)) {
                $city = $details->city;
                $location = $this->getCityID($city);
                if (!empty($location)) {

                    $sql.=" AND s.shop_city = $location ";
                }
            }
        }
        if ($ser_key != NULL) {
            $sql.=" AND (";
            $main_keyword = addslashes(trim($ser_key));
            $arr = array("+", "-", ".", "_", "@", "!", "^", "#", "&");
            $rep_keyword = str_replace($arr, " ", $main_keyword);
            $keyword_arr = explode(" ", $rep_keyword);
            $total_key = count($keyword_arr);
            foreach ($keyword_arr as $key => $keyword) {
                if ($key != $total_key - 1) {
                    $sql.="  (d.deal_text LIKE '%" . $keyword . "%'  OR d.product_name LIKE '%" . $keyword . "%') OR";
                } else {
                    $sql.="  (d.deal_text LIKE '%" . $keyword . "%'  OR d.product_name LIKE '%" . $keyword . "%') ";
                }
            }
            $sql.=")";
        }
        $sql.=" ORDER BY ";
        //echo $name_value;
        if ($name_value == 1) {
            $sql.="  d.product_name ASC  ";
        } elseif ($name_value == 0) {
            $sql.="  d.product_name DESC  ";
        } elseif ($name_value == 2) {
            $sql.="  d.coupon_price DESC  ";
        }
        
        if ($price_value == 1) {
            $sql.=" ,d.coupon_price ASC  ";
        } 
        elseif ($price_value == 0) {
            $sql.=" ,d.coupon_price DESC  ";
        } 
        
        $sql.=" LIMIT $start,$limit";  
        //echo $sql;
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->result();
        }
    }

    public function getHomeSearchResultWallmartRetailer($look_for, $retailer, $city, $ser_key, $start = 0, $limit = 8) {
        $current_date = date("Y-m-d", time());

        $sql = "SELECT b.id as brandId,b.brand_logo,b.name as brand_name,s.id as shopid,s.logo_thumb,s.shop_logo,s.shop_name,s.shop_address,s.shop_city,s.shop_mobile,s.shop_highlights,s.shop_location_map,s.shop_url,d.* ,c.city_name "
                . " FROM deals d LEFT JOIN brand b ON b.id = d.brand_id "
                . " LEFT JOIN shop s ON s.id = d.shop_id "
                . " LEFT JOIN city c ON c.city_id = s.shop_city ";

        $sql.=" WHERE d.valid_till >= '" . $current_date . "' AND d.status = 1 AND d.is_deleted =1 ";

        if ($look_for != 0) {

            $sql.=" AND d.item_type = '" . $look_for . "' ";
        }
        if ($retailer != 0) {

            $sql.=" AND d.shop_id = '" . $retailer . "' ";
        }
        if ($city != 0) {

            $sql.=" AND s.shop_city = '" . $city . "' ";
        } else {

            $ip = $_SERVER['REMOTE_ADDR'];
            //$ip = '167.129.197.0'; // given static IP Address
            $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
            if (!empty($details->city)) {
                $city = $details->city;
                $location = $this->getCityID($city);
                if (!empty($location)) {

                    $sql.=" AND s.shop_city = $location ";
                }
            }
        }
        if ($ser_key != NULL) {
            $sql.=" OR (";
            $main_keyword = addslashes(trim($ser_key));
            $arr = array("+", "-", ".", "_", "@", "!", "^", "#", "&");
            $rep_keyword = str_replace($arr, " ", $main_keyword);
            $keyword_arr = explode(" ", $rep_keyword);
            $total_key = count($keyword_arr);
            foreach ($keyword_arr as $key => $keyword) {
                if ($key != $total_key - 1) {
                    $sql.="  (d.deal_text LIKE '%" . $keyword . "%'  OR d.product_name LIKE '%" . $keyword . "%') OR";
                } else {
                    $sql.="  (d.deal_text LIKE '%" . $keyword . "%'  OR d.product_name LIKE '%" . $keyword . "%') ";
                }
            }
            $sql.=")";
        }

        $sql.="  ORDER BY d.coupon_price DESC ";
        $sql.=" LIMIT $start,$limit";
        //echo $sql; 
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->result();
        }
    }

    public function getHomeSearchResultWallmartNumRows($look_for, $retailer, $city, $ser_key) {
        $current_date = date("Y-m-d", time());
        $sql = "SELECT b.id as brandId,b.brand_logo,b.name as brand_name,s.id as shopid,s.logo_thumb,s.shop_logo,s.shop_name,s.shop_address,s.shop_city,s.shop_mobile,s.shop_highlights,s.shop_location_map,s.shop_url,d.*,c.city_name "
                . " FROM deals d LEFT JOIN brand b ON b.id = d.brand_id "
                . " LEFT JOIN shop s ON s.id = d.shop_id "
                . " LEFT JOIN city c ON c.city_id = s.shop_city ";

        $sql.=" WHERE d.valid_till >= '" . $current_date . "' AND d.status = 1 AND d.is_deleted =1 ";
        if ($look_for != 0) {

            $sql.=" AND d.item_type = '" . $look_for . "' ";
        }
        if ($retailer != 0) {

            $sql.=" AND d.shop_id = '" . $retailer . "' ";
        }
        if ($city != 0) {

            $sql.=" AND s.shop_city = '" . $city . "' ";
        } else {

            $ip = $_SERVER['REMOTE_ADDR'];
            //$ip = '167.129.197.0'; // given static IP Address
            $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
            if (!empty($details->city)) {
                $city = $details->city;
                $location = $this->getCityID($city);
                if (!empty($location)) {

                    $sql.=" AND s.shop_city = $location ";
                }
            }
        }
        if ($ser_key != NULL) {
            $sql.=" AND (";
            $main_keyword = addslashes(trim($ser_key));
            $arr = array("+", "-", ".", "_", "@", "!", "^", "#", "&");
            $rep_keyword = str_replace($arr, " ", $main_keyword);
            $keyword_arr = explode(" ", $rep_keyword);
            $total_key = count($keyword_arr);
            foreach ($keyword_arr as $key => $keyword) {
                if ($key != $total_key - 1) {
                    $sql.="  (d.deal_text LIKE '%" . $keyword . "%'  OR d.product_name LIKE '%" . $keyword . "%') OR";
                } else {
                    $sql.="  (d.deal_text LIKE '%" . $keyword . "%'  OR d.product_name LIKE '%" . $keyword . "%') ";
                }
            }
            $sql.=")";
        }
        $sql.=" ORDER BY d.coupon_price DESC  ";

        //echo $sql; 
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->num_rows();
        }
    }

    public function getHomeSearchResultWallmartRetailerNumRows($look_for, $retailer, $city, $ser_key = NULL) {
        $current_date = date("Y-m-d", time());
        $sql = "SELECT b.id as brandId,b.brand_logo,b.name as brand_name,s.id as shopid,s.logo_thumb,s.shop_logo,s.shop_name,s.shop_address,s.shop_city,s.shop_mobile,s.shop_highlights,s.shop_location_map,s.shop_url,d.* ,c.city_name "
                . " FROM deals d LEFT JOIN brand b ON b.id = d.brand_id "
                . " LEFT JOIN shop s ON s.id = d.shop_id "
                . " LEFT JOIN city c ON c.city_id = s.shop_city ";

        $sql.=" WHERE d.valid_till >= '" . $current_date . "' AND d.status = 1 AND d.is_deleted =1 ";

        if ($look_for != 0) {

            $sql.=" AND d.item_type = '" . $look_for . "' ";
        }
        if ($retailer != 0) {

            $sql.=" AND d.shop_id = '" . $retailer . "' ";
        }
        if ($city != 0) {

            $sql.=" AND s.shop_city = '" . $city . "' ";
        } else {

            $ip = $_SERVER['REMOTE_ADDR'];
            //$ip = '167.129.197.0'; // given static IP Address
            $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
            if (!empty($details->city)) {
                $city = $details->city;
                $location = $this->getCityID($city);
                if (!empty($location)) {

                    $sql.=" AND s.shop_city = $location ";
                }
            }
        }
        if ($ser_key != NULL) {
            $sql.=" OR (";
            $main_keyword = addslashes(trim($ser_key));
            $arr = array("+", "-", ".", "_", "@", "!", "^", "#", "&");
            $rep_keyword = str_replace($arr, " ", $main_keyword);
            $keyword_arr = explode(" ", $rep_keyword);
            $total_key = count($keyword_arr);
            foreach ($keyword_arr as $key => $keyword) {
                if ($key != $total_key - 1) {
                    $sql.="  (d.deal_text LIKE '%" . $keyword . "%'  OR d.product_name LIKE '%" . $keyword . "%') OR";
                } else {
                    $sql.="  (d.deal_text LIKE '%" . $keyword . "%'  OR d.product_name LIKE '%" . $keyword . "%') ";
                }
            }
            $sql.=")";
        }
        $sql.="  ORDER BY d.coupon_price DESC ";

        //echo $sql; die;
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->num_rows();
        }
    }

    public function getAdvertisementsforSearchTop() {
        $sql = "SELECT * FROM advertisment where advertisements_type=2 AND image_type =1 AND is_deleted=1 AND status=1 ORDER BY id DESC";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            foreach ($query->result() as $row) {
                $result[] = $row;
            }
            $query->free_result();
            return $result;
        }
    }

    public function getAdvertisementsforSearchRight() {
        $sql = "SELECT * FROM advertisment where advertisements_type=2 AND image_type =2 AND is_deleted=1 AND status=1 ORDER BY id DESC LIMIT 0,4";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            foreach ($query->result() as $row) {
                $result[] = $row;
            }
            $query->free_result();
            return $result;
        }
    }

    public function getCategorySliderAdvertisements($category) {
        $sql = "SELECT * FROM advertisment where advertisements_type=1 AND image_type =1 AND is_deleted=1 AND status=1 AND category='" . $category . "' ORDER BY id DESC LIMIT 0,3";

        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            foreach ($query->result() as $row) {
                $result[] = $row;
            }
            $query->free_result();
            return $result;
        }
    }

    public function getAllAdvertisements($category) {
        $sql = "SELECT * FROM advertisment where advertisements_type=1 AND image_type =1 AND is_deleted=1 AND status=1 AND category!='" . $category . "' ORDER BY id DESC LIMIT 0,3";

        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            foreach ($query->result() as $row) {
                $result[] = $row;
            }
            $query->free_result();
            return $result;
        }
    }
    
    public function getCityName($city_id){
        $sql  = "SELECT city_name FROM city WHERE city_id = '".$city_id."'";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->first_row();
        }
    }
    public function getCityListName($country_name){
        $sql  = "SELECT city_name,city_id FROM city WHERE country = '".$country_name."'";
        $query = $this->db->query($sql);
       if ($query->num_rows()) {
            foreach ($query->result() as $row) {
                $result[] = $row;
            }
            $query->free_result();
            return $result;
        }
    }

   public function getSubcategoryName($parent_id){
        $sql  = "SELECT * FROM category WHERE id = '".$parent_id."'";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->first_row();
        }
    }
    
    public function getSimilarItems($shopId=NULL,$category_id=NULL){
          $current_date = date("Y-m-d", time());
        $sql = "SELECT b.id as brandId,b.brand_logo,b.name as brand_name,s.id as shopid,s.logo_thumb,s.shop_logo,s.shop_name,s.shop_address,s.shop_city,s.shop_mobile,s.shop_highlights,s.shop_location_map,s.shop_url,d.* ,c.city_name "
                . " FROM deals d LEFT JOIN brand b ON b.id = d.brand_id "
                . " LEFT JOIN shop s ON s.id = d.shop_id "
                . " LEFT JOIN city c ON c.city_id = s.shop_city ";

       $sql.=" WHERE d.valid_till >= '" . $current_date . "' AND d.status = 1 AND d.is_deleted =1 AND d.shop_id = '".$shopId."' AND d.category_id = '".$category_id."' ORDER BY d.id ASC LIMIT 0,10";
       //echo $sql;die;
       $query = $this->db->query($sql);
       if ($query->num_rows()) {
            foreach ($query->result() as $row) {
                $result[] = $row;
            }
            $query->free_result();
            return $result;
        }
    }
    
    public function getCategoryID(){
          $sql  = "SELECT id FROM category WHERE category = 'Grocery Shopping'";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->first_row()->id;
        }
    }

    
}
?>

