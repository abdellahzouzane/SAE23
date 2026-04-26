<header class="main-header">
    <div class="header-content">
        <div class="logo-section">
            <h1 class="header-title">Gestion des Absences</h1>
        </div>

        <?php if (isset($_SESSION['role'])): ?>
        <nav class="main-nav">
            <?php if ($_SESSION['role'] === 'prof'): ?>
                <a href="/gestion_absences/index.php?page=agendaProf" class="nav-link">Mon emploi du temps</a>
            <?php elseif ($_SESSION['role'] === 'secretaire'): ?>
                <a href="/gestion_absences/index.php?page=secretaireDashboard" class="nav-link">Dashboard</a>
                <a href="/gestion_absences/index.php?page=ajoutEtudiant" class="nav-link">Ajouter Étudiant</a>
                <a href="/gestion_absences/index.php?page=ajoutProf" class="nav-link">Ajouter Professeur</a>
                <a href="/gestion_absences/index.php?page=ajoutSecretaire" class="nav-link">Ajouter Secrétaire</a>
                <a href="/gestion_absences/index.php?page=ajoutCours" class="nav-link">Créer Cours</a>
                <a href="/gestion_absences/index.php?page=listeEtudiants" class="nav-link">Liste Étudiants</a>
            <?php elseif ($_SESSION['role'] === 'etudiant'): ?>
                <a href="/gestion_absences/index.php?page=mesAbsences" class="nav-link">Mes absences</a>
            <?php endif; ?>

            <div class="user-info">
                <span class="user-name">Bienvenue, <?php echo htmlspecialchars($_SESSION['prenom'] . ' ' . $_SESSION['nom']); ?></span>
                <a href="/gestion_absences/index.php?page=deconexion.php" class="logout-btn">Déconnexion</a>
            </div>
        </nav>
        <?php endif; ?>
    </div>
</header>
