<?php
$tillDate = date('Y-m-d', strtotime($deal_details->valid_till));
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title> Saleswherewhen :: Product Details</title>

        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/'; ?>css/bootstrap-theme.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/'; ?>css/bootstrap.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/'; ?>css/style.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/'; ?>fonts/stylesheet.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/'; ?>css/jquery.countdown.css" />
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/'; ?>css/mgmenu.css" type="text/css" media="screen" />
        
        
        <script type="text/javascript" src="<?php echo base_url() . 'assets/frontend/'; ?>js/jquery.min.js"></script>
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
        <script type="text/javascript" src="<?php echo base_url() . 'assets/frontend/'; ?>js/bootstrap.js"></script>

        <script type="text/javascript" src="<?php echo base_url() . 'assets/frontend/'; ?>js/scripts.js"></script><!-- Mega Menu Script -->
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
        <script type="text/javascript" src="<?php echo base_url() . 'assets/frontend/'; ?>js/mootools-core.js"></script>

    </head>

    <body>

        <div class="container-fluid">
            <div class="container less_pad">
                <?php $this->load->view('front_include/header.php'); ?>

                <?php $this->load->view('front_include/megaMenu'); ?>
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('home'); ?>">Home</a></li>
			<?php //if(isset($deal_details->parentCatg){ ?>
                        <!--<li class="breadcum_new"><?php echo $deal_details->parentCatg; ?></li>-->
			<?php //} ?>
                        <li class="breadcum_new"><?php echo $deal_details->category; ?></li>
                        <li class="active"><?php echo $deal_details->shop_name; ?></li>
                    </ol>
                </div>

                <div class="col-lg-12">
                    <div class="body_product_wrap">
                        <div class="col-lg-12 less_pad">
                            <div class="col-lg-7 less_pad">
                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                    <div class="col-lg-2 less_pad">
                                        <ol class="gallery-indicators">
                                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"><img src="<?php echo base_url() . 'images/deals/thumb/' . $deal_details->banner; ?>" width="100%" class="gap" /></li>

                                            <?php foreach ($deal_images as $deal_image): ?>
                                                <li data-target="#carousel-example-generic" data-slide-to="2">
                                                    <img src="<?php echo base_url() . 'images/deals/thumb/' . $deal_image->deal_id . '/' . $deal_image->deal_image; ?>" width="100%" class="gap" />
                                                </li>
                                            <?php endforeach; ?>
                                        </ol>
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="carousel-inner" role="listbox">
                                            <div class="item active">
                                                <img src="<?php echo base_url() . 'images/deals/listing/' . $deal_details->banner; ?>" width="100%" alt="Gallery" />
                                                <div class="carousel-caption">
                                                  <div class="arrow-right">
				                    	<div><?php if($deal_details->deal_text) {
								$text = explode(',',$deal_details->deal_text);
								}  
								if (isset($text[0])) {echo  $text[0];}  ?>
								<p><?php if (isset($text[1])) {echo  $text[1];} ?></p>
						  </div>
						</div>
                                                </div>
                                            </div>
                                            <?php foreach ($deal_images as $deal_image): ?>
                                                <div class="item">
                                                    <img src="<?php echo base_url() . 'images/deals/' . $deal_image->deal_id . '/' . $deal_image->deal_image ?>" width="100%" alt="Gallery" />
                                                    <div class="carousel-caption">
                                                      <div class="arrow-right">
				                    	<div>
							<?php if($deal_details->deal_text) {
								$text = explode(',',$deal_details->deal_text);
								}  
								if (isset($text[0])) {echo  $text[0];}  ?>
								<p><?php if (isset($text[1])) {echo  $text[1];} ?></p>
						  	</div>
							</div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>

                                </div>
                                
                                
                                
                                <div class="col-lg-12 less_pad">
                            <div role="tabpanel" class="tab_marg">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Deal Terms &amp; Highlights</a></li>
                                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">The Deal &amp; Locations</a></li>
                                    <li role="presentation"><a href="#review" aria-controls="profile" role="tab" data-toggle="tab">Review ( <?php if(isset($review_details)){ echo count($review_details);  } else echo '0';?> )</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content force-overflow1" id="style-8">
                                    <div role="tabpanel" class="tab-pane active" id="home">
                                        <div class="col-lg-6">
                                            <div class="left">
                                                <h3>Highlights</h3>
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
                                                        <?php endfor;
                                                    } else {
                                                        ?>
                                                        <li><?php echo $deal_details->deal_text; ?></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="right">
                                                <h3>Deal Terms</h3>
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
                                    <div role="tabpanel" class="tab-pane" id="profile">
                                        <div class="col-lg-6">
                                            <div class="left">
                                                <h3>Highlights</h3>
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
                                                <h3>Deal Location</h3>
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
                                    
                                    <div role="tabpanel" class="tab-pane" id="review">
                                    
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
                                                	<?php echo $revdet->first_name." ".$revdet->last_name ; ?><span style="margin-left: 5px;"><?php echo $revdet->review_date; ?></span>
                                                </h4>
                                               <p style=" margin-left: 10px;font-weight: bold;"><?php echo $revdet->review_title; ?></p>
                                                <p style=" margin-left: 10px;"><?php echo $revdet->review_description; ?></p>
                                                <div class="form-group" style=" margin-left: 10px;">
                                                    
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
                                </div>

                            </div>

                        </div>                            
                            </div>
                            <div class="col-lg-5 less_pad">
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
                                            <p><?php //echo '<pre>'; print_r($deal_details);  
                                            
                                            echo $deal_details->deal_text; ?></p>
					    <?php if($deal_details->item_type == 3):?>
					    <p>Coupon Price: <?php echo ($deal_details->coupon_price) ? $deal_details->coupon_price:''; ?></p>
					    <?php endif;?>                                            
                                            <p>Price: <span>$ <?php echo $deal_details->coupon_price; ?></span></p>                           
                                        </div>
                                        
                                        <div class="company_wrap">
                                        	<div class="logo">
                                            	<a href="<?php echo base_url().'home/dealsByRetailer/'.$deal_details->brand_id;?>">
                                                    <img src="<?php echo base_url() . 'images/brands/' ?><?php echo ($deal_details->brand_logo) ? $deal_details->brand_logo :'nopreview.gif'  ;?>" alt="Company Logo" class="img-responsive" /></a>
                                            </div>
                                            <div class="name">
                                            	<a href="<?php echo base_url().'home/dealsByRetailer/'.$deal_details->brand_id;?>"><?php echo $deal_details->brand_name; ?></a>
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
                                          <a  onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600,left=350,top=200');return false;" href="http://www.facebook.com/share.php?u=<?php echo $actual_link;?>" target="_blank" class="newtooltip_pro_in">
                                              
                                              <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/facebook.png" alt="Facebook" class="img-responsive" />
                                          <span> 
                                                            <img class="callout_pro_in" src="<?php echo base_url('images/icons/callout_black.gif');?>" /> 

                                                            Share this and get 1 SWW points from  <?php echo $deal_details->shop_name;?>
                                                        </span>
                                          </a>
                                                <a title="Share this and get 1 SWW points from  <?php echo $deal_details->shop_name;?>" href="http://twitter.com/intent/tweet?text=<?=urlencode('Saleswherewhen :: Online Grocery, Grocery');?>&url=<?php echo $actual_link;?>" target="_blank" rel="nofollow" style="background-position:-144px -16px" class="option1_16 newtooltip_tweet_pro_in" title="Twitter">
                                                    <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/twitter.png" alt="Twitter" class="img-responsive" />
                                               <span> 
                                                            <img class="callout_tweet_pro_in" src="<?php echo base_url('images/icons/callout_black.gif');?>" /> 

                                                            Share this and get 1 SWW points from  <?php echo $deal_details->shop_name;?>
                                                        </span>
                                                </a>
                                            <div class="clearfix"></div>
                                        </div>
                                        
                                        
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="col-lg-6 less_pad">
                                        

                                    <div class="map_wrap">
                                        <?php echo (!empty($deal_details->shop_location_map)) ? $deal_details->shop_location_map :'';?>
                                        <div class="map_bg_details">Find Us</div>
                                    </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <!--<div class="btn_buy">
					<?php if($deal_details->item_type == 1){?>
				    	<a href="">Buy Now</a>
					<?php }else{?>
					<a href="<?php echo $deal_details->deal_site_url;?>" target="_blank">Visit</a>
					<?php } ?>
				    </div>-->
				
                                    <div class="clearfix"></div>
                                </div>
                                
                                <div class="col-lg-12 less_pad">
                                	<div class="sale_end">Offer Valid:&nbsp;<span id="defaultCountdown"> </span></div>
                                        
                                    <div class="btn btn-primary">
                                        <?php if($deal_details->item_type == 1){?>
                                            <a href="">Buy Now</a>
                                        <?php }else{?>
                                        <a href="<?php echo $deal_details->deal_site_url;?>" target="_blank">Get The Deal Now</a>
                                        <?php } ?>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="col-lg-12 less_pad">
                                    <div class="detail_review_wrap">
                                        <h3>Write Review for <?php echo $deal_details->shop_name; ?></h3>
                                        <form action="<?php echo base_url(); ?>review/getReview" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="" class="review_lable">Review Title</label>
                                                <input type="text" class="form-control" name="review_title" id="" placeholder="" required>
                                                <input type="hidden" name="current_url" value="<?php echo current_url();?>"></input>
                                                <input type="hidden" name="item_id" value="<?php echo $deal_details->id;?>"></input>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for=""  class="review_lable">Review</label>
                                                <textarea class="form-control" rows="3" name="review_description" style="resize:none;" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for=""  class="review_lable">Rate this merchant</label>
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
                                    if(!empty($Login)){
                                    ?>

                                    <input type="submit" class="btn_submit" value="Submit"></input>
                                     </form>
                                    <?php } else {?>
                                    <!--<button type="" class="btn_submit">-->
                                    <a id="modal_trigger_review" href="#sign_in" class="btn_submit pull-right" style="text-decoration:none;">Submit</a>
                                    <!--</button>-->
                                    <?php } ?>
                                    
                                    <?php ?>
                                    

                                </div>

                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
		
        		
                
                <div class="col-lg-12 similar">
                    <h2>Similar items</h2>
                    <div class="body_product_wrap">
                        <div class="col-lg-12 less_pad" id="similar_products">
                            <!--<div class="col-lg-6 less_pad">-->
                            <?php
                            if ($similarDeals) {
                                $j = 0;
                                foreach ($similarDeals as $similarDeal):
                                    /*$j++;
                                    if ($j > 6) {
                                        break;
                                    }*/
                                    ?>
                                    <div class="col-lg-6 less_pad">
                                        <div class="similar_product">
                                            <div class="left">
                                                <a href="<?php echo base_url().'home/productDetails/'.$similarDeal->id;?>"><img src="<?php echo base_url() . 'images/deals/' . $similarDeal->banner; ?>" alt="Similar Product" class="img-responsive" /></a>
                                            </div>
                                            <div class="right">
                                                <div><?php echo $similarDeal->deal_text; ?><span></span></div>
						<p><?php echo $similarDeal->short_description; ?></p>
                                                <p>Name : <span><?php echo $similarDeal->brand_name; ?></span></p>
						<?php if($similarDeal->item_type == 3){?>
                                                <p>Coupon Price : <span><?php echo $similarDeal->coupon_price; ?></span></p>
						<?php } ?>
                                                <p>Retailer : <span><?php echo $similarDeal->shop_name; ?></span></p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <?php
                                endforeach;
                            }
                            ?>
                            <!--</div>-->
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

        <?php $this->load->view('front_include/footer.php'); ?>
<!--Popup login panellist--->
<div id="modal" class="popupContainer" style="display:none;">
    <header class="popupHeader">
        <span class="header_title">Login</span>
        <span class="modal_close">X</span>
    </header>

    <section class="popupBody">
        <!-- Social Login -->
        <div class="social_login">
            <div class="">
                <a href="#" class="social_box fb">
                    <span class="icon"><i class="fa fa-facebook"></i></span>
                    <span class="icon_title">Connect with Facebook</span>

                </a>

            </div>

            <div class="centeredText">
                <span>Or use your Email address</span>
            </div>

            <div class="action_btns">
                <div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
                <div class="one_half last pull-right"><a href="#" id="register_form" class="btn">Sign up</a></div>
                <div class="clearfix"></div>
            </div>
        </div>

        <!-- Username & Password Login form -->
        <div class="user_login">
            <form action="<?php echo base_url(); ?>login/user" method="post">
                <!--<label>Email / Username :&nbsp;</label>-->
                <input type="text" name="email_id" placeholder="Email Address"/>
                <br />
                <input type="hidden" name="current_url" value="<?php echo current_url();?>">
                <!--<label>Password :&nbsp;</label>-->
                <input type="password" name="password" placeholder="Password"/>
                <br />
                <div class="action_btns">
                    <div class="one_half last"><input type="submit" value="Login" class="btn btn_red"></div>
                    <!--<div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>-->
                </div>

                <div class="checkbox popup_checkbox pull-right">
                    <input id="remember" type="checkbox" style="margin-right:2%; position:relative; float:left;" />
                    <label for="remember" style="padding-top: 3px; padding-left: 0px;">Remember me </label>
                </div>

                <div class="clearfix"></div>
            </form>
			
            <div class="pull-left"><a href="<?php echo base_url()?>signup/forgotPassword" class="forgot_password">Forgot password?</a></div>
            <div class="pull-right"><a href="#" class="forgot_password back_btn" style="text-align:right;">Back</a></div>
            
            <div class="clearfix"></div>
        </div>

        <!-- Register Form -->
        <div class="user_register">
           <form action="<?php echo base_url(); ?>login/user" method="post">
                <!--<label>Email / Username :&nbsp;</label>-->
                <input type="text" name="email_id" placeholder="Email Address"/>
                <br />
                <input type="hidden" name="current_url" value="<?php echo current_url();?>">
                <!--<label>Password :&nbsp;</label>-->
                <input type="password" name="password" placeholder="Password"/>
                <br />
                <div class="action_btns">
                    <div class="one_half last"><input type="submit" value="Login" class="btn btn_red"></div>
                    <!--<div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>-->
                </div>

                <div class="checkbox popup_checkbox pull-right">
                    <input id="remember" type="checkbox" style="margin-right:2%; position:relative; float:left;" />
                    <label for="remember" style="padding-top: 3px; padding-left: 0px;">Remember me </label>
                </div>

                <div class="clearfix"></div>
            </form>
            <div class="pull-right"><a href="#" class="forgot_password back_btn" style="text-align:right;">Back</a></div>
        </div>
    </section>
</div>
<link type="text/css" rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>css/popuplogin.css" />
<script type="text/javascript" src="<?php echo base_url() . '/assets/frontend/'; ?>js/jquery.leanModal.min.js"></script>
<script type="text/javascript">
    $("#modal_trigger").leanModal({top: 200, overlay: 0.6, closeButton: ".modal_close"});
    $("#modal_trigger1").leanModal({top: 200, overlay: 0.6, closeButton: ".modal_close"});
     $("#modal_trigger_review").leanModal({top: 200, overlay: 0.6, closeButton: ".modal_close"});
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