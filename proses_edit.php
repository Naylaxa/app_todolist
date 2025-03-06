<?php
include 'koneksi.php'; //menghubungkan koneksi database

//memastikan hanya pengguna yang sudah login yang bisa mengakses halaman
session_start();
if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //mengambil hasil input
    $id = $_POST['id_todo'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $category = $_POST['category'];
    $user = $_SESSION['id_user'];

    //mengedit data di database
    $sql = "UPDATE to_do SET `title`=?, `description`=?, `updated_at`=current_timestamp(), `status`=?, `id_category`=?, `id_user`=? WHERE id_todo = ?";
    $stmt = $koneksi->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssssi", $title, $description, $status, $category, $user, $id);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) { //menampilkan alert
                echo "<script>alert('Edit To Do Berhasil!'); window.location.href='index.php';</script>";
            } else {
                echo "<script>alert('Tidak ada data yang diubah.'); window.location.href='index.php';</script>";
            }
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
