<?php if( have_rows('flexible_content') ):

	while ( have_rows('flexible_content') ) : the_row();

		if( get_row_layout() == 'hero' ):
			get_template_part( 'inc/hero' );

		elseif( get_row_layout() == 'header' ):
			get_template_part( 'inc/header' );

		elseif( get_row_layout() == 'product_header' ):
			get_template_part( 'inc/product_header' );

		elseif( get_row_layout() == 'clients' ):
			get_template_part( 'inc/clients' );

		elseif( get_row_layout() == 'icons' ):
			get_template_part( 'inc/icons' );

		elseif( get_row_layout() == 'section_image_overlay' ):
			get_template_part( 'inc/section_image_overlay' );

		elseif( get_row_layout() == 'instagram' ):
			get_template_part( 'inc/instagram' );

		elseif( get_row_layout() == 'accordions' ):
			get_template_part( 'inc/accordions' );

		elseif( get_row_layout() == 'form' ):
			get_template_part( 'inc/form' );

		elseif( get_row_layout() == 'related_product_categories' ):
			get_template_part( 'inc/related_product_categories' );

		elseif( get_row_layout() == 'related_case_studies' ):
			get_template_part( 'inc/related_case_studies' );

		elseif( get_row_layout() == 'related_products' ):
			get_template_part( 'inc/related_products' );

		elseif( get_row_layout() == 'product_categories' ):
			get_template_part( 'inc/product_categories' );

		endif;

	endwhile;

else :
	// No Content...
endif; ?>
