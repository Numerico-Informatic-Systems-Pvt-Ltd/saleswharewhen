<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Saleswherewhen :: Category Listing</title>

        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>css/bootstrap-theme.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>css/bootstrap.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>css/style.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>fonts/stylesheet.css" />
        <link rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>css/hint.css">
            <link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/'; ?>css/mgmenu.css" type="text/css" media="screen" />
            <script type="text/javascript" src="<?php echo base_url() . '/assets/frontend/'; ?>js/jquery.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url() . '/assets/frontend/'; ?>js/bootstrap.js"></script>
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
                <script type="text/javascript">


                    function sendSubscription(item_url, image_url, item_id) {
                        $("#item_id").val(item_id);
                        $("#image_url").val(image_url);
                        $("#item_url").val(item_url);

                    }

                </script>  
        </head>

        <body>

            <div class="container-fluid">
            <div class="container less_pad">
                <?php $this->load->view('front_include/header.php'); ?>
                <?php $this->load->view('front_include/megaMenu'); ?>
                <?php                     
                     //print_r( array_reverse($breadCums,TRUE));?>
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('home'); ?>">Home</a></li>
                        <?php if(!empty($breadCums)) { foreach (array_reverse($breadCums,TRUE) as $key => $breadCum) { ?>
                        <li><a href="<?php echo base_url().'home/listing/'.$key;; ?>"><?php echo $breadCum;?></a></li>
                        <?php } } ?>
                    </ol>                    
                </div>
                <?php if (!empty($categoryDetails)) { ?>
                    <div class="col-lg-12">
                        <div class="body_top_wrap cd-top" id="top">
                            <div class="col-lg-12 less_pad">
                                <h1 style="padding:5px;"><?php echo ($categoryDetails->category) ? $categoryDetails->category : ''; ?> <span> </span>
                                </h1>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                <?php } ?>
                <div class="banner">
                    <div class="left">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <?php if(!empty($category_advertisements)) { 
                                    
                                      $i=0;
                                      $j=0;
                                    foreach ($category_advertisements as  $cate_add) {   
                                      if(!empty($cate_add)){
                                        foreach($cate_add as  $add_image) {                                         
                                    ?>
                                <div class="item <?php if($i==0) { echo 'active'; } else { echo ''; }?>">
                                    <img src="<?php echo base_url().'images/advertisements/'.$add_image->adv_image;?>" alt="Grocery" class="img-responsive" width="100%" height="280px;">
                                </div>
                                <?php $i++; $j++; 
                                
                                if($j==3){
                                    break;
                                        } }
                                } } } ?>
                            </div>


                        </div>
                    </div>
                    <div class="right" >
                        <div class="box">
                            <ul class="">
                                <?php if (!empty($subCategory)) { ?>
                                    <?php foreach ($subCategory as $Category) { ?>
                                        <li>
                                            <a href="<?php echo base_url() . 'home/listing/' . $Category->id; ?>">
                                                <img src="<?php echo base_url() . 'images/category/thumb' . $Category->category_image; ?>" alt="Grocery" class="img-responsive" width="100%" />

                                                <!--                                        <div class="caption">
                                                                                            <div class="blur"></div>
                                                                                            <div class="caption-text">
                                                                                                <h1><a href="<?php echo base_url() . 'home/listing/' . $Category->id; ?>"><?php echo $Category->category; ?></a></h1>
                                                                                            </div>
                                                                                        </div>-->
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

                <div class="col-lg-12">
                    <div id="top" class="body_top_wrap cd-top">
                        <div class="col-lg-3 less_pad">
                            <h1 >Deals Of  <span><?php if (!empty($categoryDetails)) {
                                    echo ($categoryDetails->category) ? $categoryDetails->category : '';
                                } ?></span></h1>
                        </div>
                        <div class="col-lg-7 rt_pad">
                            <nav class="navbar navbar-default">
                                <div class="container-fluid less_pad">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <div class="navbar-header">
                                        <button data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>

                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse less_pad">
                                        <ul class="nav navbar-nav">
                                            <?php
                                            if (!empty($main_category)):
                                                $c = 0;
                                                foreach ($main_category as $category): $c++;
                                                    if ($c > 4) {
                                                        break;
                                                    }
                                                    
                                                    ?>
                                                    <li><a href="<?php echo base_url() . 'home/listing/' . $category->id; ?>"><?php echo $category->category; ?> </a></li>
                                                <?php
                                                endforeach;
                                            endif;
                                            ?>
                                            <li><a href="<?php echo base_url('grocery'); ?>" >Grocery Shopping</a></li>
                                            <li><a href="<?php  echo base_url('home/onlineCoupons'); ?>" class="last">Online Coupons</a></li>
                                        </ul>
                                    </div><!-- /.navbar-collapse -->
                                </div><!-- /.container-fluid -->
                            </nav>
                        </div>
                        <div class="col-lg-2 less_pad">
                            <div class="category_select">
                                <select id="other_category">
                                    <option value="">Other Categories</option>
                                    <?php
                                    if (!empty($main_category)) {
                                        $c = 0;
                                        foreach ($main_category as $category):
                                            $c++;
                                            if ($c > 5):
                                                if($category->category!='Grocery Shopping'){
                                                ?>
                                                <option value="<?php echo $category->id; ?>"><?php echo $category->category; ?> </option>
                                                <?php }
                                            endif;
                                        endforeach;
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="body_top_wrap cd-top" id="top">
                        <!--<div class="col-lg-12 less_pad">
                            <h1>View  </h1>
                        </div>-->
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="body_product_wrap" id="search_result_container">
                        <div class="col-lg-12 less_pad"><!-- first_row-->
                            <div class="col-lg-12 less_pad new_cate_list" id="pagination_result_container">
                                <?php
                                if (!empty($deals)) { //echo '<pre>'; print_r($deals); 
                                    $i = 0;
                                    foreach ($deals as $deal) {
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
                                                            <strong><?php if (!empty($deal->product_name)) {
                                                            echo $deal->product_name;
                                                        } else {
                                                            echo $deal->shop_name;
                                                        } ?></strong>
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
                                <div class="clearfix"></div>

                            </div>
                            <div class="clearfix"></div>
                                        <?php if (!empty($deals)) { ?>
                                <div class="col-lg-12">
                                    <nav>
                                        <ul class="pagination">
                                            <?php
                                            if ($page_value > 1) {
                                                $pre = $page_value - 1;
                                                echo '<li><a href="#"  onclick = "return commonPagination(' . $pre . ');"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>';
                                            }

                                            for ($i = 1; $i <= $page; $i++) {
                                                if ($page_value == $i) {
                                                    echo '<li><a href="" class = "pagi_active" onclick = "return commonPagination(' . $i . ')">' . $i . '</a></li>';
                                                } else {
                                                    echo '<li><a href="" onclick = "return commonPagination(' . $i . ')">' . $i . '</a></li>';
                                                }
                                            }
                                            if ($page_value < $page) {
                                                $next = $page_value + 1;
                                                echo '<li><a href=""  onclick = "return commonPagination(' . $next . ');"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>';
                                            }
                                            ?>
                                        </ul>
                                    </nav>

                                    <input type = "hidden" id = "page_value" value = "<?php echo ($page_value) ? $page_value : ''; ?>">
                                    <input type = "hidden" id = "page_count" value = "<?php echo ($page) ? $page : ''; ?>">
                                    <input type = "hidden" id = "category" value = "<?php echo ($categoryDetails->id) ? $categoryDetails->id : ''; ?>">

                                </div>
                                <?php } ?>
                                            <div class="clearfix"></div>
                                            </div><!-- end of first_row-->
                                            <div class="clearfix"></div>
                                            
                                            
                                            
                                            <!--llll-->
                                            <div class="col-lg-12 less_pad">
                                                <div class="grocery_wrap">                                                  
                                                    <div class="heading">
                                                        <h2>
                                                            Trending offers    
                                                            <span><a href="#">View all</a></span>
                                                        </h2>
                                                    </div>
                                                    
                                               
                                            
                                            
                                            <!--ddd-->
                                            <div class="col-lg-12">

                                                <div class="grocery_bottom">
                                                 <div id="grocery_pagination">
                                                    <?php if(!empty($trending_offers)) { 
                                                       
                                                    foreach ($trending_offers as $key => $troffers) { 
                                                        if($key>=1) {
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
                                                    <?php }   
                                                            } ?>
                                                     </div>
                                                    <div class="col-lg-12"> 
                                            <nav>
                                                <ul class="pagination" id="trendingPagination_cou">
                                                   <?php //print_r($trending_offers[0]);
                                                     $page_count = ceil($trending_offers[0]/8);
                                                     
                                                    if($pagination>1){
                                                        $pre = $pagination - 1;
                                                        echo '<li><a href=""  onclick = "return trendingajaxPagination(' . $pre . ');"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>';
                                                        
                                                    }
                                                    for($p=1; $p<=$page_count; $p++){
                                                       
                                                    
                                                        echo '<li><a href=""  onclick = "return trendingajaxPagination(' . $p . ');">'.$p.'</a></li>';
                                                    }
                                                    if($pagination<$page_count){
                                                        $next = $pagination + 1;
                                                       
                                                    echo '<li><a href=""  onclick = "return trendingajaxPagination(' . $next . ');"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>';
                                                        
                                                        
                                                    } ?>
                                                     </ul>
                                            </nav>
                                                    </div>
                                                    <input type="hidden" name="page_count" id="page_count_tre_cou" value="<?php echo $page_count;  ?>"/>
                                                    <input type="hidden" name="pagination" id="pagination_cou" value="<?php   echo  $pagination; ?>"/>
                                                    <?php         } ?>
                                                    
                                                    <div class="clearfix"></div>
                                                </div>
                                           
                                            </div>
                                            <div class="clearfix"></div>
                                            
                                            
                                            
                                             </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            
                                            <!--lllll-->
                                            
                                            
                                            
                                            
                                            
                                            </div>

                                            </div>

                                            <div class="clearfix"></div>
                                            </div>
                                            </div>

                                            <div class="clearfix"></div>
                                            </div>
                                            </div>

<?php $this->load->view('front_include/footer.php'); ?>


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

<script type="text/javascript">

    $(window).load(function () {

        $("#flexiselDemo3").flexisel({
            visibleItems: 6,
            animationSpeed: 1000,
            autoPlay: false,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            clone: false,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint: 480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint: 640,
                    visibleItems: 2
                },
                tablet: {
                    changePoint: 768,
                    visibleItems: 3
                }
            }
        });


    });


    $("#other_category").change(function () {
        var url = $(this).val(); // get selected value            
        var finalurl = '<?php echo base_url(); ?>home/listing/' + url;
        if (url) { // require a URL
            window.location = finalurl; // redirect
        }
        return false;

    });
    
    
    function trendingajaxPagination(page){
        var limit = '8';
        var count = $("#page_count_tre_cou").val();
        var start = (page - 1) * limit;
        $("#pagination_cou").val(page);
        $.ajax({
            url: "<?php echo base_url('home/trendinPagination'); ?>",
            type: "POST",
            data: {
                pagination:page,

            },
            success: function (response) {
                //alert(response);
                $('#grocery_pagination').html();
                $('#grocery_pagination').html(response);
                $('#trendingPagination_cou').html("");
                if (page > 1) {
                    
                    var pre = page - 1;
                    $("#trendingPagination_cou").html('<li><a href="" onclick = "return trendingajaxPagination(' + pre + ');"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>');
                }
                for (k = 1; k <= count; k++) {
                    
                    $("#trendingPagination_cou").append('<li><a href=""  onclick = "return trendingajaxPagination('+ k +');">'+ k +'</a></li>');
                }
                if (page < count) {
                    
                    var next = page + 1;
                    
                    $("#trendingPagination_cou").append('<li><a href="" onclick = "return trendingajaxPagination(' + next + ');"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>');
                }
                
            }
        });
        return false;

    }
    
    
    
    
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
<style>
    .fb-share-button
    {
        transform: scale(2);
        -ms-transform: scale(2);
        -webkit-transform: scale(2);
        -o-transform: scale(2);
        -moz-transform: scale(2);
        transform-origin: top left;
        -ms-transform-origin: top left;

        -moz-transform-origin: top left;

    }
</style>

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
<script type="text/javascript" src="<?php echo base_url() . '/assets/frontend/'; ?>js/jquery.flexisel.js"></script>


