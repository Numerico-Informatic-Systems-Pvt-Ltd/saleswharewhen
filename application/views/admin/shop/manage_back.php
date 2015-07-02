<?php
if(!isset($shop_details)){
   //echo "<pre>";print_r($shop_details); 
    $shop_details = (object) array(
		'id' => '',
		'shop_name'=>'',
		'shop_thumb'=>'',
		'logo_thumb'=>'',
		'shop_address'=>'',
		'shop_city'=>'',
		'shop_zone'=>'',
		'shop_mobile'=>'',
		'shop_highlights'=>'',
		'shop_url'=>'',
                'merchant_id'=>'',
                'shop_logo'=>'',
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
        <title>saleswherewhen | Manage Shop</title>
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
        Manage Shop <small>Manage Shop</small>
    </h3>
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php site_url('dashboard'); ?>">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a href="#">Shop</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php site_url('admin/manageShop'); ?>">Manage Shop</a></li>
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
                <div class="caption"><i class="icon-asterisk"></i>Manage Deals</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="javascript:;" class="reload"></a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <?php
                $attributes = array(
					'action'=>base_url('admin/manageShop'),
                    'method' => 'post',
                    'accept-charset' => 'utf-8',
                    'classl' => 'form-horizontal',
                    'enctype' => 'multipart/form-data'
                );
                echo form_open('', $attributes);
                ?>
                <div class="control-group">
                    <label class="control-label">Shop Name</label>
                    <div class="controls">
                        <?php
                        $attributes = array(
                            'name' => 'shop_name',
                            'id' => 'shop_name',
                            'size' => '32',
                            'class' => 'span6 m-wrap',
                            'value' => $shop_details->shop_name,
                        );
                        echo form_input($attributes);
                        echo form_error('shop_name', '<span class="req">', '</span>');
                        ?>
                        <span class="help-inline"></span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Shop City</label>
                    <div class="controls">
                        <select name="shop_city" class="span6 m-wrap catg">
                        	<option value="0">---Select---</option>
                            <?php
                            foreach ($city_list as $city) {
                                ?>
                                <option value="<?php echo $city->city_id; ?>" <?php echo ($shop_details->shop_city == $city->city_id) ? 'selected': ' '; ?> ><?php echo $city->city_name; ?></option>
                                <?php   
                            }
                            ?>
                        </select>
                        <span class="help-inline"></span>
                    </div>
                </div>
				<div class="control-group">
                    <label class="control-label">Shop Image</label>
                    <div class="controls">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="<?php echo !empty($shop_details->shop_thumb) ? base_url().'images/shop/'.$shop_details->shop_thumb: ''; ?>" alt="<?php echo $shop_details->shop_thumb;?>" height="150">
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                            <div>
                                
                                
                                <span class="btn btn-file"><span class="fileupload-new">Select Image</span>
                                <span class="fileupload-exists">Change</span>
                                <input type="file" class="default" name="shop_img"/></span>
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
                    <label class="control-label">shop Logo</label>
                    <div class="controls">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="<?php echo !empty($shop_details->logo_thumb) ? base_url().'images/shop/'.$shop_details->shop_logo: ''; ?>" alt="<?php echo $shop_details->shop_logo;?>" height="150">
                                
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                            <div>
                                <span class="btn btn-file"><span class="fileupload-new">Select Image</span>
                                <span class="fileupload-exists">Change</span>
                                <input type="file" class="default" name="shop_logo"/></span>
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
                    <label class="control-label">Shop Address</label>
                    <div class="controls">
                        <textarea class="span6" name="shop_address" rows="6" data-error-container="#editor2_error"><?php echo !empty($shop_details->shop_address) ? $shop_details->shop_address: ''; ?></textarea>
                        <div id="editor2_error"></div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Mobile<span class="required">*</span></label>
                    <div class="controls">
                        <?php
                        $attributes = array(
                            'name' => 'shop_mobile',
                            'id' => 'shop_mobile',
                            'size' => '32',
                            'class' => 'span6 m-wrap',
                            'value' => $shop_details->shop_mobile
                        );
                        echo form_input($attributes);
                        echo form_error('shop_mobile', '<span class="req">', '</span>');
                        ?>
                        <span class="help-inline"></span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Shop Link</label>
                    <div class="controls">
                        <?php
                        $attributes = array(
                            'name' => 'shop_url',
                            'id' => 'shop_url',
                            'size' => '32',
                            'class' => 'span6 m-wrap',
                            'value' => $shop_details->shop_url,
                        );
                        echo form_input($attributes);
                        echo form_error('shop_url', '<span class="req">', '</span>');
                        ?>
                        <span class="help-inline"></span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Shop Highlights </label>
                    <div class="controls">
                        <textarea class="span6" name="shop_highlights" rows="6" data-error-container="#editor2_error"><?php echo !empty($shop_details->shop_highlights) ? $shop_details->shop_highlights: ''; ?></textarea>
                        <div id="editor2_error"></div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input type="hidden" class="span6" name="merchant_id" value="<?php echo !empty($shop_details->merchant_id) ? $shop_details->merchant_id: '0'; ?>"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Status</label>
                    <div class="controls">
                        <select name="status" class="span6 m-wrap catg">
                        	<option value="0">---Select---</option>
                            <?php
                            $options =  (object) array(
                                (object) array('id'=>1,'name'=>'Active'),
                                (object) array('id'=>0,'name'=>'Inactive')
                            );
                            foreach ($options as $option) {
                                ?>
                                <option value="<?php echo $option->id; ?>" <?php echo ($shop_details->status == $option->id) ? 'selected': ' '; ?> ><?php echo $option->name; ?></option>
                                <?php   
                            }
                            ?>
                        </select>
                        <span class="help-inline"></span>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn purple"><?php echo ($shop_details->id)?'Update':'Add' ?></button>
                    <button type="button" class="btn">Cancel</button>     
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

<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/data-tables/DT_bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/scripts/app.js"></script>
<script src="<?php echo base_url(); ?>assets/scripts/table-editable.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/ckeditor/ckeditor.js"></script>
</body>
<!-- END BODY -->
</html>
