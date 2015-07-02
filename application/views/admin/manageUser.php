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
        <title> Saleswherewhen | Manage Users in Saleswherewhen </title>
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
        Manage Users <small>Manage Users</small>
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
        <li><a href="<?php site_url('admin/manageUser'); ?>">Manage Users</a></li>
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
        if (isset($sup_profile_update) and $sup_profile_update == true) {
            ?>  
            <div class="alert alert-success">
                <button class="close" data-dismiss="alert"></button>
                <strong>Success!</strong> Deal Details Has Successfully Updated.
            </div>
            <?php
        }
        ?> 
        <!-- End Alerts -->

        <!-- BEGIN SAMPLE FORM PORTLET-->   
        <div class="portlet box purple">
            <div class="portlet-title">
                <div class="caption"><i class="icon-asterisk"></i>Manage Users</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="javascript:;" class="reload"></a>
                </div>
            </div>
            <div class="portlet-body form">
                 <!--BEGIN FORM-->
                <?php
                $attributes = array(
                    'action'=>base_url('admin/manageUser'),
                    'method' => 'post',
                    'accept-charset' => 'utf-8',
                    'classl' => 'form-horizontal',
                    'enctype' => 'multipart/form-data',
                    'autocomplete'=>'off'
                );
                echo form_open('', $attributes);
                ?>
                <div class="control-group prd_name">
                    <label class="control-label"> First Name<span class="required">*</span></label>
                    <div class="controls">
                        <?php
                        $attributes = array(
                            'name' => 'first_name',
                            'id' => 'first_name',
                            'size' => '32',
                            'class' => 'span6 m-wrap',
                            'value' => $details->first_name,
                        );
                        echo form_input($attributes);
                        echo form_error('first_name', '<span class="req">', '</span>');
                        ?>
                        <span class="help-inline"></span>
                    </div>
                </div>
                <div class="control-group prd_name">
                    <label class="control-label"> Last Name</label>
                    <div class="controls">
                        <?php
                        $attributes = array(
                            'name' => 'last_name',
                            'id' => 'last_name',
                            'size' => '32',
                            'class' => 'span6 m-wrap',
                            'value' => $details->last_name,
                        );
                        echo form_input($attributes);
                        echo form_error('last_name', '<span class="req">', '</span>');
                        ?>
                        <span class="help-inline"></span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Profile Image<span class="required"></span></label>
                    <div class="controls">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 100px; height: 50px;">
                                <img src="<?php echo ($details->profile_image) ? base_url().'images/user_profile_images/'.$details->profile_image: ''; ?>" alt="<?php echo $details->profile_image;?>">
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                            <div>
                                <span class="btn btn-file"><span class="fileupload-new">Select Image</span>
                                <span class="fileupload-exists">Change</span>
                                <input type="file" class="default" name="profile_image"/></span>
                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                            </div>
                        </div>
                        <span class="label label-important"> Note !</span>
                        <span>
                        Image Upload Warning
                        </span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Email<span class="required">*</span></label>
                    <div class="controls">
                        <?php
                        $attributes = array(
                            'name' => 'email_id',
                            'id' => 'email_id',
                            'size' => '32',
                            'class' => 'span6 m-wrap',
                            'value' => $details->email_id,
                        );
                        echo form_input($attributes);
                        echo form_error('email_id', '<span class="req">', '</span>');
                        ?>
                        <div id="editor2_error"></div>
                    </div>
                </div>
                 <?php if(!$details->id){?>
                <div class="control-group">
                    <label class="control-label">Password<span class="required">*</span></label>
                    <div class="controls">
                        <input type="password" name="password" value=""/>
                        <?php  echo form_error('password', '<span class="req">', '</span>');
                        ?>
                    </div>
                </div>
		<div class="control-group">
                    <label class="control-label">Confirm Password</label>
                    <div class="controls">
                        <input type="password" name="cpassword" value=""/>
                        <?php  echo form_error('cpassword', '<span class="req">', '</span>');
                        ?>
                    </div>
                </div>
                 <?php }else{ ?>
                 <div class="control-group">
                    <label class="control-label">Old Password</label>
                    <div class="controls">
                        <input type="password" name="oldpassword" value=""/>
                        <?php  echo form_error('oldpassword', '<span class="req">', '</span>');
                        ?>
                    </div>
                </div>
                 <div class="control-group">
                    <label class="control-label">New Password</label>
                    <div class="controls">
                        <input type="password" name="newpassword" value=""/>
                        <?php  echo form_error('newpassword', '<span class="req">', '</span>');
                        ?>
                    </div>
                </div>
                 <div class="control-group">
                    <label class="control-label">Confirm Password</label>
                    <div class="controls">
                        <input type="password" name="cpassword" value=""/>
                        <?php  echo form_error('cpassword', '<span class="req">', '</span>');
                        ?>
                    </div>
                </div>
                 <?php } ?>
                <div class="control-group">
                    <label class="control-label">City<span class="required">*</span></label>
                    <div class="controls">
                        <select name="city" class="span6 m-wrap catg">
                        	<option value="">---Select---</option>
                            <?php
                            foreach ($city_list as $city) {
                                ?>
                                <option value="<?php echo $city->city_id; ?>" <?php echo ($details->city == $city->city_id) ? 'selected': ' '; ?> ><?php echo $city->city_name; ?></option>
                                <?php   
                            }
                            ?>
                        </select>
                        <?php  echo form_error('city', '<span class="req">', '</span>');
                        ?>
                        <span class="help-inline"></span>
                    </div>
                </div>
                 <div class="control-group">
                    <label class="control-label">Town</label>
                    <div class="controls">
                        <select name="zone" class="span6 m-wrap catg">
                            <option value="">---Select---</option>
                        </select>
                        <?php  echo form_error('zone', '<span class="req">', '</span>');
                        ?>
                        <span class="help-inline"></span>
                    </div>
                </div>
		<div class="control-group">
                    <label class="control-label">Address</label>
                    <div class="controls">
                        <textarea class="span6 m-wrap" name="address"><?php echo ($details->address) ? $details->address:'';?></textarea>
                        <?php  echo form_error('address', '<span class="req">', '</span>');
                        ?>
                        <span class="help-inline"></span>
                    </div>
                </div>
                <div class="control-group prd_name">
                    <label class="control-label"> Contact No.<span class="required">*</span></label>
                    <div class="controls">
                        <?php
                        $attributes = array(
                            'name' => 'contact_no',
                            'id' => 'contact_no',
                            'size' => '32',
                            'class' => 'span6 m-wrap',
                            'value' => $details->contact_no,
                        );
                        echo form_input($attributes);
                        echo form_error('contact_no', '<span class="req">', '</span>');
                        ?>
                        <span class="help-inline"></span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Date of Birth<span class="required">*</span></label>
                    <div class="controls">
                        <?php
                        $attributes = array(
                            'name' => 'dob',
                            'id' => 'dob',
                            'size' => '32',
                            'class' => 'span6 m-wrap datepicker',
                            'value' => $details->dob
                        );
                        echo form_input($attributes);
                        echo form_error('dob', '<span class="req">', '</span>');
                        ?>
                        <span class="help-inline"></span>
                    </div>
                </div>
		<?php if($details->id){?>
		<div class="control-group">
                    <label class="control-label">Gender<span class="required"></span></label>
                    <div class="controls">
                        <label class="radio-inline"><input type="radio" name="gender" <?php echo ($details->gender == 'female') ? 'checked':'';?> value="Female">Female</label>
                        <label class="radio-inline"><input type="radio" name="gender" <?php echo ($details->gender == 'male') ? 'checked':'';?> value="male">Male</label>
                        
                    </div>
                </div>
		<?php }else{?>
                <div class="control-group">
                    <label class="control-label">Gender<span class="required"></span></label>
                    <div class="controls">
                        <label class="radio-inline"><input type="radio" name="gender" value="Female">Female</label>
                        <label class="radio-inline"><input type="radio" name="gender" value="male">Male</label>
                        
                    </div>
                </div>
		<?php } ?>
                <div class="control-group">
                    <label class="control-label">Status<span class="required">*</span></label>
                    <div class="controls">
                        <?php $options =  array(
                            '1' => 'Active',
                            '0' => 'Inactive'
                        );
                        echo form_dropdown('status', $options, set_value('status'));
                        echo form_error('status', '<span class="req">', '</span>');
                        ?>
                        <span class="help-inline"></span>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn purple"><?php echo ($details->id) ?'Update' :'Add';?></button>
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
    
    $('#cancel').click(function() {
   window.location.reload();
});
</script>
</body>
<!-- END BODY -->
</html>
