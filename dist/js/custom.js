
$(document).ready(function() {
  var ppp = 3; // Post per page
  var cat = 8;
  var pageNumber = 1;

  // Load more on click
	$(document).on("click",".load-more",function(){ // When btn is pressed.
    $(".load-more").attr("disabled",true); // Disable the button, temp.
    load_posts(ppp, cat, pageNumber);
    pageNumber++;
	});
});

function load_posts(ppp, cat, pageNumber){
    var str = '&cat=' + cat + '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax';
    $.ajax({
        type: "POST",
        dataType: "html",
        url: ajax_posts.ajaxurl,
        data: str,
        success: function(data){
            var $data = $(data);
            var $posts = $([]);
            for (i = 0; i < $data.length; i++) {
              if($data[i].className!="post-categories"&&$data[i].nodeName!="#text"){
                $posts.push($data[i]);
              }

            }
            if($posts.length){
              if($(".article-container").hasClass('filterize')){
                $(".article-container").isotope('insert',$posts);
              }else{
                $(".article-container").append($posts);
              }

                $(".load-more").attr("disabled",false);
            } else{
                $(".load-more").attr("disabled",true);
            }
        },
        error : function(jqXHR, textStatus, errorThrown) {
            $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
        }

    });
    return false;
}
