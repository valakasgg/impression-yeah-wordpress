<?php 
$text = get_sub_field('hero_text');
$image = get_sub_field('hero_image');
if( $image ) {
	$image_size = 'large';
	$image_url = $image['sizes'][ $image_size ];
}
$video = get_sub_field('hero_video');
if( have_rows('hero_video') ):
	while ( have_rows('hero_video') ) : the_row();
		$mp4 = get_sub_field('mp4');
		if( $mp4 ) {
			$mp4_url = $mp4['url'];
		}
		$ogg = get_sub_field('ogg');
		if( $ogg ) {
			$ogg_url = $ogg['url'];
		}
		$webm = get_sub_field('webm');
		if( $webm ) {
			$webm_url = $webm['url'];
		}
	endwhile;
endif;
$overlay = get_sub_field('hero_overlay');
?>

<div class="hero">
	<div class="overlay d-<?php echo $overlay; ?>"></div>
	<?php if( get_sub_field('hero_background') == 'image' ) { ?>
	<div class="image" <?php if( $image ) { ?> style="background: url(<?php echo $image_url; ?>);" <?php } ?>></div>
	<?php } ?>
	<?php if( get_sub_field('hero_background') == 'video' ) { ?>
		<?php if( $video ) { ?>
		<div class="video">
			<video class="header-video" width="100%" loop="true" autoplay="autoplay" muted="false" playsinline>
			<?php if( $mp4 ) { ?>
				<source src="<?php echo $mp4_url; ?>" type="video/mp4">
			<?php } ?>
			<?php if( $ogg ) { ?>
				<source src="<?php echo $ogg_url; ?>" type="video/ogg">
			<?php } ?>
			<?php if( $webm ) { ?>
				<source src="<?php echo $webm_url; ?>" type="video/webm">
			<?php } ?>
			</video>
		</div>
		<?php } ?>
	<?php } ?>
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

			<div class="col-12 col-lg-4">
			<?php if( $text ) {
				echo $text;
			} ?>

			<?php if( have_rows('hero_button') ): ?>
				<div class="mt-5">
				<?php while ( have_rows('hero_button') ) : the_row();
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
			<?php if( $post->ID == 19) : ?>
				<div class="contact">
				<?php
				$phone = get_field('phone', 'option');
				if( $phone ) {
					$phone_url = $phone['url'];
					$phone_title = $phone['title'];
					$phone_target = $phone['target'] ? $phone['target'] : '_self';
				?>
					<p class="title">Call Us</p>
					<h3><a href="<?php echo esc_url( $phone_url ); ?>" target="<?php echo esc_attr( $phone_target ); ?>">
						<?php echo esc_html( $phone_title ); ?>
					</a></h3>
				<?php } ?>

				<?php
				$address = get_field('address', 'option', true, true);
				if( $address ) {
				?>
					<div class="mt-5">
						<p class="title">Head Office</p>
						<?php echo $address; ?>
					</div>
				<?php } ?>

				<?php
				if( have_rows('social_icon', 'option') ): ?>
					<div class="mt-5">
						<?php while ( have_rows('social_icon', 'option') ) : the_row();
						$icon = get_sub_field('icon');
						$link = get_sub_field('link');
						if( $link ) {
							$link_url = $link['url'];
						} ?>
						<a class="icon" href="<?php echo esc_url( $link_url ); ?>" target="_blank"><?php echo $icon; ?></a>
						<?php endwhile; ?>
					</div>
				<?php endif;
				?>
				</div>
			<?php endif; ?>
			</div>
			<?php if( get_sub_field('hero_content') == 'post' ) { ?>
			<div class="col-12 offset-lg-1 col-lg-6">
				<?php
				$posts = get_sub_field('hero_post');
				if( $posts ): ?>
				    <div class="row posts mt-5 mt-lg-0">
				    <?php foreach( $posts as $post ): 
				        setup_postdata($post);
				        $title = get_the_title();
				        $link = get_permalink();
				        $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'medium' ); ?>
			        	<a class="col-lg post m-3" href="<?php echo esc_url( $link ); ?>">
			        		<div class="background" <?php if( $image ) { ?> style="background: url(<?php echo $image; ?>); <?php } ?>"></div>
			        		<h6><?php echo $title; ?></h6>
			        	</a>
				    <?php endforeach; ?>
				    </div>
				    <?php 
				    wp_reset_postdata(); ?>
				<?php endif; ?>
			</div>
			<?php } ?>

			<?php if( get_sub_field('hero_content') == 'post_type' ) { ?>
			<div class="col-12 col-lg-8">
				<?php
				$post_type = get_sub_field('hero_post_type');
				$query_args = array(
				'post_type' 	 => $post_type,
				'posts_per_page' => -1,
				'orderby'  		 => 'desc',
				);
				$the_query = new WP_Query( $query_args );
				if ( $the_query->have_posts() ) {
				?>
				<div class="row posts mt-5 mt-lg-0">
					<?php while ( $the_query->have_posts() ) : $the_query->the_post();
					$title = get_the_title();
					$content = wp_trim_words( get_the_content(), 12, '...' );
					$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'medium' );
					$link = get_permalink(); ?>
					<a class="col-lg post-type m-3" href="<?php echo esc_url( $link ); ?>">
		        		<div class="background" <?php if( $image ) { ?> style="background: url(<?php echo $image; ?>); <?php } ?>"></div>
		        		<h6><?php echo $title; ?></h6>
			        	<p><?php echo $content; ?></p>
			        	<p class="link">More Info</p>
		        	</a>
					<?php endwhile; ?>
				</div>
			    <?php wp_reset_postdata(); ?>
				<?php } ?>
			</div>
			<?php } ?>

			<?php if( get_sub_field('hero_content') == 'form' ) { ?>
				<div class="col-12 offset-lg-1 col-lg-6">
				<?php
				$form = get_sub_field('hero_form');
				if( $form ) {
				    $form_id = $form->ID;
				}
				echo apply_shortcodes( '[contact-form-7 id="'.$form_id.'"]' );
				?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>