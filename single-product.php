<?php get_header(); ?>

<section class="text-gray-700 body-font relative pb-20 max-w-screen-xl mx-auto">
    <div class="container px-5 lg:py-20 py-12 mx-auto">
        <div class="lg:w-4/5 mx-auto flex flex-wrap items-center relative z-10">
            <img alt="Product Image" class="lg:w-1/2 w-auto mx-auto object-cover object-center max-h-[300px] lg:max-h-[500px]" src="<?php echo get_the_post_thumbnail_url(); ?>" />
            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                <h2 class="text-sm title-font text-purple-500 tracking-widest"><?php echo wc_get_product_category_list($product->get_id()); ?></h2>
                <h1 class="text-gray-100 text-3xl title-font font-medium mt-4"><?php the_title(); ?></h1>
                <div class="leading-relaxed text-gray-300 mt-4"><?php the_content(); ?></div>
                <div class="flex mt-8 items-center">
                    <div class="flex flex-col">
                        <?php if ($product->is_on_sale()) : ?>
                            <span class="title-font font-medium text-2xl text-gray-200"><?php echo wc_price($product->get_sale_price()); ?></span>
                            <span class="text-sm text-purple-500 line-through"><?php echo wc_price($product->get_regular_price()); ?></span>
                        <?php else : ?>
                            <span class="title-font font-medium text-2xl text-gray-200"><?php echo wc_price($product->get_price()); ?></span>
                        <?php endif; ?>
                    </div>

                    <!-- Add to Cart Button -->
                    <?php
                    // Ottieni l'ID del prodotto
                    $product_id = $product->get_id();

                    // Controlla se il prodotto è già nel carrello
                    $in_cart = false;
                    foreach (WC()->cart->get_cart() as $cart_item) {
                        if ($cart_item['product_id'] == $product_id) {
                            $in_cart = true;
                            break;
                        }
                    }
                    ?>

                    <div class="ml-auto">
                        <form class="cart" method="post" enctype='multipart/form-data'>
                            <?php do_action('woocommerce_before_add_to_cart_button'); ?>
    
                            <input type="hidden" name="add-to-cart" value="<?php echo esc_attr($product_id); ?>" />
    
                            <!-- Cambia il bottone in base a se il prodotto è nel carrello -->
                            <?php if ($in_cart) : ?>
                                <!-- Bottone se il prodotto è già nel carrello -->
                                <button type="button" class="bg-green-500 p-2 flex flex-col justify-center text-gray-100 rounded-full hover:bg-green-700 duration-200">
                                    <span class="material-symbols-outlined">check_circle</span>
                                </button>
                            <?php else : ?>
                                <!-- Bottone per aggiungere al carrello -->
                                <button type="submit" class="bg-purple-500 px-4 py-2 flex justify-center text-gray-100 rounded-full hover:bg-gray-800 duration-200">
                                    Add to Cart
                                    <span class="material-symbols-outlined ml-2">add_circle</span>
                                </button>
                            <?php endif; ?>
    
                            <?php do_action('woocommerce_after_add_to_cart_button'); ?>
                        </form>
                    </div>

                    <button class="rounded-full w-10 h-10 bg-gray-700 hover:bg-gray-500 duration-200 p-0 border-0 inline-flex items-center justify-center text-gray-100 ml-4">
                        <span class="material-symbols-outlined"> play_arrow </span>
                    </button>
                </div>
                <!-- <div class="mt-8 text-gray-400">
                    <p class="text-gray-100 text-xl mb-4">Features:</p>
                    <ul>
                        <?php
                        // Ottieni le caratteristiche del prodotto e stampale
                        $features = get_post_meta(get_the_ID(), '_product_features', true);
                        if ($features) {
                            foreach ($features as $feature) {
                                echo '<li class="flex items-center gap-2 mb-2"><span class="material-symbols-outlined text-emerald-500"> task_alt </span> ' . $feature . '</li>';
                            }
                        }
                        ?>
                    </ul>
                </div> -->
            </div>
        </div>
    </div>
    <div class="absolute inset-0 max-w-lg z-0 mt-auto mr-auto h-72 blur-[118px] bg-gradient-to-r from-purple-900 to-blue-900"></div>
    <div class="absolute inset-0 max-w-lg z-0 my-auto mx-auto h-72 blur-[118px] bg-gradient-to-r from-purple-900 to-blue-900"></div>
</section>

<?php get_footer(); ?>