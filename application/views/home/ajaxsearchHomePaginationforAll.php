<?php
if (!empty($homeSearchResult)) {
    $i = 0;
    foreach ($homeSearchResult as $Searchdeals) {
        ?>
        <div class="product_wrap">
            <div class="all_search">
                <div class="col-lg-2 less_pad">
                    <!--<a href="<?php echo base_url().'home/dealsByRetailer/'.$Searchdeals->shop_id;?>">-->
                        <img src="<?php echo base_url() . 'images/shop/' . $Searchdeals->shop_logo; ?>" alt="Product" class="img-responsive" />
                    <!--</a>-->
                </div>
                <div class="col-lg-2">
                    <a href="<?php echo base_url().'home/productDetails/'.$Searchdeals->id;?>"><img src="<?php echo base_url() . 'images/deals/listing/' . $Searchdeals->banner; ?>" alt="Product" class="img-responsive" /></a>
                </div>
                <div class="col-lg-6 less_pad">
                    <div class="col-lg-4">
                        <h2><strong><?php echo $Searchdeals->product_name; ?></strong></h2>
                        <p>Regular Price: $ <?php echo $Searchdeals->coupon_price; ?></p>
                        <p>Sale Price: $ <?php echo $Searchdeals->coupon_price; ?></p>
                    </div>
                    <div class="col-lg-4 rt_pad">
                        <div class="end">Sale Start : <span><?php echo $Searchdeals->valid_from; ?></span></div>
                        <div class="end">Sale Ends : <span><?php echo $Searchdeals->valid_till; ?></span></div>
                    </div>
                    <div class="col-lg-4 less_pad">
                        <div class="contact">
                            <div>
                                <img src="<?php echo base_url() . 'images/icons/pointer_ico.png'; ?>" alt="Pointer" class="img-responsive" />
                                <?php echo $Searchdeals->shop_address; ?>
                            </div>
                            <div>
                                <img src="<?php echo base_url() . 'images/icons/call_ico.png'; ?>" alt="Phone" class="img-responsive" /><?php echo $Searchdeals->shop_mobile; ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-lg-2 less_pad">
                    <div class="map_wrap">
                        <?php echo $Searchdeals->shop_location_map; ?>
                        <div class="map_bg">Find Us</div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div> 
        <?php
    }
} else {
    echo "<p class='no_result'>No Results Found</p>";
}
?>


<div class="clearfix"></div>