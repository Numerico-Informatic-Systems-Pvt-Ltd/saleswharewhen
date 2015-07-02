<?php

Class review_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getVote($pid, $system_ip) {
        $sql = 'SELECT * FROM vote WHERE voted_for =  "' . $pid . '" AND ip_address = "' . $system_ip . '"';
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            foreach ($query->result() as $row) {
                $result[] = $row;
            }
            $query->free_result();
            return $result;
        }
    }
    
    public function showVote($id){
        $sql = 'SELECT count(*) AS totallike FROM vote WHERE voted_for = "'.$id.'" ORDER BY voted_for';
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            foreach ($query->result() as $row) {
                $result[] = $row;
            }
            $query->free_result();
            return $result;
        }
    }
    
    /* public function updateVote($votetype, $pid) {
      $this->db->select('v.id AS vid,v.voted_for AS vvoted_for,v.type AS ttype,v.like AS llike,v.dislike AS ddislike,vd.id AS vdid,vd.vote_id AS vvote_id,vd.ip_address AS iip_address,vd.login AS llogin,vd.time AS ttime');
      $this->db->from('vote v');
      $this->db->join('vote_details  vd', 'vd.vote_id = v.id');
      $this->db->where(array('v.voted_for' => $pid));
      $query = $this->db->get();
      $votedetails = $query->result();
      if ($votetype == 0) {
      $update_vote = array(
      'dislike' => $votedetails[0]->ddislike + 1
      );
      } else {
      $update_vote = array(
      'like' => $votedetails[0]->llike + 1
      );
      }
      $update_vote_details = array(
      'time' => date('Y-m-d H:i:s')
      );

      $this->db->update('vote', $update_vote, array('id' => $votedetails[0]->vid));
      $this->db->update('vote_details', $update_vote_details, array('vote_id' => $votedetails[0]->vdid));

      return $votedetails;
      } */

    public function updateVote($voted_for, $ipaddress) {

//        $sql = "SELECT * FROM vote WHERE voted_for = '" . $voted_for . "' AND ip_adress = '".$ipaddress."'";
//        $query = $this->db->query($sql);
//        if ($query->num_rows()) {
//            $vote['vote'] = $query->first_row();
//        }
//        
//        if (!empty($vote['vote'])) {
//            $pid = $vote['vote']->id;
//        }
        
            $arrayvote = array(
                'voted_for' => $voted_for,
                'type' => 'brand',
                'like' => 1,
                'ip_address' => $ipaddress
            );
            $this->db->insert('vote', $arrayvote);
        
    }

    public function getReviewBrand($id) {
        $sql = "SELECT round(sum(rev.rate)/count(rev.id)) AS avgrate FROM review AS rev
                LEFT JOIN users AS usr ON usr.id = rev.user_id INNER JOIN brand AS dl
                ON dl.id = rev.item_id WHERE rev.is_deleted = 1 AND rev.item_id =
                '" . $id . "' AND rev.item_type = 2 AND rev.status = 1 ORDER BY rev.id ";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->first_row();
        }
    }

}
