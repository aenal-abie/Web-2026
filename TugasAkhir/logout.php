<?php
require_once __DIR__ . '/includes/fungsi.php';
mulai_sesi();

session_unset();
session_destroy();

header('Location: login.php');
exit;
