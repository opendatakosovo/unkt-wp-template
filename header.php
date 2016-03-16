<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
  <title><?php wp_title(); ?></title>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/dist/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/dist/css/style.css">
	<meta name="description" content="<?php if ( is_single() ) {
        single_post_title('', true);
    } else {
        bloginfo('name'); echo " - "; bloginfo('description');
    }
    ?>" />
  <?php wp_enqueue_script("jquery"); ?>
  <?php wp_head(); ?>
</head>
<body>

	<!-- <div class="loader">
		<div class="loader-inner">
			<img class="logo-loader logo-1" src="<?php bloginfo('template_url'); ?>/dist/img/unkt_logo1.svg" alt="" />
			<img class="logo-loader logo-2" src="<?php bloginfo('template_url'); ?>/dist/img/unkt_logo_text.svg" alt="" />
		</div>
	</div> -->

	<div style="display:none;" class="subscribe subscribe-small">
		<div class="subscribe-label">
			<p>Subscribe for the latest news and updates:</p>
		</div>
		<div class="subscribe-form">
			<form name="subscribe-small" method="post" action="">
				<input type="text" placeholder="your@email.here" />
				<button type="submit" class="icon-arrow-right"></button>
			</form>
		</div>
	</div>

	<div class="header">
		<a href="#" class="search-box">
			<img src="<?php bloginfo('template_url'); ?>/dist/img/search.svg" alt=""/>
			Search
		</a>
		<ul class="language">
			<li class="active">
				<?php get_bloginfo();?>
				<a href="<?php get_bloginfo();?>/unkt/en">EN</a>
			</li>
			<li>
				<a href="<?php get_bloginfo();?>/unkt/sq">AL</a>
			</li>
			<li>
				<a href="<?php get_bloginfo();?>/unkt/sr">SRB</a>
			</li>
		</ul>
		<a href="<?php get_bloginfo();?>" class="logo">
			<img src="<?php bloginfo('template_url'); ?>/dist/img/unkt_logo.svg" alt="UNKT Logo" />
		</a>
		<a href="#" class="menu-bar">Menu</a>
		<ul class="menu">
			<?php
					$menu_name = 'main_menu';

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
