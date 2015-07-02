<?php
if(!isset($deal_details)){
   //echo "<pre>";print_r($deal_details); 
    $deal_details = (object) array(
        'id' => '',
        'item_type' => '',
        'product_name' => '',
        'deal_site_url'=>'',
	'coupon_stock' => '',
        'shop_id'=>'',
        'brand_id'=>'',
        'category_id'=>'',
        'description'=>'',
        'short_description'=>'',
        'logo'=>'',
        'banner'=>'',
        'description'=>'',
        'short_description'=>'',
        'coupon_price'=>'',
        'deal_text'=>'',
        'valid_from'=>'',
        'valid_till'=>'',
        'deal_type'=>'',
        'item_type'=>''
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
        <title> Saleswherewhen | Manage Available Deals in Saleswherewhen </title>
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
        Manage Deals <small>Manage Deals</small>
    </h3>
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php site_url('dashboard'); ?>">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <a href="#">Deals</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php site_url('admin/manageDeal'); ?>">Manage Deals</a></li>
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
                 <!--BEGIN FORM-->
                <?php
                $attributes = array(
                    'action'=>base_url('admin/manageDeal'),
                    'method' => 'post',
                    'accept-charset' => 'utf-8',
                    'classl' => 'form-horizontal',
                    'enctype' => 'multipart/form-data'
                );
                echo form_open('', $attributes);
                ?>
                <div class="row-fluid">
                	<div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">Item Type<span class="required">*</span></label>
                            <div class="controls">
                                <select name="item_type" class="span6 m-wrap catg" onchange="return getItemType(this.value);">
                                    <option value="" >---Select---</option>
                                        <option value="1" <?php echo ($deal_details->item_type == 1) ? 'selected': ' '; ?>>Products</option>
                                        <option value="2" <?php echo ($deal_details->item_type == 2) ? 'selected': ' '; ?>>Deals</option>
                                        <option value="3" <?php echo ($deal_details->item_type == 3) ? 'selected': ' '; ?>>Coupons</option>
                                        <!--<option value="4" <?php echo ($deal_details->item_type == 4) ? 'selected': ' '; ?>>Grocery</option>-->
                                        <option value="5" <?php echo ($deal_details->item_type == 5) ? 'selected': ' '; ?>>YardSale</option>
                                        <option value="6" <?php echo ($deal_details->item_type == 6) ? 'selected': ' '; ?>>GarageSale</option>
                                </select>
                                <?php  echo form_error('item_type', '<span class="req">', '</span>');
                                ?>
                                <span class="help-inline"></span>
                            </div>
                        </div>
                    </div>
                    <div class="span6 ">
                <?php 
                //if($deal_details->id && ($deal_details->item_type == 1 ||$deal_details->item_type == 4)){
                ?>
                <div class="control-group prd_name">
                    <label class="control-label"> Item Name<span class="required">*</span></label>
                    <div class="controls">
                        <?php
                        $attributes = array(
                            'name' => 'product_name',
                            'id' => 'product_name',
                            'size' => '32',
                            'class' => 'span6 m-wrap',
                            'value' => $deal_details->product_name,
                        );
                        echo form_input($attributes);
                        echo form_error('product_name', '<span class="req">', '</span>');
                        ?>
                        <span class="help-inline"></span>
                    </div>
                </div>    
                <?php    
                //}else{
                ?>
<!--                <div class="control-group prd_name" style="display:block;">
                    <label class="control-label"> Product Name<span class="required">*</span></label>
                    <div class="controls">
                        <?php
                        $attributes = array(
                            'name' => 'product_name',
                            'id' => 'product_name',
                            'size' => '32',
                            'class' => 'span6 m-wrap',
                            'value' => $deal_details->product_name,
                        );
                        echo form_input($attributes);
                        echo form_error('product_name', '<span class="req">', '</span>');
                        ?>
                        <span class="help-inline"></span>
                    </div>
                </div>-->
                <?php //} ?>
                
                <?php if($deal_details->id && $deal_details->item_type == 2){?>
                 <div class="control-group deal_url">
                    <label class="control-label"> Deal Redirect Site URL<span class="required">*</span></label>
                    <div class="controls">
                        <?php
                        $attributes = array(
                            'name' => 'deal_site_url',
                            'id' => 'deal_site_url',
                            'size' => '32',
                            'class' => 'span6 m-wrap',
                            'value' => $deal_details->deal_site_url,
                        );
                        echo form_input($attributes);
                        echo form_error('deal_site_url', '<span class="req">', '</span>');
                        ?>
                        <span class="help-inline"></span>
                    </div>
                </div>
                <?php }else{ ?>
                <div class="control-group deal_url" style="display:none;">
                    <label class="control-label"> Deal Redirect Site URL<span class="required">*</span></label>
                    <div class="controls">
                        <?php
                        $attributes = array(
                            'name' => 'deal_site_url',
                            'id' => 'deal_site_url',
                            'size' => '32',
                            'class' => 'span6 m-wrap',
                            'value' => $deal_details->deal_site_url,
                        );
                        echo form_input($attributes);
                        echo form_error('deal_site_url', '<span class="req">', '</span>');
                        ?>
                        <span class="help-inline"></span>
                    </div>
                </div>
                <?php } ?>
                
                 <?php if($deal_details->id && $deal_details->item_type == 3){ ?>
                 <div class="coupon_stock">
                    <label class="control-label"> Total No. of Coupons <span class="required">*</span></label>
                    <div class="controls">
                        <?php
                        $attributes = array(
                            'name' => 'coupon_stock',
                            'id' => 'coupon_stock',
                            'size' => '32',
                            'class' => 'span6 m-wrap',
                            'value' => $deal_details->coupon_stock,
                        );
                        echo form_input($attributes);
                        echo form_error('coupon_stock', '<span class="req">', '</span>');
                        ?>
                        <span class="help-inline"></span>
                    </div>
                </div>
                 <?php }else{ ?>
		<div class="coupon_stock" style="display:none;">
                    <label class="control-label"> Total No. of Coupons <span class="required">*</span></label>
                    <div class="controls">
                        <?php
                        $attributes = array(
                            'name' => 'coupon_stock',
                            'id' => 'coupon_stock',
                            'size' => '32',
                            'class' => 'span6 m-wrap',
                            'value' => $deal_details->coupon_stock,
                        );
                        echo form_input($attributes);
                        echo form_error('coupon_stock', '<span class="req">', '</span>');
                        ?>
                        <span class="help-inline"></span>
                    </div>
                </div>
                 <?php } ?>
                 </div>
                </div>
                <div class="row-fluid">
                	<div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">Shop Name<span class="required">*</span></label>
                            <div class="controls">
                                <select name="shop_id" class="span6 m-wrap catg">
                                    <option value="">---Select---</option>
                                    <?php
                                    foreach ($shop_list as $shop) {
                                        ?>
                                        <option value="<?php echo $shop->id; ?>" <?php echo ($deal_details->shop_id == $shop->id) ? 'selected': ' '; ?> ><?php echo $shop->shop_name; ?></option>
                                        <?php   
                                        }
                                    ?>
                                </select>
                             <?php  echo form_error('shop_id', '<span class="req">', '</span>');
                                ?>
                                <span class="help-inline"></span>
                            </div>
                        </div>
                    </div>
                    <div class="span6 ">
                        <div class="control-group">
                            <div class="controls">
                                <input type="hidden" name="merchant_id" value="<?php echo $admin_id;?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                	<div class="span6 ">
                         <div class="control-group">
                            <label class="control-label">Brand Name<span class="required">*</span></label>
                            <div class="controls">
                                <select name="brand_id" class="span6 m-wrap catg">
                                    <option value="">---Select---</option>
                                    <?php
                                    foreach ($brand_list as $brand) {
                                        ?>
                                        <option value="<?php echo $brand->id; ?>" <?php echo ($deal_details->brand_id == $brand->id) ? 'selected': ' '; ?> ><?php echo $brand->name; ?></option>
                                        <?php   
                                        }
                                    ?>
                                </select>
                                 <?php  echo form_error('brand_id', '<span class="req">', '</span>');?>
                                <span class="help-inline"></span>
                            </div>
                        </div>
                    </div>
                    <div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">Category<span class="required">*</span></label>
                            <div class="controls">
                                <!--<select name="category_id" class="span6 m-wrap catg">
                                    <option value="">---Select---</option>
                                    <?php 
                                    foreach ($category_list as $category) {
                                        ?>
                                        <option value="<?php echo $category->id; ?>" <?php echo ($deal_details->category_id == $category->id) ? 'selected': ' '; ?> ><?php echo $category->category; ?></option>
                                        <?php   
                                        }
                                    ?>
                                </select>-->
                                <?php //echo '<pre>'; print_r($parent_category); ?>
                                <select name="category_id" class="span6 m-wrap" id="grocery_category_id">
                                    <option value="0">-- select--</option>
                                    
                                    <?php
                                    foreach ($parent_category as $k => $v) {
                                        if($deal_details->item_type == 4 && $parent_category[$k]['category_type']==2){
                                            
                                        ?>
                                        <option value="<?php echo $parent_category[$k]['id']; ?>" <?php echo ($deal_details->category_id == $parent_category[$k]['id']) ? 'selected' : ' '; ?>><?php echo $parent_category[$k]['category']; ?></option>
                                        <?php
                                        }
                                        else{ ?>
                                            <option value="<?php echo $parent_category[$k]['id']; ?>" <?php echo ($deal_details->category_id == $parent_category[$k]['id']) ? 'selected' : ' '; ?>><?php echo $parent_category[$k]['category']; ?></option>
                                        <?php }
                                        if (isset($parent_category[$k]['child'])) {
                                            foreach ($parent_category[$k]['child'] as $key => $value) {
                                                if($deal_details->item_type == 4 && $parent_category[$k]['child'][$key]['category_type']==2){
                                                ?>
                                                <option value="<?php echo $parent_category[$k]['child'][$key]['id']; ?>" <?php echo ($deal_details->category_id == $parent_category[$k]['child'][$key]['id']) ? 'selected' : ' '; ?>>----<?php echo $parent_category[$k]['child'][$key]['category']; ?></option>
        
                                                <?php
                                                }
                                                else{ ?>
                                                    <option value="<?php echo $parent_category[$k]['child'][$key]['id']; ?>" <?php echo ($deal_details->category_id == $parent_category[$k]['child'][$key]['id']) ? 'selected' : ' '; ?>>----<?php echo $parent_category[$k]['child'][$key]['category']; ?></option>
                                                <?php }
                                                if (isset($parent_category[$k]['child'][$key]['child'])) {
                                                    foreach ($parent_category[$k]['child'][$key]['child'] as $_k => $_v) {
                                                        if($deal_details->item_type == 4 && $parent_category[$k]['child'][$key]['child'][$_k]['category_type']==2){
                                                        ?>
                                                        <option value="<?php echo $parent_category[$k]['child'][$key]['child'][$_k]['id']; ?>" <?php echo ($deal_details->category_id == $parent_category[$k]['child'][$key]['child'][$_k]['id']) ? 'selected' : ' '; ?>>--------<?php echo $parent_category[$k]['child'][$key]['child'][$_k]['category']; ?></option>
                                                        <?php
                                                        }
                                                        else{ ?>
                                                         <option value="<?php echo $parent_category[$k]['child'][$key]['child'][$_k]['id']; ?>" <?php echo ($deal_details->category_id == $parent_category[$k]['child'][$key]['child'][$_k]['id']) ? 'selected' : ' '; ?>>--------<?php echo $parent_category[$k]['child'][$key]['child'][$_k]['category']; ?></option>   
                                                        <?php }
                                                    }
                                                    
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                                <?php  echo form_error('category_id', '<span class="req">', '</span>');?>
                                <span class="help-inline"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                	<div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">Brand Logo<span class="required"></span></label>
                            <div class="controls">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 100px; height: 50px;">
                                        <img src="<?php echo !empty($deal_details->logo) ? base_url().'images/brands/'.$deal_details->logo: ''; ?>" alt="<?php echo $deal_details->logo;?>">
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
                    </div>
                    <div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">Deal Banner Image<span class="required"></span></label>
                            <div class="controls">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                        <img src="<?php echo !empty($deal_details->banner) ? base_url().'images/deals/listing/'.$deal_details->banner: ''; ?>" alt="<?php echo $deal_details->banner;?>" height="150">
                                        <!--<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />-->
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
                    </div>
                </div>
                <div class="row-fluid">
                	<div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">Offer<span class="required">*</span> </label>
                            <div class="controls">
                                <input type="text" class="span6" name="deal_text" rows="4" data-error-container="#editor2_error" value="<?php echo !empty($deal_details->deal_text) ? $deal_details->deal_text: ''; ?>">
                                
                                <div id="editor2_error"></div>
                            </div>
                            <?php echo form_error('deal_text', '<span class="req">', '</span>'); ?>
                                
                            <span class="label label-important"> Note !</span>
                            <span> Enter Offer Text like 30% off</span>
                        </div>
                    </div>
                	<div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">Deal Terms<span class="required"></span></label>
                            <div class="controls">
                                <textarea class="span6" name="deal_terms" rows="4" data-error-container="#editor2_error"><?php echo !empty($deal_details->deal_terms) ? $deal_details->deal_terms: ''; ?></textarea>
                                <div id="editor2_error"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                	<div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">Price<span class="required">*</span></label>
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
                    </div>
                	<div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">Deal Starts From<span class="required">*</span></label>
                            <div class="controls">
                                <?php
                                $attributes = array(
                                    'name' => 'valid_from',
                                    'id' => 'valid_from',
                                    'size' => '32',
                                    'class' => 'span6 m-wrap datepicker',
                                    'value' => $deal_details->valid_from
                                );
                                echo form_input($attributes);
                                echo form_error('valid_from', '<span class="req">', '</span>');
                                ?>
                                <span class="help-inline"></span>
                            </div>
                        </div>
                     </div>
                </div>
                <div class="row-fluid">
                	<div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">Deal Ends On<span class="required">*</span></label>
                            <div class="controls">
                                <?php
                                $attributes = array(
                                    'name' => 'valid_till',
                                    'id' => 'valid_till',
                                    'size' => '32',
                                    'class' => 'span6 m-wrap datepicker',
                                    'value' => $deal_details->valid_till
                                );
                                echo form_input($attributes);
                                echo form_error('valid_till', '<span class="req">', '</span>');
                                ?>
                                <span class="help-inline"></span>
                            </div>
                        </div>
                    </div>
                	<div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">Deal Type<span class="required">*</span></label>
                            <div class="controls">
                                <select name="deal_type" class="span6 m-wrap">
                                    <option value="" >---Select---</option>
                                        <option value="1" <?php echo ($deal_details->deal_type == 1) ? 'selected': ' '; ?>>Normal</option>
                                        <option value="2" <?php echo ($deal_details->deal_type == 2) ? 'selected': ' '; ?>>Special</option>
                                        <option value="3" <?php echo ($deal_details->deal_type == 3) ? 'selected': ' '; ?>>Super special</option>
                                </select>
                                <?php  echo form_error('deal_type', '<span class="req">', '</span>'); ?>
                                <span class="help-inline"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="control-group">
                    <label class="control-label">Short Description <span class="required">*</span></label>
                    <div class="controls">
                        <textarea class="span6" name="short_description" rows="4" data-error-container="#editor2_error"><?php echo !empty($deal_details->short_description) ? $deal_details->short_description: ''; ?></textarea>
                        <div id="editor2_error"></div>
                    </div>
                </div>-->
                <div class="control-group">
                    <label class="control-label">Description<span class="required">*</span> </label>
                    <div class="controls">
                        <textarea class="span12 ckeditor m-wrap" name="description" rows="6" data-error-container="#editor2_error"><?php echo !empty($deal_details->description) ? $deal_details->description: ''; ?></textarea>
                        <div id="editor2_error"></div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Status<span class="required"></span></label>
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
                <div class="control-group">
                    <label class="control-label">Upload More Images <span class="required">*</span></label>
                    <div class="controls more_images">
                        <input type="button" class="span1 btn purple btn_custom" id="add_images" value="+"/>
                        <!--<input type="file" class="default" name="deal_image[]" multiple/></span>-->
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/date.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/data-tables/DT_bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
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
    format: 'yyyy-mm-dd'
    })
</script>
<script>
$(document).ready(function() {
    var count=0;
    $('#add_images').click(function() {
        
        count++;
        $(this).parent('div.more_images').append('<input type="file" name="deal_image'+count+'">');
        
    });
});
function getItemType(itemtype){   
//alert(itemtype);
    if(itemtype == 1 || itemtype == 5 || itemtype == 6){
        var item = 1;
        $.ajax({
            
             url: "<?php echo base_url('admin/ajaxcategoryForGrocery'); ?>",
                            type: "POST",
                            data: {
                                    itemtype: item,                                    
<?php echo $this->security->get_csrf_token_name() . ":'" . $this->security->get_csrf_hash() . "'"; ?>
                            },
                            success: function (data) {                          
                                 
                                    $("#grocery_category_id").html("");
                                    $("#grocery_category_id").append('<option value='+0+'>--Select Category--</option>');
                                    $("#grocery_category_id").append(data);
                                   
                            }
            
        });
        
    }
    if(itemtype == 2){
        $("div.deal_url").show();
        var item = 1;
        $.ajax({
            
             url: "<?php echo base_url('admin/ajaxcategoryForGrocery'); ?>",
                            type: "POST",
                            data: {
                                    itemtype: item,                                    
<?php echo $this->security->get_csrf_token_name() . ":'" . $this->security->get_csrf_hash() . "'"; ?>
                            },
                            success: function (data) {                          
                                 
                                    $("#grocery_category_id").html("");
                                    $("#grocery_category_id").append('<option value='+0+'>--Select Category--</option>');
                                    $("#grocery_category_id").append(data);
                                   
                            }
            
        });
    }else{
        $("div.deal_url").hide();
    }
    if(itemtype == 3){
        $("div.coupon_stock").show();
         var item = 1;
        $.ajax({
            
             url: "<?php echo base_url('admin/ajaxcategoryForGrocery'); ?>",
                            type: "POST",
                            data: {
                                    itemtype: item,                                    
<?php echo $this->security->get_csrf_token_name() . ":'" . $this->security->get_csrf_hash() . "'"; ?>
                            },
                            success: function (data) {                          
                                 
                                    $("#grocery_category_id").html("");
                                    $("#grocery_category_id").append('<option value='+0+'>--Select Category--</option>');
                                    $("#grocery_category_id").append(data);
                                   
                            }
            
        });
        
    }else{
        $("div.coupon_stock").hide();
    }
    if(itemtype == 4){
        
        var item = 2;
        $.ajax({
            
             url: "<?php echo base_url('admin/ajaxcategoryForGrocery'); ?>",
                            type: "POST",
                            data: {
                                    itemtype: item,                                    
<?php echo $this->security->get_csrf_token_name() . ":'" . $this->security->get_csrf_hash() . "'"; ?>
                            },
                            success: function (data) {                          
                                 
                                    $("#grocery_category_id").html("");
                                    $("#grocery_category_id").append('<option value='+0+'>--Select Category--</option>');
                                    $("#grocery_category_id").append(data);
                                   
                            }
            
        });
        
    }
}
            
</script>
</body>
<!-- END BODY -->
</html>
