<?php
$host = 'localhost';
$dbname = 'gestion_absences';
$user = 'root';
$pass = '';

$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8', $user, $pass);
?>
