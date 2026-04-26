<?php
require_once 'db.php';

// seuls les profs peuvent accéder à cette page
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'prof') {
    header('Location: index.php?page=login');
    exit();
}

$idProf = $_SESSION['id'];

// on récupère les cours du prof avec le nom de la classe associée
$sql = "SELECT c.id, c.libelle, c.jour, c.horaire, c.classe_id, cl.nom AS classe_nom
        FROM Cours c
        LEFT JOIN Classes cl ON cl.id = c.classe_id
        WHERE c.id_prof = '$idProf'
        ORDER BY c.jour, c.horaire";

$coursList = $bdd->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>