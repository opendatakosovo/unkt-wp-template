<?php /* Template Name: Calendar */ ?>
<?php get_header(); ?>

 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

   	<div class="content ">
   		<div class="container-fluid">
   			<div class="row calendar-page">
          <div class="col-md-1"></div>
          <div class="col-md-10">
   							<h1><?php the_title(); ?></h1>
                <?php
                if ( is_user_logged_in() ) {
                  if (is_page('internal-calendar')){ ?>
                    <a href="<?php echo get_permalink( get_page_by_path( 'events-calendar' )->ID );?>"> Click here to go to the Public Calendar.</a>

              <?php } else { ?>
                <a href="<?php echo get_permalink( get_page_by_path( 'internal-calendar' )->ID );?>"> Click here to go to the Internal Calendar.</a>

              <?php } ?>

          <?php }?>

   							<?php the_content(); ?>
          </div>
          <div class="col-md-1"></div>
      	</div>
   		</div>
   	</div>

 <?php endwhile; else: ?>
   <p><?php _e('Sorry, this page does not exist.'); ?></p>
 <?php endif; ?>


<?php get_footer(); ?>
