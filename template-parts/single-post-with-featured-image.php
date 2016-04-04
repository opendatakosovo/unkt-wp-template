<?php
global $post;
setup_postdata( $post );
?>

  <div class="banner">
    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
    <img src="<?php echo $image[0]; ?>" alt="" />
    <div class="banner-content">
      <div class="banner-info">
        <div class="category"><?php the_category(); ?></div>
        <div class="date"><?php the_time('j M Y'); ?></div>
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
							<a href="<?php echo get_permalink($post['ID']) ?>" class="article article-blue-light">
								<div class="category"><?php echo $category[0]->cat_name ?></div>
								<div class="date"><?php echo $post['post_date']?></div>
								<h3><?php echo $post['post_name']?></h3>
								<div class="read-more">More <span class="icon-arrow-right"></span></div>
							</a>
							<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
