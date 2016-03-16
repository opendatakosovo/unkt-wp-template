<?php /* Template Name: UN Agencies */ ?>
<?php get_header(); ?>
<div class="content content-article">
  <div class="container-fluid">
    <div class="row">
      <div class="article-wrapper">
        <div class="article-inner">
          <div class="article-content">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              <h1><?php the_title(); ?></h1>
              <?php the_content(); ?>
            <?php endwhile; else: ?>
              <p><?php _e('Sorry, this page does not exist.'); ?></p>
            <?php endif; ?>

          </div>

        </div>
        <div class="sidebar">
          <div class="agencies">
            <div class="agencies-top">
              <div class="un">
                <img src="<?php bloginfo('template_url'); ?>/dist/img/un.svg" alt="United Nations" />
                <h3>UN Agencies</h3>
              </div>
            </div>
            <div class="agencies-bottom">
              <div class="agencies-list">
                <?php
                    $menu_name = 'un_agencies_menu';

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
                </ul>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
