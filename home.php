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
   $options = get_option('unkt_theme_options');

   $filteringCategoriesCounter = 5;
   $args = array(
      'posts_per_page'	=> $options['number_of_slides'] ,
     	'post_type'		=> array( 'post'),
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
    								<h2 class="slider-tittle"><?php the_title(); ?></h2>
    								<p class="slider-excerpt"><?php the_excerpt(); ?></p>
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
  					</ul>
  				</div>
  			</div>

        <div class="row">
          <div class="article-container filterize">
                <?php
                    $postsPerPage = 6;
                    $args = array(
                            'post_type' => array('post','ecwd_event'),
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
                    $outside_link =get_field('external_source_link');

                    $the_category_slug = "";
                    $the_category = "";

                      if(get_post_type()=="post"){
                        foreach(get_the_category() as $category) {
                          $the_category_slug = $category->slug . '';
                          $the_category = $category->cat_name . '';
                        }
                      }
                      else {
                        $the_category_slug = 'events';
                        $the_category = 'Events';
                        $terms = get_the_terms(strval( $post->ID ),'ecwd_event_category');
                        $event_categories = wp_get_post_terms($post->ID, 'ecwd_event_category','');
                      }


                    ?>
                    <?php if($outside_link == ""){ ?>
                    <div class="col-xs-12 col-lg-3 item <?php echo $the_category_slug; ?>">
                      <a href="<?php  the_permalink(); ?>" class="article-full-img">
                        <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                        <div class="article">
                          <div class="category"><?php echo $the_category; ?></div>
                          <div class="date"><?php echo get_the_date('j M Y');?></div>
                          <h3><?php the_title(); ?></h3>
                          <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                        </div>
                      </a>
                    </div>
                    <?php }else{ ?>
                      <div class="col-xs-12 col-lg-3 item <?php echo $the_category_slug; ?>">
                        <a href="<?php  echo $outside_link; ?>" target="_blank" class="article-full-img">
                          <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                          <div class="article">
                            <div class="category"><?php echo $the_category; ?></div>
                            <div class="date"><?php echo get_the_date('j M Y');?></div>
                            <h3><?php the_title(); ?></h3>
                            <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                          </div>
                        </a>
                      </div>

                     <?php } ?>

                <?php endwhile;?>
          </div>
          <?php if ( $loop->found_posts <= $postsPerPage ) : ?>
            <div class="load-more col-xs-12 btn" data-grid="3" data-page-name="home" data-filter="feed" data-posts-per-page="<?php echo $postsPerPage ?>">No more content avaliable</div>

           <?php else: ?>
             <div class="load-more col-xs-12 btn" data-grid="3" data-page-name="home" data-filter="feed" data-posts-per-page="<?php echo $postsPerPage ?>">Load more content</div>
           <?php endif;
             wp_reset_postdata(); ?>
        </div>

  		</div>
  	</div>
    <?php include('agencies.php') ?>
    <?php get_footer(); ?>
