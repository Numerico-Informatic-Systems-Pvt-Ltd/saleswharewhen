<?php

/*
 * This model has built to oprate grocery related data.
 */

Class grocery_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getGroceries() {
        $query = $this->db->get_where('deals', array('item_type' => 4, 'status' => 1, 'is_deleted' => 1));
        $results = $query->result();
        return $results;
    }
/*edited below function for city_name*/
    public function getGroceryOffers($id = null, $start = null, $dealtext = null, $city = NULL) {

        $current_date = date("Y-m-d", time());
        $this->db->select('m.email_id,b.name as brand_name,b.brand_logo,ci.city_name,s.id as shopid,s.logo_thumb,s.shop_name,s.shop_address,s.shop_city,s.shop_highlights,s.shop_url,s.shop_mobile,m.email_id,sc.category as parentCatg,c.category,c.parent_id,d.*');
        $this->db->from('deals d');
        $this->db->join('category c', 'c.id = d.category_id', 'LEFT');
        $this->db->join('category sc', 'sc.id = c.parent_id', 'LEFT');
        $this->db->join('shop s', 's.id = d.shop_id', 'LEFT');
        $this->db->join('brand b', 'b.id = d.brand_id', 'LEFT');
        $this->db->join('city ci', 'ci.city_id = s.shop_city', 'LEFT');
        $this->db->join('merchant m', 'm.id = d.merchant_id', 'LEFT');


        if ($id) {
            if ($city != NULL) {
                $this->db->where(array('d.id' => $id, 'd.item_type' => 4, 'd.status' => 1, 'd.is_deleted' => 1, 's.shop_city' => $city));
            } else {
                $this->db->where(array('d.id' => $id, 'd.item_type' => 4, 'd.status' => 1, 'd.is_deleted' => 1));
            }
            if ($dealtext != NULL) {
                $arr = explode(",", $dealtext);
                $this->db->like('d.deal_text', $arr[0]);
                $this->db->or_like('d.deal_text', $arr[1]);
                $this->db->or_like('d.deal_text', $arr[2]);
                $this->db->or_like('d.deal_text', $arr[3]);
            }

            $query = $this->db->get();
            $results = ($query->num_rows() > 0) ? $query->first_row() : '';
        } else {
            if ($city != NULL) {
                $this->db->where(array('d.item_type' => 4, 'd.valid_till >=' => $current_date, 'd.status' => 1, 'd.is_deleted' => 1, 's.shop_city' => $city));
            } else {
                $this->db->where(array('d.item_type' => 4, 'd.valid_till >=' => $current_date, 'd.status' => 1, 'd.is_deleted' => 1));
            }
            if ($dealtext != NULL) {

                $arr = explode(",", $dealtext);
                $this->db->like('d.deal_text', $arr[0]);
                $this->db->or_like('d.deal_text', $arr[1]);
                $this->db->or_like('d.deal_text', $arr[2]);
                $this->db->or_like('d.deal_text', $arr[3]);
            }
            $this->db->order_by('d.valid_till', 'ASC');
            $this->db->limit(9, $start);
            $query = $this->db->get();
            $results = $query->result();
        }
        return $results;
    }

    public function getSearchResults($brand, $location, $search_key = NULL) {        
        $current_date = date("Y-m-d", time());
        $sql = "SELECT b.id as brandId,b.brand_logo,ci.city_name,b.name as brand_name,s.id as shopid,s.logo_thumb,s.shop_name,s.shop_address,s.shop_city,s.shop_highlights,s.shop_url,c.category,c.parent_id,d.*  "
                . " FROM deals AS d  "
                . " LEFT JOIN category AS c ON c.id = d.category_id "
                . " LEFT JOIN shop AS s ON s.id = d.shop_id "
                . " LEFT JOIN brand AS b ON b.id = d.brand_id "
                . " LEFT JOIN city AS ci ON ci.city_id = s.shop_city "
                . " WHERE d.item_type=4 AND d.valid_till >= $current_date AND d.status =1 AND d.is_deleted=1";

        if ($brand != null) {

            $sql.=" AND d.shop_id = $brand";
        }
        if ($location != NULL) {

            $sql.=" AND s.shop_city = $location";
        }
        if ($search_key != NULL) {


            $sql.=" AND (d.product_name LIKE '%$search_key%' OR d.deal_text LIKE '%$search_key%')";
        }
        $sql.=" ORDER BY d.id DESC";  
        //echo $sql;die;
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->result();
        }
    }

    public function getGrocerySearchPaginationResults($brand, $location, $search_key = NULL, $start = null) {
        
        $current_date = date("Y-m-d", time());
        $sql = "SELECT b.id as brandId,b.brand_logo,ci.city_name,b.name as brand_name,s.id as shopid,s.logo_thumb,s.shop_name,s.shop_address,s.shop_city,s.shop_highlights,s.shop_url,c.category,c.parent_id,d.*  "
                . " FROM deals AS d  "
                . " LEFT JOIN category AS c ON c.id = d.category_id "
                . " LEFT JOIN shop AS s ON s.id = d.shop_id "
                . " LEFT JOIN brand AS b ON b.id = d.brand_id "
                . " LEFT JOIN city AS ci ON ci.city_id = s.shop_city "
                . " WHERE d.item_type=4 AND d.valid_till >= $current_date AND d.status =1 AND d.is_deleted=1";

        if ($brand != null) {

            $sql.=" AND d.shop_id = $brand";
        }
        if ($location != NULL) {

            $sql.=" AND s.shop_city = $location";
        }
        if ($search_key != NULL) {


            $sql.=" AND (d.product_name LIKE '%$search_key%' OR d.deal_text LIKE '%$search_key%')";
        }
        $sql.=" ORDER BY d.id DESC ";
        if ($start != NULL) {
            $sql.=" LIMIT $start,9";
        } else {
            $sql.=" LIMIT 0,9";
        }
        //echo $sql;die;
        $query = $this->db->query($sql);
        
        if ($query->num_rows()) {
            return $query->result();
        }
    }

    public function getSearchKeySuggestion($key) {      
        
        $sql = "SELECT b.name as brand_name,s.id as shopid,s.logo_thumb,s.shop_name,s.shop_address,s.shop_city,s.shop_highlights,s.shop_url,d.*  "
                . " FROM deals AS d  "
                . " LEFT JOIN shop AS s ON s.id = d.shop_id "
                . " LEFT JOIN brand AS b ON b.id = d.brand_id "
                . " WHERE d.item_type = 4 AND d.status=1 AND d.is_deleted ";
        $sql.=" AND (d.product_name LIKE '%$key%' OR d.deal_text LIKE '%$key%')";
        
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->result();
        }
        
        
    }

    public function getValidGroceries() {
        $current_date = date("Y-m-d", time());
        $query = $this->db->get_where('deals', array('item_type' => 4, 'valid_till >=' => $current_date, 'status' => 1, 'is_deleted' => 1));
        $results = $query->result();
        return $results;
    }

    public function getallTrendingOffers($start = 0, $limit = 8) {
        $current_date = date("Y-m-d", time());
        $sql = "SELECT b.name as brand_name,s.id as shopid,s.logo_thumb,s.shop_name,s.shop_address,s.shop_city,s.shop_highlights,s.shop_url,d.*  "
                . " FROM deals AS d "
                . " LEFT JOIN shop AS s ON s.id = d.shop_id "
                . " LEFT JOIN brand AS b ON b.id = d.brand_id "
                . " WHERE d.valid_till >= $current_date AND d.status=1 AND d.is_deleted =1 ";
        $sql.=" LIMIT $start,$limit";
        
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->result();
        }
    }
    
    public function getallTrendingOffersCountRows(){
        $current_date = date("Y-m-d", time());
        $sql = "SELECT b.name as brand_name,s.id as shopid,s.logo_thumb,s.shop_name,s.shop_address,s.shop_city,s.shop_highlights,s.shop_url,d.*  "
                . " FROM deals AS d "
                . " LEFT JOIN shop AS s ON s.id = d.shop_id "
                . " LEFT JOIN brand AS b ON b.id = d.brand_id "
                . " WHERE d.valid_till >= $current_date AND d.status=1 AND d.is_deleted =1 ";
        
        
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->num_rows();
        }
    }

}

?>
