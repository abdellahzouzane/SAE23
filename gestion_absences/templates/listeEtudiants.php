<html>
    <head>
        <title>Liste des étudiants</title>
        <link rel="stylesheet" type="text/css" href="/gestion_absences/CSS/styles.css">
        <script>
            function goToAbsences(idEtudiant) {
                window.location.href = '/gestion_absences/index.php?page=detailAbsences&id_etudiant=' + idEtudiant;
            }
        </script>
    </head>
    <body>
        <h1>Liste des étudiants</h1>

        <div class="search-container">
            <form method="GET" action="/gestion_absences/index.php">
                <input type="hidden" name="page" value="listeEtudiants">
                <input type="text" name="search" placeholder="Chercher par nom, prénom ou email..." value="<?php echo $searchTerm; ?>">
                <button type="submit">Rechercher</button>
                <?php if (!empty($searchTerm)): ?>
                    <a href="/gestion_absences/index.php?page=listeEtudiants">Réinitialiser</a>
                <?php endif; ?>
            </form>
        </div>

        <main>
            <?php if (!empty($etudiants)): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Absences</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($etudiants as $etudiant): ?>
                            <tr>
                                <td><?php echo $etudiant['nom']; ?></td>
                                <td><?php echo $etudiant['prenom']; ?></td>
                                <td><?php echo $etudiant['email']; ?></td>
                                <td>
                                    <a onclick="goToAbsences(<?php echo $etudiant['id']; ?>)" style="cursor:pointer; color:blue;">Voir absences</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Aucun étudiant trouvé.</p>
            <?php endif; ?>
        </main>
    </body>
</html>