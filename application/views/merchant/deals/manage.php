<?php
if(!isset($deal_details)){
   //echo "<pre>";print_r($deal_details); 
    $deal_details = (object) array(
                'id' => '',
                'shop_id'=>'',
                'brand_name'=>'',
                'category_id'=>'',
                'description'=>'',
                'short_description'=>'',
                'logo'=>'',
                'banner'=>'',
                'description'=>'',
                'short_description'=>'',
                'coupon_price'=>'',
                'deal_text'=>'',
                'deal_text'=>'',
                'deal_type'=>''
            );
}

?>
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
					'action'=>base_url('deals/manage'),
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
                        <select name="shop_id" class="span6 m-wrap catg">
                        	<option value="0">---Select---</option>
                            <?php
                            foreach ($shop_list as $shop) {
                                ?>
                                <option value="<?php echo $shop->id; ?>" <?php echo ($deal_details->shop_id == $shop->id) ? 'selected': ' '; ?> ><?php echo $shop->shop_name; ?></option>
                                <?php   
                                }
                            ?>
                        </select>
                        <span class="help-inline"></span>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input type="hidden" name="merchant_id" value="<?php echo $merchant;?>">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Brand Name<span class="required">*</span></label>
                    <div class="controls">
                        <?php
                        $attributes = array(
                            'name' => 'brand_name',
                            'id' => 'brand_name',
                            'size' => '32',
                            'class' => 'span6 m-wrap',
                            'value' => $deal_details->brand_name,
                        );
                        echo form_input($attributes);
                        echo form_error('brand_name', '<span class="req">', '</span>');
                        ?>
                        <span class="help-inline"></span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Category</label>
                    <div class="controls">
                        <select name="category_id" class="span6 m-wrap catg">
                        	<option value="0">---Select---</option>
                            <?php
                            foreach ($category_list as $category) {
                                ?>
                                <option value="<?php echo $category->id; ?>" <?php echo ($deal_details->category_id == $category->id) ? 'selected': ' '; ?> ><?php echo $category->category; ?></option>
                                <?php   
                                }
                            ?>
                        </select>
                        <span class="help-inline"></span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Brand Logo</label>
                    <div class="controls">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="<?php echo !empty($deal_details->logo) ? base_url().'images/deals/'.$deal_details->logo: ''; ?>" alt="<?php echo $deal_details->logo;?>">
                                
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                            <div>
                                
                                
                                <span class="btn btn-file"><span class="fileupload-new">Select Image</span>
                                <span class="fileupload-exists">Change</span>
                                <input type="file" class="default" name="logo"/></span>
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
                    <label class="control-label">Deal Banner Image</label>
                    <div class="controls">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="<?php echo !empty($deal_details->banner) ? base_url().'images/deals/'.$deal_details->banner: ''; ?>" alt="<?php echo $deal_details->banner;?>">
                                
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                            <div>
                                
                                
                                <span class="btn btn-file"><span class="fileupload-new">Select Image</span>
                                <span class="fileupload-exists">Change</span>
                                <input type="file" class="default" name="banner"/></span>
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
                    <label class="control-label">Deal Text </label>
                    <div class="controls">
                        <textarea class="span6" name="deal_text" rows="6" data-error-container="#editor2_error"><?php echo !empty($deal_details->deal_text) ? $deal_details->hands_on_video: ''; ?></textarea>
                        <div id="editor2_error"></div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Deal Terms</label>
                    <div class="controls">
                        <textarea class="span6" name="deal_terms" rows="6" data-error-container="#editor2_error"><?php echo !empty($deal_details->deal_terms) ? $deal_details->reviewvideo: ''; ?></textarea>
                        <div id="editor2_error"></div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Coupon Price<span class="required">*</span></label>
                    <div class="controls">
                        <?php
                        $attributes = array(
                            'name' => 'coupon_price',
                            'id' => 'coupon_price',
                            'size' => '32',
                            'class' => 'span6 m-wrap',
                            'value' => $deal_details->coupon_price
                        );
                        echo form_input($attributes);
                        echo form_error('coupon_price', '<span class="req">', '</span>');
                        ?>
                        <span class="help-inline"></span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Description </label>
                    <div class="controls">
                        <textarea class="span6" name="description" rows="6" data-error-container="#editor2_error"><?php echo !empty($deal_details->description) ? $deal_details->description: ''; ?></textarea>
                        <div id="editor2_error"></div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Short Description </label>
                    <div class="controls">
                        <textarea class="span6" name="short_description" rows="6" data-error-container="#editor2_error"><?php echo !empty($deal_details->short_description) ? $deal_details->short_description: ''; ?></textarea>
                        <div id="editor2_error"></div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Deal Type</label>
                    <div class="controls">
                        <?php $options =  array(
                            '1' => 'Normal',
                            '2' => 'Special',
                            '3' => 'Super special'
                        );
                        echo form_dropdown('deal_type', $options, set_value('deal_type'));
                        echo form_error('deal_type', '<span class="req">', '</span>');
                        ?>
                        <span class="help-inline"></span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Upload More Images </label>
                    <div class="controls more_images">
                        <input type="button" class="span3" id="add_images" value="+"/>
                        <div id="editor2_error"></div>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn purple"><?php echo ($deal_details->id) ? 'Update':'Add'; ?></button>
                    <button type="button" class="btn">Cancel</button>     
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
      
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
$(document).ready(function() {
    var count=0;
    $('#add_images').click(function() {
        
        count++;
        $(this).parent('div.more_images').append('<input type="file" name="deal_image'+count+'">');
        
        //alert(cl);
    });
});
</script>
</body>
<!-- END BODY -->
</html>
