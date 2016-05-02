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
					<h5>Socialize</h5>
					<ul class="social-media">
						<li>
							<a target="_blank" href="http://www.youtube.com/channel/UCxaw3b7cL_8fE2I4XwQvUgA" class="icon-youtube"></a>
						</li>
						<li>
							<a target="_blank" href="http://www.facebook.com/UNKosovoTeam" class="icon-facebook"></a>
						</li>
						<li>
							<a target="_blank" href="https://twitter.com/unkosovoteam" class="icon-twitter"></a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="search">
		<div class="search-header">

			<?php get_search_form(); ?>

		</div	>
		<div class="search-content">

		</div>
	</div>
</body>
</html>
