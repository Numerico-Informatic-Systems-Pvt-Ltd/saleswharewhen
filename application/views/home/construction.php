<html>
    <head>
        <script type="text/javascript" src="<?php echo base_url() . '/assets/frontend/'; ?>js/jquery.js"></script>

    </head>
<body bgcolor="#4099ce">


<style type="text/css">
.construction_wrap{width:40%; margin:10% auto; padding:15px; background:#fff; box-shadow:0px 5px 15px #ccc; text-align:center; border:1px solid #A7A7A7;}
.construction_wrap h1{margin:0px; padding:10px; font-family:"Century Gothic"; font-size:30px; color:#fff; text-transform:uppercase; font-weight:bold; background:#4099ce;}
.construction_wrap h2{margin:0px; padding:10px; font-family:"Century Gothic"; font-size:20px; color:#2A2A2A; text-transform:uppercase; font-weight:bold;}
.construction_wrap p{margin:0px; padding:5px 10px; font-family:"Century Gothic"; font-size:14px; color:393939; text-transform:capitalize; text-align:center;}
.construction_wrap input{width:50%; margin:10px auto; padding:5px; border:1px solid #999; color:#2a2a2a;}
.construction_wrap .btn-primary {cursor:pointer;font-family:Tahoma, Geneva, sans-serif; font-size:20px; font-weight:bold; color:#fff; text-align:center; text-decoration:none; text-transform:uppercase; background:#4099ce;}
.error{font-size:10px !important; font-family:"Century Gothic" !important; width:50% !important; margin:0px auto !important; padding:0px !important;}
.construction_wrap p{margin:0px; padding:5px 10px; font-family:"Century Gothic"; font-size:14px; color:#393939; text-transform:capitalize; text-decoration:none; text-align:center;}
.construction_wrap p span{font-weight:bold; font-size:18px; color:#B90000;}
.construction_wrap p .app{font-weight:bold; font-size:18px; color:#393939 !important;}


</style>

<div class="construction_wrap">
    <h1>Coming Soon ! </h1>
    <h2>Page is Under Construction.</h2>
    <p>please put your E-mail to get update on this</p>
    <input type="text" id="subscribe_email" name="subscribe_email"/><span id="email_check" class="error"></span>
    <input type="hidden" id="subscription_type" name="type" value="app_update"/>
    <input type="button" id="App_update" value="Add" class="btn-primary" />
</div>
</body>
<script>
    $('#App_update').click( function(){
         var type = $("#subscription_type").val();
         var subscribe_email = $("#subscribe_email").val();
         var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
         var valid = emailReg.test(subscribe_email);
         if(!valid){
            $("#email_check").html('');
            var text = 'Enter a Valid Email !';
            $("#email_check").html('<p style="color:red">'+text+'</p>');
            return false;
        }else{
            $.ajax({
                url: "<?php echo base_url('home/subscribeMail'); ?>",
                type: "POST",
                data: {
                type: type,
                subscribe_email: subscribe_email
                },
                success: function (response) {
                    $("#email_check").html("");
                    $("#email_check").html('<p style="color:green">'+response+'</p>');
                }
            });
            
        }
    });     

</script>
</html>
