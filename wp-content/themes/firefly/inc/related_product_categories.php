<?php
$terms = get_sub_field('related_products_category');
if( $terms ): ?>
    <div class="container">
        <div class="row related-product-categories">
        <?php foreach( $terms as $term ):
            $title = $term->name;
            $text = $term->description;
            $image = get_field('taxonomy_image', $term);
            if( $image ) {
                $image_size = 'medium';
                $image_url = $image['sizes'][ $image_size ];
            } ?>
            <a class="related-product-category" href="<?php echo esc_url( get_term_link( $term ) ); ?>" <?php if( $image ) { ?> style="background: url(<?php echo $image_url; ?>);" <?php } ?>>
                <div class="overlay"></div>
                <h4 class="green mb-4"><?php echo esc_html( $title ); ?></h4>
                <?php if( $text ) { ?>
                <p><?php echo esc_html( $text ); ?></p>
                <?php } ?>
                <p class="link d-inline-block">More Info</p>
            </a>
        <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>