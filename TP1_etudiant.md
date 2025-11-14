## 🎯 **Titre du TP**

**Application de gestion de citations avec rôles et autorisations**

---

## 🧭 **Objectif pédagogique**

-   Comprendre et implémenter un **système d’authentification** sous Laravel.
-   Gérer des **rôles utilisateurs** (Admin, Auteur, Lecteur) et des **permissions**.
-   Appliquer les **middlewares** pour sécuriser les routes selon le rôle.
-   Cacher ou afficher des éléments dans les vues **Blade** selon le rôle.
-   Manipuler les **relations entre modèles** (User ↔ Citation).
-   Découvrir les **bonnes pratiques MVC** en Laravel.

---

## 🧩 **Description du projet**

L’application permet aux utilisateurs de **consulter, proposer et gérer des citations** inspirantes.
Chaque utilisateur a un **rôle** qui détermine les actions qu’il peut effectuer.

### Exemple :

-   👑 **Admin** : gère les utilisateurs, approuve ou supprime les citations.
-   ✍️ **Auteur** : peut ajouter, modifier ou supprimer _ses propres citations_.
-   👀 **Lecteur** : peut uniquement consulter les citations publiées.

---

### Menu
 - Accueil (affiche une bannière, et les 5 dernières citations publiées)
 - A propos
 - Citations (affiche toutes les citations publiées)
 - Gestion des citations (permet le CRUD des citations)
 - Gestion des utilisateurs (Permet à l'admin la gestion des utilisateurs)
-Connexion/Inscription
-Deconnexion
## ⚙️ **Spécifications fonctionnelles**

### 1️⃣ Authentification

-   Enregistrement et connexion.
-   L’utilisateur se voit attribuer un rôle par défaut (“lecteur”).

---

### 2️⃣ Gestion des rôles et permissions

-   3 rôles : **admin**, **auteur**, **lecteur**.
-   Un **middleware** `RoleMiddleware` vérifie le rôle avant d’accéder à certaines routes.
-   Les rôles seront gérés via un **seeder**

---

### 3️⃣ Gestion des citations

Chaque citation contient :

| Champ        | Type      | Description                        |
| ------------ | --------- | ---------------------------------- |
| id           | int       | Identifiant unique                 |
| content      | text      | Contenu de la citation             |
| author       | string    | Nom de l’auteur de la citation     |
| user_id      | foreignId | Référence à l’utilisateur créateur |
| is_published | boolean   | Statut de publication              |

#### Fonctionnalités :

-   Un **auteur** peut :

    -   Créer une citation.
    -   Modifier/supprimer _ses propres_ citations.
    -   Voir les siennes, même non publiées.

-   Un **lecteur** peut :

    -   Voir uniquement les citations publiées.

-   Un **admin** peut :

    -   Voir toutes les citations.
    -   Modifier/supprimer n’importe quelle citation.
    -   Publier/dépublier les citations.

---

### 4️⃣ Gestion des utilisateurs (Admin uniquement)

-   Liste des utilisateurs.
-   Modification du rôle d’un utilisateur.
-   Suppression d’un utilisateur.

---

### 5️⃣ Interface (Blade)

-   Utilisation de **layouts Blade** (`layouts/app.blade.php`).
-   **Menu dynamique** :

    -   Liens visibles selon le rôle.

-   **Affichage conditionnel** dans les boutons d’action :

    -   “Modifier” et “Supprimer” visibles uniquement pour :

        -   L’auteur de la citation.
        -   L’admin.

-   Afficher une **page publique** avec les citations publiées.
---

## 🔒 **Sécurité & Middlewares**

-   `auth` → protège l’accès général.
-   `role:admin` → protège la partie admin.
-   `role:auteur` → protège les actions de création.
-   Vérification des rôles directement dans les vues

---

## 🧱 **Structure des tables**

### `users`

-   id
-   name
-   email
-   password
-   role (`enum: ['admin', 'auteur', 'lecteur']`)

### `citations`

-   id
-   content
-   author
-   user_id
-   is_published

## 🎨 **Suggestions de bonus**

-   Ajouter un système de **like** pour les citations.
-   Implémenter la **recherche** par mot-clé.
-   Ajouter une **pagination**.
