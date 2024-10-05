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



// add custom theme scripts
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



// decrease quantity cart
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



// increase quantity cart
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


// register custom menu
function mio_tema_register_menus()
{
    register_nav_menus(array(
        'menu-principale' => __('Menu Principale', 'tuo-text-domain'),
        'menu-mobile' => __('Menu Mobile', 'tuo-text-domain'),
    ));
}
add_action('init', 'mio_tema_register_menus');

// custom menu class for desktop
class Tailwind_WP_Nav_Menu_Walker extends Walker_Nav_Menu
{

    // Inizio dell'elemento: genera il markup per l'inizio di ogni elemento di menu
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $title = $item->title;
        $url = $item->url;

        $li_classes = 'cursor-pointer text-gray-300 transition-colors duration-200 hover:text-purple-500 group relative';
        $a_classes = 'block py-2.5 px-4 rounded transition duration-200 text-gray-300 hover:bg-purple-500 hover:text-white';

        if ($depth === 0) { // Elemento di primo livello
            $output .= "<li class='{$li_classes}'>";
            if ($args->walker->has_children) {
                $output .= "<div class='flex'>$title<span class='material-symbols-outlined transform transition-transform duration-300 group-hover:rotate-180'>expand_more</span></div>";
            } else {
                $output .= "<a href='{$url}' class='{$a_classes}'>$title</a>";
            }
        } else { // Sotto-elemento
            $output .= "<li><a href='{$url}' class='{$a_classes}'>$title</a></li>";
        }
    }

    // Inizio sottogruppo: apre un sottogruppo di elementi
    function start_lvl(&$output, $depth = 0, $args = null)
    {
        if ($depth == 0) { // Apertura solo per il primo livello di sottovoci
            $output .= "<div class='hidden group-hover:block absolute w-40 bg-gray-900/[0.9] rounded-lg p-2 text-sm'><ul>";
        }
    }

    // Fine sottogruppo: chiude un sottogruppo di elementi
    function end_lvl(&$output, $depth = 0, $args = null)
    {
        if ($depth == 0) {
            $output .= "</ul></div>";
        }
    }

    // Fine dell'elemento: chiude gli elementi del menu (non modificato in questo esempio)
    function end_el(&$output, $item, $depth = 0, $args = null)
    {
        if ($depth === 0) {
            $output .= "</li>\n";
        }
    }
}
// custom menu class for mobile
class Tailwind_WP_Nav_Menu_Walker_Mobile extends Walker_Nav_Menu
{
    // Inizio dell'elemento: genera il markup per l'inizio di ogni elemento di menu
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $title = $item->title;
        $url = $item->url;

        $li_classes = 'relative';
        $button_classes = 'tracking-wide text-gray-100 transition-colors duration-200 hover:text-purple-500 dropdown-btn flex items-center';
        $a_classes = 'block py-2.5 rounded transition duration-200 text-gray-300 hover:bg-purple-500 hover:text-white';

        if ($depth === 0) { // Elemento di primo livello
            $output .= "<li class='{$li_classes}'>";
            if ($args->walker->has_children) {
                // Usa un button per le voci con sotto-voci
                $output .= "<button class='{$button_classes}'>$title <span class='material-symbols-outlined dropdown-icon'>expand_more</span></button>";
            } else {
                // Usa un link se non ci sono sotto-voci
                $output .= "<a href='{$url}' class='{$a_classes}'>$title</a>";
            }
        } else { // Sotto-elemento
            // Semplice link per le sotto-voci
            $output .= "<li><a href='{$url}' class='{$a_classes}'>$title</a></li>";
        }
    }

    // Inizio sottogruppo: apre un sottogruppo di elementi
    function start_lvl(&$output, $depth = 0, $args = null)
    {
        if ($depth == 0) { // Apertura solo per il primo livello di sottovoci
            $output .= "<ul class='dropdown-menu hidden left-0 bg-gray-700/[0.5] rounded-lg p-2 text-sm mt-4'>";
        }
    }

    // Fine sottogruppo: chiude un sottogruppo di elementi
    function end_lvl(&$output, $depth = 0, $args = null)
    {
        if ($depth == 0) {
            $output .= "</ul>";
        }
    }

    // Fine dell'elemento: chiude gli elementi del menu
    function end_el(&$output, $item, $depth = 0, $args = null)
    {
        if ($depth === 0) {
            $output .= "</li>\n";
        }
    }
}


add_action('wp_ajax_get_cart_count', 'get_cart_count');
add_action('wp_ajax_nopriv_get_cart_count', 'get_cart_count');

function get_cart_count()
{
    echo WC()->cart->get_cart_contents_count();
    wp_die(); // Termina correttamente la richiesta AJAX
}
