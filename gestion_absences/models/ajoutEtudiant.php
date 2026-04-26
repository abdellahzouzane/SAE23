<?php
require_once 'db.php';

// seuls les secrétaires peuvent ajouter des étudiants
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'secretaire') {
    header('Location: index.php?page=login');
    exit();
}

$messageAjoutEtudiant = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_etudiant') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $classe_id = $_POST['classe_id'];

    if ($nom == '' || $prenom == '' || $mdp == '') {
        $messageAjoutEtudiant = '<p style="color:red;">Nom, prénom et mot de passe sont obligatoires.</p>';
    } else {
        // on vérifie que l'étudiant n'existe pas déjà
        $sql = "SELECT COUNT(*) FROM Etudiant WHERE nom = '$nom' AND prenom = '$prenom'";
        $nb = $bdd->query($sql)->fetchColumn();

        if ($nb > 0) {
            $messageAjoutEtudiant = '<p style="color:red;">Cet étudiant existe déjà.</p>';
        } else {
            $sql = "INSERT INTO Etudiant (nom, prenom, email, mdp, classe_id) VALUES ('$nom', '$prenom', '$email', '$mdp', '$classe_id')";
            $bdd->query($sql);
            $messageAjoutEtudiant = '<p style="color:green;">Étudiant ajouté avec succès.</p>';
        }
    }
}

// liste des classes pour le menu déroulant
$classesList = $bdd->query('SELECT id, nom FROM Classes ORDER BY nom')->fetchAll(PDO::FETCH_ASSOC);
?>