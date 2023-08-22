<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "web_tp2";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Koneksi Gagal: " . $conn->connect_error);
}
echo "Koneksi Berhasil";
?>