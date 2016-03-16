<?php /* Template Name: Home Page */ ?>
<?php get_header(); ?>
<style>
.wpvq-question .wpvq-question-img {
    height: auto !important;
    display: block !important;
    margin: 0 auto 20px auto !important;
    width: 259px !important;
}
.wpvq-question .wpvq-question-label {
    margin: 0 0 2px 0 !important;
    font-weight: 600 !important;
    font-size: 11px !important;
    padding: 0px !important;
    text-align: center !important;
}
.wpvq {
    margin-top: -29px !important;
    font-family: 'Montserrat', 'Arial', 'sans-serif';
}
input.vq-css-checkbox + label.vq-css-label {
    padding-left: 31px !important;
    height: auto !important;
    font-size: 10px !important;
    display: inline-block !important;
    line-height: 18px !important;
    background-repeat: no-repeat !important;
    vertical-align: middle !important;
    cursor: pointer !important;
}
.wpvq.columns-2 .wpvq-question.wpvq-square .wpvq-answer, .wpvq.columns-3 .wpvq-question.wpvq-square .wpvq-answer {
    width: 129px !important;
    min-height:283px !important;
}
.bx-wrapper ul li {
    height: 693px !important; //provide height of slider
    overflow:hidden;
}
.bx-wrapper ul li img {
  object-fit: cover;
  max-height:623px;
  overflow: hidden;

}
</style>
  <?php
   $sliderPostsCounter = $options['number_of_slides'];
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
          // echo $options['page_title'];
          // echo $options['number_of_slides'];
          // echo gettype($options['site_under_construction']);
          // echo $options['site_under_construction'];
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
  			</div>

        <div class="row">
          <div id="ajax-more-posts" class="article-container filterize">
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
             <div class="col-xs-12 col-lg-3 item">
               <?php echo do_shortcode('[viralQuiz id=1]')?>
             </div>

          </div>
          <div class="load-more col-xs-12 btn">Load more content</div>
        </div>
  		</div>
  	</div>
    <?php get_footer(); ?>
