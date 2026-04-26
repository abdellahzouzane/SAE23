<html>
    <head>
        <title>Connexion - Gestion des Absences</title>
        <link rel="stylesheet" href="/gestion_absences/CSS/styles.css">
    </head>
    <body class="login-body">
        <div class="login-container">
            <h1>Connexion</h1>

            <?php if (isset($_GET['error'])): ?>
                <div class="error-message">
                    <?php if ($_GET['error'] == 'invalid'): ?>
                        Nom, prénom ou mot de passe incorrect.
                    <?php elseif ($_GET['error'] == 'empty'): ?>
                        Veuillez remplir tous les champs.
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <form action="/gestion_absences/index.php" method="post">
                <div class="login-form-group">
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" required placeholder="Votre nom">
                </div>

                <div class="login-form-group">
                    <label for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" required placeholder="Votre prénom">
                </div>

                <div class="login-form-group">
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" required placeholder="Votre mot de passe">
                </div>

                <button type="submit" class="btn-login" name="login">Se connecter</button>
            </form>
        </div>
    </body>
</html>

