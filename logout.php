<?php
session_start();
session_unset();
session_destroy(); //pengguna log out
//menampilkan alert
echo "<script> alert('Anda telah log out!');
    window.location.href='index.php'</script>";
exit;
?>