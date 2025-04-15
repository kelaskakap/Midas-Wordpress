<?php
function midas_add_admin_menu()
{
    add_options_page(
        'Midas Settings',
        'Midas',
        'manage_options',
        'midas',
        'midas_settings_page'
    );
}
add_action('admin_menu', 'midas_add_admin_menu');

function midas_settings_page()
{
?>
    <div class="wrap">
        <h1>Pengaturan Midas</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('midas_settings_group');
            do_settings_sections('midas');
            submit_button();
            ?>
        </form>
        <h2>Petunjuk Penggunaan</h2>
        <p>Gunakan shortcode <code>[midas_kalkulator]</code> untuk menampilkan kalkulator di halaman atau postingan.</p>
        <p>Untuk menampilkan sebagai widget, tambahkan widget "Midas" melalui menu Tampilan > Widget.</p>
    </div>
<?php
}

function midas_register_settings()
{
    register_setting('midas_settings_group', 'midas_api_key');

    add_settings_section(
        'midas_settings_section',
        'Kredensial API',
        null,
        'midas'
    );

    add_settings_field(
        'midas_api_key',
        'API Key',
        'midas_api_key_callback',
        'midas',
        'midas_settings_section'
    );
}
add_action('admin_init', 'midas_register_settings');

function midas_api_key_callback()
{
    $api_key = get_option('midas_api_key');
    echo "<input type='text' name='midas_api_key' value='" . esc_attr($api_key) . "' size='50' />";
}
