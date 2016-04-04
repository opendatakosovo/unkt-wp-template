
	<div class="content content-article">
		<div class="container-fluid">
			<div class="row">

				<div class="article-wrapper">
					<div class="article-inner">
						<div class="category"><?php the_category(); ?></div><br>
						<div class="date"><?php the_time('j M Y'); ?></div><br>

						<div class="article-content">
							<h2><?php the_title(); ?></h2>
							<p><?php the_content(); ?></p>
						</div>
					</div>

					<div class="sidebar sidebar-articles">
						<?php $category = get_the_category( $post );
								$category_id = get_cat_ID($category[0]->cat_name); ?>
						<?php $recent_posts_query_args = array(
						    'numberposts' => 3,
						    'offset' => 0,
						    'category' => $category_id,
						    'orderby' => 'post_date',
						    'order' => 'DESC',
								'exclude' => $post->ID,
						    'post_type' => 'post',
						    'post_status' => 'draft, publish, future, pending, private',
						    'suppress_filters' => true );

						    $recent_posts = wp_get_recent_posts( $recent_posts_query_args, ARRAY_A );
						?>
						<?php foreach ($recent_posts as $post){?>
							<a href="<?php echo get_permalink($post['ID']) ?>" class="article article-blue-light">
								<div class="category"><?php echo $category[0]->cat_name ?></div>
								<div class="date"><?php $date = new DateTime($post['post_date']);
                                        echo $date->format('d M Y'); ?></div>
								<h3><?php echo $post['post_title']?></h3>
								<div class="read-more">More <span class="icon-arrow-right"></span></div>
							</a>
							<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
