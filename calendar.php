<?php get_header(); ?>

 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

   	<div class="content content-article">
   		<div class="container-fluid">
   			<div class="row">
   				<div class="article-wrapper">
   					<div class="article-inner">
   						<div class="article-sidebar">
   						</div>
   						<div class="article-content">
   							<h1><?php the_title(); ?></h1>
                <?php
                if ( is_user_logged_in() ) {?>
                    <a href="<?php echo get_permalink( get_page_by_path( 'internal-calendar' )->ID );?>"> Click here to go to the Internal Calendar.</a>
                <?php }
                ?>
   							<?php the_content(); ?>
   						</div>
   					</div>

            <?php get_sidebar(); ?>
          </div>
   			</div>
   		</div>
   	</div>

 <?php endwhile; else: ?>
   <p><?php _e('Sorry, this page does not exist.'); ?></p>
 <?php endif; ?>


<?php get_footer(); ?>
