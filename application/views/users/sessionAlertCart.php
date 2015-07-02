<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Saleswherewhen :: Alert Me Cart</title>

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

                <?php $this->load->view('front_include/megaMenu.php'); ?>      

                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="active">Alert Me Cart</li>
                    </ol>
                </div>

                <div class="col-lg-12">
                    <div class="profile_wrap">

                        <!--Profile-->

                        <div class="col-lg-12">
                            <div class="profile_right_wrap">
                                <div id="profile" style="">
                                    <h2>Alert Me Cart</h2>
                                    <form action="<?php echo base_url();?>signup/forgotPassword" method="post">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <th align="left" valign="top" width="5%">Alert Type</th>
                                            <th align="left" valign="top" width="5%">Alert To</th>
                                            <th align="left" valign="top" width="5%">Item</th>
                                            <th align="left" valign="top" width="5%">Category</th>
                                            <th align="left" valign="top" width="5%">Shop</th>
                                            <th align="left" valign="top" width="5%">Remove</th>
                                        </tr>
                       	<?php
						if(!empty($alert_item)){
					   		foreach($alert_item as $key => $value){
						?>
                                         <tr>
                                                <td align="left" valign="top" width="5%"><?php echo $alert_type[$key]; ?></td>
                                                <td align="left" valign="top" width="5%"><?php echo $alert_data[$key]; ?></td>
                                                <td align="left" valign="top" width="5%"><?php echo $value; ?></td>
                                                <td align="left" valign="top" width="5%"><?php echo $alert_brand[$key]; ?></td>
                                                <td align="left" valign="top" width="5%"><?php echo $alert_shop[$key]; ?></td>
                                                <td align="left" valign="top" width="5%"><a href = "<?php echo base_url('home/removeAlertItem').'/'.($key+1); ?>">X</td>
                                            </tr>
                    	<?php
							}
						
						?>
                        					<tr>
                                            	<td colspan = 6 align = "right"><a href = "<?php echo base_url('home/insertAlert'); ?>" ><input type="button" value = "Done" class="alert_popup_btn"/></td>
                                            </tr>
<?php } else { echo '<h4>No Item in Alert Cart.</h4>'; }?>
                                    </table>                                 
                                    </form>
                                    <div class="clearfix"></div>
                                </div>                              
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('front_include/footer.php'); ?>
