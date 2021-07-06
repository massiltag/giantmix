# GiantMix

Projet final du module INF3-BDNoSQL consistant à créer un site e-commerce
simplifié (vente de consoles de jeu) en utilisant différents types de BDD NoSQL,
encadré par Vincent Poupet à l'Université Paris Panthéon Sorbonne.

Les fonctionnalités comprennent :

* Connexion et inscription
* Recherche multi-critères d'articles
* Ajout au panier
* Édition du panier
* Enregistrement et consultation des commandes

# Choix techniques

### [MongoDB](https://docs.mongodb.com/manual/administration/install-community/)

Stockage des utilisateurs et de l'historique des commandes.

### [ElasticSearch](https://www.elastic.co/fr/downloads/elasticsearch)

Stockage des produits proposés à la vente, permet d'effectuer des recherches
multicritères sur ces derniers.

### [Redis](https://redis.io/download)

Stockage temporaire du panier utilisateur pendant 5 minutes. Les IDs des produits sont 
stockés dans Redis puis une requête est effectuée vers MongoDB au chargement du panier 
pour afficher les détails des produits.



# Comment lancer

Suivre ces instructions pour lancer le projet convenablement.

## Prérequis

Afin de lancer le projet, vous aurez besoin d'installer

* [PHP](https://www.php.net/downloads.php) version 7.4 (ou WAMP/LAMP/MAMP/XAMPP)
* [Extension MongoDB](https://docs.mongodb.com/drivers/php/) pour PHP
* [Composer](https://getcomposer.org/download/)
* [MongoDB](https://docs.mongodb.com/manual/administration/install-community/) lancé sur le port par défaut (localhost:**27017**)
* [ElasticSearch](https://www.elastic.co/fr/downloads/elasticsearch) lancé sur le port par défaut (localhost:**9200**)
* [Redis](https://redis.io/download) lancé sur le port par défaut (localhost:**6379**)

## Avant de lancer

* Lancer les serveurs locaux (MongoDB, Redis, Elasticsearch) ;
* Veiller à bien importer les données concernant les produits dans Elasticsearch
  de cette manière :  
  ```POST http://localhost:9200/giantmix/products/_bulk```  
  Avec comme body : le fichier ```./data/bulk.txt``` présent dans le répertoire
  du projet.

## Lancer le projet

1. Installer les dépendances avec ```composer update``` puis ```composer install``` dans le répertoire du projet
2. Lancer un serveur PHP sur un port libre de votre machine : ```php -S localhost:4242```
3. Ouvrir un navigateur à l'adresse et au port spécifié
4. Vous inscrire depuis l'interface et vous connecter
5. Tester les fonctionnalités

# Auteurs

* Massil TAGUEMOUT
* Nicolas LEWIN
* William DAI
* Sarah MEZIANE
