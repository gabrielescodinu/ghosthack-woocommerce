<?php

/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_checkout_form', $checkout);

// Se l'utente è già loggato
if (! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in()) {
    echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('Devi essere loggato per completare l\'acquisto.', 'woocommerce')));
    return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout grid grid-cols-1 lg:grid-cols-2 gap-6 max-w-screen-xl mx-auto" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

    <div class="bg-gray-900 p-6 rounded-lg shadow-lg lg:col-span-2">
        <h2 class="text-2xl font-bold text-white mb-6"><?php esc_html_e('Dettagli di fatturazione', 'woocommerce'); ?></h2>
        <div class="woocommerce-billing-fields grid grid-cols-1 gap-4">
            <?php do_action('woocommerce_checkout_billing'); ?>
        </div>
    </div>

    <div class="bg-gray-900 p-6 rounded-lg shadow-lg lg:col-span-1">
        <h2 class="text-2xl font-bold text-white mb-6"><?php esc_html_e('Il tuo ordine', 'woocommerce'); ?></h2>
        <div class="woocommerce-checkout-review-order grid grid-cols-1 gap-4">
            <?php do_action('woocommerce_checkout_before_order_review'); ?>

            <div id="order_review" class="woocommerce-checkout-review-order-table bg-gray-800 p-4 rounded-lg text-gray-300">
                <?php do_action('woocommerce_checkout_order_review'); ?>
            </div>

            <?php do_action('woocommerce_checkout_after_order_review'); ?>
        </div>
    </div>

    <div class="bg-gray-900 p-6 rounded-lg shadow-lg lg:col-span-1">
        <h2 class="text-2xl font-bold text-white mb-6"><?php esc_html_e('Metodi di pagamento', 'woocommerce'); ?></h2>
        <div class="woocommerce-checkout-payment grid grid-cols-1 gap-4">
            <?php do_action('woocommerce_checkout_payment'); ?>
        </div>
    </div>

    <?php do_action('woocommerce_checkout_after_customer_details'); ?>
</form>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>