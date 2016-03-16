<?php /* Template Name: Single Agency */ ?>
<?php get_header(); ?>
<div class="content content-article">
  <div class="container-fluid">
    <div class="row">
      <div class="article-wrapper">
        <div class="article-inner">
          <div class="article-content">
            <div class="section">
              <h3>Mandate</h3>
              <p><?php $key="MANDATE"; echo get_post_meta($post->ID, $key, true); ?></p>
            </div>
            <div class="section">
              <h3>Activities</h3>
              <p><?php $key="ACTIVITIES"; echo get_post_meta($post->ID, $key, true); ?></p>
              </div>
            <div class="section">
              <h3>Contact</h3>
              <p><?php $key="CONTACT"; echo get_post_meta($post->ID, $key, true); ?></p>
            </div>
          </div>
        </div>

        <div class="sidebar">
          <?php dynamic_sidebar( 'agencies-page-sidebar' ); ?>
          <a href="#" class="download">
            <span>Download Agency Logo</span>
          </a>

          <div class="agencies">
            <div class="agencies-top">

              <div class="un">
                <img src="dist/img/un.svg" alt="United Nations" />
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
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<div class="read-next">
  <?php
    $pagelist = get_pages("child_of=".$post->post_parent."&parent=".$post->post_parent."&sort_column=menu_order&sort_order=asc");
    $pages = array();
    foreach ($pagelist as $page) {
       $pages[] += $page->ID;
    }

    $current = array_search($post->ID, $pages);
    $prevID = $pages[$current-1];
    $nextID = $pages[$current+1];
    ?>

    <?php
    if (!empty($nextID)) { ?>
      <div class="read-next-label">
        <p>Next agency <span class="icon-arrow-right"></span></p>
      </div>
      <a href="<?php echo get_permalink($nextID); ?>" title="<?php echo get_the_title($nextID); ?>" class="read-next-title">
        <span><?php echo get_the_title($nextID); ?></span>
      </a>
  <?php } ?>
</div>
<?php get_footer(); ?>
