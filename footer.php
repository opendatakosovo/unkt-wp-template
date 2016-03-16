<?php wp_footer(); ?>

	<div class="subscribe subscribe-big">
		<div class="subscribe-label">
			<p>Subscribe for the latest news and updates:</p>
		</div>
		<div class="subscribe-form">
			<form name="subscribe-big" method="post" action="">
				<input type="text" placeholder="your@email.here" />
				<button type="submit" class="icon-arrow-right"></button>
			</form>
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
							<a href="#" class="icon-twitter"></a>
						</li>
						<li>
							<a href="#" class="icon-youtube"></a>
						</li>
						<li>
							<a href="#" class="icon-instagram"></a>
						</li>
						<li>
							<a href="#" class="icon-facebook"></a>
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
			<form>
				<button type="submit" class="icon-search"></button>
				<input type="text" placeholder="Search for News, Un Agencies, Publications, Jobs, Tenders, FAQ" />
			</form>
		</div>
		<div class="search-content">
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
