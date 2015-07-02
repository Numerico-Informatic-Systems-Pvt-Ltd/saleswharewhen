<div class="col-lg-12 pagination_results">
<?php 
if(!empty($groceries)){
    
foreach ($groceries as $grocery) {
    ?>
<div id="ca_list" style="margin-top:5px;">
            <div class="city">  <?php echo $grocery->city_name; ?>   </div>
            <div class="product_wrap">
                <div class="product_img col-lg-3">
                    <a href="<?php echo base_url() . 'home/productDetails/' . $grocery->id; ?>">
                        <img src="<?php echo base_url() . 'images/deals/listing/' . $grocery->banner; ?>" alt="Product" class="img-responsive" width="100%" />
                    </a>
                </div>
                <div class="product_decs col-lg-9">
                    <div class="left col-lg-8">
                        <h2>
                            <strong><?php
                                if (!empty($grocery->product_name)) {
                                    echo $grocery->product_name;
                                } else {
                                    echo $grocery->shop_name;
                                }
                                ?></strong>
                        </h2>

                        <div class="offer">
                    <?php echo $grocery->deal_text; ?>                                                            
                        </div>

                        <div class="contact">
                            <div>
                                <div class="image"><img src="<?php echo base_url() . 'assets/frontend/images/' ?>pointer_ico.png" alt="Pointer" class="img-responsive" /></div>
                                <div class="content"><?php echo $grocery->shop_address; ?></div>

                            </div>
                            <div>

                                <div class="content"><?php if (strlen($grocery->description) > 300) {
            echo substr($grocery->description, 0, 300) . '...';
        } else {
            echo substr($grocery->description, 0, 300);
        } ?></div>

                            </div>

                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="right col-lg-4">
                        <p>Price: <span>$ <?php echo $grocery->coupon_price; ?></span></p>
                        <p>Valid Till: <span><?php echo $grocery->valid_till; ?></span></p>

                        <div class="btn_buy">
                            <a href="<?php echo base_url() . 'home/productDetails/' . $grocery->id; ?>">View Details</a>
                        </div>
                               <?php $actual_link = base_url() . "home/productDetails/" . $grocery->id; ?>
        <?php $image_link = base_url() . 'images/deals/' . $grocery->banner; ?>
                        <div class="share">
                            <span>Share this deal</span>

                            <a class="newtooltip_brand" href="http://www.facebook.com/share.php?u=<?php echo $actual_link; ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600,left=350,top=200');
                                    return false;">

                                <img class="img-responsive" alt="Facebook" src="<?php echo base_url() . '/assets/frontend/'; ?>images/facebook.png"/>                                                        
                                <span> 
                                    <img src="<?php echo base_url('images/icons/callout_black.gif'); ?>" class="callout_brand">
                                    Share this and get 1 SWW points from <?php echo $grocery->shop_name ?></span>
                            </a>
                            <a class="option1_16 newtooltip_tweet_brand" style="background-position:-144px -16px" rel="nofollow" target="_blank" href="http://twitter.com/intent/tweet?text=<?= urlencode('Saleswherewhen :: Online coupons, Deals'); ?>&url=<?php echo $actual_link; ?>">
                                <img class="img-responsive" alt="Twitter" src="<?php echo base_url() . '/assets/frontend/'; ?>images/twitter.png">
                                <span> 
                                    <img src="<?php echo base_url('images/icons/callout_black.gif'); ?>" class="callout_tweet_brand">
                                    Share this and get 1 SWW points from  <?php echo $grocery->shop_name ?>                                                                    </span>
                            </a>
                            <a onclick="return sendSubscription('<?php echo $actual_link; ?>', '<?php echo $image_link; ?>', '<?php echo $grocery->id; ?>');" data-whatever="@mdo" data-target="#exampleModal" data-toggle="modal" class="newtooltip_msg_brand" href="#">
                                <img class="img-responsive" alt="Message" src="<?php echo base_url(); ?>assets/frontend/images/message.png">
                                <span> 
                                    <img src="<?php echo base_url('images/icons/callout_black.gif'); ?>" class="callout_msg_brand">
                                    Share this and get 1 SWW points from <?php echo $grocery->shop_name ?>                                                       </span>
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
<p class="no_result">No Results Found</p>
<?php 

}
?>
</div>
<div class="clearfix"></div>
<div class="col-lg-12">
    <nav>
      <ul class="pagination">
        <?php
            if($page_value > 1){
                $pre = $page_value - 1;
                echo '<li><a href="#"  onclick = "return Pagination('.$pre.');"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>';
            }

            for($i = 1; $i<= $page; $i++){
                if($page_value == $i){
                    echo '<li><a href="" class = "pagi_active" onclick = "return Pagination('.$i.')">'.$i.'</a></li>';
                }else{
                    echo '<li><a href="" onclick = "return Pagination('.$i.')">'.$i.'</a></li>';
                }
            }
            if($page_value < $page){
                $next = $page_value + 1;
                echo '<li><a href=""  onclick = "return Pagination('.$next.');"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>';
            }
        ?>
      </ul>
    </nav>
    <input type = "hidden" id = "page_value" value = "<?php echo $page_value; ?>">
    <input type = "hidden" id = "page_count" value = "<?php echo $page; ?>">
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