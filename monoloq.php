<?php
/**
 * Plugin Name: Monoloq
 * Plugin URI: https://monoloq.ai/
 * Description: Boost your sales with Monoloq's AI-powered sales assistant for your WooCommerce store.
 * Version: 1.0.3
 * Author: Paraloq Analytics GmbH
 * License: GPL2
 */

// Define plugin constants
define( 'MONOLOQ_FILE', __FILE__ );
define( 'MONOLOQ_BASENAME', plugin_basename( MONOLOQ_FILE ) );
define( 'MONOLOQ_DIR', plugin_dir_path( MONOLOQ_FILE ) );

// Load plugin documentation
function monoloq_docs_url() {
    return 'https://docs.monoloq.ai';
}

function monoloq_docs_link() {
    $docs_link = '<a href="' . esc_url( monoloq_docs_url() ) . '" target="_blank">' . __( 'Documentation', 'monoloq' ) . '</a>';
    return $docs_link;
}

function monoloq_action_links( $links ) {
    $action_links = array(
        'docs' => monoloq_docs_link(),
        'settings' => '<a href="https://app.monoloq.ai" target="_blank">' . __( 'Settings', 'monoloq' ) . '</a>',
    );
    return array_merge( $action_links, $links );
}

add_filter( 'plugin_action_links_' . MONOLOQ_BASENAME, 'monoloq_action_links' );

function monoloq_enqueue_scripts() {
    wp_enqueue_script(
        'monoloq-widget',
        'https://cdn.jsdelivr.net/gh/paraloq/chat_widget/umd/monoloq-widget.umd.js',
        array(),
        null,
        true
    );
}

add_action( 'wp_enqueue_scripts', 'monoloq_enqueue_scripts' );
