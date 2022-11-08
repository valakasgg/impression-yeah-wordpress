<?php get_header();
?>

<p>Proin eget tortor risus. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Sed porttitor lectus nibh. Proin eget tortor risus. Proin eget tortor risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur aliquet quam id dui posuere blandit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Proin eget tortor risus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Sed porttitor lectus nibh. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus nibh.</p>

<div class="container background-white py-5 products">
	<div class="row">
		<div class="col-lg-4">
			<?php echo do_shortcode( '[searchandfilter id="279"]' ); ?>
		</div>
		<div class="col-lg-8">
			<div class="row">
				<?php
				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				$query_args = array(
				'post_type' 	 => "equipment",
				'posts_per_page' => 4,
				'orderby'  		 => 'desc',
				'paged' 		 => $paged,
				);
				$args['search_filter_id'] = 279;
				$the_query = new WP_Query( $query_args );
				if ( $the_query->have_posts() ) {
				?>
					<?php while ( $the_query->have_posts() ) : $the_query->the_post();
						$title = get_the_title();
				        $link = get_permalink();
				        $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'medium' ); ?>
				        <div class="col-lg-3 ">
							<a class="product" href="<?php echo esc_url( $link ); ?>">
								<div class="image" <?php if( $image ) { ?> style="background: url(<?php echo $image; ?>);"<?php } ?>></div>
								<p><?php echo $title; ?></p>
							</a>
						</div>
					<?php endwhile; ?>
				<div class="text-center">
					<?php wp_pagenavi( array( 'query' => $the_query ) ); ?>
				</div>
			    <?php wp_reset_postdata(); ?>
				<?php } ?>
			</div>
		</div>
	</div>
</div>





<?php
get_footer(); ?>