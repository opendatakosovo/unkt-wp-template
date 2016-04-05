<?php
// Load up our awesome theme options
require_once ( get_stylesheet_directory() . '/theme-options.php' );
add_theme_support( 'post-thumbnails' );


// add post-formats to post_type 'page'
add_post_type_support( 'page', 'post-formats' );

// // register custom post type 'my_custom_post_type'
// add_action( 'init', 'create_my_post_type' );
// function create_my_post_type() {
//     register_post_type( 'my_custom_post_type',
//       array(
//         'labels' => array( 'name' => __( 'Jobs' ) ),
//         'public' => true,
//         'supports' => array('title', 'editor', 'post-formats')
//     )
//   );
// }
//
// //add post-formats to post_type 'my_custom_post_type'
// add_post_type_support( 'create_my_post_type', 'post-formats' );
//
// // register custom post type 'my_custom_post_type'
// add_action( 'init', 'create_my_post_type' );
// function publications_post_type() {
//     register_post_type( 'create_my_post_type',
//       array(
//         'labels' => array( 'name' => __( 'Publications' ) ),
//         'public' => true,
//         'supports' => array('title', 'editor', 'post-formats')
//     )
//   );
// }
//
// //add post-formats to post_type 'my_custom_post_type'
// add_post_type_support( 'publications_post_type', 'post-formats' );


add_theme_support( 'post-formats', array( 'aside', 'gallery', 'feed','slider' ) );


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

// LOAD MORE postsPerPage
function more_post_ajax(){

    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 6;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
		$cat = (isset($_POST['cat'])) ? $_POST['cat'] : '';
    $grid = (isset($_POST['grid'])) ? $_POST['grid'] : '';
    $filterTag = (isset($_POST['filter'])) ? $_POST['filter'] : '';
    $post_type = (isset($_POST['page_name'])) ? $_POST['post_type'] : 'post';
		$slider_id = get_category_by_slug( "slider" );
    $is_first_load = 0;
    $excluded_categories = array(0, $slider_id->cat_ID);
    $offset = 0;

    header("Content-Type: text/html");

    $args =  build_load_more_query($ppp, $page, $cat, $excluded_categories, $post_type, $offset, $filterTag);



    $loop = new WP_Query($args);
    $numberOfPosts = $loop->post_count;
    $out = '';
    if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();
      $category = get_the_category();
      $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
      $outside_link =get_field('external_source_link');

      if($outside_link == ""){
        $out .= '<div class="col-xs-12 col-lg-'.$grid[0].' item '.$category[0]->slug.'">
                <a href="'.get_permalink().'" class="article-full-img">
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
        $out .= '<div class="col-xs-12 col-lg-'.$grid[0].' item '.$category[0]->slug.'">
                <a href="'.$outside_link.'" target="_blank" class="article-full-img">
                <div class="article-img" style="background-image: url('.$featured_image_url.');"></div>
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

  $args = array(
      'suppress_filters' => true,
      'post_type' => 'post',
      'posts_per_page' => $ppp,
      'paged'    => $page,
      'cat' => $categories,
      'category__not_in' => $excluded_categories,
      'meta_query' => $metaQuery
  );
  // echo var_dump($category_in);
  return $args;
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');


//----------------------------------------------
//----------register and label gallery post type
//----------------------------------------------
$gallery_labels = array(
    'name' => _x('Gallery', 'post type general name'),
    'singular_name' => _x('Gallery', 'post type singular name'),
    'add_new' => _x('Add New', 'gallery'),
    'add_new_item' => __("Add New Gallery"),
    'edit_item' => __("Edit Gallery"),
    'new_item' => __("New Gallery"),
    'view_item' => __("View Gallery"),
    'search_items' => __("Search Gallery"),
    'not_found' =>  __('No galleries found'),
    'not_found_in_trash' => __('No galleries found in Trash'),
    'parent_item_colon' => ''

);
$gallery_args = array(
    'labels' => $gallery_labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'capability_type' => 'post',
    'supports' => array('title', 'excerpt', 'editor', 'thumbnail'),
    'menu_icon' => get_bloginfo('template_directory') . '/dist/img/photo-album.png' //16x16 png if you want an icon
);
register_post_type('gallery', $gallery_args);

add_action( 'init', 'jss_create_gallery_taxonomies', 0);

function jss_create_gallery_taxonomies(){
    register_taxonomy(
        'phototype', 'gallery',
        array(
            'hierarchical'=> true,
            'label' => 'Photo Types',
            'singular_label' => 'Photo Type',
            'rewrite' => true
        )
    );
}
//----------------------------------------------
//--------------------------admin custom columns
//----------------------------------------------
//admin_init
add_action('manage_posts_custom_column', 'jss_custom_columns');
add_filter('manage_edit-gallery_columns', 'jss_add_new_gallery_columns');

function jss_add_new_gallery_columns( $columns ){
    $columns = array(
        'cb'                =>        '<input type="checkbox">',
        'jss_post_thumb'    =>        'Thumbnail',
        'title'                =>        'Photo Title',
        'phototype'            =>        'Photo Type',
        'author'            =>        'Author',
        'date'                =>        'Date'

    );
    return $columns;
}

function jss_custom_columns( $column ){
    global $post;

    switch ($column) {
        case 'jss_post_thumb' : echo the_post_thumbnail('admin-list-thumb'); break;
        case 'description' : the_excerpt(); break;
        case 'phototype' : echo get_the_term_list( $post->ID, 'phototype', '', ', ',''); break;
    }
}

//add thumbnail images to column
add_filter('manage_posts_columns', 'jss_add_post_thumbnail_column', 5);
add_filter('manage_pages_columns', 'jss_add_post_thumbnail_column', 5);
add_filter('manage_custom_post_columns', 'jss_add_post_thumbnail_column', 5);

// Add the column
function jss_add_post_thumbnail_column($cols){
    $cols['jss_post_thumb'] = __('Thumbnail');
    return $cols;
}

function jss_display_post_thumbnail_column($col, $id){
  switch($col){
    case 'jss_post_thumb':
      if( function_exists('the_post_thumbnail') )
        echo the_post_thumbnail( 'admin-list-thumb' );
      else
        echo 'Not supported in this theme';
      break;
  }
}
//----------------------------------------------
//--------------add theme support for thumbnails
//----------------------------------------------
if ( function_exists( 'add_theme_support')){
    add_theme_support( 'post-thumbnails' );
}
add_image_size( 'admin-list-thumb', 80, 80, true); //admin thumbnail preview
add_image_size( 'album-grid', 450, 450, true );

flush_rewrite_rules();
