<?php

// add this to custom pagination query
function custom_modify_product_query($query)
{
    if (!is_admin() && $query->is_main_query()) {
        if (is_product_category()) {
            // set post per page
            $query->set('posts_per_page', 1);

            // Ottieni il numero di pagina corrente da paged se esiste, altrimenti da page
            $paged = get_query_var('paged') ? get_query_var('paged') : get_query_var('page');
            $query->set('paged', $paged);
        }
    }
}
add_action('pre_get_posts', 'custom_modify_product_query');

function add_custom_theme_scripts()
{
    // Registra il tuo script AJAX
    wp_register_script('custom-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '', true);

    // Localizza lo script per passare variabili PHP a JavaScript
    wp_localize_script('custom-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));

    // Mette in coda lo script
    wp_enqueue_script('custom-script');
}
add_action('wp_enqueue_scripts', 'add_custom_theme_scripts');


function decrease_quantity_callback()
{
    if (isset($_POST['cart_item_key'])) {
        $cart_item_key = sanitize_text_field($_POST['cart_item_key']);
        $cart = WC()->cart->get_cart();
        if (isset($cart[$cart_item_key])) {
            $new_quantity = max($cart[$cart_item_key]['quantity'] - 1, 0); // Diminuisce di 1 ma non va sotto 0
            WC()->cart->set_quantity($cart_item_key, $new_quantity);
            echo 'Quantità diminuita';
        }
    }
    wp_die(); // Questo è necessario per terminare correttamente la richiesta AJAX
}
add_action('wp_ajax_decrease_quantity', 'decrease_quantity_callback');
add_action('wp_ajax_nopriv_decrease_quantity', 'decrease_quantity_callback');

function increase_quantity_callback()
{
    if (isset($_POST['cart_item_key'])) {
        $cart_item_key = sanitize_text_field($_POST['cart_item_key']);
        $cart = WC()->cart->get_cart();
        if (isset($cart[$cart_item_key])) {
            $new_quantity = $cart[$cart_item_key]['quantity'] + 1; // Aumenta di 1
            WC()->cart->set_quantity($cart_item_key, $new_quantity);
            echo 'Quantità aumentata';
        }
    }
    wp_die(); // Questo è necessario per terminare correttamente la richiesta AJAX
}
add_action('wp_ajax_increase_quantity', 'increase_quantity_callback');
add_action('wp_ajax_nopriv_increase_quantity', 'increase_quantity_callback');
