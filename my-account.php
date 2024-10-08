<?php /* Template Name: My Account */ ?>
<?php get_header(); ?>

<!-- My Account Page -->
<div class="py-6 sm:py-8 lg:py-12 relative max-w-screen-xl mx-auto">
    <div class="mx-auto px-4 md:px-8">
        <!-- Title and description -->
        <div class="mb-10 md:mb-16 relative z-10">
            <h2 class="mb-4 text-2xl font-bold text-gray-100 md:mb-6 lg:text-3xl">Il mio account</h2>
            <p class="max-w-screen-md text-gray-300 md:text-lg">Gestisci le tue informazioni personali, ordini, indirizzi di spedizione e altro ancora dal tuo account.</p>
        </div>

        <!-- Background Gradient -->
        <div class="absolute inset-0 max-w-lg mb-auto ml-auto h-72 blur-[118px] bg-gradient-to-r from-purple-900 to-blue-900"></div>
        <div class="absolute inset-0 max-w-lg z-0 my-auto mr-auto h-72 blur-[118px] bg-gradient-to-r from-purple-900 to-blue-900"></div>

        <!-- Account Content -->
        <div class="relative z-10">
            <?php if (is_user_logged_in()) : ?>
                <div>

                    <!-- Account Details Section -->
                    <div class="bg-gray-900/[0.4] p-6 rounded-lg shadow-lg">
                        <h3 class="text-lg font-bold text-gray-200 mb-2">Dettagli dell'account</h3>
                        <div class="text-gray-400">
                            <?php echo do_shortcode('[woocommerce_my_account]'); ?>
                        </div>
                    </div>
                </div>

            <?php else : ?>
                <!-- If user is not logged in, show login form -->
                <div class="text-center">
                    <h3 class="text-lg font-bold text-gray-200 mb-4">Accedi o registrati</h3>
                    <div class="text-gray-400">
                        <?php echo do_shortcode('[woocommerce_my_account]'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Pagination (if needed) -->
        <?php
        // Aggiungi qui la paginazione se stai usando WooCommerce per visualizzare liste come ordini o indirizzi multipli
        ?>
    </div>
</div>

<?php get_footer(); ?>