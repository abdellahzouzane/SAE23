<?php
require_once 'db.php';

// seuls les secrétaires peuvent ajouter des professeurs
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'secretaire') {
    header('Location: index.php?page=login');
    exit();
}

$messageAjoutProf = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_prof') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    if ($nom == '' || $prenom == '' || $mdp == '') {
        $messageAjoutProf = '<p style="color:red;">Nom, prénom et mot de passe sont obligatoires.</p>';
    } else {
        // on vérifie que le prof n'existe pas déjà
        $sql = "SELECT COUNT(*) FROM profs WHERE nom = '$nom' AND prenom = '$prenom'";
        $nb = $bdd->query($sql)->fetchColumn();

        if ($nb > 0) {
            $messageAjoutProf = '<p style="color:red;">Ce professeur existe déjà.</p>';
        } else {
            $sql = "INSERT INTO profs (nom, prenom, email, mdp, role) VALUES ('$nom', '$prenom', '$email', '$mdp', 'prof')";
            $bdd->query($sql);
            $messageAjoutProf = '<p style="color:green;">Professeur ajouté avec succès.</p>';
        }
    }
}
?>