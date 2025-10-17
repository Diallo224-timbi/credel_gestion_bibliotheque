# Copilot Instructions for Credel Codebase

## Vue d'ensemble de l'architecture
- Application PHP structurée en MVC artisanal :
  - `Controleur/` : logiques métier et actions (par domaine : auteur, livre, salle, etc.)
  - `Modele/` : accès aux données, fonctions utilitaires, connexions
  - `Vue/` : affichages, sous-dossiers par entité
  - Fichiers racines (`index.php`, `menu.php`, etc.) : points d'entrée, navigation
- Les ressources (images, PDF, etc.) sont dans `images/`, `dossierCNI/`, `dossierLivres/`, `FPDF/`

## Conventions et patterns spécifiques
- Les contrôleurs sont organisés par entité métier, chaque action a son propre fichier (`ajout.php`, `liste.php`, etc.)
- Les modèles sont centralisés dans `Modele/`, souvent via des fonctions globales
- Les vues sont fragmentées par entité et usage (affichage, formulaire, etc.)
- Inclusion de fichiers via `require`/`include` avec chemins relatifs
- Pas d'autoloading : chaque dépendance doit être explicitement incluse
- Utilisation de FPDF pour la génération de PDF (`FPDF/fpdf.php`)

## Points d'intégration et dépendances
- FPDF (librairie tierce) pour la génération de documents PDF
- Pas de framework moderne (pas de Composer, pas de namespace PHP)
- Les accès BDD sont probablement dans `Modele/connexion.php` et `Modele/fonctions.php`

## Workflows développeur
- Pas de build ni de tests automatisés détectés
- Débogage principalement par affichage direct (`echo`, `var_dump`)
- Pour ajouter une nouvelle entité :
  1. Créer un dossier dans `Controleur/` et `Vue/`
  2. Ajouter les actions nécessaires (`ajout.php`, `liste.php`, etc.)
  3. Ajouter les fonctions associées dans `Modele/`
- Pour générer un PDF, inclure et utiliser `FPDF/fpdf.php`

## Exemples de fichiers clés
- `Controleur/livre/ajout.php` : ajout d'un livre
- `Modele/fonctions.php` : fonctions utilitaires globales
- `Vue/livre/` : vues liées aux livres
- `FPDF/fpdf.php` : point d'entrée pour la génération PDF

## Conseils pour agents IA
- Respecter la structure MVC existante, même si elle est artisanale
- Toujours vérifier les inclusions de fichiers nécessaires
- Privilégier la réutilisation des fonctions du dossier `Modele/`
- Documenter les nouveaux patterns ou conventions dans ce fichier

Pour toute ambiguïté, demander des précisions sur les conventions ou les flux métier.