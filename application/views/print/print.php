<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print</title>
</head>

<body>
    <center>
        <h2>Erenka Cafe & Space</h2>
        <hr>
    </center>
    <table style="margin-left: 15%;">
        <tr>
            <td>
                <table>
                    <tr>
                        <td><b>No. Pesanan</b></td>
                        <td>:</td>
                        <td><?= $data['no_pesanan'] ?></td>
                    </tr>
                    <tr>
                        <td><b>Nama</b></td>
                        <td>:</td>
                        <td><?= $data['nama'] ?></td>
                    </tr>
                    <tr>
                        <td><b>Password Wifi</b></td>
                        <td>:</td>
                        <td>cafegaul</td>
                    </tr>
                </table>
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <table>
                    <tr>
                        <td><b>Kasir</b></td>
                        <td>:</td>
                        <td><?= $_SESSION['nama'] ?></td>
                    </tr>
                    <tr>
                        <td><b>Tipe</b></td>
                        <td>:</td>
                        <td><?= $data['is_reservasi'] ? 'Reservasi' : 'Dine In' ?></td>
                    </tr>
                    <tr>
                        <td><b>Waktu</b></td>
                        <td>:</td>
                        <td><?= $data['date_created'] ?></td>
                    </tr>
                </table>
        </tr>
    </table>
    </td>
    </tr>
    </table>
    <br><br>
    <center>
        <table border="1" style="width: 70%;">
            <!-- Head -->
            <tr>
                <th style="text-align: center;">#</th>
                <th style="text-align: center;">Item</th>
                <th style="text-align: center;">Harga</th>
                <th style="text-align: center;">Qty</th>
                <th style="text-align: center;">Total</th>
            </tr>
            <!-- End Head -->
            <!-- Body -->
            <?php $subtotal = 0;
            $no = 1;
            foreach ($items as $item) : ?>
                <tr>
                    <td style="text-align: center;"><?= $no ?></td>
                    <td style="text-align: center;"><?= $item['kopi'] ?></td>
                    <td style="text-align: center;">Rp <?= number_format($item['harga'], 0, '', '.') ?></td>
                    <td style="text-align: center;"><?= $item['quantity'] ?></td>
                    <td style="text-align: right;padding-right: 20px;">Rp <?= number_format(($item['harga'] * $item['quantity']), 0, '', '.') ?></td>
                </tr>
            <?php $subtotal += $item['harga'] * $item['quantity'];
                $no++;
            endforeach; ?>

            <!-- <tr>
                <td style="text-align: center;">1</td>
                <td style="text-align: center;">Arabika</td>
                <td style="text-align: center;">2</td>
                <td style="text-align: right;padding-right: 20px;">Rp 20.000</td>
            </tr> -->
            <!-- End Body -->
            <!-- Foot -->
            <tr>
                <th colspan="4" style="text-align: center; border: none;">Subtotal</th>
                <th style="text-align: right;padding-right: 20px;">Rp <?= number_format($subtotal, 0, '', '.') ?></th>
            </tr>
            <!-- End Foot -->
        </table>
    </center>
</body>
<script>
    window.print();
</script>

</html>