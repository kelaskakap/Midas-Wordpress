<?php

/**
 * Plugin Name: Midas – Kalkulator Emas
 * Description: Plugin untuk menghitung harga jual/beli emas menggunakan Metals.Dev API.
 * Version: 1.0
 * Author: kelaskakap
 */

if (!defined('ABSPATH')) exit;

// Inklusi file yang diperlukan
require_once plugin_dir_path(__FILE__) . 'includes/admin-settings.php';
require_once plugin_dir_path(__FILE__) . 'includes/api-handler.php';
require_once plugin_dir_path(__FILE__) . 'includes/widget.php';

function midas_enqueue_assets()
{
    wp_enqueue_style('midas-style', plugin_dir_url(__FILE__) . 'assets/css/midas-style.css');
    wp_enqueue_script('midas-script', plugin_dir_url(__FILE__) . 'assets/js/midas-script.js', ['jquery'], false, true);

    wp_localize_script('midas-script', 'midas_ajax_url', admin_url('admin-ajax.php'));
}
add_action('wp_enqueue_scripts', 'midas_enqueue_assets');


// Registrasi shortcode
function midas_shortcode()
{
    ob_start();
    include plugin_dir_path(__FILE__) . 'includes/midas-form.php';
    return ob_get_clean();
}
add_shortcode('midas_kalkulator', 'midas_shortcode');

// Registrasi widget
function midas_register_widget()
{
    register_widget('Midas_Widget');
}
add_action('widgets_init', 'midas_register_widget');

// Fungsi untuk menghitung harga emas berdasarkan input pengguna
function midas_calculate_gold_price()
{
    // Ambil data dari POST request
    $transaction_type = $_POST['transaction_type'];
    $amount_type = $_POST['amount_type'];
    $amount_value = floatval($_POST['amount_value']);

    // Ambil harga emas dalam IDR dan harga buyback dari API
    $gold_price_idr = midas_get_gold_price_in_idr(); // Fungsi untuk dapatkan harga emas dalam IDR
    $buyback_price = $gold_price_idr * 0.925;  // 92.5% dari harga jual

    // Inisialisasi variabel result
    $result = 0;

    // Jika transaksi beli (buy)
    if ($transaction_type === 'buy')
    {
        if ($amount_type === 'idr')
        {
            // Input dalam Rupiah, hasilkan gram yang bisa dibeli
            $result = $amount_value / $gold_price_idr;
        }
        else
        {
            // Input dalam gram, hasilkan total harga yang harus dibayar dalam Rupiah
            $result = $amount_value * $gold_price_idr;
        }
    }
    // Jika transaksi jual (sell)
    elseif ($transaction_type === 'sell')
    {
        if ($amount_type === 'idr')
        {
            // Input dalam Rupiah, hasilkan berapa gram emas yang harus diserahkan
            $result = $amount_value / $buyback_price;
        }
        else
        {
            // Input dalam gram, hasilkan total uang yang didapat dalam Rupiah
            $result = $amount_value * $buyback_price;
        }
    }
    // Kirim hasil kalkulasi dalam format JSON
    wp_send_json_success(['result' => round($result, 4)]);
}

add_action('wp_ajax_calculate_gold_price', 'midas_calculate_gold_price');
add_action('wp_ajax_nopriv_calculate_gold_price', 'midas_calculate_gold_price');

function midas_force_enqueue()
{
    if (is_active_widget(false, false, 'midas_widget', true))
    {
        midas_enqueue_assets();
    }
}
add_action('wp_footer', 'midas_force_enqueue');
