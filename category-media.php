<?php get_header(); ?>
<style>

ul.ui-tabs-nav.ui-helper-reset.ui-helper-clearfix.ui-widget-header.ui-corner-all.ui-sortable {
    margin-top: 80px !Important;
    margin-bottom: -92px;
}
</style>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
$(function() {
var tabs = $( "#tabs" ).tabs();
tabs.find( ".ui-tabs-nav" ).sortable({
 axis: "x",
 stop: function() {
    tabs.tabs( "refresh" );
 }
});
});
</script>
<div class="container">
<div class="row">
 <div class="tabs-menu" id="tabs">
   <ul style="text-align: center;">
     <li>
      SORT VIEW:
     </li>
     <li>
      <a href="#latest">Latest</a>
     </li>
     <li>
      <a href="#news">News</a>
     </li>
     <li>
      <a href="#blogs">Blogs</a>
     </li>
     <li>
      <a href="#gallery">Galleries</a>
     </li>
   </ul>
   <div id="latest">
     <div class="row">
      <div id="latest-container" class="article-container filterize">
             <?php
                 $postsPerPage = 8;

                 $news_term = get_category_by_slug('news');
                 $news_id = $news_term->term_id;

                 $blogs_term = get_category_by_slug('blogs');
                 $blogs_id = $blogs_term->term_id;

                 $user_content_term = get_category_by_slug('community-contributions');
                 $user_content_id = $user_content_term->term_id;

                 $visualizations_term = get_category_by_slug('visualizations');
                 $visualizations_id = $visualizations_term->term_id;

                 $media_term = get_category_by_slug('media');
                 $media_id = $media_term->term_id;

                 $gallery_term = get_category_by_slug('gallery');
                 $gallery_id = $gallery_term->term_id;

                 $in_category = array($news_id,$blogs_id, $user_content_id, $visualizations_id, $gallery_id);

                 $categories = get_the_category();
                 $cat_id = $media_id;
                 $args = array(
                        'post_type' => array('post'),
                        'posts_per_page' => $postsPerPage,
                        'cat'=>$cat_id,
                        'category__in'=>$in_category,
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'DESC'
                 );

                 $loop = new WP_Query($args);

                 while ($loop->have_posts()) : $loop->the_post();
                 $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                 $outside_link =get_field('external_source_link');

                 $the_category_slug = "";
                 $the_category = "";

                   if(get_post_type()=="post"){
                     foreach(get_the_category() as $category) {
                       $the_category_slug = $category->slug . '';
                       $the_category = $category->cat_name . '';
                     }
                   }
                   else {
                     $the_category_slug = 'events';
                     $the_category = 'Events';
                     $terms = get_the_terms(strval( $post->ID ),'ecwd_event_category');
                     $event_categories = wp_get_post_terms($post->ID, 'ecwd_event_category','');
                   }
                   $article_img_div = "";
                   if($featured_image_url!=""){
                    $article_img_div='	<div class="article-img" style="background-image: url('.$featured_image_url.');"></div>';
                   }
                   // bm_ignorePost($post->ID);
                 ?>
                 <?php if($outside_link == ""){ ?>
                 <div id="<?php echo $post->ID ?>" class="col-xs-12 col-lg-3 item <?php echo $the_category_slug; ?>">
                   <a href="<?php  the_permalink(); ?>" class="article-full-img <?php if($the_category=="Jobs"){ echo 'article-red'; }else{ echo 'article-blue-light'; } ?>">
                     <?php echo $article_img_div; ?>
                     <div class="article">
                       <div class="category"><?php echo $the_category; ?></div>
                       <div class="date"><?php echo get_the_date('j M Y');?></div>
                       <h3><?php the_title(); ?></h3>
                       <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                     </div>
                   </a>
                 </div>
                 <?php }else{ ?>
                   <div id="<?php echo $post->ID ?>" class="col-xs-12 col-lg-3 item <?php echo $the_category_slug; ?>">
                     <a href="<?php  echo $outside_link; ?>" target="_blank" class="article-full-img <?php if($the_category=="Jobs"){ echo 'article-red'; }else{ echo 'article-blue-light'; } ?>">
                       <?php echo $article_img_div; ?>
                       <div class="article">
                         <div class="category"><?php echo $the_category; ?></div>
                         <div class="date"><?php echo get_the_date('j M Y');?></div>
                         <h3><?php the_title(); ?></h3>
                         <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                       </div>
                     </a>
                   </div>

                  <?php } ?>

             <?php endwhile;
             wp_reset_postdata();  ?>
      </div>
      <?php if ( $loop->found_posts < $postsPerPage ) : ?>
         <div class="load-more-home disable-button-no-more-posts-available col-xs-12 btn" data-exclude-posts="<?php echo implode(', ', $excluded_posts); ?>" data-category="" data-grid="3" data-page-name="home" data-posts-per-page="<?php echo $postsPerPage ?>">No more posts available</div>

        <?php else: ?>
          <div class="load-more-home col-xs-12 btn" data-category="<?php echo implode(', ', $in_category); ?>" data-exclude-posts="<?php echo implode(', ', $excluded_posts); ?>" data-category="" data-grid="3" data-page-name="home" data-posts-per-page="<?php echo $postsPerPage ?>">Load more posts</div>
        <?php endif; ?>
     </div>
   </div>
   <div id="news">
     <div class="row">
         <div id="news-container" class="article-container filterize">

           <?php
              $news_category = get_category_by_slug('news')->term_id;
              $loop = new WP_Query(array(
                      'post_type' => 'post',
                      'posts_per_page' => 8,
                      'cat'=> $news_category,
                      'post_status' => 'publish',
                      'orderby' => 'date',
                      'order' => 'DESC'
              ));

             while ($loop->have_posts()) : $loop->the_post();
                    $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                    $outside_link =get_field('external_source_link');
                    $the_category = "";
                    foreach(get_the_category() as $category) {
                      $the_category = $category->cat_name;
                    }

            ?>
             <?php if($outside_link == ""){ ?>
               <div id="<?php echo $post->ID ?>" class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
                <a href="<?php  the_permalink(); ?>" class="article-full-img <?php if($the_category=="Jobs"){ echo 'article-red'; }else{ echo 'article-blue-light'; } ?>">
                  <?php if($featured_image_url !=""){
                    ?>
                    <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                    <?php } ?>
                  <div class="article">
                    <div class="category"><?php echo $the_category?></div>
                    <div class="date"><?php echo get_the_date('j M Y');?></div>
                    <h3><?php the_title(); ?></h3>
                    <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                  </div>
                </a>
               </div>
             <?php }else{ ?>
               <div id="<?php echo $post->ID ?>" class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
                <a href="<?php  echo $outside_link; ?>" target="_blank" class="article-full-img <?php if($the_category=="Jobs"){ echo 'article-red'; }else{echo 'article-blue-light'; }?>">
                  <?php if($featured_image_url !=""){
                    ?>
                    <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                    <?php } ?>
                  <div class="article">
                    <div class="category"><?php foreach(get_the_category() as $category) { echo $category->cat_name;} ?></div>
                    <div class="date"><?php echo get_the_date('j M Y');?></div>
                    <h3><?php the_title(); ?></h3>
                    <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                  </div>
                </a>
               </div>

             <?php } ?>

           <?php endwhile; ?>
         </div>
         <?php if ( $loop->found_posts <= $postsPerPage ) : ?>
             <div class="load-more-home disable-button-no-more-posts-available col-xs-12 btn" data-category="<?php echo $news_category; ?>" data-grid="3" data-posts-per-page="8">No more posts available</div>

             <?php else: ?>
             <div class="load-more-home col-xs-12 col-lg-12 btn" data-category="<?php echo $news_category; ?>" data-grid="3" data-page-name="home" data-posts-per-page="8">Load more posts</div>
          <?php endif;
         wp_reset_postdata(); ?>
     </div>

   </div>
   <!-- Blogs -->
   <div id="blogs">
     <div class="row">
         <div id="blogs-container" class="article-container filterize">

           <?php
            $blogs_category = get_category_by_slug('blogs')->term_id;
            $loop = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 8,
                    'cat' => $blogs_category,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC'
            ));

           while ($loop->have_posts()) : $loop->the_post();
                  $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                  $outside_link =get_field('external_source_link');
                  $the_category = "";
                  foreach(get_the_category() as $category) {
                    $the_category = $category->cat_name;
                  }

            ?>
             <?php if($outside_link == ""){ ?>
               <div id="<?php echo $post->ID ?>" class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
                <a href="<?php  the_permalink(); ?>" class="article-full-img <?php if($the_category=="Jobs"){ echo 'article-red'; }else{ echo 'article-blue-light'; } ?>">
                  <?php if($featured_image_url !=""){
                    ?>
                    <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                    <?php } ?>
                  <div class="article">
                    <div class="category"><?php echo $the_category; ?></div>
                    <div class="date"><?php echo get_the_date('j M Y');?></div>
                    <h3><?php the_title(); ?></h3>
                    <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                  </div>
                </a>
               </div>
             <?php }else{ ?>
               <div id="<?php echo $post->ID ?>" class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
                <a href="<?php  echo $outside_link; ?>" target="_blank" class="article-full-img <?php if($the_category=="Jobs"){ echo 'article-red'; }else{echo 'article-blue-light'; }?>">
                  <?php if($featured_image_url !=""){
                    ?>
                    <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                    <?php } ?>
                  <div class="article">
                    <div class="category"><?php echo $the_category; ?></div>
                    <div class="date"><?php echo get_the_date('j M Y');?></div>
                    <h3><?php the_title(); ?></h3>
                    <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                  </div>
                </a>
               </div>

             <?php } ?>

           <?php endwhile; ?>
         </div>
         <?php if ( $loop->found_posts <= $postsPerPage ) : ?>
             <div class="load-more-home disable-button-no-more-posts-available col-xs-12 btn" data-category="<?php echo $blogs_category; ?>" data-grid="3" data-posts-per-page="8">No more posts available</div>

             <?php else: ?>
             <div class="load-more-home col-xs-12 col-lg-12 btn" data-category="<?php echo $blogs_category; ?>" data-grid="3" data-page-name="home" data-posts-per-page="8">Load more posts</div>
          <?php endif;
         wp_reset_postdata(); ?>
     </div>

   </div>
   <!-- End of blogs div  -->
   <!-- Gallery -->
   <div id="gallery">
     <div class="row">
         <div id="gallery-container" class="article-container filterize">

           <?php
            $gallery_category = get_category_by_slug('gallery')->term_id;
            $loop = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 8,
                    'cat' => $gallery_category,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC'
            ));

           while ($loop->have_posts()) : $loop->the_post();
                  $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                  $outside_link =get_field('external_source_link');
                  $the_category = "";
                  foreach(get_the_category() as $category) {
                    $the_category = $category->cat_name;
                  }

            ?>
             <?php if($outside_link == ""){ ?>
               <div id="<?php echo $post->ID ?>" class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
                <a href="<?php  the_permalink(); ?>" class="article-full-img <?php if($the_category=="Jobs"){ echo 'article-red'; }else{ echo 'article-blue-light'; } ?>">
                  <?php if($featured_image_url !=""){
                    ?>
                    <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                    <?php } ?>
                  <div class="article">
                    <div class="category"><?php echo $the_category; ?></div>
                    <div class="date"><?php echo get_the_date('j M Y');?></div>
                    <h3><?php the_title(); ?></h3>
                    <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                  </div>
                </a>
               </div>
             <?php }else{ ?>
               <div id="<?php echo $post->ID ?>" class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
                <a href="<?php  echo $outside_link; ?>" target="_blank" class="article-full-img <?php if($the_category=="Jobs"){ echo 'article-red'; }else{echo 'article-blue-light'; }?>">
                  <?php if($featured_image_url !=""){
                    ?>
                    <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                    <?php } ?>
                  <div class="article">
                    <div class="category"><?php echo $the_category; ?></div>
                    <div class="date"><?php echo get_the_date('j M Y');?></div>
                    <h3><?php the_title(); ?></h3>
                    <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                  </div>
                </a>
               </div>

             <?php } ?>

           <?php endwhile; ?>
         </div>
         <?php if ( $loop->found_posts <= $postsPerPage ) : ?>
             <div class="load-more-home disable-button-no-more-posts-available col-xs-12 btn" data-category="<?php echo $gallery_category; ?>" data-grid="3" data-posts-per-page="8">No more posts available</div>

             <?php else: ?>
             <div class="load-more-home col-xs-12 col-lg-12 btn" data-category="<?php echo $gallery_category; ?>" data-grid="3" data-page-name="home" data-posts-per-page="8">Load more posts</div>
          <?php endif;
         wp_reset_postdata(); ?>
     </div>

   </div>
   <!-- End of gallery div -->
   <!-- Community contributions -->
  <!-- <div id="community-contributions">
     <div class="row">
         <div id="community-contributions-container" class="article-container filterize">

           <?php
            $community_category = get_category_by_slug('community-contributions')->term_id;
            $loop = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 8,
                    'cat' => $community_category,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC'
            ));

           while ($loop->have_posts()) : $loop->the_post();
                  $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                  $outside_link =get_field('external_source_link');
                  $the_category = "";
                  foreach(get_the_category() as $category) {
                    $the_category = $category->cat_name;
                  }

            ?>
             <?php if($outside_link == ""){ ?>
               <div id="<?php echo $post->ID ?>" class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
                <a href="<?php  the_permalink(); ?>" class="article-full-img <?php if($the_category=="Jobs"){ echo 'article-red'; }else{ echo 'article-blue-light'; } ?>">
                  <?php if($featured_image_url !=""){
                    ?>
                    <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                    <?php } ?>
                  <div class="article">
                    <div class="category"><?php echo $the_category; ?></div>
                    <div class="date"><?php echo get_the_date('j M Y');?></div>
                    <h3><?php the_title(); ?></h3>
                    <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                  </div>
                </a>
               </div>
             <?php }else{ ?>
               <div id="<?php echo $post->ID ?>" class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
                <a href="<?php  echo $outside_link; ?>" target="_blank" class="article-full-img <?php if($the_category=="Jobs"){ echo 'article-red'; }else{echo 'article-blue-light'; }?>">
                  <?php if($featured_image_url !=""){
                    ?>
                    <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                    <?php } ?>
                  <div class="article">
                    <div class="category"><?php echo $the_category; ?></div>
                    <div class="date"><?php echo get_the_date('j M Y');?></div>
                    <h3><?php the_title(); ?></h3>
                    <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                  </div>
                </a>
               </div>

             <?php } ?>

           <?php endwhile; ?>
         </div>
         <?php if ( $loop->found_posts <= $postsPerPage ) : ?>
             <div class="load-more-home disable-button-no-more-posts-available col-xs-12 btn" data-category="<?php echo $community_category; ?>" data-grid="3" data-posts-per-page="8">No more posts available</div>

             <?php else: ?>
             <div class="load-more-home col-xs-12 col-lg-12 btn" data-category="<?php echo $community_category; ?>" data-grid="3" data-page-name="home" data-posts-per-page="8">Load more posts</div>
          <?php endif;
         wp_reset_postdata(); ?>
     </div>

   </div> -->
   <!-- // End of community-contributions div -->
 </div>
</div>
</div>
<?php get_footer(); ?>
