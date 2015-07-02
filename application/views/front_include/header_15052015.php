<!--<script type="text/javascript" src="<?php echo base_url() . '/assets/frontend/'; ?>js/bootbox.min.js"></script>-->
<meta name="google-translate-customization" content="16eda22abf23806-91c3f3488ba510be-gaa410176b58ba435-15"></meta>
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<div class="col-lg-4">
    <a href="<?php echo base_url('home');?>"><img src="<?php echo base_url() . '/assets/frontend/'; ?>images/logo.png" alt="Saleswherewhen Logo" class="img-responsive" /></a>
</div>
<div class="col-lg-8 lt_pad pull-right">
    <div class="header_rt_wrap">
        
        <!--<div class="cart_wrap">(0)</div>-->
        
        <div class="button_wrap pull-right">
            
            <?php
            
            $userLogin = $this->session->userdata('user');  
            $loginFailed = $this->session->userdata('loginError');
            if($loginFailed){
               // print_r('Login Failed');
            }
            if(empty($userLogin->id)) { ?>
            <div class="btn_signin"><a id="modal_trigger" href="#sign_in" class="">Sign In</a></div>
            <div class="btn_signup"><a id="modal_trigger2" href="#sign_up" class="">Sign Up</a></div>            
            <?php } else { ?>
            <div class="btn_signin"><a href="<?php echo base_url();?>logout/user" class="">Log Out</a></div>
            <div class="btn_signup"><a href="<?php echo base_url();?>users/myAccount">My Account</a></div>
                <?php } ?>
            
            <!--<div class="btn_alert"><a href="#alertme" id="alert_me_popup">Alert Me</a></div>-->
            <div class="btn_alert"><a href="#" data-toggle="modal" data-target="#exampleModal1" data-whatever="@mdo">Alert Me</a></div>
            
            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Alert Me</h4>
                  </div>
                  <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/bootbox.min.js"></script>
                  <script type="text/javascript">
				  	function typeDetails(type){
						//alert(type);
						if(type == 1){
							$("#for_email").css("display", "block");
							$("#for_phone").css("display", "none");
							$("#for_account").css("display", "none");
						}else if(type == 2){
							$("#for_email").css("display", "none");
							$("#for_phone").css("display", "block");
							$("#for_account").css("display", "none");
						}else if(type == 3){
							$("#for_email").css("display", "none");
							$("#for_phone").css("display", "none");
							$("#for_account").css("display", "block");
						}
					}
				  
				  	function changeAjaxItem(type){
						//alert(type);
						$.ajax({
							url: "<?php echo base_url('home/ajaxSelectItem'); ?>",
									type: "POST",
									data: {
									type: type,
									<?php echo $this->security->get_csrf_token_name() . ":'" . $this->security->get_csrf_hash() . "'"; ?>
									},
									success: function(data){
										alert(data);
									}
						});
						return false;
					}
					
					function submitAlertCartAjax(){
						
						var alert_type = $("#alert_type").val();
						var email = $("#email").val();
						var phone = $("#phone").val();
						var username = $("#username").val();
						var password = $("#password").val();
						var deal_type = $("#deal_type").val();
						var name = $("#name").val();
						var brand = $("#brand").val();
						var retailer = $("#retailer").val();
						//bootbox.alert("brand");
						if(alert_type != "" && deal_type != "" && name != "" && brand != "" && retailer != ""){
							if(alert_type == 1 && email != ""){
							//alert("suman");
								$.ajax({
									url: "<?php echo base_url('home/insertAlertSeesion'); ?>",
											type: "POST",
											data: {
											alert_type: alert_type,
											email: email,
											phone: phone,
											username: username,
											password: password,
											deal_type: deal_type,
											name: name,
											brand: brand,
											retailer: retailer,
											<?php echo $this->security->get_csrf_token_name() . ":'" . $this->security->get_csrf_hash() . "'"; ?>
											},
											success: function(data){
												alert("Successfully add to the alert cart");
												$("#alert_type").val("");
												$("#email").val("");
												$("#phone").val("");
												$("#username").val("");
												$("#password").val("");
												$("#deal_type").val("");
												$("#name").val("");
												$("#brand").val("");
												$("#retailer").val("");
											}
								});
							}else if(alert_type == 2 && phone != ""){
								$.ajax({
									url: "<?php echo base_url('home/insertAlertSeesion'); ?>",
											type: "POST",
											data: {
											alert_type: alert_type,
											email: email,
											phone: phone,
											username: username,
											password: password,
											deal_type: deal_type,
											name: name,
											brand: brand,
											retailer: retailer,
											<?php echo $this->security->get_csrf_token_name() . ":'" . $this->security->get_csrf_hash() . "'"; ?>
											},
											success: function(data){
												alert("Successfully add to the alert cart");
												$("#alert_type").val("");
												$("#email").val("");
												$("#phone").val("");
												$("#username").val("");
												$("#password").val("");
												$("#deal_type").val("");
												$("#name").val("");
												$("#brand").val("");
												$("#retailer").val("");
											}
								});
							}else if(alert_type == 3 && username != "" && password != ""){
								$.ajax({
									url: "<?php echo base_url('home/insertAlertSeesion'); ?>",
											type: "POST",
											data: {
											alert_type: alert_type,
											email: email,
											phone: phone,
											username: username,
											password: password,
											deal_type: deal_type,
											name: name,
											brand: brand,
											retailer: retailer,
											<?php echo $this->security->get_csrf_token_name() . ":'" . $this->security->get_csrf_hash() . "'"; ?>
											},
											success: function(data){
												alert("Successfully add to the alert cart");
												$("#alert_type").val("");
												$("#email").val("");
												$("#phone").val("");
												$("#username").val("");
												$("#password").val("");
												$("#deal_type").val("");
												$("#name").val("");
												$("#brand").val("");
												$("#retailer").val("");
											}
								});
							}else{
								alert("all field are required. Check carefully. You missout a field. ");
							}
						}else{
							alert("all field are required. Please fill up all field. ");
						}
						return false;
					}
				  </script>
                  <div class="modal-body">
                    <form action=" " method="POST" onSubmit="return submitAlertCartAjax();">
                        <div class="form-group">
                        <label style="color:#fff;" class="col-sm-3 control-label less_pad">Alert Me Via</label>
                        <div class="col-sm-9 less_pad">
                        <select class="alert_popup_input" name = "alert_type" onChange="return typeDetails(this.value);" id = "alert_type">
                            <option value  = "1">Email</option>
                            <option value  = "2">Text Message</option>
                            <option value  = "3">SWW Account</option>
                        </select>
                        <span id = "for_email">
                        	<input type="text" class="alert_popup_input" placeholder="Please Enter Email" name="email" id = "email"/>
                        </span>
                        <span id = "for_phone" style = "display: none;">
                        	<input type="text" class="alert_popup_input" placeholder="Please Enter Telephone" name="phone" id = "phone"/>
                        </span>
                        <span id = "for_account" style = "display: none;">
                        	<input type="text" class="alert_popup_input" placeholder="Please Enter Username" name="username" id = "username"/>
                            <input type="password" class="alert_popup_input" placeholder="Please Enter Password" name="password" id = "password"/>
                        </span>
                        </div>
                        </div>
                        
                        <div class="form-group">
                        <label style="color:#fff;" class="col-sm-3 control-label less_pad">Alert Me About</label>
                        <div class="col-sm-9 less_pad">
                        <select class="alert_popup_input" name = "deal_type" id = "deal_type">
                            <option value = "0">All</option>
                            <option value = "1">Sales</option>
                            <option value = "2">Deals</option>
                            <option value = "3">Coupons</option>
                        </select>
                        </div>
                        </div>
                        
                        <div class="form-group">
                        <label style="color:#fff;" class="col-sm-3 control-label less_pad">For</label>
                        <div class="col-sm-9 less_pad">
                        <input type="text" placeholder="Item" class="alert_popup_input" name="name" id = "name"/>
                        </div>
                        </div>
                        
                        <div class="form-group">
                        <label style="color:#fff;" class="col-sm-3 control-label less_pad">Narrow By</label>
                        <div class="col-sm-9 less_pad">
                        <select multiple class="alert_popup_input" name = "brand[]" id = "brand">
                    <?php
						foreach($brand_list as $brand){
					?>
                            <option value = "<?php echo $brand->id; ?>"><?php echo $brand->name; ?></option>
                    <?php
						}
					?>
                        </select>
                        </div>
                        </div>
                        
                        <div class="form-group">
                        <label style="color:#fff;" class="col-sm-3 control-label less_pad">Choose Retailer</label>
                        <div class="col-sm-9 less_pad">
                        <select class="alert_popup_input" name = "retailer" id = "retailer">
                            <option value = "0">Retailer / All</option>
                    <?php
						foreach($shop_list as $shop){
					?>
                            <option value = "<?php echo $shop->id; ?>"><?php echo $shop->shop_name; ?></option>
                    <?php
						}
					?>
                        </select>
                        </div>
                        </div>
                        <br />              
                        
                        <div class="action_btns">
                            <!--<div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>-->
                            <div class="form-group">
                                <div class="col-sm-3 control-label less_pad"></div>
                                <div class="col-sm-9 less_pad">
                                    <a href = "<?php echo base_url('home/alertMeCart'); ?>"><input type="button" class="alert_popup_btn col-sm-3 pull-right" value="Done"></a></input>
                                    <input type="submit" class="alert_popup_btn col-sm-9 pull-right" value="Add More Alerts" style = "width: 160px;"></input>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                  </div>
                  
                </div>
              </div>
            </div>
            
            
        </div>
        
<!--        <div class="language_wrap pull-right">
            <div id="google_translate_element"></div>
            <div class="clearfix"></div>
        </div>-->
        
        <div class="app_wrap pull-right">
            <div><a href="<?php echo base_url('home/construction');?>" target="_blank">Get The app</a></div>
            <a href="<?php echo base_url('home/construction');?>" target="_blank"><img src="<?php echo base_url() . '/assets/frontend/'; ?>images/android_ico.png" alt="Android" class="img-responsive" /></a>
            <a href="<?php echo base_url('home/construction');?>" target="_blank"><img src="<?php echo base_url() . '/assets/frontend/'; ?>images/apple_ico.png" alt="Apple" class="img-responsive" /></a>
        </div>
        
        <div class="clearfix"></div>
    </div>
</div>
<div class="clearfix"></div>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'en,es,fr', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>
<!--<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>-->
<!--<link type="text/css" rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>css/translateelement.css" />-->
<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/googletranslate.js"></script>
        
<?php include 'loginpopup.php';?>


