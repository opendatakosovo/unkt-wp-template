<?php get_header(); ?>
  <div class="container">
    <?php
    $this_category = get_category($cat);
    $query_by_cats = $this_category->term_id;
    $thisCat = get_category($query_by_cats)->slug;
    ?>
    <?php
    if($thisCat=="work-with-us"){?>
      <div class="row">
         <div class="filter media-filter">
           <ul>
             <li>Sort View:</li>
             <li>
               <a href="#" data-filter="*">Latest</a>
             </li>
             <li>
               <a href="#" data-filter=".jobs">Jobs</a>
             </li>
             <li>
               <a href="#" data-filter=".tenders">Tenders</a>
             </li>
           </ul>
         </div>
       </div>

    <?php }?>
    <div class="row">
     <div class="article-container filterize">
       <?php
           //get terms (e.g. categories or post tags), then display all posts in each retrieved term
           $taxonomy = 'category';//  e.g. post_tag, category
           $param_type = 'category__in'; //  e.g. tag__in, category__in


           $postsPerPage = 9;

           $args = array(
                   'post_type' => 'post',
                   'posts_per_page' => $postsPerPage,
                   'cat'=>$query_by_cats
           );

           $loop = new WP_Query($args);
        ?>

        <?php
           while ($loop->have_posts()) : $loop->the_post();
           $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
           $outside_link =get_field('external_source_link');
           $the_category = "";
           foreach(get_the_category() as $category) {
             $the_category = $category->cat_name;
           }

       ?>
        <?php if($outside_link == ""){ ?>
          <div class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
           <a href="<?php  the_permalink(); ?>" class="article-full-img <?php if($the_category=="Jobs"){ echo 'article-red'; }else{ echo 'article-blue-light'; } ?>">
             <?php if($featured_image_url !=""){
               ?>
               <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
               <?php } ?>
             <div class="article">
               <div class="category"><?php echo $the_category?></div>
               <div class="date"><?php echo get_the_date('j M Y');?></div>
               <h3><?php the_title(); ?></h3>
               <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
             </div>
           </a>
          </div>
        <?php }else{ ?>
          <div class="col-xs-12 col-lg-3 item <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
           <a href="<?php  echo $outside_link; ?>" target="_blank" class="article-full-img <?php if($the_category=="Jobs"){ echo 'article-red'; }else{echo 'article-blue-light'; }?>">
             <?php if($featured_image_url !=""){
               echo $featured_image_url;
               ?>
               <div class="article-img" style="background-image: url('<?php echo $featured_image_url ?>')"></div>
               <?php } ?>
             <div class="article">
               <div class="category"><?php foreach(get_the_category() as $category) { echo $category->cat_name;} ?></div>
               <div class="date"><?php echo get_the_date('j M Y');?></div>
               <h3><?php the_title(); ?></h3>
               <div class="read-more" >Read More <span class="icon-arrow-right"></span></div>
             </div>
           </a>
          </div>

        <?php } ?>

      <?php endwhile;
       wp_reset_postdata();
       ?>
    </div>
    </div>
    <div class="load-more col-xs-12 btn" data-category="<?php echo $query_by_cats; ?>" data-grid="3" data-post-type="post" data-posts-per-page="<?php echo $postsPerPage ?>">Load more content</div>
  </div>

<?php get_footer(); ?>
