<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <!-- CSS -->
  <style>
    body {
      font-family: Arial, sans-serif;
      background: rgb(224,243,246);
      background: linear-gradient(150deg, rgba(224,243,246,1) 27%, rgba(255,255,0,1) 100%);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .container {
      background-color: #fff;
      border-radius: 5px;
      padding: 60px;
      max-width: 400px;
      width: 100%;
      box-shadow: 15px 15px;
      
    }

    h2 {
      text-align: center;
      color: #333;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      color: #666;
    }

    .form-group input {
      width: 95%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    .form-group button {
      width: 100%;
      padding: 12px;
      background-color: #121212;
      color: #ffffff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
      font-weight: bold;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .form-group button:hover {
      background-color: #136673;
    }
  </style>
  <link rel="icon" type="image/x-icon" href="../assets/logo.ico" />
</head>
<body>
  <div class="container">
    <center>
    <img src="../assets/logo.ico" alt="" style="width:150px">
  </center>
    <h2>Login SMK TERPUT 2 BEKASI</h2>
    <form id="loginForm">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" required>
      </div>
      <div class="form-group">
        <button type="submit">Log In</button>
      </div>
    </form>
</body>
</html>
