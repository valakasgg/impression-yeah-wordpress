<?php
global $post;
global $flex;
$page_for_posts = get_option('page_for_posts');

if ($wp_query->is_posts_page) {
    $post->ID = $page_for_posts;
}
?>
<main id="main" class="site-main breadcrumb-show">
    <?php

    // If flexible content inside the row exists
    if (have_rows('flexible_content', $post->ID)) :
        $flex = 0;

        // Loop through each flexible content row
        while (have_rows('flexible_content', $post->ID)) : the_row();
            $flex++;

            // Debug

            if (get_row_layout() == 'text_block') :
                get_template_part('inc/flex/text-block');
            elseif (get_row_layout() == 'hero') :
                get_template_part('inc/flex/hero');
            endif;

        endwhile;
        wp_reset_query();
    endif;
    ?>
</main>