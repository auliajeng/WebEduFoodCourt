<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "web_foodcourt");
if ($conn->connect_error) die("Koneksi gagal: " . $conn->connect_error);

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$message = '';

if ($id <= 0) {
    echo "ID menu tidak valid.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_menu = $_POST['nama_menu'];
    $harga = $_POST['harga'];

    $stmt = $conn->prepare("UPDATE menu SET nama_menu=?, harga=? WHERE id=?");
    $stmt->bind_param("sii", $nama_menu, $harga, $id);
    if ($stmt->execute()) {
        $message = "✅ Menu berhasil diperbarui.";
    } else {
        $message = "❌ Gagal memperbarui menu.";
    }
}

$result = $conn->query("SELECT * FROM menu WHERE id=$id");
if ($result->num_rows == 0) {
    echo "Data menu tidak ditemukan.";
    exit;
}
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Menu</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #43cea2, #185a9d);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: #ffffff20;
            padding: 30px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            width: 100%;
            max-width: 500px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: white;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
        }

        button {
            width: 100%;
            background: #185a9d;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 10px;
            cursor: pointer;
        }

        button:hover {
            background: #1570b8;
        }

        .message {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Edit Menu</h2>

    <?php if ($message): ?>
        <div class="message"><?= $message ?></div>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="nama_menu" placeholder="Nama Menu" required value="<?= htmlspecialchars($row['nama_menu']) ?>">
        <input type="number" name="harga" placeholder="Harga (angka)" required value="<?= $row['harga'] ?>">
        <button type="submit">Simpan Perubahan</button>
    </form>
</div>

</body>
</html>
