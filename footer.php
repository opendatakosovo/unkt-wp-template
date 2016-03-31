<?php wp_footer(); ?>

	<div class="subscribe subscribe-big">
		<div class="subscribe-label">
			<p>Subscribe for the latest news and updates:</p>
		</div>
		<div class="subscribe-form">

				<?php es_subbox( $namefield = "NO", $desc = "", $group = "Public" ); ?>

			</form>
		</div>
	</div>
	<!-- Root element of PhotoSwipe. Must have class pswp. -->
	<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

	    <!-- Background of PhotoSwipe.
	         It's a separate element, as animating opacity is faster than rgba(). -->
	    <div class="pswp__bg"></div>

	    <!-- Slides wrapper with overflow:hidden. -->
	    <div class="pswp__scroll-wrap">

	        <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
	        <!-- don't modify these 3 pswp__item elements, data is added later on. -->
	        <div class="pswp__container">
	            <div class="pswp__item"></div>
	            <div class="pswp__item"></div>
	            <div class="pswp__item"></div>
	        </div>

	        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
	        <div class="pswp__ui pswp__ui--hidden">

	            <div class="pswp__top-bar">

	                <!--  Controls are self-explanatory. Order can be changed. -->

	                <div class="pswp__counter"></div>

	                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

	                <button class="pswp__button pswp__button--share" title="Share"></button>

	                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

	                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

	                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
	                <!-- element will get class pswp__preloader--active when preloader is running -->
	                <div class="pswp__preloader">
	                    <div class="pswp__preloader__icn">
	                      <div class="pswp__preloader__cut">
	                        <div class="pswp__preloader__donut"></div>
	                      </div>
	                    </div>
	                </div>
	            </div>

	            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
	                <div class="pswp__share-tooltip"></div>
	            </div>

	            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
	            </button>

	            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
	            </button>

	            <div class="pswp__caption">
	                <div class="pswp__caption__center"></div>
	            </div>

	          </div>

	        </div>

	</div>
	<div class="footer">
		<div class="footer-left">
			<div class="unkt">
				<img src="<?php bloginfo('template_url'); ?>/dist/img/unkt_logo_small.svg" alt="UNKT Logo" />
			</div>
			<div class="copyright">
				<p>* All references to Kosovo on this website are made in the context of UN security council resolution 1244 (1999)</p>
				<p>Copyright @ 2016 UNKT<br />All rights reserved ©</p>
			</div>
		</div>
		<div class="footer-right">
			<ul>
				<li>
					<h5>Contact Information</h5>
					<p>UN Development Coordination Office<br />
					United Nations Kosovo Team<br />
					Tel: +381 38 249 066 ext 157</p>
					<p><a href="mailto:nora.sahatciu@one.un.org" target="_blank">nora.sahatciu@one.un.org</a>
				</li>
				<li>
					<ul class="footer-menu">
            <?php
                 $menu_name = 'footer-menu';


                  if ( ($menu = wp_get_nav_menu_object( $menu_name ) ) && ( isset($menu) ) ) {
                   $menu_items = wp_get_nav_menu_items($menu->term_id);

                   foreach ( (array) $menu_items as $key => $menu_item ) {
                     $title = $menu_item->title;
                     $url = $menu_item->url;
                     $menu_list .= '<li><a href="' . $url . '">' . $title . '</a></li>';
                   }


                  } else {

                   $menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
                  }
                  echo $menu_list;
                    ?>

					</ul>
				</li>
				<li>
					<h5>Social Media</h5>
					<ul class="social-media">
						<li>
							<a target="_blank" href="http://www.youtube.com/channel/UCxaw3b7cL_8fE2I4XwQvUgA" class="icon-youtube"></a>
						</li>
						<li>
							<a target="_blank" href="http://www.facebook.com/UNKosovoTeam" class="icon-facebook"></a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>

	<div class="search">
		<div class="search-header">
			<a href="#" class="logo">
				<img src="<?php bloginfo('template_url'); ?>/dist/img/unkt_logo.svg" alt="UNKT Logo" />
			</a>
			<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
			    <input type="text" value="<?php the_search_query(); ?>" placeholder="Search for News, Un Agencies, Publications, Jobs, Tenders, FAQ"  />
			    <input class="icon-search" type="submit" id="searchsubmit" value="Search" />
			</form>

		</div>
		<div class="search-content">
		<!-- <?php $search_query = get_search_query(); ?>
		<!-- <?php var_dump($search_query); ?> --> -->
			<ul>
				<li>
					<div class="category">News</div>
					<div class="date">28 Oct</div>
					<a href="#">
						<h2>Looking in 2 business processes<br /> re-engineering @ UN common<br /> premises</h2>
					</a>
				</li>
				<li>
					<div class="category">Publication</div>
					<div class="date">28 Oct</div>
					<a href="#">
						<h2>Codesign pilot 3rd visit<br /> from KDAK</h2>
					</a>
				</li>
				<li>
					<div class="category">Jobs</div>
					<div class="date">28 Oct</div>
					<a href="#">
						<h2>Project Officer - UNDP Ferm safer<br /> communities</h2>
					</a>
				</li>
				<li>
					<div class="category">News</div>
					<div class="date">28 Oct</div>
					<a href="#">
						<h2>Looking in 2 business processes<br /> re-engineering @ UN common<br /> premises</h2>
					</a>
				</li>
				<li>
					<div class="category">Publication</div>
					<div class="date">28 Oct</div>
					<a href="#">
						<h2>Codesign pilot 3rd visit<br /> from KDAK</h2>
					</a>
				</li>
				<li>
					<div class="category">Jobs</div>
					<div class="date">28 Oct</div>
					<a href="#">
						<h2>Project Officer - UNDP Ferm safer<br /> communities</h2>
					</a>
				</li>
				<li>
					<div class="category">News</div>
					<div class="date">28 Oct</div>
					<a href="#">
						<h2>Looking in 2 business processes<br /> re-engineering @ UN common<br /> premises</h2>
					</a>
				</li>
				<li>
					<div class="category">Publication</div>
					<div class="date">28 Oct</div>
					<a href="#">
						<h2>Codesign pilot 3rd visit<br /> from KDAK</h2>
					</a>
				</li>
				<li>
					<div class="category">Jobs</div>
					<div class="date">28 Oct</div>
					<a href="#">
						<h2>Project Officer - UNDP Ferm safer<br /> communities</h2>
					</a>
				</li>
			</ul>
		</div>
	</div>
</body>
</html>
