<html>
    <head>
        <title>Ajouter un professeur</title>
        <link rel="stylesheet" type="text/css" href="/gestion_absences/CSS/styles.css">
    </head>
    <body>
        <div class="main-content">
            <h1>Ajouter un professeur</h1>
            <?php echo $messageAjoutProf ?? ''; ?>
            <form method="POST" action="/gestion_absences/index.php?page=ajoutProf">
                <input type="hidden" name="action" value="add_prof">
                <div><label>Nom :</label> <input type="text" name="nom" required></div>
                <div><label>Prénom :</label> <input type="text" name="prenom" required></div>
                <div><label>Email :</label> <input type="email" name="email"></div>
                <div><label>Mot de passe :</label> <input type="password" name="mdp" required></div>
                <button type="submit">Ajouter le professeur</button>
            </form>
        </div>
    </body>
</html>