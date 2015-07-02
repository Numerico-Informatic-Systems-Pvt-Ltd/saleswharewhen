<?php
if(!isset($brand_details)){
   //echo "<pre>";print_r($brand_details); 
    $brand_details = (object) array(
                'id' => '',
                'name'=>'',
                'speciality'=>'',
                'head_office'=>'',
                'head_contact'=>'',
                'site_office'=>'',
                'site_contact'=>'',
                'location'=>'',
                'brand_image'=>'',
                'brand_location_map'=>'',
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
        <title> Saleswherewhen | Manage Available Brands in Saleswherewhen </title>
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
        Manage Brands <small>Manage Brands</small>
    </h3>
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php site_url('dashboard'); ?>">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a href="#">Brands</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php site_url('admin/managebrands'); ?>">Manage Brands</a></li>
    </ul>
    <!-- END PAGE TITLE & BREADCRUMB-->
</div>

</div>
<!-- END PAGE HEADER-->
<p style="font-weight:bold;">This section allows you to add the Brands .</p><br>
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
                <div class="caption"><i class="icon-asterisk"></i>Manage Brands</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="javascript:;" class="reload"></a>
                </div>
            </div>
            <div class="portlet-body form">
                 <!--BEGIN FORM-->
                <?php
                $attributes = array(
                    'action'=>base_url('admin/manageBrands'),
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
                            <label class="control-label">Brand Name<span class="required">*</span></label>
                            <div class="controls">
                                <?php
                                $attributes = array(
                                    'name' => 'name',
                                    'id' => 'name',
                                    'size' => '32',
                                    'class' => 'span6 m-wrap',
                                    'value' => $brand_details->name,
                                );
                                echo form_input($attributes);
                                echo form_error('name', '<span class="req">', '</span>');
                                ?>
                                <span class="help-inline"></span>
                            </div>
                        </div>
                    </div>
                    <div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">Brand Logo<span class="required"></span></label>
                            <div class="controls">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 100px;">
                                        <img src="<?php echo !empty($brand_details->brand_image) ? base_url().'images/brands/'.$brand_details->brand_image: ''; ?>" alt="<?php echo $brand_details->brand_image;?>">
                                    </div>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                    <div>
                                        <span class="btn btn-file"><span class="fileupload-new">Select Image</span>
                                        <span class="fileupload-exists">Change</span>
                                        <input type="file" class="default" name="brand_image"/></span>
                                        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                    </div>
                                </div>
<!--                                <span class="label label-important"> Note !</span>
                                <span>
                                Image Upload Warning
                                </span>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                	<div class="span6 ">    
                        <div class="control-group">
                            <label class="control-label">Head Office Address <span class="required">*</span></label>
                            <div class="controls">
                                <textarea class="span6" name="head_office" rows="6" data-error-container="#editor2_error"><?php echo !empty($brand_details->head_office) ? $brand_details->head_office: ''; ?></textarea>
                                <?php echo form_error('head_office', '<span class="req">', '</span>');
                                ?>
                                <div id="editor2_error"></div>
                            </div>
                            <span class="label label-important">Note !</span>
                            <span>Format should be like (233, A-3 Block, Janak Puri, New Delhi - 1100058 )</span>
                        </div>
                    </div>
                    <div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">Head Office Contact No.<span class="required">*</span></label>
                            <div class="controls">
                                <?php
                                $attributes = array(
                                    'name' => 'head_contact',
                                    'id' => 'head_contact',
                                    'size' => '32',
                                    'class' => 'span6 m-wrap',
                                    'value' => $brand_details->head_contact,
                                );
                                echo form_input($attributes);
                                echo form_error('head_contact', '<span class="req">', '</span>');
                                ?>
                                <span class="help-inline"></span>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row-fluid">
                	<div class="span6 "> 
                        <div class="control-group">
                            <label class="control-label">Site Office Address<span class="required">*</span></label>
                            <div class="controls">
                                <textarea class="span6" name="site_office" rows="6" data-error-container="#editor2_error"><?php echo !empty($brand_details->site_office) ? $brand_details->site_office: ''; ?></textarea>
                               <?php echo form_error('site_office', '<span class="req">', '</span>');
                                ?>
                                <div id="editor2_error"></div>
                            </div>
                            <span class="label label-important">Note !</span>
                            <span>Format should be like (233, A-3 Block, Janak Puri, New Delhi - 1100058 )</span>
                        </div>
                    </div>
                    <div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">Site Office Contact No.<span class="required">*</span></label>
                            <div class="controls">
                                <?php
                                $attributes = array(
                                    'name' => 'site_contact',
                                    'id' => 'site_contact',
                                    'size' => '32',
                                    'class' => 'span6 m-wrap',
                                    'value' => $brand_details->site_contact,
                                );
                                echo form_input($attributes);
                                echo form_error('site_contact', '<span class="req">', '</span>');
                                ?>
                                <span class="help-inline"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                	<div class="span6 ">
                        <div class="control-group">
                            <label class="control-label"> Specialities <span class="required">*</span></label>
                            <div class="controls">
                                <textarea class="span6" name="speciality" rows="6" data-error-container="#editor2_error"><?php echo !empty($brand_details->speciality) ? $brand_details->speciality: ''; ?></textarea>
                                <?php echo form_error('speciality', '<span class="req">', '</span>');
                                ?>
                                <div id="editor2_error"></div>
                            </div>
                        </div>
                    </div>
                    <div class="span6 ">
                
                        <div class="control-group">
                            <label class="control-label">Location <span class="required">*</span></label>
                            <div class="controls">
                                <textarea class="span6" name="location" rows="6" data-error-container="#editor2_error"><?php echo !empty($brand_details->location) ? $brand_details->location: ''; ?></textarea>
                                 <?php echo form_error('location', '<span class="req">', '</span>');
                                ?>
                                <div id="editor2_error"></div>
                            </div>
                            <span class="label label-important">Note !</span>
                            <span>Location Should Main Branch Address</span>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                	<div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">Map Url<span class="required">*</span></label>
                            <div class="controls">
                                <textarea class="span6" name="brand_location_map" rows="6" data-error-container="#editor2_error"><?php echo !empty($brand_details->brand_location_map) ? $brand_details->brand_location_map: ''; ?></textarea>
                                <?php echo form_error('brand_location_map', '<span class="req">', '</span>');
                                ?>
                                <div id="editor2_error"></div>
                            </div>
                        </div>
					</div>
                    <div class="span6 ">
                 <?php if(isset($count_locations)){ ?>
                <div class="control-group" id="other_locations">
                    <input type="hidden" id="count" name="count" value="<?php echo $count_locations; ?>"/>
                    <?php for($j=0;$j < $count_locations;$j++){ ?>
                        <div class="control-group">
                            <div class="controls">
				<input type="hidden" name="brand_ocation_id<?php echo $j;?>" value="<?php echo $other_locations[$j]->id; ?>">
                                <textarea class="span6" placeholder="Address" name="location<?php echo $j;?>" ><?php echo $other_locations[$j]->location; ?></textarea>
                                </br>
                                <input type="text" class="span6" placeholder="Contact no." name="contact<?php echo $j;?>" value="<?php echo $other_locations[$j]->contact_no; ?>">
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <?php }else{ ?>
		<div class="control-group">
                    <label class="control-label">Add More Locations</label>
                    <div class="controls" id="add_locations">
                        <img src="<?php echo base_url().'images/icons/add_btn.png';?>"  height="50px" width="50px">
                        <div id="editor2_error"></div>
                    </div>
                </div>
                <div class="control-group" id="other_locations" style="display:none;">
                    <input type="hidden" id="count" name="count" value="0"/>
                </div>
                <?php } ?>
                </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Status <span class="required"></span></label>
                    <div class="controls">
                        <select name="status" class="span6 m-wrap catg">
                            <option value="1" <?php echo ($brand_details->status == 1) ? 'selected': ' '; ?>>Active</option>
                            <option value="0" <?php echo ($brand_details->status == 0) ? 'selected': ' '; ?>>Inactive</option>
                            
                        </select>
                        <span class="help-inline"></span>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn purple"><?php echo ($brand_details->id) ? 'Update':'Add'; ?></button>
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
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
    format: 'yyyy-mm-dd h:i:s'
    })
</script>
<script>
$(document).ready(function() {
    
    $('#add_locations').click(function() {
        var count= $("#count").val();
        $('div#other_locations').append('<div class="controls"><textarea name="location'+count+'" class="span6"></textarea></br><input type="text" class="span6" name="contact'+count+'"></div>');
        $('div#other_locations').show();
        count++;
        $("#count").val(count);
    });
});
$('#cancel').click(function() {
   window.location.reload();
});
</script>
</body>
<!-- END BODY -->
</html>
