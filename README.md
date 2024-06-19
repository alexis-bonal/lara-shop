## Description

Ce projet est une plateforme de commerce électronique développée avec le framework Laravel. Le site permet aux utilisateurs de parcourir une gamme de produits, de les ajouter à leur panier, de passer des commandes et d'accéder à un espace utilisateur pour suivre leurs commandes passées. Une interface d'administration est également fournie pour gérer les produits et les commandes.

## Fonctionnalités

### Page d'Accueil
- [x] Présentation générale du site avec un carousel, des promotions et des offres spéciales.
- [x] Liens vers les différentes catégories de produits.

### Page de Produits
- [x] Affichage des produits par catégorie.
- [x] Possibilité de filtrer les produits par prix, popularité, etc.

### Navbar
- [x] Navbar avec des liens vers la page d'accueil, la page de produits, la page de contact et le panier.

### Page de Détail d'un Produit
- [x] Affichage détaillé d'un produit, y compris son nom, sa description, son prix, son image, etc.
- [x] Possibilité d'ajouter le produit au panier avec une quantité spécifiée.

### Page de Panier
- [x] Récapitulatif des produits ajoutés au panier par l'utilisateur.
- [x] Possibilité de modifier la quantité des produits ou de supprimer des produits du panier.
- [x] Affichage du total de la commande.

### Validation du Panier
- [x] Validation des informations de paiement avant de passer à la commande.
- [x] Possibilité d'appliquer des codes de réduction ou des coupons.

### Page de Contact
- [x] Formulaire de contact permettant aux utilisateurs de poser des questions ou de soumettre des commentaires.

### Espace Utilisateur
- [x] Possibilité pour les utilisateurs de créer un compte et de se connecter.
- [x] Historique des commandes passées avec les détails de chaque commande.

### Accès Administration
- [ ] Interface d'administration sécurisée avec authentification.
- [ ] Possibilité de gérer les produits (ajouter, modifier, supprimer).
- [ ] Vue d'ensemble des commandes passées avec la possibilité de les marquer comme traitées ou en attente.
- [ ] Gestion des coupons de réductions.

## Installation

1. Cloner le dépôt GitHub :
    ```bash
    git clone https://github.com/votre-utilisateur/votre-depot.git
    ```
2. Accéder au répertoire du projet :
    ```bash
    cd votre-depot
    ```
3. Installer les dépendances avec Composer :
    ```bash
    composer install
    ```
4. Copier le fichier `.env.example` en `.env` et configurer votre environnement :
    ```bash
    cp .env.example .env
    ```
5. Générer la clé de l'application :
    ```bash
    php artisan key:generate
    ```
6. Configurer votre base de données dans le fichier `.env`.

7. Exécuter les migrations et les seeders :
    ```bash
    php artisan migrate --seed
    ```
8. Installer les dépendances front-end :
    ```bash
    npm install
    npm run dev
    ```

## Utilisation

- Démarrer le serveur de développement :
    ```bash
    php artisan serve
    ```

- Accéder à l'application via http://127.0.0.1

## Export de la base de données

Pour exporter la base de données, utilisez la commande suivante :
```bash
mysqldump -u your_username -p your_database > database_export.sql
