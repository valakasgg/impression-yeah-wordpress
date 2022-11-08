<?php
$accordion_background = get_sub_field('accordion_background');
if( have_rows('accordion') ): ?>
<div class="accordions background-<?php echo $accordion_background; ?>">
	<div class="container">
		<?php while ( have_rows('accordion') ) : the_row();
		$title = get_sub_field('title');
		$text = get_sub_field('text'); ?>
		<div class="accordion-item">
			<div class="accordion-header" id="heading<?php echo get_row_index(); ?>">
				<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo get_row_index(); ?>" aria-expanded="true" aria-controls="collapse<?php echo get_row_index(); ?>">
					<h6><?php echo $title; ?></h6>
				</button>
			</div>
			<div id="collapse<?php echo get_row_index(); ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo get_row_index(); ?>">
				<div class="accordion-body py-4">
					<p><?php echo $text; ?></p>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
	</div>
</div>
<?php endif; ?>


