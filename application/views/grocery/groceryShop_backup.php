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
                                    <div class="box" id="fadeThree">
                                        <img src="<?php echo base_url() . '/assets/frontend/images/'; ?>grocery_small_one1.jpg" alt="Grocery" class="img-responsive" width="100%" />
                                        <img src="<?php echo base_url() . '/assets/frontend/images/'; ?>grocery_small_two1.jpg" alt="Grocery" class="img-responsive" width="100%" />
                                    </div>
                                    <div class="box" id="fadeFour" style="margin-left:51%;">
                                        <img src="<?php echo base_url() . '/assets/frontend/images/'; ?>grocery_small_two1.jpg" alt="Grocery" class="img-responsive" width="100%" />
                                        <img src="<?php echo base_url() . '/assets/frontend/images/'; ?>grocery_small_one1.jpg" alt="Grocery" class="img-responsive" width="100%" />
                                    </div>
                                    <div class="box" style="margin-top:35.4%;">
                                        <div class="" id="fadeOne">
                                            <img src="<?php echo base_url() . '/assets/frontend/images/'; ?>grocery_small_three1.jpg" alt="Grocery" class="img-responsive" width="100%" />
                                            <img src="<?php echo base_url() . '/assets/frontend/images/'; ?>grocery_small_three2.jpg" alt="Grocery" class="img-responsive" width="100%" />
                                        </div>
                                    </div>
                                    <div class="box" style="margin-top:35.4%;">
                                        <div class="" id="fadeTwo">
                                            <img src="<?php echo base_url() . '/assets/frontend/images/'; ?>grocery_small_four1.jpg" alt="Grocery" class="img-responsive" width="100%" />
                                            <img src="<?php echo base_url() . '/assets/frontend/images/'; ?>grocery_small_four2.jpg" alt="Grocery" class="img-responsive" width="100%" />

                                        </div>

                                    </div>
                                    <div class="clearfix"></div>
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
                                            <select id="brand" name="brand">
                                                <option value="">Retailer</option>
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
                                            <input type="text" class="form-control inner_top_input" onkeyup="return GrocerySuggestion(this.value)" id="grocery_search_text" placeholder="Search" value="">
                                        </div>
                                        <button type="button" class="inner_top_btn" onclick="return search();">Go</button>
                                    </form>
                                    <div id="grocery_suggetion_box" style='display:none;'>

                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-lg-12 less_pad" id="grocery_list">
                                <div class="col-lg-12 pagination_results">
                                    <?php foreach ($groceries as $grocery) { //echo '<pre>'; print_r($grocery);die;
                                        ?>
                                        <div class="col-lg-4">
                                            <div class="product">
                                                <div class="bg"><img src="<?php echo base_url() . '/images/deals/listing/' . $grocery->banner; ?>" class="img-responsive" alt="<?php $grocery->product_name; ?>" /></div>
                                                <div class="content">
                                                    <?php
                                                    if (!empty($grocery->deal_text)) {
                                                        $deal_text = explode(',', $grocery->deal_text);
                                                        ?>
                                                        <strong><?php echo $deal_text[0]; ?></strong> 
                                                        <?php if (isset($deal_text[1])) { ?>
                                                            <p><?php if (strlen($deal_text[1]) > 30) {
                                                                    echo substr($deal_text[1], 0, 30) . '...';
                                                                ?>
                                                                <?php
                                                                } else {
                                                                    echo ($deal_text[1]);
                                                                }
                                                                ?>
                                                            </p>
                                                            <?php }
                                                        }
                                                        ?>
                                                </div>
                                                <div class="logo">
                                                    <a href="<?php echo base_url() . 'home/dealsByRetailer/' . $grocery->brand_id; ?>">
                                                        <img src="<?php echo base_url() . '/images/brands/' . $grocery->brand_logo; ?>" alt="<?php $grocery->brand_name; ?>" class="img-responsive" />
                                                    </a>
                                                </div>

                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="btn_view"><a href="<?php echo base_url() . 'grocery/groceryDetails/' . $grocery->id ?>">View Details</a></div>
                                            <?php
                                            $actual_link = base_url() . 'grocery/groceryDetails/' . $grocery->id;
                                            $image_link = base_url() . '/images/deals/listing/' . $grocery->banner;
                                            ?>
                                            <div class="social">
                                                <a   onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600,left=350,top=200');
                                                        return false;" href="http://www.facebook.com/share.php?u=<?php echo $actual_link; ?>" target="_blank" class="newtooltip">

                                                    <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/facebook.png" alt="Facebook" class="img-responsive" />
                                                    <span> 
                                                        <img class="callout" src="<?php echo base_url('images/icons/callout_black.gif'); ?>" /> 

                                                        Share this and get 1 SWW points from  <?php echo $grocery->shop_name; ?>
                                                    </span>
                                                </a>
                                                <a title="Share this and get 1 SWW points from  <?php echo $grocery->shop_name; ?>" href="http://twitter.com/intent/tweet?text=<?= urlencode('Saleswherewhen :: Online Grocery, Shop'); ?>&url=<?php echo $actual_link; ?>" target="_blank" rel="nofollow" style="background-position:-144px -16px" class="option1_16 newtooltip_tweet" title="Twitter">
                                                    <img src="<?php echo base_url() . '/assets/frontend/'; ?>images/twitter.png" alt="Twitter" class="img-responsive" />
                                                    <span> 
                                                        <img class="callout_tweet" src="<?php echo base_url('images/icons/callout_black.gif'); ?>" /> 

                                                        Share this and get 1 SWW points from  <?php echo $grocery->shop_name; ?>
                                                    </span>

                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" onclick="return sendSubscription('<?php echo $actual_link; ?>', '<?php echo $image_link; ?>', '<?php echo $grocery->id; ?>');" class="newtooltip_msg">
                                                    <img src="<?php echo base_url() . '/assets/frontend/images/'; ?>message.png" alt="Message" class="img-responsive" />
                                                    <span> 
                                                        <img class="callout_msg" src="<?php echo base_url('images/icons/callout_black.gif'); ?>" /> 

                                                        Share this and get 1 SWW points from  <?php echo $grocery->shop_name; ?>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="clearfix"></div>
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
                                                                <input type="text" class="popup_input" id="emailid" required name="emailid" placeholder="Enter your friend's email address"/>
                                                            </div>
                                                            <input type="submit" class="popup_btn"  id="subscribe_product" value="Submit"/>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                            <?php } ?>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-lg-12">
                                    <nav>
                                        <ul class="pagination">
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

        var selected_brand = $('#brand').val();
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
                $('div.pagination_results').html(response);
                $('.pagination').html("");
                if (page > 1) {
                    var pre = page - 1;
                    $(".pagination").append('<li><a href="" onclick = "return Pagination(' + pre + ');"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>');
                }
                for (k = 1; k <= count; k++) {
                    if (page == k) {
                        $(".pagination").append('<li><a href="" class = "pagi_active" onclick = "return Pagination(' + k + ')">' + k + '</a></li>');
                    } else {
                        $(".pagination").append('<li><a href="" onclick = "return Pagination(' + k + ')">' + k + '</a></li>');
                    }
                }
                if (page < count) {
                    var next = page + 1;
                    $(".pagination").append('<li><a href="" onclick = "return Pagination(' + next + ');"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>');
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

        var selected_brand = $('#brand').val();
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
