# Rapport d'Évolution du Projet : Gemini Café

Ce document résume l'ensemble des modifications, améliorations et fonctionnalités implémentées pour transformer le prototype statique en une application web dynamique et moderne.

---

## 1. Améliorations de l'Interface (Frontend)

### Design & Esthétique
*   **Bouton Premium :** Ajout d'un bouton d'appel à l'action avec dégradé `indigo-to-purple`, coins totalement arrondis (pill-style) et effets d'élévation au survol.
*   **Icônes Lucide :** Remplacement des anciens SVGs par la bibliothèque **Lucide Icons** pour une meilleure cohérence visuelle.
*   **Typographie :** Utilisation combinée de `Playfair Display` (Titres) et `Inter` (Corps) pour un rendu haut de gamme.

### Fonctionnalités UX
*   **Mode Sombre Complet :** Implémentation d'un thème "Slate-900" avec texte blanc cassé.
*   **Sélecteur de Thème (Toggle) :** Ajout d'un bouton interactif permettant de basculer entre le mode clair et sombre avec persistance via `localStorage` (mémorisation du choix de l'utilisateur).
*   **Responsive Design :** Navigation entièrement adaptée aux mobiles avec un menu hamburger interactif et des grilles fluides.

---

## 2. Architecture des Données (Backend)

### Structure de la Base de Données
*   **Conception du Schéma SQL :** Création d'une structure relationnelle comprenant 5 tables :
    *   `users` : Gestion des comptes (clients et admins).
    *   `categories` : Organisation du menu.
    *   `products` : Liste des articles avec prix, descriptions et images.
    *   `orders` : Suivi des commandes passées.
    *   `order_items` : Détails des produits par commande.
*   **Migration SQL :** Création du fichier `migration.sql` prêt pour l'importation dans **phpMyAdmin**.

---

## 3. Logique Applicative (PHP)

Le projet a été migré de HTML statique vers **PHP 8** pour gérer la dynamique du site :

*   **`db.php` :** Couche de connexion sécurisée à la base de données utilisant **PDO**.
*   **`signup.php` :** Système d'inscription complet avec :
    *   Vérification de l'unicité de l'email.
    *   Hachage sécurisé des mots de passe (`password_hash`).
*   **`login.php` :** Système d'authentification avec gestion de session (`session_start`).
*   **`index.php` :** Page d'accueil dynamique qui affiche le nom de l'utilisateur s'il est connecté.
*   **`logout.php` :** Gestion de la déconnexion sécurisée.

---

## 4. Structure des Fichiers Actuelle

```text
gemini-cafe/
├── index.php           # Page d'accueil (dynamique)
├── login.php           # Page de connexion
├── signup.php          # Page d'inscription
├── logout.php          # Script de déconnexion
├── db.php              # Connexion à la base de données
├── migration.sql       # Script d'importation SQL
└── RAPPORT_PROJET.md   # Le présent rapport
```

---

## 5. Instructions pour le Déploiement Local

1.  Placer le dossier dans votre serveur local (XAMPP `htdocs` ou WAMP `www`).
2.  Importer `migration.sql` dans votre gestionnaire de base de données.
3.  Vérifier les identifiants dans `db.php`.
4.  Accéder au projet via `http://localhost/gemini-cafe/`.

---
*Rapport généré le 18 Mars 2026.*
