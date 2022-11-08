<div class="header background-white">
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
		<div class="row d-flex align-items-center">
			<?php 
			$title = get_the_title();
			$text = wpautop( get_the_content() );
			$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'medium' ); ?>
			<div class="col-12 col-lg-6 mb-5 mb-lg-0">
				<div class="image" <?php if( $image ) { ?> style="background: url(<?php echo $image; ?>);"<?php } ?>></div>
			</div>
			<div class="col-12 col-lg-6">
				<h2 class="pink mb-3"><?php echo $title; ?></h2>
				<?php if( $text ) { ?>
					<?php echo $text; ?>
				<?php } ?>
				<div class="<?php if( $text ) {?>mt-3<?php } ?>">
					<a class="button button--purple" href="#">Enquire Here</a>
				</div>
			</div>
		</div>
	</div>
</div>
