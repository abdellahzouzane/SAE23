<?php require 'logique.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Slide Puzzle</title>
    <link rel="stylesheet" href="puzzle.css">
</head>
<body>

<h2>Slide Puzzle</h2>
<p>Déplacements : <strong><?= $_SESSION['compteur'] ?></strong></p>
<a href="index.php?melanger=1">Mélanger</a>

<?php if ($gagne): ?>
    <p><strong>Bravo ! Résolu en <?= $_SESSION['compteur'] ?> déplacements !</strong></p>
<?php endif; ?>

<div id="grille">
<?php for ($i = 0; $i < 16; $i++): ?>
    <?php $val = $_SESSION['cases'][$i]; ?>
    <?php if ($val == 0): ?>
        <button class="vide"></button>
    <?php else: ?>
        <a href="index.php?clic=<?= $i ?>"><button class="case"><?= $val ?></button></a>
    <?php endif; ?>
<?php endfor; ?>
</div>

</body>
</html>