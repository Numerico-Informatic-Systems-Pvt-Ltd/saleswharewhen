<ul>
<?php
if(!empty($suggestion_key)){
                $c=0;
                foreach($suggestion_key as $suggestion){
                    $c++;
                    if($c > 10){
                        break;
                    }
                ?>
                <li class="suggestion_text_<?php echo $c; ?>" onclick="return selectGrocerySuggestion(<?php echo $c ;?>)"><?php echo $suggestion->product_name; ?></li>
                <?php
                }
            }else{ ?>
               <li>No Match Found For </li>
               <?php
            }
?>
</ul>