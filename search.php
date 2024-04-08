<?php get_header(); ?>

<div class="py-6 sm:py-8 lg:py-12 relative max-w-screen-xl mx-auto">
    <div class="mx-auto px-4 md:px-8">
        <h2 class="mb-4 text-2xl font-bold text-gray-100 md:mb-6 lg:text-3xl">Risultati della ricerca per: "<?php echo get_search_query(); ?>"</h2>
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php global $product; ?>
                    <?php
                    // Assicurati che il 'product' sia l'oggetto post globale corrente.
                    if ('product' === get_post_type()) :
                        $product = wc_get_product(get_the_ID());
                    endif;
                    ?>
                    <?php get_template_part('components/product-card'); // Utilizza il template part per la card del prodotto 
                    ?>
                <?php endwhile; ?>

                <?php
                // Genera i link di paginazione e li salva in una variabile
                $links = paginate_links(array(
                    'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                    'format' => '?paged=%#%',
                    'current' => max(1, get_query_var('paged')),
                    'total' => $wp_query->max_num_pages,
                    'type' => 'array', // Importante: restituisce i link come un array
                    'prev_next' => true,
                    'prev_text' => __('&laquo; Prev'),
                    'next_text' => __('Next &raquo;'),
                ));

                if (is_array($links)) {
                    echo '<nav class="mx-auto w-fit mt-8"><ul class="inline-flex -space-x-px text-base h-10">';
                    foreach ($links as $link) {
                        // Aggiunge le classi di Tailwind CSS a ogni link
                        $link = str_replace('page-numbers', 'flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-900 dark:border-gray-800 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-white', $link);
                        $link = str_replace('current', '!bg-gray-600 text-white border-gray-500 dark:bg-gray-700', $link);
                        echo "<li>$link</li>";
                    }
                    echo '</ul></nav>';
                }
                ?>

            <?php else : ?>
                <p>Nessun risultato trovato per la tua ricerca. Prova con altri termini.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>