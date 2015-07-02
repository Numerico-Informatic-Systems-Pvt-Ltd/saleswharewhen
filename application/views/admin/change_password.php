<?php 
if(!isset($details)){
   $details = (object) array(
        'id'=>'',
        'first_name'=>'',
        'last_name'=>'',
        'email_id'=>'',
        'password'=>'',
        'address'=>'',
        'city'=>'',
        'zone'=>'',
        'contact_no'=>'',
        'dob'=>'',
        'gender'=>'',
        'profile_image'=>'',
        'status'=>''
   ); 
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <?php //print_r($log_info); die; ?>
    <head>
        <meta charset="utf-8" />
        <title> Saleswherewhen | Change Password in Saleswherewhen </title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="<?php echo base_url(); ?>assets/custom/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/style-metro.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="<?php echo base_url(); ?>assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/css/datepicker.css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css" />
        <link href="<?php echo base_url(); ?>assets/plugins/select2/select2_metro.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/plugins/data-tables/DT_bootstrap.css" rel="stylesheet" />
        <!-- END PAGE LEVEL STYLES -->
        <link rel="shortcut icon" href="favicon.ico" />
        <style>
            .btn_custom{font-size: 28px;font-weight: bold;}
        </style>
       
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <?php $this->load->view('admin/include/header.php'); ?>
    <!-- END HEADER -->
    <!-- BEGIN CONTAINER -->
    <?php $this->load->view('admin/include/sideber.php'); ?>
    <!-- END BEGIN STYLE CUSTOMIZER -->  
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title">
        Manage Change Password <small>Manage Password</small>
    </h3>
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php site_url('dashboard'); ?>">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a href="<?php site_url('admin/getUsers'); ?>">Users</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php site_url('admin/changePassword'); ?>">Change Password</a></li>
    </ul>
    <!-- END PAGE TITLE & BREADCRUMB-->
</div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->

        <!--<div class="portlet-body">-->

        <!-- Begin Alerts -->
        <?php
        if (isset($password_change_update)) {
            ?>  
            <div class="alert alert-success">
                <button class="close" data-dismiss="alert"></button>
                <strong>Success!</strong> Password Has Successfully Updated.
            </div>
            <?php
        }
        if(isset($password_not_match)){
        ?>
            <div class="alert alert-error">
                <button class="close" data-dismiss="alert"></button>
                <strong>Success!</strong> Password not Updated.
            </div>
        <?php
        }
        ?> 
        <!-- End Alerts -->

        <!-- BEGIN SAMPLE FORM PORTLET-->   
        <div class="portlet box purple">
            <div class="portlet-title">
                <div class="caption"><i class="icon-asterisk"></i>Manage Password</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="javascript:;" class="reload"></a>
                </div>
            </div>
            <div class="portlet-body form">
                 <!--BEGIN FORM-->
                <?php
                $attributes = array(
                    'action'=>base_url('admin/changePassword'),
                    'method' => 'post',
                    'accept-charset' => 'utf-8',
                    'classl' => 'form-horizontal',
                    'enctype' => 'multipart/form-data',
                    'onsubmit' => 'return funCheckPassword();',
                    'autocomplete'=>'off'
                );
                echo form_open('', $attributes);
                ?>
                <div class="control-group prd_name">
                    <label class="control-label"> Old Password<span class="required">*</span></label>
                    <div class="controls">
                        <input type="password" name="old" value="" required/>
                        <?php  echo form_error('cpassword', '<span class="req">', '</span>');
                        ?>
                    </div>
                </div>
                <div class="control-group prd_name">
                    <label class="control-label"> New Password<span class="required">*</span></label>
                    <div class="controls">
                        <input type="password" name="new" value="" id = "new_pass" required />
                        <?php  echo form_error('cpassword', '<span class="req">', '</span>');
                        
                        ?>
                        <span class="req" id = "password_error"></span>
                    </div>
                </div>
                 <div class="control-group prd_name">
                    <label class="control-label"> Retype Password<span class="required" required>*</span></label>
                    <div class="controls">
                        <input type="password" name="retype" value=""  id = "re_pass"/>
                        <?php  echo form_error('cpassword', '<span class="req">', '</span>');
                        ?>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn purple">Update</button>
                    <button type="button" class="btn" id="cancel">Cancel</button>      
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER-->
</div>
<!-- END PAGE -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php $this->load->view('admin/include/footer.php'); ?>
<!-- END FOOTER -->
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/data-tables/DT_bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/scripts/app.js"></script>
<script src="<?php echo base_url(); ?>assets/scripts/table-editable.js"></script>    
<script>
    jQuery(document).ready(function() {
        App.init();
        TableEditable.init();
    });
    $('.datepicker').datepicker({
    format: 'yyyy-mm-dd'
    })
    
    function funCheckPassword(){
        var new_pass = $("#new_pass").val();
        var re_pass = $("#re_pass").val();
        if( new_pass != re_pass ){
            $("#password_error").html("Password not match");
            return false;
        }else{
            var passReg = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/;
            var passwordvalid = passReg.test(new_pass);
            if(passwordvalid){
                $("#password_error").html("");
                return true;
            }else{
                $("#password_error").html("Password length minimum 8 character. Password must contain one special character, one caps letter, one small letter & one number.");
                return false;
            }
        }
    }
    
    $('#cancel').click(function() {
   window.location.reload();
});
</script>
</body>
<!-- END BODY -->
</html>
