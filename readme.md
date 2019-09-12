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

# Version Updates

*	1.0.1 - update acf-quickedit-fields
*	1.0.0 - it born