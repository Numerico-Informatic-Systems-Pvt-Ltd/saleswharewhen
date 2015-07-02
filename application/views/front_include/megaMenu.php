<?php //echo '<pre>'; print_r($categoryMegamenu);?>
<div class="col-lg-12">
    <div class="inner_top_wrap">
        <div class="col-lg-4">
            <div id="mgmenu1" class="mgmenu_container"><!-- Begin Mega Menu Container -->

                <ul class="mgmenu"><!-- Begin Mega Menu -->

                    <li class="mgmenu_button">Mega Menu</li><!-- Button (Mobile Devices) -->

                    <li><a href="<?php  echo base_url('home'); ?>">Home</a></li>

                    <li><span>Nearby Deals</span><!-- Begin Item -->


                        <div class="dropdown_container dropdown_12columns"><!-- Begin Item Container -->


                            <?php foreach ($categoryMegamenu as $mancategory){ 
                                if($mancategory->parent_id == 0) {
                                ?>
                            <div class="col_4">
                                <h5>
                                    <!--<img src="<?php echo base_url() . '/assets/frontend/'; ?>images/beauty_ico.png" alt="Travel" class="img-responsive" />-->
                                    
                                    <span><?php if($mancategory->parent_id == 0) { echo $mancategory->category; } ?></span>
                                </h5>
                               
                                <div class="clearfix"></div>
                                <ul>
                                    <?php foreach ($categoryMegamenu as $subcat) { 
                                    //print_r($subcat);
                                        if($subcat->parent_id == $mancategory->id) {
                                        ?>
                                    
                                    <!--<li><a href="<?php echo base_url().'home/listing/'.$subcat->id;?>" class="near_by_deals"><?php echo $subcat->category; ?></a></li>-->
                                    <li><a link="<?php echo base_url().'home/listing/'.$subcat->id;?>" class="near_by_deals"><?php echo $subcat->category; ?></a></li>
                                    
                                        <?php } } ?>
                                </ul>

                            </div>
                            <?php } } ?>
                        </div><!-- End Item Container -->


                    </li><!-- End Item -->



                    <li><span>Shopping Offers</span><!-- Begin Item -->


                        <div class="dropdown_container dropdown_5columns"><!-- Begin Item Container -->


                            <div class="col_6">
                                <div class="top_part">
                                    <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/grocery_ico.png" alt="Grocery" class="img-responsive" /><a link="<?php echo base_url('grocery/offers'); ?>" class="near_by_deals_grocery">Grocery Shopping</a>
                                </div>
                            </div>
                            <div class="col_6">
                                <div class="top_part">
                                    <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/coupon_ico.png" alt="Coupon" class="img-responsive" /><a link="<?php echo base_url('home/onlineCouponsOffers'); ?>" class="near_by_deals_coupons">Online Coupons</a>
                                </div>
                            </div>


                        </div><!-- End Item Container -->


                    </li><!-- End Item -->

                </ul><!-- End Mega Menu -->
            </div><!-- End Mega Menu Container -->
        </div>
        <div class="col-lg-3">
            <div class="location_wrap">
                <strong class="pull-left">I am in</strong>
                <div class="inner_top_select pull-left">
                    <select id="city_id">  
                        <option value="notselected">--Select City--</option>
                        <?php foreach ($city_list as $city) {?>
                        <option value="<?php echo $city->city_id; ?>"><?php echo $city->city_name; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-lg-5 inner_search">
            <form class="form-inline" method="get" action="<?php echo base_url() . 'home/search'; ?>" >
                <div class="form-group" style="width:88%;">
                    <input type="text" name="search_key" class="form-control inner_top_input" value="" onkeyup="return Suggestion(this.value)" id="search_text" autocomplete="off" placeholder="Search Text">
                </div>
                <input type="submit" class="inner_top_btn" value="Go">
            </form>
            <div id="suggetion_box" style='display:none;'>

            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<script>
$( ".near_by_deals" ).click(function() {           
                
                var city = $("#city_id").val();                
                if(city!='notselected'){
                   var href = $(this).attr("link");             
                var link = href+'/'+city;
                //alert(link);
                window.open(link,"_self");                
                
                }
                else{
                 bootbox.alert("Select Your City"); 
                 return false;
                }               
                
           
        });
        
    $(".near_by_deals_coupons").click(function(){
        var city = $("#city_id").val();
        var href = $(this).attr("link");
        if(city!='notselected'){                             
                var link = href+'/'+city;               
                window.open(link,'_self'); 
                }else {
                   
                    var link = href;  
                    window.open(link,'_self'); 

                }
                
                
    });
    
    $(".near_by_deals_grocery").click(function(){
        var city = $("#city_id").val();
        
        var href = $(this).attr("link");
        if(city!='notselected'){                             
                var link_page = href+'/'+city; 
                 
                window.open(link_page,'_self'); 
                }else {
                   
                    var link_page = href;  
                    window.open(link_page,'_self'); 

                }
    });
    
</script>