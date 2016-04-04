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
    height: 630px !important; //provide height of slider
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
   $args = array(
      'numberposts'	=> -1,
     	'post_type'		=> 'post',
      'meta_query' => array(
        array(
            'key' => 'post_visibility_value', // name of custom field
            'value' => '"slider"', // matches exactly "feed"
            'compare' => 'LIKE'
        )
      )
    );
   $the_query = new WP_Query($args);

	 $recentFilteredPosts = new WP_Query();
	 $recentFilteredPosts->query('showposts=10');
  ?>
  	<div class="slider">
      <?php if( $the_query->have_posts() ): ?>
    		<ul>
    			<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <?php get_field('gallery_pictures'); ?>
    			<?php $sliderPostsCounter--; ?>
    			<li>
            <?php if ( has_post_thumbnail() ) {
            the_post_thumbnail();
          } ?>


    				<div class="caption">
    					<div class="container">
    						<div class="row">
    							<div class="date col-lg-1 col-xs-12">
    								<?php the_date('j M Y'); ?>
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
      <?php endif; ?>
      <?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
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
          <div id="ajax-more-posts" class="article-container container filterize">
            <div class="row ">
              <div class="col-xs-12 col-lg-9 posts">
                <?php
                    $postsPerPage = 6;
                    $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => $postsPerPage,
                            'meta_query' => array(
                              array(
                                  'key' => 'post_visibility_value', // name of custom field
                                  'value' => '"feed"', // matches exactly "feed"
                                  'compare' => 'LIKE'
                              )
                            )

                    );

                    $loop = new WP_Query($args);

                    while ($loop->have_posts()) : $loop->the_post();
                    $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                    if($featured_image_url != ""){ ?>
                      <div class="col-xs-12 col-lg-4 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
                        <a href="<?php the_permalink()?>" class="article-full-img">
                          <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                          <div class="article">
                            <div class="category"><?php foreach(get_the_category() as $category) { echo $category->cat_name;} ?></div>
                            <div class="date"><?php echo get_the_date('j M Y');?></div>
                            <h3><?php the_title(); ?></h3>
                            <div class="read-more">Read More <span class="icon-arrow-right"></span></div>
                          </div>
                        </a>
                      </div>

                    <?php }else{ ?>

                        <div class="col-xs-12 col-lg-4 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
                          <a href="<?php  the_permalink(); ?>" >
                            <div class="article">
                              <div class="category"><?php foreach(get_the_category() as $category) { echo $category->cat_name;} ?></div>
                              <div class="date"><?php echo get_the_date('j M Y');?></div>
                              <h3><?php the_title(); ?></h3>
                              <div class="read-more">Read More <span class="icon-arrow-right"></span></div>
                            </div>
                          </a>
                        </div>

                      <?php
                        }
                      endwhile;
              wp_reset_postdata();
               ?>
             </div>
             <div class="filtering-sidebar col-xs-12 col-lg-3">
               <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                	<div class="row">
                		<?php dynamic_sidebar( 'sidebar-1' ); ?>
                	</div>
                <?php endif; ?>

             </div>
           </div>
          </div>

          <div class="load-more col-xs-12 btn" data-grid="3" data-page-name="home" data-filter="feed" data-posts-per-page="<?php echo $postsPerPage ?>">Load more content</div>
        </div>

  		</div>
  	</div>
    <?php include('agencies.php') ?>
    <?php get_footer(); ?>
