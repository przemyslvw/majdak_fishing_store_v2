<?php

/**
 *
 * @link https://majdak.online
 *
 * @package WordPress
 * @subpackage majdak_online_store_v2
 * @since 1.0.0
 */
function majdakonline_enqueue_bootstrap()
{
    error_log('Enqueue Bootstrap: Start');
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3', 'all');
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.3', true);
    error_log('Enqueue Bootstrap: Done');
}

add_action('wp_enqueue_scripts', 'majdakonline_enqueue_bootstrap');
