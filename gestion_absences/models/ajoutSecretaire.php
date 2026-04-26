<?php
require_once 'db.php';

// seuls les secrétaires peuvent ajouter d'autres secrétaires
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'secretaire') {
    header('Location: index.php?page=login');
    exit();
}

$messageAjoutSecretaire = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_secretaire'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($nom == '' || $prenom == '' || $password == '') {
        $messageAjoutSecretaire = 'Tous les champs sont obligatoires.';
    } elseif ($password !== $confirm_password) {
        $messageAjoutSecretaire = 'Les mots de passe ne correspondent pas.';
    } else {
        // on vérifie que le secrétaire n'existe pas déjà
        $sql = "SELECT id FROM secretaires WHERE nom = '$nom' AND prenom = '$prenom'";
        $exist = $bdd->query($sql)->fetch();

        if ($exist) {
            $messageAjoutSecretaire = 'Un secrétaire avec ce nom et prénom existe déjà.';
        } else {
            $sql = "INSERT INTO secretaires (nom, prenom, email, mdp, role) VALUES ('$nom', '$prenom', '$email', '$password', 'secretaire')";
            $bdd->query($sql);
            $messageAjoutSecretaire = 'Secrétaire ajouté avec succès !';
        }
    }
}

// liste de tous les secrétaires pour affichage
$secretaires = $bdd->query('SELECT id, nom, prenom, email, created_at FROM secretaires ORDER BY created_at DESC')->fetchAll(PDO::FETCH_ASSOC);
?>