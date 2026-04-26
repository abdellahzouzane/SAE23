<?php
require_once 'db.php';

// seuls les profs peuvent gérer les présences
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'prof') {
    header('Location: index.php?page=login');
    exit();
}

$idProf = $_SESSION['id'];
$courseId = isset($_GET['course_id']) ? $_GET['course_id'] : 0;

if ($courseId == 0) {
    die('Cours invalide.');
}

// on récupère les infos du cours avec le nom de la classe
$sql = "SELECT c.*, cl.nom AS classe_nom FROM Cours c LEFT JOIN Classes cl ON cl.id = c.classe_id WHERE c.id = '$courseId' AND c.id_prof = '$idProf'";
$course = $bdd->query($sql)->fetch(PDO::FETCH_ASSOC);

if (!$course) {
    die('Cours introuvable pour ce professeur.');
}

$messageAttendance = '';
$today = date('Y-m-d');

// si le prof clique sur un étudiant, on ajoute ou supprime son absence
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'toggle_absence') {
    $etudiantId = $_POST['id_etudiant'];

    // on vérifie si une absence existe déjà aujourd'hui pour cet étudiant
    $sql = "SELECT id FROM Absences WHERE id_etudiant = '$etudiantId' AND module = '$course[libelle]' AND DATE(dateAbsences) = '$today'";
    $row = $bdd->query($sql)->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $bdd->query("DELETE FROM Absences WHERE id = '$row[id]'");
        $messageAttendance = '<p style="color:green;">Absence annulée.</p>';
    } else {
        $date = date('Y-m-d H:i:s');
        $bdd->query("INSERT INTO Absences (id_etudiant, id_prof, module, dateAbsences, justifiee) VALUES ('$etudiantId', '$idProf', '$course[libelle]', '$date', 0)");
        $messageAttendance = '<p style="color:green;">Absence enregistrée.</p>';
    }
}

// on récupère la liste des étudiants déjà marqués absents aujourd'hui
$sql = "SELECT id_etudiant FROM Absences WHERE module = '$course[libelle]' AND DATE(dateAbsences) = '$today' AND id_prof = '$idProf'";
$absentToday = array_column($bdd->query($sql)->fetchAll(PDO::FETCH_ASSOC), 'id_etudiant');

// on récupère tous les étudiants de la classe
$classId = $course['classe_id'];
$sql = "SELECT id, nom, prenom, email FROM Etudiant WHERE classe_id = '$classId' ORDER BY nom, prenom";
$students = $bdd->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>