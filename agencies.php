<style>
.image-grayscale{
  -webkit-filter: grayscale(1);
  -webkit-filter: grayscale(100%);
  filter: grayscale(100%);
  filter: url(#greyscale);
  filter: gray;
}
.image-grayscale:hover{
  -webkit-filter: grayscale(0);
  -webkit-filter: grayscale(0%);
  filter: grayscale(0%);
  filter: url("");;
  filter: "";
}
</style>
	<div class="agencies">
		<div class="agencies-top">
			<div class="un">
				<img src="<?php bloginfo('template_url'); ?>/dist/img/un.svg" alt="United Nations" />
				<h3>UN Agencies</h3>
			</div>
			<div class="un-text">
				<h2>The United Nations Kosovo Team (UNKT) is composed of 19 United Nations agencies, funds and programs active in Kosovo.</h2>
			</div>
		</div>
		<div class="agencies-bottom">
			<div class="agencies-list">
				<?php
						$menu_name = 'un_agencies_menu';

						if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
						$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

						$menu_items = wp_get_nav_menu_items($menu->term_id);

						$menu_list = '<ul id="menu-' . $menu_name . '">';

						foreach ( (array) $menu_items as $key => $menu_item ) {
							 $title = $menu_item->title;
							 $url = $menu_item->url;
							 $menu_list .= '<li><a href="' . $url . '">' . $title . '</a></li>';
						}
						$menu_list .= '</ul>';
						} else {
						$menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
						}

						echo $menu_list;
						?>
  		</div>
			<div class="agencies-logos">
				<ul>
					<li>
						<a href="<?php echo get_permalink( get_page_by_path( 'fao' )->ID );?>">
							<img src="<?php bloginfo('template_url'); ?>/dist/img/fao.png" alt="" class="image-grayscale" />
						</a>
					</li>
					<li>
						<a href="<?php echo get_permalink( get_page_by_path( 'un-agencies/ilo' ) );?>">
							<img src="<?php bloginfo('template_url'); ?>/dist/img/ilo.png" alt="" class="image-grayscale" />
						</a>
					</li>
					<li>
						<a href="<?php echo get_permalink( get_page_by_path( 'un-agencies/imf' )->ID );?>">
							<img src="<?php bloginfo('template_url'); ?>/dist/img/imf.png" alt="" class="image-grayscale" />
						</a>
					</li>
					<li>
						<a href="<?php echo get_permalink( get_page_by_path( 'un-agencies/iom' )->ID );?>">
							<img src="<?php bloginfo('template_url'); ?>/dist/img/iom.png" alt="" class="image-grayscale" />
						</a>
					</li>
					<li>
						<a href="<?php echo get_permalink( get_page_by_path( 'un-agencies/ohchr' )->ID );?>">
							<img src="<?php bloginfo('template_url'); ?>/dist/img/ohchr.png" alt="" class="image-grayscale" />
						</a>
					</li>
					<li>
						<a href="<?php echo get_permalink( get_page_by_path( 'un-agencies/undp' )->ID );?>">
							<img src="<?php bloginfo('template_url'); ?>/dist/img/undp.png" alt="" class="image-grayscale" />
						</a>
					</li>
					<li>
						<a href="<?php echo get_permalink( get_page_by_path( 'un-agencies/undss' )->ID );?>">
							<img src="<?php bloginfo('template_url'); ?>/dist/img/undss.png" alt="" class="image-grayscale" />
						</a>
					</li>
					<li>
						<a href="<?php echo get_permalink( get_page_by_path( 'un-agencies/unep' )->ID );?>">
							<img src="<?php bloginfo('template_url'); ?>/dist/img/unep.png" alt="" class="image-grayscale" />
						</a>
					</li>
					<li>
						<a href="<?php echo get_permalink( get_page_by_path( 'un-agencies/unesco' )->ID );?>">
							<img src="<?php bloginfo('template_url'); ?>/dist/img/unesco.png" alt="" class="image-grayscale" />
						</a>
					</li>
					<li>
						<a href="<?php echo get_permalink( get_page_by_path( 'un-agencies/unfpa' )->ID );?>">
							<img src="<?php bloginfo('template_url'); ?>/dist/img/unfpa.png" alt="" class="image-grayscale" />
						</a>
					</li>
					<li>
						<a href="<?php echo get_permalink( get_page_by_path( 'un-agencies/un-habitat' )->ID );?>">
							<img src="<?php bloginfo('template_url'); ?>/dist/img/unhabitat.png" alt="" class="image-grayscale" />
						</a>
					</li>
					<li>
						<a href="<?php echo get_permalink( get_page_by_path( 'un-agencies/unhcr' )->ID );?>">
							<img src="<?php bloginfo('template_url'); ?>/dist/img/unhcr.png" alt="" class="image-grayscale" />
						</a>
					</li>
					<li>
						<a href="<?php echo get_permalink( get_page_by_path( 'un-agencies/unicef' )->ID );?>">
							<img src="<?php bloginfo('template_url'); ?>/dist/img/unicef.png" alt="" class="image-grayscale" />
						</a>
					</li>
					<li>
						<a href="<?php echo get_permalink( get_page_by_path( 'un-agencies/unodc' )->ID );?>">
							<img src="<?php bloginfo('template_url'); ?>/dist/img/unodc.png" alt="" class="image-grayscale" />
						</a>
					</li>
					<li>
						<a href="<?php echo get_permalink( get_page_by_path( 'un-agencies/unops' )->ID );?>">
							<img src="<?php bloginfo('template_url'); ?>/dist/img/unops.png" alt="" class="image-grayscale" />
						</a>
					</li>
					<li>
						<a href="<?php echo get_permalink( get_page_by_path( 'un-agencies/unv' )->ID );?>">
							<img src="<?php bloginfo('template_url'); ?>/dist/img/unv.png" alt="" class="image-grayscale" />
						</a>
					</li>
					<li>
						<a href="<?php echo get_permalink( get_page_by_path( 'un-agencies/un-women' )->ID );?>">
							<img src="<?php bloginfo('template_url'); ?>/dist/img/un-women.png" alt="" class="image-grayscale" />
						</a>
					</li>
					<li>
						<a href="<?php echo get_permalink( get_page_by_path( 'un-agencies/who' )->ID );?>">
							<img src="<?php bloginfo('template_url'); ?>/dist/img/who.png" alt="" class="image-grayscale" />
						</a>
					</li>
					<li>
						<a href="<?php echo get_permalink( get_page_by_path( 'un-agencies/world-bank' )->ID );?>">
							<img src="<?php bloginfo('template_url'); ?>/dist/img/world-bank.png" alt="" class="image-grayscale" />
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>