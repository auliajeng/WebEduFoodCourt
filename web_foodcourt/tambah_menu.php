<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$host = "localhost";
$user = "root";
$pass = "";
$db = "web_foodcourt";
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kedai = $_POST['kedai'];
    $nama_menu = $_POST['nama_menu'];
    $harga = $_POST['harga'];

    if (!empty($kedai) && !empty($nama_menu) && !empty($harga)) {
        $stmt = $conn->prepare("INSERT INTO menu (kedai, nama_menu, harga) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $kedai, $nama_menu, $harga);
        if ($stmt->execute()) {
            $message = "✅ Menu berhasil ditambahkan!";
        } else {
            $message = "❌ Gagal menambahkan menu.";
        }
    } else {
        $message = "⚠️ Semua field wajib diisi.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu</title>
    <style>
        body {
            background: linear-gradient(to right, #43cea2, #185a9d);
            font-family: 'Segoe UI', sans-serif;
            color: #fff;
            padding: 40px;
            text-align: center;
        }
        form {
            background: rgba(255,255,255,0.15);
            padding: 30px;
            border-radius: 15px;
            display: inline-block;
            text-align: left;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: none;
        }
        button {
            padding: 10px 20px;
            background: #0f5789;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover {
            background: #1570b8;
        }
        .message {
            margin-top: 15px;
            font-weight: bold;
        }
        a {
            color: #fff;
            display: block;
            margin-top: 20px;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Tambah Menu Baru</h2>

    <?php if ($message): ?>
        <div class="message"><?= $message ?></div>
    <?php endif; ?>

    <form method="post">
        <label for="kedai">Nama Kedai:</label>
        <select name="kedai" required>
            <option value="">-- Pilih Kedai --</option>
            <?php
            $stalls = [
                "Waroeng Cilikan", "Kedai Jajan Dulu", "Kedai Dilla", "Es Teller Sultan",
                "Bakso Cuangki", "Tahu Walik dan Aci", "Pangsit Kuah dan Jus Buah",
                "RITS eatery", "Cirambay", "Kedai CER"
            ];
            foreach ($stalls as $stall) {
                echo "<option value=\"$stall\">$stall</option>";
            }
            ?>
        </select>

        <label for="nama_menu">Nama Menu:</label>
        <input type="text" name="nama_menu" required>

        <label for="harga">Harga (Rp):</label>
        <input type="number" name="harga" required>

        <button type="submit">Tambah</button>
    </form>

    <a href="index.php">&larr; Kembali ke Dashboard</a>
</body>
</html>
