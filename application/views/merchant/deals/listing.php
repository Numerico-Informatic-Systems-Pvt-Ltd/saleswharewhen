            <div class="portlet-body form">
                
                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Shop</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($deals)) {
                            foreach ($deals as $deal) {
                                ?>
                                <tr >
                                    <td><?php echo $deal->brand_name ; ?></td>
                                    <td><?php echo $deal->category_id; ?></td>
                                    <td><?php echo $deal->shop_id; ?></td>
                                    <td><img src = "<?php echo base_url() . 'images/offers' . $deal->banner; ?>" ></td>
                                    <td class="center"><?php
                                        if ($deal->status == "1") {
                                            echo "Active";
                                        } else {
                                            echo "Inactive";
                                        }
                                        ?></td>
                                    <td style="width:70px;">
                                        <a href="<?php echo base_url('deals/manage').'/'.$deal->id;?>" ><img src = "<?php echo base_url() . 'images/icons/edit.png' ?>" alt="Edit" height="30" width="30"></a>
                                        <a href="<?php echo base_url('common/isDeleted'); ?>/<?php echo $deal->id; ?>/users/category/viewCategory" ><img src = "<?php echo base_url() . 'images/icons/delete.png' ?>" alt="Delete" height="30" width="30"></a>
                                    </td>


                                </tr>

                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        