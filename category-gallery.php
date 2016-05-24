<?php /* Template Name: Gallery */ ?>
<?php get_header(); ?>

      <div class="gallery-slider">
        <ul>
        <?php
            $categories = get_category_by_slug('gallery');
            $cat_id = $categories->term_id;
            $args = array(
                  'post_type' => 'post',
                  'posts_per_page' => 5,
                  'cat'=>$cat_id,
                  'post_status' => 'publish',
                  'orderby' => 'date',
                  'order' => 'DESC'
            );
            $loop = new WP_Query($args);
            while ($loop->have_posts()) : $loop->the_post();
              $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
              $photo_by = get_field('photo_by');
              $gallery_images = get_field('gallery_pictures');
                ?>
                <li class="gallery-header">
                  <img style="max-height:579px; overflow:hidden;" src="<?php echo $featured_image_url; ?>"/>
                  <div class="gallery-bar">

                    <ul>
                      <li class="slider-pager">
                        <span class="pager-active">01</span> –
                        <span class="pager-total">02</span>
                      </li>
                      <li class="info">Info</li>
                      <li class="date"><?php the_time('d M Y') ?></li>
                      <li class="photo-by">Photos by: <?php echo $photo_by ?></li>
                      <li class="gallery-title">Gallery : <a href="<?php  the_permalink(); ?>"><?php the_title() ?></a></li>
                      <li class="back"></li>
                    </ul>
                  </div>
                </li>

            <?php endwhile; // end of the loop.
          wp_reset_postdata();
          ?>
        </ul>




      </div>

  <div class="content content-gallery">
		<div class="container">
          <div class="row">
            <div id="ajax-more-posts" class="article-container filterize">
                <?php
                    $categories = get_category_by_slug('gallery');
                    $cat_id = $categories->term_id;
                    $postsPerPage = 8;
                    $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => $postsPerPage,
                            'cat'=>$cat_id,
                    );
                    $loop = new WP_Query($args);
                    while ($loop->have_posts()) : $loop->the_post();
                    $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                ?>
                <div id="<?php echo $post->ID ?>" class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
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
                <?php endwhile;
                wp_reset_postdata();
                ?>

           </div>
         </div>
         <?php if ( $loop->found_posts <= $postsPerPage ) : ?>
           <div class="load-more col-xs-12  btn" data-posts-per-page="<?php echo $postsPerPage; ?>" data-grid="3" data-category="<?php echo $cat_id; ?>">No more posts available</div>

           <?php else: ?>
          <div class="load-more col-xs-12  btn" data-posts-per-page="<?php echo $postsPerPage; ?>" data-grid="3" data-category="<?php echo $cat_id; ?>">Load more content</div>
        <?php endif;
        wp_reset_postdata(); ?>
  	</div>
	</div>


<?php get_footer(); ?>
