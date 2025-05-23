<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Web Foodcourt</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #185a9d, #43cea2);
            color: #333;
        }

        .header {
            text-align: center;
            padding: 40px 20px 10px;
            color: white;
        }

        .header h1 {
            margin: 0;
            font-size: 48px;
        }

        .header p {
            margin-top: 10px;
            font-size: 18px;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 30px;
            padding: 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            transition: transform 0.2s;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 150px;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h3 {
            margin: 0 0 15px;
            font-size: 20px;
            color: #185a9d;
        }

        .btn {
            padding: 10px 20px;
            background: #185a9d;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
        }

        .btn:hover {
            background: #1570b8;
        }

        .footer {
            text-align: center;
            padding: 20px;
            background: #111;
            color: white;
            margin-top: 40px;
        }

        @media (max-width: 1000px) {
            .grid-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .grid-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>EDU FOOD COURT</h1>
        <p>Berbagai makanan dan minuman yang lezat dan murah!</p>
    </div>

    <div class="grid-container">
        <?php
        $stalls = [
            "Waroeng Cilikan", "Kedai Jajan Dulu", "Kedai Dilla", "Es Teller Sultan",
            "Bakso Cuangki", "Tahu Walik dan Aci", "Pangsit Kuah dan Jus Buah",
            "RITS eatery", "Cirambay", "Kedai CER"
        ];

        foreach ($stalls as $stall) {
            $encodedStall = urlencode($stall);
            echo "<div class='card'>
                    <h3>$stall</h3>
                    <a href='menu.php?kedai=$encodedStall' class='btn'>Menu</a>
                  </div>";
        }
        ?>
    </div>

    <div class="footer">
        &copy; 2024 Edu Food Court SMKN 1 Wonosobo
    </div>

</body>
</html>
