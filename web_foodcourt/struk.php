<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $kedai = $_POST['kedai'] ?? '';
    $menu_ids = $_POST['menu_ids'] ?? [];
    $nama_menus = $_POST['nama_menus'] ?? [];
    $hargas = $_POST['hargas'] ?? [];
    $jumlahs = $_POST['jumlahs'] ?? [];
    $catatans = $_POST['catatans'] ?? [];
    $bayar = intval($_POST['bayar'] ?? 0);

    $total = 0;
    $items = [];

    foreach ($menu_ids as $i => $id) {
        $jumlah = intval($jumlahs[$i]);
        if ($jumlah > 0) {
            $harga = intval($hargas[$i]);
            $subtotal = $harga * $jumlah;
            $total += $subtotal;
            $items[] = [
                'nama' => $nama_menus[$i],
                'harga' => $harga,
                'jumlah' => $jumlah,
                'catatan' => $catatans[$i],
                'subtotal' => $subtotal
            ];
        }
    }

    $kembali = $bayar - $total;
} else {
    header("Location: menu.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Struk Pemesanan</title>
    <style>
        body {
            background: linear-gradient(to right, #43cea2, #185a9d);
            font-family: 'Courier New', Courier, monospace;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .receipt {
            background-color: white;
            padding: 22px;
            border-radius: 15px;
            text-align: center;
            width: 300px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
        .receipt h1 {
            margin: 0;
            font-size: 19px;
            font-weight: bold;
        }
        .receipt h2 {
            margin: 6px 0 14px;
            font-size: 15px;
            font-weight: bold;
            color: #333;
        }
        .item {
            margin: 10px 0;
            text-align: left;
        }
        .item .name {
            font-weight: bold;
        }
        .item .subtotal {
            font-family: monospace;
        }
        .line {
            border-top: 1px dashed #999;
            margin: 10px 0;
        }
        .totals {
            text-align: left;
            font-weight: bold;
            font-size: 14px;
            margin-top: 10px;
        }
        .back-button {
            margin-top: 16px;
            background-color: #28a745;
            color: white;
            border: none;
            padding: 8px 18px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
        }
        .back-button:hover {
            background-color: #218838;
        }
        .datetime {
            font-size: 12px;
            margin-bottom: 10px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="receipt">
        <h1>EDU FOOD COURT SMEA</h1>
        <h2><?= htmlspecialchars($kedai) ?></h2>

        <div class="datetime">
            <?= date('l, F j, Y') ?> - <?= date('H:i') ?>
        </div>

        <?php foreach ($items as $item): ?>
            <div class="item">
                <div class="name"><?= htmlspecialchars($item['nama']) ?></div>
                <div class="subtotal">
                    Rp <?= number_format($item['harga'], 0, ',', '.') ?>
                    x <?= $item['jumlah'] ?> = Rp <?= number_format($item['subtotal'], 0, ',', '.') ?>
                </div>
                <?php if (!empty($item['catatan'])): ?>
                    <small>Catatan: <?= htmlspecialchars($item['catatan']) ?></small>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>

        <div class="line"></div>

        <div class="totals">
            Total: Rp <?= number_format($total, 0, ',', '.') ?><br>
            Bayar: Rp <?= number_format($bayar, 0, ',', '.') ?><br>
            Kembali: Rp <?= number_format($kembali, 0, ',', '.') ?>
        </div>

        <a href="index.php" class="back-button">Kembali ke Beranda</a>
    </div>
</body>
</html>
