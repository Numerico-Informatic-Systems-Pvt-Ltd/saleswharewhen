<div class="container-fluid less_pad">
	<div class="footer_wrap">
    	<div class="container less_pad">
        	<div class="col-lg-4">
            	<h2>saleswherewhen.com</h2>
                <ul>
                	<li><a href="<?php echo base_url('home/content/about_us'); ?>">About us</a></li>
                    <li><a href="<?php echo base_url('home/content/contact'); ?>">Contact us</a></li>
                    <li><a href="<?php echo base_url('home/content/career'); ?>">Careers</a></li>
                    <li><a href="<?php echo base_url('home/content/frequently_question_answer'); ?>">FAQs</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
            	<h2>Learn About</h2>
                <ul>
                	<li><a href="<?php echo base_url('home/content/coupon'); ?>">Coupon</a></li>
                    <!--<li><a href="#">Advertising</a></li>-->
                    <li><a href="<?php echo base_url('home/content/howitworks'); ?>">How it Works</a></li>
                    <li><a href="<?php echo base_url();?>login">Admin Login</a></li>
                    <li><a href="#"><img src="<?php echo base_url().'/assets/frontend/';?>images/trust_pay.png" alt="Trust Pay" class="img-responsive" /></a></li>
                </ul>
            </div>
            <div class="col-lg-4">
            	<h2>Merchants & Investor Relation</h2>
                <!-- <ul>                	
                    <li><a href="<?php echo base_url('signup/merchant'); ?>">Merchant SignUp</a></li>
                    <li><a href="<?php echo base_url('login/merchant'); ?>">Merchant SignIn</a></li>
                </ul> -->
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-4">
            	<div class="footer_social">
                	<span>Follow us :</span>
                
                    <a href="#"><img src="<?php echo base_url().'/assets/frontend/';?>images/footer_fb.png" alt="Facebook" class="img-responsive" /></a>
                    <a href="#"><img src="<?php echo base_url().'/assets/frontend/';?>images/footer_tw.png" alt="Twitter" class="img-responsive" /></a>
                    <a href="#"><img src="<?php echo base_url().'/assets/frontend/';?>images/footer_in.png" alt="Linked In" class="img-responsive" /></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-lg-4">
            	<!--<div class="footer_payment">
                	<span>Payment Method</span>
                    <a href="#"><img src="<?php echo base_url().'/assets/frontend/';?>images/master_card.png" alt="Master Card" class="img-responsive" /></a>
                    <a href="#"><img src="<?php echo base_url().'/assets/frontend/';?>images/visa.png" alt="Visa Card" class="img-responsive" /></a>
                    <a href="#"><img src="<?php echo base_url().'/assets/frontend/';?>images/maestro.png" alt="Maestro Card" class="img-responsive" /></a>
                </div>-->
            </div>
            <div class="col-lg-4">
            	<div class="footer_app_wrap">
                    <a href="<?php echo base_url().'home/construction/';?>" target="_blank"><span>Get The app</span>
                        <img src="<?php echo base_url().'/assets/frontend/';?>images/footer_android.png" alt="Android" class="img-responsive" /></a>
                    <a href="#"><img src="<?php echo base_url().'/assets/frontend/';?>images/footer_apple.png" alt="Apple" class="img-responsive" /></a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="copyright_wrap">
    	&copy; 2015 saleswherewhen.com. All Rights Reserved.
    </div>
    <div class="clearfix"></div>
    
    <div class="fixed_button" id="back-bottom"><a href="#top"><img src="<?php echo base_url().'/assets/frontend/';?>images/bu_dwn_part.png" alt="Down" class="img-responsive" /></a>
    <div class="fixed_button" id="back-top"><a href="#"><img src="<?php echo base_url().'/assets/frontend/';?>images/bu_up_part.png" alt="Down" class="img-responsive" /></a>
</div>
<script>
function innerSearchListing(search_key){
	if (search_key == '') {
                    $('div.search_results ul').remove();
                    //$("div.search_results").removeClass("search_arrow_box");
                } else {
                   // $("div.listing_search_results").addClass("search_arrow_box");
                    $.ajax({
                        url: "<?php echo base_url('home/search'); ?>",
                        type: "POST",
                        data: {
                            search_key: search_key
                        },
                        success: function (response) {
                            //alert(response);
                            $('div.search_results').html(response);
			    $('div.search_results').show();
                        }
                    });

                    return false;
                }

}

</script>
<script type="text/javascript" src="<?php echo base_url() . '/assets/frontend/'; ?>js/common.js"></script>
<script type="text/javascript">
$(document).ready(function(){
        
	// hide #back-top first
	$("#back-top").hide();
	//$("#back-bottom").show();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});
    

});
</script>
</body>
<?php $this->load->view('front_include/custom_js.php');?>
</html>
