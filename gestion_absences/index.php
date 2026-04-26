<?php
session_start();

//si il n'y a pas de page = alors page est nul (renvoie au default du switch case)
if(!isset($_GET['page'])) $_GET['page'] = '';

//appelle des différentes pages
switch ($_GET['page'])
{
    default:
        require 'templates/login.php';
        require 'models/login.php';
    break;

    case "login":
        require 'templates/login.php';
        require 'models/login.php';
    break;

    case "listeEtudiants":
        require 'templates/header.php';
        require 'models/listeEtudiants.php';
        require 'templates/listeEtudiants.php';
    break;

    case "ajoutEtudiant":
        require 'templates/header.php';
        require 'models/ajoutEtudiant.php';
        require 'templates/ajoutEtudiant.php';
    break;

    case "ajoutProf":
        require 'templates/header.php';
        require 'models/ajoutProf.php';
        require 'templates/ajoutProf.php';
    break;

    case "mesAbsences":
        require 'templates/header.php';
        require 'models/mesAbsences.php';
        require 'templates/mesAbsences.php';
    break;

    case "agendaProf":
        require 'templates/header.php';
        require 'models/agendaProf.php';
        require 'templates/agendaProf.php';
    break;

    case "ajoutCours":
        require 'templates/header.php';
        require 'models/ajoutCours.php';
        require 'templates/ajoutCours.php';
    break;

    case "attendanceCourse":
        require 'templates/header.php';
        require 'models/attendanceCourse.php';
        require 'templates/attendanceCourse.php';
    break;

    case "detailAbsences":
        require 'templates/header.php';
        require 'models/detailAbsences.php';
        require 'templates/detailAbsences.php';
    break;

    case "ajoutSecretaire":
        require 'templates/header.php';
        require 'models/ajoutSecretaire.php';
        require 'templates/ajoutSecretaire.php';
    break;

    case "secretaireDashboard":
        require 'templates/header.php';
        require 'models/secretaireDashboard.php';
        require 'templates/secretaireDashboard.php';
    break;
} 
?>