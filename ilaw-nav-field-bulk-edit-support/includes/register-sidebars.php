<?php

/********************************************************************************************
* register sidebar
*********************************************************************************************/
function _ilaw_rsm_register_sidebars(){
	if(function_exists('register_sidebars')){

		$_ilaw_sm_widget_class = get_field('sm_widget_class','option');
		$_ilaw_sm_title_class = get_field('sm_widget_class','option');
		$_ilaw_sm_title_tag = (get_field('sm_title_tag','option')) ? get_field('sm_title_tag','option') : 'h3';

		register_sidebar(array(
			'name'          => 'Blog Sidebar (iLawyer Sidebar)',
			'id'            => 'sm_blog_sidebar',
			'description'   => 'From the bulk edit bundle plugin',
			'before_widget' => '<div id="%1$s" class="widget %2$s '.$_ilaw_sm_widget_class.'">',
			'after_widget'  => '</div>',
			'before_title'  => '<'.$_ilaw_sm_title_tag.' class="widget-title '.$_ilaw_sm_title_class.'">',
			'after_title'   => '</'.$_ilaw_sm_title_tag.'>'
		));
	
		register_sidebar(array(
			'name'          => 'Default Sidebar (iLawyer Sidebar)',
			'id'            => 'sm_default_sidebar',
			'description'   => 'From the bulk edit bundle plugin',
			'before_widget' => '<div id="%1$s" class="widget %2$s '.$_ilaw_sm_widget_class.'">',
			'after_widget'  => '</div>',
			'before_title'  => '<'.$_ilaw_sm_title_tag.' class="widget-title '.$_ilaw_sm_title_class.'">',
			'after_title'   => '</'.$_ilaw_sm_title_tag.'>'
		));

		//so u dont have to edit the functions anymore everytime a new unique sidebar area is set up :') 
		if (function_exists('have_rows')){ //Check to see if ACF is installed
			if( have_rows('sm_sidebars','option') ){

				//Loop through sidebar fields to generate custom sidebars
				while ( have_rows('sm_sidebars','option') ){ 
					the_row();
					$s_name = get_sub_field( 'name' ); //validated to be unique 
					$s_id = _ilaw_sm_slug_text($s_name);
					
					if($s_id !== '_ilaw_sm_default_sidebar' && $s_id !== '_ilaw_sm_blog_sidebar') {
						register_sidebar( array(
							'name' => $s_name. ' (iLawyer Sidebar)',
							'id' => $s_id,
							'description'   => 'Added through iLawyer Global > Subdirectory Sidebars',
							'before_widget' => '<div id="%1$s" class="widget %2$s '.$_ilaw_sm_widget_class.'">',
							'after_widget'  => '</div>',
							'before_title'  => '<'.$_ilaw_sm_title_tag.' class="widget-title '.$_ilaw_sm_title_class.'">',
							'after_title'   => '</'.$_ilaw_sm_title_tag.'>'
						));
					}else{
						echo 'sidebar name already built in. please remove from theme options';
					}
				};
				
			};
		};
	}
}
add_action( 'widgets_init', '_ilaw_rsm_register_sidebars' );