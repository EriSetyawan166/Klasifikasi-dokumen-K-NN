<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "klasifikasi";

// Menghubungkan ke database
$conn = mysqli_connect($host, $username, $password, $dbname);

// Mengecek koneksi
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


?>