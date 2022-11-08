<?php
$posts = get_sub_field('related_product');
$related_product_background = get_sub_field('related_product_background');
if( $posts ): ?>
<div class="background-<?php echo $related_product_background; ?>">
	<div class="container title-section">
		<div class="row">
			<h6 class="pink mb-4">Related Products</h6>
		</div>
	</div>
	<div class="container product-section py-5">
		<div class="row related-products">
			<?php foreach( $posts as $post ): 
	        setup_postdata($post);
	        $title = get_the_title();
	        $link = get_permalink();
	        $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'medium' ); ?>
				<a class="related-product" href="<?php echo esc_url( $link ); ?>">
					<div class="image" <?php if( $image ) { ?> style="background: url(<?php echo $image; ?>);"<?php } ?>></div>
					<p><?php echo $title; ?></p>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<?php
wp_reset_postdata();
endif; ?>