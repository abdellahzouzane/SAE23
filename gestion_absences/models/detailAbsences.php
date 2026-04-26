<?php
require_once 'db.php';

$idEtudiant = isset($_GET['id_etudiant']) ? $_GET['id_etudiant'] : 0;
$idProf = isset($_SESSION['id']) ? $_SESSION['id'] : 0;

if ($idEtudiant == 0 || $idProf == 0) {
    die('Erreur : étudiant ou professeur non identifié.');
}

// on récupère les infos de l'étudiant
$etudiant = $bdd->query("SELECT id, nom, prenom FROM Etudiant WHERE id = '$idEtudiant'")->fetch();

if (!$etudiant) {
    die('Étudiant non trouvé.');
}

$message = '';

// ajout d'une absence manuellement
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {
    $dateAbsences = $_POST['dateAbsences'];
    $module = $_POST['module'];
    $justifiee = $_POST['justifiee'];

    if ($dateAbsences != '' && $module != '') {
        $bdd->query("INSERT INTO Absences (dateAbsences, module, justifiee, id_etudiant, id_prof) VALUES ('$dateAbsences', '$module', '$justifiee', '$idEtudiant', '$idProf')");
        $message = '<p style="color:green;">Absence ajoutée avec succès.</p>';
    } else {
        $message = '<p style="color:red;">Veuillez remplir tous les champs.</p>';
    }
}

// suppression d'une absence
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete') {
    $idAbsence = $_POST['id_absence'];
    $bdd->query("DELETE FROM Absences WHERE id = '$idAbsence' AND id_etudiant = '$idEtudiant'");
    $message = '<p style="color:green;">Absence supprimée.</p>';
}

// changement du statut ABI/ABJ
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update_status') {
    $idAbsence = $_POST['id_absence'];
    $justifiee = $_POST['justifiee'];
    $bdd->query("UPDATE Absences SET justifiee = '$justifiee' WHERE id = '$idAbsence' AND id_etudiant = '$idEtudiant'");
    $message = '<p style="color:green;">Statut mis à jour.</p>';
}

// on récupère toutes les absences de l'étudiant
$absences = $bdd->query("SELECT id, dateAbsences, module, justifiee FROM Absences WHERE id_etudiant = '$idEtudiant' ORDER BY dateAbsences DESC")->fetchAll();
?>