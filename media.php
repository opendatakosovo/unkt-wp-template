<?php /* Template Name: Media */ ?>
<?php get_header(); ?>
<?php
         query_posts( array( 'category_name' => 'news' ), array( 'category_name' => 'media' ) );
    ?>
  <div class="content content-gallery">
		<div class="container-fluid">
      <div class="article-wrapper">
        <div class="article-inner">
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
             <div class="col-xs-12 col-lg-3 item">
               <?php echo do_shortcode('[viralQuiz id=1]')?>
             </div>

          </div>
          <div class="load-more col-xs-12 btn">Load more content</div>

        </div>
        <div class="sidebar sidebar-nav">
          <?php
              $menu_name = 'media_sidebar_menu';

              if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
              $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

              $menu_items = wp_get_nav_menu_items($menu->term_id);

              $menu_list = '<ul id="menu-' . $menu_name . '">';

              foreach ( (array) $menu_items as $key => $menu_item ) {
                 $title = $menu_item->title;
                 $url = $menu_item->url;
                 $menu_list .= '<li><a href="' . $url . '">' . $title . '</a></li>';
              }
              $menu_list .= '</ul>';
              } else {
              $menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
              }

              echo $menu_list;
              ?>
        </div>

  	</div>
	</div>


<?php get_footer(); ?>
