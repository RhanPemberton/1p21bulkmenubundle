
<?php

// Check for blog first
if( is_home() || is_single() || is_archive() ) { 
	dynamic_sidebar( 'sm_blog_sidebar' );

//check for page's own custom sidebar menu first
}else if ( get_field('sm_custom_menu') ){ //use same classes as widgets ?>

	<?php
	$_ilaw_sm_widget_class = get_field('sm_widget_class','option');
	$_ilaw_sm_title_class = get_field('sm_widget_class','option');
	$_ilaw_sm_title_tag = (get_field('sm_title_tag','option')) ? get_field('sm_title_tag','option') : 'h3';
	?>

		<!-- custom sidebar -->
		<div class="widget acf-custom-menu <?=$_ilaw_sm_widget_class; ?>">
			<<?=$_ilaw_sm_title_tag; ?> class="widget-title <?=$_ilaw_sm_title_class; ?>">
				<?php if(get_sub_field('sm_custom_title')){
					the_sub_field('sm_custom_title');
				}else{
					the_field('sm_default_title','option');
				} ?>
			</<?=$_ilaw_sm_title_tag; ?>>

			<?php
				wp_nav_menu(array(
					'menu' => get_sub_field('sm_custom_menu'),
					'container' => 'ul',
					'depth' => get_field('sm_depth','option')
				));
			?>
		</div>
	<?php
}else if( have_rows('sm_sidebars','option') ){

	//to check if there was a sidebar for the page from an ancestor
	$no_sidebar_yet = true;

	while( have_rows('sm_sidebars','option') ): the_row();

	$ilaw_template_sidebar = get_sub_field( 'name' );

		if(have_rows('pages')): 
			while(have_rows('pages')):
				the_row();

				if( get_sub_field('page') && is_descendant_of(get_sub_field('page')) &&  $no_sidebar_yet ){
					echo '<!-- ancestor default: '.$ilaw_template_sidebar.' -->';
					echo ilaw_id_friendly_text( $ilaw_template_sidebar );
					dynamic_sidebar( ilaw_id_friendly_text( $ilaw_template_sidebar ) );
					$no_sidebar_yet = false;
					break;
				}
			endwhile;
		endif;
	endwhile;
	

	
	// if it didnt  get any ancestral sidebars just put the defaul boi
	if($no_sidebar_yet){
		echo '<!-- no ancestral default sidebar -->';
		dynamic_sidebar( 'sm_default_sidebar' );
		// break;
	}

}else{
	echo '<!--  default sidebar -->';
	dynamic_sidebar( 'sm_default_sidebar' );
}