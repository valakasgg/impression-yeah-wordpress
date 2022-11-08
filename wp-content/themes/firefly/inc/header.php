<?php if( have_rows('header_column') ): ?>
<div class="header">
	<?php if ( is_front_page() ) {
	} else {
		if ( function_exists('yoast_breadcrumb') ) : ?>
			<div class="container breadcrumbs">
				<div class="row">
					<div class="clearfix">
						<p class="float-lg-end"><?php yoast_breadcrumb(); ?> | <a href="javascript:history.back()"><span class="back">Go Back</span></a></p>
					</div>
				</div>
			</div>
		<?php endif;
	} ?>
	<div class="container">
		<div class="row d-flex align-items-end">
		<?php while ( have_rows('header_column') ) : the_row();
			$width = get_sub_field('width');
			$button_align = get_sub_field('button_align');
			$sort_align = get_sub_field('sort_align');
			$align = get_sub_field('content_align');
			$text = get_sub_field('text');
			$search = get_sub_field('search'); ?>
			<div class="col-12 <?php echo $width; ?>">
				<?php if( get_sub_field('content') == 'text' ) { ?>
					<?php if( $text ) {
						echo $text;
					} ?>
					<?php if( have_rows('button') ): ?>
						<div class="<?php if( $text ) {?>mt-5<?php } ?> <?php echo $button_align; ?>">
						<?php while ( have_rows('button') ) : the_row();
						$link = get_sub_field('link');
						if( $link ) {
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
						}
						$style = get_sub_field('style'); ?>
						<a class="button button--<?php echo $style; ?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
							<?php echo esc_html( $link_title ); ?>
						</a>
						<?php endwhile; ?>
						</div>
					<?php endif; ?>
				<?php } ?>

				<?php if( get_sub_field('content') == 'image' ) { ?>
					<p>Image</p>
				<?php } ?>

				<?php if( get_sub_field('content') == 'search' ) {
					if( $search ) {
						echo $search;
					}
				} ?>

				<?php if( get_sub_field('content') == 'sort' ) { ?>
					<p class="<?php echo $sort_align; ?>">Sort</p>
				<?php } ?>
			</div>
		<?php endwhile; ?>
		</div>
	</div>
</div>
<?php endif; ?>