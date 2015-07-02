
<?php
if (!empty($trending_offers)) {
    foreach ($trending_offers as $troffers) {
        ?>
        <div class="col-lg-3">
            <div class="product_wrap">
                <?php
                if ($troffers->item_type == 4) {
                    $item_details_url = base_url() . 'grocery/groceryDetails/' . $troffers->id;
                } else {
                    $item_details_url = base_url() . 'home/productDetails/' . $troffers->id;
                }
                ?>                                                           
                <a href="<?php echo $item_details_url; ?>" class="">  

                    <img src="<?php echo base_url() . 'images/deals/special/' . $troffers->banner; ?>" alt="<?php echo $troffers->shop_name; ?>" title="<?php echo $troffers->shop_name . '-' . $troffers->deal_text; ?>" class="img-responsive " />

                    <div class="trade_info">
                        <strong><?php echo $troffers->deal_text; ?></strong> 
                    </div>

                </a>
            </div>
        </div>
    <?php } ?>
<?php } ?>

