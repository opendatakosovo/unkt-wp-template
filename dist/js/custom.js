
$(document).ready(function() {

  var pageNumber = 1;
  // Load more on click
	$(document).on("click",".load-more",function(){ // When btn is pressed.


    var ppp = $(".load-more").data('posts-per-page');
    var cat = $(".load-more").data('category');
    var grid = $(".load-more").data('grid');
    var post_type = $(".load-more").data('post-type');
    var filter = "";
    if($(".load-more").data('filter') !== undefined){
      filter = $(".load-more").data('filter');
    }else{
      filter = "";
    }
    container_name = "";
    pageNumber++;
    load_posts(ppp, cat, pageNumber, grid, post_type, filter, container_name);
	});

  $(".load-more-home").click(function(){ // When btn is pressed.
    // $(this).attr("disabled",true); // Disable the button, temp.
    var container_name = $(this).parent().children().attr("id");
    var ppp = $(this).data('posts-per-page');
    var cat = $(this).data('category');
    var grid = $(this).data('grid');
    var post_type = $(this).data('post-type');
    var filter = "feed";
    // console.log("Loading home filtered articles...");
    var page_name = $(this).data('page-name');
    pageNumber++;
    load_posts(ppp, cat, pageNumber, grid, post_type, filter, container_name, page_name);
	});
  $(".tabs-menu").click(function(){
    // document.cookie = 'visited=1;expires=' + expiration + ';path=/';
    var xmlhttp = getXmlHttp();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open('GET','./wp-content/themes/unkt-wp-template/destroy_session.php', true);
    xmlhttp.onreadystatechange=function(){
       if (xmlhttp.readyState == 4){
          if(xmlhttp.status == 200){
            //  alert(xmlhttp.responseText);
         }
       }
    };
    xmlhttp.send(null);
    removeCookie("PHPSESSID");
  });
  $(".item").click(function(){
    removeCookie("PHPSESSID");
  });
  // $(".filter-posts").click(function(){
  //   console.log($(this).data('category'));
  //     $(".load-more").data("category",$(this).data('category'));
  //     $(".load-more").attr('data-category',$(this).data('category'));
  // })

  // execute above function
  initPhotoSwipeFromDOM('.my-gallery');

  buildSubscribeForm();

  var cookie = document.cookie;
  // document.cookie = 'visited=0;expires=;path=/';
  if (getCookie('visited')!=1) {
      var expiration = new Date();
      expiration.setDate(expiration.getDate()+1);
      document.cookie = 'visited=1;expires=' + expiration + ';path=/';

      var loader = document.getElementById('loader');

      loader.style.display = 'block';

      setTimeout(function(){
        var subscribe = document.getElementById('subscribe-header');
        subscribe.style.display = 'block';
      }, 5000);

  }else{
    var subscribe = document.getElementById('subscribe-header');
    subscribe.remove();
  }

});

function getCookie(name)
  {
    var re = new RegExp(name + "=([^;]+)");
    var value = re.exec(document.cookie);
    return (value !== null) ? unescape(value[1]) : null;
  }
function removeCookie(cookieName)
  {
      cookieValue = "";
      cookieLifetime = -1;
      var date = new Date();
      date.setTime(date.getTime()+(cookieLifetime*24*60*60*1000));
      var expires = "; expires="+date.toGMTString();
      document.cookie = cookieName+"="+JSON.stringify(cookieValue)+expires+"; path=/";
  }
function buildSubscribeForm(){

  $('.es_lablebox').html('');
  $('.es_textbox_class').attr('placeholder','your@email.here');
  $('.es_textbox_button').attr('value','');
  $('.es_button').addClass('icon-arrow-right');
  // $('.es_textbox_button').addClass('icon-arrow-right');
}

