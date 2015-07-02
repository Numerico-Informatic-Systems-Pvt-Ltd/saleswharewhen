<?php
Class shop_model extends CI_Model{
	
    function __construct(){
            parent::__construct();
            $this->load->database();
    }
    /*this function will show all the active shops and will be displayed while deal entry*/
    function getShopList(){
        $this->db->select('m.first_name,m.last_name,c.city_name,s.*');
        $this->db->from('shop s');
        $this->db->join('city c', 'c.city_id = s.shop_city','LEFT');
        $this->db->join('merchant m', 'm.id = s.merchant_id','LEFT');
	$this->db->where(array('s.status'=>1,'s.is_deleted'=>1));
        $query = $this->db->get();
        $results = $query->result();
        return $results;
    }
    /*this function will show allthe active & inactive shops and will be displayed in admin panel*/
    function getShops(){
        $this->db->select('m.first_name,m.last_name,c.city_name,s.*');
        $this->db->from('shop s');
        $this->db->join('city c', 'c.city_id = s.shop_city','LEFT');
        $this->db->join('merchant m', 'm.id = s.merchant_id','LEFT');
	$this->db->where(array('s.is_deleted'=>1));
        $query = $this->db->get();
        $results = $query->result();
        return $results;
    }
    function getShopListByMerchant($merchant=null){
        if(!$merchant){
           $merchant = '0'; 
        }
        $query = $this->db->get_where('shop', array('merchant_id' => $merchant,'status'=>1,'is_deleted'=>1));
        $result= $query->result();
        return $result;
    }
    function getShopDetails($id){
            $query = $this->db->get_where('shop', array('id' => $id,'status'=>1,'is_deleted'=>1));
            $result= $query->first_row();
            return $result;
    }
    function manageShop($input, $id=null){
        if($id){
            $this->db->update('shop', $input, array('id'=>$id));
            $result = ($this->db->affected_rows() != 1) ? '' : 1;
        }else{
            $this->db->insert('shop', $input);
            $result = $this->db->insert_id();
        }
        return $result;
    }
}
?>
