<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package UNKT
 * @since UNKT 1.0
 */

get_header(); ?>
<?php
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array('post_type' => array('post','ecwd_event'));

if( strlen($query_string) > 0 ) {
	foreach($query_args as $key => $string) {
		$query_split = explode("=", $string);
		$search_query[$query_split[0]] = urldecode($query_split[1]);
	} // foreach
} //if

$search = new WP_Query($search_query);
?>
<div class="container">
	<div class="article-container">
		<div class="row">
        <?php
            while ($search->have_posts()) : $search->the_post();
            $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
            $outside_link = get_field('external_source_link');

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
                $terms = get_the_terms(strval( $post->ID ),'ecwd_event_category');
                $event_categories = wp_get_post_terms($post->ID, 'ecwd_event_category','');
              }
               ?>

           <?php if($outside_link == ""){ ?>
             <div class="col-xs-12 col-lg-3 item <?php echo $the_category_slug; ?>">
               <a href="<?php  the_permalink(); ?>" class="article-full-img">
                 <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                 <div class="article">
                   <div class="category"><?php echo $the_category; ?></div>
                   <div class="date"><?php echo get_the_date('j M Y');?></div>
                   <h3><?php the_title(); ?></h3>
                   <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                 </div>
               </a>
             </div>
             <?php }else{ ?>
               <div class="col-xs-12 col-lg-3 item <?php echo $the_category_slug; ?>">
                 <a href="<?php  echo $outside_link; ?>" target="_blank" class="article-full-img">
                   <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
                   <div class="article">
                     <div class="category"><?php echo $the_category; ?></div>
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
</div>
<?php get_footer(); ?>
