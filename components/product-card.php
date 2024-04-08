<?php global $product; ?>
<!-- product -->
<div class="bg-gray-900/75 rounded-2xl z-20">
    <a href="<?php the_permalink(); ?>" class="group relative block h-96 lg:py-12 lg:px-12 py-8 px-8 overflow-hidden rounded-t-lg bg-transparent">
        <?php
        if (has_post_thumbnail()) {
            the_post_thumbnail('large', array('class' => 'h-full w-full object-cover object-center transition duration-200 group-hover:scale-110'));
        }
        ?>
        <?php echo $product->get_sale_price() ? '<span class="absolute left-0 top-3 rounded-r-lg bg-purple-500 px-3 py-1.5 text-sm font-semibold uppercase tracking-wider text-gray-100">-' . round(($product->get_regular_price() - $product->get_sale_price()) / $product->get_regular_price() * 100) . '%</span>' : ''; ?>
    </a>

    <div class="w-fit mx-auto text-center flex gap-4 pb-4 -mt-4">
        <button class="bg-gray-600 p-2 flex flex-col justify-center text-gray-100 rounded-full hover:bg-gray-500 duration-200"><span class="material-symbols-outlined"> play_arrow </span></button>
        <button class="bg-purple-500 p-2 flex flex-col justify-center text-gray-100 rounded-full hover:bg-gray-800 duration-200"><span class="material-symbols-outlined"> add_circle </span></button>
    </div>

    <div class="flex items-start justify-between gap-2 rounded-b-lg bg-transparent p-4">
        <div class="flex flex-col">
            <a href="<?php the_permalink(); ?>" class="font-bold text-gray-100 transition duration-100 hover:text-gray-300 lg:text-lg"><?php the_title(); ?></a>
            <span class="text-sm text-gray-300 lg:text-base"><?php echo wc_get_product_category_list($product->get_id()); ?></span>
        </div>

        <div class="flex flex-col items-end">
            <?php if ($product->is_on_sale()) : ?>
                <span class="font-bold text-gray-100 lg:text-lg"><?php echo wc_price($product->get_sale_price()); ?></span>
                <span class="text-sm text-purple-500 line-through"><?php echo wc_price($product->get_regular_price()); ?></span>
            <?php else : ?>
                <span class="font-bold text-gray-100 lg:text-lg"><?php echo wc_price($product->get_price()); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <!-- Add to Cart Button -->
    <form class="cart" method="post" enctype='multipart/form-data'>
        <?php do_action('woocommerce_before_add_to_cart_button'); ?>

        <input type="hidden" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" />
        <button type="submit" class="single_add_to_cart_button button alt"><?php echo esc_html($product->single_add_to_cart_text()); ?></button>

        <?php do_action('woocommerce_after_add_to_cart_button'); ?>
    </form>

</div>