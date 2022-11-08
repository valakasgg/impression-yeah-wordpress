<div class="product-categories">
	<div class="container">
		<div class="row row-cols-1 row-cols-lg-5">
		<?php
			$terms = get_terms(
				array(
					'taxonomy'   => 'categories',
					'hide_empty' => false,
				)
			);
			if ( ! empty( $terms ) && is_array( $terms ) ) { ?>
				<?php foreach ( $terms as $term ) {
				$title = $term->name;
				$image = get_field('taxonomy_image', $term);
	            if( $image ) {
	                $image_size = 'medium';
	                $image_url = $image['sizes'][ $image_size ];
	            } ?>
				<div class="col pb-5">
					<a class="product-category d-block" href="<?php echo esc_url( get_term_link( $term ) ) ?>">
						<div class="image" <?php if( $image ) { ?> style="background: url(<?php echo $image_url; ?>);" <?php } ?>></div>
						<p><?php echo $term->name; ?></p>
					</a>
				</div>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
</div>