<?php get_header(); ?>

<?php wp_link_pages(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php if (has_post_thumbnail( $post->ID ) ){ ?>
			<?php include('template-parts/single-post-with-featured-image.php'); ?>
		<?php }else{ include('template-parts/single-post-no-featured-image.php'); }?>
<?php endwhile; else: ?>
	<p><?php _e('Sorry, this page does not exist.'); ?></p>
<?php endif; ?>
<?php echo do_shortcode('[RPPostNav]'); ?>
	<div class="content">
		<div class="container">
			<div class="row">
				<div id="ajax-more-posts" class="article-container">
						<?php
								$postsPerPage = 4;
								$args = array(
												'post_type' => 'post',
												'posts_per_page' => $postsPerPage
								);

								$loop = new WP_Query($args);

								while ($loop->have_posts()) : $loop->the_post();
								$featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
								$outside_link =get_field('external_source_link');

		 			 ?>

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
					<?php		endwhile;
					wp_reset_postdata();
					 ?>

				</div>
				<div class="load-more col-xs-12 btn" data-grid="3" data-posts-per-page="<?php echo $postsPerPage ?>">Load more content</div></div>
		</div>
	</div>
<?php get_footer(); ?>
