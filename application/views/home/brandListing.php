<?php //echo"<pre>";print_r($other_locations);exit; ?>
<?php //echo"<pre>";print_r($deals);exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Saleswherewhen :: Take a look on this Brand, Online Shopping</title>

        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/'; ?>css/bootstrap-theme.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/'; ?>css/bootstrap.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/'; ?>css/style.css" />
        <!--<link type="text/css" rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>css/morphbutton.css">-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/'; ?>fonts/stylesheet.css" />
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/'; ?>css/mgmenu.css" type="text/css" media="screen" />
        <script type="text/javascript" src="<?php echo base_url() . '/assets/frontend/'; ?>js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url() . '/assets/frontend/'; ?>js/jquery.morphbutton.js"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/frontend/'; ?>js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/frontend/'; ?>js/jquery.plugin.js"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/frontend/'; ?>js/jquery.countdown.js"></script>
	<script>
              $(document).ready(function ($) {
        <?php
        if ($deals)
        {
        foreach ($deals as $deal):
        $tillDate = $deal->valid_till;
        ?>
              
                $('#defaultCountdown_<?php echo $deal->id; ?>').countdown({until: <?php echo $tillDate; ?>});
            
        <?php endforeach;
      
        }
        ?>
                
                });


        </script>
         <script type="text/javascript">
                
                
                function sendSubscription(item_url,image_url,item_id){
                   $("#item_id").val(item_id);
                   $("#image_url").val(image_url);
                   $("#item_url").val(item_url); 

                    }
                                    
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
                        <li class="active"><?php if(!empty($brand)){ echo ($brand->name) ? $brand->name :''; } ?></li>
                    </ol>
                </div>
                <script type="text/javascript">
                function getVote(val){
                     //'ip_address' => $_SERVER['REMOTE_ADDR'],
                      //alert(val);
                      //alert(val);
                      var myip = '<?php echo $_SERVER['REMOTE_ADDR']; ?>';
                              //alert(myip);
                      $.ajax({
                        url: "<?php echo base_url('review/ajaxUpdateVote'); ?>",
                                type: "POST",
                                data: {
                                    voted_for: val,
                                    ipaddress:myip,
                                        <?php echo $this->security->get_csrf_token_name() . ":'" . $this->security->get_csrf_hash() . "'"; ?>
                                },
                                success: function(data){
                                    //alert(data);
                                    $("#updated_vote").html("");
                                    $("#updated_vote").html(data);
                                }
                        });

                        return false;

                }
                
                function voted(){
                    alert('You have already voted.');
                }
                </script>
                <div class="col-lg-12">
                    <div class="col-lg-3">
                        <?php //echo '<pre>'; print_r($brand);
                            if(!empty($brand)){ ?>
                        <div class="bazar_left">
                            <img src="<?php echo base_url() . 'images/brands/' . $brand->brand_image; ?>" alt="<?php echo $brand->name; ?>" class="img-responsive" />
                            
                            <div class="rating">
                                <div class="left">
                                    <h5><?php echo $brand->name; ?> Rating</h5>
                                    <div class="rating_img">
                                                         <?php 
                                                    if(isset($getReviewBrand)) :
                                                        if($getReviewBrand->avgrate > 0)            
                                                        { ?>
                                                            <img src="<?php echo base_url();?>images/icons/a_<?php echo $getReviewBrand->avgrate ?>.png" height="" width="">
                                                        <?php } else{ ?>                                                      

                                                     <img src="<?php echo base_url();?>images/icons/a_6.png" height="" width="">
                                                   <?php } endif;?>
                                    </div>
                                </div>
                                <div class="right">
                                    <?php //print_r($getVote);die;?>
                                    <div class="count">
                                        <?php $ip= $_SERVER['REMOTE_ADDR']; ?>
                                        <?php 
                                        if(isset($getVote)){
					$ipadd = $getVote[0]->ip_address;
                                        }
                                        if(isset($ipadd))
                                        {
                                        
                                        if($ipadd !=$ip){?>
                                        
                                        <a href="" onclick="return getVote(<?php echo $brand->id;?>)">
                                            <img src="<?php echo base_url();?>images/icons/heart_one.png" height="20" width="20"></img>
                                        </a>
                                        <?php } else {?>
                                        
                                        <a href="" onclick="return voted();">
                                            <img src="<?php echo base_url();?>images/icons/heart_one.png" height="20" width="20"></img>
                                        </a>
                                        
                                        <?php } } else{ ?>
                                        
                                            <a href="" onclick="return getVote(<?php echo $brand->id;?>)">
                                            <img src="<?php echo base_url();?>images/icons/heart_one.png" height="20" width="20"></img>
                                        </a>
                                        
                                            <?php } ?>
                                        
                                    </div>
                                    <div class="vote" id="updated_vote" style="margin-left:10px;"><?php  if(!empty($showVote)) { echo $showVote[0]->totallike; }else {     echo '0'; }?> votes</div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            
                            <div class="comment">
                                <div>
                                    <img src="<?php echo base_url() . 'assets/frontend/images/' ?>pencil_ico.png" alt="Pencil" class="img-responsive" />                                    
                                    
                                    <?php $Login = $this->session->userdata('user');
                                    if(!empty($Login)){
                                    ?>                                  
                                    <a href="#" class="" id="brand_review" style=" text-decoration: none;cursor: pointer;">Write a review</a>
                                    <?php } else {?>                                    
                                    <a id="modal_trigger_write_review" href="#sign_in" class="" style="text-decoration:none;cursor: pointer;">Write a review</a>                                    
                                    <?php } ?>
                                </div>
                                </div>
                            <div class="clearfix"></div>
                            <!--Popup Review Panel-->
                            <?php //print_r($getReviewBrand);?>
                            <div id="brand_rate" style="display:none;">                        

                                        <div class="detail_review_wrap">
                                            <h3>Review for <?php echo $brand->name; ?></h3>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="" class="review_lable">Review Title</label>
                                                        <input type="text" class="form-control" required name="review_title" id="" placeholder="">
                                                        <input type="hidden" name="current_url" value="<?php echo current_url(); ?>"></input>
                                                        <input type="hidden" name="item_id" value="<?php echo $brand->id; ?>"></input>
                                                        
                                                </div>                                            
                                                <div class="form-group">
                                                    <label for=""  class="review_lable">Review</label>
                                                    <textarea class="form-control" required rows="3" name="review_description" style="resize:none;"></textarea>
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
                                                <div class="form-group">
                                                    <input type="submit" class="btn_submit" id="brand_review_button_submit" value="Submit"></input>                                                
                                                </div>
                                            </form>
                                        </div>
                                        <div class="clearfix"></div>                                
                                    </div>
                                    <!--Popup Review Panel-->
                             <div class="comment">
                                
                                <div>
                                    <img src="<?php echo base_url() . 'assets/frontend/images/' ?>notify_ico.png" alt="Message" class="img-responsive" /><a href="#">Notify me for Budget Bazaar deals</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="share">
                                <strong>Share this page</strong>
                                <?php $actual_link =  current_url();?>
                                <div>
                                    <a  onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600,left=350,top=200');return false;" href="http://www.facebook.com/share.php?u=<?php echo $actual_link;?>" target="_blank" class=" newtooltip_brand">
                                        <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/facebook.png" alt="Facebook" class="img-responsive" />
                                        <span> 
                                            <img class="callout_brand" src="<?php echo base_url('images/icons/callout_black.gif');?>" />
                                                Share this and get 1 SWW points from  <?php echo $brand->name?>
                                            </span>
                                    </a>
                                    <a  href="http://twitter.com/intent/tweet?text=<?=urlencode('Saleswherewhen :: Online Brands, Brands');?>&url=<?php echo $actual_link;?>" target="_blank" rel="nofollow" style="background-position:-144px -16px" class="option1_16 newtooltip_tweet_brand" >
                                        <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/twitter.png" alt="Twitter" class="img-responsive" />
                                    
                                            <span> 
                                            <img class="callout_tweet_brand" src="<?php echo base_url('images/icons/callout_black.gif');?>" />
                                                Share this and get 1 SWW points from  <?php echo $brand->name?>
                                            </span>
                                    </a>
                                    <?php $image_link =  base_url() . 'images/brand/' . $brand->brand_image;?>
                                    <a href="#" class=" newtooltip_msg_brand" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" onclick="return sendSubscription('<?php echo $actual_link; ?>','<?php echo $image_link; ?>','<?php echo $brand->id; ?>');">
                                        <img src="<?php echo base_url() . 'assets/frontend/images/' ?>message.png" alt="Message" class="img-responsive" />
                                    <span> 
                                    <img class="callout_msg_brand" src="<?php echo base_url('images/icons/callout_black.gif');?>" />
                                        Share this and get 1 SWW points from  <?php echo $brand->name?>
                                    </span>
                                    </a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
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
                            <div class="direction">
				<div class="map_wrap">
                                <!--<img src="<?php echo base_url() . 'assets/frontend/images/' ?>directions_map.jpg" alt="Map" class="img-responsive" />-->
                                <?php echo $brand->brand_location_map; ?>
				<div class="map_bg direction">Get Directions</div>
				</div>
                            </div>
<!--                            <div class="persona">
                                <h3>Shopping Persona</h3>
                                <img src="<?php echo base_url() . 'assets/frontend/images/' ?>persona_img.jpg" alt="Shopping" class="img-responsive" />
                                <h5>Ashis kumar</h5>
                                <p>
                                    Ashis has a unique sense of fashion accessories & is simply addicted to online shopping she buys the best stuff at amazing prices. She is the self-proclaimed ambassador to most of the online portals. Her secret is simple "Use online coupons for shopping on the web".
                                </p>    
                            </div>-->
<!--                            <div class="add">
                                <img src="<?php echo base_url() . 'assets/frontend/images/' ?>lt_panel_add.jpg" alt="Add" class="img-responsive" />
                            </div>-->
                            <div class="clearfix"></div>
                        </div>
                        <?php } ?>
                    </div>

                    <div class="col-lg-9">
                        <?php if(!empty($brand)){ ?>
                        <div class="bazar_right">
                            <h2>
                                <?php echo $brand->name; ?>
                                <span>Last Updated : <?php echo date('d M y', strtotime($brand->posted_on)) ?></span>
                            </h2>
                            <?php if($brand->head_office || $brand->head_contact){ ?>
                            <h4>Head Office</h4>
                            <div class="contact">
                                <div>
                                    <img src="<?php echo base_url() . 'assets/frontend/images/' ?>/pointer_ico.png" alt="Pointer" class="img-responsive" />
                                    <?php
                                    if ($brand->head_office) {
                                        $headAddress = explode(',', $brand->head_office);
                                        ?>
                                        <span><?php echo $headAddress[2]; ?></span> : <?php echo $brand->head_office;
                                }
                                    ?>

                                </div>
                                <div>
                                    <img src="<?php echo base_url() . 'assets/frontend/images/' ?>/call_ico.png" alt="Phone" class="img-responsive" />
                                    To Book an appointment call <span><?php echo $brand->head_contact; ?></span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <?php } ?>
                            <?php if($brand->site_office || $brand->site_contact){ ?>
                            <h4>Site Office</h4>
                            <div class="contact">
                                <div>
                                    <img src="<?php echo base_url() . 'assets/frontend/images/' ?>/pointer_ico.png" alt="Pointer" class="img-responsive" />
                                    <?php
                                    if ($brand->site_office) {
                                        $headAddress = explode(',', $brand->site_office);
                                        ?>
                                        <span><?php echo $headAddress[2]; ?></span> : <?php echo $brand->site_office;
                                    }
                                    ?>
                                </div>
                                <div>
                                    <img src="<?php echo base_url() . 'assets/frontend/images/' ?>/call_ico.png" alt="Phone" class="img-responsive" />
                                    To Book an appointment call <span><?php echo $brand->site_contact; ?></span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <?php } ?>
                            <?php if(!empty($brand->speciality)){?>
                            <h3>Wow Factor</h3>
                            <div class="speciality">
                                <div>
                                    <img src="<?php echo base_url() . 'assets/frontend/images/' ?>speciality_star.png" alt="Star" class="img-responsive" />Speciality
                                    <p><?php echo $brand->speciality; ?></p>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if(!empty($other_locations)){?>
                            <h3>Location</h3>
                            <div class="location">
                                <?php
                                    foreach($other_locations as $other_location ):
				    ($other_location->contact_no) ? $contact = $other_location->contact_no: $contact='';
                                    $boldText = explode(',', $other_location->location);
				    ($other_location->location) ? $location = $other_location->location : $location='';
                                    ?>
                                    <span><?php echo ucfirst($boldText[2]); ?></span> : <?php echo '(call'.$contact.')'.$location.' |';
                                
                                    endforeach;
                                ?>

                            </div>
                            <?php } ?>
                            <div class="product_list_wrap">
                                <div class="heading">
                                    <div class="col-lg-4 less_pad">
                                        <div class="product_heading">
                                            <?php echo ucfirst($brand->name); ?>: <a href="#" class="mytooltip">Montreal <span class="classic">233, A-3 Block, Janak Puri, New Delhi - 1100058</span></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 less_pad">
                                        <nav>
                                            <ul>
                                                <li><a href="#" onclick="return displaylist('sale','deal','coupon')" class="active" >Sale</a></li>
                                                <li><a href="#" onclick="return displaylist('deal','sale','coupon')" >deals</a></li>
                                                <li><a href="#" onclick="return displaylist('coupon','sale','deal')" >Coupons</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="col-lg-4 less_pad">
                                        <div class="product_select">
                                                <select id="location" name="location">
                                                <option value="">Change Location</option>
                                                <?php foreach($city_list as $city): ?>
							<option value="<?php echo $city->city_id; ?>"><?php echo $city->city_name ; ?></option>
						<?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="list_wrap" id="sale">
                                        <?php
                                        if ($deals) {
                                            foreach ($deals as $deal):
                                                ?>
                                            <div class="product_wrap">
                                                <div class="product_img">
                                                    <a href="<?php echo base_url().'home/productDetails/'.$deal->id;?>"><img src="<?php echo base_url() . 'images/deals/listing/' . $deal->banner; ?>" alt="Product" class="img-responsive" /></a>
                                                </div>
                                                <div class="product_decs">
                                                    <div class="left">
                                                        <h2>
                                                            <strong>
                                                                <?php 
                                                                if($deal->item_type == 1 ||$deal->item_type == 4){
                                                                    echo $deal->product_name;
                                                                }else{
                                                                    echo $deal->deal_text;
                                                                }
                                                                ?>
                                                            </strong>
                                                        </h2>
                                                        <p>Regular Price: <span>$ <?php echo $deal->coupon_price; ?></span></p>
                                                        <div class="coupon">
                                                            <?php 
                                                                if($deal->item_type == 3 ):
                                                                    echo "Coupon : Available";
                                                                endif;
                                                                ?>
                                                            
                                                        </div>
                                                        <?php
                                                            $tillDate = date('Y-m-d', strtotime($deal->valid_till));
                                                        ?>
                                                       
                                                        <div class="end">Sale Ends : <span id="defaultCountdown_<?php echo $deal->id; ?>"></span></div>
                                                        <div class="contact">
                                                        <div>
                                                            <div class="image"><img src="<?php echo base_url() . 'assets/frontend/images/' ?>pointer_ico.png" alt="Pointer" class="img-responsive" /></div>
                                                            <div class="content"><?php echo $deal->shop_address; ?></div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div>
                                                            <div class="image"><img src="<?php echo base_url() . 'assets/frontend/images/' ?>mobile_ico.png" alt="Phone" class="img-responsive" /></div>
															<div class="content"><?php echo $deal->shop_mobile; ?></div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="right">
                                                            <div class="map_wrap">
                                                                <?php echo (!empty($deal->shop_location_map)) ? $deal->shop_location_map :'';?>
                                                                <div class="map_bg">Find Us</div>
                                                            </div>
                                                    </div>
                                                    <div class="clearfix"></div>

                                                    
                                                    <?php 
                                                    if($deal->item_type == 1 ||$deal->item_type == 4):
                                                        ?>
                                                    <div class="btn_buy">
                                                        <a href="#">View Details</a>
                                                    </div>
                                                    <?php endif; ?>
                                                    <div class="share">
                                                        <?php $actual_link = base_url()."home/productDetails/".$deal->id; ?>
                                                        <span>Share this deal</span>
                                                         
                                                        <a  onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600,left=350,top=200');return false;" href="http://www.facebook.com/share.php?u=<?php echo $actual_link;?>" class="newtooltip_brand">
                                                            
                                                            <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/facebook.png" alt="Facebook" class="img-responsive" />                                                        
                                                            <span> 
                                                            <img class="callout_brand" src="<?php echo base_url('images/icons/callout_black.gif');?>" />
                                                                Share this and get 1 SWW points from  <?php echo $deal->product_name;?>
                                                            </span>

                                                        </a>
                                                        <a href="http://twitter.com/intent/tweet?text=<?=urlencode('Saleswherewhen :: Online coupons, Deals');?>&url=<?php echo $actual_link;?>" target="_blank" rel="nofollow" style="background-position:-144px -16px" class="option1_16 newtooltip_tweet_brand">
                                                                    <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/twitter.png" alt="Twitter" class="img-responsive" />
                                                                <span> 
                                                                    <img class="callout_tweet_brand" src="<?php echo base_url('images/icons/callout_black.gif');?>" />
                                                                        Share this and get 1 SWW points from  <?php echo $deal->product_name;?>
                                                                    </span>
                                                        </a>
                                                         <?php $image_link =  base_url() . 'images/deals/listing/' . $deal->banner;?>
                                                        <a href="#" class="newtooltip_msg_brand" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" onclick="return sendSubscription('<?php echo current_url(); ?>','<?php echo $image_link; ?>','<?php echo $deal->id; ?>');">
                                                            <img src="<?php echo base_url() . 'assets/frontend/images/' ?>message.png" alt="Message" class="img-responsive" />
                                                            <span> 
                                                            <img class="callout_msg_brand" src="<?php echo base_url('images/icons/callout_black.gif');?>" />
                                                                Share this and get 1 SWW points from  <?php echo $deal->product_name;?>
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <?php
                                        endforeach;
                                    }else{
                                        ?> <p class="no_result"> No Offers Available for this Brand </p> <?php
                                    }
                                    ?>
                                    <div class="clearfix"></div>
                                </div> <!-- sale part end-->
                                <!-- deal part start-->
                                <div class="list_wrap" id="deal" style="display:none">
                                        <?php
                                        if ($deals) {
                                            foreach ($deals as $deal):
                                                if($deal->item_type == 2):
                                                ?>
                                            <div class="product_wrap">
                                                <div class="product_img">
                                                    <a href="<?php echo base_url();?>home/productDetails/<?php echo $deal->id; ?>"><img src="<?php echo base_url() . 'images/deals/listing/' . $deal->banner; ?>" alt="Product" class="img-responsive" /></a>
                                                </div>
                                                <div class="product_decs">
                                                    <div class="left">
                                                        <!--<h2><strong>Nivea Cream</strong></h2>-->
                                                        <p>Regular Price: <span>$ <?php echo $deal->coupon_price; ?></span></p>
                                                        <p>Sale Price: <span>$15</span></p>
                                                        <div class="coupon">Coupon : Available</div>
                                                        <div class="end">Sale Ends : <span id="defaultCountdown_<?php echo $deal->id; ?>">
							</span></div>
                                                        <div class="contact">
                                                        <div>
                                                            <img src="<?php echo base_url() . 'assets/frontend/images/' ?>pointer_ico.png" alt="Pointer" class="img-responsive" />
                                                            <?php echo $deal->shop_address; ?>
                                                        </div>
                                                        <div>
                                                            <img src="<?php echo base_url() . 'assets/frontend/images/' ?>call_ico.png" alt="Phone" class="img-responsive" /><?php echo $deal->shop_mobile; ?>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="right">
                                                            <div class="map_wrap">
                                                                <?php echo (!empty($deal->shop_location_map)) ? $deal->shop_location_map :'';?>
                                                                <div class="map_bg">Find Us</div>
                                                            </div>
                                                    </div>
                                                    <div class="clearfix"></div>

                                                    
                                                    
                                                   <div class="share">
                                                        <?php $actual_link = base_url()."home/productDetails/".$deal->id; ?>
                                                        <span>Share this deal</span>
                                                         
                                                        <a  onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600,left=350,top=200');return false;" href="http://www.facebook.com/share.php?u=<?php echo $actual_link;?>" class="newtooltip_brand">
                                                            
                                                            <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/facebook.png" alt="Facebook" class="img-responsive" />                                                        
                                                            <span> 
                                                            <img class="callout_brand" src="<?php echo base_url('images/icons/callout_black.gif');?>" />
                                                                Share this and get 1 SWW points from  <?php echo $deal->product_name;?>
                                                            </span>

                                                        </a>
                                                        <a href="http://twitter.com/intent/tweet?text=<?=urlencode('Saleswherewhen :: Online coupons, Deals');?>&url=<?php echo $actual_link;?>" target="_blank" rel="nofollow" style="background-position:-144px -16px" class="option1_16 newtooltip_tweet_brand">
                                                                    <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/twitter.png" alt="Twitter" class="img-responsive" />
                                                                <span> 
                                                                    <img class="callout_tweet_brand" src="<?php echo base_url('images/icons/callout_black.gif');?>" />
                                                                        Share this and get 1 SWW points from  <?php echo $deal->product_name;?>
                                                                    </span>
                                                        </a>
                                                         <?php $image_link =  base_url() . 'images/deals/listing/' . $deal->banner;?>
                                                        <a href="#" class="newtooltip_msg_brand" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" onclick="return sendSubscription('<?php echo current_url(); ?>','<?php echo $image_link; ?>','<?php echo $deal->id; ?>');">
                                                            <img src="<?php echo base_url() . 'assets/frontend/images/' ?>message.png" alt="Message" class="img-responsive" />
                                                            <span> 
                                                            <img class="callout_msg_brand" src="<?php echo base_url('images/icons/callout_black.gif');?>" />
                                                                Share this and get 1 SWW points from  <?php echo $deal->product_name;?>
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <?php
                                            endif;
                                        endforeach;
                                    }
                                    ?>
                                    <div class="clearfix"></div>
                                </div><!-- deal part end-->
                                <!-- coupon part start-->
                                <div class="list_wrap" id="coupon" style="display:none">
                                        <?php
                                        if ($coupons) {
                                            foreach ($coupons as $coupon):
                                                ?>
                                            <div class="product_wrap">
                                                <div class="product_img">
                                                    <a href="<?php echo base_url();?>home/productDetails/<?php echo $coupon->id; ?>"><img src="<?php echo base_url() . 'images/deals/listing/' . $coupon->banner; ?>" alt="Product" class="img-responsive" /></a>
                                                </div>
                                                <div class="product_decs">
                                                    <div class="left">
                                                        <!--<h2><strong>Nivea Cream</strong></h2>-->
                                                        <p>Coupon Price: <span>$ <?php echo $coupon->coupon_price; ?></span></p>
                                                        <!--<p>Sale Price: $15</p>-->
                                                        <div class="coupon">Coupon : Available</div>
                                                        <div class="end">Sale Ends : <span id="defaultCountdown_<?php echo $deal->id; ?>">
							</span></div>
                                                        <div class="contact">
                                                        <div>
                                                            <img src="<?php echo base_url() . 'assets/frontend/images/' ?>pointer_ico.png" alt="Pointer" class="img-responsive" />
                                                            <?php echo $coupon->shop_address; ?>
                                                        </div>
                                                        <div>
                                                            <img src="<?php echo base_url() . 'assets/frontend/images/' ?>call_ico.png" alt="Phone" class="img-responsive" /><?php echo $coupon->shop_mobile; ?>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="right">
                                                            <div class="map_wrap">
                                                                <?php echo (!empty($coupon->shop_location_map)) ? $coupon->shop_location_map :'';?>
                                                                <div class="map_bg">Find Us</div>
                                                            </div>
                                                    </div>
                                                    <div class="clearfix"></div>

                                                    
                                                
                                                    <div class="share">
                                                        <?php $actual_link = base_url()."home/productDetails/".$deal->id; ?>
                                                        <span>Share this deal</span>
                                                         
                                                        <a  onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600,left=350,top=200');return false;" href="http://www.facebook.com/share.php?u=<?php echo $actual_link;?>" class="newtooltip_brand">
                                                            
                                                            <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/facebook.png" alt="Facebook" class="img-responsive" />                                                        
                                                            <span> 
                                                            <img class="callout_brand" src="<?php echo base_url('images/icons/callout_black.gif');?>" />
                                                                Share this and get 1 SWW points from  <?php echo $deal->product_name;?>
                                                            </span>

                                                        </a>
                                                        <a href="http://twitter.com/intent/tweet?text=<?=urlencode('Saleswherewhen :: Online coupons, Deals');?>&url=<?php echo $actual_link;?>" target="_blank" rel="nofollow" style="background-position:-144px -16px" class="option1_16 newtooltip_tweet_brand">
                                                                    <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/twitter.png" alt="Twitter" class="img-responsive" />
                                                                <span> 
                                                                    <img class="callout_tweet_brand" src="<?php echo base_url('images/icons/callout_black.gif');?>" />
                                                                        Share this and get 1 SWW points from  <?php echo $deal->product_name;?>
                                                                    </span>
                                                        </a>
                                                         <?php $image_link =  base_url() . 'images/deals/listing/' . $deal->banner;?>
                                                        <a href="#" class="newtooltip_msg_brand" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" onclick="return sendSubscription('<?php echo current_url(); ?>','<?php echo $image_link; ?>','<?php echo $deal->id; ?>');">
                                                            <img src="<?php echo base_url() . 'assets/frontend/images/' ?>message.png" alt="Message" class="img-responsive" />
                                                            <span> 
                                                            <img class="callout_msg_brand" src="<?php echo base_url('images/icons/callout_black.gif');?>" />
                                                                Share this and get 1 SWW points from  <?php echo $deal->product_name;?>
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <?php
                                        endforeach;
                                    }else{
                                        echo "No Coupons Available";
                                    }
                                    ?>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- coupon part ends-->
                                <div class="col-lg-12">
                                    <nav>
                                      <ul class="pagination">
                                        <?php
                                            if($page_value > 1){
                                                    $pre = $page_value - 1;
                                                    echo '<li><a href="#"  onclick = "return brandPagination('.$pre.');"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>';
                                            }

                                            for($i = 1; $i<= $page; $i++){
                                                    if($page_value == $i){
                                                            echo '<li><a href="" class = "pagi_active" onclick = "return brandPagination('.$i.')">'.$i.'</a></li>';
                                                    }else{
                                                            echo '<li><a href="" onclick = "return brandPagination('.$i.')">'.$i.'</a></li>';
                                                    }
                                            }
                                            if($page_value < $page){
                                                    $next = $page_value + 1;
                                                    echo '<li><a href=""  onclick = "return brandPagination('.$next.');"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>';
                                            }
                                        ?>
                                      </ul>
                                    </nav>
                                    <input type = "hidden" id = "page_value" value = "<?php echo $page_value; ?>">
                                    <input type = "hidden" id = "page_count" value = "<?php echo $page; ?>">
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="clearfix"></div>
                        <?php } ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>



                <div class="clearfix"></div>
            </div>
        </div>
<script>
function displaylist(type,hide1,hide2){
        $("#"+hide1).hide();
        $("#"+hide2).hide();
        $("#"+type).show();
	return false;
}

function brandPagination(page){  
    //alert(page);
    var limit = '3';
    var count = $("#page_count").val();
	//var brand = $("#page_count").val();
	var brand = '1';
    var start = (page - 1) * limit;
    $("#page_value").val(page);
    $.ajax({
        url: "<?php echo base_url('home/paginationBrand'); ?>",
        type: "POST",
        data: {
            start: start,
	    brand: brand
        },
        success: function (response) {
            //alert(response);
            $('#sale').html(response);
            $('.pagination').html("");
            if(page>1){
               var pre = page - 1;
               $(".pagination").append('<li><a href="" onclick = "return brandPagination('+pre+');"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>');
            }
            for(k=1; k<=count; k++){
                if(page == k){
                    $(".pagination").append('<li><a href="" class = "pagi_active" onclick = "return brandPagination('+k+')">'+k+'</a></li>');
                }else{
                    $(".pagination").append('<li><a href="" onclick = "return brandPagination('+k+')">'+k+'</a></li>');
                }
            }
            if(page<count){
                var next = page + 1;
               $(".pagination").append('<li><a href="" onclick = "return brandPagination('+next+');"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>');
            }
        }
    });
    return false;
}

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


            $(document).ready(function () {
             var $jq151 = $.noConflict();			
                $jq151('.exemple3').jRating({
                    step: true,
                    length: 5
                });
                
                $("#brand_review").click(function(){
                    $("#brand_rate").toggle('slow');
                });
                 $("#brand_review_button_submit").click(function(){
                     //alert('hiii');
                          $.ajax({
                            url: "<?php echo base_url('review/reviewForBrand'); ?>",
                            type: "POST", 
                             data: $('form').serialize(),
                            success: function (data) {
                                //alert(data);
                            if (data == 'success')                                    
                                    $("#brand_rate").toggle('slow');                                   
                            }
                    });
                    return false;
                    
                });
                
                

            });
            
            
            
</script>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/scripts/review/jRating.jquery.css" type="text/css" />
<!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/review/jquery.js"></script>-->
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
<link type="text/css" rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>css/popuplogin.css" />
<script type="text/javascript" src="<?php echo base_url() . '/assets/frontend/'; ?>js/jquery.leanModal.min.js"></script>
<script type="text/javascript">
    $("#modal_trigger").leanModal({top: 200, overlay: 0.6, closeButton: ".modal_close"});
    $("#modal_trigger2").leanModal({top: 200, overlay: 0.6, closeButton: ".modal_close"});
    $("#modal_trigger_review").leanModal({top: 200, overlay: 0.6, closeButton: ".modal_close"});
    $("#modal_trigger_write_review").leanModal({top: 200, overlay: 0.6, closeButton: ".modal_close"});
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
<?php $this->load->view('front_include/footer.php'); ?>
