<tr>
    <td align="center" valign="top">
        <!-- CENTERING TABLE // -->
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td align="center" valign="top">
                    <!-- FLEXIBLE CONTAINER // -->
                    <table border="0" cellpadding="30" cellspacing="0" width="500" class="flexibleContainer">
                        <tr>
                            <td valign="top" width="500" class="flexibleContainerCell">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td align="left" valign="top" class="flexibleContainerBox">
                                            <table border="0" cellpadding="0" cellspacing="0" width="210" style="max-width:100%;">
                                                <tr>
                                                    <td align="left" class="textContent">
                                                        <img src="<?php echo base_url().'images/deals/listing/'.$allProducts[0]->banner;?>" width="210" class="flexibleImage" style="max-width:100%; border:1px solid #ccc;" alt="Text" title="Text" />
                                                        <h3 style="color:#5F5F5F;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:10px;margin-bottom:3px;text-align:left;"><?php echo $allProducts[0]->deal_text.' on '.$allProducts[0]->product_name;?></h3>
                                                        <div style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#5F5F5F;line-height:135%;"><?php echo substr($allProducts[0]->description,0,100);?></div>
                                                        <a href="<?php echo base_url().'home/productDetails/'.$allProducts[0]->id;?>" class="more">Click Get The Coupon &raquo;</a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td align="right" valign="top" class="flexibleContainerBox">
                                            <table class="flexibleContainerBoxNext" border="0" cellpadding="0" cellspacing="0" width="210" style="max-width:100%;">
                                                <tr>
                                                    <td align="left" class="textContent">
                                                        <img src="<?php echo base_url().'images/deals/listing/'.$allProducts[1]->banner;?>" width="210" class="flexibleImage" style="max-width:100%; height:150px;" alt="Text" title="Text" />
                                                        <h3 style="color:#5F5F5F;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:10px;margin-bottom:3px;text-align:left;"><?php echo $allProducts[1]->deal_text.' on '.$allProducts[1]->product_name;?></h3>
                                                        <div style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#5F5F5F;line-height:135%;"><?php echo substr($allProducts[1]->description,0,100);?></div>
                                                        <a href="<?php echo base_url().'home/productDetails/'.$allProducts[1]->id;?>" class="more">Click Get The Coupon &raquo;</a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <!-- // FLEXIBLE CONTAINER -->
                </td>
            </tr>
        </table>
        <!-- // CENTERING TABLE -->
    </td>
</tr>