<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Saleswherewhen :: Merchant SignUp</title>

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
            
            
            
               
               function checkPass()
                {
                    
                    var password = document.getElementById('passworda');
                    var cnf_password = document.getElementById('cnf_password');
                    //alert(password.value);
                    //alert(password.value +'--'+ cnf_password.value);
                    var message = document.getElementById('confirmMessage');                    
                    var goodColor = "#66cc66";
                    var badColor = "#ff6666";                    
                    if(password.value == cnf_password.value){                        
                        cnf_password.style.backgroundColor = goodColor;
                        message.style.color = goodColor;
                        message.innerHTML = "Passwords Match!"
                        return true;
                    }else{                        
                        cnf_password.style.backgroundColor = badColor;
                        message.style.color = badColor;
                        message.innerHTML = "Passwords Do Not Match!"
                        return false;
                    }
                }
                
                function checkValidation(){
                    var confirmMessagea = document.getElementById('confirmMessage').innerHTML;
                    var a = document.getElementById('contact_number').value;
                    var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
                    var message = document.getElementById('contact_message');  
                    var badColor = "#ff6666";
                    if(confirmMessagea == "Passwords Do Not Match!"){
                        return false;
                    }
                    else{
                        
                        if (filter.test(a)) 
                            {   
                                var email =   document.getElementById('email_error_msg').innerHTML;                         
                               
                                if(email == 'Company Email Already Exist.'){
                                    return false;
                                }
                                else{
                                    
                                        var name_format =   document.getElementById('name_error_msg').innerHTML; 
                                        if(name_format == 'Incorrect Name Format.'){
                                            return false;
                                        }else{
                                            return true;
                                        }
                                    
                                    }
                            }
                        else {
                                message.style.color = badColor;
                                message.innerHTML = "Incorrect Phone Number Format!"
                                return false;
                            }
                    }
                    
                    
                }
                
                function email_check_merchant(email){
                        
                                //alert(email);
                                $.ajax({
                                    url: "<?php echo base_url('signup/ajaxgetmerchantemail'); ?>",
                                    type: "POST",
                                data: {
                                    EmailId: email,                
                                    },
                                success:function(data) {                                    
                                   $("#email_error_msg").html(" ");
                                   if(data == false){                                       
                                    $("#email_error_msg").html("Company Email Already Exist."); 
                                    return false;
                                    }
                                    else{                                        
                                        return true;
                                    }
                                }
                                });
                }
                
                function checkName(name){
                    //alert(name);
                    var letters = /^[A-Za-z]+$/;  
                    if(name.match(letters))  
                        {  
                           $("#name_error_msg").html("");
                         return true;  
                        }  
                    else  
                        {  
                         $("#name_error_msg").html("Incorrect Name Format."); 
                        return false;  
                        }  
                }
        </script>
        
        <script>
        function selectCountry(country){                 
                   //alert(country);
                   $.ajax({
                            url: "<?php echo base_url('home/ajaxgetcityofCountry'); ?>",
                            type: "POST",
                            data: {
                            country: country,
                <?php echo $this->security->get_csrf_token_name() . ":'" . $this->security->get_csrf_hash() . "'"; ?>
                            },
                            success:function(data) {
                                //alert(data);
                              $("#city").html(" ");  
                              $("#city").append('<option value='+0+'>--SELECT--</option>');
                              $.each(JSON.parse(data), function(idx, obj) { 
                                          $("#city").append('<option value='+obj.city_id+'>'+obj.city_name+'</option>');
                                           
                                            
                                    });                            
                            
                            
                            }
                    });
                    return false;
                    
               }
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
                        <li class="active">Merchant Signup</li>
                    </ol>
                </div>

                <div class="col-lg-12">
                    <div class="profile_wrap">

                        <!--Profile-->

                        <div class="col-lg-12">
                            <div class="profile_right_wrap">
                                <div id="profile" style="">
                                    <h2>Merchant Signup</h2>
                                    <form action="<?php echo base_url();?>signup/merchant" method="post" enctype="multipart/form-data" onsubmit="return checkValidation();">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="50%" valign="top">
                                                <table>
                                                    <tr>
                                                        <td align="left" valign="top" width="28%">Company Name:<span class="red">*</span></td>
                                                        <td align="left" valign="top" width="72%"><input type="text" size="50" class="profile_input" name="comp_name" required placeholder="Enter Company Name.."/></td>
                                            
                                                    </tr>
                                                   
                                                    <tr>
                                                        <td align="left" valign="top" width="20%">Company Email:<span class="red">*</span></td>
                                                        <td align="left" valign="top" width="80%"><input onkeyup="return email_check_merchant(this.value);" type="email" size="50" class="profile_input" name="email_id" id="email_id_check" required  placeholder="Enter Company Email.."/>
                                                            <br> <span style="color:red;" id="email_error_msg" class="email_error_msg"></span>
                                                        </td>
                                            
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top" width="20%">Company Address:</td>
                                                        <td align="left" valign="top" width="80%"><textarea size="50" class="profile_input" required name="address" placeholder="Enter Company Address.."></textarea></td>
                                            
                                                    </tr>
 <tr>
                                                        <td align="left" valign="top" width="20%">Zip Code: <span class="red">*</span></td>
                                                        <td align="left" valign="top" width="80%"><input type="text" size="50" class="profile_input" name="zip_code" required id="zip_code"  placeholder="Enter ZipCode.."/></td>
                                            
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top" width="30%">Company Telephone:<span class="red">*</span></td>
                                                        <td align="left" valign="top" width="70%"><input type="text" size="50" class="profile_input" name="contact_no" id="contact_number" required  placeholder="Enter Company Contact.."/>
                                                        <br> <span id="contact_message" class="contact_message"></span>
                                                        </td>
                                            
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top" width="20%"> Company Country:<span class="red">*</span></td>
                                                        <td align="left" valign="top" width="80%">
                                                            <select name="country" id="country" required onchange="return selectCountry(this.value);">
                                                                <option value="0">--Select Country--</option>
                                                                <option value="Canada">Canada</option>
                                                                <option value="USA">USA</option>
                                                            </select>                                                                                                                   
                                                        </td>                                            
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top" width="20%"> Company City:<span class="red">*</span></td>
                                                        <td align="left" valign="top" width="80%">
                                                            
                                                            
                                                            <select name="city" required id="city">
                                                                <option value="0">--Select City--</option>
                                                                

                                                            </select>
                                                        </td>
                                            
                                                    </tr>
                                                </table>    
                                            </td>
                                             <td width="50%" valign="top">
                                                <table>
                                                     <tr>
                                                        <td align="left" valign="top" width="30%">Contact First Name:<span class="red">*</span></td>
                                                        <td align="left" valign="top" width="70%"><input onkeyup="return checkName(this.value);" type="text" size="50" class="profile_input" name="contact_first_name" required placeholder="Enter First Name.."/>
                                                            <br> <span id="name_error_msg" style="color: red;" class="name_error_msg"></span>
                                                        </td>
                                            
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top" width="20%">Contact Last Name:</td>
                                                        <td align="left" valign="top" width="80%"><input type="text" size="50" class="profile_input" name="contact_last_name" placeholder="Enter Last Name.."/></td>
                                            
                                                    </tr>
                                                     <tr>
                                                        <td align="left" valign="top" width="20%">Contact Telephone:</td>
                                                        <td align="left" valign="top" width="80%"><input type="text" size="50" class="profile_input" name="contact_telephone" placeholder="Enter Contact Telephone.."/></td>
                                            
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top" width="20%">Contact Email:</td>
                                                        <td align="left" valign="top" width="80%"><input type="email" size="50" class="profile_input" name="contact_email" placeholder="Enter Contact Email.."/></td>
                                            
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top" width="20%">Password:<span class="red">*</span></td>
                                                        <td align="left" valign="top" width="80%"><input type="password" size="50" class="profile_input" name="password" id="passworda" required  placeholder="Enter Password.."/></td>
                                            
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top" width="27%">Confirm Password:<span class="red">*</span></td>
                                                        <td align="left" valign="top" width="73%"><input onkeyup="checkPass(); return false;" type="password" size="50" class="profile_input" name="cnf_password" required id="cnf_password"  placeholder="Re-Enter Password.."/>
                                                            <br> <span id="confirmMessage" class="confirmMessage"></span>
                                                        </td>
                                                         
                                                    </tr>
                                                    
                                                   
                                                </table>    
                                            </td>                                            
                                        </tr>
                                        <?php 
                                        if(isset($succ_regis)){
                                            echo '<p style="color:green;font-size:16px">Check Your Company mail for Confirmation of Registration.</p>';
                                        }
                                        
                                        ?>
                                         <tr>
                                                
                                             <td align="right" valign="top" colspan="2"><input type="submit" class="btn btn-primary" style="float:right;  margin-right: 11.5% !important;" value="Submit"></td>
                                            </tr>
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
