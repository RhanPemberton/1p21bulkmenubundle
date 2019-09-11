# Documentation

## Plugin URL sources for updates:

*	ilaw-nav-field-bulk-edit-support : 
*	advanced-custom-fields-nav-menu-field: https://wordpress.org/plugins/advanced-custom-fields-nav-menu-field/
*	acf-quick-edit-fields-master: https://github.com/mcguffin/acf-quick-edit-fields

## How to update:

DO NOT EDIT THE CODE OF THE PLUGINS ITSELF (with the exception of ilaw-nav-field-bulk-edit-support). YOUR CHANGES WILL BE OVERRIDEN BY UPDATES
1.	Download directories from the download source urls above.
2.	Make sure the updated directory names matches the existing ones
3.	Replace the existing directories within this bundle plugin's directory with the updated ones.
4.	Remove Plugin header comments on each referenced files in index.php so it doesnt break the site

## Functionalities

*	sets up a widget area for a default sidebar (for pages)
*	sets up a blog sidebar (for blog pages), parent page sidebars that will be inherited 
*	to generate sidebar call on the function `get_bulk_sidebar()`
	
	Example:

	```
	<aside>
		<?php get_bulk_sidebar(); ?>
	</aside>
	```