<?php 
$text = get_sub_field('section_image_overlay_text');
$image = get_sub_field('section_image_overlay_image');
if( $image ) {
	$image_size = 'large';
	$image_url = $image['sizes'][ $image_size ];
}
?>

<div class="section-image-overlay">
	<div class="image" <?php if( $image ) { ?> style="background: url(<?php echo $image_url; ?>);" <?php } ?>></div>
	<div class="container">
		<div class="row d-flex align-items-center">
			<div class="col-12 col-lg">
				
			</div>
			<div class="col-12 col-lg-4 pt-5 pt-lg-0 text">
				<?php if( $text ) {
					echo $text;
				} ?>
				<?php if( have_rows('section_image_overlay_button') ): ?>
				<div class="mt-5">
				<?php while ( have_rows('section_image_overlay_button') ) : the_row();
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
			</div>
		</div>
	</div>
</div>