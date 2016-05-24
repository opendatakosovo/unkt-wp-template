<?php get_header(); ?>
<style>

ul.ui-tabs-nav.ui-helper-reset.ui-helper-clearfix.ui-widget-header.ui-corner-all.ui-sortable {
    /*margin-top: 80px !Important;*/
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
<div class="content">

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
            <a href="#jobs">Jobs</a>
          </li>
          <li>
            <a href="#tenders">Tenders</a>
          </li>
        </ul>
        <div id="latest">
          <div class="row">
            <div id="latest-container" class="article-container filterize">
                  <?php
                     $postsPerPage = 8;

                     $tenders_id = get_category_by_slug('tenders')->term_id;
                     $jobs_id = get_category_by_slug('jobs')->term_id;

                     $in_category = array($jobs_id, $tenders_id);

                     $work_with_us_id = get_category_by_slug('work-with-us')->term_id;
                     $cat_id = $work_with_us_id;
                     $loop = new WP_Query(array(
                              'posts_per_page' => 8,
                              'cat'=>$cat_id,
                              'category__in'=>$in_category,
                              'post_status' => 'publish',
                              'orderby' => 'date',
                              'order' => 'DESC'
                      ));

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
              <div class="load-more-home disable-button-no-more-posts-available col-xs-12 btn" data-category="" data-grid="3" data-page-name="home" data-posts-per-page="<?php echo $postsPerPage ?>">No more posts available</div>

             <?php else: ?>
               <div class="load-more-home col-xs-12 btn" data-category="<?php echo implode(', ', $in_category); ?>" data-grid="3" data-page-name="home" data-posts-per-page="<?php echo $postsPerPage ?>">Load more posts</div>
             <?php endif; ?>
          </div>
        </div>

        <!-- jobs -->
        <div id="jobs">
          <div class="row">
              <div id="jobs-container" class="article-container filterize">

                <?php
                 $jobs_category = get_category_by_slug('jobs')->term_id;
                 $loop = new WP_Query(array(
                         'post_type' => 'post',
                         'posts_per_page' => 8,
                         'cat' => $jobs_category,
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
                  <div class="load-more-home disable-button-no-more-posts-available col-xs-12 btn" data-category="<?php echo $jobs_category; ?>" data-grid="3" data-posts-per-page="8">No more posts available</div>

                  <?php else: ?>
                  <div class="load-more-home col-xs-12 col-lg-12 btn" data-category="<?php echo $jobs_category; ?>" data-grid="3" data-page-name="home" data-posts-per-page="8">Load more posts</div>
               <?php endif;
              wp_reset_postdata(); ?>
          </div>

        </div>
        <!-- // End of jobs div -->
        <!-- jobs -->
        <div id="tenders">
          <div class="row">
              <div id="tenders-container" class="article-container ">

                <?php
                 $tenders_category = get_category_by_slug('tenders')->term_id;
                 $loop = new WP_Query(array(
                         'post_type' => 'post',
                         'posts_per_page' => 8,
                         'cat' => $tenders_category,
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
                  <div class="load-more-home disable-button-no-more-posts-available col-xs-12 btn" data-category="<?php echo $tenders_category; ?>" data-grid="3" data-posts-per-page="8">No more posts available</div>

                  <?php else: ?>
                  <div class="load-more-home col-xs-12 col-lg-12 btn" data-category="<?php echo $tenders_category; ?>" data-grid="3" data-page-name="home" data-posts-per-page="8">Load more posts</div>
               <?php endif;
              wp_reset_postdata(); ?>
          </div>

        </div>
        <!-- // End of jobs div -->
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
