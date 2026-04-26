<html>
    <head>
        <title>Mes absences</title>
        <link rel="stylesheet" type="text/css" href="/gestion_absences/CSS/styles.css">
    </head>
    <body>

        <main class="main-content">
            <h1 class="page-title">Mes absences</h1>

        <?php if (!empty($absences)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Cours</th>
                        <th>Statut</th>
                        <th>Professeur</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($absences as $a): ?>
                        <tr>
                            <td><?php echo htmlspecialchars(date('d/m/Y H:i', strtotime($a['dateAbsences']))); ?></td>
                            <td><?php echo htmlspecialchars($a['module']); ?></td>
                            <td><?php echo $a['justifiee'] ? 'ABJ' : 'ABI'; ?></td>
                            <td><?php echo htmlspecialchars($a['prof_prenom'] . ' ' . $a['prof_nom']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Aucune absence enregistrée.</p>
        <?php endif; ?>
        </main>
    </body>
</html>