<?php
// tous les mots donnés par yoda
$liste = ["Sassai", "eaux-de-vie", "cessaient", "acerbité", "eaux", "sceau", "tiendra", "hasard", "acéphale", "auxiliairement", "vesce", "eurafricaine", "hâtai", "saignant", "entachassent", "alentie", "césar", "vieillerie", "messéant", "taillable", "ives", "testacé", "dracéna", "ardentes", "ensablant", "blessas", "entachasses", "ioniens", "antarctique", "sessiles", "ineffaçables", "quercitrine", "besace", "lessivasses", "acerbes", "descellaient", "entachas", "lessive", "gestation", "lessivâtes", "antécédentes", "énamourâmes", "antécédent", "entachât", "inefficace", "testacelles", "sarabandes", "entachant", "itérâmes", "antécédences", "messages", "sesquioxydes", "testacés", "rieur"];

$meilleure = [];

// on teste chaque mot comme point de départ
for ($i = 0; $i < count($liste); $i++) {

    $chaine = [$liste[$i]];

    // copie de la liste sans le mot de départ pour pas le réutiliser
    $dispo = $liste;
    unset($dispo[$i]);
    $dispo = array_values($dispo);

    $trouve = true;
    while ($trouve) {
        $trouve = false;

        // 3 dernières lettres du dernier mot
        $dernier = $chaine[count($chaine) - 1];
        $fin = mb_strtolower(mb_substr($dernier, -3, 3, 'UTF-8'), 'UTF-8');

        // on cherche un mot qui commence par ces 3 lettres
        for ($j = 0; $j < count($dispo); $j++) {
            $debut = mb_strtolower(mb_substr($dispo[$j], 0, 3, 'UTF-8'), 'UTF-8');

            if ($debut == $fin) {
                $chaine[] = $dispo[$j];
                // on le retire pour pas le réutiliser
                unset($dispo[$j]);
                $dispo = array_values($dispo);
                $trouve = true;
                break;
            }
        }
    }

    // on garde la chaine la plus longue
    if (count($chaine) > count($meilleure)) {
        $meilleure = $chaine;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Yoda - Chaîne de mots</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Chaîne de mots trouvée (<?= count($meilleure) ?> mots)</h2>

<div class="resultat">
    <?php for ($k = 0; $k < count($meilleure); $k++) { ?>
        <span class="mot"><?= $meilleure[$k] ?></span>
        <?php if ($k < count($meilleure) - 1) { ?>
            <span class="fleche">➜</span>
        <?php } ?>
    <?php } ?>
</div>

</body>
</html>