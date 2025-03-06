<?php
include 'koneksi.php'; //menghubungkan koneksi database
session_start();
//memastikan hanya pengguna yang sudah login yang bisa mengakses halaman
if (!isset($_SESSION['id_user'])) {
    header("Location: login.php"); //jika belum login diarahkan ke login.php
    exit;
}

$id_user = $_SESSION['id_user'];
$nama_user = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <!-- navbar -->
    <div class="navbar">
        <div class="left">
            <h2>Welcome, <?php echo htmlspecialchars($nama_user); ?>!</h2>
        </div>
       <div class="right">
        <a href="profil.php">Profil</a>
        <a href="logout.php">Logout</a>
       </div>
    </div>

    
    <!-- filter kategory, untuk menampilkan kategori berdasarkan filter -->
    <div class="category">
    <h3>Filter Kategori: </h3>
    <form method="GET" action="">
        <select name="category" onchange="this.form.submit()">
            <option value="">Semua Kategori</option>
            <option value="1" <?php if(isset($_GET['category']) && $_GET['category'] == "1") echo 'selected'; ?>>Work</option>
            <option value="2" <?php if(isset($_GET['category']) && $_GET['category'] == "2") echo 'selected'; ?>>Personal</option>
            <option value="3" <?php if(isset($_GET['category']) && $_GET['category'] == "3") echo 'selected'; ?>>Other</option>
        </select>
    </form>
    </div> <br>

    <!-- pindah ke halaman tambah.php jika ingin menambah data -->
    <a href="tambah.php"><button>[+] Tambah</button></a>

    <div class="content">
    <?php
    //menampilkan data berdasarkan filter category
    $category_filter = isset($_GET['category']) ? $_GET['category'] : '';

    if ($category_filter != '') {
        $query = "SELECT * FROM to_do WHERE id_user = $id_user AND id_category = '$category_filter'";
    } else {
        $query = "SELECT * FROM to_do where id_user = $id_user"; //menampilkan semua data jika tidak ada kategori yang dipilih
    }

    $data = mysqli_query($koneksi, $query);
    if (!$data) {
        die("Query Error: " . mysqli_error($koneksi));
    }
    //menampilkan data dari database ke halaman
    while ($d = mysqli_fetch_array($data)) { ?>
        <!-- menyeleksi jika status data = done maka berbeda css nya -->
        <div class="card <?php echo ($d['status'] == 'done') ? 'done' : ''; ?>">
        <input type="hidden" name="id_todo" value="<?= $id ?>">
            <h3><?php echo $d['title']; ?></h3>
            <h5><?php echo $d['description']; ?></h5>
            <p>Kategori: 
                <!-- menampilkan kategory berdasarkan tabel kategori di database -->
                <?php
                if ($d['id_category'] == "1") {
                    echo "<span>Work</span>";
                } elseif ($d['id_category'] == "2") {
                    echo "<span>Personal</span>";
                } elseif ($d['id_category'] == "3") {
                    echo "<span>Other</span>";
                } 
                // echo $d['id_category'];
                ?>
            </p>
            <p>Status: <span><?php echo $d['status']; ?></span></p>
            <!-- menghubungkan button dengan file edit dan hapus -->
            <a href="edit.php?id=<?php echo $d['id_todo']; ?>"><button style="<?php echo ($d['status'] == 'done') ? 'background-color: rgb(9, 37, 128);' : 'background-color: blue;'; ?>" >Edit</button></a>
            <a href="hapus.php?id=<?php echo $d['id_todo']; ?>"><button style="<?php echo ($d['status'] == 'done') ? 'background-color: rgb(148, 21, 21);' : 'background-color: red;'; ?>">Hapus</button></a>
        </div>
    <?php } ?>
</div>


</body>
</html>