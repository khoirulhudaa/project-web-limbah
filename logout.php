<?php
// Mulai sesi (pastikan sesi sudah dimulai sebelum menggunakan session_destroy)
session_start();

// Hapus semua variabel sesi
$_SESSION = array();

// Hancurkan sesi
session_destroy();

// Alihkan kembali ke halaman login atau halaman lain yang sesuai
header("Location: index.php");
exit; // Pastikan untuk melakukan exit setelah header
?>
