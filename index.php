<?php
		if ( has_post_format( 'gallery' )) {
			  require("single-gallery.php");
			}else {
					require("single-post.php");
			}
?>
<?php get_footer(); ?>
