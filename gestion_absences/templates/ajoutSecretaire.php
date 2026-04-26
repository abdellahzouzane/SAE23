<html>
    <head>
        <title>Ajouter un Secrétaire</title>
        <link rel="stylesheet" type="text/css" href="/gestion_absences/CSS/styles.css">
    </head>
    <body>

        <main class="main-content">
            <h1 class="page-title">Ajouter un Secrétaire</h1>

            <?php if (!empty($messageAjoutSecretaire)): ?>
                <div class="message <?php echo strpos($messageAjoutSecretaire, 'succès') !== false ? 'success' : 'error'; ?>">
                    <?php echo htmlspecialchars($messageAjoutSecretaire); ?>
                </div>
            <?php endif; ?>

            <div class="form-section">
                <h2>Informations du Secrétaire</h2>
                <form action="/gestion_absences/index.php?page=ajoutSecretaire" method="post">
                    <div class="form-group">
                        <label for="nom">Nom :</label>
                        <input type="text" id="nom" name="nom" required placeholder="Nom du secrétaire">
                    </div>

                    <div class="form-group">
                        <label for="prenom">Prénom :</label>
                        <input type="text" id="prenom" name="prenom" required placeholder="Prénom du secrétaire">
                    </div>

                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" id="email" name="email" placeholder="email@exemple.com">
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe :</label>
                        <input type="password" id="password" name="password" required placeholder="Mot de passe (min. 6 caractères)">
                    </div>

                    <div class="form-group">
                        <label for="confirm_password">Confirmer le mot de passe :</label>
                        <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirmer le mot de passe">
                    </div>

                    <button type="submit" name="add_secretaire">Ajouter le Secrétaire</button>
                </form>
            </div>

            <div class="form-section">
                <h2>Liste des Secrétaires</h2>
                <?php if (!empty($secretaires)): ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Email</th>
                                <th>Date d'ajout</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($secretaires as $secretaire): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($secretaire['nom']); ?></td>
                                    <td><?php echo htmlspecialchars($secretaire['prenom']); ?></td>
                                    <td><?php echo htmlspecialchars($secretaire['email'] ?? 'Non défini'); ?></td>
                                    <td><?php echo htmlspecialchars(date('d/m/Y H:i', strtotime($secretaire['created_at']))); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>Aucun secrétaire enregistré pour le moment.</p>
                <?php endif; ?>
            </div>

            <div class="back-link">
                <a href="/gestion_absences/index.php?page=agendaProf">← Retour à l'accueil</a>
            </div>
        </main>
    </body>
</html>