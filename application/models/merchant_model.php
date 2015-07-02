<?php

/* 
 * This model has built to oprate merchant related data.
 */

Class merchant_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    /*getAllMerchants function will display all the merchants from merchant table*/
    public function getAllMerchants(){
        //$results = $this->db->select('m.*,s.shop_name,s.shop_url',FALSE)->from('merchant m')->join('shop s','s.merchant_id = m.id' ,'LEFT')->get()->result();
        $results = $this->db->select('m.*,c.city_name')->from('merchant m')->join('city c','c.city_id = m.city','LEFT')->where(array('m.type'=>'merchant','m.is_deleted'=>1))->get()->result();
        return $results;
    }
    /*This function will fetched individual merchant details by passing id as argument*/
    public function getMerchantDetails($id){
        $this->db->select('*');
        $this->db->from('merchant m');
        $this->db->join('city c', 'c.city_id = m.city','LEFT');
        $this->db->where(array('m.id' => $id));
        $query = $this->db->get();
	$results = ($query->num_rows() > 0) ? $query->first_row() : '';
        //$results = $query->result();
        return $results;
    }
	/*This function will insert & update merchant, if 'id' will passed then it will update data else it will insert*/
    public function manageMerchant($input,$id=null){
        if($id){
            $this->db->update('merchant', $input, array('id'=>$id));
            $result = ($this->db->affected_rows() != 1) ? '' : 1;
        }else{
            $this->db->insert('merchant', $input);
            $result = $this->db->insert_id();
        }
        return $result;
    }
}
?>
