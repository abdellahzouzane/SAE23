<html>
<head>
    <title>Ajouter un cours</title>
    <link rel="stylesheet" type="text/css" href="/gestion_absences/CSS/styles.css">
</head>
<body>
    <div class="main-content">
        <h1>Ajouter un cours</h1>
        <?php echo $messageAjoutCours ?? ''; ?>
        <form method="POST" action="/gestion_absences/index.php?page=ajoutCours">
            <input type="hidden" name="action" value="add_cours">
            <div><label>Module :</label> <input type="text" name="libelle" required></div>
            <div><label>Jour :</label>
                <select name="jour" required>
                    <option value="">--Choisir--</option>
                    <option value="Lundi">Lundi</option>
                    <option value="Mardi">Mardi</option>
                    <option value="Mercredi">Mercredi</option>
                    <option value="Jeudi">Jeudi</option>
                    <option value="Vendredi">Vendredi</option>
                    <option value="Samedi">Samedi</option>
                    <option value="Dimanche">Dimanche</option>
                </select>
            </div>
            <div><label>Horaire :</label> <input type="text" name="horaire" placeholder="08:00-10:00" required></div>
            <div><label>Classe :</label>
                <select name="classe_id" required>
                    <option value="">--Choisir classe--</option>
                    <?php foreach ($classesList as $classe): ?>
                        <option value="<?php echo $classe['id']; ?>"><?php echo $classe['nom']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div><label>Professeur :</label>
                <select name="prof_id" required>
                    <option value="">--Choisir professeur--</option>
                    <?php foreach ($profsList as $prof): ?>
                        <option value="<?php echo $prof['id']; ?>"><?php echo $prof['nom'] . ' ' . $prof['prenom']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div><label>Salle :</label> <input type="text" name="salle"></div>
            <button type="submit">Ajouter le cours</button>
        </form>
    </div>
</body>
</html>