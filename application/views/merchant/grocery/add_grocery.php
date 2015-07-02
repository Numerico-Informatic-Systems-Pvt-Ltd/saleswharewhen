
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        
        <style>
            #addBrandForm {
                border: 1px solid #000;
                width: 35%;
                float: right;
                padding: 15px 0px 35px 30px;
                position: absolute;
                top: 250px;
                right: 20px;
            }
        </style>
        
    </head>
    <body>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->

        <!-- BEGIN SAMPLE FORM PORTLET-->   
        <div class="portlet box purple">
            <div class="portlet-title">
                <div class="caption"><i class="icon-asterisk"></i>Manage Brand Details</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="javascript:;" class="reload"></a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <?php
                $attributes = array(
                    'action' => base_url('grocery/add_grocery'),
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
                        <select name="brand_id" class="span6 m-wrap catg">
                            <option value="0">---Select---</option>
                            <?php
                            if (!empty($brandDetails)) {
                                foreach ($brandDetails as $brand) {
                                    ?>
                                    <option value="<?php echo $brand->id ?>"><?php echo $brand->name; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                        <span class="help-inline"></span>
                        <span id="addBrand"><img src = "<?php echo base_url(); ?>images/icons/add_btn.png" height="20" width="20" style="padding-left: 5px; cursor: pointer;"></span>
                    </div>                    
                </div>               
                
                <div class="control-group">
                    <label class="control-label">Shop Name<span class="required">*</span></label>
                    <div class="controls">
                        <?php
                        $attributes = array(
                            'name' => 'shop_name',
                            'id' => 'shop_name',
                            'size' => '32',
                            'class' => 'span6 m-wrap'
                        );
                        echo form_input($attributes);
                        echo form_error('shop_name', '<span class="req">', '</span>');
                        ?>
                        <span class="help-inline"></span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Shop Address </label>
                    <div class="controls">
                        <textarea class="span6" name="address" rows="6" data-error-container="#editor2_error"></textarea>
                        <div id="editor2_error"></div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Shop Location<span class="required">*</span></label>
                    <div class="controls">
                        <?php
                        $attributes = array(
                            'name' => 'location',
                            'id' => 'location',
                            'size' => '32',
                            'class' => 'span6 m-wrap',
                        );
                        echo form_input($attributes);
                        echo form_error('location', '<span class="req">', '</span>');
                        ?>
                        <span class="help-inline"></span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Contact No<span class="required">*</span></label>
                    <div class="controls">
                        <?php
                        $attributes = array(
                            'name' => 'contact_no',
                            'id' => 'contact_no',
                            'size' => '32',
                            'class' => 'span6 m-wrap',
                        );
                        echo form_input($attributes);
                        echo form_error('contact_no', '<span class="req">', '</span>');
                        ?>
                        <span class="help-inline"></span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Description<span class="required">*</span></label>
                    <div class="controls">
                        <textarea class="span6" name="description" rows="6" data-error-container="#editor2_error"></textarea>
                        <div id="editor2_error"></div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Short Description<span class="required">*</span></label>
                    <div class="controls">
                        <textarea class="span6" name="short_description" rows="6" data-error-container="#editor2_error"></textarea>
                        <div id="editor2_error"></div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Shop Image</label>
                    <div class="controls">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">                                

                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                            <div>
                                <span class="btn btn-file"><span class="fileupload-new">Select Image</span>
                                    <span class="fileupload-exists">Change</span>
                                    <input type="file" class="default" name="shop_image"/></span>
                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                            </div>
                        </div>
                        <span class="label label-important"> Note !</span>
                        <span>
                            Image Upload Warning
                        </span>
                    </div>
                </div>

                <input type="hidden" name="shop_id" value="<?php ?>"/>
                <div class="form-actions">
                    <button type="submit" class="btn purple">Add</button>
                    <button type="button" class="btn">Cancel</button>     
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="control-group">
                    <div id="addBrandForm" style = "display: none;">                    
                        <form method="post" id="shop_entry" enctype="multipart/form-data" action="<?php echo base_url(); ?>grocery/brandEntry">
                            <table>
                                <tr>
                                    <td>Shop Name:</td>
                                    <td><input type="text" id = "brand_name" name="brandname"></td>                                
                                </tr>
                                <tr>
                                    <td>Shop Image:</td>
                                    <td><input type="file" id="brand_img" cols = "29" name="image"></td>                                
                                </tr>
                                <tr colspan="2">
                                    <td><input type="button" id = "cat_sub" value = " Add " style = "margin-left: 0px;"></td>
                                </tr>

                            </table>
                        </form>
                    </div>
                </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    
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
<script type="text/javascript">
    $(document).ready(function() {
        $("#addBrand").on('click', function() {
            $("#addBrandForm").show();

        });
        $("#cat_sub").on('click', function() {
            $("#shop_entry").submit();
            $("#addBrandForm").hide();

        });
    });
</script>
</body>
<!-- END BODY -->
</html>
