<?php
// menghubungkan ke file koneksi.php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Todo</title>
    <link rel="stylesheet" href="css/edit1.css">
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

    <!-- memperoleh data dari database untuk ditampilkan -->
    <?php
        $id = $_GET['id']; //memperoleh id
        $query = mysqli_query($koneksi, "SELECT * FROM to_do WHERE id_todo = $id");
        while($data=mysqli_fetch_array($query)){
        ?>

        <!-- form edit -->
    <div class="content">
        <h1>Edit Tugas</h1>
        <form action="proses_edit.php" method="post">
            <!-- mengambil id dari tabel dengan variable $id -->
        <input type="hidden" name="id_todo" value="<?= $id ?>">
            <label>Judul</label><br>
            <input type="text" name="title" value="<?php echo $data['title']; ?>" required><br><br>
            <label>Deskripsi</label><br>
            <input type="textarea" name="description" value="<?php echo $data['description']; ?>" required><br><br>
            <label>Kategori</label><br>
            <select id="category" name="category">
                <option value="1">Work</option>
                <option value="2">Personal</option>
                <option value="3">Other</option>
            </select><br><br>
            <label>Status</label><br>
            <select id="status" name="status">
                <option value="1">Pending</option>
                <option value="2">Done</option>
            </select>
            <button type="submit">Submit</button>
        </form>
    </div>
    <?php } // menutup while?>
</body>
</html>