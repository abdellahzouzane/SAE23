<html>
    <head>
        <title>Présences - <?php echo htmlspecialchars($course['libelle']); ?></title>
        <link rel="stylesheet" type="text/css" href="/gestion_absences/CSS/styles.css">
    </head>
    <body>
       

        <h1>Présences pour <?php echo htmlspecialchars($course['libelle']); ?> (classe: <?php echo htmlspecialchars($course['classe_nom']); ?>)</h1>
        <?php echo $messageAttendance ?? ''; ?>

        <?php if (empty($students)): ?>
            <p>Aucun étudiant dans cette classe.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Étudiant</th>
                        <th>Email</th>
                        <th>Statut aujourd'hui</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $student): ?>
                        <?php $isAbsent = in_array($student['id'], $absentToday); ?>
                        <tr>
                            <td><?php echo htmlspecialchars($student['prenom'] . ' ' . $student['nom']); ?></td>
                            <td><?php echo htmlspecialchars($student['email']); ?></td>
                            <td><?php echo $isAbsent ? '<strong style="color:red;">Absent</strong>' : '<strong style="color:green;">Présent</strong>'; ?></td>
                            <td>
                                <form method="POST" action="/gestion_absences/index.php?page=attendanceCourse&course_id=<?php echo $course['id']; ?>" style="display:inline;">
                                    <input type="hidden" name="action" value="toggle_absence">
                                    <input type="hidden" name="id_etudiant" value="<?php echo $student['id']; ?>">
                                    <button type="submit"><?php echo $isAbsent ? 'Annuler absence' : 'Marquer absent'; ?></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </body>
</html>