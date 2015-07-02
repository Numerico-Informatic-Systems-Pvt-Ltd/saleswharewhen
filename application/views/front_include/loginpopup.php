<script>
    window.fbAsyncInit = function() {
    FB.init({
    appId      : '765342056868346',
            xfbml      : true,
            version    : 'v2.2'
    });
    };
            (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) {return; }
            js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/en_US/sdk.js";
                    fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript">
            function checkUsername() {
                    var email_id = $('#email_id').val();
                    var current_url = $('#current_url').val();
                    var password = $('#password_login').val();
                    $.ajax({
                    url: "<?php echo base_url('login/user'); ?>",
                            type: "POST",
                            data: {
                                    email_id: email_id,
                                    current_url:current_url,
                                    password:password,
<?php echo $this->security->get_csrf_token_name() . ":'" . $this->security->get_csrf_hash() . "'"; ?>
                            },
                            success: function (data) {
                            if (data == 'success')
                                    alert('success');
                                    window.location.href = "<?php echo current_url(); ?>";
                                    $("#valid_email_check").html("");
                                    $("#valid_email_check").html(data);
                            }
                    });
                    return false;
            }
</script>
<?php $userdata = $this->session->userdata('user'); ?>
<input type="hidden" name="user_session" id="user_session" value="<?php if(!empty($userdata)) { echo $userdata->forgot_password; } ?>"/>
<script type="text/javascript">
     $(document).ready(function (){
         var user_pass = $("#user_session").val();
         if(user_pass == "0"){
             alert('Please Update Your Password');
         }
     });
    
    function checkEmail(email) {
         $.ajax({
    url: "<?php echo base_url('signup/ajaxcheckEmail'); ?>",
            type: "POST",
            data: {
            email_id: email,
            },
            success: function (data) {              
                    
                    if($.trim(data) != 'success'){                     
                    $("#email_check").html("");
                    $("#email_check").html('<p style="color:red">Email already Exist.</p>');
                    $("#email_error").val('error_email_id');
                    return false;
                    
                }
                else {
                    
                    $("#email_check").html("");
                    $("#email_check").html('<p style="color:green">Email available.</p>');
                    $("#email_error").val('');
                    return true;
                }
            }
    });
    
     
    }


</script>
<script>
    function registerUser(){
            var email_checkq = $("#email_error").val();            
            var username = $("#name_regis").val();
            var email = $("#email_id_regis").val();
            var password = $("#pass_regis").val();
            var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
            var emailvalid = emailReg.test(email); //returns true & false
            var passReg = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/;
            var passwordvalid = passReg.test(password);
            if (emailvalid)
                {
                    if(email_checkq != 'error_email_id') 
                        {
                            if(passwordvalid)
                                {
                                   
                                    return true;
                                }
                            else{
                                    $("#pass_check").html('');
                                    var text = 'Password length minimum 8 character. Password must contain one special character, one caps letter, one small letter & one number.';
                                    $("#pass_check").html('<p style="color:red">'+text+'</p>');
                                    return false;
                                }
                        }
                    else{
                            $("#email_check").html('');
                            $("#email_check").html('<p style="color:red">Email already Exist.</p>');
                            return false;
                        }
                }
            else{
                    $("#email_check").html('');
                    var text = 'Incorrect Email Format.';
                    $("#email_check").html('<p style="color:red">'+text+'</p>');
                    return false;
                }
                
    }
</script>

