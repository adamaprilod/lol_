<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        center {
            max-width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    if (isset($_SESSION['email'])) {
        session_destroy();
    ?>
        <meta http-equiv="refresh" content="2; url=./login.php"/>
        <center>
            <h2>Berhasil Logout</h2>
            Kamu akan dialihkan kembali ke halaman login dalam 2 detik.
        </center>
    <?php
    } else {
    ?>
        <meta http-equiv="refresh" content="2; url=./login.php"/>
        <center>
            <h2>Gagal Logout</h2>
            Silahkan login terlebih dahulu.<br/><br/>
            Kamu akan dialihkan kembali ke halaman login dalam 2 detik.
        </center>
    <?php
    }
    ?>
</body>
</html>