function load_posts(ppp, cat, pageNumber, grid, post_type, filter, container_name, page_name){
    var str = '&cat=' + cat + '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax'+'&grid=' + grid+'&post_type=' + post_type +'&filter=' + filter+'&page_name=' + page_name;
    $.ajax({
        type: "POST",
        dataType: "html",
        url: ajax_posts.ajaxurl,
        data: str,
        success: function(data){
            var $data = $(data);
            if($data == "NULL"){
              $(".load-more").text("No more posts available");
              $(".load-more").prop("disabled",true); // Disable the button
              $("#"+container_name).parent().find(".load-more-home").addClass("disable-button-no-more-posts-available");
              $("#"+container_name).parent().find(".load-more-home")[0].innerHTML = "No more posts available";

            }else{
              var $posts = $([]);
              for (i = 0; i < $data.length; i++) {
                if($data[i].className!="post-categories"&&$data[i].nodeName!="#text"){
                  $posts.push($data[i]);
                }

              }
              if($posts.length!==0){
                if(container_name!==undefined && container_name != ""){
                  $("#"+container_name).append( $posts );
                }else{
                  $(".article-container").append( $posts )
                  .isotope( 'appended', $posts );
                }
                if($posts.length<=ppp){
                  $(".load-more").text("No more posts available");
                  $(".load-more").prop("disabled",true); // Disable the button, temp.
                  $("#"+container_name).parent().find(".load-more-home").addClass("disable-button-no-more-posts-available");
                  $("#"+container_name).parent().find(".load-more-home")[0].innerHTML = "No more posts available";

                }

              } else{
                  console.log("No more posts in this filter.")
                  $(".load-more").text("No more posts available");
                  $(".load-more").prop("disabled",true); // Disable the button, temp.
                  $("#"+container_name).parent().find(".load-more-home").addClass("disable-button-no-more-posts-available");
                  $("#"+container_name).parent().find(".load-more-home")[0].innerHTML = "No more posts available";
              }
            }

        },
        error : function(jqXHR, textStatus, errorThrown) {
            $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            $(".load-more").text("No more posts available");
            $(".load-more").prop("disabled",true); // Disable the button, temp.
            $("#"+container_name).parent().find(".load-more-home").addClass("disable-button-no-more-posts-available");
            $("#"+container_name).parent().find(".load-more-home")[0].innerHTML = "No more posts available";
        }

    });
    return false;
}

