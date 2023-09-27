<?php
session_start();
session_destroy();

// Set pesan sukses logout dalam sesi
$_SESSION['logout_message'] = "Anda telah berhasil logout.";


header("location: login.php");

exit;
