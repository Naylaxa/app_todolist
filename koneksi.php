<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_todolist_app");
if (mysqli_connect_errno()){
    echo "Koneksi database gagal : " . mysqli_connect_error(); //jika koneksi databse gagal
} 

$host = 'localhost';
$db = 'db_todolist_app';
$user = 'root';
$pass = '';

try {
$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
die("Could not connect to the database $db :" . $e->getMessage());
}
?>
