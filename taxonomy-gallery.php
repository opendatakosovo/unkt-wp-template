<?php get_header(); ?>

<div class="content">
    <ul class="photogal">

    <?php
        //setup new WP_Query
        $wp_query = new WP_Query(
            array(
                'posts_per_page'    =>    -1,
                'post_type'            =>    'gallery'
            )
        );

        //begine loop
        while ($wp_query->have_posts()) : $wp_query->the_post();
    ?>

    <li class="element <?php if( function_exists('jss_taxonomy_name')){ jss_taxonomy_name(); }?>">
            <a class="fancybox" rel="<?php if( function_exists('jss_taxonomy_name')){ jss_taxonomy_name(); }?>"
            href="
                <?php
                    //get post thumbnail id
                    $image_id = get_post_thumbnail_id();
                    //go get image attributes [0] => url, [1] => width, [2] => height
                    $image_url = wp_get_attachment_image_src($image_id,'', true);
                    //echo out the url
                    echo $image_url[0];  ?>
            ">
                <?php the_post_thumbnail('album-grid'); //display custom thumbnail size ?>
            </a>
    </li><!--end li-->

<?php endwhile; // end of the loop. ?>
</ul><!--end photogallery-->

</div><!--end content-->

<?php get_footer(); ?>
