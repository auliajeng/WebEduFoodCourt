<?php
include "koneksi.php";

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $hashed   = password_hash($password, PASSWORD_DEFAULT);

    // Cek apakah username atau email sudah digunakan
    $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' OR email='$email'");
    if (mysqli_num_rows($cek) > 0) {
        $error = "Username atau Email sudah terdaftar.";
    } else {
        // Simpan user baru
        $query = mysqli_query($koneksi, "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed')");
        if ($query) {
            header("Location: login.php");
            exit;
        } else {
            $error = "Pendaftaran gagal. Silakan coba lagi.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up - Web Foodcourt</title>
    <style>
        body {
            background: linear-gradient(to right, #43cea2, #185a9d);
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .signup-box {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            width: 300px;
            text-align: center;
        }
        .signup-box h2 {
            margin-bottom: 20px;
            color: #185a9d;
        }
        .signup-box input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        .signup-box button {
            width: 100%;
            padding: 12px;
            background: #185a9d;
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
        }
        .error {
            background: #e74c3c;
            color: white;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="signup-box">
        <h2>Sign Up Foodcourt</h2>
        <?php if (!empty($error)): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit" name="signup">Daftar</button>
        </form>
                <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>

    </div>
</body>
</html>
