<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class common extends CI_Controller {

	function __construct(){
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->helper(array('form', 'url'));
            $this->load->library('session');
            $this->load->model('admin_model');
            if (!$this->session->userdata('admin')){ 
                redirect('login');	
        }	
    }	
	
    public function isDeleted()
	{       
            $id = $this->uri->segment(3);
            $table = $this->uri->segment(4);
            $controller = $this->uri->segment(5);
            $function = $this->uri->segment(6);

            $data = array(
                'is_deleted' => 0
            );

            $this->db->where('id', $id);
            $this->db->update($table, $data);

            redirect($controller.'/'.$function);
		
	}
    public function updateStatus(){
        $id = $_POST['dataId'];
        $table = $_POST['table'];
        $query = $this->db->get_where($table,array('id'=>$id));
        $data= $query->first_row();
        $status = $data->status;
        $this->db->where('id', $id);
        if($status == 1){
            $this->db->update($table, array('status'=>0));
            $result = ($this->db->affected_rows() != 1) ? '' : 1;
        }else{
            $this->db->update($table, array('status'=>1));
            $result = ($this->db->affected_rows() != 1) ? '' : 2;
        }
        echo $result;
        exit;
    }
	
}

/* End of file common.php */
/* Location: ./application/controllers/common.php */
