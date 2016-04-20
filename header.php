<!DOCTYPE html>
<html>
<head>
	<?php $image = '';
	if ( has_post_thumbnail() ) {
		$image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID, 'full', false ) );
	} ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
  <title><?php wp_title(); ?></title>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/dist/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/dist/css/style.css">
	<meta name="description" content="<?php if ( is_single() ) {
        single_post_title('', true);
    } else {
        bloginfo('name'); echo " "; bloginfo('description');
    }
    ?>" />
		<!-- Place this data between the <head> tags of your website -->
<title>Page Title. Maximum length 60-70 characters</title>
<meta name="description" content="Page description. No longer than 155 characters." />

<!-- Twitter Card data -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@publisher_handle">
<meta name="twitter:title" content="<?php if ( is_single() ) {
			single_post_title('', true);
	}else{
		bloginfo('name');
	} ?>">
<meta name="twitter:description" content="<?php if ( is_single() ) {
			single_post_title('', true);
	} else {
			bloginfo('name'); echo " "; bloginfo('description');
	}
	?>">
<meta name="twitter:creator" content="@author_handle">
<meta name="twitter:image" content="<?php if ( is_single() ) {
			single_post_title('', true);
	}else{
		bloginfo('name');
	} ?>">

<!-- Open Graph data -->
<meta property="og:title" content="<?php if ( is_single() ) {
			single_post_title('', true);
	}else{
		bloginfo('name');
	} ?>" />
<meta property="og:type" content="article" />
<meta property="og:url" content="<?php get_bloginfo();?>" />
<meta property="og:image" content="<?php if ( is_single() ) {
			echo $image;
	}else{
		echo $image;;
	} ?>" />
<meta property="og:description" content="<?php if ( is_single() ) {
			single_post_title('', true);
	} else {
			bloginfo('name'); echo " "; bloginfo('description');
	}
	?>" />
<meta property="og:site_name" content="<?php bloginfo('name') ?>" />
<meta property="fb:admins" content="Facebook numeric ID" />
<script src="http://photoswipe.s3-eu-west-1.amazonaws.com/pswp/dist/photoswipe.min.js"></script>
<script src="http://photoswipe.s3-eu-west-1.amazonaws.com/pswp/dist/photoswipe-ui-default.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://photoswipe.s3.amazonaws.com/pswp/dist/photoswipe.css">
<link rel="stylesheet" type="text/css" href="http://photoswipe.s3.amazonaws.com/pswp/dist/default-skin/default-skin.css">
  <?php wp_enqueue_script("jquery"); ?>
  <?php wp_head(); ?>
</head>
<body>
	<div style="display:none;" id="loader" class="loader">
		<div class="loader-inner">
			<img class="logo-loader logo-1" src="<?php bloginfo('template_url'); ?>/dist/img/unkt_logo1.svg" alt="" />
			<img class="logo-loader logo-2" src="<?php bloginfo('template_url'); ?>/dist/img/unkt_logo_text.svg" alt="" />
		</div>
	</div>
	<div style="display:none;" id="subscribe-header" class="subscribe subscribe-big">
		<div class="subscribe-label">
			<p>Subscribe for the latest news and updates:</p>
		</div>
		<div class="subscribe-form">

				<?php es_subbox( $namefield = "NO", $desc = "", $group = "Public" ); ?>

			</form>
		</div>
	</div>


	<div class="header">
		<a href="#" class="search-box">
			<img src="<?php bloginfo('template_url'); ?>/dist/img/search.svg" alt=""/>
			Search
		</a>
		<ul class="language">
			<li>
				<a target="_blank" href="http://www.youtube.com/channel/UCxaw3b7cL_8fE2I4XwQvUgA" class="icon-youtube"></a>
			</li>
			<li>
				<a target="_blank" href="http://www.facebook.com/UNKosovoTeam" class="icon-facebook"></a>
			</li>
			<li>
				<a target="_blank" href="https://twitter.com/unkosovoteam" class="icon-twitter"></a>
			</li>

		</ul>
		<a href="<?php get_bloginfo();?>" class="logo">
			<img src="<?php bloginfo('template_url'); ?>/dist/img/unkt_logo.svg" alt="UNKT Logo" />
		</a>
		<a href="#" class="menu-bar">Menu</a>

		<?php
		  $menu_name = 'main_menu';
		  $locations = get_nav_menu_locations();
		  $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
		  $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
		?>

		<ul class="menu">
		    <?php
		    $count = 0;
		    $submenu = false;
		    foreach( $menuitems as $item ):
		        $link = $item->url;
		        $title = $item->title;
		        // item does not have a parent so menu_item_parent equals 0 (false)
		        if ( !$item->menu_item_parent ):
		        // save this id for later comparison with sub-menu items
		        $parent_id = $item->ID;
		    ?>

		    <li class="item active <?php echo slugify($title); ?>">
		        <a href="<?php echo $link; ?>" class="title">
		            <?php echo $title; ?>
		        </a>
		    <?php endif; ?>

		        <?php if ( $parent_id == $item->menu_item_parent ): ?>

		            <?php if ( !$submenu ): $submenu = true; ?>
			            <ul class="sub-menu">
			            <?php endif; ?>

			                <li class="item">
			                    <a href="<?php echo $link; ?>" class="title"><?php echo $title; ?></a>
			                </li><br>

			            <?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>
			            </ul>
		            <?php $submenu = false; endif; ?>

		        <?php endif; ?>

		    <?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ): ?>
		    </li>
		    <?php $submenu = false; endif; ?>

		<?php $count++; endforeach; ?>

		</ul>

	</div>
	<script>
	$( document ).ready(function() {
		$('.item').removeClass('active');

		var lastClicked = (window.location.href).split('/');

		var lastClickedMenuItem = lastClicked[(lastClicked.length-2)];

		$('.menu .'+lastClickedMenuItem+'').addClass("active");

	});

	function slugify(text){
  return text.toString().toLowerCase()
    .replace(/\s+/g, '-')           // Replace spaces with -
    .replace(/[^\u0100-\uFFFF\w\-]/g,'-') // Remove all non-word chars ( fix for UTF-8 chars )
    .replace(/\-\-+/g, '-')         // Replace multiple - with single -
    .replace(/^-+/, '')             // Trim - from start of text
    .replace(/-+$/, '');            // Trim - from end of text
}

	</script>
