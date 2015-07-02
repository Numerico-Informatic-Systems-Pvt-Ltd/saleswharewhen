<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Saleswherewhen :: Search Result</title>

        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>css/bootstrap-theme.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>css/bootstrap.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>css/style.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>fonts/stylesheet.css" />
        <link rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>css/hint.css">
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/'; ?>css/mgmenu.css" type="text/css" media="screen" />
        <script type="text/javascript" src="<?php echo base_url() . '/assets/frontend/'; ?>js/jquery.min.js"></script>           
        <script type="text/javascript" src="<?php echo base_url() . '/assets/frontend/'; ?>js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url() . '/assets/frontend/'; ?>js/banner/jquery-1.3.js"></script>
        <script type="text/javascript" src="<?php echo base_url() . '/assets/frontend/'; ?>js/banner/jquery.cycle.all.js"></script>
          <script type="text/javascript">
                
                
                function sendSubscription(item_url,image_url,item_id){
                   $("#item_id").val(item_id);
                   $("#image_url").val(image_url);
                   $("#item_url").val(item_url); 

                    }
                                    
          </script>  
    </head>

    <body>

        <div class="container-fluid">
            <div class="container less_pad">
                <?php $this->load->view('front_include/header.php'); ?>
                <?php $this->load->view('front_include/megaMenu'); ?>
                <div class="col-lg-12">
                    <div class="body_top_wrap cd-top" id="top">
                        <div class="col-lg-12 less_pad">
                            <h1>Search Results For <span><?php if(!empty($search_key)){ echo $search_key; } else { echo 'All'; }?></span></h1>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="body_product_wrap" id="search_result_container">
                        <div class="col-lg-12 less_pad"><!-- first_row-->
                            
                            <div class="col-lg-12 less_pad new_cate_list" id="inner_search_content">
                            <?php if(!empty($deals)){
                                foreach($deals as $deal){
                                ?>
                            
                                <div id="ca_list" style="margin-top:5px;">
                                            <div class="city">  <?php echo $deal->city_name; ?>   </div>
                                            <div class="product_wrap">
                                                <div class="product_img col-lg-3">
                                                    <a href="<?php echo base_url() . 'home/productDetails/' . $deal->id; ?>">
                                                        <img src="<?php echo base_url() . 'images/deals/listing/' . $deal->banner; ?>" alt="Product" class="img-responsive" width="100%" />
                                                    </a>
                                                </div>
                                                <div class="product_decs col-lg-9">
                                                    <div class="left col-lg-8">
                                                        <h2>
                                                            <strong><?php if (!empty($deal->product_name)) {
                                                            echo $deal->product_name;
                                                        } else {
                                                            echo $deal->shop_name;
                                                        } ?></strong>
                                                        </h2>

                                                        <div class="offer">
                                                    <?php echo $deal->deal_text; ?>                                                            
                                                        </div>

                                                        <div class="contact">
                                                            <div>
                                                                <div class="image"><img src="<?php echo base_url() . 'assets/frontend/images/' ?>pointer_ico.png" alt="Pointer" class="img-responsive" /></div>
                                                                <div class="content"><?php echo $deal->shop_address; ?></div>

                                                            </div>
                                                            <div>

                                                                <div class="content"><?php echo substr($deal->description, 0, 600); ?></div>

                                                            </div>

                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="right col-lg-4">
                                                        <p>Price: <span>$ <?php echo $deal->coupon_price; ?></span></p>
                                                        <p>Valid Till: <span><?php echo $deal->valid_till; ?></span></p>

                                                        <div class="btn_buy">
                                                            <a href="<?php echo base_url() . 'home/productDetails/' . $deal->id; ?>">View Details</a>
                                                        </div>
                                                            <?php $actual_link = base_url() . "home/productDetails/" . $deal->id; ?>
                                                            <?php $image_link = base_url() . 'images/deals/' . $deal->banner; ?>
                                                        <div class="share">
                                                            <span>Share this deal</span>

                                                            <a class="newtooltip_brand" href="http://www.facebook.com/share.php?u=<?php echo $actual_link; ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600,left=350,top=200');
                                                                    return false;">

                                                                <img class="img-responsive" alt="Facebook" src="<?php echo base_url() . '/assets/frontend/'; ?>images/facebook.png"/>                                                        
                                                                <span> 
                                                                    <img src="<?php echo base_url('images/icons/callout_black.gif'); ?>" class="callout_brand">
                                                                        Share this and get 1 SWW points from <?php echo $deal->shop_name ?></span>
                                                            </a>
                                                            <a class="option1_16 newtooltip_tweet_brand" style="background-position:-144px -16px" rel="nofollow" target="_blank" href="http://twitter.com/intent/tweet?text=<?= urlencode('Saleswherewhen :: Online coupons, Deals'); ?>&url=<?php echo $actual_link; ?>">
                                                                <img class="img-responsive" alt="Twitter" src="<?php echo base_url() . '/assets/frontend/'; ?>images/twitter.png">
                                                                    <span> 
                                                                        <img src="<?php echo base_url('images/icons/callout_black.gif'); ?>" class="callout_tweet_brand">
                                                                            Share this and get 1 SWW points from  <?php echo $deal->shop_name ?>                                                                    </span>
                                                            </a>
                                                            <a onclick="return sendSubscription('<?php echo $actual_link; ?>', '<?php echo $image_link; ?>', '<?php echo $deal->id; ?>');" data-whatever="@mdo" data-target="#exampleModal" data-toggle="modal" class="newtooltip_msg_brand" href="#">
                                                                <img class="img-responsive" alt="Message" src="<?php echo base_url(); ?>assets/frontend/images/message.png">
                                                                    <span> 
                                                                        <img src="<?php echo base_url('images/icons/callout_black.gif'); ?>" class="callout_msg_brand">
                                                                            Share this and get 1 SWW points from <?php echo $deal->shop_name ?>                                                       </span>
                                                            </a>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="clearfix"></div>



                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                
                            
                                <?php } 
                                
                                }else{ ?>
                        <p class="no_result"> No Results Found </p>
                       <?php } ?>
                        <div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<?php if(!empty($deals)){ ?>
<div class="col-lg-12">
        <nav>
            <ul class="pagination">
              <?php
                  if($page_value > 1){
                      $pre = $page_value - 1;
                      echo '<li><a href="#"  onclick = "return innerSearchPagination('.$pre.');"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>';
                  }

                  for($i = 1; $i<= $page; $i++){
                      if($page_value == $i){
                          echo '<li><a href="" class = "pagi_active" onclick = "return innerSearchPagination('.$i.')">'.$i.'</a></li>';
                      }else{
                          echo '<li><a href="" onclick = "return innerSearchPagination('.$i.')">'.$i.'</a></li>';
                      }
                  }
                  if($page_value < $page){
                      $next = $page_value + 1;
                      echo '<li><a href=""  onclick = "return innerSearchPagination('.$next.');"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>';
                  }
              ?>
            </ul>
        </nav>
    <input type="hidden" value="9" id="category">
        <input type = "hidden" id = "page_value" value = "<?php echo ($page_value) ? $page_value :0; ?>">
        <input type = "hidden" id = "page_count" value = "<?php echo ($page) ? $page :0; ?>">
        <input type = "hidden" id = "key" value = "<?php echo ($search_key) ? $search_key :0; ?>">
        
</div>
<?php } ?>
<div class="clearfix"></div>
                        </div><!-- end of first_row-->
                        <div class="clearfix"></div>
                        </div>
                        
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
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
<?php $this->load->view('front_include/footer.php'); ?>
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
