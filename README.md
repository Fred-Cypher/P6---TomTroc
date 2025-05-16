# Tom Troc : site de partage de livres

Le site a pour but de permettre à des utilisateurs d'échanger des livres. 

## Pour utiliser ce projet : 

- Commencez par cloner le projet. 
- Installez le projet chez vous, dans un dossier exécuté par un serveur local (type MAMP, WAMP, LAMP, etc...)
- Une fois installé chez vous, créez une base de données MySQL vide appelée : "tomtroc".
- Importez le fichier _tomtroc.sql_ dans votre base de données MySQL.

## Lancez le projet ! 

Pour la configuration du projet, renommez le fichier _\_config.php_ (dans le dossier _config_) en _config.php_ et éditez-le si nécessaire. 
Ce fichier contient notamment les informations de connexion à la base de données.

Une fois le projet lancé, vous pouvez créer des utilisateurs, pour avoir un utilisateur qui possède les droits d'administrateur, modifiez directement dans la base de données le rôle de l'utilisateur (ROLE_ADMIN). 

## Problèmes courants :

Il est possible que la librairie intl ne soit pas activée sur votre serveur par défaut. Cette librairie sert notamment à traduire les dates en francais. Dans ce cas, vous pouvez soit utiliser l'interface de votre serveur local pour activer l'extension (wamp), soit aller modifier directement le fichier _php.ini_. 

Ce projet a été réalisé avec PHP 8.3. Bien que d'autres versions de PHP puissent fonctionner, il n'est pas garanti que le projet fonctionne correctement avec des versions antérieures.

La base de données a été créée et enregistrée avec phpMyAdmin 5.2. et MySQL 5.7.

## Fonctionnalités mises en place : 

- Inscription et connexion des utilisateurs
- Ajout et modification de livres
- Consultation des livres enregistrés
- Recherche des livres par titre
- Consultation du profil des utilisateurs
- Modification du profil des utilisateurs
- Messagerie interne

## Copyright : 

Projet réalisé dans le cadre de la formation OpenClassrooms "Développeur d'application PHP / Symfony". 