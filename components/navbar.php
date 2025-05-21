<?php include(get_template_directory() . '/components/search-panel.php'); ?>

<!-- menu mobile -->
<div id="menu-mobile" class="p-8 fixed w-screen min-h-screen backdrop-blur-2xl z-30 -translate-x-full transform transition-transform duration-300 flex flex-col justify-center">
    <div class="overflow-scroll max-h-[800px]">
        <?php
        if (has_nav_menu('menu-mobile')) {
            wp_nav_menu(array(
                'theme_location' => 'menu-mobile',
                'container' => false,
                'menu_class' => 'space-y-8',
                'walker' => new Tailwind_WP_Nav_Menu_Walker_Mobile(),
                'fallback_cb' => false,
            ));
        }
        ?>

        <ul class="space-y-8 mt-8">
            <div class="flex-1 gap-x-6 items-center justify-end mt-6 space-y-6 md:flex md:space-y-0 md:mt-0">
                <div class="flex items-center gap-2">
                    <a href="" class="bg-gray-800 hover:bg-gray-700 duration-200 p-2 rounded-full flex flex-col justify-center text-gray-200"><span class="material-symbols-outlined"> favorite </span></a>
                    <a href="" class="bg-purple-500 hover:bg-gray-700 duration-200 p-2 rounded-full flex flex-col justify-center text-gray-200"><span class="material-symbols-outlined"> shopping_cart </span></a>
                </div>
                <a href="javascript:void(0)" class="flex items-center justify-center gap-x-1 py-2 px-4 text-white font-medium bg-gray-600 hover:bg-gray-700 active:bg-gray-900/75 rounded-full md:inline-flex" rel="nofollow"> Login </a>
                <a href="javascript:void(0)" class="flex items-center justify-center gap-x-1 py-2 px-4 text-white font-medium bg-purple-500 hover:bg-gray-700 active:bg-gray-900/75 rounded-full md:inline-flex" rel="nofollow">
                    Sign up
                    <span class="material-symbols-outlined"> login </span>
                </a>
            </div>
        </ul>
        <button class="search-button text-gray-100 w-fit mx-auto mt-8 bg-purple-500 flex flex-col justify-center p-2 rounded-full"><span class="material-symbols-outlined"> search </span></button>
    </div>
</div>

<!-- navbar -->
<nav class="md:text-sm z-30 relative">
    <div class="gap-x-14 items-center max-w-screen-xl mx-auto px-4 md:flex md:px-8">
        <div class="flex items-center justify-between py-5 md:block">
            <!-- logo -->
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="nofollow" class="hidden lg:block">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo(); // Mostra il logo caricato da WordPress
                } else {
                    // Fallback nel caso non sia stato caricato un logo
                    echo '<img src="' . get_template_directory_uri() . '/assets/img/logo.svg" alt="logo">';
                }
                ?>
            </a>
            <!-- hamburger mobile -->
            <div class="md:hidden">
                <button id="hamburger" class="menu-btn text-gray-300 hover:text-gray-100"><span class="material-symbols-outlined scale-150">menu</span></button>
            </div>
        </div>
        <!-- menu -->
        <div class="flex-1 items-center mt-8 md:mt-0 md:flex hidden">
            <?php
            // Resettare i parametri del menu dopo aver stampato il menu principale
            wp_reset_query();
            ?>

            <?php
            wp_nav_menu(array(
                'theme_location' => 'menu-principale',
                'container' => false, // Non vogliamo un contenitore
                'menu_class' => 'justify-center items-baseline md:flex md:space-x-6', // Classi Tailwind
                'fallback_cb' => false, // Nessun fallback se il menu non esiste
                'depth' => 2, // Permette fino a due livelli di nidificazione (voci e subvoci)
                'walker' => new Tailwind_WP_Nav_Menu_Walker(), // Utilizza un walker personalizzato se necessario
            ));
            ?>
            <div class="flex-1 gap-x-6 items-center justify-end mt-6 space-y-6 md:flex md:space-y-0 md:mt-0">
                <div class="flex items-center gap-2">
                    <a href="" class="bg-gray-800 hover:bg-gray-700 duration-200 p-2 rounded-full flex flex-col justify-center text-gray-200"><span class="material-symbols-outlined"> favorite </span></a>
                    <a class="bg-purple-500 hover:bg-gray-700 duration-200 p-2 rounded-full flex flex-col justify-center text-gray-200 relative" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e('View your shopping cart'); ?>">
                        <span class="material-symbols-outlined">shopping_cart</span>
                        <span class="cart-contents-count absolute -right-2 -top-2 bg-gray-600 h-5 w-5 text-center rounded-full"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                    </a>
                </div>
                <a href="../login.php" class="block text-gray-200 hover:text-purple-500" rel="nofollow">Log in</a>
                <a href="../login.php" class="flex items-center justify-center gap-x-1 py-2 px-4 text-white font-medium bg-purple-500 hover:bg-gray-700 active:bg-gray-900/75 rounded-full md:inline-flex duration-200" rel="nofollow">
                    Sign up
                    <span class="material-symbols-outlined"> login </span>
                </a>
                <button class="search-button text-gray-100"><span class="material-symbols-outlined"> search </span></button>
            </div>
        </div>
    </div>
</nav>