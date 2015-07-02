<?php
Class role_model extends CI_Model{
	
    function __construct(){
            parent::__construct();
            $this->load->database();
    }
	
	function fetchMerchantType(){
		
		$sql = "select * from merchant group by type";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->result();
        }
    }
	
	
	function fetchRoleDetails($role){
		
		$sql = "select * from role_permission where type = '".$role."'";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->first_row();
        }
    }
	
	function fetchRoleid($role){
		
		$sql = "select id from role_permission where type = '".$role."'";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->first_row()->id;
        }
    }
    
    
}
?>
