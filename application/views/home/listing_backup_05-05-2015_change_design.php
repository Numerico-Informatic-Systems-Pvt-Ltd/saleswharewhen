<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Saleswherewhen :: Home</title>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>css/bootstrap-theme.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>css/bootstrap.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>css/style.css" />        
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>fonts/stylesheet.css" />
        <link rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>css/hint.css">
        <script type="text/javascript" src="<?php echo base_url() . '/assets/frontend/'; ?>js/jquery.min.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
        <script type="text/javascript" src="<?php echo base_url() . '/assets/frontend/'; ?>js/banner/jquery.cycle.all.js"></script>
        <script type="text/javascript" src="<?php echo base_url() . '/assets/frontend/'; ?>js/jquery.morphbutton.js"></script>
        <script type="text/javascript" src="<?php echo base_url() . '/assets/frontend/'; ?>js/bootstrap.js"></script>
            <script type="text/javascript"  src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
            <script type="text/javascript">
                
                
                function sendSubscription(item_url,image_url,item_id){
                   $("#item_id").val(item_id);
                   $("#image_url").val(image_url);
                   $("#item_url").val(item_url); 

                    }
                
                
                $(document).ready(function () {                 
                    
                    $('#fadeOne').cycle({
                        fx: 'fade',
                        speed: 5000,
                        timeout: 2000
                    });
                    $('#fadeTwo').cycle({
                        fx: 'fade',
                        speed: 8000,
                        timeout: 6000
                    });
                    $('#fadeThree').cycle({
                        fx: 'fade',
                        speed: 5000,
                        timeout: 2000
                    });
                    $('#fadeFour').cycle({
                        fx: 'fade',
                        speed: 4000,
                        timeout: 2000
                    });
                    $('#fadeFive').cycle({
                        fx: 'fade',
                        speed: 5000,
                        timeout: 2000
                    });
                });
                
               function selectCountry(country){
                   var cookie_city_val = $.cookie("city");
                   //alert(cookie_city_val);
                   $.ajax({
                    url: "<?php echo base_url('home/ajaxgetcityofCountry'); ?>",
                            type: "POST",
                            data: {
                            country: country,
                <?php echo $this->security->get_csrf_token_name() . ":'" . $this->security->get_csrf_hash() . "'"; ?>
                            },
                            success:function(data) {
                              $("#location").html(" ");  
                              $("#location").append('<option value='+0+'>--SELECT--</option>');
                              $.each(JSON.parse(data), function(idx, obj) { 
                                            if(cookie_city_val == obj.city_id){
                                                $("#location").append('<option value='+obj.city_id+' selected>'+obj.city_name+'</option>');
                                            }
                                            else{
                                               $("#location").append('<option value='+obj.city_id+'>'+obj.city_name+'</option>');
                                            }
                                            
                                    });                            
                            
                            
                            }
                    });
                    return false;
                    
               }
                

		      $(document).ready(function () {     
                 
                    var user_id = $("#uuu_id").val();
                    if(user_id != ""){
                    bootbox.confirm('Please Check Your Mail to Confirm Registration...',function(flag){
                        
                        if(flag === true){
			destroy();
			
                        }
                    });
                    
                        }
                    });
	function destroy(){
		$.ajax({
		      "url":"<?php echo base_url('home/destroryUserregistrerSession'); ?>",
		      "success":function() {
			 //alert("i logged out");
		      }
		   });

		}
            </script>
            


    </head>
