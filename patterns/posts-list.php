<?php

/**
 * Title: List of posts without images, 1 column
 * Slug: majdakonline/posts-list
 * Categories: query, posts
 * Block Types: core/query
 */
?>
<?php
// Upewnij się, że WooCommerce jest aktywny
if (class_exists('WooCommerce')) : ?>

    <div class="container">
        <div class="row">
            <?php
            // Argumenty dla zapytania o produkty
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 16, // Wyświetl 16 produktów
                'paged' => get_query_var('paged') ? get_query_var('paged') : 1 // Paginacja
            );

            // Zapytanie o produkty
            $loop = new WP_Query($args);

            if ($loop->have_posts()) : ?>
                <?php while ($loop->have_posts()) : $loop->the_post();
                    global $product; ?>
                    <div class="col-md-3 product">
                        <!-- Obrazek produktu w formacie kwadratowym -->
                        <div class="product-image" style="width:100%; padding-top:100%; background-size:cover; background-position:center; background-image:url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>');">
                        </div>
                        <!-- Tytuł produktu jako link, z odpowiednim stylem -->
                        <h2 class="product-title" style="line-height: 1.1; font-size: 1.5rem;">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>

                        <!-- Cena produktu -->
                        <span class="price"><?php echo $product->get_price_html(); ?></span>

                        <!-- Przycisk Dodaj do koszyka -->
                        <?php woocommerce_template_loop_add_to_cart(); ?>
                    </div>
                <?php endwhile; ?>
                <!-- Paginacja -->
                <div class="col-12">
                    <?php
                    echo paginate_links(array(
                        'total' => $loop->max_num_pages,
                        'prev_text' => __('« Poprzednia'),
                        'next_text' => __('Następna »'),
                    ));
                    ?>
                </div>
            <?php else : ?>
                <p><?php _e('Nie znaleziono produktów.', 'textdomain'); ?></p>
            <?php endif; ?>

            <?php wp_reset_postdata(); ?>
        </div>
    </div>

<?php endif; ?>