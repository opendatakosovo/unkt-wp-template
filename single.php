<?php get_header(); ?>
<?php wp_link_pages(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="banner">
		<?php if (has_post_thumbnail( $post->ID ) ): ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		<img src="<?php echo $image[0]; ?>" alt="" />
		<?php endif; ?>
		<!-- <img src="<?php bloginfo('template_url'); ?>/dist/img/slider-2.jpg" alt="" /> -->
		<div class="banner-content">
			<div class="banner-info">
				<div class="category"><?php the_category(); ?></div>
				<div class="date"><?php the_time('l, F jS, Y'); ?></div>
			</div>
			<div class="banner-title">
				<h2><?php the_title(); ?></h2>
			</div>
		</div>
	</div>

	<div class="content content-article">
		<div class="container-fluid">
			<div class="row">
				<div class="article-wrapper">
					<div class="article-inner">
						<div class="article-content">
							<p><?php the_content(); ?></p>
						</div>
					</div>

					<div class="sidebar sidebar-articles">
						<?php $category = get_the_category( $post );
								$category_id = get_cat_ID($category[0]->cat_name); ?>
						<?php $args = array(
						    'numberposts' => 3,
						    'offset' => 0,
						    'category' => $category_id,
						    'orderby' => 'post_date',
						    'order' => 'DESC',
								'exclude' => $post->ID,
						    'post_type' => 'post',
						    'post_status' => 'draft, publish, future, pending, private',
						    'suppress_filters' => true );

						    $recent_posts = wp_get_recent_posts( $args, ARRAY_A );
						?>
						<?php foreach ($recent_posts as $post){?>
							<a href="<? echo get_permalink($post['ID']) ?>" class="article article-blue-light">
								<div class="category"><?php echo $category[0]->cat_name ?></div>
								<div class="date"><? echo $post['post_date']?></div>
								<h3><? echo $post['post_name']?></h3>
								<div class="read-more">More <span class="icon-arrow-right"></span></div>
							</a>
							<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; else: ?>
	<p><?php _e('Sorry, this page does not exist.'); ?></p>
<?php endif; ?>
<?php
$next_post = get_next_post();
if (!empty( $next_post )): ?>
	<div class="read-next">
		<div class="read-next-label">
			<p>READ NEXT ARTICLE <span class="icon-arrow-right"></span></p>
		</div>
		<a href="<?php echo get_permalink( $next_post->ID ); ?>" class="read-next-title">
			<span><?php echo $next_post->post_title; ?></span>
		</a>
	</div>
<?php endif; ?>
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
					 <div class="col-xs-12 col-lg-3 item">
						 <?php echo do_shortcode('[total-poll id=235]')?>
					 </div>

				</div>
				<div class="load-more col-xs-12 btn">Load more content</div></div>
		</div>
	</div>


	<?php get_footer(); ?>
