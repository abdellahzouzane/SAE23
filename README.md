# SAE23 - Mini-Projets Web Dynamique

**Groupe :** Abdellah, Rayan, Said, Florian  
**Formation :** BUT R&T - IUT Rouen  

---

## Structure du projet

```
SAE23/
│
├── gestion_absences/         # TP1 - Gestion des absences
│   ├── CSS/
│   │   └── styles.css
│   ├── JS/
│   │   └── interaction.js
│   ├── models/
│   │   ├── ajoutProf.php
│   │   ├── ajoutSecretaire.php
│   │   ├── attendanceCourse.php
│   │   ├── db.php
│   │   ├── deconexion.php
│   │   ├── detailAbsences.php
│   │   ├── listeEtudiants.php
│   │   ├── login.php
│   │   ├── mesAbsences.php
│   │   ├── pageGestionCompte.php
│   │   └── secretaireDashboard.php
│   ├── templates/
│   │   ├── accueil.php
│   │   ├── agendaProf.php
│   │   ├── ajoutCours.php
│   │   ├── ajoutEtudiant.php
│   │   ├── ajoutProf.php
│   │   ├── ajoutSecretaire.php
│   │   ├── attendanceCourse.php
│   │   ├── detailAbsences.php
│   │   ├── header.php
│   │   ├── listeEtudiant.php
│   │   └── listeEtudiants.php
│   ├── index.php
│   └── projetSAE23SQL.sql
│
├── TP2/                      # TP2 - Slide Puzzle
│   ├── index.php
│   ├── logique.php
│   └── puzzle.css
│
├── TP3/                      # TP3 - Chaîne de mots Yoda
│   ├── index.php
│   └── style.css
│
└── TP4-JavaScript/           # TP4 - TP JavaScript (1 par personne)
    ├── tp4-Abdellah/
    ├── tp4-Florian/
    ├── tp4-Rayan/
    └── tp4-Said/
```

---

## TP1 - Gestion des absences

Plateforme web de saisie et gestion des absences étudiants.  
Connexion sécurisée avec des rôles : professeur, secrétaire et étudiant.  
Les absences sont enregistrées dans une base de données MySQL.

**Technologies :** PHP, MySQL, HTML, CSS, JavaScript

---

## TP2 - Slide Puzzle

Jeu de taquin 4x4 jouable dans le navigateur.  
Les cases sont mélangées aléatoirement et il faut les remettre dans l'ordre en cliquant dessus.

**Technologies :** PHP, HTML, CSS

---

## TP3 - Chaîne de mots Yoda

Algorithme qui cherche la plus longue chaîne de mots possible où les 3 dernières lettres de chaque mot correspondent aux 3 premières du mot suivant.

**Technologies :** PHP, HTML, CSS

---

## TP4 - TP JavaScript

Chaque membre du groupe a conçu un TP JavaScript complet sur la gestion d'événements et les interactions utilisateur.

| Membre | Dossier |
|--------|---------|
| Abdellah | tp4-Abdellah/ |
| Florian | tp4-Florian/ |
| Rayan | tp4-Rayan/ |
| Said | tp4-Said/ |

---

## Lancer le projet en local

1. Installer XAMPP
2. Copier les dossiers dans `C:/xampp/htdocs/`
3. Démarrer Apache et MySQL depuis XAMPP
4. Importer `projetSAE23SQL.sql` dans phpMyAdmin
5. Accéder au projet via `http://localhost/`
