<?php
// include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In To Do List</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <!-- navbar -->
    <div class="navbar">
        <h2>TodoList</h2>
    </div>

    <div class="content">
        <h1>Login</h1>
        <form action="proses_login.php" method="post">
            <label>Username</label>
            <input type="text" name="username" required><br><br>
            <label>Password</label>
            <input type="password" name="password" required><br><br>
            <button type="submit" name="login">Login</button>
        </form>
        <!-- mengarahkan ke sign up bila belum punya akun -->
        <h4>Pengguna baru? <a href="daftar.php">Sign up</a></h4>
    </div>
</body>
</html>