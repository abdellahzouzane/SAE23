<?php
require_once 'db.php';

if (!isset($_SESSION['role'])) {
    header('Location: index.php?page=login');
    exit();
}
?>
