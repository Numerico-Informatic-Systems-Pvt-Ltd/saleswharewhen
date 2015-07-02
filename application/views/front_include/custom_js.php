<script>
function Suggestion(key){
        if(key == ''){
           $('div#suggetion_box').hide(); 
        }
        $.ajax({
        url: "<?php echo base_url('home/getSuggestion'); ?>",
        type: "POST",
        data: {
            key: key, 
        },
        success: function (response) {
            $('div#suggetion_box').html(response);
            $('div#suggetion_box').show();
        }
    });
        return false;
    }
function selectSuggestion($key){
var text = $('li.suggestion_text_'+$key).text();
$('#search_text').val(text);
$("#suggetion_box ul").remove();
$("#suggetion_box").hide();
}
function SearchPagination(page){
    var key =$("#key").val();
    var category =$("#category").val();
    var brand =$("#brand").val();
    var location =$("#location").val();
    var limit = '16';
    var count = $("#page_count").val();
    var start = (page - 1) * limit;
    $("#page_value").val(page);
    $.ajax({
        url: "<?php echo base_url('home/searchPagination'); ?>",
        type: "POST",
        data: {
            start: start,
            key:key,
            category:category,
            brand:brand,
            location:location
        },
        success: function (response) {
            //alert(response);
            $('#search_content').html(response);
            $('.pagination').html("");
            if(page>1){
               var pre = page - 1;
               $(".pagination").append('<li><a href="" onclick = "return SearchPagination('+pre+');"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>');
            }
            for(k=1; k<=count; k++){
                if(page == k){
                    $(".pagination").append('<li><a href="" class = "pagi_active" onclick = "return SearchPagination('+k+')">'+k+'</a></li>');
                }else{
                    $(".pagination").append('<li><a href="" onclick = "return SearchPagination('+k+')">'+k+'</a></li>');
                }
            }
            if(page<count){
                var next = page + 1;
               $(".pagination").append('<li><a href="" onclick = "return SearchPagination('+next+');"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>');
            }
        }
    });
    return false;
}
function innerSearchPagination(page){
    var key =$("#key").val();
    var limit = '16';
    var count = $("#page_count").val();
    var start = (page - 1) * limit;
    $("#page_value").val(page);
    $.ajax({
        url: "<?php echo base_url('home/innerSearchPagination'); ?>",
        type: "POST",
        data: {
            start: start,
            key:key
        },
        success: function (response) {
            //alert(response);
            $('#inner_search_content').html(response);
            $('.pagination').html("");
            if(page>1){
               var pre = page - 1;
               $(".pagination").append('<li><a href="" onclick = "return innerSearchPagination('+pre+');"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>');
            }
            for(k=1; k<=count; k++){
                if(page == k){
                    $(".pagination").append('<li><a href="" class = "pagi_active" onclick = "return innerSearchPagination('+k+')">'+k+'</a></li>');
                }else{
                    $(".pagination").append('<li><a href="" onclick = "return innerSearchPagination('+k+')">'+k+'</a></li>');
                }
            }
            if(page<count){
                var next = page + 1;
               $(".pagination").append('<li><a href="" onclick = "return innerSearchPagination('+next+');"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>');
            }
        }
    });
    return false;
}
function commonPagination(page){
    //var key =$("#key").val();
    var category =$("#category").val();
    //var brand =$("#brand").val();
    //var location =$("#location").val();
    var limit = '10';
    var count = $("#page_count").val();
    var start = (page - 1) * limit;
    $("#page_value").val(page);
    $.ajax({
        url: "<?php echo base_url('home/categoryPagination'); ?>",
        type: "POST",
        data: {
            start: start,
            //key:key,
            category:category,
            //brand:brand,
            //location:location
        },
        success: function (response) {
            //alert(response);
            $('#pagination_result_container').html(response);
            $('.pagination').html("");
            if(page>1){
               var pre = page - 1;
               $(".pagination").append('<li><a href="" onclick = "return commonPagination('+pre+');"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>');
            }
            for(k=1; k<=count; k++){
                if(page == k){
                    $(".pagination").append('<li><a href="" class = "pagi_active" onclick = "return commonPagination('+k+')">'+k+'</a></li>');
                }else{
                    $(".pagination").append('<li><a href="" onclick = "return commonPagination('+k+')">'+k+'</a></li>');
                }
            }
            if(page<count){
                var next = page + 1;
               $(".pagination").append('<li><a href="" onclick = "return commonPagination('+next+');"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>');
            }
        }
    });
    return false;
}
</script>
