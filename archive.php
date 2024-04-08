<?php
/*
Template Name: Archive
*/
?>

<?php
get_header();
?>
<!-- products -->
<div class="py-6 sm:py-8 lg:py-12 relative max-w-screen-xl mx-auto">
    <div class="mx-auto px-4 md:px-8">
        <!-- text -->
        <div class="mb-10 md:mb-16 relative z-10">
            <h2 class="mb-4 text-2xl font-bold text-gray-100 md:mb-6 lg:text-3xl">Selected</h2>
            <p class="max-w-screen-md text-gray-300 md:text-lg">This is a section of some simple filler text, also known as placeholder text. It shares some characteristics of a real written text but is random or otherwise generated.</p>

            <form class="max-w-xs mr-auto mt-4">
                <select id="product_categories" name="product_categories" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" onchange="window.location.href=this.value">
                    <option value="/shop/">Mostra tutti i prodotti</option>
                    <?php
                    $categories = get_terms('product_cat', array('hide_empty' => true));
                    $current_category_slug = is_product_category() ? get_queried_object()->slug : '';
                    foreach ($categories as $category) {
                        $selected = $current_category_slug === $category->slug ? ' selected' : '';
                        echo '<option value="' . get_term_link($category) . '"' . $selected . '>' . $category->name . '</option>';
                    }
                    ?>
                </select>
            </form>
        </div>

        <div class="absolute inset-0 max-w-lg mb-auto ml-auto h-72 blur-[118px] bg-gradient-to-r from-purple-900 to-blue-900"></div>
        <div class="absolute inset-0 max-w-lg z-0 my-auto mr-auto h-72 blur-[118px] bg-gradient-to-r from-purple-900 to-blue-900"></div>

        <!-- gradient -->
        <div class="absolute inset-0 max-w-lg z-0 my-auto mr-auto h-72 blur-[118px] bg-gradient-to-r from-purple-900 to-blue-900"></div>

        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4">
            <?php
            // Verifica se siamo in una pagina di archivio di categoria di prodotti e ottiene lo slug della categoria
            if (is_product_category()) {
                $queried_object = get_queried_object();
                $category_slug = $queried_object->slug;
            } else {
                $category_slug = '';
            }

            // Ottieni il numero di pagina corrente
            $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;

            // Prepara gli argomenti per la query dei prodotti, filtrando per categoria se presente e includendo la pagina corrente
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 1,
                'paged' => $paged,
            );

            if (!empty($category_slug)) {
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field'    => 'slug',
                        'terms'    => $category_slug,
                    ),
                );
            }

            $products = new WP_Query($args);

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

        <?php
        // Genera i link di paginazione e li salva in una variabile
        $links = paginate_links(array(
            'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $products->max_num_pages,
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
    </div>
</div>

<?php
get_footer();
