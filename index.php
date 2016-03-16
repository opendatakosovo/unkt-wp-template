<?php get_header(); ?>
  <?php  $sliderPostsCounter = $options['number_of_slides'];
         $filteringCategoriesCounter = 5;
         $recentPosts = new WP_Query();
         $recentPosts->query('showposts=3');

  			 $recentFilteredPosts = new WP_Query();
  			 $recentFilteredPosts->query('showposts=10');
  ?>
  	<div class="slider">
  		<ul>
  			<?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
  			<?php $sliderPostsCounter--; ?>
  			<li>
  				<?php if ( has_post_thumbnail() ) {
  					the_post_thumbnail();
  				} ?>

  				<div class="caption">
  					<div class="container">
  						<div class="row">
  							<div class="date col-lg-1 col-xs-12">
  								<?php the_date(); ?>
  							</div>
  							<div class="col-lg-10 col-xs-12">
  								<h2><?php the_title(); ?></h2>
  								<p><?php the_excerpt(); ?></p>
  							</div>
  						</div>
  					</div>
  					<a class="read-more" href="<?php  the_permalink(); ?>">
  						<span>Read more</span>
  					</a>
  				</div>
  			</li>
  			<?php endwhile; ?>
  		</ul>
  	</div>

  	<div class="content">
      <?php
          $options = get_option('unkt_theme_options');
          echo $options['page_title'];
          echo $options['number_of_slides'];
          echo gettype($options['site_under_construction']);
          echo $options['site_under_construction'];
      ?>
  		<div class="container">
  			<div class="row">
  				<div class="filter">
  					<ul>
  						<li>Sort View:</li>
  						<li>
  							<a href="#" data-filter="*">Latest</a>
  						</li>
  						<li>
  							<a href="#" data-filter=".news">News</a>
  						</li>
  						<li>
  							<a href="#" data-filter=".media">Media</a>
  						</li>
  						<li>
  							<a href="#" data-filter=".publications">Publications</a>
  						</li>
  						<li>
  							<a href="#" data-filter=".jobs">Jobs</a>
  						</li>
  						<li>
  							<a href="#" data-filter=".tender">Tenders</a>
  						</li>
  						<li>
  							<a href="#" data-filter=".events">Events</a>
  						</li>
  						<li>
  							<a href="#" data-filter=".press-release">Press Release</a>
  						</li>
  					</ul>
  				</div>
          <div class="article-container">
            <?php
                $postsPerPage = 3;
                $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => $postsPerPage,
                        'cat' => 8
                );

                $loop = new WP_Query($args);

                while ($loop->have_posts()) : $loop->the_post();
            ?>
  					<div class="col-xs-12 col-lg-6 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
  						<a href="<?php  the_permalink(); ?>" class="article-big">
  							<div class="article-img" style="background-image: url('dist/img/article-1.jpg');"></div>
  							<div class="article">
  								<div class="category"><?php foreach(get_the_category() as $category) { echo $category->cat_name;} ?></div>
  								<div class="date"><?php the_date();?</div>
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
          <div class="load-more col-xs-12">
  					<a class="load-more-posts" href="#">Load more content</a>
  				</div>
  					<?php  echo do_shortcode('[ajax_load_more post_type="post" scroll="false" transition="none" transition_container="false" button_label="Load more ontent" container_type="div" css_classes="article-container"]') ?>
  			</div>
  		</div>
  	</div>
    <?php get_footer(); ?>
