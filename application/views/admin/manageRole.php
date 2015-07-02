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
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/gritter/css/jquery.gritter.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/chosen-bootstrap/chosen/chosen.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/select2/select2_metro.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/clockface/css/clockface.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/css/datepicker.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-timepicker/compiled/timepicker.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/css/colorpicker.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/jquery-multi-select/css/multi-select-metro.css" />
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-switch/static/stylesheets/bootstrap-switch-metro.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/jquery-tags-input/jquery.tagsinput.css" />
        <!-- END PAGE LEVEL STYLES -->
        <link rel="shortcut icon" href="favicon.ico" />
    </head>
    <!-- BEGIN BODY -->
    <?php $this->load->view('admin/include/header.php'); ?>
    <!-- END HEADER -->
    <!-- BEGIN CONTAINER -->
    <?php $this->load->view('admin/include/sideber.php'); ?>
    <!-- END BEGIN STYLE CUSTOMIZER -->  
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title">
        Manage Role <small>Manage Role</small>
    </h3>
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php site_url('dashboard'); ?>">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a href="<?php site_url('role/rolePermission'); ?>">Role</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php site_url('role/rolePermission'); ?>">Manage Role</a></li>
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

        <div class="portlet box purple">
            <div class="portlet-title">
                <div class="caption"><i class="icon-asterisk"></i>Permission Manage</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="javascript:;" class="reload"></a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <div class="control-group">
                    <label class="control-label">Select Role <span class="required">*</span></label>
                    <div class="controls">
                        <select name="category" class="span6 m-wrap" onchange = "return funRoleChange(this.value);">
                            <option value ="" selected>Select Role to Manage</option>
                            <?php
                            foreach ($role as $row) {
								if($role_name == $row->type){
                            ?>
                                	<option value="<?php echo $row->type; ?>" selected><?php echo $row->type; ?></option>
                            <?php
								}else{
							?>
                                	<option value="<?php echo $row->type; ?>"><?php echo $row->type; ?></option>
                            <?php
								}
                            }
                            ?>
                        </select>
                        <span class="help-inline"></span>
                    </div>
                </div>
            </div>
        </div>

