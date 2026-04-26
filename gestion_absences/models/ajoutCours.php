<?php
require_once 'db.php';

// seuls les secrétaires peuvent créer des cours
if (empty($_SESSION['role']) || $_SESSION['role'] !== 'secretaire') {
    header('Location: /gestion_absences/index.php?page=login');
    exit();
}

$messageAjoutCours = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_cours') {
    $libelle = $_POST['libelle'];
    $jour = $_POST['jour'];
    $horaire = $_POST['horaire'];
    $classeId = $_POST['classe_id'];
    $profId = $_POST['prof_id'];
    $salle = $_POST['salle'];

    // on vérifie que tous les champs obligatoires sont remplis
    if ($libelle == '' || $jour == '' || $horaire == '' || $classeId <= 0 || $profId <= 0) {
        $messageAjoutCours = '<p style="color:red;">Module, jour, horaire, classe et professeur sont obligatoires.</p>';
    } else {
        $sql = "INSERT INTO Cours (id_prof, classe_id, libelle, jour, horaire, salle) VALUES ('$profId', '$classeId', '$libelle', '$jour', '$horaire', '$salle')";
        $bdd->query($sql);
        $messageAjoutCours = '<p style="color:green;">Cours ajouté avec succès.</p>';
    }
}

// on récupère les listes pour remplir les menus déroulants du formulaire
$classesList = $bdd->query('SELECT id, nom FROM Classes ORDER BY nom')->fetchAll(PDO::FETCH_ASSOC);
$profsList = $bdd->query('SELECT id, nom, prenom FROM profs ORDER BY nom, prenom')->fetchAll(PDO::FETCH_ASSOC);