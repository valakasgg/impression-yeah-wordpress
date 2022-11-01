<?php
  // Vars
  $phoneNumber = get_field('phone', 'option');
  $emailAddress = get_field('email', 'option');
  ?>
<nav id="main-nav" class="navigation">
<!-- <nav id="main-nav" class="navigation navigation--open"> -->
    <div class="contact">
      <?php if( !empty( $phoneNumber ) ): ?>
        <div>
            <a class="phone" href="tel:<?php echo $phoneNumber; ?>"><?php echo $phoneNumber; ?></a>
        </div>
      <?php endif; ?>
      <?php if( !empty( $emailAddress ) ): ?>
        <div>
            <a class="email" href="mailto:<?php echo $emailAddress; ?>"><?php echo $emailAddress; ?></a>
        </div>
      <?php endif; ?>
      <?php //if( !empty( $menuLink ) ): ?>
        <div>
            <a href="<?php the_permalink(6); ?>" class="button button--turq">Enquire Now</a>
        </div>
      <?php //endif; ?>
    </div>
    <?php
    if (has_nav_menu('mobile')) :
      wp_nav_menu(array(
        'theme_location' => 'mobile', // Do not fall back to first non-empty menu.
      ));
    endif;
    ?>
    
</nav>