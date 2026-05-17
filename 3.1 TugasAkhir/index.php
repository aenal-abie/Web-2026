<?php
session_start();

if (isset($_SESSION['id_pengguna'])) {
    header('Location: dashboard.php');
    exit;
}

header('Location: login.php');
exit;
