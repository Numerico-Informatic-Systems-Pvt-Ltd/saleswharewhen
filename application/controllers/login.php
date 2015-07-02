<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('language');
        $this->lang->load('admin', 'english');
        $this->load->library('session');
        $this->load->model('users_model');
        $this->load->model('deals_model');
        $this->load->model('brand_model');        
	$this->load->model('role_model');
        $this->load->model('merchant_model');
        $this->load->model('category_model');
    }

    public function index() {
        if (!$this->input->post()) {
            $this->load->view('admin/login');
        } else {
            $logindata['email'] = $this->input->post('email');
            $logindata['password'] = md5($this->input->post('password'));
            $logindata['type'] = $this->input->post('type');
            $result = $this->users_model->login($logindata);
            if ($result) {
                if ($result->status == '1' && $result->type =='admin') {
                    $newdata = (object) array(
                        'logged_in' => TRUE,
                        'logged_id' => $result->id
                    );
					$role_result = $this->role_model->fetchRoleDetails($result->type);
					$this->session->set_userdata('role_details', $role_result);
                    $this->session->set_userdata('admin', $newdata);
                    redirect('dashboard');
                } else {
                    $data['login_error'] = true;
                    $this->load->view('admin/login', $data);
                }
            } else {
                $data['login_error'] = true;
                $this->load->view('admin/login', $data);
            }
        }
    }
  
    public function forgetPassword() {
        $data = '';
        $data['brand_list'] = $this->brand_model->getBrandList();
        $data['city_list'] = $this->users_model->getCityList();
        $data['shop_list'] = $this->deals_model->getShopList(); //change
        $data['categoryMegamenu'] = $this->category_model->getCategoryMegaMenu();
        if (!$this->input->post()) {
            $this->load->view('admin/forget_password',$data);
        } else {
            $email = $this->input->post('email_id');
            //print_r($email);die;
            $data['check_email'] = $this->users_model->checkEmail($email);  //validate Email 
            //print_r($data['check_email']);die;
            $password = chr(rand(65, 91)) . chr(rand(65, 91)) . chr(rand(65, 91)) . chr(rand(65, 91)) . rand(1000, 9999);
            if ($data['check_email']) {
                date_default_timezone_set('Etc/UTC');
                require_once($_SERVER['DOCUMENT_ROOT'] . '/application/libraries/phpmailer/PHPMailerAutoload.php');
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->SMTPDebug = 0;
                $mail->Debugoutput = 'html';
                $mail->Host = "mail.nisclient.com";
                $mail->SMTPSecure = "ssl";
                $mail->Port = 465;
                $mail->SMTPAuth = true;
                $mail->Username = "noreply@nisclient.com";
                $mail->Password = "@admin2013";
                $mail->setFrom('noreply@nisclient.com', 'SalesWhereWhen');
                $mail->addReplyTo($email, 'Admin SalesWhereWhen.');
                $mail->addAddress($email, 'SalesWhereWhen');
                $mail->Subject = 'Reset Password Mail';
                $mail->Body = "Use this password to login       " . $password;
                $mail->AltBody = 'This is a plain-text message body';
                if (!$mail->send()) {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                } else {
                    $update_arr = array(
                        'password' => md5($password)
                    );
                    $update_password = $this->db->update('merchant',$update_arr, array('id'=>$data['check_email']));
                    if ($update_password) {
                        $data['change_password'] = true;
                         $this->load->view('admin/forget_password', $data);
                    } else {
                        $data['change_password'] = false;
                         $this->load->view('admin/forget_password', $data);
                    }
                }
            } else {

                $data['invalid_email'] = true;
                 $this->load->view('admin/forget_password', $data);
            }

           
        }
    }
   /*merchant function is used for merchant login in frontend*/
    public function merchant(){
        if (!$this->input->post()) {
            $this->load->view('merchant/merchantLogin');
        }else{
            $logindata['email'] = $this->input->post('email');
            $logindata['password'] = md5($this->input->post('password'));
            $logindata['type'] = $this->input->post('type');
            //print_r($logindata);die;
            $result = $this->users_model->login($logindata);
            if ($result) {
                if ($result->status == '1' && $result->type =='merchant') {
                    $newdata = (object) array(
                        'logged_in' => TRUE,
                        'logged_id' => $result->id
                    );
					$role_result = $this->role_model->fetchRoleDetails($result->type);
					$this->session->set_userdata('role_details', $role_result);
                    $this->session->set_userdata('admin', $newdata);
                    redirect('dashboard');
                } else {
                    $data['login_error'] = true;
                    $this->load->view('admin/login', $data);
                }
            } else {
                $data['login_error'] = true;
                $this->load->view('admin/login', $data);
            }
        }
    }
    /*login function is used for user and merchant login in frontend*/
      public function user(){
        if ($this->input->post()) { 
            $html = '';
            $input = array(
                'email_id'=>$this->input->post('email_id'),
                'password'=>md5($this->input->post('password'))
            );
            
            $curren_url = $this->input->post('current_url');
            $login = $this->users_model->user_login($input,'users');
            $this->session->set_userdata('user', $login);             
            if ($login){            
                 $html.='success'; 
            }
            else {  
                
                   $html.='<p style="color:red">Invalid UsernName OR Password.</p>';                     
            }
            echo $html;
	    exit();
        }
    }
  public function loginWithFacebook() {
       define("APPID", "765342056868346");
        define("SECRET", "5ef09089f0622ae030b00f2bf6fd1123");
        require_once(FCPATH . '/application/libraries/facebook/facebook.php');
        $facebook = new Facebook(array(
            'appId' => APPID,
            'secret' => SECRET,
        ));

        $users = $facebook->getUser();
        
        if ($users != "") {
            try {
                $user_profile = $facebook->api('/' . $users);
                //print_r($user_profile);		
                $logoutUrl = $facebook->getLogoutUrl();
                $fuserid = $user_profile["id"];
                $email = $user_profile["email"];
                $first_name = $user_profile["first_name"];
                $last_name = $user_profile["last_name"];
                $gender = $user_profile["gender"];
                $register_with_fb = array(
                    'facebook_login_id' => $fuserid,
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'gender' => $gender,
                    'email_id' => $email,
                    'status' => 1
                );

                $check_fb = $this->users_model->getUsersWithCheckFb($user_profile['id']);
                if (!empty($check_fb)) {
                    $result = $this->users_model->getUserInfo($check_fb);
                    $this->session->set_userdata('user', $result);
                    redirect('home');
                } else {
                    $check_mail = $this->users_model->getUsersWithMail($user_profile['email']);
                    if (!empty($check_mail)) {
                        $update = array(
                            'facebook_login_id' => $user_profile['id']
                        );
                        $this->db->update('users', $update, "id = " . $check_mail);
                        $result = $this->users_model->getUserInfo($check_mail);                        
                        $this->session->set_userdata('user', $result);
                        redirect('home');
                    } else {
                        
                        $this->db->insert('users', $register_with_fb);
                        $id = $this->db->insert_id();
                        $result = $this->users_model->getUserInfo($id);                        
                        $this->session->set_userdata('user', $result);
                        redirect('home');
                    }
                }
            } catch (FacebookApiException $e) {
                error_log($e);
                $users = null;
            }
        }
    }
    
    public function setCookiesRemember(){
        
        $email_id = $this->input->post('email_id');
        $password_id = $this->input->post('password_id');        
          if (!empty($email_id)) {
           
            $email_id_cookie = array(
                'name' => 'cookie_email',
                'value' => $email_id,
                'expire' => 86500,
                'secure' => FALSE
            );
            $this->input->set_cookie($email_id_cookie);
        }
          if (!empty($password_id)) {
            
            $password_id_cookie = array(
                'name' => 'cookie_password',
                'value' => $password_id,
                'expire' => 86500,
                'secure' => FALSE
            );
            $this->input->set_cookie($password_id_cookie);
        }
    }
    
   public function setCookiesRememberMerchant(){
        
        $email_id = $this->input->post('email_id');
        $password_id = $this->input->post('password_id');        
          if (!empty($email_id)) {
           
            $email_id_cookie = array(
                'name' => 'merchant_cookie_email',
                'value' => $email_id,
                'expire' => 86500,
                'secure' => FALSE
            );
            $this->input->set_cookie($email_id_cookie);
        }
          if (!empty($password_id)) {
            
            $password_id_cookie = array(
                'name' => 'merchant_cookie_password',
                'value' => $password_id,
                'expire' => 86500,
                'secure' => FALSE
            );
            $this->input->set_cookie($password_id_cookie);
        }
    } 
    public function setCookiesRememberUser() {
        $email_id = $this->input->post('email_id');
        $password_id = $this->input->post('password_id');
        
        if (!empty($email_id)) {

            $email_id_cookie = array(
                'name' => 'cookie_email',
                'value' => $email_id,
                'expire' => 86500,
                'secure' => FALSE
            );
            $this->input->set_cookie($email_id_cookie);
        }
        if (!empty($password_id)) {

            $password_id_cookie = array(
                'name' => 'cookie_password',
                'value' => $password_id,
                'expire' => 86500,
                'secure' => FALSE
            );
            $this->input->set_cookie($password_id_cookie);
        }
    }

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
