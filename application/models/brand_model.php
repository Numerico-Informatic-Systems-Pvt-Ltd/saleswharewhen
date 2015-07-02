<?php 

Class brand_model extends CI_Model{
	
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    /*this function is to fetch all the active brands, this list will be displayed while entering data, data search*/
    public function getBrandList(){
        $query = $this->db->get_where('category',array('status'=>1,'is_deleted'=>1));
        $results = $query->result();
        return $results;
    
    }
public function getBrandallList(){
        $query = $this->db->get_where('brand',array('status'=>1,'is_deleted'=>1));
        $results = $query->result();
        return $results;
    
    }
    /*this function is to fetch all the active and inactive brands, this list will be displayed in admin panel only, where admin can manage brands*/
    public function getBrands(){
        $query = $this->db->get_where('brand',array('is_deleted'=>1));
        $results = $query->result();
        return $results;
    
    }
    public function getBrandDetail($id){
        $query = $this->db->get_where('brand',array('id'=>$id,'is_deleted'=>1));
        $result= $query->first_row();
        return $result;
    }
    public function manageBrand($inputs, $id=null){
	//print_r($inputs);exit;
        if($id){
            $this->db->update('brand', $inputs, array('id'=>$id));
        }else{
            $this->db->insert('brand', $inputs);
        }
        $result = ($this->db->affected_rows() != 1) ? 'false' : 'true';
        return $result;
    }
    public function manageBrandLocations($inputs, $brand_id){
        $count = count($inputs)/2;
        for($i=0;$i< $count;$i++){
            $data = array('brand_id'=> $brand_id,'location'=>$inputs['location'.$i],'contact_no'=>$inputs['contact'.$i]);
            $this->db->insert('brand_locations',$data);
        }
        $result = ($this->db->affected_rows() != 1) ? 'false' : 'true';
        return $result;
    }
    public function updateBrandLocations($inputs, $brand_id){
        $count = count($inputs)/2;
        for($i=0;$i< $count;$i++){
            $data = array('brand_id'=> $brand_id,'location'=>$inputs['location'.$i],'contact_no'=>$inputs['contact'.$i]);
            $this->db->update('brand_locations',$data,array('id'=>$inputs['brand_ocation_id'.$i]));
        }
        $result = ($this->db->affected_rows() != 1) ? 'false' : 'true';
        return $result;
    }
    public function getBrandLocations($brandId){
        $query = $this->db->get_where('brand_locations',array('brand_id'=>$brandId,'is_deleted'=>1));
        $results = $query->result();
        return $results;
    
    }
}
