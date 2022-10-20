<?php

//session_save_path('/tmp');
session_start();
include "plugins/config.php";

$username_login = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$password_login = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

// Mencegah MySQL injection
$username = stripslashes($username_login);
$username_ = mysqli_real_escape_string($con, $username);

// panggil stored procedure untuk memeriksa apakah username terdapat di database
$query_cek_username = mysqli_query($con, "call login_admin('$username_')");

if (mysqli_num_rows($query_cek_username) != 0) {
    $baris = mysqli_fetch_array($query_cek_username);
    $password_database = $baris['sandi'];

    if ($password_database == crypt($password_login, $password_database)) {
        $_SESSION['admin'] = $username_login;
        //$_SESSION['password'] = $password;
        echo '<script>
            window.location.assign("./")
            </script>';
    } else {
        echo '<script>
            alert("Username atau password salah.");
            window.location.assign("login.php")
            </script>';
    }
} else {
    echo '<script>
            alert("Username atau password salah.");
            window.location.assign("login.php")
            </script>';
}
?>