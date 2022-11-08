<?php
$posts = get_sub_field('related_case_study');
if( $posts ): ?>
<div class="related-case-studies">
<?php foreach( $posts as $post ): 
    setup_postdata($post);
    $title = get_the_title();
    $link = get_permalink();
    $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'medium' ); ?>
    <div class="related-case-study" <?php if( $image ) { ?> style="background: url(<?php echo $image; ?>);"<?php } ?>>
	    <div class="container">
	        <div class="row">
		    	<div class="col-12 col-lg-8">
		    		<h6 class="mb-0"><?php echo $title; ?></h6>
		    		<h6 class="l-grey"><?php the_date('g/m/Y'); ?></h6>
		    	</div>
		    	<div class="col-12 col-lg-4">
		    		<a href="#" class="button button--purple float-lg-end">View Sase Study</a>
		    	</div>
		    </div>
		</div>
	</div>
<?php endforeach; ?>
</div>
<?php 
wp_reset_postdata(); ?>
<?php endif; ?>