<?php $registerUser = $this->session->userdata('registerUser'); ?>
    <input type="hidden" name="uuu_id" value="<?php if(!empty($registerUser)){ echo $registerUser['user_id']; } ?>" id="uuu_id"/>
    <body>

        <div class="container-fluid">
            <div class="container less_pad">
                <?php $this->load->view('front_include/header.php'); ?>
                <div class="col-lg-12">
                    <div class="big_banner" id="fadeOne">
                        <?php foreach($banner_images['bigbanner'] as $bigbanner):?>
                        <img src="<?php echo base_url() . 'images/admin/'.$bigbanner->image_name; ?>" alt="Banner" title="" class="img-responsive" width="100%" link="<?php if(!empty($bigbanner->image_url)){ echo $bigbanner->image_url;  }else{ echo '#'; }?>"/>         
                        <?php endforeach; ?>
                    </div>
                    <div class="small_banner">
		    <?php 
                        $topImages = count($banner_images['small_top_banner']);
                        $topLeft = floor($topImages/2);
                        $topRight = $topImages - $topLeft;
                     ?>
                        <div class="lt_banner_top" id="fadeTwo">
                            <?php 
                            $i=0;
                            foreach($banner_images['small_top_banner'] as $small_top_banner):
                                $i++;
                                if($i > $topLeft){
                                    break;
                                }else{
                            ?>
                            <img src="<?php echo base_url() . 'images/admin/'.$small_top_banner->image_name; ?>" alt="Banner" class="img-responsive" width="100%" link="<?php if(!empty($small_top_banner->image_url)){ echo $small_top_banner->image_url;  }else{ echo '#'; }?>" />
                            <?php } endforeach; ?>
                        </div>
                        <div class="rt_banner_top" id="fadeThree">
                            <?php 
                            $j=0;
                            foreach($banner_images['small_top_banner'] as $small_top_banner):
                                $j++;
                                if($j > $topLeft){
                            ?>
                            <img src="<?php echo base_url() . 'images/admin/'.$small_top_banner->image_name; ?>" alt="Banner" class="img-responsive" width="100%" link="<?php if(!empty($small_top_banner->image_url)){ echo $small_top_banner->image_url;  }else{ echo '#'; }?>" />
                            <?php } endforeach; ?>
                        </div>
			<?php 
                        $bottomImages = count($banner_images['small_bottom_banner']);
                        $left = floor($bottomImages/2);
                        $right = $bottomImages - $left;
                        ?>
                        <div class="lt_banner_bottom" id="fadeFour" style="margin-top: 50.4%;">
                            <?php 
                            $l=0;
                            foreach($banner_images['small_bottom_banner'] as $small_bottom_banner):
                                $l++;
                                if($l > $left){
                                    break;
                                }else{
                            ?>
                            <img src="<?php echo base_url() . 'images/admin/'.$small_bottom_banner->image_name; ?>" alt="Banner" class="img-responsive" width="100%" link="<?php if(!empty($small_bottom_banner->image_url)){ echo $small_bottom_banner->image_url;  }else{ echo '#'; }?>"/>
                            <?php } endforeach; ?>
                        </div>
                        <div class="rt_banner_bottom" id="fadeFive" style="margin-top: 50.4%;">
                            <?php 
                            $c=0;
                            foreach($banner_images['small_bottom_banner'] as $small_bottom_banner):
                                $c++;
                                if($c > $left){
                            ?>
                            <img src="<?php echo base_url() . 'images/admin/'.$small_bottom_banner->image_name; ?>" alt="Banner" class="img-responsive" width="100%" link="<?php if(!empty($small_bottom_banner->image_url)){ echo $small_bottom_banner->image_url;  }else{ echo '#'; }?>"/>
                            <?php } endforeach; ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="clearfix"></div>
                </div>

                <div class="col-lg-12">
                    <div style="background:url(<?php echo base_url() . 'assets/frontend/images/search_bg.png' ?>) no-repeat scroll center center / cover  rgba(0, 0, 0, 0);" class="search_wrap">
                        <div class="col-lg-3 less_pad">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label search_lable">Country:</label>
                                    <div class="col-sm-9">
                                        <div class="search_select">
                                            <select id="country" name="country" onchange="return selectCountry(this.value);">
						<option value="0">--SELECT--</option>                                                 
						<?php foreach($country_list as $country): ?>
                                                        <option value="<?php echo $country->country; ?>" <?php if($cookie_details['country_value'] == $country->country){ echo 'selected';}?>><?php echo $country->country ; ?></option>
						<?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="search_radio">
                                            <input type="checkbox" value="" name="country_remember" id="country_remember" <?php if(!empty($cookie_details['country_value'])){ echo 'checked' ;}?>/>
                                            <a href="#" class="mytooltip">remember<span class="classic">Remember</span></a> 
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label search_lable">City:</label>
                                    <div class="col-sm-9">
                                        <div class="search_select">
                                            <select id="location" name="location">
                                                <?php if(empty($cookie_details['country_value']) || empty($cookie_details['city_value'])){ ?>
                                                    <option value="0">--SELECT--</option>
                                                <?php } ?>
                                               
                                              <?php
                                                if(!empty($cookie_details['city_value'])){
                                                    echo '<option value="'.$cookie_details['city_value'].'">'.$city_name->city_name.'</option>';
                                                }
                                                if(!empty($cookie_details['city_value']) &&  !empty($cookie_details['country_value']))
                                                    {
                                                    foreach ($city_list as $city){ ?>
                                                       <option value="<?php echo $city->city_id;?>" <?php if($city->city_id==$cookie_details['city_value']){ echo 'selected';}?> ><?php echo $city->city_name; ?></option>; 
                                                    <?php }
                                                }
                                                
                                                ?>
                                                
                                            </select>
                                          
                                        </div>
                                        <div class="search_radio">
                                            <input type="checkbox" value="" name="city_remember" id="city_remember" <?php if(!empty($cookie_details['city_value'])){ echo 'checked' ;}?>/>
                                            <a href="#" class="mytooltip">remember<span class="classic">Remember</span></a> 
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label search_lable">Retailer:</label>
                                    <div class="col-sm-9">
                                        <div class="search_select">
                                         <select id="retailer_id" name="brand">
						<option value=" ">--SELECT--</option>
                                                <option value="0">All</option>                                                
						<?php foreach($shop_list as $shop): ?>
                                                        <option value="<?php echo $shop->id; ?>" <?php if($cookie_details['retailer_value']==$shop->id){ echo 'selected'; }?>><?php echo $shop->shop_name; ?></option>
						<?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="search_radio"><input type="checkbox" value="" name="retailer_remember" id="retailer_remember" <?php if(!empty($cookie_details['retailer_value'])){ echo 'checked' ;}?>/>                                            
                                            <a href="#" class="mytooltip">remember<span class="classic">Remember</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label search_lable">Look For:</label>
                                    <div class="col-sm-9">
                                        <div class="search_select">
                                            <select id="category" name="category">
						<option value=" ">--SELECT--</option>
                                                <option value="0">All</option>
						<option value="3">COUPONS</option>
                                                <option value="2">DEALS</option>
						<option value="5">GARAGESALES</option>                                                
                                                <option value="1">SALES</option>                                         
                                                <option value="6">YARDSALES</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--Previous Search Part-->
                      <!-- <div class="col-lg-9 rt_pad">
                            <form class="form-inline search_input">
                                <div class="">
                                    <input type="text" class="form-control" value="" onkeyup="return Suggestion(this.value)" id="search_text" placeholder="Search for your favourite Merchant, Product or Category" />

                                        <button type="button" onclick="return home_search();" class="btn_go pull-right">Go</button>
                                </div>

                            </form>
			    <div id="suggetion_box" style='display:none;'>
                                
                            </div>
                        </div>-->
                      <!--Previous Search Part End-->
                        <div class="col-lg-9 rt_pad">
                            <form class="form-inline search_input">
                                <div class="">
                                    <input type="text" class="form-control" value="" onkeyup="return Suggestion(this.value)" id="search_text" placeholder="Search for your favourite Merchant, Product or Category" />

                                    <button type="button" id="home_page_search" autocomplete="off" class="btn_go pull-right">Go</button>
                                </div>

                            </form>
			    <div id="suggetion_box" style='display:none;'>
                                
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="body_top_wrap cd-top" id="top">
                        <div class="col-lg-3 less_pad">
                            <h1>Today’s Hot <span>Deals</span></h1>
                            <?php //print_r($cookie_details['retailer_value']);print_r($cookie_details['country_value'] );print_r($cookie_details['city_value']);?>
                        </div>
                        <div class="col-lg-7 rt_pad">
                            <nav class="navbar navbar-default">
                                <div class="container-fluid less_pad">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>

                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse less_pad" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav">
                                            <?php
					    if(!empty($main_category)):
                                            $c = 0;
                                            foreach ($main_category as $category): $c++;
                                                if ($c > 4) {
                                                    break;
                                                }
                                                ?>
                                                <li><a href="<?php echo base_url().'home/listing/'.$category->id;?>"><?php echo $category->category; ?> </a></li>
                                            <?php endforeach; 
						endif;
					    ?>
                                            <li><a href="<?php echo base_url('grocery'); ?>" >Grocery Shopping</a></li>
                                            <li><a href="<?php echo base_url('home/onlineCoupons'); ?>" class="last">Online Coupons</a></li>
                                        </ul>
                                    </div><!-- /.navbar-collapse -->
                                </div><!-- /.container-fluid -->
                            </nav>
                        </div>
                        <div class="col-lg-2 less_pad">
                            <div class="category_select">
                                <select id="other_category">
                                    <option value="">Other Categories</option>
                                    <?php
                                    if(!empty($main_category)){
                                    $c = 0;
                                    foreach ($main_category as $category):
                                        $c++;
                                        if ($c > 5):
                                            ?>
                                            <option value="<?php echo $category->id; ?>"><?php echo $category->category; ?> </option>
                                            <?php
                                        endif;
                                    endforeach;
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="body_product_wrap" id="product_list">
                        <div class="col-lg-12 less_pad"><!-- first_row-->
                            <?php if(!empty($special_deals)): ?>
                            <div class="first_row_wrap">
                                <?php
                                //echo '<pre>';
                                //print_r($special_deals);die;
                                $s = 0;
                                foreach ($special_deals as $special_deal):
                                    $s++;
                                 if($s > 2){
                                        break;
                                    }
                                    if ($s == 1) {
                                        $class = 'left';
                                    } else {
                                        $class = 'right';
                                    }
                                    ?>

                                    <div class="col-lg-6 less_pad">
                                        <div class="<?php echo $class; ?>">
                                            
                                                <div class="bg grid effect-2" id="grid">
                                                    <a href="<?php echo base_url('home/productDetails') . '/' . $special_deal->id; ?>">
                                                    <img src="<?php echo base_url() . 'images/deals/special/' . $special_deal->banner; ?>" alt="Product" class="img-responsive" width="100%" />
                                                    </a>
                                                </div>
                                                
                                                    <?php
                                                    if (!empty($special_deal->deal_text)) {
                                                        ?>
                                                    <div class="content">
                                                        <?php
                                                        $deal_text = explode(',', $special_deal->deal_text);
                                                        echo $deal_text[0];
                                                        ?>
                                                        <p><?php
                                                            if (!empty($deal_text[1])) {
                                                                echo $deal_text[1];
                                                            }
                                                            ?></p>
                                                    </div>
                                                    <?php } ?> 
                                                <?php if(!empty($special_deal->brand_logo)) { ?>
                                            <a href="<?php echo base_url().'home/dealsByRetailer/'.$special_deal->brandId;?>">
                                                <div class="logo"><img src="<?php echo base_url() . 'images/brands/' . $special_deal->brand_logo; ?>" alt="Company Logo" class="img-responsive" /></div>
                                            </a>
                                            <?php } ?>
                                           
                                            <?php $actual_link = base_url()."home/productDetails/".$special_deal->id; ?>
                                            <div class="social">
                                                
                                                <a onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600,left=350,top=200');return false;" href="http://www.facebook.com/share.php?u=<?php echo $actual_link;?>" target="_blank" class="newtooltip">
                                                    <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/facebook.png" alt="Facebook" class="img-responsive" />
                                                     <span> 
                                                            <img class="callout" src="<?php echo base_url('images/icons/callout_black.gif');?>" /> 

                                                            Share this and get 1 SWW points from  <?php echo $special_deal->shop_name?>
                                                        </span>
                                                </a>
                                                <a  href="http://twitter.com/intent/tweet?text=<?=urlencode('Saleswherewhen :: Online coupons, Deals');?>&url=<?php echo $actual_link;?>" target="_blank" rel="nofollow" style="background-position:-144px -16px" class="option1_16 newtooltip_tweet">
                                                    <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/twitter.png" alt="Twitter" class="img-responsive" />
                                                        <span> 
                                                        <img class="callout_tweet" src="<?php echo base_url('images/icons/callout_black.gif');?>" /> 

                                                            Share this and get 1 SWW points from  <?php echo $special_deal->shop_name?>
                                                        </span>
                                                </a>
                                               <?php $image_link =  base_url() . 'images/deals/listing/' . $special_deal->banner;?>
                                                <a  href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" onclick="return sendSubscription('<?php echo $actual_link; ?>','<?php echo $image_link; ?>','<?php echo $special_deal->id; ?>');" class="newtooltip_msg">
                                                	<img src="<?php echo base_url() . '/assets/frontend/'; ?>images/message.png" alt="" class="img-responsive" />
                                                        <span> 
                                                        <img class="callout_msg" src="<?php echo base_url('images/icons/callout_black.gif');?>" /> 

                                                            Share this and get 1 SWW points from  <?php echo $special_deal->shop_name?>
                                                        </span>
                                                </a>                                               
                                               
                                                
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                      <div class="modal-dialog">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="exampleModalLabel">SHARE AND EARN</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                          	<p>Please share this deal with a friend/acquaintance or family member and earn a 1 SWW point. Enter their email address below and we'll send them this deal. </p>
                                                                <form action="<?php echo base_url('home/email_notifications'); ?>" method="post">
                                                                    <input type="hidden" name="item_url" id="item_url" value=""/>
                                                                    <input type="hidden" name="image_url" id="image_url" value=""/>
                                                                    <input type="hidden" name="item_id" id="item_id" value=""/>
                                                                    <input type="hidden" name="current_url" id="current_url" value="<?php echo current_url();?>"/>
                                                              <div class="form-group">
                                                                  <input type="email" class="popup_input" id="emailid" required name="emailid" placeholder="Enter your friend's email address"/>
                                                              </div>
                                                                    <input type="submit" class="popup_btn"  id="subscribe_product" value="Submit"/>
                                                            </form>
                                                          </div>
                                                          
                                                        </div>
                                                      </div>
                                                </div>
                                                
                                                
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <div class="clearfix"></div>
                            </div>
                            <?php endif; ?>
                        </div><!-- end of first_row-->




                        <div class="col-lg-12 less_pad">
                            <?php if(!empty($deals[3])):?>
                            <div class="second_row_wrap">

                                <?php
                                $coupon_deal_count = 1;
                                foreach ($deals[3] as $coupon_deal_index => $coupon_deal) {
                                    if ($coupon_deal_index == 8) {
                                        break;
                                    }
                                    if ($coupon_deal_index == 4) {
                                        echo '<div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 less_pad">
                                    <div class="second_row_wrap">';
                                    }
                                    if ($coupon_deal_index % 2 == 0) {
                                        if ($coupon_deal_count % 2 == 0) {
                                            $coupon_deal_count++;
                                            echo '<div class="col-lg-6 less_pad">
                                            <div class="right">';
                                        } else {
                                            $coupon_deal_count++;
                                            echo '<div class="col-lg-6 less_pad">
                                            <div class="left">';
                                        }
                                    }
                                    ?>
                                    <div class="col-lg-6 less_pad">
                                        <a href="#">
                                    <?php
                                        if($coupon_deal_index%2 == 0)
                                            echo '<div class="rt_gap">';
                                        else
                                            echo '<div class="lt_gap">';
                                    ?>
                                                <div class="bg">
                                                    
                                                    <a href="<?php echo base_url('home/productDetails') . '/' . $coupon_deal->id; ?>">
                                                           
                                                        <img width="100%" class="img-responsive" alt="Product" src="<?php echo base_url() . 'images/deals/products/' . $coupon_deal->banner; ?>">
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <?php echo $coupon_deal->deal_text; ?>
                                                </div>
                                            <a href="<?php echo base_url().'home/dealsByRetailer/'.$coupon_deal->brandId;?>"><div class="logo"><img class="img-responsive" alt="<?php echo $coupon_deal->brand_logo; ?>" src="<?php echo base_url() . 'images/brands/' . $coupon_deal->brand_logo; ?>"></div></a>
                                                <div class="social">
                                                <?php $actual_link = base_url()."home/productDetails/".$coupon_deal->id; ?>
                                                    
                                                    <a onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600,left=350,top=200');return false;" href="http://www.facebook.com/share.php?u=<?php echo $actual_link;?>" target="_blank" class="newtooltip">
                                                        <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/facebook.png" alt="Facebook" class="img-responsive" />
                                                    <span> 
                                                        <img class="callout" src="<?php echo base_url('images/icons/callout_black.gif');?>" />
                                                            Share this and get 1 SWW points from  <?php echo $coupon_deal->shop_name?>
                                                    </span>
                                                    
                                                    </a>
                                                    
                                                    <a  href="http://twitter.com/intent/tweet?text=<?=urlencode('Saleswherewhen :: Online coupons, Deals');?>&url=<?php echo $actual_link;?>" target="_blank" rel="nofollow" style="background-position:-144px -16px" class="option1_16 newtooltip_tweet">
                                                    <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/twitter.png" alt="Twitter" class="img-responsive" />
                                                    <span> 
                                                        <img class="callout_tweet" src="<?php echo base_url('images/icons/callout_black.gif');?>" />
                                                            Share this and get 1 SWW points from  <?php echo $coupon_deal->shop_name?>
                                                    </span>
                                                    </a>
                                                 <?php $image_link =  base_url() . 'images/deals/' . $coupon_deal->banner;?>
                                                    <a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" onclick="return sendSubscription('<?php echo $actual_link; ?>','<?php echo $image_link; ?>','<?php echo $coupon_deal->id; ?>');" class="newtooltip_msg">
                                                	<img src="<?php echo base_url() . '/assets/frontend/'; ?>images/message.png" alt="Message" class="img-responsive" />
                                                
                                                <span> 
                                                        <img class="callout_msg" src="<?php echo base_url('images/icons/callout_black.gif');?>" />
                                                            Share this and get 1 SWW points from  <?php echo $coupon_deal->shop_name?>
                                                </span>
                                                </a>  
                                                    
                                                    
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div> 
                                    <?php
                                    if ($coupon_deal_index % 2 != 0) {
                                        echo '<div class="clearfix"></div>
                                    </div>
                                </div>';
                                    }
                                }
                                ?>
                                <div class="clearfix"></div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-12 third_row_wrap">
                            <?php if(!empty($deals[1])): ?>
                            <div class="col-lg-4 less_pad">
                                <!--<a href="<?php echo base_url('home/productDetails') . '/' . $deals[1][0]->id; ?>">-->
                                    <div class="left">
                                        <div class="bg"><img width="100%" class="img-responsive" alt="Product" src="<?php echo base_url() . 'images/deals/products/' . $deals[1][0]->banner; ?>"></div>
                                        <div class="content">
                                            <!--@ -->
                                            <p><?php echo $deals[1][0]->deal_text; ?></p>
                                        </div>
                                        <a href="<?php echo base_url().'home/dealsByRetailer/'.$deals[1][0]->brandId;?>"><div class="logo"><img src="<?php echo base_url() . 'images/brands/' . $deals[1][0]->brand_logo; ?>" alt="<?php echo $deals[1][0]->brand_logo; ?>" class="img-responsive" /></div></a>
                                        <div class="clearfix"></div>
                                    </div>
                                <!--</a>-->
                                <div class="btn_buy"><a href="<?php echo base_url();?>home/productDetails/<?php echo $deals[1][0]->id; ?>">View Details</a></div>
                                <div class="social">
                                <?php $actual_link = base_url()."home/productDetails/".$deals[1][0]->id; ?>
                                   
                                    <a onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600,left=350,top=200');return false;" href="http://www.facebook.com/share.php?u=<?php echo $actual_link;?>" target="_blank" class="newtooltip">
                                        
                                        <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/facebook.png" alt="Facebook" class="img-responsive" />
                                        <span> 
                                        <img class="callout" src="<?php echo base_url('images/icons/callout_black.gif');?>" />
                                            Share this and get 1 SWW points from  <?php echo $deals[1][0]->shop_name?>
                                        </span>
                                    
                                    </a>
                                    <a href="http://twitter.com/intent/tweet?text=<?=urlencode('Saleswherewhen :: Online coupons, Deals');?>&url=<?php echo $actual_link;?>" target="_blank" rel="nofollow" style="background-position:-144px -16px" class="option1_16 newtooltip_tweet">
                                        <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/twitter.png" alt="Twitter" class="img-responsive" />
                                    
                                    <span> 
                                        <img class="callout_tweet" src="<?php echo base_url('images/icons/callout_black.gif');?>" />
                                            Share this and get 1 SWW points from  <?php echo $deals[1][0]->shop_name?>
                                        </span>
                                    </a>
                                   <?php $image_link =  base_url() . 'images/deals/' . $deals[1][0]->banner;?>
                                    <a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" onclick="return sendSubscription('<?php echo $actual_link; ?>','<?php echo $image_link; ?>','<?php echo $deals[1][0]->id; ?>');" class="newtooltip_msg">
                                            <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/message.png" alt="Message" class="img-responsive" />
                                    
                                     <span> 
                                        <img class="callout_msg" src="<?php echo base_url('images/icons/callout_black.gif');?>" />
                                            Share this and get 1 SWW points from  <?php echo $deals[1][0]->shop_name?>
                                        </span>
                                    </a> 
                                    
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-lg-4 less_pad">
                                <div class="third_mid_add">
                                    <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/third_mid_add.jpg" alt="Add" class="img-responsive" />
                                </div>
                            </div>
                            <div class="col-lg-4 less_pad">

                                <div class="right">
					<!--<a href="<?php echo base_url('home/productDetails') . '/' . $deals[1][1]->id; ?>">-->
                                        <div class="bg"><img src="<?php echo base_url() . 'images/deals/products/' . $deals[1][1]->banner; ?>" alt="Product" class="img-responsive" width="100%" /></div>
                                        <div class="content">
                                            <!-- Unlimited -->
                                            <p><?php echo $deals[1][1]->deal_text; ?></p>
                                        </div>
                                        <a href="<?php echo base_url().'home/dealsByRetailer/'.$deals[1][1]->brandId;?>">
                                        <div class="logo"><img src="<?php echo base_url() . 'images/brands/' . $deals[1][1]->brand_logo; ?>" alt="<?php echo $deals[1][1]->brand_logo; ?>" class="img-responsive" /></div>
                                        </a>
                                        <div class="clearfix"></div>
					<!--</a>-->
                                </div>

                                <div class="btn_buy"><a href="<?php echo base_url();?>home/productDetails/<?php echo $deals[1][1]->id; ?>">View Details</a></div>
                                <div class="social">
                                 <?php $actual_link = base_url()."home/productDetails/".$deals[1][1]->id; ?>
                                    <a onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600,left=350,top=200');return false;" href="http://www.facebook.com/share.php?u=<?php echo $actual_link;?>" target="_blank" class="newtooltip">
                                        
                                        <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/facebook.png" alt="Facebook" class="img-responsive" />
                                    <span> 
                                        <img class="callout" src="<?php echo base_url('images/icons/callout_black.gif');?>" />
                                            Share this and get 1 SWW points from  <?php echo $deals[1][1]->shop_name?>
                                        </span>
                                    
                                    </a>
                                    
                                    <a href="http://twitter.com/intent/tweet?text=<?=urlencode('Saleswherewhen :: Online coupons, Deals');?>&url=<?php echo $actual_link;?>" target="_blank" rel="nofollow" style="background-position:-144px -16px" class="option1_16 newtooltip_tweet" title="Twitter">
                                                    <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/twitter.png" alt="Twitter" class="img-responsive" />
                                    
                                    <span> 
                                        <img class="callout_tweet" src="<?php echo base_url('images/icons/callout_black.gif');?>" />
                                            Share this and get 1 SWW points from  <?php echo $deals[1][1]->shop_name?>
                                        </span>
                                    </a>
                                    <?php $image_link =  base_url() . 'images/deals/' . $deals[1][1]->banner;?>
                                    <a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" onclick="return sendSubscription('<?php echo $actual_link; ?>','<?php echo $image_link; ?>','<?php echo $deals[1][1]->id; ?>');" class="newtooltip_msg">
                                            <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/message.png" alt="Message" class="img-responsive" />
                                    
                                    <span> 
                                        <img class="callout_msg" src="<?php echo base_url('images/icons/callout_black.gif');?>" />
                                            Share this and get 1 SWW points from  <?php echo $deals[1][1]->shop_name?>
                                        </span>
                                    </a> 
                                    
                                    
                                    
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                            <?php endif; ?>
                        </div>


                        <!-- end of 3rd row -->
                        <!-- end of 3rd row -->
                        <!-- start of 4th row -->
                        <!-- start of 4th row -->
                        <!-- start of 4th row -->

                        <div class="col-lg-12 less_pad">
                            <?php if(!empty($deals[1])): ?>
                            <div class="fourth_row_wrap">
                <?php
                    foreach($deals[1] as $product_index => $product){
                        if($product_index == 6){
                            break;
                        }
                        if($product_index>1){
                            if($product_index == 2){
                                echo '<div class="col-lg-6 less_pad">
                                    <div class="left">';
                            }else if($product_index == 4){
                                echo '<div class="col-lg-6 less_pad">
                                    <div class="right">';
                            }
                ?>
                                <div class="col-lg-6 less_pad resp_bottom">
                                    <!--<a href="<?php echo base_url();?>home/productDetails/<?php echo $product->id; ?>">-->
                <?php
                                    if($product_index%2 == 0)
                                        echo '<div class="rt_gap">';
                                    else
                                        echo '<div class="lt_gap">';
                ?>
                                            <div class="bg"><img src="<?php echo base_url() . 'images/deals/products/' . $product->banner; ?>" alt="Product" class="img-responsive" width="100%" /></div>
                                            <div class="content">
                                                <?php echo $product->deal_text; ?>
                                            </div>
                                            <a href="<?php echo base_url().'home/dealsByRetailer/'.$product->brandId;?>">
                                            <div class="logo"><img src="<?php echo base_url() . 'images/brands/' . $product->brand_logo; ?>" alt="<?php echo $product->product_name; ?>" class="img-responsive" /></div>
                                            </a>
                                            <div class="clearfix"></div>
                                        </div>
                                   <!-- </a>-->
                                    <div class="btn_buy"><a href="<?php echo base_url();?>home/productDetails/<?php echo $product->id; ?>">View Details</a></div>
                                    <div class="social">
                                     <?php $actual_link = base_url()."home/productDetails/".$product->id; ?>
                                        <a onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600,left=350,top=200');return false;" href="http://www.facebook.com/share.php?u=<?php echo $actual_link;?>" target="_blank" class="newtooltip">
                                            <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/facebook.png" alt="Facebook" class="img-responsive" />
                                        <span> 
                                        <img class="callout" src="<?php echo base_url('images/icons/callout_black.gif');?>" />
                                            Share this and get 1 SWW points from  <?php echo $product->shop_name?>
                                        </span>
                                        </a>
                                        <a href="http://twitter.com/intent/tweet?text=<?=urlencode('Saleswherewhen :: Online coupons, Deals');?>&url=<?php echo $actual_link;?>" target="_blank" rel="nofollow" style="background-position:-144px -16px" class="option1_16 newtooltip_tweet" title="">
                                                    <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/twitter.png" alt="Twitter" class="img-responsive" />
                                         
                                        <span> 
                                        <img class="callout_tweet" src="<?php echo base_url('images/icons/callout_black.gif');?>" />
                                            Share this and get 1 SWW points from  <?php echo $product->shop_name?>
                                        </span>
                                        </a>
                                         <?php $image_link =  base_url() . 'images/deals/' . $product->banner;?>
                                        <a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" onclick="return sendSubscription('<?php echo $actual_link; ?>','<?php echo $image_link; ?>','<?php echo $product->id; ?>');" class=" newtooltip_msg">
                                                    <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/message.png" alt="Message" class="img-responsive" />
                                            <span> 
                                        <img class="callout_msg" src="<?php echo base_url('images/icons/callout_black.gif');?>" />
                                            Share this and get 1 SWW points from  <?php echo $product->shop_name?>
                                        </span>
                                            </a>
                                        
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                <?php
                                if($product_index%2 != 0){
                                    echo '<div class="clearfix"></div>
                                        </div>
                                    </div>';
                                }
                        }
                    }
                ?>
                                <div class="clearfix"></div>
                                <?php endif; ?>
                            </div>
			<div class="clearfix"></div>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
	<script>
    
    function home_search(){
        
    var selected_catg = $('#category').val();
    var selected_brand = $('#brand').val();
    var selected_location = $('#location').val();    
    var search_key = $('#search_text').val();    
    $.ajax({
        url: "<?php echo base_url('home/homeSearch'); ?>",
        type: "POST",
        data: {
            catg: selected_catg, 
            brand: selected_brand,
            location: selected_location,
            search_key: search_key
        },
        success: function (response) {
            $('div#product_list').html(response);
        }
    });
    return false;
  }

   $("#other_category").change(function(){ 
          var url = $(this).val(); // get selected value   
          if (url) { // require a URL
              window.location = 'home/listing/'+url; // redirect
          }
          return false;
   
   });


$("#home_page_search").click(function(){
    
    
    
    var selected_catg = $('#category').val();
    var selected_retailer = $('#retailer_id').val();
    var selected_location = $('#location').val();    
    var search_key = $('#search_text').val();
    var cookie_country_value = " ";
    var cookie_city_value = " ";
    var cookie_retailer_value = " ";
    if($('#country_remember').attr('checked'))
        {
            var cookie_country_value = $("#country").val(); 
           
        }
    if($('#city_remember').attr('checked'))
        {
             var cookie_city_value = $("#location").val();       
        }
    if($('#retailer_remember').attr('checked'))
        {
            var cookie_retailer_value = $("#retailer_id").val();        
        }
         //alert(country_value+'--'+city_value+'--'+retailer_value); return false;
    //alert(selected_catg+'--'+selected_retailer+'--'+selected_location+'--'+search_key);
    if(selected_catg == " " && selected_retailer ==" "){
        bootbox.alert('Please Select a Retailer & Look For..');
        return false;
    }else if(selected_catg == 0 && selected_retailer == 0){
        //alert('hii');
        var url = '<?php echo base_url('home/frontHomeSearchforall')?>';
        var form = $('<form action="' + url + '" method="post">' +
      '<input type="hidden" name="look_for" value="' + selected_catg + '" />' +
      '<input type="hidden" name="retailer" value="' + selected_retailer + '" />' +
      '<input type="hidden" name="city" value="' + selected_location + '" />' +
      '<input type="hidden" name="ser_key" value="' + search_key + '" />' +
      '<input type="hidden" name="cookie_country_value" value="' + cookie_country_value + '" />' +
      '<input type="hidden" name="cookie_city_value" value="' + cookie_city_value + '" />' +
      '<input type="hidden" name="cookie_retailer_value" value="' + cookie_retailer_value + '" />' +
      '</form>');
        $('body').append(form);
        form.submit();
        return false;
    }
    var url = '<?php echo base_url('home/frontHomeSearch')?>';
    var form = $('<form action="' + url + '" method="post">' +
      '<input type="hidden" name="look_for" value="' + selected_catg + '" />' +
      '<input type="hidden" name="retailer" value="' + selected_retailer + '" />' +
      '<input type="hidden" name="city" value="' + selected_location + '" />' +
      '<input type="hidden" name="ser_key" value="' + search_key + '" />' +
      '<input type="hidden" name="cookie_country_value" value="' + cookie_country_value + '" />' +
      '<input type="hidden" name="cookie_city_value" value="' + cookie_city_value + '" />' +
      '<input type="hidden" name="cookie_retailer_value" value="' + cookie_retailer_value + '" />' +
      '</form>');
        $('body').append(form);
        form.submit();
     
    return false;
    
});
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<style>
  .fb-share-button
{
transform: scale(2);
-ms-transform: scale(2);
-webkit-transform: scale(2);
-o-transform: scale(2);
-moz-transform: scale(2);
transform-origin: top left;
-ms-transform-origin: top left;
margin-right:14px;
-moz-transform-origin: top left;

}
  </style>
  
<script>
window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));
</script>
 

        <?php $this->load->view('front_include/footer.php'); ?>
