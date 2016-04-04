<style>
.sidebar-nav {
    width: 17.5% !important;
    padding-bottom: 0px !important;
}
.sidebar.sidebar-nav ul li a {
     width: 100%;
    padding: 36px 30px;
    font-size: 18px;
}
</style>
  <div class="content">
		<div class="container">
         <div class="row">
           <div class="col-xs-12 col-lg-12 category-media-posts-container">
             <?php
                 $postsPerPage = 9;

                 $categories = get_the_category();
                 $cat_id = $categories[0]->cat_ID;
                 if($cat_id != ""){


                       $args = array(
                               'post_type' => 'post',
                               'posts_per_page' => $postsPerPage,
                               'cat'=>$cat_id
                       );

                       $loop = new WP_Query($args);
                       while ($loop->have_posts()) : $loop->the_post();
                       $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                       if($featured_image_url != ""){ ?>
                         <div class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
                           <a href="<?php the_permalink()?>" class="article-full-img">
                             <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                             <div class="article">
                               <div class="category"><?php foreach(get_the_category() as $category) { echo $category->cat_name;} ?></div>
                               <div class="date"><?php echo get_the_date();?></div>
                               <h3><?php the_title(); ?></h3>
                               <div class="read-more">Read More <span class="icon-arrow-right"></span></div>
                             </div>
                           </a>
                         </div>

                       <?php }else{ ?>

                           <div class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
                             <a href="<?php  the_permalink(); ?>" >
                               <div class="article">
                                 <div class="category"><?php foreach(get_the_category() as $category) { echo $category->cat_name;} ?></div>
                                 <div class="date"><?php echo get_the_date();?></div>
                                 <h3><?php the_title(); ?></h3>
                                 <div class="read-more">Read More <span class="icon-arrow-right"></span></div>
                               </div>
                             </a>
                           </div>

                         <?php
                           }
                         endwhile;
                         wp_reset_postdata();
                  }else{ ?>
                    <div> No posts in this page.</div>
                  <?php }

            ?>
            <div class="sidebar sidebar-nav col-lg-2">
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
          <div class="load-more col-xs-12 btn" data-category="<?php echo $cat_id; ?>" data-grid="3" data-post-type="post" data-posts-per-page="<?php echo $postsPerPage ?>">Load more content</div>
  	</div>
	</div>
