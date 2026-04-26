<html>
    <head>
        <title>Emploi du temps Professeur</title>
        <link rel="stylesheet" type="text/css" href="/gestion_absences/CSS/styles.css">
    </head>
    <body>

        <main class="main-content">
            <h1 class="page-title">Emploi du temps de <?php echo htmlspecialchars($_SESSION['prenom'] . ' ' . $_SESSION['nom']); ?></h1>

        <?php if (empty($coursList)): ?>
            <p>Aucun cours enregistré pour le moment.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Cours</th>
                        <th>Classe</th>
                        <th>Jour</th>
                        <th>Horaire</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($coursList as $course): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($course['libelle']); ?></td>
                        <td><?php echo htmlspecialchars($course['classe_nom']); ?></td>
                        <td><?php echo htmlspecialchars($course['jour']); ?></td>
                        <td><?php echo htmlspecialchars($course['horaire']); ?></td>
                        <td>
                            <a href="/gestion_absences/index.php?page=attendanceCourse&course_id=<?php echo $course['id']; ?>">Gérer présence</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        </main>
    </body>
</html>