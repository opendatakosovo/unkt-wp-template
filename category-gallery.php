<?php /* Template Name: Gallery */ ?>
<?php get_header(); ?>
<style>
.sidebar-nav {
    width: 20.5% !important;
    padding-bottom: 0px !important;
}
.sidebar.sidebar-nav ul li a {
     width: 100%;
    padding: 36px 30px;
    font-size: 18px;
}
</style>

      <div class="gallery-slider">
        <ul>
        <?php
            $args = array(
                  'post_type' => 'post',
                  'posts_per_page' => 5,
                  'cat'=>$cat_id
            );

            $loop = new WP_Query($args);
            while ($loop->have_posts()) : $loop->the_post();
            $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
            ?>

          <?php
          $photo_by = get_field('photo_by');
          $gallery_images = get_field('gallery_pictures');
            ?>
            <li style="max-height:622px; overflow:hidden;">
              <img style="" src="<?php echo $featured_image_url; ?>"/>
              <h2 class='caption'><?php the_title(); ?></h2>
            </li>
          <?php endwhile; // end of the loop. ?>
          wp_reset_postdata();
        </ul>


        <div class="gallery-bar">

          <ul>
            <li class="slider-pager">
              <span class="pager-active">01</span> –
              <span class="pager-total">02</span>
            </li>
            <li class="info">Info</li>
            <li class="date"><?php the_time('d M Y') ?></li>
            <li class="photo-by">Photos by: <?php echo $photo_by ?></li>
            <li class="gallery-title">Gallery : <?php the_title() ?></li>
            <li class="back">

            </li>
          </ul>
        </div>

      </div>

  <div class="content content-gallery">
		<div class="container">
          <div class="row">
            <div id="ajax-more-posts" class="article-container filterize">
                <?php
                    $postsPerPage = 4;
                    $args = array(
                            'post_type' => 'post',
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
         </div>
          <div class="load-more col-xs-12  btn" data-grid="3" data-category="<?php echo $cat_id; ?>">Load more content</div>
  	</div>
	</div>


<?php get_footer(); ?>