<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Saleswherewhen :: My Account</title>

        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/bootstrap-theme.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/bootstrap.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/style.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/fonts/stylesheet.css" />

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/mgmenu.css" type="text/css" media="screen" />


        <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/BeatPicker.min.js"></script>
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
                <?php $this->load->view('front_include/megaMenu'); ?>

                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url();?>">Home</a></li>
                        <li class="active">My Account</li>
                    </ol>
                </div>
                <script type="text/javascript">
            function changePage() {
                $(document).ready(function () {
                    $("#chapro").click(function () {
                        $("#profile").show('slow');
                        $("#editProfile").hide('slow');
                        $("#editpassword").hide('slow');
                    });
                    $("#edipro").click(function () {
                        $("#profile").hide('slow');
                        $("#editProfile").show('slow');
                        $("#editpassword").hide('slow');
                    });

                    $("#edipro1").click(function () {
                        $("#profile").hide('slow');
                        $("#editProfile").show('slow');
                        $("#editpassword").hide('slow');
                    });
                    $("#chapass").click(function () {
                        $("#profile").hide('slow');
                        $("#editProfile").hide('slow');
                        $("#editpassword").show('slow');
                    });
                });
            }


                </script>
                <div class="col-lg-12">
                    <div class="profile_wrap">
                        <div class="col-lg-3">
                            <div class="left_nav">
                                <h2>My Profile</h2>
                                <ul>
                                    <li><a id="chapro" class="active" onclick="return changePage();" style="cursor: pointer;">My Profile</a></li>
                                    <li><a id="edipro" onclick="return changePage();" style="cursor: pointer;">Edit Profile</a></li>
                                    <li><a id="chapass" onclick="return changePage();" style="cursor: pointer;">Change Password</a></li>
                                    <li><a href="#">My Points Bank</a></li>
                                    <li><a href="#">My Alerts</a></li>
                                    <li><a href="#">My Sales</a></li>
                                    <li><a href="#">My Transactions</a></li>
                                    <!--<li><a href="#">My Preferences</a></li>
                                        <li><a href="#">My Deals</a></li>
                                        
                                        <li><a href="#">My Reviews</a></li>
                                        <li><a href="#">My Referrals</a></li>
                                        <li><a href="#">Redeem Coupons</a></li>f
                                        <li><a href="#">Subscription Details</a></li>
                                    -->
                                </ul>
                            </div>
                        </div>
                        <!--Profile-->
                          <?php
                                    // $userLogin = $this->session->userdata('user');
//                                    echo '<pre>';
                                   //print_r($userLogin);
