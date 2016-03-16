<?php
// Load up our awesome theme options
require_once ( get_stylesheet_directory() . '/theme-options.php' );
add_theme_support( 'post-thumbnails' );
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

// LOAD MORE postsPerPage
function more_post_ajax(){

    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 3;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;

    header("Content-Type: text/html");

    $args = array(
        'suppress_filters' => true,
        'post_type' => 'post',
        'posts_per_page' => $ppp,
				'paged'    => $page,
    );

    $loop = new WP_Query($args);

    $out = '';

    if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();
		$category = get_the_category();
		$featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				if($category[0]->slug == "news"){
					$out .= '<div class="col-xs-12 col-lg-6 item '.$category[0]->slug.'">
									<a href="" class="article-full-img">
									<div class="article-img" style="background-image: url('.$featured_image_url.');"></div>
										<div class="article">
											<div class="category">'.$category[0]->cat_name.'</div>
											<div class="date">'.get_the_date().'</div>
											<h3>'.get_the_title().'</h3>
											<div class="read-more">Read More <span class="icon-arrow-right"></span></div>
										</div>
									</a>
	         </div>';
				}else if($category[0]->slug=="tenders"){
					$out .= '<div class="col-xs-12 col-lg-3 item '.$category[0]->slug.'">
									<a href="" >
										<div class="article article-red">
											<div class="category">'.$category[0]->cat_name.'</div>
											<div class="date">'.get_the_date().'</div>
											<h3>'.get_the_title().'</h3>
											<div class="read-more">Read More <span class="icon-arrow-right"></span></div>
										</div>
									</a>
	         </div>';
				}else if($category[0]->slug == "gallery"){
					$out .= '<div class="col-xs-12 col-lg-6 item '.$category[0]->slug.'">
									<a href="" class="article-full-img">
									<div class="article-img" style="background-image: url('.$featured_image_url.');"></div>
										<div class="article">
											<div class="category">'.$category[0]->cat_name.'</div>
											<div class="date">'.get_the_date().'</div>
											<h3>'.get_the_title().'</h3>
											<div class="read-more">Read More <span class="icon-arrow-right"></span></div>
										</div>
									</a>
	         </div>';
				}else{
					$out .= '<div class="col-xs-12 col-lg-3 item '.$category[0]->slug.'">
									<a href="" >
										<div class="article">
											<div class="category">'.$category[0]->cat_name.'</div>
											<div class="date">'.get_the_date().'</div>
											<h3>'.get_the_title().'</h3>
											<div class="read-more">Read More <span class="icon-arrow-right"></span></div>
										</div>
									</a>
	         </div>';
				}


    endwhile;
    endif;
    wp_reset_postdata();
    die($out);
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');

?>
