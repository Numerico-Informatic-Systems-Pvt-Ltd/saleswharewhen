<?php

Class admin_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    function getImageDetails($id=null){
        $this->db->select('*');
        $this->db->from('admin_images');
        if($id){
            $this->db->where(array('id' => $id,'is_deleted'=>1));
            $query = $this->db->get();
            $results = ($query->num_rows() > 0) ? $query->first_row() : '';
        }else{
            $this->db->where(array('is_deleted'=>1));
            $this->db->order_by('id','DESC');
            $query = $this->db->get();
            $results = $query->result();
        }
        
        return $results;
    }
    function getBannerImages($imageType){
        $this->db->select('*');
        $this->db->from('admin_images');
        $this->db->where(array('image_type'=>$imageType,'status'=>1,'is_deleted'=>1));
        $this->db->order_by('id','ASC');
        $query = $this->db->get();
        if ($query->num_rows()) {
            foreach ($query->result() as $row) {
                if($row->image_size == 1 ){
                    $result['bigbanner'][] = $row;
                }
                else if($row->image_size == 2){
                    $result['small_top_banner'][] = $row;
                }else{
                    $result['small_bottom_banner'][] = $row;
                }
            }
            $query->free_result();
            return $result;
        }
    }
    function manageImages($input,$id=null){
        if($id){
            $this->db->update('admin_images', $input, array('id'=>$id));
            $result = ($this->db->affected_rows() != 1) ? '' : 1;
        }else{
            $this->db->insert('admin_images', $input);
            $result = $this->db->insert_id();
        }
        return $result;
    }
    function getPages(){
        $this->db->select('*');
        $this->db->from('pages');
        $this->db->where(array('is_deleted'=>1));
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getPageDetails($id){
        $this->db->select('*');
        $this->db->from('pages');
        $this->db->where(array('id'=>$id,'is_deleted'=>1));
        $query = $this->db->get();
        $result = ($query->num_rows() > 0) ? $query->first_row() : '';
        return $result;
    }
	
	function getPageDetailsSlug($slug){
        $this->db->select('*');
        $this->db->from('pages');
        $this->db->where(array('slug'=>$slug,'is_deleted'=>1));
        $query = $this->db->get();
        $result = ($query->num_rows() > 0) ? $query->first_row() : '';
        return $result;
    }
    /*this function is to fetch data to display custom page for user view in frontend*/
    function getFrontPageDetails($slug,$id){
        $this->db->select('*');
        $this->db->from('pages');
        $this->db->where(array('id'=>$id,'slug'=>$slug,'status'=>1,'is_deleted'=>1));
        $query = $this->db->get();
        $result = ($query->num_rows() > 0) ? $query->first_row() : '';
        return $result;
    }
    function managePage($input,$id=null){
        if($id){
            $this->db->update('pages', $input, array('id'=>$id));
            $result = ($this->db->affected_rows() != 1) ? 'False' : 'True';
        }else{
            $this->db->insert('pages', $input);
            $result = $this->db->insert_id();
        }
        return $result;
    }
 public function reviewList(){
        $sql = "SELECT rev.*,usr.first_name,usr.last_name,dl.product_name FROM review AS rev INNER JOIN users AS usr ON usr.id = rev.user_id INNER JOIN deals AS dl ON dl.id = rev.item_id WHERE rev.is_deleted = 1 ORDER BY rev.id";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            foreach ($query->result() as $row) {
                $result[] = $row;
            }
            $query->free_result();
            return $result;
        }
    }
     public function reviewListProduct($id) {
        $sql = "SELECT
rev.*,usr.first_name,usr.last_name,dl.product_name FROM review AS rev
LEFT JOIN users AS usr ON usr.id = rev.user_id INNER JOIN deals AS dl
ON dl.id = rev.item_id WHERE rev.is_deleted = 1 AND rev.item_id =
'" . $id . "' AND rev.status = 1 ORDER BY rev.id ";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            foreach ($query->result() as $row) {
                $result[] = $row;
            }
            $query->free_result();
            return $result;
        }
    }
public function averageRate($id){
        $sql = "SELECT round(sum(rev.rate)/count(rev.id)) AS avgrate FROM review AS rev
                LEFT JOIN users AS usr ON usr.id = rev.user_id INNER JOIN deals AS dl
                ON dl.id = rev.item_id WHERE rev.is_deleted = 1 AND rev.item_id =
                '" . $id . "' AND rev.status = 1 ORDER BY rev.id ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {          
            return $query->first_row();
        }
    }

    public function getAdvertisementsDetails(){
        $sql = "SELECT a.*,c.category FROM advertisment AS a INNER JOIN category AS c ON a.category = c.id WHERE a.is_deleted = 1";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            foreach ($query->result() as $row) {
                $result[] = $row;
            }
            $query->free_result();
            return $result;
        }
    }
    
    public function getAdvertisement($id){
        $sql = "SELECT * FROM advertisment WHERE id = '".$id."'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {          
            return $query->first_row();
        }
    }
    public function getDealsCount($admin_id){
       $sql = "SELECT COUNT(*) AS TotaItems , item_type,sum(no_clicks) AS TotalClicks FROM deals WHERE merchant_id = '".$admin_id."' GROUP BY item_type";
        $query = $this->db->query($sql);        
        if ($query->num_rows()) {
            foreach ($query->result() as $row) {
                $result[] = $row;
            }
            $query->free_result();
            return $result;
        }
    }
    
    public function getAllAlertMailDetails($end=2,$type=1){
        
        $sql = "SELECT * FROM alert WHERE id NOT IN (SELECT alert_id FROM alert_mail_sent) AND type = $type LIMIT 0,$end";       
        $query = $this->db->query($sql);        
        if ($query->num_rows()) {
            foreach ($query->result() as $row) {
                $result[] = $row;
            }
            $query->free_result();
            return $result;
        }
    }
    
    public function getProductDetailsForMail($email_item){
        
       
        $sql = "SELECT * FROM deals";
        if($email_item->alert_type !=0 ){
            
            $sql.=" WHERE item_type = $email_item->alert_type";
        }
        if($email_item->band != 0 ){
            $sql="SELECT * FROM (".$sql.") AS x WHERE x.category_id IN (".$email_item->band.")";
        }
        
        if($email_item->shop != 0 ){
            $sql="SELECT * FROM (".$sql.") AS y WHERE y.shop_id IN (".$email_item->shop.")";
        }
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
}
