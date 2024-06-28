<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'db_crud';
$conn = mysqli_connect($host, $user, $pass, $db);
if ($conn) {
  //echo "Koneksi ke database berhasil";
}
mysqli_select_db($conn, $db);
