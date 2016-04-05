<?php get_header(); ?>
<style>
.sidebar.sidebar-nav{
      padding-top: 13px !important;
      padding-bottom: 13px !important;
}
.sidebar-nav {
    padding-bottom: 0px !important;
    width: auto !important;
    height:auto;
}
.sidebar.sidebar-nav ul li a {
    /*font-size: 18px;*/
         width: 100% !important;
}
</style>

<div class="container">
      <div id="ajax-more-posts" class="article-container media">
        <div class="row">
          <div class="col-xs-12 col-lg-12 category-media-posts-container">
            <?php
                $postsPerPage = 9;

                $news_term = get_category_by_slug('news');
                $news_id = $news_term->term_id;

                $blogs_term = get_category_by_slug('blogs');
                $blogs_id = $blogs_term->term_id;

                $user_content_term = get_category_by_slug('user-content');
                $user_content_id = $user_content_term->term_id;

                $visualizations_term = get_category_by_slug('visualizations');
                $visualizations_id = $visualizations_term->term_id;

                $media_term = get_category_by_slug('media');
                $media_id = $media_term->term_id;

                $in_category = array($news_id,$blogs_id, $user_content_id, $visualizations_id);

                $categories = get_the_category();
                $cat_id = $media_id;
                $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => $postsPerPage,
                        'cat'=>$cat_id,
                        'category__in'=>$in_category
                );

                $loop = new WP_Query($args);
                while ($loop->have_posts()) : $loop->the_post();
                $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                $outside_link =get_field('external_source_link'); ?>
                <?php if($outside_link == ""){ ?>
                <div class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
                  <a href="<?php  the_permalink(); ?>" class="article-full-img">
                    <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                    <div class="article">
                      <div class="category"><?php foreach(get_the_category() as $category) { echo $category->cat_name;} ?></div>
                      <div class="date"><?php echo get_the_date('j M Y');?></div>
                      <h3><?php the_title(); ?></h3>
                      <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                    </div>
                  </a>
                </div>
                <?php }else{ ?>
                  <div class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
                    <a href="<?php  echo $outside_link; ?>" target="_blank" class="article-full-img">
                      <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                      <div class="article">
                        <div class="category"><?php foreach(get_the_category() as $category) { echo $category->cat_name;} ?></div>
                        <div class="date"><?php echo get_the_date('j M Y');?></div>
                        <h3><?php the_title(); ?></h3>
                        <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                      </div>
                    </a>
                  </div>

                 <?php } ?>

                  <?php endwhile;
                    wp_reset_postdata();
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
     </div>
    <div class="load-more col-xs-12 btn" data-category="<?php echo implode(', ', $in_category); ?>" data-grid="3" data-page-name="home" data-posts-per-page="<?php echo $postsPerPage ?>">Load more content</div>
</div>

<?php get_footer(); ?>
