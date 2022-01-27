<?php
session_start();

$host  = 'localhost';
$username = 'root';
$password = '';
$db_name = 'tsa';

// Koneksi
$conn = mysqli_connect($host, $username, $password, $db_name);

// Cek Koneksi
if (!$conn) {
    echo 'Koneksi gagal' . mysqli_connect_error();
}
