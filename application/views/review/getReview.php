<head>
    <title>SalesWhereWhen</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/scripts/review/jRating.jquery.css" type="text/css" />

    <style type="text/css">
        body {margin:15px;font-family:Arial;font-size:13px}
        a img{border:0}
        .datasSent, .serverResponse{margin-top:20px;width:470px;height:73px;border:1px solid #F0F0F0;background-color:#F8F8F8;padding:10px;float:left;margin-right:10px}
        .datasSent{width:200px;position:fixed;left:680px;top:0}
        .serverResponse{position:fixed;left:680px;top:100px}
        .datasSent p, .serverResponse p {font-style:italic;font-size:12px}
        .exemple{margin-top:15px;}
        .clr{clear:both}
        pre {margin:0;padding:0}
        .notice {background-color:#F4F4F4;color:#666;border:1px solid #CECECE;padding:10px;font-weight:bold;width:600px;font-size:12px;margin-top:10px}
    </style>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/review/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/review/jRating.jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {


            $('.exemple3').jRating({
                step: true,
                length: 5
            });


        });
    </script>
</head>

<form action="" method="post" enctype="multipart/form-data">  
    <div id="rating">

        <div class="exemple3" data-average="18" data-id="3"></div>
        <div class="datasSent" style="display:none;">	
            <p></p>
        </div>
    </div>
    Review Title<input type="text" name="review_title"><br>
    Review  <textarea name="review_description"></textarea><br>
    <input type="submit" name="submit" value="submit">

</form>



