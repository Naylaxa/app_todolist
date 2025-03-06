<?php
include 'koneksi.php'; //menghubungkan koneksi database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     //mengambil hasil input
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $birth_date = $_POST ['birth_date'];

    $sql = "INSERT INTO users (name, email, username, password, birth_date) VALUES (?, ?, ?, ?, ?)"; //menambahkan hasil input ke database
    $stmt = $koneksi->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssss", $name, $email, $username, $password, $birth_date);

        if ($stmt->execute()) {
            echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href='login.php';</script>"; //menampilkan alert dan mengarahkan ke login.php
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
