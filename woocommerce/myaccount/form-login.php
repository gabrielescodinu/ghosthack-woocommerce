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

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6 bg-gray-900 p-6 rounded-lg shadow-lg">

    <div class="bg-gray-800 p-4 rounded-lg">
        <h2 class="text-2xl font-bold text-white mb-4"><?php esc_html_e('Login', 'woocommerce'); ?></h2>

        <form method="post" class="woocommerce-form woocommerce-form-login login" <?php do_action('woocommerce_login_form_tag'); ?>>

            <?php do_action('woocommerce_login_form_start'); ?>

            <p class="text-gray-400">
                <label for="username" class="text-gray-300"><?php esc_html_e('Username or email address', 'woocommerce'); ?>&nbsp;<span class="required text-red-500">*</span></label>
                <input type="text" class="w-full p-2 rounded-lg bg-gray-700 text-gray-200" name="username" id="username" autocomplete="username" value="<?php echo (! empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" />
            </p>

            <p class="text-gray-400">
                <label for="password" class="text-gray-300"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required text-red-500">*</span></label>
                <input class="w-full p-2 rounded-lg bg-gray-700 text-gray-200" type="password" name="password" id="password" autocomplete="current-password" />
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
                <button type="submit" class="bg-purple-500 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded-lg text-sm" name="login" value="<?php esc_attr_e('Login', 'woocommerce'); ?>"><?php esc_html_e('Login', 'woocommerce'); ?></button>
            </p>

            <?php do_action('woocommerce_login_form_end'); ?>

        </form>
    </div>

    <div class="bg-gray-800 p-4 rounded-lg">
        <h2 class="text-2xl font-bold text-white mb-4"><?php esc_html_e('Register', 'woocommerce'); ?></h2>

        <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?>>

            <?php do_action('woocommerce_register_form_start'); ?>

            <p class="text-gray-400">
                <label for="reg_email" class="text-gray-300"><?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span class="required text-red-500">*</span></label>
                <input type="email" class="w-full p-2 rounded-lg bg-gray-700 text-gray-200" name="email" id="reg_email" autocomplete="email" value="<?php echo (! empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" />
            </p>

            <?php do_action('woocommerce_register_form'); ?>

            <p class="woocommerce-form-row woocommerce-form-row--wide">
                <button type="submit" class="bg-purple-500 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded-lg text-sm" name="register" value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Register', 'woocommerce'); ?></button>
            </p>

            <?php do_action('woocommerce_register_form_end'); ?>

        </form>
    </div>

</div>

<?php do_action('woocommerce_after_customer_login_form'); ?>