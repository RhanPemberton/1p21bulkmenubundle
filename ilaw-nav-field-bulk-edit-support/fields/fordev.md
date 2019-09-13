


# NOTES FOR DEV

## Plugin URL sources for updates:

*	ilaw-nav-field-bulk-edit-support: https://github.com/samzabala/1p21bulkmenubundle/tree/master/ilaw-nav-field-bulk-edit-support
*	advanced-custom-fields-nav-menu-field: https://wordpress.org/plugins/advanced-custom-fields-nav-menu-field/
*	acf-quick-edit-fields-master: https://github.com/mcguffin/acf-quick-edit-fields

## How to update plugin:

-	Download directories from the download source urls above.

-	Make sure the updated directory names matches the existing ones

-	Replace the existing directories within this bundle plugin's directory with the updated ones.

-	Remove Plugin header comments on each referrenced files in index.php so it doesnt break the site

	If the plugin no longer has an index.php, you are dead.

-	Update repo because duh


## How to update acf fields:

-	Go to `includes/register-fields.php`

-	Find add_action declaration for `_ilaw_sm_load_acf` and comment out first. the code should look like dis:

	`add_action('acf/init', '_ilaw_sm_load_acf');`

-	go to Admin > Custom Fields > Tools > Import

-	Import the acf pro plugin friendly json file within the ilaw bundle plugin found in ilaw-nav-field-bulk-edit-support/fields/acf-sm-fields.json

	*NOTE: **It is important to comment out the add_action declaration in `includes/register-fields.php`.**  
	The plugin sets up the same field group in the json file to reduce file setup.  
	Admin declared field groups cannot exist the same time with plugin declared ones that share the same field keys, **if not this will cause conflicts or corruption to the site's wordpress database** and the fields will no longer be able to save changes*

	**DO NOT EDIT FIELDS ON A SITE THAT DOES NOT HAVE THE PLUGIN INSTALLED. bundled third party acf plugins add non-native properties to allow bulk edit and implement custom nav menu acf type**

-	Field groups with names 'iLawyer Sidebars Settings' and 'iLawyer Page Sidebar' will be imported. Edit as needed

-	After saving changes go to Admin > Custom Fields > Tools > Export

-	Check the field group edited and click **Generate PHP**

-	Fint `acf_add_local_field_group` and copy the complete array data declared within it

-	Go to ilaw-nav-field-bulk-edit-support/fields/fields.php

-	Paste the array to the appropriate variable declaration

	`$_ilaw_sm_opts_fields` is the declaration for 'iLawyer Sidebars Settings'

	`$_ilaw_sm_page_fields` is the declaration for 'iLawyer Page Sidebar'

	Updating this will update the field groups that the plugin registers for functionalities

-	Move the imported and edited field groups to the trash, then go to trash and Delete Permanently both.

	*NOTE: **It is important to delete the admin declared field groups before the next steps** Admin declared field groups cannot exist the same time with plugin declared ones that share the same field keys, **if not this will cause conflicts or corruption to the site's wordpress database** and the fields will no longer be able to save changes*

-	Save the fields.php file and go to the admin. Refresh that admin

	On refresh, the json file that was used to import the field groups will be updated for future edits

-	Go to `includes/register-fields.php`

-	Find add_action and undo commenting

-	Push to repo because duh