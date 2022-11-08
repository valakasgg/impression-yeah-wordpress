<?php wp_footer(); ?>

</body>

<footer id="footer">
	<div class="contact">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-12 col-lg d-none d-lg-block">
					<div class="center-text">
						<h4><span class="pink">Get In</span> Touch</h4>
					</div>
				</div>
				<?php
				$address = get_field('address', 'option', true, true);
				if( $address ) {
				?>
				<div class="col-12 col-lg my-4 text-center text-lg-start mb-lg-0">
					<div class="center-text">
						<p class="title">Head Office</p>
						<?php echo $address; ?>
					</div>
				</div>
				<?php } ?>
				<?php
				$phone = get_field('phone', 'option');
				if( $phone ) {
					$phone_url = $phone['url'];
					$phone_title = $phone['title'];
					$phone_target = $phone['target'] ? $phone['target'] : '_self';
				?>
				<div class="col-12 col-lg my-4 text-center text-lg-start mb-lg-0">
					<div class="center-text">
						<p class="title">Call Us</p>
						<h3><a href="<?php echo esc_url( $phone_url ); ?>" target="<?php echo esc_attr( $phone_target ); ?>">
							<?php echo esc_html( $phone_title ); ?>
						</a></h3>
					</div>
				</div>
				<?php } ?>
				<?php
				if( have_rows('social_icon', 'option') ): ?>
					<div class="col-12 col-lg my-4 text-center text-lg-start mb-lg-0">
						<div class="center-text">
						<?php while ( have_rows('social_icon', 'option') ) : the_row();
						$icon = get_sub_field('icon');
						$link = get_sub_field('link');
						if( $link ) {
							$link_url = $link['url'];
						} ?>
							<a class="icon" href="<?php echo esc_url( $link_url ); ?>" target="_blank"><?php echo $icon; ?></a>
						<?php endwhile; ?>
						</div>
					</div>
				<?php endif;
				?>
				</div>
			</div>
		</div>
	</div>
	<nav>
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-12">
					<?php
					wp_nav_menu(array(
						'theme_location'	=> 'footer-menu'
					));
					?>
					<?php if( get_field('footer_text', 'option') ):
						the_field('footer_text', 'option');
					endif; ?>
				</div>
				<div class="col-12 mt-4 text-center">
					<p>Website by <a href="https://northernmediauk.com/" target="_blank">Northern Meida</a></p>
				</div>
			</div>
		</div>
	</nav>
</footer>

<?php
if( have_rows('social_icon', 'option') ): ?>
	<div class="social-icons">
		<a href="#" target="_blank"><i class="fa-solid fa-comment"></i></a>
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

</html>
