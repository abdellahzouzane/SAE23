<?php
session_start();

// première fois qu'on arrive sur la page
if (!isset($_SESSION['cases'])) {
    $_SESSION['cases'] = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 0];
    $_SESSION['compteur'] = 0;
    shuffle($_SESSION['cases']);
}

// bouton mélanger cliqué
if (isset($_GET['melanger'])) {
    shuffle($_SESSION['cases']);
    $_SESSION['compteur'] = 0;
}

// une case a été cliquée
if (isset($_GET['clic'])) {
    $index = intval($_GET['clic']);
    $vide = array_search(0, $_SESSION['cases']);

    // on vérifie si la case est bien à côté de la case vide
    $valide = false;
    if ($index == $vide - 1 && $vide % 4 != 0) $valide = true;  // voisin gauche
    if ($index == $vide + 1 && $index % 4 != 0) $valide = true; // voisin droite
    if ($index == $vide - 4) $valide = true;                     // voisin haut
    if ($index == $vide + 4) $valide = true;                     // voisin bas

    // si valide on échange la case avec la case vide
    if ($valide) {
        $_SESSION['cases'][$vide] = $_SESSION['cases'][$index];
        $_SESSION['cases'][$index] = 0;
        $_SESSION['compteur']++;
    }
}

// on regarde si toutes les cases sont dans le bon ordre
$gagne = true;
for ($i = 0; $i < 15; $i++) {
    if ($_SESSION['cases'][$i] != $i + 1) $gagne = false;
}
?>