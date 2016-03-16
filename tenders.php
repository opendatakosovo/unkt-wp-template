<?php /* Template Name: Tenders */ ?>
<?php get_header(); ?>
  <div class="content content-gallery">
		<div class="container">
			<div class="row">
        <div id="ajax-more-posts" class="article-container">
            <?php
                $postsPerPage = 4;
                $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => $postsPerPage,
                        'category_name' => 'tenders'
                );

                $loop = new WP_Query($args);

                while ($loop->have_posts()) : $loop->the_post();
            ?>
            <div class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
              <a href="<?php  the_permalink(); ?>" >
                <!-- <div class="article" style="background-image: url('dist/img/article-1.jpg');"></div> -->
                <div class="article">
                  <div class="category"><?php foreach(get_the_category() as $category) { echo $category->cat_name;} ?></div>
                  <div class="date"><?php echo get_the_date();?></div>
                  <h3><?php the_title(); ?></h3>
                  <div class="read-more">Read More <span class="icon-arrow-right"></span></div>
                </div>
              </a>
            </div>

          <?php
                  endwhile;
          wp_reset_postdata();
           ?>
        </div>
        <div class="load-more col-xs-12 btn">Load more content</div>
			</div>
		</div>
	</div>


<?php get_footer(); ?>
