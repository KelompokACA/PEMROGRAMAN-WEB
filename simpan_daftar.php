<?php
// Mendapatkan data username dan password dari form pendaftaran 
$username = $_POST['username'];
$password = $_POST['password'];

// Membuka file untuk menambahkan data username dan password
$file = fopen("data_user.txt","a+");
fwrite($file, $username . ":" .$password . "\n");
fclose($file);

// Redirect ke halaman login 
header("Location: login.html");
exit;
?>