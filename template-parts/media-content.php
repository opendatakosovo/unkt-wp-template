
<div class="container">
  <div class="row">
   <div class="article-container filterize">
      <?php
      $postsPerPage = 9;
      $categories = get_the_category();
      $cat_id = $categories[0]->cat_ID;
      if($cat_id != ""){
        $args = array(
               'post_type' => 'post',
               'posts_per_page' => $postsPerPage,
               'cat'=>$cat_id
        );

        $loop = new WP_Query($args);
        while ($loop->have_posts()) : $loop->the_post();
          $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
          $outside_link =get_field('external_source_link'); ?>

          <?php if($outside_link == ""){ ?>
            <div class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
             <a href="<?php  the_permalink(); ?>" class="article-full-img">
               <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
               <div class="article">
                 <div class="category"><?php foreach(get_the_category() as $category) { echo $category->cat_name;} ?></div>
                 <div class="date"><?php echo get_the_date('j M Y');?></div>
                 <h3><?php the_title(); ?></h3>
                 <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
               </div>
             </a>
            </div>
          <?php }else{ ?>
            <div class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
             <a href="<?php  echo $outside_link; ?>" target="_blank" class="article-full-img">
               <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
               <div class="article">
                 <div class="category"><?php foreach(get_the_category() as $category) { echo $category->cat_name;} ?></div>
                 <div class="date"><?php echo get_the_date('j M Y');?></div>
                 <h3><?php the_title(); ?></h3>
                 <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
               </div>
             </a>
            </div>

          <?php } ?>

        <?php endwhile;
         wp_reset_postdata();
        }else{ ?>
          <div> No posts in this page.</div>
        <?php }

        ?>
  </div>
  </div>
  <div class="load-more col-xs-12 btn" data-category="<?php echo $cat_id; ?>" data-grid="3" data-post-type="post" data-posts-per-page="<?php echo $postsPerPage ?>">Load more content</div>
</div>