//                                    $a = new ArrayObject($userLogin);
//                                    print_r($a->count());
                                    $total_fields = 10;
                                    $fields_filled = 0;
                                    if(!empty($userLogin->email_id)){ $fields_filled = $fields_filled + 20; }
                                    if(!empty($userLogin->contact_no)){ $fields_filled = $fields_filled + 10; }
                                    if(!empty($userLogin->city)){ $fields_filled = $fields_filled + 10; }
                                    if(!empty($userLogin->dob)){ $fields_filled = $fields_filled + 10; }
                                    if(!empty($userLogin->gender)){ $fields_filled = $fields_filled + 10; }
                                    if(!empty($userLogin->first_name)){ $fields_filled = $fields_filled + 10; }
                                    if(!empty($userLogin->last_name)){ $fields_filled = $fields_filled + 10; }
                                    if(!empty($userLogin->address)){ $fields_filled = $fields_filled + 20; }
                                    
                                    ?>
                        <div class="col-lg-9">
                            <div class="profile_right_wrap">
                                <div id="profile" style="">
                                    <h2>My Profile</h2>
                                    <div class="meter">
                                        <strong>Profile Meter</strong>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $fields_filled;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $fields_filled;?>%;">
                                                <?php echo $fields_filled.'%';?>
                                            </div>
                                        </div>
                                    </div>
                                  
                                    <h4>
                                        Account Information <span><a id="edipro1" onclick="return changePage();" style="cursor: pointer;" >Edit</a>
                                    </h4>
                                    
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="left" valign="top" width="30%">Email Address</td>
                                            <td align="left" valign="top" width="70%"><?php echo $userLogin->email_id; ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top" width="30%">Password</td>
                                            <td align="left" valign="top" width="70%">*********</td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top" width="30%">Mobile Number</td>
                                            <td align="left" valign="top" width="70%"><?php echo $userLogin->contact_no; ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top" width="30%">City</td>
                                            <td align="left" valign="top" width="70%"><?php echo $userLogin->city_name; ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top" width="30%">Date of Birth</td>
                                            <td align="left" valign="top" width="70%"><?php
                                                $newDate = date("d-m-Y", strtotime($userLogin->dob));
                                                echo $newDate;
                                                ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top" width="30%">Gender</td>
                                            <td align="left" valign="top" width="70%"><?php echo $userLogin->gender; ?></td>
                                        </tr>
                                    </table>

                                    <h4>
                                        Personal Details
                                    </h4>

                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="left" valign="top" width="30%">First Name</td>
                                            <td align="left" valign="top" width="70%"><?php echo $userLogin->first_name; ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top" width="30%">Last name</td>
                                            <td align="left" valign="top" width="70%"><?php echo $userLogin->last_name; ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top" width="30%">Address</td>
                                            <td align="left" valign="top" width="70%"><?php echo $userLogin->address; ?></td>
                                        </tr>
    
                                    </table>

                                    <div class="note">
                                        "You may increase your profile completeness by scoring more. Each entry in your profile helps you to increase your meter score. Verify your email id, enter your mobile number, Set your preferences, gender & subscribe to daily alerts to increase your meter score. "
                                    </div>
                                    <div class="clearfix"></div>
                                </div>


                                <!--Edit Profile Panel-->
                                <div id="editProfile" style="display: none;">
                                    <h2>Edit Profile</h2>
                                    <form action="<?php echo base_url(); ?>users/myAccount" method="post">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="left" valign="top" width="30%">Email ID<span class="red">*</span></td>
                                                <td align="left" valign="top" width="70%">

                                                    <span class="pull-left"><?php echo $userLogin->email_id; ?></span> 
                                                    <!--<span class="btn_verify"><a href="#">Verify Email ID</a></span>-->
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left" valign="top" width="30%">First Name<span class="red">*</span></td>
                                                <td align="left" valign="top" width="70%">
                                                    <input type="text" value="<?php echo $userLogin->first_name; ?>" name="first_name" class="profile_input"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left" valign="top" width="30%">Last Name<span class="red">*</span></td>
                                                <td align="left" valign="top" width="70%"><input type="text" value="<?php echo $userLogin->last_name; ?>" name="last_name"/ class="profile_input"></td>
                                            </tr>
                                            <tr>
                                                <td align="left" valign="top" width="30%">Address</td>
                                                <td align="left" valign="top" width="70%">
                                                    <textarea cols="17" rows="5" style="resize:none;" name="address" class="profile_input"><?php echo $userLogin->address; ?></textarea>
                                                </td>
                                            </tr>
    
                                            <tr>
                                                <td align="left" valign="top" width="30%">City</td>
                                                <td align="left" valign="top" width="70%">
                                                    <?php if(!empty($cityList)){?>
                                                    <select name="city">
                                                        <option value="">--select--</option>
                                                        <?php foreach($cityList as $city){ ?>
                                                        <option value="<?php echo $city->city_id; ?>" <?php echo ($userLogin->city_id == $city->city_id) ? 'selected': ' '; ?> ><?php echo $city->city_name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td align="left" valign="top" width="30%">Date of Birth<span class="red">*</span></td>
                                                <td align="left" valign="top" width="70%">
                                                    <input type="date" name="dob" value="<?php echo $userLogin->dob; ?>" class="profile_input" id="date_of_birth"></input>
                                                
                                                </td>
                                            </tr> 
                                            <tr>
                                                <td align="left" valign="top" width="30%">Gender</td>
                                                <td align="left" valign="top" width="70%">
                                                    <select name="gender">
                                                        <option value="">--select--</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </td>
                                            </tr>
    <!--                                        <tr>
                                                <td align="left" valign="top" width="30%">Pin/Zip Code<span class="red">*</span></td>
                                                <td align="left" valign="top" width="70%"><input type="text" value="" /></td>
                                            </tr>-->
                                            <tr>
                                                <td align="left" valign="top" width="30%">Mobile No.</td>
                                                <td align="left" valign="top" width="70%"><input type="text" value="<?php echo $userLogin->contact_no; ?>" name="contact_no"/ class="profile_input"></td>
                                            </tr>
                                            <tr>
                                                <td align="left" valign="top" width="30%">&nbsp;</td>
                                                <td align="left" valign="top" width="70%"><input type="submit" class="btn btn-primary" value="Save Changes"></td>
                                            </tr>
                                        </table>
                                    </form>

                                    <div class="clearfix"></div> 
                                </div>
                                <!--End Edit Profile Panel-->
                                <script type="text/javascript">
                                    function checkPass()
                                    {
                                        //Store the password field objects into variables ...
                                        var pass1 = document.getElementById('pass1');
                                        var pass2 = document.getElementById('pass2');
                                        //Store the Confimation Message Object ...
                                        var message = document.getElementById('confirmMessage');
                                        //Set the colors we will be using ...
                                        var goodColor = "#66cc66";
                                        var badColor = "#ff6666";
                                        //Compare the values in the password field 
                                        //and the confirmation field
                                        if (pass1.value == pass2.value) {
                                            //The passwords match. 
                                            //Set the color to the good color and inform
                                            //the user that they have entered the correct password 
                                            pass2.style.backgroundColor = goodColor;
                                            message.style.color = goodColor;
                                            message.innerHTML = "Passwords Match!"
                                        } else {
                                            //The passwords do not match.
                                            //Set the color to the bad color and
                                            //notify the user.
                                            pass2.style.backgroundColor = badColor;
                                            message.style.color = badColor;
                                            message.innerHTML = "Passwords Do Not Match!"
                                            return false;
                                        }
                                    }

				function oldPassword(oldpass){                                        
                                        
                                         $.ajax({
                                            url: "<?php echo base_url('users/checkPassword'); ?>",
                                            type: "POST",
                                            data: {
                                                oldpass: oldpass,                                                
                                             <?php echo $this->security->get_csrf_token_name() . ":'" . $this->security->get_csrf_hash() . "'"; ?>
                                            },
                                            success: function (data) { 
                                                $("#pas_err_mess").html("");
                                                if(data == 'true') {                                               
                                                $("#pas_err_mess").html('<p style="color:green;">Password Match.</p>'); 
                                                 }
                                                else 
                                                {
                                                     $("#pas_err_mess").html('<p style="color:red;">Incorrect Password.</p>');
                                                     return false;
                                                 }
                                            }
                                        });

                                        return false;
                                    }
                                </script>
                                <!--Change Password-->
                                <div id="editpassword" style="display: none;">
                                    <h2>Change Password</h2>
                                    <form action="<?php echo base_url(); ?>users/changePassword" method="post">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="left" valign="top" width="30%">Old Password<span class="red">*</span></td>
                                                <td align="left" valign="top" width="70%">
                                                    <input type="password" name="old_password" class="profile_input" onkeyup="return oldPassword(this.value);"></input>
                                                    <span id="pas_err_mess"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left" valign="top" width="30%">New Password<span class="red">*</span></td>
                                                <td align="left" valign="top" width="70%">
                                                    <input type="password" value="" id="pass1" name="new_password" class="profile_input"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left" valign="top" width="30%">Confirm Password<span class="red">*</span></td>
                                                <td align="left" valign="top" width="70%">
                                                    <input type="password" value="" name="new_password1" id="pass2" onkeyup="return checkPass();" class="profile_input"/>
                                                     <span id="confirmMessage" class="confirmMessage"></span>
                                                </td>
                                            
                                            </tr>

                                            <tr>
                                                <td align="left" valign="top" width="30%">&nbsp;</td>
                                                <td align="left" valign="top" width="70%"><input type="submit" class="btn btn-primary" value="Save Changes"></td>
                                            </tr>
                                        </table>
                                    </form>

                                    <div class="clearfix"></div> 
                                </div>
                                <!--End Change password-->
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!--End Profile Part-->
                    </div>
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
