<?php /* Template Name: Home */ ?>
<?php get_header(); ?>

<!-- slider -->
<div class="max-w-screen-xl relative mx-auto">
    <!-- swiper -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php
            // Esegui la query per ottenere i prodotti di WooCommerce
            $products = new WP_Query(array(
                'post_type' => 'product', // Tipo di post 'product' per i prodotti WooCommerce
                'posts_per_page' => 5,   // Numero di prodotti da mostrare nello slider
            ));

            // Controlla se ci sono prodotti
            if ($products->have_posts()) :
                while ($products->have_posts()) : $products->the_post();
                    global $product;
            ?>
                    <!-- slide hero -->
                    <div class="swiper-slide">
                        <section class="lg:py-20 mb-24 lg:mb-0 mx-auto max-w-screen-xl px-4 items-center lg:flex md:px-8">
                            <div class="flex-1 text-center mt-7 mb-8 lg:mb-0 lg:mt-0 lg:ml-3 z-10 relative">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('large', array('class' => 'mx-auto max-h-[300px] lg:max-h-[500px] w-auto', 'alt' => get_the_title()));
                                }
                                ?>
                            </div>
                            <div class="space-y-4 flex-1 sm:text-center lg:text-left z-20 relative">
                                <h1 class="text-gray-100 font-bold text-4xl"><?php the_title(); ?></h1>
                                <p class="text-gray-300 max-w-xl leading-relaxed sm:mx-auto lg:ml-0"><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                                <div class="flex flex-col">
                                    <?php if ($product->is_on_sale()) : ?>
                                        <span class="title-font font-medium text-2xl text-gray-200"><?php echo wc_price($product->get_sale_price()); ?></span>
                                        <span class="text-sm text-purple-500 line-through"><?php echo wc_price($product->get_regular_price()); ?></span>
                                    <?php else : ?>
                                        <span class="title-font font-medium text-2xl text-gray-200"><?php echo wc_price($product->get_price()); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="pt-4 flex items-center gap-4">
                                    <a href="<?php the_permalink(); ?>" class="px-7 py-3 w-fit bg-purple-500 hover:bg-gray-500 duration-200 text-gray-100 text-center rounded-md shadow-md block" rel="nofollow"><?php _e('Get started', 'text-domain'); ?></a>
                                    <a href="<?php the_permalink(); ?>" class="px-7 py-3 w-fit bg-gray-700 text-gray-200 hover:bg-gray-900 duration-200 text-center rounded-md block" rel="nofollow"><?php _e('Try it out', 'text-domain'); ?></a>
                                </div>
                            </div>
                        </section>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata(); // Ripristina i dati del post
            endif;
            ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>

    <!-- gradients -->
    <div class="absolute inset-0 max-w-lg z-0 mt-auto mr-auto h-72 blur-[118px] bg-gradient-to-r from-purple-950 to-blue-950"></div>
    <div class="absolute inset-0 max-w-lg z-0 my-auto ml-auto h-72 blur-[118px] bg-gradient-to-r from-purple-900 to-blue-900"></div>
</div>

<!-- products -->
<div class="py-6 sm:py-8 lg:py-12 relative max-w-screen-xl mx-auto">
    <div class="mx-auto px-4 md:px-8">
        <!-- text -->
        <div class="mb-10 md:mb-16 relative z-10">
            <h2 class="mb-4 text-center text-2xl font-bold text-gray-100 md:mb-6 lg:text-3xl">Selected</h2>
            <p class="mx-auto max-w-screen-md text-center text-gray-300 md:text-lg">This is a section of some simple filler text, also known as placeholder text. It shares some characteristics of a real written text but is random or otherwise generated.</p>
        </div>

        <!-- gradient -->
        <div class="absolute inset-0 max-w-lg z-0 my-auto mr-auto h-72 blur-[118px] bg-gradient-to-r from-purple-900 to-blue-900"></div>

        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4">
            <?php
            // Esegui la query per ottenere i prodotti
            $products = new WP_Query(array(
                'post_type' => 'product', // Tipo di post 'product' per i prodotti WooCommerce
                'posts_per_page' => -1,   // Numero di prodotti da mostrare, -1 per mostrarli tutti
            ));

            // Controlla se ci sono prodotti
            if ($products->have_posts()) :
                while ($products->have_posts()) : $products->the_post();
                    global $product;
                    get_template_part('components/product-card');
                endwhile;
                wp_reset_postdata(); // Ripristina i dati del post
            else :
                echo 'Nessun prodotto trovato.';
            endif;
            ?>
        </div>

        <a href="archive.php" class="mt-8 w-fit mx-auto px-7 py-3 bg-purple-500 hover:bg-gray-600 duration-300 text-gray-100 text-center rounded-md shadow-md block" rel="nofollow">See All Products</a>
    </div>
</div>

<?php get_footer(); ?>