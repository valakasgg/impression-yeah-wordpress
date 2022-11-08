<?php
$text = get_sub_field('icons_text');
if( have_rows('icon') ):
?>
<div class="icons">
	<div class="container">
		<div class="row d-flex align-items-center">
			<?php if( $text ) { ?>
			<div class="col-12 col-lg-4">
				<?php echo $text; ?>
			</div>
			<?php } ?>
			<div class="col-12 offset-lg-1 col-lg">
				<div class="row">
				<?php while ( have_rows('icon') ) : the_row();
				$icon = get_sub_field('icon');
				$text = get_sub_field('text'); ?>
					<div class="col-12 col-lg m-3 icon text-center">
						<?php if( $icon ) { ?>
						<div class="fa-icon"><?php echo $icon; ?></div>
						<?php } ?>
						<?php if( $text ) { ?>
						<h6><?php echo $text; ?></h6>
						<?php } ?>
					</div>
				<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>