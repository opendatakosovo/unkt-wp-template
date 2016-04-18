<?php get_header(); ?>

 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

   	<div class="content content-article">
   		<div class="container-fluid">
   			<div class="row">
   				<div class="article-wrapper">
   					<div class="article-inner">
   						<div class="article-sidebar">
   						</div>
   						<div class="article-content section">
   							<h1><?php the_title(); ?></h1>
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
