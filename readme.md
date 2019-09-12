# Documentation




## Functionalities

*	sets up a widget area for a default sidebar (for pages)
*	sets up a blog sidebar (for blog pages)
*	sets up parent page sidebars that will be inherited by descendants
*	adds ability to set a custom menu to each page via admin bulk edit or edit page

## How to install

1.	Install this boi
2.	Open theme template(s) in a text editor and replace `get_sidebar()` with `get_bulk_sidebar()`


## Render sidebar

To generate sidebar call on the function `get_bulk_sidebar()`

This function calls on a template that goes through all possible sidebars
	
Example:

```
<aside>
	<?php get_bulk_sidebar(); ?>
</aside>
```


# NOTES FOR DEV

## Plugin URL sources for updates:

*	ilaw-nav-field-bulk-edit-support: https://github.com/samzabala/1p21bulkmenubundle/tree/master/ilaw-nav-field-bulk-edit-support
*	advanced-custom-fields-nav-menu-field: https://wordpress.org/plugins/advanced-custom-fields-nav-menu-field/
*	acf-quick-edit-fields-master: https://github.com/mcguffin/acf-quick-edit-fields

## How to update plugin:

1.	Download directories from the download source urls above.
2.	Make sure the updated directory names matches the existing ones
3.	Replace the existing directories within this bundle plugin's directory with the updated ones.
4.	Remove Plugin header comments on each referenced files in index.php so it doesnt break the site
5.	Update repo because duh


## How to update acf fields:

Too complicated. need a flowchart


