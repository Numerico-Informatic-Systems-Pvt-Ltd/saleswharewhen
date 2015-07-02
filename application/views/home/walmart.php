<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Saleswherewhen :: Walmart</title>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/'; ?>css/bootstrap-theme.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/'; ?>css/bootstrap.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/'; ?>css/style.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/'; ?>fonts/stylesheet.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/'; ?>css/jquery.countdown.css" />
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/'; ?>css/mgmenu.css" type="text/css" media="screen" />
        <script type="text/javascript" src="<?php echo base_url() . 'assets/frontend/'; ?>js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/frontend/'; ?>js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/frontend/'; ?>js/jquery.plugin.js"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/frontend/'; ?>js/jquery.countdown.js"></script>
        <script>
            $(document).ready(function ($) {
                $('#mgmenu1').universalMegaMenu({
                    menu_effect: 'hover_fade',
                    menu_speed_show: 300,
                    menu_speed_hide: 200,
                    menu_speed_delay: 200,
                    menu_click_outside: false,
                    menubar_trigger: false,
                    menubar_hide: false,
                    menu_responsive: true
                });
                megaMenuContactForm();
            });
        </script>
        <script type="text/javascript">


            function sendSubscription(item_url, image_url, item_id) {
                $("#item_id").val(item_id);
                $("#image_url").val(image_url);
                $("#item_url").val(item_url);

            }

            function changeCategoryPage(category) {
                if (category) {
                    window.location = '/home/listing/' + category; // redirect
                }
            }

        </script>        
    </head>

    <body>

        <div class="container-fluid">
            <div class="container less_pad">
                <?php $this->load->view('front_include/header.php'); ?>
                <?php $this->load->view('front_include/megaMenu'); ?>
                <div class="col-lg-12">
                    <div class="col-lg-10">
                        <div class="bazar_right">
                            <div class="product_list_wrap">
                                <div class="list_wrap">
                                    
                                        <div class="walmart_top_wrap">
                                            <div class="col-lg-2 rt_pad">
                                                <div class="search_part">
                                                    <h2>You Searched :</h2>
                                                    <?php if (!empty($arr_search) && $searchResult != 0) { ?>
                                                    <p>For: <span><?php echo ($arr_search['ser_key'])?$arr_search['ser_key']:$homeSearchResult[0]->product_name; ?></span></p>
                                                    <p>At: <span><?php echo $homeSearchResult[0]->shop_name; ?></span></p>
                                                    <p>In: <span><?php echo $homeSearchResult[0]->city_name; ?></span></p>
                                                    <?php } ?>
                                                    <h2>Modify Search ?</h2>
                                                    <input type="text" value="" id="wall_mart_ser_key" class="walmart_input" placeholder="Enter Search Item" />
                                                    <div class="walmart_select">
                                                        <select id="retailer_id_wallmart" name="brand">
                                                            <option value="0">--Retailer--</option>
                                                            <option value="0">All</option>                                                
                                                            <?php foreach ($shop_list as $shop){ ?>
                                                                <option value="<?php echo $shop->id; ?>"><?php echo $shop->shop_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="walmart_select">
                                                        <select id="city_wallmart" name="city">
                                                            <option value="0">--City--</option>                                                 
                                                            <?php foreach ($city_list as $city){ ?>
                                                                <option value="<?php echo $city->city_id; ?>"><?php echo $city->city_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class=" walmart_select">
                                                        <select id="wallmart_item" name="category">
                                                        <option value="0">--SELECT--</option>
                                                        <option value="0">All</option>
                                                        <option value="3">COUPONS</option>
                                                        <option value="2">DEALS</option>
                                                        <option value="5">GARAGESALES</option>                                                
                                                        <option value="1">SALES</option>                                         
                                                        <option value="6">YARDSALES</option>
                                                    </select>
                                                        
                                                    </div>
                                                    <div class="btn_buy"><a href="" onclick="return wallmartSearch();">Go</a></div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                            <?php if(!empty($arr_search)){ ?>
                                            <input type="hidden" id="category" value="<?php echo $arr_search['look_for']; ?>"/>
                                            <input type="hidden" id="retailer_id_home" value="<?php  echo $arr_search['retailer']; ?>"/>
                                            <input type="hidden" id="location" value="<?php echo $arr_search['city']; ?>"/>
                                            <span id="serarch_key_value" style="display: none;"><?php echo $arr_search['ser_key']; ?></span>
                                            
                                           <?php }?>
                                            <?php //print_r($homeSearchResult);
                                            //print_r($arr_search);
                                            //print_r($searchResult);
                                            if (!empty($arr_search) && $searchResult != 0) {
                                                ?>
                                            <div class="col-lg-10">
                                                <div class="product_img">
                                                    <a href="<?php echo base_url().'home/productDetails/'.$homeSearchResult[0]->id;?>">
                                                    <img src="<?php echo base_url().'images/deals/listing/'.$homeSearchResult[0]->banner; ?>" alt="Mobile" class="img-responsive" />
                                                    </a>
                                                </div>
                                                <div class="product_details">
                                                    <img src="<?php echo base_url().'images/shop/'.$homeSearchResult[0]->logo_thumb; ?>" alt=" Logo"  class="img-responsive" width="95px"/>
                                                    <h3><?php echo $homeSearchResult[0]->product_name; ?></h3>
                                                    <p>Regular Price: $ <?php echo $homeSearchResult[0]->coupon_price; ?></p>
                                                    <p>Sale Price: $ <?php echo $homeSearchResult[0]->coupon_price; ?></p>
                                                    <p>Sale Duration : <?php echo $homeSearchResult[0]->valid_from; ?> till <?php echo $homeSearchResult[0]->valid_till; ?></p>
                                                    

                                                    <div class="walmart_share">
                                                    <span>Share : </span>                                                    
                                                    <?php $actual_link = base_url() . "home/productDetails/" . $homeSearchResult[0]->id; ?>
                                                    <?php $image_link = base_url().'images/shop/'.$homeSearchResult[0]->logo_thumb; ?>

                                                        <a class="newtooltip_brand" href="http://www.facebook.com/share.php?u=<?php echo $actual_link; ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600,left=350,top=200');
                                                                return false;">

                                                            <img class="img-responsive" alt="Facebook" src="<?php echo base_url() . '/assets/frontend/'; ?>images/facebook.png"/>                                                        
                                                            <span> 
                                                                <img src="<?php echo base_url('images/icons/callout_black.gif'); ?>" class="callout_brand">
                                                                    Share this and get 1 SWW points from <?php echo $homeSearchResult[0]->shop_name ?></span>
                                                        </a>
                                                        <a class="option1_16 newtooltip_tweet_brand" style="background-position:-144px -16px" rel="nofollow" target="_blank" href="http://twitter.com/intent/tweet?text=<?= urlencode('Saleswherewhen :: Online coupons, Deals'); ?>&url=<?php echo $actual_link; ?>">
                                                            <img class="img-responsive" alt="Twitter" src="<?php echo base_url() . '/assets/frontend/'; ?>images/twitter.png">
                                                                <span> 
                                                                    <img src="<?php echo base_url('images/icons/callout_black.gif'); ?>" class="callout_tweet_brand">
                                                                        Share this and get 1 SWW points from  <?php echo $homeSearchResult[0]->shop_name ?>                                                                    </span>
                                                        </a>
                                                        <a onclick="return sendSubscription('<?php echo $actual_link; ?>', '<?php echo $image_link; ?>', '<?php echo $homeSearchResult[0]->id; ?>');" data-whatever="@mdo" data-target="#exampleModal" data-toggle="modal" class="newtooltip_msg_brand" href="#">
                                                            <img class="img-responsive" alt="Message" src="<?php echo base_url(); ?>assets/frontend/images/message.png">
                                                                <span> 
                                                                    <img src="<?php echo base_url('images/icons/callout_black.gif'); ?>" class="callout_msg_brand">
                                                                        Share this and get 1 SWW points from <?php echo $homeSearchResult[0]->shop_name ?>                                                       </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <?php
                                            } else {  
                                                echo '<div class="col-lg-10">';
                                               if (!empty($homeSearchResult)) { echo '<p style="margin-top:18%;font-size:25px;color:red;text-align:center;"> Oops the item you search is not available at  <span style="text-align:center;color: #0872ba;font-size:28px;">'.$homeSearchResult[0]->shop_name.'</span></p>'; }
                                                echo '</div>';
                                            }
                                            ?>
                                            <div class="clearfix"></div>
                                            <?php //print_r($homeSearchResult);?>
                                            <div class="similar_link" id="similar_item">
                                                <a onclick="return similarItems(<?php echo (!empty($homeSearchResult[0]->shopid))?$homeSearchResult[0]->shopid:''; ?>,<?php echo (!empty($homeSearchResult[0]->category_id)) ? $homeSearchResult[0]->category_id:''; ?>);"><span style="color: red;">Similar Items on </span><span style="color: black;"> Sale Today at</span> <span style="color: blue;"><?php echo (!empty($homeSearchResult[0]->shop_name))?$homeSearchResult[0]->shop_name:''; ?></span></a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    

                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="walmart_mid_wrap">
                                    <div class="col-lg-9 less_pad">
                                        <h1><strong><span style="color:#ee1f25;" id="other_item">Other items on</span><span> sale today at<span> <?php if (!empty($homeSearchResult)) { echo $homeSearchResult[0]->shop_name; }?></strong></span></span></h1> 
                                    </div>
                                    <div class="col-lg-3 less_pad">
                                        <div class="choose_select">
                                            <select id="other_category" onchange="return changeCategoryPage(this.value);">
                                                <option value="">Other Categories</option>
                                                <?php
                                                if (!empty($main_category)) {
                                                    $c = 0;
                                                    foreach ($main_category as $category):
                                                        $c++;
                                                        ?>
                                                        <option value="<?php echo $category->id; ?>"><?php echo $category->category; ?> </option>
                                                        <?php
                                                    endforeach;
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="product_list_wrap">
                                    <?php //echo '<pre>'; print_r($homeSearchResult);?>
                                <div class="list_wrap">
                                    <div id="list_wrap_pagination">
                                    <?php
                                    if (!empty($homeSearchResult)) {
                                        $i=0;
                                        foreach ($homeSearchResult as  $Searchdeals) {
                                            if($i>0){
                                            ?>
                                            <div class="product_wrap">
                                                <div class="product_img">
                                                    <a href="<?php echo base_url() . 'home/productDetails/' . $Searchdeals->id; ?>">
                                                        <img src="<?php echo base_url() . 'images/deals/listing/' . $Searchdeals->banner; ?>" alt="Product" class="img-responsive" />
                                                    </a>
                                                </div>
                                                <div class="product_decs">
                                                    <div class="left">
                                                        <h2><strong><?php if(!empty($Searchdeals->product_name)){ echo $Searchdeals->product_name ;}?></strong></h2>
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
                                        }  $i++;}
                                    } else {
                                        echo "<p class='no_result'>No Results Found</p>";
                                    }
                                    ?>
                                    

                                    <div class="clearfix"></div>
                                </div>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                            <div class="col-lg-12">
                                <nav>
                                <ul class="pagination" id="trendingPagination">
                                   <?php
                                   
                                     $page_count = ceil($total_product/8);

                                    if($pagination>1){
                                        $pre = $pagination - 1;
                                        echo '<li><a href=""  onclick = "return ajaxPagination(' . $pre . ');"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>';

                                    }
                                    for($p=1; $p<=$page_count; $p++){


                                        echo '<li><a href=""  onclick = "return ajaxPagination(' . $p . ');">'.$p.'</a></li>';
                                    }
                                    if($pagination<$page_count){
                                        $next = $pagination + 1;

                                    echo '<li><a href=""  onclick = "return ajaxPagination(' . $next . ');"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>';


                                    } ?>
                                     </ul>
                                    </nav>
                                <input type="hidden" name="page_count" id="page_count_tre" value="<?php echo $page_count;  ?>"/>
                                <input type="hidden" name="pagination" id="pagination" value="<?php   echo  $pagination; ?>"/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="bazar_left">
                            <div class="walmart_banner_wrap">
                               <?php if(!empty($add_image_right_part)) {
                                    foreach($add_image_right_part as $add) {
                                    ?>
                                <div class="add">
                                    <img src="<?php echo base_url() . 'images/advertisements/'.$add->adv_image; ?>" alt="Banner" class="img-responsive" />
                                </div>
                                    <?php } } ?>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
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

<?php $this->load->view('front_include/footer.php'); ?>
<script>
    
    function similarItems(ShopId,category_id){
        //alert(CategoryId);
        //$("#similar_item").html("");
        $.ajax({
            url: "<?php echo base_url('home/ajaxSimilarItems'); ?>",
            type: "POST",
            data: {
                shopid:ShopId,
                category_id:category_id,
            },
            success: function (response) {
                //alert(response);
                $('#list_wrap_pagination').html("");
                $('#trendingPagination').html("");
                $('#other_item').html("Similar Items On");
                
                $('#list_wrap_pagination').html(response);
               
            }
        });
         return false;  
    }
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
    
    
    function ajaxPagination(page){        
        var look_for = $('#category').val();
        var retailer = $('#retailer_id_home').val();
        var city = $('#location').val();            
        var search_key = $("#serarch_key_value").html();
        var limit = '8';
        var count = $("#page_count_tre").val();
        //alert(look_for+'-'+retailer+'-'+city+'-'+search_key);
        var start = (page - 1) * limit;
        $("#pagination").val(page);
        $.ajax({
            url: "<?php echo base_url('home/ajaxsearchHomePagination'); ?>",
            type: "POST",
            data: {
                pagination:page,
                retailer:retailer,
                look_for:look_for,
                city:city,
                ser_key:search_key,
                
                
            },
            success: function (response) {
                //alert(response);
                $('#list_wrap_pagination').html("");
                $('#list_wrap_pagination').html(response);
                $('#trendingPagination').html("");
                if (page > 1) {
                    
                    var pre = page - 1;
                    $("#trendingPagination").html('<li><a href="" onclick = "return ajaxPagination(' + pre + ');"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>');
                }
                for (k = 1; k <= count; k++) {
                    
                    $("#trendingPagination").append('<li><a href=""  onclick = "return ajaxPagination('+ k +');">'+ k +'</a></li>');
                }
                if (page < count) {
                    
                    var next = page + 1;
                    
                    $("#trendingPagination").append('<li><a href="" onclick = "return ajaxPagination(' + next + ');"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>');
                }
                
            }
        });
        return false;

    }
    
    
    
    function wallmartSearch(){
        var look_for = $('#wallmart_item').val();
        var retailer = $('#retailer_id_wallmart').val();
        var city = $('#city_wallmart').val();            
        var search_key = $("#wall_mart_ser_key").val();
        //alert(look_for+'-'+retailer+'-'+city+'-'+search_key);
        
        $.ajax({
            url: "<?php echo base_url('home/ajaxInnerSearchFilter'); ?>",
            type: "POST",
            data: {                
                retailer:retailer,
                look_for:look_for,
                city:city,
                ser_key:search_key,
            },
            success: function (response) {
                //alert(response);
                $('#list_wrap_pagination').html("");
                $('#list_wrap_pagination').html(response);
                $('#trendingPagination').html("");
                
                
            }
        });
        return false;
    }
    
</script>
