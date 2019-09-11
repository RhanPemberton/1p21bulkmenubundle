
<?php

if( is_home() || is_single() || is_archive() ) { 
	dynamic_sidebar( '_1p21_sm_blog_sidebar' );
}else if ( get_field('sidebar_menu') ){ //use same classes as widgets ?>
	<!-- custom -->
	<?php
	
	 
	$_1p21_sm_widget_class = get_field('_1p21_sm_widget_class','option');
	$_1p21_sm_title_class = get_field('_1p21_sm_widget_class','option');
	$_1p21_sm_title_tag = (get_field('_1p21_sm_title_tag','option')) ? get_field('_1p21_sm_title_tag','option') : 'h3';
	?>
	<div class="widget acf-custom-menu <?=$_1p21_sm_widget_class; ?>">
		<<?=$_1p21_sm_title_tag; ?> class="widget-title <?=$_1p21_sm_title_class; ?>">
			<?php if(get_field('sidebar_menu_title')){
				the_field('sidebar_menu_title');
			}else{
				echo 'Practice Areas';
			} ?>
		</<?=$_1p21_sm_title_tag; ?>>

		<?php
			wp_nav_menu(array(
				'menu' => get_field('sidebar_menu'),
				'container' => 'ul',
				'depth' => 2
			));
		?>
	</div>
	<?php
}else {
	if(have_rows('sidebars','option')){
		$no_sidebar_yet = true;

		while(have_rows('sidebars','option')): the_row();
			if(get_sub_field('page') && _1p21_sm_is_descendant_of(get_sub_field('page')) &&  $no_sidebar_yet){
				
				echo '<!-- ancestor default -->';
				dynamic_sidebar( _1p21_sm_slug_text( get_sub_field( 'sidebar_name' ) ) );
				$no_sidebar_yet = false;
				break;
			
			}elseif( have_rows('pages') &&  $no_sidebar_yet) {
				$ilaw_template_sidebar = get_sub_field( 'sidebar_name' );
				while( have_rows('pages') ):
					if(_1p21_sm_is_descendant_of(get_sub_field('page')) && $no_sidebar_yet){
						echo '<!-- ancestor default : multiple -->';
						dynamic_sidebar( _1p21_sm_slug_text( $ilaw_template_sidebar ) );
						$no_sidebar_yet = false;
						break;
					}
				endwhile;
			}
		endwhile;
		

		
		
		if($no_sidebar_yet){
			echo '<!-- no ancestral sidebar -->';
			dynamic_sidebar( '_1p21_sm_default_sidebar' );
			// break;
		}

	}else{
		echo '<!--  default -->';
		dynamic_sidebar( '_1p21_sm_default_sidebar' );
	}
};