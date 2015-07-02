<?php
//echo"<pre>";print_r($page_details);exit;
if(!isset($page_details)){ 
    $page_details = (object) array(
                'id' => '',
                'page_title'=>'',
                'slug'=>'',
                'page_content'=>'',
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
        <title> Saleswherewhen.com | Manage Alert Mail</title>
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
        Manage Alert Mail <small>Manage Alert Mail</small>
    </h3>
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php site_url('dashboard'); ?>">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a href="<?php site_url('admin/imageList'); ?>">Alert Mail</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php site_url('admin/manageImages'); ?>">Manage Alert</a></li>
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
                <!--<strong>Success!</strong> image Has Successfully Updated.-->
            </div>
            <?php
        }
        ?> 
        <!-- End Alerts -->

        <!-- BEGIN SAMPLE FORM PORTLET-->   
        <div class="portlet box purple">
            <div class="portlet-title">
                <div class="caption"><i class="icon-asterisk"></i>Manage Alert Mail</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="javascript:;" class="reload"></a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <?php
                $attributes = array(
                    'action'=>base_url('admin/manageAlert'),
                    'method' => 'post',
                    'accept-charset' => 'utf-8',
                    'classl' => 'form-horizontal',
                    'enctype' => 'multipart/form-data',
                    'autocomplete'=>'off'
                );
                echo form_open('', $attributes);
                ?>
                
                <input type="hidden" name="alert_mail"/>
                <?php if(isset($mail_failed)){ if(!$mail_failed) { echo '<p style="color:red;">There is No Alert Mail to send</p>'; }}?>
		<div class="form-actions">
                    <button type="submit" class="btn purple">Send Alert Mail</button>
                    <button type="button" class="btn" id="cancel">Cancel</button>   
                </div>
                
                
                <?php echo form_close(); ?>
                
                <?php //if(isset($email_items)){ print_r($email_items); }?>
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
    
    $('#cancel').click(function() {
   window.location.reload();
});
</script>

</body>
<!-- END BODY -->
</html>
