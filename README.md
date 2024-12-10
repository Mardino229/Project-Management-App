# Teamsync

Plateforme de gestion de tâches collaboratives

## Prérequis

- PHP >= 7.3
- Composer
- Node.js et npm
- MySQL

## Installation

1. Clonez le dépôt

    ```bash
    git clone https://github.com/votre-utilisateur/votre-repo.git
    cd votre-repo
    ```

2. Installez les dépendances PHP

    ```bash
    composer install
    ```

3. Installez les dépendances JavaScript

    ```bash
    npm install
    ```

4. Copiez le fichier `.env.example` en `.env` et configurez vos variables d'environnement

    ```bash
    cp .env.example .env
    ```

5. Générez la clé de l'application

    ```bash
    php artisan key:generate
    ```

6. Configurez votre base de données dans le fichier `.env` et exécutez les migrations

    ```bash
    php artisan migrate
    ```

7. (Optionnel) Seed la base de données

    ```bash
    php artisan db:seed
    ```

8. Compilez les assets

    ```bash
    npm run dev
    ```

## Utilisation

1. Démarrez le serveur de développement

    ```bash
    php artisan serve
    ```

2. Accédez à l'application dans votre navigateur à l'adresse [http://127.0.0.1:8000](http://127.0.0.1:8000)

3. Connectez vous en tant qu'admin avec les identifiants suivant : maryse@example.com et password123

4. Jouissez donc des fonctionnalités de l'application.
## Licence

Ce projet est sous licence MIT. Voir le fichier [LICENSE](LICENSE) pour plus de détails.
