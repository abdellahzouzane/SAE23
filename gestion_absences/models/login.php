<?php
require_once 'db.php';

if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['password'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $password = $_POST['password'];

    // on cherche d'abord dans la table profs
    $sql = "SELECT * FROM profs WHERE nom = '$nom' AND prenom = '$prenom' AND mdp = '$password'";
    $user = $bdd->query($sql)->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['prenom'] = $user['prenom'];
        $_SESSION['role'] = 'prof';
        header('Location: index.php?page=agendaProf');
        exit();
    }

    // sinon on cherche dans les secrétaires
    $sql = "SELECT * FROM secretaires WHERE nom = '$nom' AND prenom = '$prenom' AND mdp = '$password'";
    $user = $bdd->query($sql)->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['prenom'] = $user['prenom'];
        $_SESSION['role'] = 'secretaire';
        header('Location: index.php?page=secretaireDashboard');
        exit();
    }

    // enfin on cherche dans les étudiants
    $sql = "SELECT * FROM Etudiant WHERE nom = '$nom' AND prenom = '$prenom' AND mdp = '$password'";
    $user = $bdd->query($sql)->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['prenom'] = $user['prenom'];
        $_SESSION['role'] = 'etudiant';
        $_SESSION['classe_id'] = $user['classe_id'];
        header('Location: index.php?page=mesAbsences');
        exit();
    }

    // aucun utilisateur trouvé alors on redirige avec une erreur
    header('Location: index.php?page=login&error=invalid');
    exit();
}
?>