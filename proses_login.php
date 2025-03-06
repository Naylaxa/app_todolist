<?php
session_start();

//menghubungkan koneksi database
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
//mengambil inputan pengguna login
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'"; //mengambil data dari tabel users
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);

if ($row) {

    $_SESSION['id_user'] = $row['id_user'];
    $_SESSION['username'] = $row['username'];

    header("Location: index.php"); // jika berhasil mengarahkan ke indexx.php
    exit;
} else {
    header("Location: login.php?error=1"); //jika eror diarahkan ke halaman login kembali
    exit;
}}
?>
