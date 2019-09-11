<?php

/********************************************************************************************
* register sidebar
*********************************************************************************************/

 if(function_exists('register_sidebars')){

	$_1p21_sm_widget_class = get_field('_1p21_sm_widget_class','option');
	$_1p21_sm_title_class = get_field('_1p21_sm_widget_class','option');
	$_1p21_sm_title_tag = (get_field('_1p21_sm_title_tag','option')) ? get_field('_1p21_sm_title_tag','option') : 'h3';

	register_sidebar(array(
		'name'          => 'Blog Sidebar',
		'id'            => '_1p21_sm_blog_sidebar',
		'description'   => 'From the bulk edit bundle plugin',
		'before_widget' => '<div id="%1$s" class="widget %2$s  '.$_1p21_sm_widget_class.'">',
		'after_widget'  => '</div>',
		'before_title'  => '<'.$_1p21_sm_title_tag.' class="widget-title '.$_1p21_sm_title_class.'">',
		'after_title'   => '</'.$_1p21_sm_title_tag.'>'
	));
  
	register_sidebar(array(
		'name'          => 'Default Sidebar',
		'id'            => '_1p21_sm_default_sidebar',
		'description'   => 'From the bulk edit bundle plugin',
		'before_widget' => '<div id="%1$s" class="widget %2$s  '.$_1p21_sm_widget_class.'">',
		'after_widget'  => '</div>',
		'before_title'  => '<'.$_1p21_sm_title_tag.' class="widget-title '.$_1p21_sm_title_class.'">',
		'after_title'   => '</'.$_1p21_sm_title_tag.'>'
	));

	//so u dont have to edit the functions anymore everytime a new unique sidebar area is set up :') 
	if (function_exists('have_rows')){ //Check to see if ACF is installed
		if (have_rows('sidebars','option')){
			while (have_rows('sidebars','option')){ //Loop through sidebar fields to generate custom sidebars
				the_row();
				$s_name = get_sub_field( 'sidebar_name', 'option' ); //validated to be unique by  validate_sidebar_name()
				$s_id = _1p21_sm_slug_text($s_name);
				
				if($s_id !== 'default_sidebar' && $s_id !== 'blog_sidebar') {
					register_sidebar( array(
						'name' => $s_name,
						'id' => $s_id,
						'description'   => 'Added through Theme Options > Sidebars',
						'before_widget' => '<div id="%1$s" class="widget widget-link-list %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<h3 class="widget-title widget-toggle fancy-block-title cf">',
						'after_title'   => '</h3>'
					));
				}else{
					echo 'sidebar name already built in. please remove from theme options';
				}
			};
		};
	};
}