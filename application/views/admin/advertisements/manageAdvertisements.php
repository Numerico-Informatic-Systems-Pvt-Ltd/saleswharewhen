<?php
if (!isset($adver)) {
    //echo "<pre>";print_r($adver); 
    $adver = (object) array(
                'id' => '',
                'adv_title' => '',
                'category' => '',
                'adv_image' => '',
                'advertisements_type'=>'',
                'image_type'=>'',
                'status' => ''
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
        <title>SalesWhereWhen | Manage Advertisements in Saleswherewhen </title>
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
        Manage Advertisements <small>Manage Advertisements</small>
    </h3>
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php site_url('dashboard'); ?>">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a href="#">Advertisements</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php site_url('category/manage'); ?>">Manage Advertisements</a></li>
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
                <div class="caption"><i class="icon-asterisk"></i>Manage Advertisements</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="javascript:;" class="reload"></a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <?php
                $attributes = array(
                    'action' => base_url('admin/manageAdvertisements'),
                    'method' => 'post',
                    'accept-charset' => 'utf-8',
                    'classl' => 'form-horizontal',
                    'enctype' => 'multipart/form-data',
                    'id'=>'form_add',
                    'autocomplete'=>'off'
                );
                echo form_open('', $attributes);
                ?>
                <div class="control-group">
                <label class="control-label"> Advertisements Type <span class="required">*</span></label>
                <div class="controls">
                    <select name="advertisements_type" class="span6 m-wrap" id="add_type_select">  
                            <option value="0">--Select Advertisements Type--</option>
                            <option value="1" <?php if($adver->advertisements_type==1){ echo 'selected'; }?>>Category List Page Advertisements</option>
                            <option value="2" <?php if($adver->advertisements_type==2){ echo 'selected'; }?>>Home Search Result Advertisements</option>
                            <option value="3">Grocery Page Advertisements</option>
                    </select>
                    <span class="help-inline"></span>
                </div>
                </div>
                        
                <div class="control-group" id="category" style="display: none;">
                <label class="control-label"> Category <span class="required">*</span></label>
                <div class="controls">
                    <select name="category" class="span6 m-wrap" >
                        <option value="0">--Select Category-- </option>
                        <?php foreach ($parent_category as $parent) { ?>
                            <option value="<?php echo $parent->id; ?>" <?php echo ($parent->id) ? 'selected' : ' '; ?>>
                            <?php echo $parent->category; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <span class="help-inline"></span>
                </div>
                </div>
                <div class="control-group" id="image_type_cate_div" style="display: none;">
                <label class="control-label"> Image Type <span class="required">*</span></label>
                <div class="controls">
                    <select name="image_type_category" class="span6 m-wrap" id="image_type_cat_value">
                         <option value="0">--Select Image--</option>
                        
                        <option value="1" <?php if($adver->image_type==1){ echo 'selected'; }?>>Slider Image</option>
                        <option value="2" <?php if($adver->image_type==2){ echo 'selected'; }?>>Big Image</option>
                    </select>
                    <span class="help-inline"></span>
                </div>
                </div>
                <div class="control-group" id="image_type_home_div" style="display: none;">
                <label class="control-label"> Image Type <span class="required">*</span></label>
                <div class="controls">
                    <select name="image_type_home" class="span6 m-wrap" id="image_type_home">
                        <option value="0">--Select Image--</option>
                        <option value="1" <?php if($adver->image_type==1){ echo 'selected'; }?>>Top Add Image</option>
                        <option value="2" <?php if($adver->image_type==2){ echo 'selected'; }?>>Right Add Image</option>
                    </select>
                    <span class="help-inline"></span>
                </div>
                </div>
              
                        <div class="control-group">
                            <label class="control-label">Advertisements Title<span class="required">*</span></label>
                            <div class="controls">
                            <?php
                            $attributes = array(
                                'name' => 'adv_title',
                                'id' => 'adv_title',
                                'size' => '32',
                                'class' => 'span6 m-wrap',
                                'value' => $adver->adv_title
                            );
                            echo form_input($attributes);
                            echo form_error('adv_title', '<span class="req">', '</span>');
                            ?>
                                <span class="help-inline"></span>
                            </div>
                        </div>
                  
                <div class="control-group">
                    <label class="control-label">Advertisements Image<span class="required">*</span></label>
                    <div class="controls">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="<?php echo!empty($adver->adv_image) ? base_url() . 'images/advertisements/' . $adver->adv_image : ''; ?>" alt="<?php echo $adver->adv_image; ?>" height="150">

                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                            <div>
                                <span class="btn btn-file"><span class="fileupload-new">Select Image</span>
                                    <span class="fileupload-exists">change</span>
                                    <input type="file" class="default" name="adv_image"/></span>
                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                            </div>
                        </div>
                        <div id="image_size_div" style="display: none;">
                        <span class="label label-important">Note!</span>
                        <span id="image_size_message" style="color: red;">                            
                        </span>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Status</label>
                    <div class="controls">
                    <?php
                    $options = array(
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
                    <button type="submit" class="btn purple"><?php echo ($adver->id) ? 'Update' : 'Add'; ?></button>
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
    jQuery(document).ready(function () {
        App.init(); // initlayout and core plugins
        Index.init();
        Index.initJQVMAP(); // init index page's custom scripts
        Index.initCalendar(); // init index page's custom scripts
        Index.initCharts(); // init index page's custom scripts
        Index.initChat();
        Index.initMiniCharts();
        Index.initDashboardDaterange();
        Index.initIntro();
        Tasks.initDashboardWidget();
    });
    
    $("#add_type_select").change(function(){        
        var add_type_value = $("#add_type_select").val();        
        if(add_type_value==1) {
             $("#image_type_home_div").hide('slow');
             $("#image_size_div").hide('slow');
            $("#category").show('slow');
            $("#image_type_cate_div").show('slow');
             $("#image_type_cat_value").change(function(){                 
                 var image_type_value = $("#image_type_cat_value").val(); 
                 //alert(image_type_value);
                 if(image_type_value==1)
                    {
                        $("#image_size_div").show('slow');
                        $("#image_size_message").html("");
                        $("#image_size_message").html("Please Upload Image with Size 650 X 310");
                    }
                    if(image_type_value==2)
                    {
                        $("#image_size_div").show('slow');
                        $("#image_size_message").html("");
                        $("#image_size_message").html("Please Upload Image with Size 1000 X 200");
                    }
             });
            
        }
        if(add_type_value==2) {
            $("#image_size_div").hide('slow');
            $("#category").hide('slow');
            $("#image_type_cate_div").hide('slow');
            $("#image_type_home_div").show('slow');
            $("#image_type_home").change(function(){
                var image_type_value = $("#image_type_home").val();  
                if(image_type_value==1)
                    {
                        $("#image_size_div").show('slow');
                        $("#image_size_message").html("");
                        $("#image_size_message").html("Please Upload Image with Size 750 X 300");
                    }
                    if(image_type_value==2)
                    {
                        $("#image_size_div").show('slow');
                        $("#image_size_message").html("");
                        $("#image_size_message").html("Please Upload Image with Size 127 X 145");
                    }
            });
            
        }
        if(add_type_value==3) {
            $("#image_size_div").hide('slow');
             $("#image_type_home_div").hide('slow');
             $("#image_size_div").show('slow');
            $("#category").hide('slow');
            $("#image_type_cate_div").hide('slow');
             $("#image_size_message").html("");
              $("#image_size_message").html("Please Upload Image with Size 1000 X 200");
        }
    });
    
    $('#cancel').click(function() {
   window.location.reload();
});
</script>

</body>
<!-- END BODY -->
</html>
