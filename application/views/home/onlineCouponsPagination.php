<?php
if (!empty($onlineCoupons)) { $i=0;
    foreach ($onlineCoupons as $deal) {
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
                            <strong><?php
                                if (!empty($deal->product_name)) {
                                    echo $deal->product_name;
                                } else {
                                    echo $deal->shop_name;
                                }
                                ?></strong>
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
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
                        <?php $i++;
                                        if ($i == 5) {
                                            ?>
                                            <?php if (!empty($advertisement)) { ?>
                                                <div class="clearfix"></div>
                                                <div class="col-lg-12 less_pad">


                                                    <div class="item1" style="margin:15px 0px;">
                                                        <img src="<?php echo base_url() . 'images/advertisements/' . $advertisement->adv_image; ?>" alt="Adds" class="img-responsive" width="100%" height="200px" style="border:3px solid #b9b9b9; box-shadow:0px 3px 5px #666;">

                                                    </div>


                                                </div>
                                                <div class="clearfix"></div>
                                        <?php }
                                    } ?>
    <?php
    }
} else {
    ?>
    <p class="no_result"> No Results Found </p>
<?php } ?>

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