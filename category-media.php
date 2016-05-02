<?php get_header(); ?>
<div class="container">
   <div class="row">
      <div class="filter media-filter">
        <ul>
          <li>Sort View:</li>
          <li>
            <a href="#" data-filter="*">Latest</a>
          </li>
          <?php
          $menu_name = 'media_sidebar_menu';

          if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
          $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

          $menu_items = wp_get_nav_menu_items($menu->term_id);

          $menu_list = '';

          foreach ( (array) $menu_items as $key => $menu_item ) {
             $title = $menu_item->title;
             $url = $menu_item->url;
             $menu_list .= '<li><a href="#" data-filter=".' . str_replace(" ","-",strtolower($title)) . '">' . $title . '</a></li>';
          }
          } else {
          $menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
          }

          echo $menu_list;
          ?>
        </ul>
      </div>
    </div>
    <div class="row">
      <?php

        //get terms (e.g. categories or post tags), then display all posts in each retrieved term
        $taxonomy = 'category';//  e.g. post_tag, category
        $param_type = 'category__in'; //  e.g. tag__in, category__in
        $categories = get_the_category();
        $cat_id = $categories[0]->category_parent;
        $query_by_cats = array();

        $term_args=array(
          'orderby' => 'name',
          'order' => 'ASC',
          'child_of' => $cat_id,
          'post_status' => 'publish',
         'orderby' => 'date',
         'order' => 'ASC'
        );
        $terms = get_terms($taxonomy,$term_args);


        foreach($terms as $term){
          $query_by_cats[]=$term->term_id;
        }

      ?>
      <div class="article-container filterize">

        <?php
        $postsPerPage = 8;

        $news_term = get_category_by_slug('news');
        $news_id = $news_term->term_id;

        $blogs_term = get_category_by_slug('blogs');
        $blogs_id = $blogs_term->term_id;

        $user_content_term = get_category_by_slug('community-contributions');
        $user_content_id = $user_content_term->term_id;

        $visualizations_term = get_category_by_slug('visualizations');
        $visualizations_id = $visualizations_term->term_id;

        $media_term = get_category_by_slug('media');
        $media_id = $media_term->term_id;

        $gallery_term = get_category_by_slug('gallery');
        $gallery_id = $gallery_term->term_id;

        $in_category = array($news_id,$blogs_id, $user_content_id, $visualizations_id, $gallery_id);

        $categories = get_the_category();
        $cat_id = $media_id;
        $args = array(
                'post_type' => array('post'),
                'posts_per_page' => $postsPerPage,
                'cat'=>$cat_id,
                'category__in'=>$in_category,
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC'
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

        <?php endwhile; ?>
     </div>
   </div>
   <?php if ( $loop->found_posts <= $postsPerPage ) : ?>
      <div class="load-more col-xs-12 col-lg-12 btn" data-category="<?php echo implode(', ', $in_category); ?>" data-grid="3" data-page-name="home" data-posts-per-page="<?php echo $postsPerPage ?>">No more posts avaliable</div>

   <?php else: ?>
      <div class="load-more col-xs-12 col-lg-12 btn" data-category="<?php echo implode(', ', $in_category); ?>" data-grid="3" data-page-name="home" data-posts-per-page="<?php echo $postsPerPage ?>">Load more posts</div>
   <?php endif;
     wp_reset_postdata(); ?>
</div>

<?php get_footer(); ?>
