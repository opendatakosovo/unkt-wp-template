
<?php get_header(); ?>
	<div class="gallery-slider">
		<?php
				//setup new WP_Query
				$wp_query = new WP_Query(
						array(
								'posts_per_page'    =>    9,
								'post_type'            =>    'gallery'
						)
				);

				//begine loop
				while ($wp_query->have_posts()) : $wp_query->the_post();
		?>
		<ul>
			<?php
			$photo_by = get_field('photo_by');
			$gallery_images = get_field('gallery_pictures');
			foreach ($gallery_images as $picture) {
				?>
				<li>
					<img style="max-height:622px !important;" src="<?php echo $picture['url']?>" alt="<?php echo $picture['alt']?>" />
					<h2 class='caption'><?php echo $picture['caption'] ?></h2>
				</li>
			<?php }
			?>
		</ul>


		<div class="gallery-bar">

			<ul>
				<li class="slider-pager">
					<span class="pager-active">01</span> –
					<span class="pager-total">02</span>
				</li>
				<li class="info">Info</li>
				<li class="date"><?php the_time('d M Y') ?></li>
				<li class="photo-by">Photo: <?php echo $photo_by ?></li>
				<li class="gallery-title">Gallery : <?php the_title() ?></li>
				<li class="back">
					<a href="#">
						<img src="dist/img/x.svg">
					</a>
				</li>
			</ul>
		</div>

	</div>

	<div class="content content-gallery">
		<div class="container-fluid">
			<div class="row">
				<div class="gallery-description">
					<div class="gallery-category">
						<div class="category">Gallery</div>
					</div>
					<div class="article-content gallery-content">
						<div class="content">
							<h2><?php the_title(); ?></h2>
							<?php the_content(); ?>
						</div><!--end content-->

					</div>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; // end of the loop. ?>
	<div class="read-next gallery-next">
		<div class="read-next-label">
			<p>OPEN NEXT GALLERY<span class="icon-arrow-right"></span></p>
		</div>
		<a href="#" class="read-next-title" style="background-image: url(dist/img/gallery-next.jpg);">
			<span>UN Kosovo team and the associaation of Kosovo journalists mark the 10th anniversary of the journalism poverty prize for 2015
		</span>
		</a>
	</div>
<?php get_footer();?>
