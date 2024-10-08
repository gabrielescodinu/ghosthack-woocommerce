<?php

/**
 * My Orders template.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined('ABSPATH') || exit;

$my_orders_columns = wc_get_account_orders_columns();
$customer_orders   = wc_get_orders(apply_filters('woocommerce_my_account_my_orders_query', array('customer' => get_current_user_id(), 'limit' => $order_count)));

if ($customer_orders) : ?>

    <div class="bg-gray-900 p-6 rounded-lg shadow-lg mb-6">
        <h2 class="text-2xl font-bold text-white mb-4"><?php echo apply_filters('woocommerce_my_account_my_orders_title', esc_html__('I tuoi ordini recenti', 'woocommerce')); ?></h2>

        <div class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table bg-gray-800 text-gray-300">
            <table class="w-full">
                <thead>
                    <tr class="text-left bg-gray-700 text-gray-100">
                        <?php foreach ($my_orders_columns as $column_id => $column_name) : ?>
                            <th class="px-4 py-2"><?php echo esc_html($column_name); ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-700">
                    <?php foreach ($customer_orders as $customer_order) :
                        $order      = wc_get_order($customer_order); // Get the order object.
                        $item_count = $order->get_item_count() - $order->get_item_count_refunded();
                    ?>
                        <tr class="bg-gray-800 hover:bg-gray-700">
                            <?php foreach ($my_orders_columns as $column_id => $column_name) : ?>
                                <td class="px-4 py-2">
                                    <?php if (has_action('woocommerce_my_account_my_orders_column_' . $column_id)) : ?>
                                        <?php do_action('woocommerce_my_account_my_orders_column_' . $column_id, $order); ?>
                                    <?php elseif ('order-number' === $column_id) : ?>
                                        <a href="<?php echo esc_url($order->get_view_order_url()); ?>" class="text-purple-400 hover:text-purple-600 font-bold">
                                            #<?php echo esc_html($order->get_order_number()); ?>
                                        </a>
                                    <?php elseif ('order-date' === $column_id) : ?>
                                        <time datetime="<?php echo esc_attr($order->get_date_created()->date('c')); ?>" class="text-gray-400">
                                            <?php echo esc_html(wc_format_datetime($order->get_date_created())); ?>
                                        </time>
                                    <?php elseif ('order-status' === $column_id) : ?>
                                        <span class="text-gray-200"><?php echo esc_html(wc_get_order_status_name($order->get_status())); ?></span>
                                    <?php elseif ('order-total' === $column_id) : ?>
                                        <span class="text-gray-200"><?php echo wp_kses_post(sprintf(_n('%1$s for %2$s item', '%1$s for %2$s items', $item_count, 'woocommerce'), $order->get_formatted_order_total(), $item_count)); ?></span>
                                    <?php elseif ('order-actions' === $column_id) : ?>
                                        <?php
                                        $actions = wc_get_account_orders_actions($order);

                                        if (! empty($actions)) {
                                            foreach ($actions as $key => $action) {
                                                echo '<a href="' . esc_url($action['url']) . '" class="bg-purple-500 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded-lg text-sm mr-2">' . esc_html($action['name']) . '</a>';
                                            }
                                        }
                                        ?>
                                    <?php endif; ?>
                                </td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

<?php else : ?>
    <div class="bg-gray-800 p-4 rounded-lg shadow-lg text-center">
        <p class="text-gray-300"><?php esc_html_e('Non hai ancora effettuato ordini.', 'woocommerce'); ?></p>
    </div>
<?php endif; ?>