<?php
$url = $_SERVER['REQUEST_URI'];
?>
<div class="page-container row-fluid">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar nav-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->        
        <ul class="page-sidebar-menu">
            <li>
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler hidden-phone"></div>
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            </li>
            <li>
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <form class="sidebar-search">
                    <div class="input-box">
                        <a href="javascript:;" class="remove"></a>
                        <input type="text" placeholder="Search..." />
                        <input type="button" class="submit" value=" " />
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <li class="start ">
                <a href="<?php echo base_url('dashboard'); ?>" > <!-- target= "_cashier"--> 
                    <i class="icon-home"></i> 
                    <span class="title">Dashboard</span>
                </a>
            </li>
<li class="start ">
                <a href="<?php echo base_url('admin/changePassword'); ?>" > <!-- target= "_cashier"--> 
                    <i class="icon-user"></i> 
                    <span class="title">Change Password</span>
                </a>
            </li>
            
        <?php
			if($role_details->role_permission == 1){
		?>
            <li>
                <a href="javascript:;">
                    <i class="icon-user"></i> 
                    <span class="title">Manage Role </span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li >
                        <a href="<?php echo base_url('role/rolePermission'); ?>">
                            <i class="icon-cogs"></i>
                             Role Permission</a>
                    </li>
                </ul>
            </li>
        <?php
			}
			if($role_details->merchants_list == 1 || $role_details->user_list == 1){
		?>
            <li>
                <a href="javascript:;">
                    <i class="icon-user"></i> 
                    <span class="title">Manage Users </span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
            <?php
				if($role_details->merchants_list == 1){
			?>
                    <li >
                        <a href="<?php echo base_url('dashboard/merchantList'); ?>">
                            <i class="icon-cogs"></i>
                             Merchant List</a>
                    </li>
            <?php
				}
				if($role_details->user_list == 1){
			?>
                    <li>
                        <a href="<?php echo base_url('admin/getUsers'); ?>">
                            <i class="icon-cogs"></i>
                             Users List</a>
                    </li>
            <?php
				}
			?>
                </ul>
            </li>
        <?php
			}
			if($role_details->category_list == 1 || $role_details->category_add == 1){
		?>
            <li>
                <a href="javascript:;">
                    <i class="icon-briefcase"></i> 
                    <span class="title">Manage Category</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
            <?php
				if($role_details->category_list == 1){
			?>   
                    <li >
                        <a href="<?php echo base_url('category/listing'); ?>">
                            <i class="icon-cogs"></i>Category List
						</a>
                    </li>
            <?php
				}
				if($role_details->category_add == 1){
			?>
                    <li >
                        <a href="<?php echo base_url('category/manage'); ?>">
                            <i class="icon-cogs"></i>Add New Category
						</a>
                    </li>
            <?php
				}
			?>
                </ul>
            </li>
        <?php
			}
			if($role_details->brand_list == 1 || $role_details->brand_add == 1){
		?>
	    	<li>
                <a href="javascript:;">
                    <i class="icon-briefcase"></i> 
                    <span class="title">Manage Brands</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
             <?php
				if($role_details->brand_list == 1){
			?>
                    <li >
                        <a href="<?php echo base_url('admin/brandList'); ?>">
                            <i class="icon-cogs"></i>
							Brand List 
						</a>
                    </li>
            <?php
				}
				if($role_details->brand_add == 1){
			?>
		    <li >
                        <a href="<?php echo base_url('admin/manageBrands'); ?>">
                            <i class="icon-cogs"></i>Add Brand</a>
                    </li>
            <?php
				}
			?>
                </ul>
            </li>
       	<?php
		
			}
			if($role_details->shop_list == 1 || $role_details->shop_add == 1){
		?>
	    <li>
                <a href="javascript:;">
                    <i class="icon-briefcase"></i> 
                    <span class="title">Manage Shop</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
         <?php
		 	if($role_details->shop_list == 1){
		?>
                    <li >
                        <a href="<?php echo base_url('admin/shopList'); ?>">
                            <i class="icon-cogs"></i>
                            Shop List
                        </a>
                    </li>
        <?php
			}
			if($role_details->shop_add == 1){
		?>
                    <li >
                        <a href="<?php echo base_url('admin/manageShop'); ?>">
                            <i class="icon-cogs"></i>
                            Add Shop Details
                        </a>
                    </li>
         <?php
			}
         ?>
                </ul>
            </li>
       <?php
			}
			if($role_details->deal_list == 1 || $role_details->deal_post == 1){
		?>
            <li>
                <a href="javascript:;">
                    <i class="icon-briefcase"></i> 
                    <span class="title">Manage Deals</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
            <?php
				 if($role_details->deal_list == 1){
			?>   
                    <li >
                        <a href="<?php echo base_url('admin/dealListing'); ?>">
                            <i class="icon-cogs"></i>
							Deal List 
						</a>
                    </li>
            <?php
				 }
				 if($role_details->deal_post == 1){
			?>
		    <li >
                        <a href="<?php echo base_url('admin/manageDeal'); ?>">
                            <i class="icon-cogs"></i>Post Deal</a>
                    </li>
            <?php
				 }
			?>
				 
                </ul>
            </li>
            
        <?php
			}
		?>
             <!--<li>
                <a href="javascript:;">
                    <i class="icon-briefcase"></i> 
                    <span class="title">Manage Grocery</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">

                    <li >
                        <a href="<?php echo base_url('admin/addGrocery'); ?>">
                            <i class="icon-cogs"></i>
                            Add Grocery Details 
                        </a>
                    </li>
                    
                </ul>
            </li>-->
        <?php
			if($role_details->image_list == 1 || $role_details->manage_slider == 1){
		?> 
            <li>
                <a href="javascript:;">
                    <i class="icon-briefcase"></i> 
                    <span class="title">Manage Images</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
           <?php
				if($role_details->image_list == 1){
			?> 
                    <li >
                        <a href="<?php echo base_url('admin/imageList'); ?>">
                            <i class="icon-cogs"></i>
                            Image List
                        </a>
                    </li>
            <?php
				}
				if($role_details->manage_slider == 1){
			?>
                    <li >
                        <a href="<?php echo base_url('admin/manageImages'); ?>">
                            <i class="icon-cogs"></i>
                            Manage  Slider Image
                        </a>
                    </li>
             <?php
				}
			?>
                </ul>
            </li>
        <?php
			}
			if($role_details->review_list == 1){
		?>
			<li>
                <a href="javascript:;">
                    <i class="icon-briefcase"></i> 
                    <span class="title">Manage Review</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li >
                        <a href="<?php echo base_url('admin/reviewListing'); ?>">
                            <i class="icon-cogs"></i>
                            Review List
                        </a>
                    </li>
                
                </ul>
            </li>
       <?php
			}
			if($role_details->advertisement_add == 1 || $role_details->advertisement_list == 1){
		?>
            <li>
                <a href="javascript:;">
                    <i class="icon-briefcase"></i> 
                    <span class="title">Manage Advertisements</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
            <?php
				if($role_details->advertisement_add == 1){
			?>
                    <li >
                        <a href="<?php echo base_url('admin/manageAdvertisements'); ?>">
                            <i class="icon-cogs"></i>
                            Add Advertisements
                        </a>
                    </li>
            <?php
				}
				if($role_details->advertisement_list == 1){
			?>
                    <li >
                        <a href="<?php echo base_url('admin/listAdvertisemets'); ?>">
                            <i class="icon-cogs"></i>
                           View All Advertisements
                        </a>
                    </li>
            <?php
				}
			?>
                </ul>
            </li>
       <?php
			}
			if($role_details->page_add == 1 || $role_details->page_list == 1){
		?>
            <li>
                <a href="javascript:;">
                    <i class="icon-briefcase"></i> 
                    <span class="title">Manage Pages</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
            <?php
				if($role_details->page_add == 1){
			?>
                    <li >
                        <a href="<?php echo base_url('admin/managePage'); ?>">
                            <i class="icon-cogs"></i>
                            Add New Page
                        </a>
                    </li>
            <?php
				}
				if($role_details->page_list == 1){
			?>
                    <li >
                        <a href="<?php echo base_url('admin/pageList'); ?>">
                            <i class="icon-cogs"></i>
                            View All Pages
                        </a>
                    </li>
            <?php
				}
			?>
                </ul>
            </li>
        <?php
			}
		?>
            
               <?php if($role_details->subscription_mail == 1 ){ ?>
			<li>
                <a href="javascript:;">
                    <i class="icon-briefcase"></i> 
                    <span class="title">Manage Alert Mail</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
            <?php
				if($role_details->subscription_mail == 1){
			?>
                    <li >
                        <a href="<?php echo base_url('admin/manageAlert'); ?>">
                            <i class="icon-cogs"></i>
                           Send Alert Mail
                        </a>
                    </li>
                                <?php } ?>
                </ul>
            </li>
			
                        <?php } ?>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN PAGE -->
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div id="portlet-config" class="modal hide">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button"></button>
                <h3>portlet Settings</h3>
            </div>
            <div class="modal-body">
                <p>Here will be a configuration form</p>
            </div>
        </div>
        <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <!-- BEGIN PAGE CONTAINER-->        
        <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
                <div class="span12">
