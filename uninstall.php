<?php
// Hentikan langsung jika tidak dipanggil oleh WordPress
if (!defined('WP_UNINSTALL_PLUGIN'))
{
    die;
}

// Hapus opsi yang disimpan plugin
delete_option('midas_api_key');

// Jika kamu menyimpan lebih banyak setting nanti, bisa tambahkan di sini
// delete_option('midas_something_else');
