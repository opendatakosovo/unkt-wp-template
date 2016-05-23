<?php
// Load up our awesome theme options
require_once ( get_stylesheet_directory() . '/theme-options.php' );
add_theme_support( 'post-thumbnails' );


// add post-formats to post_type 'page'
add_post_type_support( 'page', 'post-formats' );

function wpdocs_custom_excerpt_length( $length ) {
    return 34;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
function wpdocs_excerpt_more( $more ) {
    return '';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
function add_js_script()
{
	// Register the script like this for a theme:
	wp_register_script( 'custom-script', get_template_directory_uri() . '/dist/js/all.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'custom-script' );

	wp_enqueue_script( 'custom_js', get_template_directory_uri(). '/dist/js/custom.js', array( 'jquery'), '', true );
	wp_localize_script( 'custom_js', 'ajax_posts', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'noposts' => __('No older posts found', 'fireproduct'), ));
}
add_action( 'wp_enqueue_scripts', 'add_js_script' );

// Add Style
function add_css()
{
	// Register the script like this for a theme:
	wp_register_script( 'custom-script', get_template_directory_uri() . '/dist/css/style.css', array( 'css' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'add_css' );


if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

	register_nav_menus( array(
		'main_menu' => 'Main Navigation menu',
	) );
	register_nav_menus( array(
		'footer_menu' => 'Footer Navigation menu',
	) );
	register_nav_menus( array(
		'un_agencies_menu' => 'UN Agencies Menu',
	) );
	register_nav_menus( array(
		'media_sidebar_menu' => 'Media Sidebar Menu',
	) );

function wpb_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Home Quizes/Events/Polls Sidebar', 'wpb' ),
        'id' => 'sidebar-1',
        'description' => __( 'Home Quizes/Events/Polls Sidebar', 'wpb' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' =>__( 'UN Agencies Page Sidebar', 'agencies-page-sidebar'),
        'id' => 'agencies-list',
        'description' => __( 'Appears on the static front page template', 'wpb' ),
        'before_widget' => '<div class="sidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
    }

add_action( 'widgets_init', 'wpb_widgets_init' );


function wpbeginner_numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}

$load_more_category = array();

// LOAD MORE postsPerPage
function more_post_ajax(){


		$page_name = (isset($_POST['page_name'])) ? $_POST['page_name'] : 'page';
		$ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 8;
		$page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 1;
		$cat = (isset($_POST['cat'])) ? $_POST['cat'] : '';
		$grid = (isset($_POST['grid'])) ? $_POST['grid'] : '';
		$filterTag = (isset($_POST['filter'])) ? $_POST['filter'] : '';
		$post_type = (isset($_POST['post_type'])) ? $_POST['post_type'] : 'post';
		$slider_id = get_category_by_slug( "slider" );

		if($page_name == "home"){
			return_ajax_posts($ppp,$page,$cat,$grid,$filterTag,$post_type,$slider_id);
		}else{
			return_ajax_posts_categories($ppp,$page,$cat,$grid,$filterTag,$post_type,$slider_id);
		}


}


function return_ajax_posts($ppp,$page,$cat,$grid,$filterTag,$post_type,$slider_id){
	session_start();
	header("Content-Type: text/html");
	$offset_category = 'offset_'.$cat;

	$_SESSION[$offset_category] = ((isset($_SESSION[$offset_category])) ? $_SESSION[$offset_category] : 0);

	if($_SESSION[$offset_category] == 0){
		$_SESSION[$offset_category] = $ppp;
		$args =  build_load_more_query_home($ppp, $page, $cat, $excluded_categories, $post_type, $_SESSION[$offset_category], $filterTag);
		$the_query = new WP_Query($args);
	}
	else{
		$_SESSION[$offset_category] = $_SESSION[$offset_category] + $ppp;
		$args =  build_load_more_query($ppp, $page, $cat, $excluded_categories, $post_type, $_SESSION[$offset_category], $filterTag);
		$the_query = new WP_Query($args);
	}

	// $offset = $numberOfFoundPosts;

	$out = '';

	if ( $the_query->have_posts()) :

				while ( $the_query->have_posts() ) : $the_query->the_post();

						$category = get_the_category();
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
							}
							$article_img_div = "";
							if($featured_image_url!=""){
							 $article_img_div='	<div class="article-img" style="background-image: url('.$featured_image_url.');"></div>';
							}

							$article_bck_color="";
							if($the_category=="Jobs"){
								$article_bck_color = 'article-red';
							}else{
								$article_bck_color = 'article-blue-light';
								// bm_ignorePost($post->ID);
							}
						if($outside_link == ""){
							$out .= '<div id="'.$post['ID'].'" class="col-xs-12 col-lg-'.$grid[0].' item '.$the_category_slug.'">
											<a href="'.get_permalink().'" class="article-full-img '.$article_bck_color.'">'.$article_img_div.'
												<div class="article">
													<div class="category">'.$the_category.'</div>
													<div class="date">'.get_the_date().'</div>
													<h3>'.get_the_title().'</h3>
													<div class="read-more">Read More <span class="icon-arrow-right"></span></div>
												</div>
											</a>
							 </div>';
						}else{
							$out .= '<div id="'.$post['ID'].'" class="col-xs-12 col-lg-'.$grid[0].' item '.$the_category_slug.'">
											<a href="'.$outside_link.'" target="_blank" class="article-full-img'.$article_bck_color.'">
											<div class="article-img" style="background-image: url('.$featured_image_url.');"></div>
												<div class="article">
													<div class="category">'.$the_category.'</div>
													<div class="date">'.get_the_date().'</div>
													<h3>'.get_the_title().'</h3>
													<div class="read-more">Read More <span class="icon-arrow-right"></span></div>
												</div>
											</a>
							 </div>';
						}
						$do_not_duplicate[] = $post->ID;
		     endwhile;
				 wp_reset_postdata();
		 else:
			 unset($_SESSION[$offset_category]);
		   die("NULL");

		 endif;
	die($out);
}
// LOAD MORE postsPerPage
function return_ajax_posts_categories($ppp,$page,$cat,$grid,$filterTag,$post_type,$slider_id){
    $is_first_load = 0;
    $excluded_categories = array(0, $slider_id->cat_ID);
    $offset = 0;
    header("Content-Type: text/html");
    $args =  build_load_more_query($ppp, $page, $cat, $excluded_categories, $post_type, $offset, $filterTag);
    $the_query = new WP_Query($args);

		$out = '';

		if ( $the_query->have_posts()) :

					while ( $the_query->have_posts() ) : $the_query->the_post();

							$category = get_the_category();
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
								}
								$article_img_div = "";
								if($featured_image_url!=""){
								 $article_img_div='	<div class="article-img" style="background-image: url('.$featured_image_url.');"></div>';
								}

								$article_bck_color="";
								if($the_category=="Jobs"){
									$article_bck_color = 'article-red';
								}else{
									$article_bck_color = 'article-blue-light';
									// bm_ignorePost($post->ID);
								}
							if($outside_link == ""){
								$out .= '<div id="'.$post['ID'].'" class="col-xs-12 col-lg-'.$grid[0].' item '.$the_category_slug.'">
												<a href="'.get_permalink().'" class="article-full-img '.$article_bck_color.'">'.$article_img_div.'
													<div class="article">
														<div class="category">'.$the_category.'</div>
														<div class="date">'.get_the_date().'</div>
														<h3>'.get_the_title().'</h3>
														<div class="read-more">Read More <span class="icon-arrow-right"></span></div>
													</div>
												</a>
								 </div>';
							}else{
								$out .= '<div id="'.$post['ID'].'" class="col-xs-12 col-lg-'.$grid[0].' item '.$the_category_slug.'">
												<a href="'.$outside_link.'" target="_blank" class="article-full-img'.$article_bck_color.'">
												<div class="article-img" style="background-image: url('.$featured_image_url.');"></div>
													<div class="article">
														<div class="category">'.$the_category.'</div>
														<div class="date">'.get_the_date().'</div>
														<h3>'.get_the_title().'</h3>
														<div class="read-more">Read More <span class="icon-arrow-right"></span></div>
													</div>
												</a>
								 </div>';
							}
							$do_not_duplicate[] = $post->ID;
			     endwhile;
					 wp_reset_postdata();
			 else:
				 unset($_SESSION[$offset_category]);
			   die("NULL");

			 endif;
		die($out);
}

// Returns the array of properties to query for posts when we click Load More
function build_load_more_query_home($ppp, $page, $categories, $excluded_categories, $post_type, $offset, $filterTag){
  if($filterTag=="feed"){
    $metaQuery = array(
      array(
        'key' => 'post_visibility_value', // name of custom field
        'value' => '"feed"', // matches exactly "feed"
        'compare' => 'LIKE'
      )
    );
  }
	if($post_type=="ecwd_event"){
	 $post_type_array =	array('ecwd_event');
	}else{
	 $post_type_array =	array('post');
	}
  $args = array(
      'suppress_filters' => true,
      'post_type' => $post_type_array,
      'posts_per_page' => $ppp,
			'offset'=>$offset,
      // 'paged'    => $page,
      'cat' => $categories,
      'category__not_in' => $excluded_categories,
      'meta_query' => $metaQuery,
			'post_status' => 'publish',
			'orderby' => 'date',
			'order' => 'DESC'
  );
  // echo var_dump($category_in);
  return $args;
	wp_reset_postdata();
}
// Returns the array of properties to query for posts when we click Load More
function build_load_more_query($ppp, $page, $categories, $excluded_categories, $post_type, $offset, $filterTag){
  if($filterTag=="feed"){
    $metaQuery = array(
      array(
        'key' => 'post_visibility_value', // name of custom field
        'value' => '"feed"', // matches exactly "feed"
        'compare' => 'LIKE'
      )
    );
  }
	if($post_type=="ecwd_event"){
	 $post_type_array =	array('ecwd_event');
	}else{
	 $post_type_array =	array('post');
	}
  $args = array(
      'suppress_filters' => true,
      'post_type' => $post_type_array,
      'posts_per_page' => $ppp,
			// 'offset'=>$offset,
      'paged'    => $page,
      'cat' => $categories,
      'category__not_in' => $excluded_categories,
      'meta_query' => $metaQuery,
			'post_status' => 'publish',
			'orderby' => 'date',
			'order' => 'DESC'
  );
  // echo var_dump($category_in);
  return $args;
	wp_reset_postdata();
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');

//Gets post cat slug and looks for single-[cat slug].php and applies it
add_filter('single_template', create_function(
	'$the_template',
	'foreach( (array) get_the_category() as $cat ) {
		if ( file_exists(TEMPLATEPATH . "/single-{$cat->slug}.php") )
		return TEMPLATEPATH . "/single-{$cat->slug}.php"; }
	return $the_template;' )
);
//----------------------------------------------
//--------------add theme support for thumbnails
//----------------------------------------------
if ( function_exists( 'add_theme_support')){
    add_theme_support( 'post-thumbnails' );
}
add_image_size( 'admin-list-thumb', 80, 80, true); //admin thumbnail preview
add_image_size( 'album-grid', 450, 450, true );

flush_rewrite_rules();
