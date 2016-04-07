<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage UNKT
 * @since UNKT 1.0
 */

get_header(); ?>
<?php

while ($loop->have_posts()) : $loop->the_post();
?>


   <div class="content content-article">
     <div class="container-fluid">
       <div class="row">
         <div class="article-wrapper">
           <div class="article-inner">
             <div class="article-sidebar">
             </div>
             <div class="article-content">
               <h1><?php the_title(); ?></h1>
               <?php the_content(); ?>
             </div>
           </div>

           <?php get_sidebar(); ?>
         </div>
       </div>
     </div>
   </div>

<?php endwhile; else: ?>

  <div class="content content-article">
    <div class="container-fluid">
      <div class="row">
        <div class="article-wrapper">
          <div class="article-inner">
            <div class="article-sidebar">
            </div>
            <div class="article-content">
              <h1><?php the_title(); ?></h1>
              <p><?php _e('Sorry, this page does not exist.'); ?></p>
            </div>
          </div>

          <?php get_sidebar(); ?>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php get_footer(); ?>
