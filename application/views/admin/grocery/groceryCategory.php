<?php
foreach ($parent_category as $k => $v) {
    ?>
    <option value="<?php echo $parent_category[$k]['id']; ?>" ><?php echo $parent_category[$k]['category']; ?></option>
    <?php
    if (isset($parent_category[$k]['child'])) {
        foreach ($parent_category[$k]['child'] as $key => $value) {
            ?>
            <option value="<?php echo $parent_category[$k]['child'][$key]['id']; ?>" >----<?php echo $parent_category[$k]['child'][$key]['category']; ?></option>

            <?php
            if (isset($parent_category[$k]['child'][$key]['child'])) {
                foreach ($parent_category[$k]['child'][$key]['child'] as $_k => $_v) {
                    ?>
                    <option value="<?php echo $parent_category[$k]['child'][$key]['child'][$_k]['id']; ?>" >--------<?php echo $parent_category[$k]['child'][$key]['child'][$_k]['category']; ?></option>
                    <?php
                }
            }
        }
    }
}
?>