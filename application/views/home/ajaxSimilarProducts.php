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
                    <div>Details:<?php echo $similarDeal->short_description; ?><span></span></div>
                    <p>Name :<?php echo $similarDeal->brand_name; ?></p>
                    <p>Price :<?php echo $similarDeal->coupon_price; ?></p>
                    <p>Retailer :<?php echo $similarDeal->shop_name; ?></p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <?php
    endforeach;
}
?>
