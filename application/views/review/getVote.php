<style>
    .clearfix:after {
        clear: both;
        content: "";
        display: block;
        height: 0;
        visibility: hidden;
    }
    .msin-item-rate {
        background-color: #f7f7f7;
        height: 127px;
        padding: 14px 0;
        text-align: center;
        width: 106px;
    }
    .fltRight {
        float: left;
        margin-left: 200px;
    }
    .round-5 {
        border-radius: 5px;
    }
    *, blockquote, body, dd, div, dl, dt, fieldset, form, h1, h2, h3, h4, h5, h6, iframe, input, li, ol, p, pre, td, textarea, th, ul {
        margin: 0;
        padding: 0;
    }
    *, blockquote, body, dd, div, dl, dt, fieldset, form, h1, h2, h3, h4, h5, h6, iframe, input, li, ol, p, pre, td, textarea, th, ul {
        margin: 0;
        padding: 0;
    }
</style>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
function getVote(val){
     //'ip_address' => $_SERVER['REMOTE_ADDR'],
      //alert(val);
      //alert(val);
      $.ajax({
        url: "<?php echo base_url('review/ajaxUpdateVote'); ?>",
                type: "POST",
                data: {
                    votetype: val,
                        <?php echo $this->security->get_csrf_token_name() . ":'" . $this->security->get_csrf_hash() . "'"; ?>
                },
                success: function(data){
                    alert(data);
                    $("#updated_vote").html("");
                    $("#updated_vote").html(data);
                }
        });
       
        return false;
    
}
</script>

<div class="fltRight msin-item-rate-wrapper">
    <div class="msin-item-rate clearfix round-5 fltRight">
        <h4  itemprop="success" class="pink-txt" id="succ_170066"><?php 
        
        $rawper = (100)/($getVote->like + $getVote->dislike);
        $totallikeper = $rawper * $getVote->like;
        echo round($totallikeper,2).'%'; 
        
        ?></h4>
        <h5 class="pink-txt">SUCCESS</h5>
        <p class="text-11 font-bold darkgrey-txt" id="totalvo_170066"><?php echo ($getVote->like + $getVote->dislike);?></p>
        <?php if($_SERVER['REMOTE_ADDR'] != $getVote->ip_address) {?>
        <div id="updated_vote">
            <small class="small darkgrey-txt display-block margin-top-spacing-5">Did this coupon<br />work for you?</small>            
            <a href="" onclick="return getVote('1');"><img border="0" width="30" height="30" src="<?php echo base_url();?>images/icons/like.jpg" id="like"></a>
            <a href="" onclick="return getVote(0);"><img border="0" width="30" height="30" src="<?php echo base_url();?>images/icons/dislike.jpg" id="dislike" ></a>
        </div>
        <?php }else {?>
        <small class="small darkgrey-txt display-block margin-top-spacing-5">Thank you for <br />your vote.</small>
        <?php } ?>
    </div>
    <p class="text-11 mediumgrey-txt clearRight text-align-right top-spacing-5"><i class="icon-ok"></i><span id="tested_170066">&nbsp;Tested on <?php echo date("d-m-Y",  strtotime($getVote->time));?></span></p>
</div>

