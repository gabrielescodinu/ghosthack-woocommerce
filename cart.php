<?php /* Template Name: Cart */ ?>
<?php get_header(); ?>

<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<div class="py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-lg px-4 md:px-8">
        <div class="mb-6 sm:mb-10 lg:mb-16">
            <h2 class="mb-4 text-center text-2xl font-bold text-gray-100 md:mb-6 lg:text-3xl"><?php _e('Your Cart', 'woocommerce'); ?></h2>
        </div>

        <form class="woocommerce-cart-form relative z-10" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
            <?php do_action('woocommerce_before_cart_table'); ?>

            <div class="mb-5 flex flex-col sm:mb-8 sm:divide-y">
                <?php

                foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                    $_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                    $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

                    if ($_product && $_product->exists() && $cart_item['quantity'] > 0) {
                        $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                ?>
                        <!-- Product start -->
                        <div class="border-none woocommerce-cart-form__cart-item <?php echo esc_attr(apply_filters('', 'cart_item', $cart_item, $cart_item_key)); ?>">
                            <div class="py-4 sm:py-8 border-b border-gray-600">
                                <div class="flex flex-wrap gap-4 sm:py-2.5 lg:gap-6">
                                    <!-- Product Image -->
                                    <div class="sm:-my-2.5">
                                        <a href="<?php echo esc_url($product_permalink); ?>" class="group relative block h-40 w-24 overflow-hidden rounded-lg sm:w-40">
                                            <?php
                                            $thumbnail = $_product->get_image();
                                            if (!$_product->is_visible()) {
                                                echo $thumbnail; // If the product isn't visible, show the image.
                                            } else {
                                                printf('<img src="%s" alt="%s" class="h-full w-full p-2 object-cover object-center transition duration-200 group-hover:scale-110"/>', esc_url(wp_get_attachment_image_url($_product->get_image_id(), 'woocommerce_thumbnail')), esc_html($_product->get_name()));
                                            }
                                            ?>
                                        </a>
                                    </div>
                                    <!-- Product Name & Attributes -->
                                    <div class="flex flex-1 flex-col justify-between">
                                        <div>
                                            <a href="<?php echo esc_url($product_permalink); ?>" class="mb-1 inline-block text-lg font-bold text-gray-300 lg:text-xl"><?php echo $_product->get_name(); ?></a>
                                            <?php // Meta data like size, color, etc.
                                            echo wc_get_formatted_cart_item_data($cart_item); ?>
                                        </div>
                                        <!-- Product Price -->
                                        <div>
                                            <span class="mb-1 block font-bold text-gray-300 md:text-lg"><?php echo WC()->cart->get_product_price($_product); ?></span>
                                            <?php // Show if the product is in stock or not
                                            if ($_product->is_in_stock()) {
                                                echo '<span class="flex items-center gap-1 text-sm text-gray-300">In stock</span>';
                                            } else {
                                                echo '<span class="flex items-center gap-1 text-sm text-gray-300">Out of stock</span>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!-- Product Quantity & Actions -->
                                    <div class="flex w-full justify-between pt-4 sm:w-auto sm:pt-0">
                                        <div class="flex flex-col items-start gap-2">
                                            <div class="quantity flex h-12 w-24 overflow-hidden rounded border">
                                                <input type="number" step="1" min="0" max="<?php echo esc_attr(0 < $_product->get_max_purchase_quantity() ? $_product->get_max_purchase_quantity() : ''); ?>" name="cart[<?php echo $cart_item_key; ?>][qty]" value="<?php echo $cart_item['quantity']; ?>" title="Qty" class="quantity-field w-full px-4 py-2 outline-none ring-inset ring-indigo-300 transition duration-100 focus:ring" size="4" inputmode="numeric">

                                                <div class="flex flex-col divide-y border-l">
                                                    <!-- Bottone di aumento quantità -->
                                                    <button type="button" data-cart_item_key="<?php echo $cart_item_key; ?>" class="increase-quantity flex w-6 flex-1 select-none items-center justify-center bg-white leading-none transition duration-100 hover:bg-gray-100 active:bg-gray-200">+</button>

                                                    <!-- Bottone di diminuzione quantità -->
                                                    <button type="button" data-cart_item_key="<?php echo $cart_item_key; ?>" class="decrease-quantity flex w-6 flex-1 select-none items-center justify-center bg-white leading-none transition duration-100 hover:bg-gray-100 active:bg-gray-200">-</button>
                                                </div>

                                            </div>

                                            <!-- Remove item link -->
                                            <?php
                                            echo apply_filters(
                                                'woocommerce_cart_item_remove_link',
                                                sprintf(
                                                    '<a href="%s" class="text-sm font-semibold text-red-500 transition duration-100 hover:text-red-600 active:text-red-700" aria-label="%s" data-product_id="%s" data-product_sku="%s">Delete</a>',
                                                    esc_url(wc_get_cart_remove_url($cart_item_key)),
                                                    __('Remove this item', 'woocommerce'),
                                                    esc_attr($product_id),
                                                    esc_attr($_product->get_sku())
                                                ),
                                                $cart_item_key
                                            );
                                            ?>
                                        </div>
                                        <!-- Product Subtotal -->
                                        <div class="ml-4 pt-3 sm:pt-2 md:ml-8 lg:ml-16">
                                            <span class="block font-bold text-gray-300 md:text-lg"><?php echo WC()->cart->get_product_subtotal($_product, $cart_item['quantity']); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product end -->
                <?php
                    }
                }
                ?>

            </div>

            <?php do_action('woocommerce_after_cart_table'); ?>
        </form>

        <div class="absolute inset-0 max-w-lg mb-auto ml-auto h-72 blur-[118px] bg-gradient-to-r from-purple-900 to-blue-900"></div>
        <div class="absolute inset-0 max-w-lg z-0 my-auto mr-auto h-72 blur-[118px] bg-gradient-to-r from-purple-900 to-blue-900"></div>


        <?php do_action('woocommerce_before_cart_collaterals'); ?>
        <div class="flex flex-col items-end gap-4">
            <div class="w-full rounded-lg p-4 sm:max-w-xs bg-gray-800">
                <div class="space-y-1">
                    <div class="flex justify-between gap-4 text-gray-300">
                        <span>Subtotal</span>
                        <span><?php echo WC()->cart->get_cart_subtotal(); ?></span>
                    </div>

                    <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>
                        <?php do_action('woocommerce_cart_totals_before_shipping'); ?>
                        <?php wc_cart_totals_shipping_html(); ?>
                        <?php do_action('woocommerce_cart_totals_after_shipping'); ?>
                    <?php endif; ?>

                    <?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
                        <div class="flex justify-between gap-4 text-gray-300">
                            <span>Coupon: <?php echo esc_html($code); ?></span>
                            <span><?php wc_cart_totals_coupon_html($coupon); ?></span>
                        </div>
                    <?php endforeach; ?>

                    <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>
                        <?php do_action('woocommerce_review_order_before_shipping'); ?>
                        <?php wc_cart_totals_shipping_html(); ?>
                        <?php do_action('woocommerce_review_order_after_shipping'); ?>
                    <?php endif; ?>

                    <?php foreach (WC()->cart->get_fees() as $fee) : ?>
                        <div class="flex justify-between gap-4 text-gray-300">
                            <span><?php echo esc_html($fee->name); ?></span>
                            <span><?php wc_cart_totals_fee_html($fee); ?></span>
                        </div>
                    <?php endforeach; ?>

                    <?php if (wc_tax_enabled() && !WC()->cart->display_prices_including_tax()) : ?>
                        <?php if ('itemized' === get_option('woocommerce_tax_total_display')) : ?>
                            <?php foreach (WC()->cart->get_tax_totals() as $code => $tax) : ?>
                                <div class="flex justify-between gap-4 text-gray-300">
                                    <span><?php echo esc_html($tax->label); ?></span>
                                    <span><?php echo wp_kses_post($tax->formatted_amount); ?></span>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="flex justify-between gap-4 text-gray-300">
                                <span><?php echo esc_html(WC()->countries->tax_or_vat()); ?></span>
                                <span><?php wc_cart_totals_taxes_total_html(); ?></span>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php do_action('woocommerce_cart_totals_before_order_total'); ?>

                    <div class="mt-4 border-t border-gray-600 pt-4">
                        <div class="flex items-start justify-between gap-4 text-gray-100">
                            <span class="text-lg font-bold">Total</span>
                            <span class="flex flex-col items-end">
                                <span class="text-lg"><?php wc_cart_totals_order_total_html(); ?></span>
                                <?php if (wc_tax_enabled() && WC()->cart->display_prices_including_tax()) : ?>
                                    <span class="text-sm text-gray-300"><?php printf(__('including %s', 'woocommerce'), WC()->countries->tax_or_vat()); ?></span>
                                <?php endif; ?>
                            </span>
                        </div>
                    </div>
                    <?php do_action('woocommerce_cart_totals_after_order_total'); ?>
                </div>
            </div>

            <div class="px-7 py-3 w-fit bg-purple-500 hover:bg-gray-500 duration-200 text-gray-100 text-center rounded-md shadow-md block">
                <?php do_action('woocommerce_proceed_to_checkout'); ?>
            </div>
        </div>


        <?php do_action('woocommerce_after_cart'); ?>
    </div>
</div>

<script>
    jQuery(document).ready(function($) {
        // Gestione del click sul pulsante di aumento quantità
        $('.increase-quantity').on('click', function() {
            var cart_item_key = $(this).data('cart_item_key');

            $.ajax({
                type: 'POST',
                url: ajax_object.ajax_url,
                data: {
                    action: 'increase_quantity',
                    cart_item_key: cart_item_key,
                },
                success: function(response) {
                    location.reload(); // Ricarica la pagina per mostrare la quantità aggiornata
                    // In alternativa, aggiorna solo la parte necessaria del DOM senza ricaricare tutta la pagina
                }
            });
        });

        // Gestione del click sul pulsante di diminuzione quantità
        $('.decrease-quantity').on('click', function() {
            var cart_item_key = $(this).data('cart_item_key');

            $.ajax({
                type: 'POST',
                url: ajax_object.ajax_url,
                data: {
                    action: 'decrease_quantity',
                    cart_item_key: cart_item_key,
                },
                success: function(response) {
                    location.reload(); // Ricarica la pagina per mostrare la quantità aggiornata
                    // In alternativa, aggiorna solo la parte necessaria del DOM senza ricaricare tutta la pagina
                }
            });
        });
    });
</script>

<?php get_footer(); ?>