var initPhotoSwipeFromDOM = function(gallerySelector) {

    // parse slide data (url, title, size ...) from DOM elements
    // (children of gallerySelector)
    var parseThumbnailElements = function(el) {
        var thumbElements = el.childNodes,
            numNodes = thumbElements.length,
            items = [],
            figureEl,
            linkEl,
            size,
            item;

        for(var i = 0; i < numNodes; i++) {

            figureEl = thumbElements[i]; // <figure> element

            // include only element nodes
            if(figureEl.nodeType !== 1) {
                continue;
            }

            linkEl = figureEl.children[0]; // <a> element

            size = linkEl.getAttribute('data-size').split('x');

            // create slide object
            item = {
                src: linkEl.getAttribute('href'),
                w: parseInt(size[0], 10),
                h: parseInt(size[1], 10)
            };



            if(figureEl.children.length > 1) {
                // <figcaption> content
                item.title = figureEl.children[1].innerHTML;
            }

            if(linkEl.children.length > 0) {
                // <img> thumbnail element, retrieving thumbnail url
                item.msrc = linkEl.children[0].getAttribute('src');
            }

            item.el = figureEl; // save link to element for getThumbBoundsFn
            items.push(item);
        }

        return items;
    };

    // find nearest parent element
    var closest = function closest(el, fn) {
        return el && ( fn(el) ? el : closest(el.parentNode, fn) );
    };

    // triggers when user clicks on thumbnail
    var onThumbnailsClick = function(e) {
        e = e || window.event;
        e.preventDefault ? e.preventDefault() : e.returnValue = false;

        var eTarget = e.target || e.srcElement;

        // find root element of slide
        var clickedListItem = closest(eTarget, function(el) {
            return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
        });

        if(!clickedListItem) {
            return;
        }

        // find index of clicked item by looping through all child nodes
        // alternatively, you may define index via data- attribute
        var clickedGallery = clickedListItem.parentNode,
            childNodes = clickedListItem.parentNode.childNodes,
            numChildNodes = childNodes.length,
            nodeIndex = 0,
            index;

        for (var i = 0; i < numChildNodes; i++) {
            if(childNodes[i].nodeType !== 1) {
                continue;
            }

            if(childNodes[i] === clickedListItem) {
                index = nodeIndex;
                break;
            }
            nodeIndex++;
        }



        if(index >= 0) {
            // open PhotoSwipe if valid index found
            openPhotoSwipe( index, clickedGallery );
        }
        return false;
    };

    // parse picture index and gallery index from URL (#&pid=1&gid=2)
    var photoswipeParseHash = function() {
        var hash = window.location.hash.substring(1),
        params = {};

        if(hash.length < 5) {
            return params;
        }

        var vars = hash.split('&');
        for (var i = 0; i < vars.length; i++) {
            if(!vars[i]) {
                continue;
            }
            var pair = vars[i].split('=');
            if(pair.length < 2) {
                continue;
            }
            params[pair[0]] = pair[1];
        }

        if(params.gid) {
            params.gid = parseInt(params.gid, 10);
        }

        return params;
    };

    var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
        var pswpElement = document.querySelectorAll('.pswp')[0],
            gallery,
            options,
            items;

        items = parseThumbnailElements(galleryElement);

        // define options (if needed)
        options = {

            // define gallery index (for URL)
            galleryUID: galleryElement.getAttribute('data-pswp-uid'),

            getThumbBoundsFn: function(index) {
                // See Options -> getThumbBoundsFn section of documentation for more info
                var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
                    pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                    rect = thumbnail.getBoundingClientRect();

                return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
            }

        };

        // PhotoSwipe opened from URL
        if(fromURL) {
            if(options.galleryPIDs) {
                // parse real index when custom PIDs are used
                // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
                for(var j = 0; j < items.length; j++) {
                    if(items[j].pid == index) {
                        options.index = j;
                        break;
                    }
                }
            } else {
                // in URL indexes start from 1
                options.index = parseInt(index, 10) - 1;
            }
        } else {
            options.index = parseInt(index, 10);
        }

        // exit if index not found
        if( isNaN(options.index) ) {
            return;
        }

        if(disableAnimation) {
            options.showAnimationDuration = 0;
        }

        // Pass data to PhotoSwipe and initialize it
        gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
        gallery.init();
    };

    // loop through all gallery elements and bind events
    var galleryElements = document.querySelectorAll( gallerySelector );

    for(var i = 0, l = galleryElements.length; i < l; i++) {
        galleryElements[i].setAttribute('data-pswp-uid', i+1);
        galleryElements[i].onclick = onThumbnailsClick;
    }

    // Parse URL and open gallery if it contains #&pid=3&gid=1
    var hashData = photoswipeParseHash();
    if(hashData.pid && hashData.gid) {
        openPhotoSwipe( hashData.pid ,  galleryElements[ hashData.gid - 1 ], true, true );
    }
};
function getXmlHttp() {
           var x = false;
           try {
              x = new XMLHttpRequest();
           }catch(e) {
             try {
                x = new ActiveXObject("Microsoft.XMLHTTP");
             }catch(ex) {
                try {
                    req = new ActiveXObject("Msxml2.XMLHTTP");
                }
                catch(e1) {
                    x = false;
                }
             }
          }
          return x;
        }

        function getState(countryId){
          var strURL="findState.php?country="+countryId;
          var req = getXMLHTTP();

          if (req){
            req.onreadystatechange = function(){
              if (req.readyState == 4){
                if (req.status == 200){
                  document.getElementById('statediv').innerHTML=req.responseText;
                } else {
                  alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                }
              }
            }
            req.open("GET", strURL, true);
            req.send(null);
           }
        }
