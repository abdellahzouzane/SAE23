<html>
    <head>
        <title>Ajouter un étudiant</title>
        <link rel="stylesheet" type="text/css" href="/gestion_absences/CSS/styles.css">
    </head>
    <body>
        <div class="main-content">
            <h1>Ajouter un étudiant</h1>
            <?php echo $messageAjoutEtudiant ?? ''; ?>
            <form method="POST" action="/gestion_absences/index.php?page=ajoutEtudiant">
                <input type="hidden" name="action" value="add_etudiant">
                <div><label>Nom :</label> <input type="text" name="nom" required></div>
                <div><label>Prénom :</label> <input type="text" name="prenom" required></div>
                <div><label>Email :</label> <input type="email" name="email"></div>
                <div><label>Classe :</label>
                    <select name="classe_id">
                        <option value="">--Aucune--</option>
                        <?php foreach ($classesList as $classe): ?>
                            <option value="<?php echo $classe['id']; ?>"><?php echo $classe['nom']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div><label>Mot de passe :</label> <input type="password" name="mdp" required></div>
                <button type="submit">Ajouter l'étudiant</button>
            </form>
        </div>
    </body>
</html>