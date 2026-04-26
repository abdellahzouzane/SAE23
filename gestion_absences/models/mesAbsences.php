<?php
require_once 'db.php';

// seuls les étudiants peuvent voir leurs propres absences
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'etudiant') {
    header('Location: index.php?page=login');
    exit();
}

$idEtudiant = $_SESSION['id'];

// on récupère les absences de l'étudiant avec le nom du prof associé
$sql = "SELECT a.dateAbsences, a.module, a.justifiee, p.nom as prof_nom, p.prenom as prof_prenom
        FROM Absences a
        LEFT JOIN profs p ON p.id = a.id_prof
        WHERE a.id_etudiant = '$idEtudiant'
        ORDER BY a.dateAbsences DESC";

$absences = $bdd->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>