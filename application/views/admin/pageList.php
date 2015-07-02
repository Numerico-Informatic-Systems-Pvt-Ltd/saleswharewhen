<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <?php //print_r($log_info); die; ?>
    <head>
        <meta charset="utf-8" />
        <title> Saleswherewhen | Online shopping </title>
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
        Pages <small>Show All Pages</small>
    </h3>
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php site_url('dashboard'); ?>">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a href="<?php site_url('admin/pageList'); ?>">Pages</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php site_url('admin/pageList'); ?>">Show All Pages</a></li>
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
                <strong>Success!</strong> Product Details Has Successfully Updated.
            </div>
            <?php
        }
        ?> 
        <!-- End Alerts -->

        <!-- BEGIN SAMPLE FORM PORTLET-->   
        <div class="portlet box purple">
            <div class="portlet-title">
                <div class="caption"><i class="icon-asterisk"></i>Show All Pages</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="javascript:;" class="reload"></a>
                </div>
            </div>
            <div class="portlet-body form">
                <a href="<?php echo base_url("admin/managePage"); ?>"><img src ="<?php echo base_url(); ?>images/icons/plus.png" alt="Add New Pages" title="Add New Pages" width="50"></a><br><br>
                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Page Title</th>
                            <th>Page Content </th>
                            <th>Status</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($pages)) {
                            $c = 0;
                            foreach ($pages as $page) {
                                $c++;
                                ?>
                                <tr >
                                    <td><?php echo $c ; ?></td>
                                    <td><?php echo $page->page_title ; ?></td>
                                    <td><?php echo $page->page_content ; ?></td>
                                    <td class="center" id="status">
					<?php
                                        if ($page->status == "1") {
                                            ?>
                                        <span style="margin-left:35px;" class="status_<?php echo $page->id;?>" onclick="return changeStatus(<?php echo $page->id;?>,'pages');"> 
                                            <img src="<?php echo base_url().'images/icons/active.gif';?>" alt="Active" >
                                        </span>
                                            <?php
                                        } else { ?>
                                        <span style="margin-left:35px;" class="status_<?php echo $page->id;?>" onclick="return changeStatus(<?php echo $page->id;?>,'pages');">    
                                            <img src="<?php echo base_url().'images/icons/inactive.png';?>" alt="Inactive" >
                                        </span>
                                       <?php }?>                                    </td>
                                    <td style="width:70px;">
                                        <a href="<?php echo base_url('admin/managePage').'/'.$page->id;?>" title="edit"><img src = "<?php echo base_url() . 'images/icons/edit.png' ?>" alt="Edit" height="30" width="30"></a>
                                        <a href="<?php echo base_url('common/isDeleted'); ?>/<?php echo $page->id; ?>/pages/admin/pageList" title="delete"><img src = "<?php echo base_url() . 'images/icons/delete.png' ?>" alt="Delete" height="30" width="30"></a>
                                    </td>
                                </tr>

                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
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
    function changeStatus(id,table){
        $.ajax({
            url: "<?php echo base_url('common/updateStatus'); ?>",
            type: "POST",
            data: {
                dataId: id,
                table:table
            },
            success: function (response) {
               // alert(response);
                if(response == 1){
                    $('span.status_'+id).html('<img src="<?php echo base_url().'images/icons/inactive.png';?>">');
                }
                if(response == 2){
                    $('span.status_'+id).html('<img src="<?php echo base_url().'images/icons/active.gif';?>">');
                }
            }
        });
    }
</script>
</body>
<!-- END BODY -->
</html>
