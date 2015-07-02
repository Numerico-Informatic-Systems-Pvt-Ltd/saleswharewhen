<?php
if ($deals) {
    foreach ($deals as $deal):
        ?>
        <div class="product_wrap">
            <div class="product_img">
                <a href="#"><img src="<?php echo base_url() . 'images/deals/listing/' . $deal->banner; ?>" alt="Product" class="img-responsive" /></a>
            </div>
            <div class="product_decs">
                <div class="left">
                    <h2>
                        <strong>
                            <?php
                            if ($deal->item_type == 1 || $deal->item_type == 4) {
                                echo $deal->product_name;
                            } else {
                                echo $deal->deal_text;
                            }
                            ?>
                        </strong>
                    </h2>
                    <p>Regular Price: $ <?php echo $deal->coupon_price; ?></p>
                    <div class="coupon">
                        <?php
                        if ($deal->item_type == 3):
                            echo "Coupon : Available";
                        endif;
                        ?>

                    </div>
                    <?php
                    $tillDate = date('Y-m-d', strtotime($deal->valid_till));
                    ?>

                    <div class="end">Sale Ends : <span class="defaultCountdown"></span></div>
                    <div class="clearfix"></div>
                </div>
                <div class="right">
                    <div class="map_wrap">
                        <?php echo (!empty($deal->shop_location_map)) ? $deal->shop_location_map : ''; ?>
                        <div class="map_bg">Find Us</div>
                    </div>
                </div>
                <div class="clearfix"></div>

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
                <?php
                if ($deal->item_type == 1 || $deal->item_type == 4):
                    ?>
                    <div class="btn_buy">
                        <a href="#">Buy Now</a>
                    </div>
                <?php endif; ?>
                <div class="share">
                    <?php $actual_link = base_url() . "home/productDetails/" . $deal->id; ?>
                    <span>Share this deal</span>
                    <a  onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600,left=350,top=200');
                                                                        return false;" href="http://www.facebook.com/share.php?u=<?php echo $actual_link; ?>"  class=" newtooltip">
                        <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/facebook.png" alt="Facebook" class="img-responsive" />
                        <span> 
                            <img class="callout" src="<?php echo base_url('images/icons/callout_black.gif'); ?>" />
                            Share this and get 1 SWW points from  <?php echo $deal->shop_name; ?>
                        </span>

                    </a>
                    <a   href="http://twitter.com/intent/tweet?text=<?= urlencode('Saleswherewhen :: Online coupons, Deals'); ?>&url=<?php echo $actual_link; ?>" target="_blank" rel="nofollow" style="background-position:-144px -16px" class="option1_16 newtooltip_tweet" title="">

                        <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/twitter.png" alt="Twitter" class="img-responsive" />
                        <span> 
                            <img class="callout_tweet" src="<?php echo base_url('images/icons/callout_black.gif'); ?>" />
                            Share this and get 1 SWW points from  <?php echo $deal->shop_name; ?>
                        </span>
                    </a>
                    <?php $image_link = base_url().'images/deals/listing/'.$deal->banner;?>
                    <a href="#" class=" newtooltip_msg" class=" newtooltip_msg" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" onclick="return sendSubscription('<?php echo $actual_link; ?>','<?php echo $image_link; ?>','<?php echo $deal->id; ?>');">
                        <img src="<?php echo base_url() . 'assets/frontend/images/' ?>message.png" alt="Message" class="img-responsive" />
                        <span> 
                            <img class="callout_msg" src="<?php echo base_url('images/icons/callout_black.gif'); ?>" />
                            Share this and get 1 SWW points from  <?php echo $deal->shop_name; ?>
                        </span>
                    </a>
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
                                <form action="<?php echo base_url(''); ?>" method="post">
                                    <input type="hidden" name="item_url" id="item_url" value=""/>
                                    <input type="hidden" name="image_url" id="image_url" value=""/>
                                    <input type="hidden" name="item_id" id="item_id" value=""/>
                                    <input type="hidden" name="current_url" id="current_url" value="<?php echo current_url(); ?>"/>
                                    <div class="form-group">
                                        <input type="email" class="popup_input" id="emailid" required name="emailid" placeholder="Enter your friend's email address"/>
                                    </div>
                                    <input type="submit" class="popup_btn"  id="subscribe_product" value="Submit"/>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <?php
    endforeach;
}
?>
<div class="clearfix"></div>
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
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
    window.twttr = (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0], t = window.twttr || {};
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://platform.twitter.com/widgets.js";
        fjs.parentNode.insertBefore(js, fjs);
        t._e = [];
        t.ready = function (f) {
            t._e.push(f);
        };
        return t;
    }(document, "script", "twitter-wjs"));
</script>

<script type="text/javascript">
function sendSubscription(item_url,image_url,item_id){
    $("#item_id").val(item_id);
    $("#image_url").val(image_url);
    $("#item_url").val(item_url); 

     }
</script>
