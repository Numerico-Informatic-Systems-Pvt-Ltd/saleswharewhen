<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Saleswherewhen.com Admin panel</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/style-metro.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="<?php echo base_url(); ?>assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/select2/select2_metro.css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo base_url(); ?>assets/css/pages/login.css" rel="stylesheet" type="text/css"/>
        <!-- END PAGE LEVEL STYLES -->
        <link rel="shortcut icon" href="favicon.ico" />
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="login">
        <!-- BEGIN LOGO -->
        <div class="logo">
<!--		<img src="<?php echo base_url(); ?>assets/img/Maher_ogo.png" alt="" />-->
            <span style="color: #ffffff;">Saleswherewhen</span><span style = "color: #fd300e;">.com</span>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <?php
            if (isset($login_error) and $login_error == true) {
                ?>
                <div class="alert alert-error">
                    <button class="close" data-dismiss="alert"></button>
                    <span>Invalid Username and Password.</span>
                </div>
                <?php
            }
            if (isset($login_error2) and $login_error2 == true) {
                ?>
                <div class="alert alert-error">
                    <button class="close" data-dismiss="alert"></button>
                    <span>User valid date over.</span>
                </div>
                <?php
            }
            ?>
            <!-- BEGIN LOGIN FORM -->
		<a href="<?php echo base_url(); ?>" class="pull-right">
            	<span class="glyphicon glyphicon-remove"><strong>X</strong></span>
            	<!--<img src="<?php echo base_url(); ?>assets/frontend/images/close.png" alt="close" class="img-responsive">-->
            </a>
            <form class="form-vertical login-form" action=" " method="post">
                <h3 class="form-title">Login to your account</h3>
                <div class="alert alert-error hide">
                    <button class="close" data-dismiss="alert"></button>
                    <span>Enter any username and password.</span>
                </div>
                <div class="control-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Email</label>
                    <div class="controls">
                        <div class="input-icon left">
                            <i class="icon-user"></i>
                            <input class="m-wrap placeholder-no-fix" type="text" autocomplete="off" placeholder="Email address" name="email" id="email_id_remember" value="<?php echo $this->input->cookie('cookie_email', TRUE);?>"/>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <div class="controls">
                        <div class="input-icon left">
                            <i class="icon-lock"></i>
                            <input class="m-wrap placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" id="password_id_remember" value="<?php echo $this->input->cookie('cookie_password', TRUE);?>"/>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="type" value="admin"/>
                <div class="form-actions">
                    <label class="checkbox">
                        <?php 
                        $email =  $this->input->cookie('cookie_email', TRUE);
                        $password =  $this->input->cookie('cookie_password', TRUE);
                        
                        ?>
                        <input type="checkbox" name="remember" value="1" <?php if(!empty($email) && !empty($password)) { echo 'checked'; } ?> id="remember_admin" onclick="return setCookiesForRememberAdmin();"/> Remember me
                    </label>
                    <button type="submit" class="btn green pull-right">
                        Login <i class="m-icon-swapright m-icon-white"></i>
                    </button>            
                </div>
                <div class="forget-password">
                    <h4>Forgot your password ?</h4>
                    <p>
                        no worries, click <a href="<?php echo base_url('login/forgetPassword'); ?>"  id="forget-password1">here</a>
                        to reset your password.
                    </p>
                </div>
            </form>
            <!-- END LOGIN FORM -->        
            <!-- BEGIN FORGOT PASSWORD FORM -->
            
            <!-- END FORGOT PASSWORD FORM -->
        </div>
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright">
            2015 &copy; saleswherewhen.com
        </div>
        <!-- END COPYRIGHT -->
        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- BEGIN CORE PLUGINS -->   
        <script src="<?php echo base_url(); ?>assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
        <!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
        <script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
        <!--[if lt IE 9]>
        <script src="assets/plugins/excanvas.min.js"></script>
        <script src="assets/plugins/respond.min.js"></script>  
        <![endif]-->   
        <script src="<?php echo base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
        <script src="<?php echo base_url(); ?>assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>	
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/select2/select2.min.js"></script>     
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/scripts/app.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/scripts/login.js" type="text/javascript"></script> 
        <script type="text/javascript"  src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
        <!-- END PAGE LEVEL SCRIPTS --> 
        <script>
            jQuery(document).ready(function () {
                App.init();
                Login.init();

//                var cookie_email_value = $.cookie("cookie_email");               
//                var password_id = $.cookie("cookie_password");
//                if(cookie_email_value != '' && password_id != '') {
//                    alert('hiiii');
//                $('#remember_admin').prop('checked', true);
//            }
                
            });
            
            function setCookiesForRememberAdmin(){
                var email_id = $("#email_id_remember").val();
                var password_id = $("#password_id_remember").val();
                
                if (document.getElementById("remember_admin").checked == true) 
                        {
                            //alert(email_id);alert(password_id);
                            $.ajax({
                                url: "<?php echo base_url('login/setCookiesRemember'); ?>",
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
        <!-- END JAVASCRIPTS -->
    </body>
    <!-- END BODY -->
</html>
