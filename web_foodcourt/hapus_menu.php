<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "web_foodcourt");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$id = $_GET['id'] ?? null;

// Jika tombol hapus dikonfirmasi
if (isset($_POST['konfirmasi_hapus'])) {
    $id_hapus = $_POST['id_hapus'];
    $kedai = $_POST['kedai'];

    $stmt = $conn->prepare("DELETE FROM menu WHERE id = ?");
    $stmt->bind_param("i", $id_hapus);
    $stmt->execute();

    header("Location: menu.php?kedai=" . urlencode($kedai));
    exit;
}

// Ambil data menu berdasarkan ID
if ($id) {
    $stmt = $conn->prepare("SELECT * FROM menu WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $menu = $result->fetch_assoc();
} else {
    $menu = null;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi Hapus Menu</title>
    <style>
        body {
            background: linear-gradient(to right, #43cea2, #185a9d);
            font-family: 'Segoe UI', sans-serif;
            color: white;
            text-align: center;
            padding: 50px;
        }
        .box {
            background: rgba(255,255,255,0.1);
            padding: 30px;
            border-radius: 10px;
            display: inline-block;
        }
        button {
            padding: 10px 20px;
            margin: 10px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .yes {
            background-color: #c0392b;
            color: white;
        }
        .no {
            background-color: #2ecc71;
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <?php if ($menu): ?>
        <div class="box">
            <h2>Yakin ingin menghapus menu ini?</h2>
            <p><strong><?= htmlspecialchars($menu['nama_menu']) ?></strong></p>
            <p>Harga: Rp <?= number_format($menu['harga'], 0, ',', '.') ?></p>

            <form method="post">
                <input type="hidden" name="id_hapus" value="<?= $menu['id'] ?>">
                <input type="hidden" name="kedai" value="<?= htmlspecialchars($menu['kedai']) ?>">
                <button type="submit" name="konfirmasi_hapus" class="yes">Ya, Hapus</button>
                <a href="menu.php?kedai=<?= urlencode($menu['kedai']) ?>" class="no">Batal</a>
            </form>
        </div>
    <?php else: ?>
        <p>Menu tidak ditemukan.</p>
    <?php endif; ?>
</body>
</html>
