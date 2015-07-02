<?php
if (!empty($homeSearchResult)) {
    $i = 0;
    foreach ($homeSearchResult as $Searchdeals) {
       
            ?>
            <div class="product_wrap">
                <div class="product_img">
                    <a href="<?php echo base_url() . 'home/productDetails/' . $Searchdeals->id; ?>">
                        <img src="<?php echo base_url() . 'images/deals/listing/' . $Searchdeals->banner; ?>" alt="Product" class="img-responsive" />
                    </a>
                </div>
                <div class="product_decs">
                    <div class="left">
                        <h2><strong><?php if (!empty($Searchdeals->product_name)) {
                echo $Searchdeals->product_name;
            } ?></strong></h2>
                        <p>Regular Price: $ <?php echo $Searchdeals->coupon_price; ?></p>
                        <p>Sale Price: $ <?php echo $Searchdeals->coupon_price; ?></p>
                        <div class="coupon">Coupon : Available</div>
                        <div class="end">Sale Ends : <span><?php echo $Searchdeals->valid_till; ?></span></div>
                        <div class="contact">
                            <div>
                                <img src="<?php echo base_url() . 'images/icons/pointer_ico.png'; ?>" alt="Pointer" class="img-responsive" />
            <?php echo $Searchdeals->shop_address; ?>
                            </div>
                            <div>
                                <img src="<?php echo base_url() . 'images/icons/call_ico.png'; ?>" alt="Phone" class="img-responsive" />
            <?php echo $Searchdeals->shop_mobile; ?> 
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="right">
                        <div class="map_wrap">
            <?php echo (!empty($Searchdeals->shop_location_map)) ? $Searchdeals->shop_location_map : ''; ?>
                            <div class="map_bg">Find Us</div>
                        </div>
                    </div>
                    <div class="clearfix"></div>


                    <div class="btn_buy">
                        <a href="<?php echo base_url() . 'home/productDetails/' . $Searchdeals->id; ?>">Buy Now</a>
                    </div>

            <?php $actual_link = base_url() . "home/productDetails/" . $Searchdeals->id; ?>
            <?php $image_link = base_url() . 'images/deals/listing/' . $Searchdeals->banner; ?>
                    <div class="share">
                        <span>Share this deal</span>

                        <a class="newtooltip_brand" href="http://www.facebook.com/share.php?u=<?php echo $actual_link; ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600,left=350,top=200');
                                                                            return false;">

                            <img class="img-responsive" alt="Facebook" src="<?php echo base_url() . '/assets/frontend/'; ?>images/facebook.png"/>                                                        
                            <span> 
                                <img src="<?php echo base_url('images/icons/callout_black.gif'); ?>" class="callout_brand">
                                Share this and get 1 SWW points from <?php echo $Searchdeals->shop_name ?></span>
                        </a>
                        <a class="option1_16 newtooltip_tweet_brand" style="background-position:-144px -16px" rel="nofollow" target="_blank" href="http://twitter.com/intent/tweet?text=<?= urlencode('Saleswherewhen :: Online coupons, Deals'); ?>&url=<?php echo $actual_link; ?>">
                            <img class="img-responsive" alt="Twitter" src="<?php echo base_url() . '/assets/frontend/'; ?>images/twitter.png">
                            <span> 
                                <img src="<?php echo base_url('images/icons/callout_black.gif'); ?>" class="callout_tweet_brand">
                                Share this and get 1 SWW points from  <?php echo $Searchdeals->shop_name ?>                                                                    </span>
                        </a>
                        <a onclick="return sendSubscription('<?php echo $actual_link; ?>', '<?php echo $image_link; ?>', '<?php echo $Searchdeals->id; ?>');" data-whatever="@mdo" data-target="#exampleModal" data-toggle="modal" class="newtooltip_msg_brand" href="#">
                            <img class="img-responsive" alt="Message" src="<?php echo base_url(); ?>assets/frontend/images/message.png">
                            <span> 
                                <img src="<?php echo base_url('images/icons/callout_black.gif'); ?>" class="callout_msg_brand">
                                Share this and get 1 SWW points from <?php echo $Searchdeals->shop_name ?>                                                       </span>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <?php
        
    }
} else {
    echo "<p class='no_result'>No Results Found</p>";
}
?>


<div class="clearfix"></div>