<!--Popup login panellist--->
<div id="sign_in" class="popupContainer" style="display:none;">
    <header class="popupHeader">
        <span class="header_title">Login</span>
        <span class="modal_close">X</span>
    </header>
    <div class="social_login">        
        <a href="#" class="social_box fb">
            <image src="<?php echo base_url(); ?>images/icons/login_facebook.png"  onClick="fblogin();" style="cursor:pointer">
        </a>
        <p class="popup_or">-OR-</p>
    </div>
    <script src="//connect.facebook.net/en_US/all.js&appId=765342056868346" type="text/javascript"></script>
    <div id="fb-root" style="float:left; width:1px;"></div>
    <script>
                        window.fbAsyncInit = function() {
                        FB.init({
                        appId: '765342056868346',
                                cookie: true,
                                xfbml: true,
                                oauth: true
                        });
                        };
                        (function() {
                        var e = document.createElement('script'); e.async = true;
                                e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
                                document.getElementById('fb-root').appendChild(e);
                        }());
                        function fblogin(){

                        FB.login(function(response){
                        if (response.authResponse) {
                        window.location = '<?php echo base_url('login/loginWithFacebook'); ?>';
                        }
                        }, {scope: 'email'});
                        }
                function fbregister(){

                FB.login(function(response){
                if (response.authResponse) {
                window.location = '<?php echo base_url('signup/registerWithFacebook'); ?>';
                }
                }, {scope: 'email'});
                }
    </script>
    <?php 
                        $email =  $this->input->cookie('cookie_email', TRUE);
                        $password =  $this->input->cookie('cookie_password', TRUE);
                        
                        ?>
    <section class="popupBody">
        <!-- Username & Password Login form -->
        <div class="user_login" style="display: block;">
            <span id="valid_email_check"></span>
            <form action="" method="post" onsubmit="return checkUsername();">
                <!--<label>Email / Username :&nbsp;</label>-->
                <input type="text" name="email_id" id="email_id" placeholder="Email Address" value="<?php echo $this->input->cookie('cookie_email', TRUE);?>"/>
                <br />
                <input type="hidden" name="current_url" id="current_url" value="<?php echo current_url(); ?>">
                <!--<label>Password :&nbsp;</label>-->
                <input type="password" name="password" id="password_login" placeholder="Password" value="<?php echo $this->input->cookie('cookie_password', TRUE);?>"/>
                <br />
                <div class="action_btns">
                    <div class="one_half last"><input type="submit" value="Login" class="btn btn_red"></div>
                    <!--<div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>-->
                </div>
                <div class="checkbox popup_checkbox pull-right">
                    <input <?php if(!empty($email) && !empty($password)) { echo 'checked'; } ?> id="remember_user"onclick="return setCookiesForRememberUser();" type="checkbox" style="margin-right:2%; position:relative; float:left;" />
                    <label for="remember" style="padding-top: 3px; padding-left: 0px;">Remember me </label>
                </div>
                <div class="clearfix"></div>
            </form>
            <div class="pull-left"><a href="<?php echo base_url() ?>signup/forgotPassword" class="forgot_password">Forgot password?</a></div>
            <!--<div class="pull-right"><a href="#" class="forgot_password back_btn" style="text-align:right;">Back</a></div>-->
            <div class="pull-right" style="margin-top: 21px;"><a style="font-size:16px;" href="<?= base_url() ?>login/merchant">Sign in as Merchant</a></div>
            <div class="clearfix"></div>
        </div> 
    </section>
</div>
<!--Popup login panellist End--->
<!--Popup Register panellist--->
<div id="sign_up" class="popupContainer" style="display:none;">
    <header class="popupHeader">
        <span class="header_title">Register</span>
        <span class="modal_close">X</span>
    </header>  
    <div class="social_login">        
        <a href="#" class="social_box fb">
            <image src="<?php echo base_url(); ?>images/icons/signup_facebook.png"  onClick="fbregister();" style="cursor:pointer">
        </a>
        <p class="popup_or">-OR-</p>
    </div>
    <section class="popupBody">
        <!-- Register Form -->
        <div class="user_register" style="display:block;">
            <form  action="<?php echo base_url(); ?>signup/user" method="POST" onsubmit="return registerUser();" id="ajaxsignupform">
                <!--<label>Full Name</label>-->
                <input type="text" placeholder="Full Name" name="name" id="name_regis" required/>
                <br />

                <!--<label>Email Address</label>-->
                <input type="text" placeholder="Email Address" name="email_id" id="email_id_regis" onchange=" return checkEmail(this.value);"/>
                <span id="email_check"></span>
                <input type="hidden" id="email_error"/>
                
                <br />
                <!--<label>Password</label>-->
                <input type="password" placeholder="Password" name="password" required id="pass_regis" />
                <span id="pass_check"></span>
                <br />
                <div class="action_btns">
                    <!--<div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>-->
                    <div class="one_half last"><input type="submit" class="btn btn_red" value="Register" id="signup_register"/></div>
                    <div class="one_half last"><a class="btn_merchant"  href="<?= base_url() ?>signup/merchant">Sign up as Merchant</a></div>
                </div>
                <div class="clearfix"></div>
            </form>
            
        </div>

    </section>
