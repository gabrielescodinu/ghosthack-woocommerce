<?php

/**
 * Dashboard page for My Account.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 */

defined('ABSPATH') || exit;

?>
<div class="bg-gray-900 p-6 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold text-white mb-4">Benvenuto nel tuo account!</h2>
    <p class="text-gray-300">Da qui puoi gestire tutte le tue informazioni personali, ordini e indirizzi di spedizione.</p>

    <div class="grid gap-4 sm:grid-cols-1 lg:grid-cols-2 mt-6">
        <div class="bg-gray-800 p-4 rounded-lg">
            <h3 class="text-lg font-semibold text-gray-200">Ordini recenti</h3>
            <p class="text-gray-400">Puoi visualizzare lo stato dei tuoi ordini recenti qui.</p>
            <a href="<?php echo esc_url(wc_get_endpoint_url('orders')); ?>" class="text-purple-400 hover:text-purple-600">
                Visualizza i tuoi ordini
            </a>
        </div>
        <div class="bg-gray-800 p-4 rounded-lg">
            <h3 class="text-lg font-semibold text-gray-200">Dettagli dell'account</h3>
            <p class="text-gray-400">Modifica le tue informazioni personali, indirizzi e password.</p>
            <a href="<?php echo esc_url(wc_get_endpoint_url('edit-account')); ?>" class="text-purple-400 hover:text-purple-600">
                Modifica il tuo account
            </a>
        </div>
    </div>
</div>