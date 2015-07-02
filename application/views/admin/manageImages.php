<?php
if(!isset($image_details)){ 
    $image_details = (object) array(
                'id' => '',
                'image_name'=>'',
                'image_type'=>'',
                'image_size'=>'',
                'image_url'=>'',
                'display_on'=>'',
                'display_off'=>'',
                'status'=>''
            );
}

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title> Saleswherewhen.com | Manage Images</title>
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
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/chosen-bootstrap/chosen/chosen.css" />


        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css" />
        <link href="<?php echo base_url(); ?>assets/plugins/select2/select2_metro.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/plugins/data-tables/DT_bootstrap.css" rel="stylesheet" />
        <!-- END PAGE LEVEL STYLES -->
        <link rel="shortcut icon" href="favicon.ico" />
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
        Manage Images <small>Manage Images</small>
    </h3>
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php site_url('dashboard'); ?>">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a href="<?php site_url('admin/imageList'); ?>">Images</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php site_url('admin/manageImages'); ?>">Manage Images</a></li>
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
                <strong>Success!</strong> image Has Successfully Updated.
            </div>
            <?php
        }
        ?> 
        <!-- End Alerts -->

        <!-- BEGIN SAMPLE FORM PORTLET-->   
        <div class="portlet box purple">
            <div class="portlet-title">
                <div class="caption"><i class="icon-asterisk"></i>Manage Images</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="javascript:;" class="reload"></a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <?php
                $attributes = array(
                    'action'=>base_url('admin/manageImages'),
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
                            <label class="control-label">Image Type<span class="required">*</span></label>
                            <div class="controls">
                                <select name="image_type" class="span6 m-wrap catg" id="type">
                                    <option value="">---Select---</option>
                                        <option value="1" <?php echo ($image_details->image_type == 1) ? 'selected': ' '; ?>>Home Search</option>
                                        <option value="2" <?php echo ($image_details->image_type == 2) ? 'selected': ' '; ?>>Home Slider</option>
                                        <option value="3" <?php echo ($image_details->image_type == 3) ? 'selected': ' '; ?>>Grocery Slider</option>
                                </select>
                               <?php echo form_error('image_type', '<span class="req">', '</span>'); ?>
                                <span class="help-inline"></span>
                            </div>
                        </div>
                     </div>
                	<div class="span6 ">
                        <div class="control-group" id="size_option" style="display: none;">
                            <label class="control-label">Image Size<span class="required">*</span></label>
                            <div class="controls">
                                <select name="image_size" class="span6 m-wrap catg" id="type">
                                    <option value="">---Select---</option>
                                        <option value="1" <?php echo ($image_details->image_size == 1) ? 'selected': ' '; ?>>585x423</option>
                                        <option value="2" <?php echo ($image_details->image_size == 2) ? 'selected': ' '; ?>>219x240</option>
                                        <option value="3" <?php echo ($image_details->image_size == 3) ? 'selected': ' '; ?>>219x183</option>
                                </select>
                               <?php echo form_error('image_type', '<span class="req">', '</span>'); ?>
                                <span class="help-inline"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Image<span class="required">*</span></label>
                    <div class="controls">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 400px; height: 150px;">
                                <img src="<?php echo !empty($image_details->image_name) ? base_url().'images/admin/'.$image_details->image_name: ''; ?>" alt="<?php echo $image_details->image_name;?>">
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                            <div>
                                <span class="btn btn-file"><span class="fileupload-new">Select Image</span>
                                <span class="fileupload-exists">Change</span>
                                <input type="file" class="default" name="image_name"/></span>
                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                            </div>
                        </div>
<!--                        <span class="label label-important"> Note !</span>
                        <span>
                        Image Upload Warning
                        </span>-->
                    </div>
                </div>
                <div class="row-fluid">
                	<div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">Images Url<span class="required">*</span></label>
                            <div class="controls">
                                <?php
                                $attributes = array(
                                    'name' => 'image_url',
                                    'id' => 'image_url',
                                    'size' => '32',
                                    'class' => 'span6 m-wrap',
                                    'value' => $image_details->image_url
                                );
                                echo form_input($attributes);
                                echo form_error('image_url', '<span class="req">', '</span>');
                                ?>
                                <span class="help-inline"></span>
                            </div>
                        </div>
                	</div>
                	<div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">Images Valid From<span class="required">*</span></label>
                            <div class="controls">
                                <?php
                                $attributes = array(
                                    'name' => 'display_on',
                                    'id' => 'display_on',
                                    'size' => '32',
                                    'class' => 'span6 m-wrap datepicker',
                                    'value' => $image_details->display_on
                                );
                                echo form_input($attributes);
                                echo form_error('display_on', '<span class="req">', '</span>');
                                ?>
                                <span class="help-inline"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                	<div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">Images Valid Till<span class="required">*</span></label>
                            <div class="controls">
                                <?php
                                $attributes = array(
                                    'name' => 'display_off',
                                    'id' => 'display_off',
                                    'size' => '32',
                                    'class' => 'span6 m-wrap datepicker',
                                    'value' => $image_details->display_off
                                );
                                echo form_input($attributes);
                                echo form_error('display_off', '<span class="req">', '</span>');
                                ?>
                                <span class="help-inline"></span>
                            </div>
                        </div>
                    </div>
                	<div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">Status <span class="required">*</span></label>
                            <div class="controls">
                                <select name="status" class="span6 m-wrap catg">
                                    <option value="1" <?php echo ($image_details->status == 1) ? 'selected': ' '; ?>>Active</option>
                                    <option value="0" <?php echo ($image_details->status == 0) ? 'selected': ' '; ?>>Inactive</option>
                                    
                                </select>
                                <span class="help-inline"></span>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="form-actions">
                    <button type="submit" class="btn purple"><?php echo ($image_details->id) ? 'Update':'Add'; ?></button>
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
<script src="<?php echo base_url(); ?>assets/plugins/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>

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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/date.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/data-tables/DT_bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/scripts/app.js"></script>
<script src="<?php echo base_url(); ?>assets/scripts/table-editable.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/ckeditor/ckeditor.js"></script>
<script>
    jQuery(document).ready(function() {
        App.init();
        TableEditable.init();
    });
    $('.datepicker').datepicker({
    //format: 'Y-M-d h:i:s'
    })
</script>

<script>
$(document).ready(function() {
    $('#type').change(function() {
        var type = $(this).val();
        if(type == 2){
            $('#size_option').show();
        }else{
            $('#size_option').hide();
        }
    });
});
 $('#cancel').click(function() {
   window.location.reload();
});
</script>
</body>
<!-- END BODY -->
</html>
