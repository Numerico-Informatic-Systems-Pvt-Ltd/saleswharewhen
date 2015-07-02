<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Saleswherewhen :: <?php echo $content->page_title; ?></title>

        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/bootstrap-theme.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/bootstrap.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/style.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/fonts/stylesheet.css" />

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/mgmenu.css" type="text/css" media="screen" />


        <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/bootstrap.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/scripts.js"></script><!-- Mega Menu Script -->
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
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/mootools-core.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="container less_pad">
                <?php $this->load->view('front_include/header.php'); ?>                
                <div class="clearfix"></div>
                
<?php $this->load->view('front_include/megaMenu.php'); ?> 
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url();?>">Home</a></li>
                        <li class="active"><?php echo $content->page_title; ?></li>
                    </ol>
                </div>
                
                <div class="col-lg-12">
        			<?php echo $content->page_content; ?>
        		</div>
                <div class="clearfix"></div>
            </div>
        </div>

        <?php $this->load->view('front_include/footer.php'); ?>







        <script type="text/javascript">
            $(document).ready(function () {

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
</html>
