<form action="<?php echo base_url('shop/signup');?>" method="post" enctype="multipart/form-data">
    Shop Name <input type="text" name="shop_name" ><br>
    Shop Image<input type="file" name="shop_img" ><br>
    Shop Logo<input type="file" name="shop_logo"><br>
    Shop Address <textarea name="shop_address" ></textarea><br>
    Shop City <select name="shop_city" ></select><br>
    Shop Zone <select name="shop_zone" ></select><br>
    Mobile <input type="text" name="shop_mobile" ><br>
    Highlights <textarea name="shop_highlights" ></textarea><br>
    Shop Url <input type="text" name="shop_url" ><br>
     <input type="hidden" name="merchant_id" value="<?php echo $merchant_id; ?>"><br>
    <input type="submit" value="submit">
</form>