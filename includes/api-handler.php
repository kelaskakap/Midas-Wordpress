<?php

function midas_get_gold_price_in_idr()
{
    $api_key = get_option('midas_api_key');
    // URL untuk ambil harga emas dan kurs USD ke IDR dalam satu call
    $url = "https://api.metals.dev/v1/latest?api_key={$api_key}&currency=USD&unit=g";

    $response = wp_remote_get($url);

    if (is_wp_error($response))
    {
        return false;  // Error jika API gagal
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    if (isset($data['status']) && $data['status'] === 'success')
    {
        // Ambil harga emas dalam USD per gram
        $gold_price_usd = $data['metals']['gold'];

        // Ambil kurs USD ke IDR
        $usd_to_idr = 1 / $data['currencies']['IDR'];

        // Konversi harga emas ke IDR
        $gold_price_idr = $gold_price_usd * $usd_to_idr;

        return $gold_price_idr;  // Kembalikan harga emas dalam IDR
    }

    return 0;
}