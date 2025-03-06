<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up To Do List</title>
    <link rel="stylesheet" href="css/daftar.css">
</head>
<body>
    <!-- navbar -->
    <div class="navbar">
        <h2>TodoList</h2>
    </div>

    <!-- form sign up -->
    <div class="content">
        <h1>Daftar Pengguna Baru</h1>
        <div class="form">
            <!-- menghubungkan dengan file proses_daftar.php dan metode post -->
        <form action="proses_daftar.php" method="post">
            <label>Nama Lengkap</label><br>
            <!-- required agar input harus diisi -->
            <input type="text" name="name" required><br><br> 
            <label>Email</label><br>
            <input type="text" name="email" required><br><br>
            <label>Username</label><br>
            <input type="text" name="username" required><br><br>
            <label>Password</label><br>
            <input type="text" name="password" required><br><br>
            <label>Tanggal Lahir</label><br>
            <input type="date" name="birth_date" required><br><br></div>
            <button type="submit">Daftar</button>
        </form>
        <!-- jika sudah punya akun, menghubungkan ke halaman login -->
        <h4>Sudah punya akun? <a href="login.php">Login di sini</a></h4>
    </div>
</body>
</html>