<?php
include 'koneksi.php'; //menghubungkan koneksi database

$category = $koneksi->query("SELECT * FROM kategori"); //mengambil data tabel kategori
session_start();
//hanya mengijinkan pengguna yang sudah login untuk mengakses halaman
if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Todo</title>
    <link rel="stylesheet" href="css/tambah1.css">
</head>
<body>
<!-- navbar -->
<div class="navbar">
        <div class="left"> 
            <h2>TodoList</h2>
        </div>
       <div class="right">
        <a href="profil.php">Profil</a>
        <a href="logout.php">Logout</a>
       </div>
    </div>
    <div class="content">
        <h1>Tambah Tugas</h1>
        <!-- form tambah data dan jika sudah submit diproses oleh file proses_tambah.php -->
        <form action="proses_tambah.php" method="post"> 
            <label>Judul</label><br>
            <input type="text" name="title" required><br><br>
            <label>Deskripsi</label><br>
            <input type="text" name="description" required><br><br>
            <label>Kategori</label><br>
            <select id="category" name="category">
                <!-- mengambil data category di tabel kategori untuk ditambilkan dalam option -->
                <?php while($array=$category->fetch_assoc()){?>
                <option value="<?= $array['id_category'] ?>"><?= $array['category'] ?></option>
                <?php } ?>
            </select><br><br>
            <label>Status</label><br>
            <select id="status" name="status">
                <option value="1">Pending</option>
                <option value="2">Done</option>
            </select>
            <button type="submit">Tambah</button>
        </form>
        
    </div>
</body>
</html>