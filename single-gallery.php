
<?php get_header(); ?>
	<div class="gallery-slider">
		<?php

				//begine loop
				while ($wp_query->have_posts()) : $wp_query->the_post();
		?>
		<ul>
			<?php
			$photo_by = get_field('photo_by');
			$gallery_images = get_field('gallery_pictures');
			// echo var_dump($gallery_images);
			foreach ($gallery_images as $picture) {
				?>
				<li style="max-height:622px; overflow:hidden;">
					<img style="" src="<?php echo $picture['url']?>" alt="<?php echo $picture['alt']?>" />
					<h2 class='caption'><?php echo $picture['caption'] ?></h2>
				</li>
			<?php }
			?>
		</ul>

	<?php endwhile; // end of the loop. ?>
		<div class="gallery-bar">

			<ul>
				<li class="slider-pager">
					<span class="pager-active">01</span> –
					<span class="pager-total">02</span>
				</li>
				<li class="info">Info</li>
				<li class="date"><?php the_time('d M Y') ?></li>
				<li class="photo-by">Photos by: <?php echo $photo_by ?></li>
				<li class="gallery-title">Gallery : <?php the_title() ?></li>
				<li class="back">

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
              <?php if(count($gallery_images) > 0){ ?>
                <div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
  								<?php
  								foreach ($gallery_images as $picture) {
  									?>

  										<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
  								      <a href="<?php echo $picture['url']?>" itemprop="contentUrl" data-size="<?php echo $picture['width']?>x<?php echo $picture['height']?>">
  								          <img src="<?php echo $picture['sizes']['thumbnail']?>" itemprop="thumbnail" alt="Image description" />
  								      </a>
  								      <figcaption itemprop="caption description"><?php echo $picture['caption']?></figcaption>
  								    </figure>
  								<?php }?>

  							</div>
              <?php }?>

						</div><!--end content-->

					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer();?>
