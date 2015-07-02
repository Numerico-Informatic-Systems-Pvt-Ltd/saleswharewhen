<?php

Class category_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /* getCategory is a common function for fetching all active Category and a single active category . 
     * Single Category will fetched if  parameter $id is passed */

    public function getCategory($id = null) {
        if ($id) {
            $query = $this->db->get_where('category', array('id' => $id, 'status' => 1, 'is_deleted' => 1));
            $result = $query->first_row();
        } else {
            $query = $this->db->get_where('category', array('status' => 1, 'is_deleted' => 1));
            $result = $query->result();
        }
        return $result;
    }

    public function getCategoryList($id = null) {
        if ($id) {
            $query = $this->db->get_where('category', array('id' => $id, 'is_deleted' => 1));
            $result = $query->first_row();
        } else {
            $query = $this->db->get_where('category', array('is_deleted' => 1));
            $result = $query->result();
        }
        return $result;
    }

    public function getCategoryMegaMenu() {
        $query = $this->db->get_where('category', array('status' => 1, 'is_deleted' => 1));
        $result = $query->result();
        return $result;
    }

    public function getParentCategory() {
        $query = $this->db->get_where('category', array('parent_id' => '0', 'status' => 1, 'is_deleted' => 1));
        $result = $query->result();
        return $result;
    }

    public function getMainCategory() {
        $sql = "SELECT * FROM ( SELECT CONCAT('/',t1.id) AS 'actual_path' ,t1.id,t1.category,t1.parent_id,t1.category_image,t1.is_deleted,t1.status FROM category AS t1 WHERE t1.parent_id='0' AND t1.is_deleted = 1) a UNION ALL SELECT * FROM( SELECT CONCAT('/',t1.id,'/',t2.id) AS 'actual_path',t2.id , t2.category,t2.parent_id,t2.category_image,t2.is_deleted,t2.status FROM category AS t1 JOIN category AS t2 on t2.parent_id=t1.id WHERE t1.parent_id ='0' AND t2.is_deleted = 1) b UNION ALL SELECT * FROM( SELECT CONCAT('/',t1.id,'/',t2.id,'/',t3.id) AS 'actual_path',t3.id , t3.category,t3.parent_id,t3.category_image ,t3.is_deleted,t3.status FROM category AS t1 JOIN category AS t2 on t2.parent_id=t1.id JOIN category AS t3 on t3.parent_id=t2.id WHERE t1.parent_id ='0' AND t3.is_deleted = 1) c";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function getsubCategory($id = null) {
        if ($id) {
            $query = $this->db->get_where('category', array('parent_id' => $id, 'status' => 1, 'is_deleted' => 1));
        } else {
            $query = $this->db->get_where('category', array('parent_id !=' => '0', 'status' => 1, 'is_deleted' => 1));
        }
        $result = $query->result();
        return $result;
    }

    /* manage is a common function for category insert and category update */

    public function manage($input, $id = null) {
        if ($id) {
            $this->db->update('category', $input, array('id' => $id));
        } else {
            $this->db->insert('category', $input);
        }
        $result = ($this->db->affected_rows() != 1) ? false : true;
        return $result;
    }

    public function getAdvertisment($category_id, $start = NULL) {
        $sql = "SELECT * FROM advertisment WHERE category = '" . $category_id . "' AND is_deleted = 1 AND status = 1 AND advertisements_type = 1 AND image_type = 2";
        $sql.=" ORDER BY id";
        if ($start != NULL) {
            $sql.=" LIMIT " . $start . " ,1";
        }
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->first_row();
        }
    }

}
?>

