<?php

/**
 * Template Name: Payment
 */

get_header(); ?>

<!-- Checkout Page -->
<div class="py-6 sm:py-8 lg:py-12 relative max-w-screen-xl mx-auto">
    <div class="mx-auto px-4 md:px-8">

        <div class="mb-10 md:mb-16 relative z-10">
            <h2 class="text-2xl font-bold text-gray-100 md:mb-6 lg:text-3xl">Pagamento</h2>
            <p class="max-w-screen-md text-gray-300 md:text-lg">Completa il tuo ordine e conferma i dettagli di pagamento.</p>
        </div>

        <!-- Background Gradient -->
        <div class="absolute inset-0 max-w-lg mb-auto ml-auto h-72 blur-[118px] bg-gradient-to-r from-purple-900 to-blue-900"></div>
        <div class="absolute inset-0 max-w-lg z-0 my-auto mr-auto h-72 blur-[118px] bg-gradient-to-r from-purple-900 to-blue-900"></div>

        <!-- WooCommerce Checkout Form -->
        <div class="woocommerce-checkout grid grid-cols-1 lg:grid-cols-2 gap-6">
            <?php
            if (function_exists('woocommerce_checkout')) {
                woocommerce_checkout(); // Richiama il form di checkout di WooCommerce
            } else {
                echo '<p class="text-red-500">WooCommerce non è attivo o la funzione di checkout non è disponibile.</p>';
            }
            ?>
        </div>

    </div>
</div>

<?php get_footer(); ?>