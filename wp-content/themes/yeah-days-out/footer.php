</div>

<!-- <div class="fixedCTA">
	<a href="<?php //the_permalink(21); 
				?>">Get Started</a>
</div> -->

<?php
global $post;
// footer Colour
$footerBG     	= get_field('footer_bg', 'option');
$footerLogo 	= get_field('footer_logo', 'option');
$phone 			= get_field('phone', 'option');
$email 			= get_field('email', 'option');
?>

<footer id="footer" class="" style="background-color: <?php echo $footerBG; ?>;">
	
</footer>

<?php wp_footer(); ?>

</body>

<!-- Footer Here -->

</html>