<link type="text/css" rel="stylesheet" href="<?php echo base_url() . '/assets/frontend/'; ?>css/popuplogin.css" />
<script type="text/javascript" src="<?php echo base_url() . '/assets/frontend/'; ?>js/jquery.leanModal.min.js"></script>
<script type="text/javascript">
                            $("#brand_review_popup").leanModal({top: 200, overlay: 0.6, closeButton: ".modal_close"});
                            
                            $(function () {
                            // Calling Login Form
                            $("#login_form").click(function () {
                            $(".social_login").hide();
                                    $(".user_login").show();
                                    return false;
                            });
                                    // Calling Register Form
                                    $("#register_form").click(function () {
                            $(".social_login").hide();
                                    $(".user_register").show();
                                    $(".header_title").text('Register');
                                    return false;
                            });
                                    // Going back to Social Forms
                                    $(".back_btn").click(function () {
                            $(".user_login").hide();
                                    $(".user_register").hide();
                                    $(".social_login").show();
                                    $(".header_title").text('Login');
                                    return false;
                            });
                            })
</script>
<div id="brand_review_popup" class="popupContainer" style="display:none;">
    <header class="popupHeader">
        <span class="header_title">Register</span>
        <span class="modal_close">X</span>
    </header>
</div>
