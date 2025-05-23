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

$kedai = $_GET['kedai'] ?? '';
$kedai_safe = $conn->real_escape_string($kedai);
$result = $conn->query("SELECT * FROM menu WHERE kedai = '$kedai_safe' ORDER BY id ASC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Menu di <?= htmlspecialchars($kedai) ?></title>
    <style>
        body {
            background: linear-gradient(to right, #43cea2, #185a9d);
            font-family: 'Segoe UI', sans-serif;
            color: white;
            text-align: center;
            padding: 40px;
        }
        table {
            margin: auto;
            border-collapse: collapse;
            width: 90%;
            background-color: rgba(255,255,255,0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ffffff44;
            color: white;
        }
        th {
            background-color: rgba(0, 51, 102, 0.8);
        }
        td {
            background-color: rgba(0, 102, 204, 0.2);
        }
        input[type="number"] {
            width: 60px;
            padding: 6px;
            border-radius: 4px;
            border: none;
        }
        textarea {
            resize: none;
            width: 180px;
            padding: 6px;
            border-radius: 4px;
            border: none;
            font-family: 'Segoe UI', sans-serif;
        }
        .submit-btn {
            margin-top: 20px;
            padding: 10px 25px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }
        .submit-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h2>Menu di <?= htmlspecialchars($kedai) ?></h2>
    <form method="POST" action="struk.php">
        <input type="hidden" name="kedai" value="<?= htmlspecialchars($kedai) ?>">
        <table>
            <tr>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Catatan</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td>
                    <?= htmlspecialchars($row['nama_menu']) ?>
                    <input type="hidden" name="menu_ids[]" value="<?= $row['id'] ?>">
                    <input type="hidden" name="nama_menus[]" value="<?= htmlspecialchars($row['nama_menu']) ?>">
                    <input type="hidden" name="hargas[]" value="<?= $row['harga'] ?>">
                </td>
                <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                <td><input type="number" name="jumlahs[]" min="0" step="1" value="0" oninput="this.value = this.value.replace(/^0+/, '')"></td>
                <td><textarea name="catatans[]" rows="2" placeholder=></textarea></td>
            </tr>
            <?php endwhile; ?>
        </table>
        <br>
        <label>Bayar (Rp): <input type="number" name="bayar" required></label><br><br>
        <button class="submit-btn" type="submit">Cetak Struk</button>
    </form>
</body>
</html>
