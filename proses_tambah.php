<?php
include 'koneksi.php'; //menghubungkan koneksi database

//hanya mengijinkan pengguna yang sudah login untuk mengakses halaman
session_start();
if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit;
}

//mengambil hasil inputan pengguna
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $category = $_POST['category'];
    $user = $_SESSION['id_user'];

    //menambahkan hasil inputan ke database
    $sql = "INSERT INTO to_do (title, description, created_at, updated_at, status, id_category, id_user) VALUES (?, ?, current_timestamp(), current_timestamp(), ?, ?, ?)";
    $stmt = $koneksi->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssss", $title, $description, $status, $category, $user);

        if ($stmt->execute()) {
            echo "<script>alert('Tambah To Do Berhasil!'); window.location.href='index.php';</script>"; //jika berhasil menampilkan alert
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing query: " . $koneksi->error;
    }

    $koneksi->close();
}

?>
