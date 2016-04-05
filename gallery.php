<?php /* Template Name: Gallery */ ?>
<?php get_header(); ?>

  <div class="content content-gallery">
		<div class="container">
      <div class="row">
        <div id="ajax-more-posts" class="article-container filterize">
            <?php
                $postsPerPage = 4;
                $args = array(
                        'post_type' => 'gallery',
                        'posts_per_page' => $postsPerPage
                );

                $loop = new WP_Query($args);

                while ($loop->have_posts()) : $loop->the_post();
                $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
            ?>
            <div class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
              <a href="<?php  the_permalink(); ?>" class="article-full-img">
                <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                <div class="article">
                  <div class="category">Gallery</div>
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
       <div class="load-more col-xs-12  btn" data-category="<?php echo $cat_id; ?>" data-grid="3">Load more content</div>
     </div>
    </div>
	</div>


<?php get_footer(); ?>
