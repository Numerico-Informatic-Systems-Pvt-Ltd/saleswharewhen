<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Saleswherewhen :: Grocery Shopping</title>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>css/bootstrap-theme.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>css/bootstrap.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>css/style.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>fonts/stylesheet.css" />
        <link rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>css/mgmenu.css" type="text/css" media="screen" />
        <script type="text/javascript" src="<?php echo base_url() . '/assets/frontend/'; ?>js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() . '/assets/frontend/'; ?>js/bootstrap.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script><!-- Mega Menu Script -->
         <style type="text/css">
                .body_top_wrap h1{font-size:25px !important;}

                .banner .left{border: 3px solid #f1f1f1; box-shadow: 0 2px 2px #ccc; float: left; margin: 0; padding: 0; width: 60%;}
                .banner .right{float: left; margin-bottom: 35px; padding: 0; width: 40%; height:316px; overflow-y:scroll;}
                .box{float: left; margin:0px; padding: 0; width: 100%;}
                .box ul{margin:0px; padding:0px;}
                .box ul li{position:relative; width:48%; float:left; list-style-type:none; margin:0 1% 1% 1%; padding:0px;}
                .box ul li img{width:100%; height:157px; }
                .box ul li .trade_info_cat{background: none repeat scroll 0 0 rgba(0, 0, 0, 0.7); bottom: 0; color: #fff; font-family: "source_sans_prolight";font-size:16px; text-align: center; left: 0; margin: 0; padding: 0 5% 1%; position: absolute; width: 100%;}
		.item img{height:309px !important;}
                </style>
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
        <script type="text/javascript" src="<?php echo base_url() . '/assets/frontend/'; ?>js/mootools-core.js"></script>
    </head>

    <body>

        <div class="container-fluid">
            <div class="container less_pad">
                <?php $this->load->view('front_include/header.php'); ?>
                <?php $this->load->view('front_include/megaMenu.php'); ?>


                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('home'); ?>">Home</a></li>
                        <li class="active">Grocery Shopping</li>
                    </ol>
                </div>

                <div class="col-lg-12">

                    <div class="grocery_wrap">
                        <h1>
                            <strong>Grocery</strong>
                            <span><strong>Shopping</strong></span>
                        </h1>

                        <div class="col-lg-12 less_pad">
                            <div class="banner">
                                <div class="lt">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <!-- Indicators -->
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                        </ol>

                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                            <?php
								if($banner_images['small_bottom_banner']){
									foreach($banner_images['small_bottom_banner'] as $key => $image){
							?>	
                                            <div <?php if($key == 0){ echo 'class="item active"'; }else{ echo 'class="item"'; } ?> >
                                                <img src="<?php echo base_url() . 'images/admin/'.$image->image_name; ?>" alt="Grocery" class="img-responsive" width="100%">
                                            </div>
                            <?php
									}
								}
							?>                                            
                                        </div>

                                        <!-- Controls -->
                                        
                                    </div>
                                </div>
                                <div class="right" >
                                    <div class="box" style="width: 99% !important;">
                            <ul class="">
                                <?php if (!empty($subCategory)) { ?>
                                    <?php foreach ($subCategory as $Category) { ?>
                                        <li>
                                            <a href="<?php echo base_url() . 'grocery/index/' . $Category->id; ?>">
                                                <img src="<?php echo base_url() . 'images/category/thumb' . $Category->category_image; ?>" alt="Grocery" class="img-responsive" width="100%" />

                                                <div class="trade_info_cat">
                                                    <strong><?php echo $Category->category; ?></strong> 
                                                </div> </a>
                                        </li>
                                    <?php } ?>
                                <?php } ?>

                            </ul>


                        </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="body_product_wrap">
                            <div class="heading">
                                <div class="col-lg-3 less_pad">
                                    <h2>
                                        Most Popular Offers    
                                        <span><a href="#">View all</a></span>
                                    </h2>
                                </div>
                                <div class="col-lg-5 less_pad">
                                    <div class="col-lg-4">
                                        <div class="grocery_select">
                                            <select id="location" name="location">
                                                <option value="">City</option>
                                                <?php foreach ($city_list as $city): ?>
                                                    <option value="<?php echo $city->city_id; ?>"><?php echo $city->city_name; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="grocery_select">
                                            <select id="retailer_id" name="brand">
                                                <option value="0">Retailer</option>
                                                <?php foreach ($shop_list as $brand): ?>
                                                    <option value="<?php echo $brand->id; ?>"><?php echo $brand->shop_name; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

<!--                                    <div class="col-lg-4">
                                        <div class="grocery_select">
                                            <select id="category" name="category">
                                                <option value="">Look For</option>
                                                <?php foreach ($sub_category as $category): ?>
                                                    <option value="<?php echo $category->id; ?>"><?php echo $category->category; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>-->
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-lg-4 less_pad">
                                    <form class="form-inline">
                                        <div class="form-group" style="width:85%;">
                                            <input type="text" class="form-control inner_top_input" onkeyup="return GrocerySuggestion(this.value)" id="grocery_search_text" placeholder="Search" autocomplete="off" value="">
                                        </div>
                                        <button type="button" class="inner_top_btn" onclick="return search();">Go</button>
                                    </form>
                                    <div id="grocery_suggetion_box" style='display:none;'>

                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <?php  
                            //print_r($advertisement);
                            
                            ?>
                            <div class="col-lg-12 less_pad new_cate_list" id="grocery_list">
                                <div class="col-lg-12" id="pagination_results">
                                    <?php 
                                        if(!empty($groceries)){
                                            $i = 0;
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
                                                            <strong><?php if (!empty($grocery->product_name)) {
                                                            echo $grocery->product_name;
                                                        } else {
                                                            echo $grocery->shop_name;
                                                        } ?></strong>
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

                                                                <div class="content"><?php if(strlen($grocery->description)>300){ echo substr($grocery->description, 0, 300).'...';} else{ echo substr($grocery->description, 0, 300); } ?></div>

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
                                    <?php } }  ?>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-lg-12">
                                     <?php 
                                        if(!empty($groceries)){ ?>
                                    <nav>
                                        <ul class="pagination" id="groc_pagination">
                                            <?php
                                            if ($page_value > 1) {
                                                $pre = $page_value - 1;
                                                echo '<li><a href="#"  onclick = "return Pagination(' . $pre . ');"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>';
                                            }

                                            for ($i = 1; $i <= $page; $i++) {
                                                if ($page_value == $i) {
                                                    echo '<li><a href="" class = "pagi_active" onclick = "return Pagination(' . $i . ')">' . $i . '</a></li>';
                                                } else {
                                                    echo '<li><a href="" onclick = "return Pagination(' . $i . ')">' . $i . '</a></li>';
                                                }
                                            }
                                            if ($page_value < $page) {
                                                $next = $page_value + 1;
                                                echo '<li><a href=""  onclick = "return Pagination(' . $next . ');"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>';
                                            }
                                            ?>
                                        </ul>
                                    </nav>
                                        <?php } ?>
                                    <input type = "hidden" id = "page_value" value = "<?php echo $page_value; ?>">
                                        <input type = "hidden" id = "page_count" value = "<?php echo $page; ?>">
                                            </div>
                                            </div>


                                            <div class="clearfix"></div>

                                            <div class="heading">
                                                <h2>
                                                    Trending offers    
                                                    <span><a href="#">View all</a></span>
                                                </h2>
                                            </div>

                                            <div class="col-lg-12">

                                                <div class="grocery_bottom">
                                                 <div id="grocery_pagination">
                                                    <?php if(!empty($trending_offers)) { 
                                                        //echo '<pre>';print_r($trending_offers);
                                                    foreach ($trending_offers as $troffers) {
                                                        ?>
                                                    <div class="col-lg-3">
                                                        <div class="product_wrap">
                                                            <?php if($troffers->item_type == 4) { 
                                                                $item_details_url = base_url().'grocery/groceryDetails/'.$troffers->id;
                                                            }
                                                            else {
                                                                $item_details_url = base_url().'home/productDetails/'.$troffers->id;
                                                            }
                                                            ?>                                                           
                                                            <a href="<?php echo $item_details_url;?>" class="">  
                                                                
                                                                <img src="<?php echo base_url() . 'images/deals/special/'.$troffers->banner; ?>" alt="<?php echo $troffers->shop_name;?>" title="<?php echo $troffers->shop_name.'-'.$troffers->deal_text;?>" class="img-responsive " />
                                                               
                                                               <div class="trade_info">
                                                                  <strong><?php echo $troffers->deal_text;?></strong> 
                                                               </div>
                                                               
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
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
                                                    </div>
                                                    <input type="hidden" name="page_count" id="page_count_tre" value="<?php echo $page_count;  ?>"/>
                                                    <input type="hidden" name="pagination" id="pagination" value="<?php   echo  $pagination; ?>"/>
                                                    <?php         } ?>
                                                    
                                                    <div class="clearfix"></div>
                                                </div>
                                           
                                            </div>

                                            <div class="clearfix"></div>
                                            </div>
                                            <div class="clearfix"></div>
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
<script>
    function GrocerySuggestion(key) {
        if (key == '') {
            $('div#grocery_suggetion_box').hide();
        }
        $.ajax({
            url: "<?php echo base_url('grocery/getSuggestion'); ?>",
            type: "POST",
            data: {
                key: key
            },
            success: function (response) {
                $('div#grocery_suggetion_box').html(response);
                $('div#grocery_suggetion_box').show();
            }
        });
        return false;
    }
    function selectGrocerySuggestion($key) {
        var text = $('li.suggestion_text_' + $key).text();
        $('#grocery_search_text').val(text);
        $("#grocery_suggetion_box ul").remove();
        $("#grocery_suggetion_box").hide();
    }
    function Pagination(page) {

        var selected_brand = $('#retailer_id').val();       
        var selected_location = $('#location').val();
        var search_key = $('#grocery_search_text').val();
        var limit = '9';
        var count = $("#page_count").val();
        var start = (page - 1) * limit;
        $("#page_value").val(page);
        $.ajax({
            url: "<?php echo base_url('grocery/pagination'); ?>",
            type: "POST",
            data: {
                start: start,
                search_key: search_key,
                location: selected_location,
                brand: selected_brand
            },
            success: function (response) {
                //alert(response);
                $('#pagination_results').html(response);
                $('#groc_pagination').html("");
                if (page > 1) {
                    var pre = page - 1;
                    $("#groc_pagination").append('<li><a href="" onclick = "return Pagination(' + pre + ');"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>');
                }
                for (k = 1; k <= count; k++) {
                    if (page == k) {
                        $("#groc_pagination").append('<li><a href="" class = "pagi_active" onclick = "return Pagination(' + k + ')">' + k + '</a></li>');
                    } else {
                        $("#groc_pagination").append('<li><a href="" onclick = "return Pagination(' + k + ')">' + k + '</a></li>');
                    }
                }
                if (page < count) {
                    var next = page + 1;
                    $("#groc_pagination").append('<li><a href="" onclick = "return Pagination(' + next + ');"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>');
                }
            }
        });
        return false;
    }
    function ajaxPagination(page){
        var limit = '8';
        var count = $("#page_count_tre").val();
        var start = (page - 1) * limit;
        $("#pagination").val(page);
        $.ajax({
            url: "<?php echo base_url('grocery/trendinPagination'); ?>",
            type: "POST",
            data: {
                pagination:page,

            },
            success: function (response) {
                //alert(response);
                $('#grocery_pagination').html();
                $('#grocery_pagination').html(response);
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
    function search() {

        var selected_brand = $("#retailer_id").val();        
        var selected_location = $('#location').val();
        var search_key = $('#grocery_search_text').val();

        $.ajax({
            url: "<?php echo base_url('grocery/search'); ?>",
            type: "POST",
            data: {

                brand: selected_brand,
                location: selected_location,
                search_key: search_key
            },
            success: function (response) {
                //alert(response);
                $('#grocery_list').html("");
                $('#grocery_list').html(response);
            }
        });
        return false;
    }

</script>

<script type="text/javascript" src="<?php echo base_url() . '/assets/frontend/'; ?>js/banner/jquery-1.3.js"></script>
<script type="text/javascript" src="<?php echo base_url() . '/assets/frontend/'; ?>js/banner/jquery.cycle.all.js"></script>
<script type="text/javascript">

    function sendSubscription(item_url, image_url, item_id) {
        $("#item_id").val(item_id);
        $("#image_url").val(image_url);
        $("#item_url").val(item_url);

    }
    $(document).ready(function () {
        $('#fadeOne').cycle({
            fx: 'fade',
            speed: 5000,
            timeout: 2000
        });
        $('#fadeTwo').cycle({
            fx: 'fade',
            speed: 8000,
            timeout: 6000
        });
        $('#fadeThree').cycle({
            fx: 'fade',
            speed: 5000,
            timeout: 2000
        });
        $('#fadeFour').cycle({
            fx: 'fade',
            speed: 4000,
            timeout: 2000
        });
        $('#fadeFive').cycle({
            fx: 'fade',
            speed: 5000,
            timeout: 2000
        });
    });
</script>
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
<?php $this->load->view('front_include/footer.php'); ?>
