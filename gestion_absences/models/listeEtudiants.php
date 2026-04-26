<?php
require_once 'db.php';

// seuls les secrétaires peuvent voir la liste des étudiants
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'secretaire') {
    header('Location: index.php?page=login');
    exit();
}

$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

// si une recherche est effectuée on filtre, sinon on récupère tous les étudiants
if ($searchTerm != '') {
    $sql = "SELECT id, nom, prenom, email FROM Etudiant WHERE nom LIKE '%$searchTerm%' OR prenom LIKE '%$searchTerm%' OR email LIKE '%$searchTerm%' ORDER BY nom";
} else {
    $sql = "SELECT id, nom, prenom, email FROM Etudiant ORDER BY nom";
}

$etudiants = $bdd->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>