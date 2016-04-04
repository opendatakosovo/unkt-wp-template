<?php get_header(); ?>
<style>
.sidebar-nav {
    width: 20.5% !important;
    padding-bottom: 0px !important;
}
.sidebar.sidebar-nav ul li a {
     width: 100%;
    padding: 36px 30px;
    font-size: 18px;
}
</style>
<?php
         query_posts( array( 'category_name' => 'news' ), array( 'category_name' => 'media' ) );
    ?>
  <div class="content content-gallery">
		<div class="container">
          <div class="row">
            <div id="ajax-more-posts" class="article-container filterize">
              <div class="row">
               <div class="col-xs-12 col-lg-12 category-posts-container">
                 <?php
                     $postsPerPage = 9;

                     $categories = get_the_category();
                     $cat_id = $categories[0]->cat_ID;
                     $args = array(
                             'post_type' => 'post',
                             'posts_per_page' => $postsPerPage,
                             'cat'=>$cat_id
                     );

                     $loop = new WP_Query($args);
                     while ($loop->have_posts()) : $loop->the_post();
                 ?>
                 <div class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
                   <a href="<?php  the_permalink(); ?>" >
                     <!-- <div class="article" style="background-image: url('dist/img/article-1.jpg');"></div> -->
                     <div class="article">
                       <div class="category"><?php foreach(get_the_category() as $category) { echo $category->cat_name;} ?></div>
                       <div class="date"><?php echo get_the_date('j M Y');?></div>
                       <h3><?php the_title(); ?></h3>
                       <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
                     </div>
                   </a>
                 </div>
               <?php
                       endwhile;
               wp_reset_postdata();
                ?>
              </div>
             </div>
           </div>
         </div>
          <div class="load-more col-xs-12  btn" data-grid="3" data-category="<?php echo $cat_id; ?>">Load more content</div>
  	</div>
	</div>


<?php get_footer(); ?>
