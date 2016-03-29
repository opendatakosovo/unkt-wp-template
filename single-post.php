<?php get_header(); ?>

<?php wp_link_pages(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php if (has_post_thumbnail( $post->ID ) ){ ?>
			<?php include('template-parts/single-post-with-featured-image.php'); ?>
		<?php }else{ include('template-parts/single-post-no-featured-image.php'); }?>
<?php endwhile; else: ?>
	<p><?php _e('Sorry, this page does not exist.'); ?></p>
<?php endif; ?>

<?php
$prev_post = get_previous_post(true,'0');
if (!empty( $prev_post )): ?>
	<div class="read-next">
		<div class="read-next-label">
			<p>READ NEXT ARTICLE <span class="icon-arrow-right"></span></p>
		</div>
			<a href="<?php echo $prev_post->guid ?>"><span><?php echo $prev_post->post_title ?></span></a>
	</div>
<?php endif ?>
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
				<div class="load-more col-xs-12 btn">Load more content</div></div>
		</div>
	</div>
<?php get_footer(); ?>
