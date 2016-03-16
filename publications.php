<?php /* Template Name: Publications */ ?>
<?php get_header();
if( is_page( 'publications' )) {
			 query_posts( array( 'category_name' => 'publications' ) );
	}
	?>
	<div class="content content-gallery">
		<div class="container">
			<div class="row">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <div class="col-xs-12 col-sm-6 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
          	<a href="<?php  the_permalink(); ?>" class="article">
              	<div class="category"><?php foreach(get_the_category() as $category) { echo $category->cat_name;} ?></div>
              	<div class="date"><?php the_date();?></div>
              	<h3><?php the_title(); ?></h3>
              	<div class="read-more">More <span class="icon-arrow-right"></span></div>
          	</a>
          </div>

        <?php endwhile; else: ?>
          <p><?php _e('Sorry, this page does not exist.'); ?></p>
        <?php endif; ?>

			</div>
		</div>
	</div>

<?php get_footer(); ?>
