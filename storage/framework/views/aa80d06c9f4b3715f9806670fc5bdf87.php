<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Struk Pemesanan</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            max-width: 300px;
            margin: 20px auto;
            padding: 10px;
            border: 1px dashed #333;
            background: #fff;
            color: #000;
            font-size: 12px;
            line-height: 1.4;
        }
        .header, .footer {
            text-align: center;
            margin-bottom: 10px;
        }
        .header h2 {
            margin: 0 0 5px;
            font-weight: bold;
            font-size: 14px;
            letter-spacing: 1.5px;
        }
        .divider {
            border-top: 1px dashed #333;
            margin: 10px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        th, td {
            text-align: left;
            padding: 4px 0;
        }
        th {
            border-bottom: 1px dashed #333;
            font-weight: normal;
        }
        .total {
            font-weight: bold;
            font-size: 14px;
            margin-top: 10px;
        }
        .small-text {
            font-size: 10px;
            color: #555;
            margin-top: 15px;
        }
        button.print-btn {
            display: none; /* tidak butuh tombol cetak di struk ini */
        }

        /* Print Style */
        @media print {
            body {
                border: none;
                margin: 0;
                max-width: 100%;
            }
            .print-btn {
                display: none !important;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>TOKO AF</h2>
        <div>No. Pemesanan: <?php echo e($pemesanan->id); ?></div>
        <div><?php echo e($pemesanan->created_at->format('d/m/Y H:i')); ?></div>
    </div>

    <div class="divider"></div>

    <table>
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Qty</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo e($pemesanan->barang->nama); ?></td>
                <td><?php echo e($pemesanan->jumlah); ?></td>
                <td>Rp <?php echo e(number_format($pemesanan->total_harga, 0, ',', '.')); ?></td>
            </tr>
        </tbody>
    </table>

    <div class="divider"></div>

    <div class="total">
        Status: <?php echo e(ucfirst($pemesanan->status)); ?>

    </div>

    <div class="divider"></div>

    <div class="footer">
        <div>Terima kasih telah berbelanja!</div>
        <div class="small-text">Struk ini merupakan bukti transaksi yang sah.</div>
    </div>
</body>
</html>
<?php /**PATH C:\laragon\www\kasirhp\resources\views/pemesanan/struk.blade.php ENDPATH**/ ?>