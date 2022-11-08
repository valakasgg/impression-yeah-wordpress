<?php
$form = get_sub_field('form');
if( $form ) {
    $form_id = $form->ID;
} ?>
<div class="container py-5">
	<div class="row form">
		<div class="col-12">
		<?php echo apply_shortcodes( '[contact-form-7 id="'.$form_id.'"]' ); ?>
		</div>
	</div>
</div>