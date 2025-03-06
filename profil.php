<?php
include 'koneksi.php';
//memastikan hanya pengguna yang sudah login yang bisa mengakses halaman
session_start();
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
    <title>Profil</title>
    <link rel="stylesheet" href="css/profil1.css">
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
    <?php
        $id = $_SESSION['id_user']; //mengambil id user
        $query = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user = $id"); //mengambil data dari tabel users
        while($data=mysqli_fetch_array($query)){
        ?>
        <h3>Profil Pengguna</h3>
        <p><span>Nama: </span><?php echo $data['name']; ?></p>
        <p><span>Email: </span><?php echo $data['email']; ?></p>
        <p><span>Tanggal Lahir: </span><?php echo $data['birth_date']; ?></p>
        <!-- mengarahkan ke logout -->
        <a href="logout.php"><button>Logout</button></a>
    </div>
    <?php } ?>
</body>
</html>