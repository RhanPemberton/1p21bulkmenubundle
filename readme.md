# Documentation

## Functionalities
*	Bundle installs [ACF Nav menu fields](https://wordpress.org/plugins/advanced-custom-fields-nav-menu-field/) and [Quick Edit Fields](https://wordpress.org/plugins/acf-quickedit-fields/)
*	sets up a widget area for a default sidebar (for pages)
*	sets up a blog sidebar (for blog pages)
*	sets up parent page sidebars that will be inherited by descendants
*	adds ability to set a custom menu to each page via admin bulk edit or edit page

## How to install (the simple way)

1.	Install this boi (Note: Make sure ACF QuickEdit Fields and 	
Advanced Custom Fields: Nav Menu Field is not installed)
2.	go to *Admin > iLawyer Sidebar Settings > Subdirectory Sidebars* and setup appropriate subdirectory sidebars
3.	go to *Admin > Appearance > Widgets* and setup or migrate contents of blog and default sidebars into the ilawyer setup sidebars
4.	Open index.php or theme template(s) that utilize sidebars in a text editor and remove all `dynamic_sidebar()` declarations and place `bulk_sidebar()`.


## Render sidebar

To generate sidebar call on the function `bulk_sidebar()`

This function calls on a template that goes through all possible sidebars implemented through this plugin
	
Example:

```
<aside>
	<?php bulk_sidebar(); ?>
</aside>
```

In case the sidebar needs to be customized, the function calls on a boiler template: [ilaw-nav-field-bulk-edit-support/template/sidebar.php](ilaw-nav-field-bulk-edit-support/template/sidebar.php) which can be copied into your theme instead of using the function

# Version Updates
*	2.0.0 	- easier set up and stuff
*	1.0.1 	- update acf-quickedit-fields
*	1.0.0 	- it born