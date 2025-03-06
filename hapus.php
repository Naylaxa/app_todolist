<?php
include 'koneksi.php'; // menghubungkan ke database

$id = $_GET['id']; //memperoleh id data dari tabel todo
$query = mysqli_query($koneksi, "SELECT * FROM to_do WHERE id_todo = $id"); // memperoleh data di tabel todo

if ($stmt = $koneksi->prepare("DELETE FROM to_do WHERE id_todo = ?")) { // menghapus data todo dengan statement
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "<script>alert('To Do telah dihapus!'); window.location.href='index.php';</script>"; //menampilkan alert jika sudah berhasil dihapus
    } else {
        echo "Error executing query: " . $stmt->error; //menampilkan eror apabila data tidak berhasil dihapus
    }

    $stmt->close();
} else {
    echo "Error preparing query: " . $koneksi->error;
}

$koneksi->close(); //menutup koneksi
?>
