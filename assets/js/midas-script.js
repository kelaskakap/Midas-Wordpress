jQuery(document).ready(function ($) {
    $(document).on('submit', '.midas-form', function (e) {
        e.preventDefault();

        const $form = $(this);
        const transactionType = $form.find('.transaction_type').val();
        const amountType = $form.find('.amount_type').val();
        const amountValue = parseFloat($form.find('.amount_value').val());
        const $loading = $form.find('.midas-loading');
        const $result = $form.find('.midas-result');

        if (isNaN(amountValue) || amountValue <= 0) {
            alert("Jumlah yang dimasukkan tidak valid.");
            return;
        }

        $loading.show();
        $result.html("");

        $.ajax({
            url: midas_ajax_url,
            type: 'POST',
            data: {
                action: 'calculate_gold_price',
                transaction_type: transactionType,
                amount_type: amountType,
                amount_value: amountValue
            },
            success: function (response) {
                $loading.hide();

                if (response.success) {
                    let output = '';

                    if (transactionType === 'buy') {
                        output = (amountType === 'idr')
                            ? `Jumlah emas yang bisa dibeli: ${response.data.result} gram`
                            : `Total harga emas yang harus dibayar: ${formatRupiah(response.data.result)} IDR`;
                    } else {
                        output = (amountType === 'idr')
                            ? `Jumlah emas yang harus diserahkan: ${response.data.result} gram`
                            : `Total uang yang didapat: ${formatRupiah(response.data.result)} IDR`;
                    }

                    $result.html(output);
                } else {
                    $result.html("Gagal melakukan perhitungan. Coba lagi.");
                }
            },
            error: function () {
                $loading.hide();
                alert("Terjadi kesalahan saat menghitung.");
            }
        });
    });

    function formatRupiah(angka) {
        return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
            minimumFractionDigits: 0
        }).format(angka);
    }
});
