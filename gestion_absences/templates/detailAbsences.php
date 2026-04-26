<html>
    <head>
        <title>Détail des absences</title>
        <link rel="stylesheet" type="text/css" href="/gestion_absences/CSS/styles.css">
        <script src="/gestion_absences/JS/interaction.js"></script>
    </head>
    <body>
        <a href="/gestion_absences/index.php?page=listeEtudiants" class="back-link">← Retour à la liste</a>

        <div class="header">
            <h1>Absences de <?php echo htmlspecialchars($etudiant['prenom']) . ' ' . htmlspecialchars($etudiant['nom']); ?></h1>
        </div>

        <!-- Formulaire d'ajout d'absence -->
        <div class="form-section">
            <h2>Ajouter une absence</h2>
            <form method="POST">
                <input type="hidden" name="action" value="add">
                <div class="form-group">
                    <label for="dateAbsences">Date et heure :</label>
                    <input type="datetime-local" id="dateAbsences" name="dateAbsences" required>
                </div>
                <div class="form-group">
                    <label for="module">Module/Cours :</label>
                    <input type="text" id="module" name="module" placeholder="Ex: R209, R210..." required>
                </div>
                <div class="form-group">
                    <label for="justifiee">Statut :</label>
                    <select id="justifiee" name="justifiee">
                        <option value="0">Non justifiée (ABI)</option>
                        <option value="1">Justifiée (ABJ)</option>
                    </select>
                </div>
                <button type="submit">Ajouter l'absence</button>
            </form>
        </div>

        <!-- Tableau des absences -->
        <h2>Historique des absences</h2>
        <?php if (!empty($absences)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Date et heure</th>
                        <th>Module</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($absences as $absence): ?>
                        <tr id="absence-row-<?php echo $absence['id']; ?>">
                            <td><?php echo htmlspecialchars(date('d/m/Y H:i', strtotime($absence['dateAbsences']))); ?></td>
                            <td><?php echo htmlspecialchars($absence['module']); ?></td>
                            <td>
                                <span class="status <?php echo $absence['justifiee'] ? 'justified' : 'unjustified'; ?>">
                                    <?php echo $absence['justifiee'] ? 'ABJ (Justifiée)' : 'ABI (Non justifiée)'; ?>
                                </span>
                            </td>
                            <td>
                                <!-- Formulaire pour changer le statut -->
                                <form id="statusForm_<?php echo $absence['id']; ?>" method="POST" style="display: inline;">
                                    <input type="hidden" name="action" value="update_status">
                                    <input type="hidden" name="id_absence" value="<?php echo $absence['id']; ?>">
                                    <input type="hidden" name="justifiee" value="">
                                    <button type="button" class="btn-small btn-info" 
                                            onclick="toggleStatus(<?php echo $absence['id']; ?>, <?php echo $absence['justifiee'] ? 1 : 0; ?>)">
                                        <?php echo $absence['justifiee'] ? 'Marquer ABI' : 'Marquer ABJ'; ?>
                                    </button>
                                </form>

                                <!-- Formulaire de suppression -->
                                <form id="deleteForm_<?php echo $absence['id']; ?>" method="POST" style="display: inline;">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="id_absence" value="<?php echo $absence['id']; ?>">
                                    <button type="button" class="btn-small btn-danger" 
                                            onclick="confirmDelete(<?php echo $absence['id']; ?>)">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <script>setupDoubleClick(<?php echo $absence['id']; ?>);</script>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="no-absences">
                <p>Aucune absence enregistrée pour cet étudiant.</p>
            </div>
        <?php endif; ?>
    </body>
</html>