<script>

        $( ".lt_banner_top img" ).click(function() {
            
            if($(this).attr("link")  != "#") 
            {
                var href = $(this).attr("link");
                window.open(href, '_blank');
            }
           
        });
        
        $( ".rt_banner_top img" ).click(function() {
            if($(this).attr("link")  != "#") 
                 {
                     var href = $(this).attr("link");
                     window.open(href, '_blank');
                 }
        });


        $( ".lt_banner_bottom img" ).click(function() {        
            if($(this).attr("link")  != "#") 
            {
                var href = $(this).attr("link");
                window.open(href, '_blank');
            }
        });

        $( ".rt_banner_bottom img" ).click(function() {
            if($(this).attr("link")  != "#") 
            {
                var href = $(this).attr("link");
                window.open(href, '_blank');
            }

        });
        
        $( ".big_banner img" ).click(function() {
            if($(this).attr("link")  != "#") 
            {
                var href = $(this).attr("link");
                window.open(href, '_blank');
            }

        });
        

        
        $("#country_remember").click(function(){
            var country_value = $("#country").val();            
            if(country_value == 0){
                bootbox.alert('Please Select a Country');
                $('#country_remember').attr('checked', false);
            }
            
        });
        
        $("#city_remember").click(function(){
            var city_value = $("#location").val();             
            if(city_value == 0){
                bootbox.alert('Please Select a City');
                $('#city_remember').attr('checked', false);
            }
            
        });
        $("#retailer_remember").click(function(){
            var retailer_value = $("#retailer_id").val();             
            if(retailer_value == " "){
                bootbox.alert('Please Select a Retailer');
                $('#retailer_remember').attr('checked', false);
            }
            
        });

</script>
