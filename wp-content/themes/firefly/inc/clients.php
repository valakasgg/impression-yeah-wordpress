<?php
if( have_rows('client', 'option') ): ?>
	<div class="background-white py-4">
		<div class="container">
			<div class="row d-flex align-items-center">
			<?php while ( have_rows('client', 'option') ) : the_row();
			$logo = get_sub_field('logo', 'option');
			if( $logo ) {
				$logo_url = $logo['sizes']['medium'];
				$logo_alt = $logo['alt']; } ?>
				<div class="col-4 col-lg text-center">
					<img class="mw-100 p-2" src="<?php echo $logo_url; ?>" alt="<?php echo $logo_alt; ?>">
				</div>
			<?php endwhile; ?>
			</div>
		</div>
	</div>
<?php endif;
?>