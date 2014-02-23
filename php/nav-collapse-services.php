<div id="servicesList" class="visible-md visible-lg">
	<?php wp_nav_menu( array( 
		'container' => '',
		'theme_location' => 'sidebar',
		'menu_class' => 'nav nav-list',
		'menu_id' => 'accordian',
		'container_id' => 'accordian',
		'walker' => new Vertical_Nav_Walker(),									
		) );
	?>
</div>
