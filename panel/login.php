<?php
session_start();
if(isset($_SESSION['email'])) {
    echo '<script>window.location.replace("./index.php");</script>';
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: rgb(224,243,246);
            background: linear-gradient(150deg, rgba(224,243,246,1) 27%, rgba(255,255,0,1) 100%);
            
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
        }

        form {
            max-width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        input[type="email"],
        input[type="password"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #121212;
            color: #ffff00;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #ffffff;
        }
    </style>
</head>
<body>
    <h1>Login</h1>
    <form action="./ceklogin.php" method="post">
        <center>
            <img src="../assets/logo.ico" alt="" width="150px">
        </center><br>
        <input type="email" name="email" placeholder="Email" alt="email" required="required"><br>
        <input type="password" name="password" placeholder="Password" alt="password" required="required"><br><br>
        <input type="submit" name="Login" value="Login" alt="submit">
        
    </form>
</body>
</html>
<?php } ?>
