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

  	<!-- <div class="content">

  		<div class="container">
  			<div class="row">
  				<div class="filter">
  					<ul>
  						<li>Sort View:</li>
  						<li>
  							<a href="#" data-filter="*">Latest</a>
  						</li>
  						<li>
  							<a class="filter-posts" href="#" data-filter=".news">News</a>
  						</li>
              <li>
  							<a class="filter-posts" data-category="<?php echo get_category_by_slug('ecwd_event')->term_id;;?>" href="#" data-filter=".events">Events</a>
  						</li>
              <li>
  							<a class="filter-posts" data-category="<?php echo get_category_by_slug('blogs')->term_id;?>" href="#" data-filter=".blogs">Blogs</a>
  						</li>
  						<li>
  							<a class="filter-posts" data-category="<?php echo get_category_by_slug('gallery')->term_id;?>" href="#" data-filter=".gallery">Galleries</a>
  						</li>
  						<li>
  							<a class="filter-posts" data-category="<?php echo get_category_by_slug('community-contributions')->term_id;?>" href="#" data-filter=".community-contributions">Community Contributions</a>
  						</li>
  						<li>
  							<a class="filter-posts" data-category="<?php echo get_category_by_slug('publications')->term_id;?>" href="#" data-filter=".publications">Publications</a>
  						</li>
  						<li>
  							<a class="filter-posts" data-category="<?php echo get_category_by_slug('jobs')->term_id;?>" href="#" data-filter=".jobs">Jobs</a>
  						</li>
              <li>
  							<a class="filter-posts" data-category="<?php echo get_category_by_slug('tenders')->term_id;?>" href="#" data-filter=".tenders">Tenders</a>
  						</li>
  					</ul>
  				</div>
  			</div>


  		</div>
  	</div> -->
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> -->
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script>
    $(function() {
      var tabs = $( "#tabs" ).tabs();
      tabs.find( ".ui-tabs-nav" ).sortable({
        axis: "x",
        stop: function() {
          tabs.tabs( "refresh" );
        }
      });
    });
    </script>
    <div class="content">

      <div class="container">
        <div class="row">
          <div class="tabs-menu" id="tabs">
            <ul style="text-align: center;">
              <li>
                SORT VIEW:
              </li>
              <li>
                <a href="#latest">Latest</a>
              </li>
              <li>
                <a href="#news">News</a>
              </li>
              <li>
                <a href="#events">Events</a>
              </li>
              <li>
                <a href="#blogs">Blogs</a>
              </li>
              <li>
                <a href="#gallery">Galleries</a>
              </li>
              <li>
                <a href="#community-contributions">Community Contributions</a>
              </li>
              <li>
                <a href="#publications">Publications</a>
              </li>
              <li>
                <a href="#jobs">Jobs</a>
              </li>
              <li>
                <a href="#tenders">Tenders</a>
              </li>
            </ul>
            <div id="latest">
              <div class="row">
                <div id="latest-container" class="article-container filterize">
                      <?php
                          $postsPerPage = 8;
                          $loop = new WP_Query(array(
                                  'post_type' => array('post','ecwd_event'),
                                  'posts_per_page' => 8,
                                  'post_status' => 'publish',
                                  'orderby' => 'date',
                                  'order' => 'DESC',
                                  'meta_query' => array(
                                    array(
                                        'key' => 'post_visibility_value', // name of custom field
                                        'value' => '"feed"', // matches exactly "feed"
                                        'compare' => 'LIKE'
                                    )
                                  )
                          ));

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
                            $article_img_div = "";
                            if($featured_image_url!=""){
                             $article_img_div='	<div class="article-img" style="background-image: url('.$featured_image_url.');"></div>';
                            }
                            // bm_ignorePost($post->ID);
                          ?>
                          <?php if($outside_link == ""){ ?>
                          <div id="<?php echo $post->ID ?>" class="col-xs-12 col-lg-3 item <?php echo $the_category_slug; ?>">
                            <a href="<?php  the_permalink(); ?>" class="article-full-img <?php if($the_category=="Jobs"){ echo 'article-red'; }else{ echo 'article-blue-light'; } ?>">
                              <?php echo $article_img_div; ?>
                              <div class="article">
                                <div class="category"><?php echo $the_category; ?></div>
                                <div class="date"><?php echo get_the_date('j M Y');?></div>
                                <h3><?php the_title(); ?></h3>
                                <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                              </div>
                            </a>
                          </div>
                          <?php }else{ ?>
                            <div id="<?php echo $post->ID ?>" class="col-xs-12 col-lg-3 item <?php echo $the_category_slug; ?>">
                              <a href="<?php  echo $outside_link; ?>" target="_blank" class="article-full-img <?php if($the_category=="Jobs"){ echo 'article-red'; }else{ echo 'article-blue-light'; } ?>">
                                <?php echo $article_img_div; ?>
                                <div class="article">
                                  <div class="category"><?php echo $the_category; ?></div>
                                  <div class="date"><?php echo get_the_date('j M Y');?></div>
                                  <h3><?php the_title(); ?></h3>
                                  <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                                </div>
                              </a>
                            </div>

                           <?php } ?>

                      <?php endwhile;
                      wp_reset_postdata();  ?>
                </div>
                <?php if ( $loop->found_posts < $postsPerPage ) : ?>
                  <div class="load-more-home disable-button-no-more-posts-available col-xs-12 btn" data-exclude-posts="<?php echo implode(', ', $excluded_posts); ?>" data-category="" data-grid="3" data-page-name="home" data-filter="feed" data-posts-per-page="<?php echo $postsPerPage ?>">No more posts available</div>

                 <?php else: ?>
                   <div class="load-more-home col-xs-12 btn" data-exclude-posts="<?php echo implode(', ', $excluded_posts); ?>" data-category="" data-grid="3" data-page-name="home" data-filter="feed" data-posts-per-page="<?php echo $postsPerPage ?>">Load more posts</div>
                 <?php endif; ?>
              </div>
            </div>
            <div id="news">
              <div class="row">
                  <div id="news-container" class="article-container filterize">

                    <?php
                       $news_category = get_category_by_slug('news')->term_id;
                       $loop = new WP_Query(array(
                               'post_type' => 'post',
                               'posts_per_page' => 8,
                               'cat'=> $news_category,
                               'post_status' => 'publish',
                               'orderby' => 'date',
                               'order' => 'DESC',
                               'meta_query' => array(
                                 array(
                                     'key' => 'post_visibility_value', // name of custom field
                                     'value' => '"feed"', // matches exactly "feed"
                                     'compare' => 'LIKE'
                                 )
                               )
                       ));

                      while ($loop->have_posts()) : $loop->the_post();
                             $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                             $outside_link =get_field('external_source_link');
                             $the_category = "";
                             foreach(get_the_category() as $category) {
                               $the_category = $category->cat_name;
                             }

                     ?>
                      <?php if($outside_link == ""){ ?>
                        <div id="<?php echo $post->ID ?>" class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
                         <a href="<?php  the_permalink(); ?>" class="article-full-img <?php if($the_category=="Jobs"){ echo 'article-red'; }else{ echo 'article-blue-light'; } ?>">
                           <?php if($featured_image_url !=""){
                             ?>
                             <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                             <?php } ?>
                           <div class="article">
                             <div class="category"><?php echo $the_category?></div>
                             <div class="date"><?php echo get_the_date('j M Y');?></div>
                             <h3><?php the_title(); ?></h3>
                             <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                           </div>
                         </a>
                        </div>
                      <?php }else{ ?>
                        <div id="<?php echo $post->ID ?>" class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
                         <a href="<?php  echo $outside_link; ?>" target="_blank" class="article-full-img <?php if($the_category=="Jobs"){ echo 'article-red'; }else{echo 'article-blue-light'; }?>">
                           <?php if($featured_image_url !=""){
                             ?>
                             <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                             <?php } ?>
                           <div class="article">
                             <div class="category"><?php foreach(get_the_category() as $category) { echo $category->cat_name;} ?></div>
                             <div class="date"><?php echo get_the_date('j M Y');?></div>
                             <h3><?php the_title(); ?></h3>
                             <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                           </div>
                         </a>
                        </div>

                      <?php } ?>

                    <?php endwhile; ?>
                  </div>
                  <?php if ( $loop->found_posts <= $postsPerPage ) : ?>
                      <div class="load-more-home disable-button-no-more-posts-available col-xs-12 btn" data-category="<?php echo $news_category; ?>" data-grid="3" data-posts-per-page="8">No more posts available</div>

                      <?php else: ?>
                      <div class="load-more-home col-xs-12 col-lg-12 btn" data-category="<?php echo $news_category; ?>" data-grid="3" data-page-name="home" data-filter-"feed" data-posts-per-page="8">Load more posts</div>
                   <?php endif;
                  wp_reset_postdata(); ?>
              </div>

            </div>
            <!-- Events -->
            <div id="events">
              <div class="row">
                  <div id="events-container" class="article-container filterize">

                    <?php
                     $loop = new WP_Query(array(
                             'post_type' => 'ecwd_event',
                             'posts_per_page' => 8,
                             'post_status' => 'publish',
                             'orderby' => 'date',
                             'order' => 'DESC',
                             'meta_query' => array(
                               array(
                                   'key' => 'post_visibility_value', // name of custom field
                                   'value' => '"feed"', // matches exactly "feed"
                                   'compare' => 'LIKE'
                               )
                             )
                     ));

                    while ($loop->have_posts()) : $loop->the_post();
                           $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                           $outside_link =get_field('external_source_link');
                           $the_category = "";
                           foreach(get_the_category() as $category) {
                             $the_category = $category->cat_name;
                           }

                     ?>
                      <?php if($outside_link == ""){ ?>
                        <div id="<?php echo $post->ID ?>" class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
                         <a href="<?php  the_permalink(); ?>" class="article-full-img <?php if($the_category=="Jobs"){ echo 'article-red'; }else{ echo 'article-blue-light'; } ?>">
                           <?php if($featured_image_url !=""){
                             ?>
                             <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                             <?php } ?>
                           <div class="article">
                             <div class="category">Event</div>
                             <div class="date"><?php echo get_the_date('j M Y');?></div>
                             <h3><?php the_title(); ?></h3>
                             <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                           </div>
                         </a>
                        </div>
                      <?php }else{ ?>
                        <div id="<?php echo $post->ID ?>" class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
                         <a href="<?php  echo $outside_link; ?>" target="_blank" class="article-full-img <?php if($the_category=="Jobs"){ echo 'article-red'; }else{echo 'article-blue-light'; }?>">
                           <?php if($featured_image_url !=""){
                             ?>
                             <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                             <?php } ?>
                           <div class="article">
                             <div class="category">Event</div>
                             <div class="date"><?php echo get_the_date('j M Y');?></div>
                             <h3><?php the_title(); ?></h3>
                             <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                           </div>
                         </a>
                        </div>

                      <?php } ?>

                    <?php endwhile; ?>
                  </div>
                  <?php if ( $loop->found_posts <= $postsPerPage ) : ?>
                      <div class="load-more-home disable-button-no-more-posts-available col-xs-12 btn" data-category="" data-grid="3" data-post-type="ecwd_event" data-posts-per-page="8">No more posts available</div>

                      <?php else: ?>
                      <div class="load-more-home col-xs-12 col-lg-12 btn" data-category="" data-grid="3" data-post-type="ecwd_event"  data-page-name="home" data-filter-"feed" data-posts-per-page="8">Load more posts</div>
                   <?php endif;
                  wp_reset_postdata(); ?>
              </div>

            </div>
            <!-- End of events div -->
            <!-- Blogs -->
            <div id="blogs">
              <div class="row">
                  <div id="blogs-container" class="article-container filterize">

                    <?php
                     $blogs_category = get_category_by_slug('blogs')->term_id;
                     $loop = new WP_Query(array(
                             'post_type' => 'post',
                             'posts_per_page' => 8,
                             'cat' => $blogs_category,
                             'post_status' => 'publish',
                             'orderby' => 'date',
                             'order' => 'DESC',
                             'meta_query' => array(
                               array(
                                   'key' => 'post_visibility_value', // name of custom field
                                   'value' => '"feed"', // matches exactly "feed"
                                   'compare' => 'LIKE'
                               )
                             )
                     ));

                    while ($loop->have_posts()) : $loop->the_post();
                           $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                           $outside_link =get_field('external_source_link');
                           $the_category = "";
                           foreach(get_the_category() as $category) {
                             $the_category = $category->cat_name;
                           }

                     ?>
                      <?php if($outside_link == ""){ ?>
                        <div id="<?php echo $post->ID ?>" class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
                         <a href="<?php  the_permalink(); ?>" class="article-full-img <?php if($the_category=="Jobs"){ echo 'article-red'; }else{ echo 'article-blue-light'; } ?>">
                           <?php if($featured_image_url !=""){
                             ?>
                             <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                             <?php } ?>
                           <div class="article">
                             <div class="category"><?php echo $the_category; ?></div>
                             <div class="date"><?php echo get_the_date('j M Y');?></div>
                             <h3><?php the_title(); ?></h3>
                             <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                           </div>
                         </a>
                        </div>
                      <?php }else{ ?>
                        <div id="<?php echo $post->ID ?>" class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
                         <a href="<?php  echo $outside_link; ?>" target="_blank" class="article-full-img <?php if($the_category=="Jobs"){ echo 'article-red'; }else{echo 'article-blue-light'; }?>">
                           <?php if($featured_image_url !=""){
                             ?>
                             <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                             <?php } ?>
                           <div class="article">
                             <div class="category"><?php echo $the_category; ?></div>
                             <div class="date"><?php echo get_the_date('j M Y');?></div>
                             <h3><?php the_title(); ?></h3>
                             <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                           </div>
                         </a>
                        </div>

                      <?php } ?>

                    <?php endwhile; ?>
                  </div>
                  <?php if ( $loop->found_posts <= $postsPerPage ) : ?>
                      <div class="load-more-home disable-button-no-more-posts-available col-xs-12 btn" data-category="<?php echo $blogs_category; ?>" data-grid="3" data-posts-per-page="8">No more posts available</div>

                      <?php else: ?>
                      <div class="load-more-home col-xs-12 col-lg-12 btn" data-category="<?php echo $blogs_category; ?>" data-grid="3" data-page-name="home" data-filter-"feed" data-posts-per-page="8">Load more posts</div>
                   <?php endif;
                  wp_reset_postdata(); ?>
              </div>

            </div>
            <!-- End of blogs div  -->
            <!-- Gallery -->
            <div id="gallery">
              <div class="row">
                  <div id="gallery-container" class="article-container filterize">

                    <?php
                     $gallery_category = get_category_by_slug('gallery')->term_id;
                     $loop = new WP_Query(array(
                             'post_type' => 'post',
                             'posts_per_page' => 8,
                             'cat' => $gallery_category,
                             'post_status' => 'publish',
                             'orderby' => 'date',
                             'order' => 'DESC',
                             'meta_query' => array(
                               array(
                                   'key' => 'post_visibility_value', // name of custom field
                                   'value' => '"feed"', // matches exactly "feed"
                                   'compare' => 'LIKE'
                               )
                             )
                     ));

                    while ($loop->have_posts()) : $loop->the_post();
                           $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                           $outside_link =get_field('external_source_link');
                           $the_category = "";
                           foreach(get_the_category() as $category) {
                             $the_category = $category->cat_name;
                           }

                     ?>
                      <?php if($outside_link == ""){ ?>
                        <div id="<?php echo $post->ID ?>" class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
                         <a href="<?php  the_permalink(); ?>" class="article-full-img <?php if($the_category=="Jobs"){ echo 'article-red'; }else{ echo 'article-blue-light'; } ?>">
                           <?php if($featured_image_url !=""){
                             ?>
                             <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                             <?php } ?>
                           <div class="article">
                             <div class="category"><?php echo $the_category; ?></div>
                             <div class="date"><?php echo get_the_date('j M Y');?></div>
                             <h3><?php the_title(); ?></h3>
                             <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                           </div>
                         </a>
                        </div>
                      <?php }else{ ?>
                        <div id="<?php echo $post->ID ?>" class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
                         <a href="<?php  echo $outside_link; ?>" target="_blank" class="article-full-img <?php if($the_category=="Jobs"){ echo 'article-red'; }else{echo 'article-blue-light'; }?>">
                           <?php if($featured_image_url !=""){
                             ?>
                             <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                             <?php } ?>
                           <div class="article">
                             <div class="category"><?php echo $the_category; ?></div>
                             <div class="date"><?php echo get_the_date('j M Y');?></div>
                             <h3><?php the_title(); ?></h3>
                             <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                           </div>
                         </a>
                        </div>

                      <?php } ?>

                    <?php endwhile; ?>
                  </div>
                  <?php if ( $loop->found_posts <= $postsPerPage ) : ?>
                      <div class="load-more-home disable-button-no-more-posts-available col-xs-12 btn" data-category="<?php echo $gallery_category; ?>" data-grid="3" data-posts-per-page="8">No more posts available</div>

                      <?php else: ?>
                      <div class="load-more-home col-xs-12 col-lg-12 btn" data-category="<?php echo $gallery_category; ?>" data-grid="3" data-page-name="home" data-filter-"feed" data-posts-per-page="8">Load more posts</div>
                   <?php endif;
                  wp_reset_postdata(); ?>
              </div>

            </div>
            <!-- End of gallery div -->
            <!-- Community contributions -->
            <div id="community-contributions">
              <div class="row">
                  <div id="community-contributions-container" class="article-container filterize">

                    <?php
                     $community_category = get_category_by_slug('community-contributions')->term_id;
                     $loop = new WP_Query(array(
                             'post_type' => 'post',
                             'posts_per_page' => 8,
                             'cat' => $community_category,
                             'post_status' => 'publish',
                             'orderby' => 'date',
                             'order' => 'DESC',
                             'meta_query' => array(
                               array(
                                   'key' => 'post_visibility_value', // name of custom field
                                   'value' => '"feed"', // matches exactly "feed"
                                   'compare' => 'LIKE'
                               )
                             )
                     ));

                    while ($loop->have_posts()) : $loop->the_post();
                           $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                           $outside_link =get_field('external_source_link');
                           $the_category = "";
                           foreach(get_the_category() as $category) {
                             $the_category = $category->cat_name;
                           }

                     ?>
                      <?php if($outside_link == ""){ ?>
                        <div id="<?php echo $post->ID ?>" class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
                         <a href="<?php  the_permalink(); ?>" class="article-full-img <?php if($the_category=="Jobs"){ echo 'article-red'; }else{ echo 'article-blue-light'; } ?>">
                           <?php if($featured_image_url !=""){
                             ?>
                             <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                             <?php } ?>
                           <div class="article">
                             <div class="category"><?php echo $the_category; ?></div>
                             <div class="date"><?php echo get_the_date('j M Y');?></div>
                             <h3><?php the_title(); ?></h3>
                             <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                           </div>
                         </a>
                        </div>
                      <?php }else{ ?>
                        <div id="<?php echo $post->ID ?>" class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
                         <a href="<?php  echo $outside_link; ?>" target="_blank" class="article-full-img <?php if($the_category=="Jobs"){ echo 'article-red'; }else{echo 'article-blue-light'; }?>">
                           <?php if($featured_image_url !=""){
                             ?>
                             <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                             <?php } ?>
                           <div class="article">
                             <div class="category"><?php echo $the_category; ?></div>
                             <div class="date"><?php echo get_the_date('j M Y');?></div>
                             <h3><?php the_title(); ?></h3>
                             <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                           </div>
                         </a>
                        </div>

                      <?php } ?>

                    <?php endwhile; ?>
                  </div>
                  <?php if ( $loop->found_posts <= $postsPerPage ) : ?>
                      <div class="load-more-home disable-button-no-more-posts-available col-xs-12 btn" data-category="<?php echo $community_category; ?>" data-grid="3" data-posts-per-page="8">No more posts available</div>

                      <?php else: ?>
                      <div class="load-more-home col-xs-12 col-lg-12 btn" data-category="<?php echo $community_category; ?>" data-grid="3" data-page-name="home" data-filter-"feed" data-posts-per-page="8">Load more posts</div>
                   <?php endif;
                  wp_reset_postdata(); ?>
              </div>

            </div>
            <!-- // End of community-contributions div -->
            <!-- publications -->
            <div id="publications">
              <div class="row">
                  <div id="publications-container" class="article-container">

                    <?php
                     $publications_category = get_category_by_slug('publications')->term_id;
                     $loop = new WP_Query(array(
                             'post_type' => 'post',
                             'posts_per_page' => 8,
                             'cat' => $publications_category,
                             'post_status' => 'publish',
                             'orderby' => 'date',
                             'order' => 'DESC',
                             'meta_query' => array(
                               array(
                                   'key' => 'post_visibility_value', // name of custom field
                                   'value' => '"feed"', // matches exactly "feed"
                                   'compare' => 'LIKE'
                               )
                             )
                     ));
                     if ($loop-> have_posts() ) :
                    while ($loop->have_posts()) : $loop->the_post();
                           $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                           $outside_link =get_field('external_source_link');
                           $the_category = "";
                           foreach(get_the_category() as $category) {
                             $the_category = $category->cat_name;
                           }

                     ?>
                      <?php if($outside_link == ""){ ?>
                        <div id="<?php echo $post->ID ?>" class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
                         <a href="<?php  the_permalink(); ?>" class="article-full-img <?php if($the_category=="Jobs"){ echo 'article-red'; }else{ echo 'article-blue-light'; } ?>">
                           <?php if($featured_image_url !=""){
                             ?>
                             <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                             <?php } ?>
                           <div class="article">
                             <div class="category"><?php echo $the_category; ?></div>
                             <div class="date"><?php echo get_the_date('j M Y');?></div>
                             <h3><?php the_title(); ?></h3>
                             <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                           </div>
                         </a>
                        </div>
                      <?php }else{ ?>
                        <div id="<?php echo $post->ID ?>" class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
                         <a href="<?php  echo $outside_link; ?>" target="_blank" class="article-full-img <?php if($the_category=="Jobs"){ echo 'article-red'; }else{echo 'article-blue-light'; }?>">
                           <?php if($featured_image_url !=""){
                             ?>
                             <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                             <?php } ?>
                           <div class="article">
                             <div class="category"><?php echo $the_category; ?></div>
                             <div class="date"><?php echo get_the_date('j M Y');?></div>
                             <h3><?php the_title(); ?></h3>
                             <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                           </div>
                         </a>
                        </div>

                      <?php } ?>

                    <?php endwhile;
                  else: ?>
                      <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                  <?php endif; ?>
                  </div>
                  <?php if ( $loop->found_posts <= $postsPerPage ) : ?>
                      <div class="load-more-home disable-button-no-more-posts-available col-xs-12 btn" data-category="<?php echo $publications_category; ?>" data-grid="3" data-page-name="home" data-posts-per-page="8">No more posts available</div>

                      <?php else: ?>
                      <div class="load-more-home col-xs-12 col-lg-12 btn" data-category="<?php echo $publications_category; ?>" data-grid="3" data-page-name="home" data-filter-"feed" data-posts-per-page="8">Load more posts</div>
                   <?php endif;
                  wp_reset_postdata(); ?>
              </div>

            </div>
            <!-- // End of publications div -->
            <!-- jobs -->
            <div id="jobs">
              <div class="row">
                  <div id="jobs-container" class="article-container filterize">

                    <?php
                     $jobs_category = get_category_by_slug('jobs')->term_id;
                     $loop = new WP_Query(array(
                             'post_type' => 'post',
                             'posts_per_page' => 8,
                             'cat' => $jobs_category,
                             'post_status' => 'publish',
                             'orderby' => 'date',
                             'order' => 'DESC',
                             'meta_query' => array(
                               array(
                                   'key' => 'post_visibility_value', // name of custom field
                                   'value' => '"feed"', // matches exactly "feed"
                                   'compare' => 'LIKE'
                               )
                             )
                     ));

                    while ($loop->have_posts()) : $loop->the_post();
                           $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                           $outside_link =get_field('external_source_link');
                           $the_category = "";
                           foreach(get_the_category() as $category) {
                             $the_category = $category->cat_name;
                           }

                     ?>
                      <?php if($outside_link == ""){ ?>
                        <div id="<?php echo $post->ID ?>" class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
                         <a href="<?php  the_permalink(); ?>" class="article-full-img <?php if($the_category=="Jobs"){ echo 'article-red'; }else{ echo 'article-blue-light'; } ?>">
                           <?php if($featured_image_url !=""){
                             ?>
                             <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                             <?php } ?>
                           <div class="article">
                             <div class="category"><?php echo $the_category; ?></div>
                             <div class="date"><?php echo get_the_date('j M Y');?></div>
                             <h3><?php the_title(); ?></h3>
                             <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                           </div>
                         </a>
                        </div>
                      <?php }else{ ?>
                        <div id="<?php echo $post->ID ?>" class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
                         <a href="<?php  echo $outside_link; ?>" target="_blank" class="article-full-img <?php if($the_category=="Jobs"){ echo 'article-red'; }else{echo 'article-blue-light'; }?>">
                           <?php if($featured_image_url !=""){
                             ?>
                             <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                             <?php } ?>
                           <div class="article">
                             <div class="category"><?php echo $the_category; ?></div>
                             <div class="date"><?php echo get_the_date('j M Y');?></div>
                             <h3><?php the_title(); ?></h3>
                             <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                           </div>
                         </a>
                        </div>

                      <?php } ?>

                    <?php endwhile; ?>
                  </div>
                  <?php if ( $loop->found_posts <= $postsPerPage ) : ?>
                      <div class="load-more-home disable-button-no-more-posts-available col-xs-12 btn" data-category="<?php echo $jobs_category; ?>" data-grid="3" data-posts-per-page="8">No more posts available</div>

                      <?php else: ?>
                      <div class="load-more-home col-xs-12 col-lg-12 btn" data-category="<?php echo $jobs_category; ?>" data-grid="3" data-page-name="home" data-filter-"feed" data-posts-per-page="8">Load more posts</div>
                   <?php endif;
                  wp_reset_postdata(); ?>
              </div>

            </div>
            <!-- // End of jobs div -->
            <!-- jobs -->
            <div id="tenders">
              <div class="row">
                  <div id="tenders-container" class="article-container ">

                    <?php
                     $tenders_category = get_category_by_slug('tenders')->term_id;
                     $loop = new WP_Query(array(
                             'post_type' => 'post',
                             'posts_per_page' => 8,
                             'cat' => $tenders_category,
                             'post_status' => 'publish',
                             'orderby' => 'date',
                             'order' => 'DESC',
                             'meta_query' => array(
                               array(
                                   'key' => 'post_visibility_value', // name of custom field
                                   'value' => '"feed"', // matches exactly "feed"
                                   'compare' => 'LIKE'
                               )
                             )
                     ));

                    while ($loop->have_posts()) : $loop->the_post();
                           $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                           $outside_link =get_field('external_source_link');
                           $the_category = "";
                           foreach(get_the_category() as $category) {
                             $the_category = $category->cat_name;
                           }

                     ?>
                      <?php if($outside_link == ""){ ?>
                        <div id="<?php echo $post->ID ?>" class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
                         <a href="<?php  the_permalink(); ?>" class="article-full-img <?php if($the_category=="Jobs"){ echo 'article-red'; }else{ echo 'article-blue-light'; } ?>">
                           <?php if($featured_image_url !=""){
                             ?>
                             <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                             <?php } ?>
                           <div class="article">
                             <div class="category"><?php echo $the_category; ?></div>
                             <div class="date"><?php echo get_the_date('j M Y');?></div>
                             <h3><?php the_title(); ?></h3>
                             <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                           </div>
                         </a>
                        </div>
                      <?php }else{ ?>
                        <div id="<?php echo $post->ID ?>" class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
                         <a href="<?php  echo $outside_link; ?>" target="_blank" class="article-full-img <?php if($the_category=="Jobs"){ echo 'article-red'; }else{echo 'article-blue-light'; }?>">
                           <?php if($featured_image_url !=""){
                             ?>
                             <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                             <?php } ?>
                           <div class="article">
                             <div class="category"><?php echo $the_category; ?></div>
                             <div class="date"><?php echo get_the_date('j M Y');?></div>
                             <h3><?php the_title(); ?></h3>
                             <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                           </div>
                         </a>
                        </div>

                      <?php } ?>

                    <?php endwhile; ?>
                  </div>
                  <?php if ( $loop->found_posts <= $postsPerPage ) : ?>
                      <div class="load-more-home disable-button-no-more-posts-available col-xs-12 btn" data-category="<?php echo $tenders_category; ?>" data-grid="3" data-posts-per-page="8">No more posts available</div>

                      <?php else: ?>
                      <div class="load-more-home col-xs-12 col-lg-12 btn" data-category="<?php echo $tenders_category; ?>" data-grid="3" data-page-name="home" data-filter-"feed" data-posts-per-page="8">Load more posts</div>
                   <?php endif;
                  wp_reset_postdata(); ?>
              </div>

            </div>
            <!-- // End of jobs div -->
          </div>
        </div>
      </div>
    </div>

    <?php include('agencies.php') ?>
    <?php get_footer(); ?>
