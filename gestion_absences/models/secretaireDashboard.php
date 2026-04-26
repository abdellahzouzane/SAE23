<?php
require_once 'db.php';

// on compte les données pour les afficher dans les cartes du dashboard
$total_etudiants = $bdd->query("SELECT COUNT(*) FROM Etudiant")->fetchColumn();
$total_profs = $bdd->query("SELECT COUNT(*) FROM profs")->fetchColumn();
$total_classes = $bdd->query("SELECT COUNT(*) FROM Classes")->fetchColumn();
$total_cours = $bdd->query("SELECT COUNT(*) FROM Cours")->fetchColumn();
$absences_non_justifiees = $bdd->query("SELECT COUNT(*) FROM Absences WHERE justifiee = 0")->fetchColumn();

// on récupère les 10 dernières absences non justifiées avec les infos de l'étudiant, du prof et de la classe
$recentAbsences = $bdd->query("
    SELECT a.dateAbsences, a.module, e.nom as etudiant_nom, e.prenom as etudiant_prenom,
           p.nom as prof_nom, p.prenom as prof_prenom, c.nom as classe_nom
    FROM Absences a
    JOIN Etudiant e ON a.id_etudiant = e.id
    LEFT JOIN profs p ON a.id_prof = p.id
    LEFT JOIN Classes c ON e.classe_id = c.id
    WHERE a.justifiee = 0
    ORDER BY a.dateAbsences DESC
    LIMIT 10
")->fetchAll(PDO::FETCH_ASSOC);
?>