<?php
// Ambil harga emas dalam IDR per gram
$gold_price_idr = midas_get_gold_price_in_idr();
?>
<div style="text-align: center; padding: 20px;">
    <?php
    // Ambil harga emas saat ini
    if ($gold_price_idr)
    {
        echo "<h3>Harga Emas Saat Ini: " . number_format($gold_price_idr, 0, ',', '.') . " IDR/gram</h3>";
    }
    else
    {
        echo "<h3>Gagal mengambil harga emas.</h3>";
    }

    // Ambil harga buyback
    if ($gold_price_idr)
    {
        $gold_price_buyback_idr = $gold_price_idr * 0.925;  // 92.5% dari harga jual
        echo "<h4>Harga Buyback Emas: " . number_format($gold_price_buyback_idr, 0, ',', '.') . " IDR/gram (92.5% dari harga jual)</h4>";
    }
    ?>
</div>

<div class="midas-calculator">
    <form class="midas-form" method="POST">
        <label>Pilih Transaksi:</label>
        <select name="transaction_type" class="transaction_type">
            <option value="buy">Saya mau beli emas</option>
            <option value="sell">Saya mau jual emas (Buyback)</option>
        </select>

        <label>Pilih Jumlah:</label>
        <select name="amount_type" class="amount_type">
            <option value="gold">Gram Emas</option>
            <option value="idr">Rupiah</option>
        </select>

        <label>Jumlah:</label>
        <input type="number" name="amount_value" class="amount_value" step="any" required>

        <button type="submit" name="calculate">Hitung</button>
        <div class="midas-loading" style="display: none; text-align: center;">Sedang menghitung... ⏳</div>
        <div class="midas-result" style="margin-top: 20px; padding: 10px; border: 1px solid #ccc; background: #f9f9f9;"></div>
    </form>
</div>