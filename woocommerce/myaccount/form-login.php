<?php

/**
 * Login Form.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_customer_login_form');
?>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6 bg-gray-900/[0.4] p-6 rounded-lg shadow-lg">

    <div class="p-4">
        <h2 class="text-2xl font-bold text-white mb-4"><?php esc_html_e('Login', 'woocommerce'); ?></h2>

        <form method="post" class="!border-0 woocommerce-form woocommerce-form-login login" <?php do_action('woocommerce_login_form_tag'); ?>>

            <?php do_action('woocommerce_login_form_start'); ?>

            <p class="text-gray-400 mb-4">
                <label for="username" class="text-gray-300"><?php esc_html_e('Username or email address', 'woocommerce'); ?>&nbsp;<span class="required text-red-500">*</span></label>
                <input type="text" class="mt-2 w-full rounded bg-gray-600/[0.5] px-3 py-2 text-gray-100 outline-none ring-purple-500 transition duration-100 focus:ring" name="username" id="username" autocomplete="username" value="<?php echo (! empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" />
            </p>

            <p class="text-gray-400 mb-4">
                <label for="password" class="text-gray-300"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required text-red-500">*</span></label>
                <input class="mt-2 w-full rounded bg-gray-600/[0.5] px-3 py-2 text-gray-100 outline-none ring-purple-500 transition duration-100 focus:ring" type="password" name="password" id="password" autocomplete="current-password" />
            </p>

            <?php do_action('woocommerce_login_form'); ?>

            <p class="woocommerce-LostPassword lost_password">
                <a class="text-purple-400 hover:text-purple-600" href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Lost your password?', 'woocommerce'); ?></a>
            </p>

            <p class="text-gray-400">
                <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme inline-flex items-center">
                    <input class="mr-2" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e('Remember me', 'woocommerce'); ?></span>
                </label>
            </p>

            <p class="woocommerce-form-row woocommerce-form-row--wide">
                <button type="submit" class="block rounded-lg bg-purple-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-gray-300 transition duration-200 hover:bg-gray-700 focus-visible:ring active:bg-gray-600 md:text-base mt-4" name="login" value="<?php esc_attr_e('Login', 'woocommerce'); ?>"><?php esc_html_e('Login', 'woocommerce'); ?></button>
            </p>

            <?php do_action('woocommerce_login_form_end'); ?>

        </form>
    </div>

    <div class="p-4">
        <h2 class="text-2xl font-bold text-white mb-4"><?php esc_html_e('Register', 'woocommerce'); ?></h2>

        <form method="post" class="!border-0 woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?>>

            <?php do_action('woocommerce_register_form_start'); ?>

            <p class="text-gray-400">
                <label for="reg_email" class="text-gray-300"><?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span class="required text-red-500">*</span></label>
                <input type="email" class="mt-2 w-full rounded bg-gray-600/[0.5] px-3 py-2 text-gray-100 outline-none ring-purple-500 transition duration-100 focus:ring" name="email" id="reg_email" autocomplete="email" value="<?php echo (! empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" />
            </p>

            <?php do_action('woocommerce_register_form'); ?>

            <p class="woocommerce-form-row woocommerce-form-row--wide">
                <button type="submit" class="block rounded-lg bg-purple-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-gray-300 transition duration-200 hover:bg-gray-700 focus-visible:ring active:bg-gray-600 md:text-base mt-4" name="register" value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Register', 'woocommerce'); ?></button>
            </p>

            <?php do_action('woocommerce_register_form_end'); ?>

        </form>
    </div>

</div>

<?php do_action('woocommerce_after_customer_login_form'); ?>