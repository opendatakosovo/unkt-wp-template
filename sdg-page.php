<?php /* Template Name: SDG PAGE */ ?>

<?php get_header(); ?>

 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

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

            <div class="sidebar">
              <div class="row">
                <div class="col-md-12">
                    <a target="_blank" href="http://www.un.org/sustainabledevelopment/sustainable-development-goals/"><img class="sdg-img " src="<?php bloginfo('template_url'); ?>/dist/img/sdg/E_SDG_Icons-18.jpg"/></a>

                </div>
                <div class="col-md-6">
                  <a target="_blank" href="http://www.un.org/sustainabledevelopment/poverty/"><img class="sdg-img " src="<?php bloginfo('template_url'); ?>/dist/img/sdg/E_SDG_Icons-01.jpg"/></a>
                </div>
                <div class="col-md-6">
                  <a target="_blank" href="http://www.un.org/sustainabledevelopment/hunger/"><img class="sdg-img " src="<?php bloginfo('template_url'); ?>/dist/img/sdg/E_SDG_Icons-02.jpg"/></a>
                </div>
                <div class="col-md-6">
                  <a target="_blank" href="http://www.un.org/sustainabledevelopment/health/"><img class="sdg-img " src="<?php bloginfo('template_url'); ?>/dist/img/sdg/E_SDG_Icons-03.jpg"/></a>
                </div>
                <div class="col-md-6">
                  <a target="_blank" href="http://www.un.org/sustainabledevelopment/education/"><img class="sdg-img " src="<?php bloginfo('template_url'); ?>/dist/img/sdg/E_SDG_Icons-04.jpg"/></a>
                </div>
                <div class="col-md-6">
                  <a target="_blank" href="http://www.un.org/sustainabledevelopment/gender-equality/"><img class="sdg-img " src="<?php bloginfo('template_url'); ?>/dist/img/sdg/E_SDG_Icons-05.jpg"/></a>
                </div>
                <div class="col-md-6">
                  <a target="_blank" href="http://www.un.org/sustainabledevelopment/water-and-sanitation/"><img class="sdg-img " src="<?php bloginfo('template_url'); ?>/dist/img/sdg/E_SDG_Icons-06.jpg"/></a>
                </div>
                <div class="col-md-6">
                  <a target="_blank" href="http://www.un.org/sustainabledevelopment/energy/"><img class="sdg-img " src="<?php bloginfo('template_url'); ?>/dist/img/sdg/E_SDG_Icons-07.jpg"/></a>
                </div>
                <div class="col-md-6">
                  <a target="_blank" href="http://www.un.org/sustainabledevelopment/economic-growth/"><img class="sdg-img " src="<?php bloginfo('template_url'); ?>/dist/img/sdg/E_SDG_Icons-08.jpg"/></a>
                </div>
                <div class="col-md-6">
                  <a target="_blank" href="http://www.un.org/sustainabledevelopment/infrastructure-industrialization/"><img class="sdg-img " src="<?php bloginfo('template_url'); ?>/dist/img/sdg/E_SDG_Icons-09.jpg"/></a>
                </div>
                <div class="col-md-6">
                  <a target="_blank" href="http://www.un.org/sustainabledevelopment/inequality/"><img class="sdg-img " src="<?php bloginfo('template_url'); ?>/dist/img/sdg/E_SDG_Icons-10.jpg"/></a>
                </div>
                <div class="col-md-6">
                  <a target="_blank" href="http://www.un.org/sustainabledevelopment/cities/"><img class="sdg-img " src="<?php bloginfo('template_url'); ?>/dist/img/sdg/E_SDG_Icons-11.jpg"/></a>
                </div>
                <div class="col-md-6">
                  <a target="_blank" href="http://www.un.org/sustainabledevelopment/sustainable-consumption-production/"><img class="sdg-img " src="<?php bloginfo('template_url'); ?>/dist/img/sdg/E_SDG_Icons-12.jpg"/></a>
                </div>
                <div class="col-md-6">
                  <a target="_blank" href="http://www.un.org/sustainabledevelopment/climate-change-2/"><img class="sdg-img " src="<?php bloginfo('template_url'); ?>/dist/img/sdg/E_SDG_Icons-13.jpg"/></a>
                </div>
                <div class="col-md-6">
                  <a target="_blank" href="http://www.un.org/sustainabledevelopment/oceans/"><img class="sdg-img " src="<?php bloginfo('template_url'); ?>/dist/img/sdg/E_SDG_Icons-14.jpg"/></a>
                </div>
                <div class="col-md-6">
                  <a target="_blank" href="http://www.un.org/sustainabledevelopment/biodiversity/"><img class="sdg-img " src="<?php bloginfo('template_url'); ?>/dist/img/sdg/E_SDG_Icons-15.jpg"/></a>
                </div>
                <div class="col-md-6">
                  <a target="_blank" href="http://www.un.org/sustainabledevelopment/peace-justice/"><img class="sdg-img " src="<?php bloginfo('template_url'); ?>/dist/img/sdg/E_SDG_Icons-16.jpg"/></a>
                </div>
                <div class="col-md-6">
                  <a target="_blank" href="http://www.un.org/sustainabledevelopment/globalpartnerships/"><img class="sdg-img " src="<?php bloginfo('template_url'); ?>/dist/img/sdg/E_SDG_Icons-17.jpg"/></a>
                </div>

              </div>

            </div>
          </div>
   			</div>
   		</div>
   	</div>

 <?php endwhile; else: ?>
   <p><?php _e('Sorry, this page does not exist.'); ?></p>
 <?php endif; ?>


<?php get_footer(); ?>