<?php
    if(isset($details->merchants_list)){
?>
        <div class="portlet box purple">
            <div class="portlet-title">
                <div class="caption"><i class="icon-asterisk"></i>Permission Manage Setting</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="javascript:;" class="reload"></a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <?php
                $attributes = array(
                    'method' => 'post',
                    'accept-charset' => 'utf-8',
                    'classl' => 'form-horizontal',
                    'enctype' => 'multipart/form-data',
                    'autocomplete'=>'off'
                );
                echo form_open('', $attributes);
                ?>


                <div class="row-fluid">
                    <div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">View Merchants List</label>
                            <div class="controls">

                                <div class="switch" data-on="success" data-off="warning">
                                    <input type="checkbox" value ="1"  name ="roles[0]" <?php if ($details->merchants_list == 1) {
                    echo "checked";
                } ?> class="toggle"/>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">User List View</label>
                            <div class="controls">

                                <div class="switch" data-on="success" data-off="warning">
                                    <input type="checkbox" value ="1" name ="roles[1]"  <?php if ($details->user_list == 1) {
                    echo "checked";
                } ?> class="toggle"/>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>

                <div class="row-fluid">
                    <div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">View Category List</label>
                            <div class="controls">

                                <div class="switch" data-on="success" data-off="warning">
                                    <input type="checkbox" value ="1" name ="roles[2]"  <?php if ($details->category_list == 1) {
                    echo "checked";
                } ?> class="toggle"/>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">Add Category</label>
                            <div class="controls">

                                <div class="switch" data-on="success" data-off="warning">
                                    <input type="checkbox" value ="1" name ="roles[3]"  <?php if ($details->category_add == 1) {
                    echo "checked";
                } ?> class="toggle"/>
                                </div>
                                <input type="hidden" name ="hid" value="<?php echo $role_name; ?>">
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                
                <div class="row-fluid">
                    <div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">View Brand List</label>
                            <div class="controls">

                                <div class="switch" data-on="success" data-off="warning">
                                    <input type="checkbox" value ="1"  name ="roles[4]" <?php if ($details->brand_list == 1) {
                    echo "checked";
                } ?> class="toggle"/>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">Add Brand</label>
                            <div class="controls">

                                <div class="switch" data-on="success" data-off="warning">
                                    <input type="checkbox" value ="1" name ="roles[5]"  <?php if ($details->brand_add == 1) {
                    echo "checked";
                } ?> class="toggle"/>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>

                <div class="row-fluid">
                    <div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">View Shop List</label>
                            <div class="controls">

                                <div class="switch" data-on="success" data-off="warning">
                                    <input type="checkbox" value ="1" name ="roles[6]"  <?php if ($details->shop_list == 1) {
                    echo "checked";
                } ?> class="toggle"/>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">Add Shop</label>
                            <div class="controls">

                                <div class="switch" data-on="success" data-off="warning">
                                    <input type="checkbox" value ="1" name ="roles[7]"  <?php if ($details->shop_add == 1) {
                    echo "checked";
                } ?> class="toggle"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
          
                <div class="row-fluid">
                    <div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">View Deal List</label>
                            <div class="controls">

                                <div class="switch" data-on="success" data-off="warning">
                                    <input type="checkbox" value ="1"  name ="roles[8]" <?php if ($details->deal_list == 1) {
                    echo "checked";
                } ?> class="toggle"/>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">Post Deal</label>
                            <div class="controls">

                                <div class="switch" data-on="success" data-off="warning">
                                    <input type="checkbox" value ="1" name ="roles[9]"  <?php if ($details->deal_post == 1) {
                    echo "checked";
                } ?> class="toggle"/>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>

                <div class="row-fluid">
                    <div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">View Review List</label>
                            <div class="controls">

                                <div class="switch" data-on="success" data-off="warning">
                                    <input type="checkbox" value ="1" name ="roles[10]"  <?php if ($details->review_list == 1) {
                    echo "checked";
                } ?> class="toggle"/>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">Add Advertisement</label>
                            <div class="controls">

                                <div class="switch" data-on="success" data-off="warning">
                                    <input type="checkbox" value ="1" name ="roles[11]"  <?php if ($details->advertisement_add == 1) {
                    echo "checked";
                } ?> class="toggle"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                
                <div class="row-fluid">
                    <div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">Advertise List View</label>
                            <div class="controls">

                                <div class="switch" data-on="success" data-off="warning">
                                    <input type="checkbox" value ="1"  name ="roles[12]" <?php if ($details->advertisement_list == 1) {
                    echo "checked";
                } ?> class="toggle"/>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">Add Page</label>
                            <div class="controls">

                                <div class="switch" data-on="success" data-off="warning">
                                    <input type="checkbox" value ="1" name ="roles[13]"  <?php if ($details->page_add == 1) {
                    echo "checked";
                } ?> class="toggle"/>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>

                <div class="row-fluid">
                    <div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">View Page List</label>
                            <div class="controls">

                                <div class="switch" data-on="success" data-off="warning">
                                    <input type="checkbox" value ="1" name ="roles[14]"  <?php if ($details->page_list == 1) {
                    echo "checked";
                } ?> class="toggle"/>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">Image List</label>
                            <div class="controls">

                                <div class="switch" data-on="success" data-off="warning">
                                    <input type="checkbox" value ="1" name ="roles[15]"  <?php if ($details->image_list == 1) {
                    echo "checked";
                } ?> class="toggle"/>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                
                <div class="row-fluid">
                    <div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">Manage Image Slider</label>
                            <div class="controls">

                                <div class="switch" data-on="success" data-off="warning">
                                    <input type="checkbox" value ="1" name ="roles[16]"  <?php if ($details->manage_slider == 1) {
                    echo "checked";
                } ?> class="toggle"/>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="span6 ">
                        <div class="control-group">
                            <label class="control-label"></label>
                            <div class="controls">

                                <div class="switch" data-on="success" data-off="warning">
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                    <button type="button" class="btn" id="cancel">Cancel</button>
                </div>

<?php echo form_close(); ?>
            </div>
        </div>
        
        <?php
    }
    ?>
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
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->   <script src="<?php echo base_url(); ?>assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
<!--[if lt IE 9]>
<script src="<?php echo base_url(); ?>assets/plugins/excanvas.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/respond.min.js"></script>  
<![endif]-->   
<script src="<?php echo base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
<script src="<?php echo base_url(); ?>assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/ckeditor/ckeditor.js"></script>  
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/clockface/js/clockface.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/date.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>  
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>   
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery.input-ip-address-control-1.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>   
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript" ></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript" ></script> 
<script src="<?php echo base_url(); ?>assets/plugins/jquery.pwstrength.bootstrap/src/pwstrength.js" type="text/javascript" ></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-switch/static/js/bootstrap-switch.js" type="text/javascript" ></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-tags-input/jquery.tagsinput.min.js" type="text/javascript" ></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/scripts/app.js"></script>
<script src="<?php echo base_url(); ?>assets/scripts/form-components.js"></script>     
<!-- END PAGE LEVEL SCRIPTS -->
<script>
                            jQuery(document).ready(function() {
                                App.init();
                                TableEditable.init();
                            });

                            function funRoleChange(role) {
                                //alert(role);
                                self.location = "<?php echo base_url(); ?>role/rolePermission/" + role;
                            }
                            
                            
                            $('#cancel').click(function() {
   window.location.reload();
});
</script>
</body>
<!-- END BODY -->
</html>
