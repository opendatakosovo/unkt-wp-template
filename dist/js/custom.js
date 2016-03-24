
$(document).ready(function() {
  $(".category-media-posts-container").isotope({
    itemSelector: '.item',
    layoutMode : 'fitRows'
  });
  var pageNumber = 1;
  // Load more on click
	$(document).on("click",".load-more",function(){ // When btn is pressed.
    $(".load-more").attr("disabled",true); // Disable the button, temp.
    var ppp = $(".load-more").data('posts-per-page');
    var cat = $(".load-more").data('category');
    var grid = $(".load-more").data('grid');
    var post_type = $(".load-more").data('post-type');
    pageNumber++;
    load_posts(ppp, cat, pageNumber, grid, post_type);

	});
});

function load_posts(ppp, cat, pageNumber, grid, post_type){
    var str = '&cat=' + cat + '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax'+'&grid=' + grid+'&post_type=' + post_type ;
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
              }
              else if($(".article-container").hasClass('media')){

                $(".category-media-posts-container").isotope('insert',$posts);
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
