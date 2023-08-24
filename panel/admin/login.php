<?php
session_start();
include 'conn.php';

//cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  $db = mysqli_query($conn, "SELECT username FROM user WHERE id_user = '$id'");

  $row = mysqli_fetch_assoc($db);

  //cek cookie dengan username
  if ($key === hash('sha256', $row['username'])) {
    $_SESSION['login'] = true;
  }
}

//masuk ke session
if (isset($_SESSION["login"])) {
  header("Location: index.php");
}
//cek username dan password
if (isset($_POST['login'])) {
  $username = htmlspecialchars($_POST["username"]);
  $password = htmlspecialchars($_POST["password"]);

  $cek = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

  if (mysqli_num_rows($cek) === 1) {
    //cek password
    $row = mysqli_fetch_assoc($cek);
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['id_user'] = $row['id_user'];
    if ($row['hak_akses'] == 'admin') {
      $_SESSION['username'] = $username;
      $_SESSION['hak_akses'] = 'admin';
      if (password_verify($password, $row['password'])) {
        //cek dan buat session
        $_SESSION['login'] = true;
        //buat dan cek cookie
        if (isset($_POST['remember'])) {
          setcookie('id', $row['id_user'], time() + 60);
          setcookie('key', hash('sha256', $row['username']), time() + 60);
        }
        echo "
    <script>
        alert('Login Admin Berhasil!');
        document.location.href='index.php';
    </script>
    ";
      }
    } else if ($row['hak_akses'] == 'operator') {
      $_SESSION['username'] = $username;
      $_SESSION['hak_akses'] = 'operator';
      if (password_verify($password, $row['password'])) {
        //cek dan buat session
        $_SESSION['login'] = true;
        //buat dan cek cookie
        if (isset($_POST['remember'])) {
          setcookie('id', $row['id_user'], time() + 60);
          setcookie('key', hash('sha256', $row['username']), time() + 60);
        }
        echo "
    <script>
        alert('Login Operator Berhasil!');
        document.location.href='index.php';
    </script>
    ";
      }
    } else {
      $_SESSION['username'] = '';
      $_SESSION['hak_akses'] = '';
      echo "
    <script>
        alert('Login Gagal!');
        document.location.href='login.php';
    </script>
    ";
    }
  }
  $error = true;
}
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
