<html>
    <head>
        <title>Dashboard Secrétaire</title>
        <link rel="stylesheet" type="text/css" href="/gestion_absences/CSS/styles.css">
    </head>
    <body>

        <main class="main-content">
            <h1 class="page-title">Dashboard Secrétaire</h1>

            <div class="stats-grid">
                <div class="stat-card">
                    <h3><?php echo $total_etudiants; ?></h3>
                    <p>Étudiants inscrits</p>
                </div>
                <div class="stat-card">
                    <h3><?php echo $total_profs; ?></h3>
                    <p>Professeurs</p>
                </div>
                <div class="stat-card">
                    <h3><?php echo $total_classes; ?></h3>
                    <p>Classes</p>
                </div>
                <div class="stat-card">
                    <h3><?php echo $total_cours; ?></h3>
                    <p>Cours programmés</p>
                </div>
                <div class="stat-card alert">
                    <h3><?php echo $absences_non_justifiees; ?></h3>
                    <p>Absences non justifiées</p>
                </div>
            </div>

            <div class="dashboard-section">
                <h2>Dernières absences non justifiées</h2>
                <?php if (!empty($recentAbsences)): ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Étudiant</th>
                                <th>Classe</th>
                                <th>Cours</th>
                                <th>Professeur</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($recentAbsences as $absence): ?>
                                <tr>
                                    <td><?php echo date('d/m/Y H:i', strtotime($absence['dateAbsences'])); ?></td>
                                    <td><?php echo $absence['etudiant_prenom'] . ' ' . $absence['etudiant_nom']; ?></td>
                                    <td><?php echo $absence['classe_nom']; ?></td>
                                    <td><?php echo $absence['module']; ?></td>
                                    <td><?php echo $absence['prof_prenom'] . ' ' . $absence['prof_nom']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>Aucune absence non justifiée récente.</p>
                <?php endif; ?>
            </div>
        </main>
    </body>
</html>