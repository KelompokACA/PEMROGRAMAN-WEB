<?php
// Mendapatkan data username dan password dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Membaca data username dan password dari file
$file = fopen("data_user.txt", "r");
$valid = false;

// Looping untuk mencari data username dan password yang sesuai 
while (!feof($file)) {
    $line = trim(fgets($file));
    if ($line != "") {
        list($saved_username, $saved_password) = explode(":", $line);
        if ($saved_username == $username && $saved_password == $password) {
            $valid = true;
            break;
        }
    }
}

// Menutup file
fclose($file);

// Jika username dan password valid, redirect ke halaman beranda 
// Jika tidak valid, tampilkan pesan kesalahan
if ($valid){
    header("Location: beranda.html");
    exit;
}else{
    echo "<script>alert('Username atau password salah!');</script>"; 
    echo "<script>window.location = 'login.html';</script>";
}
?>