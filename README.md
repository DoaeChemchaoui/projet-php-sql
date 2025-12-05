#  Mini-Sport

Mini-Sport est une application web simple, moderne et intuitive permettant de gérer les **cours sportifs** et les **équipements** d’une salle de sport.
Le projet offre une interface claire, responsive, et facile à utiliser pour assurer une bonne organisation interne.


##  Contexte du projet

La salle de sport souhaite disposer d’un outil pour :

* Gérer les **cours** (planning, catégories, horaires, durée, participants…)
* Gérer les **équipements** (types, quantités, état…)
* Consulter rapidement les données via un **dashboard**
* Centraliser toutes les informations dans un système unique
* Faciliter la gestion quotidienne grâce à une interface simple

L’objectif est de proposer une application **fonctionnelle, fluide et entièrement gérée en PHP/MySQL**.


##  Taches Réalisées

### Gestion des cours

* Ajouter un cours (nom, catégorie, date, heure, durée, participants max)
* Modifier un cours existant
* Supprimer un cours
* Consulter la liste complète des cours
* Validation des champs obligatoires avant insertion ou modification. 

### Gestion des équipements

* Ajouter un équipement (nom, type, quantité, état)
* Modifier un équipement
* Supprimer un équipement
* Consulter la liste des équipements
* Validation des champs obligatoires avant insertion ou modification. 


### Interface & Utilisation

* Avoir un dashboard rapide montrant les statistiques globales
* Navigation simple via une sidebar
* Message de erreur si il ya un erreur



##  Technologies utilisées

###  Back-end

* **PHP** – logique serveur, traitement des formulaires
* **MySQL** – stockage des données
* **Apache(XAMPP)** – serveur local

###  Front-end

* **HTML** – structure des pages
* **CSS** – design (sidebar, formulaires, tableaux)

###  Outils

* Git & GitHub 
* phpMyAdmin


##  Rôles & Missions

###  Interface utilisateur

* Création d’une interface simple et propre
* Sidebar fluide pour naviguer entre « Dashboard », « Cours » et « Équipements »
* Formulaires bien structurés et alignés

###  Développement Fonctionnel

* CRUD complet pour les **cours**
* CRUD complet pour les **équipements**
* Gestion des validations (champs vides, erreurs SQL)
* Séparation propre du code (dossiers indépendants)
* Sécurisation basique : vérification des paramètres GET/POST

###  Base de données

* Création des tables `cours` et `equipements`
* Gestion automatique des ID via `AUTO_INCREMENT`
* Types adaptés à chaque colonne


##  Pages et Sections du Projet

###  Dashboard

* Vue d’ensemble
* Statistiques automatiques (nombre de cours, équipements…)

###  Gestion des cours

* **liste.php** : afficher tous les cours
* **ajouter.php** : formulaire d’ajout (nom, catégorie, date, heure, durée, max participants)
* **modifier.php** : modifier un cours existant
* **supprimer.php** : confirmer et supprimer un cours

###  Gestion des équipements

* **liste.php** : afficher les équipements
* **ajouter.php** : ajouter un équipement
* **modifier.php** : modifier un équipement
* **supprimer.php** : suppression avec confirmation



