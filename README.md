**Projet Guide IT - TravelParadise**

Ce projet a été réalisé dans le cadre du projet de fin d'année de l'école IT. L'objectif est de fournir à l'agence de voyages TravelParadise une solution digitale pour moderniser la gestion de ses guides touristiques et des visites qu'ils animent.

La solution se compose de deux parties principales :

- Une application web d'administration développée avec Symfony pour la gestion des données (guides, visites, statistiques).
- Une application mobile développée avec React Native à destination des guides pour le suivi de leurs missions sur le terrain.


**1- Prérequis**

Avant de commencer, assurez-vous d'avoir les outils suivants installés sur votre machine :

- Git
- Docker & Docker Compose
- Node.js (version LTS recommandée)
- Symfony CLI
- L'application Expo Go sur votre smartphone (iOS ou Android)


**2- Installation et Lancement**

Suivez ces étapes pour configurer et lancer l'environnement de développement local.
1. Clonez le repository
   
    ```
    git clone https://github.com/alex-dembele/guideit_project.git
    cd guideit_project
    ```

**Backend (Symfony & Docker)**
Le backend est entièrement conteneurisé avec Docker pour simplifier l'installation.

2. Lancez les conteneurs Docker
Cette commande va construire et démarrer les conteneurs pour PHP, Nginx et la base de données PostgreSQL.
   
```
docker-compose up -d --build
```

3. Installez les dépendances PHP
Exécutez Composer à l'intérieur du conteneur PHP pour installer les vendors.
```
docker-compose exec php composer install
```

4. Configurez la base de données
Ces commandes, exécutées dans le conteneur, créent la base de données et appliquent les migrations pour créer les tables.
```
    docker-compose exec php bin/console doctrine:database:create --if-not-exists
    docker-compose exec php bin/console make:migration
    docker-compose exec php bin/console doctrine:migrations:migrate --no-interaction
```

Optionnel : Si des fixtures (données de test) sont créées, chargez-les avec : 
    ```
    docker-compose exec php bin/console doctrine:fixtures:load
    ```

**Frontend (React Native & Expo)**
L'application mobile est gérée avec Expo.

5. Naviguez vers le dossier de l'application mobile
```
cd mobile_app
```

6. Installez les dépendances JavaScript
```
npm install
```

7. Lancez le serveur de développement Expo
```
npm start
```

Un QR code s'affichera dans le terminal.


**Utilisation du Projet**
Une fois l'installation terminée, les deux parties de l'application sont prêtes à être utilisées.
Accès à l'Administration Web

- URL : Ouvrez votre navigateur et allez à l'adresse http://localhost:8080
- Fonctionnalités :
    - Gestion (Création, Ajout, Modification) des comptes utilisateurs (Rôles Administrateur / Utilisateur).    - - Gestion des guides touristiques et des visites.
    - Consultation des statistiques : nombre de visites par mois, par guide, et taux de présence.

**Utilisation de l'Application Mobile**
- Lancement : Scannez le QR code affiché dans votre terminal avec l'application Expo Go sur votre smartphone.L'application se chargera automatiquement.
- Fonctionnalités pour le guide :
    - S'authentifier pour accéder à son espace.
    - Visualiser la liste de ses visites (passées, en cours, et à venir).
    - Lors d'une visite, faire l'appel des participants et noter leur présence.
    - Clôturer une visite et ajouter un commentaire général.

**Structure du Projet**
Le projet est organisé comme suit :
```
/
├── api_admin/            # Dossier du projet Symfony (Backend, API, Admin)
├── mobile_app/           # Dossier du projet React Native (Application mobile)
├── docker/               # Fichiers de configuration pour Docker (ex: nginx.conf)
├── .gitignore            # Fichiers et dossiers à ignorer par Git
├── docker-compose.yml    # Fichier d'orchestration des conteneurs Docker
└── README.md             
```