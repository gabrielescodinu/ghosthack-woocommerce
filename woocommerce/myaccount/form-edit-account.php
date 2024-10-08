<?php

/**
 * Edit account form.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_edit_account_form'); ?>

<form class="woocommerce-EditAccountForm edit-account bg-gray-900 p-6 rounded-lg shadow-lg" action="" method="post" <?php do_action('woocommerce_edit_account_form_tag'); ?>>

    <?php do_action('woocommerce_edit_account_form_start'); ?>

    <p class="text-gray-400">
        <label for="account_first_name" class="text-gray-300"><?php esc_html_e('First name', 'woocommerce'); ?>&nbsp;<span class="required text-red-500">*</span></label>
        <input type="text" class="w-full p-2 rounded-lg bg-gray-700 text-gray-200" name="account_first_name" id="account_first_name" value="<?php echo esc_attr($user->first_name); ?>" />
    </p>

    <p class="text-gray-400">
        <label for="account_last_name" class="text-gray-300"><?php esc_html_e('Last name', 'woocommerce'); ?>&nbsp;<span class="required text-red-500">*</span></label>
        <input type="text" class="w-full p-2 rounded-lg bg-gray-700 text-gray-200" name="account_last_name" id="account_last_name" value="<?php echo esc_attr($user->last_name); ?>" />
    </p>

    <p class="text-gray-400">
        <label for="account_email" class="text-gray-300"><?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span class="required text-red-500">*</span></label>
        <input type="email" class="w-full p-2 rounded-lg bg-gray-700 text-gray-200" name="account_email" id="account_email" value="<?php echo esc_attr($user->user_email); ?>" />
    </p>

    <?php do_action('woocommerce_edit_account_form'); ?>

    <p class="text-gray-400">
        <button type="submit" class="bg-purple-500 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded-lg text-sm" name="save_account_details" value="<?php esc_attr_e('Save changes', 'woocommerce'); ?>"><?php esc_html_e('Save changes', 'woocommerce'); ?></button>
        <?php wp_nonce_field('save_account_details', 'save-account-details-nonce'); ?>
        <input type="hidden" name="action" value="save_account_details" />
    </p>

    <?php do_action('woocommerce_edit_account_form_end'); ?>
</form>

<?php do_action('woocommerce_after_edit_account_form'); ?>