</div>
<!--Popup Register panellist End--->
<link type="text/css" rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>css/popuplogin.css" />
<script type="text/javascript" src="<?php echo base_url() . '/assets/frontend/'; ?>js/jquery.leanModal.min.js"></script>
<script type="text/javascript"  src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script type="text/javascript">
                            $("#modal_trigger").leanModal({top: 100, overlay: 0.6, closeButton: ".modal_close"});
                            $("#modal_trigger1").leanModal({top: 100, overlay: 0.6, closeButton: ".modal_close"});
                            $("#modal_trigger2").leanModal({top: 100, overlay: 0.6, closeButton: ".modal_close"});
                            $("#alert_me_popup").leanModal({top: 100, overlay: 0.6, closeButton: ".modal_close"});
                            $(function () {
                            // Calling Login Form
                            $("#login_form").click(function () {
                            $(".social_login").hide();
                                    $(".user_login").show();
                                    return false;
                            });
                                    // Calling Register Form
                                    $("#register_form").click(function () {
                            $(".social_login").hide();
                                    $(".user_register").show();
                                    $(".header_title").text('Register');
                                    return false;
                            });
                                    // Going back to Social Forms
                                    $(".back_btn").click(function () {
                            $(".user_login").hide();
                                    $(".user_register").hide();
                                    $(".social_login").show();
                                    $(".header_title").text('Login');
                                    return false;
                            });
                            })
</script>
<script>
            // This is called with the results from from FB.getLoginStatus().
                    function statusChangeCallback(response) {
                    console.log('statusChangeCallback');
                            console.log(response);
                            // The response object is returned with a status field that lets the
                            // app know the current login status of the person.
                            // Full docs on the response object can be found in the documentation
                            // for FB.getLoginStatus().
                            if (response.status === 'connected') {
                    // Logged into your app and Facebook.
                    testAPI();
                    } else if (response.status === 'not_authorized') {
                    // The person is logged into Facebook, but not your app.
                    document.getElementById('status').innerHTML = 'Please log ' +
                            'into this app.';
                    } else {
                    // The person is not logged into Facebook, so we're not sure if
                    // they are logged into this app or not.
                    document.getElementById('status').innerHTML = 'Please log ' +
                            'into Facebook.';
                    }
                    }

            // This function is called when someone finishes with the Login
            // Button.  See the onlogin handler attached to it in the sample
            // code below.
            function checkLoginState() {
            FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
            });
            }

            window.fbAsyncInit = function() {
            FB.init({
            appId      : '{your-app-id}',
                    cookie     : true, // enable cookies to allow the server to access 
                    // the session
                    xfbml      : true, // parse social plugins on this page
                    version    : 'v2.2' // use version 2.2
            });
                    // Now that we've initialized the JavaScript SDK, we call 
                    // FB.getLoginStatus().  This function gets the state of the
                    // person visiting this page and can return one of three states to
                    // the callback you provide.  They can be:
                    //
                    // 1. Logged into your app ('connected')
                    // 2. Logged into Facebook, but not your app ('not_authorized')
                    // 3. Not logged into Facebook and can't tell if they are logged into
                    //    your app or not.
                    //
                    // These three cases are handled in the callback function.

                    FB.getLoginStatus(function(response) {
                    statusChangeCallback(response);
                    });
            };
                    // Load the SDK asynchronously
                            (function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) return;
                                    js = d.createElement(s); js.id = id;
                                    js.src = "//connect.facebook.net/en_US/sdk.js";
                                    fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));
                            // Here we run a very simple test of the Graph API after login is
                                    // successful.  See statusChangeCallback() for when this call is made.
                                            function testAPI() {
                                            console.log('Welcome!  Fetching your information.... ');
                                                    FB.api('/me', function(response) {
                                                    console.log('Successful login for: ' + response.name);
                                                            document.getElementById('status').innerHTML =
                                                            'Thanks for logging in, ' + response.name + '!';
                                                    });
                                            }
                                            
                                            
  function setCookiesForRememberUser(){
                var email_id = $("#email_id").val();
                var password_id = $("#password_login").val();
                //alert(email_id+'---'+password_id);
                if (document.getElementById("remember_user").checked == true) 
                        {
                            //alert(email_id);//alert(password_id);
                            $.ajax({
                                url: "<?php echo base_url('login/setCookiesRememberUser'); ?>",
                                type: "POST",
                                data: {
                                    email_id: email_id, 
                                    password_id:password_id,

                                },
                                success: function (response) { //alert(response);                           
                                }
                            });
                            return true;
                        } 
                    else{
                    //$this->input->cookie('cookie_email', TRUE)
                     
                            var cookie_email_value = $.cookie("cookie_email");
                            //alert(cookie_email_value);
                            if(cookie_email_value == email_id )
                                    {                   
                                        $.removeCookie("cookie_email");
                                        $.removeCookie("cookie_password");
                                    }
                        }
                
            }                                          
</script>




