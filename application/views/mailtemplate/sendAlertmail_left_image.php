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

                                <!-- CONTENT TABLE // -->
                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td align="left" valign="top" class="flexibleContainerBox">
                                            <table border="0" cellpadding="0" cellspacing="0" width="210" style="max-width:100%;">
                                                <tr>
                                                    <td align="left" class="textContent">
                                                        <img src="<?php echo base_url().'images/deals/listing/'.$allProducts[$k+0]->banner;?>" width="210" class="flexibleImage" style="max-width:100%;" alt="Text" title="Text" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td align="right" valign="top" class="flexibleContainerBox">
                                            <table class="flexibleContainerBoxNext" border="0" cellpadding="0" cellspacing="0" width="210" style="max-width:100%;">
                                                <tr>
                                                    <td align="left" class="textContent">
                                                        <h3 style="color:#5F5F5F;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;"><?php echo $allProducts[$k+0]->deal_text.' on '.$allProducts[$k+0]->product_name;?></h3>
                                                        <div style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#5F5F5F;line-height:135%;"><?php echo substr($allProducts[$k+0]->description,0,100);?></div>
                                                        <a href="<?php echo base_url().'home/productDetails/'.$allProducts[$k+0]->id;?>" class="more">Click Get The Product &raquo;</a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                <!-- // CONTENT TABLE -->

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