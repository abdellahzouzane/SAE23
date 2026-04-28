<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Sujet 2 - Slide Puzzle</title>
        <link rel="stylesheet" href="SAE23.css">
        <script src="SAE23.js"></script>
    </head>
    <body>
        <!---BACKGROUND--->
        <h1>Sujet 2 - Slide Puzzle</h1>

        <p>Déplacements : <strong id="moves">0</strong></p>
        <button onclick="shuffleBoard()">Mélanger</button>
        <button onclick="resetGame()">Nouvelle partie</button>
        <button onclick="solvePuzzle()">Résoudre</button>

        <!---POZZLE--->
        <section id="jeu"></section>

        <!---RESULTAT--->
        <p id="win">Puzzle résolu. <span id="finalMoves"></span> déplacements.</p>
    </body>
</html>