<?php
if (!empty($deals)) {
    foreach ($deals as $deal){
        ?>

        <div class="col-lg-3">
            <div class="search_row">
                <div class="bg">
                    <a href="<?php echo base_url() . 'home/productDetails/' . $deal->id; ?>">
                        <img src="<?php echo base_url() . 'images/deals/listing/' . $deal->banner; ?>" alt="Product" class="img-responsive" width="100%" />
                    </a>
                </div>
                <div class="content">
                <?php echo $deal->deal_text; ?>
                </div>
                <div class="logo">
                    <a href="<?php echo base_url() . 'home/dealsByRetailer/' . $deal->brandId; ?>">
                        <img src="<?php echo base_url() . 'images/brands/' . $deal->brand_logo; ?>" alt="Company Logo" class="img-responsive" />
                    </a>
                </div>
                <?php $actual_link = base_url()."home/productDetails/".$deal->id; ?>
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
                                <input type="text" class="popup_input" id="emailid" required name="emailid" placeholder="Enter your friend's email address"/>
                            </div>
                                  <input type="submit" class="popup_btn"  id="subscribe_product" value="Submit"/>
                          </form>
                        </div>

                      </div>
                    </div>
              </div>
                <div class="social">
                    <a  onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600,left=350,top=200');return false;" href="http://www.facebook.com/share.php?u=<?php echo $actual_link;?>"  class="newtooltip">
                        
                        <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/facebook.png" alt="Facebook" class="img-responsive" />
                            <span> 
                            <img class="callout" src="<?php echo base_url('images/icons/callout_black.gif');?>" />
                                Share this and get 1 SWW points from  <?php echo $deal->shop_name?>
                            </span>

                    </a>
                    
                    <a   href="http://twitter.com/intent/tweet?text=<?=urlencode('Saleswherewhen :: Online coupons, Deals');?>&url=<?php echo $actual_link;?>" target="_blank" rel="nofollow" style="background-position:-144px -16px" class="option1_16 newtooltip_tweet" >
                                <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/twitter.png" alt="Twitter" class="img-responsive" />
                            <span> 
                            <img class="callout_tweet" src="<?php echo base_url('images/icons/callout_black.gif');?>" />
                                Share this and get 1 SWW points from  <?php echo $deal->shop_name?>
                            </span>
                    
                    </a>
                    <?php $image_link =  base_url() . 'images/deals/listing/' . $deal->banner;?>
                    <a href="#" class=" newtooltip_msg" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" onclick="return sendSubscription('<?php echo current_url(); ?>','<?php echo $image_link; ?>','<?php echo $deal->id; ?>');">
                        
                        <img src="<?php echo base_url(); ?>assets/frontend/images/message.png" alt="Message" class="img-responsive" />
                        <span> 
                            <img class="callout_msg" src="<?php echo base_url('images/icons/callout_black.gif');?>" />
                                Share this and get 1 SWW points from  <?php echo $deal->shop_name?>
                            </span>
                    </a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>


    <?php }
} else {
    ?>
    <p class="no_result"> No Results Found </p>
<?php } ?>
<div class="clearfix"></div>
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

  <script type="text/javascript">
                
                
                function sendSubscription(item_url,image_url,item_id){
                   $("#item_id").val(item_id);
                   $("#image_url").val(image_url);
                   $("#item_url").val(item_url); 

                    }
                                    
          </script>
