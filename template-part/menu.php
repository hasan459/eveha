	<div class="menu-wrap">
		<nav class="menu">

			<input type="checkbox" id="check">
			<label for="check" class="checkbtn">
				<i class="fas fa-bars"></i>
			</label>
			

			<?php 
				wp_nav_menu(
					array(
						'theme_location' => 'Main-menu',
						'container_class' => 	'menu',
						'items_wrap' => '<ul class="main-menu">%3$s</ul>'
					)
				);
			?>
		</nav>
	</div>