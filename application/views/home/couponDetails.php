<?php
$tillDate = date('Y-m-d', strtotime($deal_details->valid_till));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Saleswherewhen :: Coupon Details</title>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>css/bootstrap-theme.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>css/bootstrap.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>css/style.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>fonts/stylesheet.css" />

        <link rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>css/mgmenu.css" type="text/css" media="screen" />


        <script type="text/javascript" src="<?php echo base_url() . '/assets/frontend/'; ?>js/jquery.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url() . 'assets/frontend/'; ?>js/jquery.plugin.js"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/frontend/'; ?>js/jquery.countdown.js"></script>
        <script>

            $(document).ready(function ($) {


                var austDay = new Date();
                //austDay = new Date(austDay.getFullYear() + 1, 1 - 1, 26);
                austDay = new Date("<?php echo $tillDate; ?>");
                $('#defaultCountdown').countdown({until: austDay});
                $('#year').text(austDay.getFullYear());


            });

        </script>
        <script type="text/javascript" src="<?php echo base_url() . '/assets/frontend/'; ?>js/bootstrap.js"></script>

        <script type="text/javascript" src="<?php echo base_url() . '/assets/frontend/'; ?>js/scripts.js"></script><!-- Mega Menu Script -->
        <script>
            $(document).ready(function ($) {
                $('#mgmenu1').universalMegaMenu({
                    menu_effect: 'hover_fade',
                    menu_speed_show: 300,
                    menu_speed_hide: 200,
                    menu_speed_delay: 200,
                    menu_click_outside: false,
                    menubar_trigger: false,
                    menubar_hide: false,
                    menu_responsive: true
                });
                megaMenuContactForm();
            });
        </script>

        <script type="text/javascript" src="<?php echo base_url() . '/assets/frontend/'; ?>js/mootools-core.js"></script>



    </head>

    <body>

        <div class="container-fluid">
            <div class="container less_pad">
                <?php $this->load->view('front_include/header'); ?>
                <!--<div class="clearfix"></div>-->
                <?php $this->load->view('front_include/megaMenu'); ?>
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="active">Coupons</li>
                    </ol>
                </div>

                <div class="col-lg-12">
                    <div class="body_product_wrap">
                        <div class="col-lg-12 less_pad">
                            <div class="col-lg-6 less_pad">
                                <div class="coupon_img" id="coupon_img"><img src="<?php echo base_url() . 'images/deals/products/' . $deal_details->banner; ?>" alt="Coupons" class="img-responsive" /></div>
                            </div>

                            <div class="col-lg-6 rt_pad">
                                <div class="product_detail_rt">
                                    <h3> <?php echo $deal_details->shop_name; ?> </h3>
                                    <p>
					<?php 
			                if(!empty($deal_details->description)){
			                    if(strlen($deal_details->description) > 200){
			                       echo substr($deal_details->description, 0, 200) . ' ...'; 
			                    }else{
			                        echo $deal_details->description;
			                    }
			                }
			                ?>
				    </p>
                                </div>
                                <div class="col-lg-12 less_pad">
                                    <div class="col-lg-6 less_pad">
                                        <div class="detail_price">
                                            <!--<p><?php echo $deal_details->deal_text; ?></p>
					    <?php if($deal_details->item_type == 3):?>
					    <p>Coupon Price: <?php echo ($deal_details->coupon_price) ? $deal_details->coupon_price:''; ?></p>
					    <?php endif;?>--> 
						<?php if(!empty($deal_details->coupon_price)){ ?>                                           
							<p>Price: <span>$ <?php echo $deal_details->coupon_price; ?></span></p>
						<?php } ?>
                            
                                        </div>
                                        <div class="company_wrap">
                                        	<div class="logo">
                                            	<a href="<?php echo base_url().'home/dealsByRetailer/'.$deal_details->brandId; ?>"><img src="<?php echo base_url() . 'images/brands/'.$deal_details->brand_logo; ?>" alt="Company Logo" class="img-responsive" /></a>
                                            </div>
                                            <div class="name">
                                            	<a href="<?php echo base_url().'home/dealsByRetailer/'.$deal_details->brandId; ?>"><?php echo ($deal_details->brand_name) ? $deal_details->brand_name :'';?></a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="company_wrap">
                                        	<div class="logo">
                                            	<img src="<?php echo base_url() . 'assets/frontend/images/' ?>call_ico.png" alt="Facebook" class="img-responsive" />
                                            </div>
                                            <div class="name">
                                            	<?php echo ($deal_details->shop_mobile) ? $deal_details->shop_mobile :'';?>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        
                                        <div class="rating_star">
                                            <span>Ratings&nbsp;</span>
                                            <div id="rating1">
                                                    <?php 
                                                    if(isset($avgRate)) :
                                                        if($avgRate->avgrate > 0)            
                                                        { ?>
                                                            <img src="<?php echo base_url();?>images/icons/a_<?php echo $avgRate->avgrate ?>.png" height="" width="">
                                                        <?php } else{ ?>                                                      

                                                     <img src="<?php echo base_url();?>images/icons/a_6.png" height="" width="">
                                                   <?php } endif;?>
                                                    <div class="clearfix"></div>
                                                </div>
                                        </div>
                                        <div class="detail_share">
                                            <span>Share this deal&nbsp;</span>
                                            <?php $actual_link = current_url();?>
                                            <a  onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600,left=350,top=200');return false;" href="http://www.facebook.com/share.php?u=<?php echo $actual_link;?>" target="_blank" class=" newtooltip_pro_in">
                                                <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/facebook.png" alt="Facebook" class="img-responsive" />
                                                    <span> 
                                                <img class="callout_pro_in" src="<?php echo base_url('images/icons/callout_black.gif');?>" />
                                                    Share this and get 1 SWW points from  <?php echo $deal_details->shop_name?>
                                                </span>

                                            </a>
                                                <a href="http://twitter.com/intent/tweet?text=<?=urlencode('Saleswherewhen :: Online coupons, Deals');?>&url=<?php echo $actual_link;?>" target="_blank" rel="nofollow" style="background-position:-144px -16px" class="option1_16 newtooltip_tweet_pro_in" >
                                                    <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/twitter.png" alt="Twitter" class="img-responsive" />
                                                 <span> 
                                                <img class="callout_tweet_pro_in" src="<?php echo base_url('images/icons/callout_black.gif');?>" />
                                                    Share this and get 1 SWW points from  <?php echo $deal_details->shop_name?>
                                                </span>
                                                </a>
                                            <div class="clearfix"></div>
                                        </div>                                     
                                        
                                        
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="col-lg-6 rt_pad">
                                        <!--<img src="<?php echo base_url() . 'assets/frontend/images/' ?>find_us_map.jpg" alt="Map" class="img-responsive" width="100%" />-->

                                    <div class="map_wrap">
                                        <?php echo (!empty($deal_details->shop_location_map)) ? $deal_details->shop_location_map :'';?>
                                        <div class="map_bg_details">Find Us</div>
                                    </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    
                                </div>
                                <!--To be closed part-->
                                                            
                                <!--end of close part-->
                                <div class="clearfix"></div>
                                <div class="col-lg-12 less_pad">
                                    <div class="sale_end">Offer Valid:&nbsp;<span id="defaultCountdown"> </span></div>
                                     
                                </div>
                                <?php
                                $userData = $this->session->userdata('user');
                                if (!empty($userData)){
                                ?>
                                <div class="col-lg-12 coupon_download">
                                    <span>Click Here To</span>
                                    <input type="hidden" id="coupon_id" name="coupon_id" value="<?php echo $deal_details->id ?>">
                                    <div class="coupon_download_bg">
                                     <a href="" id="send_mail_coupon">
                                    	<img src="<?php echo base_url() ?>images/icons/mail_ico.png" alt="Mail"  title="Mail" class="img-responsive" />
                                    </a>
                                    </div>
                                       <div class="coupon_download_bg"> 
                                    <a href="<?php echo base_url() . '/assets/frontend/images/' . $deal_details->banner; ?>" id="download_coupon" download>
                                    	<img src="<?php echo base_url() ?>images/icons/download_ico.png" alt="Download" title="Download" class="img-responsive" />
                                    </a>
                                       </div>
                                        <div class="coupon_download_bg">
                                    <a href="" id="print_coupon" onclick="PrintDiv();">
                                    	<img src="<?php echo base_url() ?>images/icons/print_ico.png" alt="Print" title="Print" class="img-responsive" />
                                    </a>
                                        </div>
                                </div>
                                <?php } else {?>
                                <div class="col-lg-12 coupon_download">
                                	<span>Click Here To</span>
                                    <div class="coupon_download_bg">
                                    <a href="#sign_in" id="modal_mail_coupon">
                                    	<img src="<?php echo base_url() ?>images/icons/mail_ico.png" alt="Mail"  title="Mail" class="img-responsive" />
                                    </a>
                                    </div>
                                    <div class="coupon_download_bg">
                                    <a href="#sign_in" id="modal_download_coupon">
                                    	<img src="<?php echo base_url() ?>images/icons/download_ico.png" alt="Download" title="Download" class="img-responsive" />
                                    </a>
                                    </div>
                                    <div class="coupon_download_bg">
                                    <a href="#sign_in" id="modal_print_coupon">
                                    	<img src="<?php echo base_url() ?>images/icons/print_ico.png" alt="Print" title="Print" class="img-responsive" />
                                    </a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <?php }?>
				<div class="clearfix"></div>
                            </div>

                            <div class="clearfix"></div>
                        </div>

                        <div class="col-lg-12 less_pad">
                            <div class="coupons_detail_gap">
                                <div class="col-lg-6 less_pad">
                                    <div role="tabpanel">

                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Coupon Terms &amp; Highlights</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">The Coupon &amp; Locations</a></li>
                                            <li role="presentation"><a href="#review" aria-controls="profile" role="tab" data-toggle="tab">Review ( <?php if(isset($review_details)){ echo count($review_details);  } else echo '0';?> )</a></li>
                                            <?php if(!empty($dealsLists)) { ?>
                                            <li role="presentation"><a href="#deals" aria-controls="deals" role="tab" data-toggle="tab">Deals Available</a></li>
                                            <?php } ?>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane force-overflow1 active" id="home">
                                                <div class="col-lg-6">
                                                    <div class="left">
                                                        <h3>Coupon Highlights</h3>
                                                        <ul>
                                                            <?php
                                                            if ($deal_details->shop_highlights) {
                                                                $highlights = explode('.', $deal_details->shop_highlights);
                                                                $limit = count($highlights);
                                                                for ($i = 0; $i < $limit; $i++):
                                                                    if ($i == 0) {
                                                                        ?>
                                                                        <li> <span> <?php echo $highlights[$i]; ?> </span> </li>  
                                                                    <?php } else { ?>
                                                                        <li><?php echo $highlights[$i]; ?></li>
                                                                    <?php } ?>
                                                                    <?php
                                                                endfor;
                                                            } else {
                                                                ?>
                                                                <li><?php echo $deal_details->deal_text; ?></li>
                                                                <?php } ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="right">
                                                        <h3>Coupon Terms</h3>
                                                        <ul>
                                                            <?php
                                                            if ($deal_details->deal_terms) {
                                                                $deal_terms = explode('.', $deal_details->deal_terms);
                                                                $limit = count($deal_terms);
                                                                for ($i = 0; $i < $limit; $i++):
                                                                    if ($i == 1) {
                                                                        ?>
                                                                        <li><span><?php echo $deal_terms[$i]; ?></span></li>
                                                                    <?php } else { ?>
                                                                        <li><?php echo $deal_terms[$i]; ?></li>
                                                                        <?php
                                                                    }
                                                                endfor;
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane force-overflow1" id="profile">
                                                <div class="col-lg-6">
                                                    <div class="left">
                                                        <h3>Coupon</h3>
                                                        <div>
                                                            <?php
                                                            if ($deal_details->description) {
                                                                echo $deal_details->description;
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="right">
                                                        <h3>Shop Location</h3>
                                                        <div>
                                                            <?php
                                                            if ($deal_details->shop_address) {
                                                                echo $deal_details->shop_address;
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane force-overflow1" id="review">
                                    
                                    <?php
                                            if(isset($review_details)){
                                                
                                                    foreach($review_details as $revdet){
									?>
                                        <div class="review_wrap">
                                        	<!--<div class="left">
                                            	<img src="<?php echo base_url() . 'images/deals/' . $deal_details->banner; ?>" width="100%" />
                                            </div>-->
                                            <div class="right">
                                            	<h4>
                                                	<?php echo $revdet->first_name." ".$revdet->last_name ; ?><span><?php echo $revdet->review_date; ?></span>
                                                </h4>
                                                <p><?php echo $revdet->review_description; ?></p>
                                                <div class="form-group">
                                                    
                                                    <div class="review_star">            
                                                    <div id="rating">
                                                <?php
													if($revdet->rate>0){
												?>
                                                        <img src = "<?php echo base_url(); ?>images/icons/a_<?php echo $revdet->rate; ?>.png">
                                                <?php
													}else{
						?>
                                                <img src = "<?php echo base_url(); ?>images/icons/a_6.png">
                                                
                                                <?php
							}
						?>
                                                    </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    <?php
											}
										}
									?>
                                            
                                    </div>
                                            <div role="tabpanel" class="tab-pane" id="deals" >
                                                <p>Please click on this links to check the deals of <strong><?php echo ($deal_details->shop_name)?$deal_details->shop_name:''; ?></strong></p>
                                        <?php 
                                        //print_r($dealsLists);
                                        if(!empty($dealsLists)) {
                                            $i=1;
                                        foreach($dealsLists as $deal){ ?>
                                        <div style="margin-top:10px;">
                                            <a href="<?php echo base_url();?>home/productDetails/<?php echo $deal->id;?>" ><?php echo $i.' . '.$deal->deal_text.' on '.$deal->product_name; ?></a> 
                                        </div>
                                        <?php $i++; } } ?>
                                        
                                    </div>
                                        </div>

                                    </div>

                                </div> 

                                <div class="col-lg-6 less_rt">
                                    <div class="coupou_detail_review_wrap">
                                        <h3>Write Review for <?php echo ($deal_details->shop_name) ? $deal_details->shop_name : ''; ?></h3>
                                        <form action="<?php echo base_url(); ?>review/getReview" method="post">
                                            <div class="form-group">
                                                <label for="" class="review_lable">Review Title</label>
                                                <input type="text" class="form-control" name="review_title" id="" required placeholder="">
                                               <input type="hidden" name="current_url" value="<?php echo current_url();?>"></input>
                                                <input type="hidden" name="item_id" value="<?php echo $deal_details->id;?>"></input>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for=""  class="review_lable">Review</label>
                                                <textarea class="form-control" rows="3" name="review_description" required style="resize:none;"></textarea>
                                            </div>
											
                                            <div class="form-group">
                                                <label for=""  class="review_lable">Rate this Coupon</label>
                                                <div class="review_star">
                                                    <div id="rating">
                                                        <div class="exemple3" data-average="18" data-id="3"></div>
                                                        <div class="datasSent" style="display:none;">	
                                                            <p></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>


                                    </div>

                                    <!--<p class="review_lable">Post Your Reviews Here</p>-->
                                    <?php $Login = $this->session->userdata('user'); 
                                    if(!empty($Login)){ ?>
                                    <input type="submit" class="btn_submit" value="Submit"></input>
                                    <?php } else {?>
                                    <!--<button type="" class="btn_submit">-->
                                    <a id="modal_trigger1" href="#sign_in" class="btn_submit" style="text-decoration:none;">Submit</a>
                                    <!--</button>-->
                                    <?php } ?>                                    
                                    </form>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-lg-12 similar">
                    <h2>Similar items</h2>
                    <div class="body_product_wrap">
                        <div class="col-lg-12 less_pad" id="similar_products">
                            <?php
                            if ($similarDeals) {
                                foreach ($similarDeals as $similarDeal):
                                    ?>
                                    <div class="col-lg-6 less_pad">
                                        <div class="similar_product">
                                            <div class="left">
                                                <img src="<?php echo base_url() . 'images/deals/listing/' . $similarDeal->banner; ?>" alt="Similar Product" class="img-responsive" />
                                            </div>
                                            <div class="right">
                                                <div><?php echo $similarDeal->deal_text; ?><span></span></div>
						<p><?php echo $similarDeal->short_description; ?></p>
                                                <p>Name :<span><?php echo $similarDeal->brand_name; ?></span></p>
						<?php if($similarDeal->item_type == 3){?>
                                                <p>Coupon Price :<?php echo $similarDeal->coupon_price; ?></p>
						<?php } ?>
                                                <p>Retailer :<span><?php echo $similarDeal->shop_name; ?></span></p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <?php
                                endforeach;
                            }
                            ?>
                            <div class="clearfix"></div>
                        </div>

                        <div class="col-lg-12">
                            <nav>
                                <ul class="pagination">
                                    <?php
                                    if ($page_value > 1) {
                                        $pre = $page_value - 1;
                                        echo '<li><a href="#"  onclick = "return detailsPagination(' . $pre . ');"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>';
                                    }

                                    for ($i = 1; $i <= $page; $i++) {
                                        if ($page_value == $i) {
                                            echo '<li><a href="" class = "pagi_active" onclick = "return detailsPagination(' . $i . ')">' . $i . '</a></li>';
                                        } else {
                                            echo '<li><a href="" onclick = "return detailsPagination(' . $i . ')">' . $i . '</a></li>';
                                        }
                                    }
                                    if ($page_value < $page) {
                                        $next = $page_value + 1;
                                        echo '<li><a href=""  onclick = "return detailsPagination(' . $next . ');"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>';
                                    }
                                    ?>
                                </ul>
                            </nav>
				<input type = "hidden" id = "category" value = "<?php echo $deal_details->category_id; ?>">
                            	<input type = "hidden" id = "page_value" value = "<?php echo $page_value; ?>">
                                <input type = "hidden" id = "page_count" value = "<?php echo $page; ?>">
                                    </div>



                                    <div class="clearfix"></div>
                                    </div>
                                    </div>

                                    <div class="clearfix"></div>
                                    </div>
                                    </div>
                                    <script>
                                    $(document).ready(function () {
                                    var $jq151 = $.noConflict();
                                    $jq151('.exemple3').jRating({
                                    step: true,
                                    length: 5
                                    });


                                    });
                                    </script> 
                                    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/scripts/review/jRating.jquery.css" type="text/css" />
                                    <script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/review/jquery.js"></script>
                                    <script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/review/jRating.jquery.js"></script>

                                    <style type="text/css">
                                        body {margin:0px;font-family:Arial;font-size:13px}
                                        a img{border:0}
                                        .datasSent, .serverResponse{margin-top:20px;width:470px;height:73px;border:1px solid #F0F0F0;background-color:#F8F8F8;padding:10px;float:left;margin-right:10px}
                                        .datasSent{width:200px;position:fixed;left:680px;top:0}
                                        .serverResponse{position:fixed;left:680px;top:100px}
                                        .datasSent p, .serverResponse p {font-style:italic;font-size:12px}
                                        .exemple{margin-top:15px;}
                                        .clr{clear:both}
                                        pre {margin:0;padding:0}
                                        .notice {background-color:#F4F4F4;color:#666;border:1px solid #CECECE;padding:10px;font-weight:bold;width:600px;font-size:12px;margin-top:10px}
                                    </style>
<script>
   function detailsPagination(page) {
    //alert(page);
    var limit = '6';
    var count = $("#page_count").val();
    var catg = $("#category").val();
    var start = (page - 1) * limit;
    $("#page_value").val(page);
    $.ajax({
        url: "<?php echo base_url('home/paginationSimilarProducts'); ?>",
        type: "POST",
        data: {
            start: start,
            catg: catg
        },
        success: function (response) {
            //alert(response);
            $('#similar_products').html(response);
            $('.pagination').html("");
            if (page > 1) {
                var pre = page - 1;
                $(".pagination").append('<li><a href="" onclick = "return detailsPagination(' + pre + ');"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>');
            }
            for (k = 1; k <= count; k++) {
                if (page == k) {
                    $(".pagination").append('<li><a href="" class = "pagi_active" onclick = "return detailsPagination(' + k + ')">' + k + '</a></li>');
                } else {
                    $(".pagination").append('<li><a href="" onclick = "return detailsPagination(' + k + ')">' + k + '</a></li>');
                }
            }
            if (page < count) {
                var next = page + 1;
                $(".pagination").append('<li><a href="" onclick = "return detailsPagination(' + next + ');"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>');
            }
        }
    });
    return false;
} 
</script>
<?php $this->load->view('front_include/footer.php'); ?>
<link type="text/css" rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>css/popuplogin.css" />
<script type="text/javascript" src="<?php echo base_url() . '/assets/frontend/'; ?>js/jquery.leanModal.min.js"></script>
<script type="text/javascript">
    $("#modal_trigger").leanModal({top: 200, overlay: 0.6, closeButton: ".modal_close"});
    $("#modal_trigger1").leanModal({top: 200, overlay: 0.6, closeButton: ".modal_close"});
    $(function () {
        // Calling Login Form
        $("#login_form").click(function () {
            $(".social_login").hide();
            $(".user_login").show();
            return false;
        });

        // Calling Register Form
        $("#register_form").click(function () {
            $(".social_login").hide();
            $(".user_register").show();
            $(".header_title").text('Register');
            return false;
        });

        // Going back to Social Forms
        $(".back_btn").click(function () {
            $(".user_login").hide();
            $(".user_register").hide();
            $(".social_login").show();
            $(".header_title").text('Login');
            return false;
        });

    })
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

-moz-transform-origin: top left;

}
</style>

<script>
window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));
</script>

<link type="text/css" rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>css/popuplogin.css" />
<script type="text/javascript" src="<?php echo base_url() . '/assets/frontend/'; ?>js/jquery.leanModal.min.js"></script>
<script type="text/javascript">
   
    $("#modal_download_coupon").leanModal({top: 200, overlay: 0.6, closeButton: ".modal_close"}); 
    $("#modal_print_coupon").leanModal({top: 200, overlay: 0.6, closeButton: ".modal_close"});
    $("#modal_mail_coupon").leanModal({top: 200, overlay: 0.6, closeButton: ".modal_close"});

   $("#send_mail_coupon").click(function(){
       
      var coupon_id = $("#coupon_id").val();
     
      
      $.ajax({url: "<?php echo base_url(); ?>home/manageCoupons/"+coupon_id, success: function(result){
             
    }});
   });
   
   
</script>

<script type="text/javascript">     
        function PrintDiv() {    
           var coupon_img = document.getElementById('coupon_img');
           var popupWin = window.open('', '_blank', 'width=600,height=600');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + coupon_img.innerHTML + '</html>');
            popupWin.document.close();
                }
     </script>
