# Cubes5_CESI
Consignes CUBES - INFCDLPC7 - Déployer et maintenir une application informatique - V1 - 26.08.2021

Enoncé
Titre du projet :
Vide Grenier

Première partie :	
Présentation du projet : Pour ce projet nous vous livrons une application. Votre travail sera de :
-	Mettre en place l’environnement de développement
-	Corriger l’application
-	Mettre en place l’environnement de production

Voici le mail reçu par votre client :

Expéditeur: DERRY John <john.derry@videgrenierenligne.fr>
Date: 20 septembre 2020 à 17:42:03 UTC+2
Destinataire: Agence Tekos <dev@tekos.com>
Objet: Reprise du site internet Vide Grenier en ligne

Bonjour l'équipe, 

Voici ci-joint les éléments que m’a transmis mon ancien prestataire (en cessation d’activité). 

Comme je vous l’ai dit précédemment, nous permettons avec Vide Grenier En Ligne à chaque résident en France métropolitaine de donner sans aucune contrepartie des objets entreposés dans leur grenier ou garage. Jeu de carte, livre, puzzle etc. Le tout gratuitement ! 

Le site est actuellement en ligne mais nos utilisateurs nous remontent beaucoup d’erreurs..

En voici quelques-unes mais je pense que vous trouverez le reste tout seul…

* Un message d’erreur s’affiche quand on ne poste pas une photo dans une annonce (les champs devaient être tous requis) 
* Quand un utilisateur s’enregistre il n’est pas connecté tout de suite après 
* J’ai l’impression que le bouton “se souvenir de moi” ne fonctionne pas, pouvez-vous vérifier ? 
* Il était prévu que nous ayons un formulaire de contact sur la page du produit mais aujourd’hui c’est la boite mail qui s’ouvre

Egalement il était prévu que j’ai sur mon compte videgrenierenligne un espace ou je peux voir les statistiques du site mais aujourd’hui je n’ai rien quand je me connecte avec mon adresse mail. 

Je passe également le mode Progressive Web App qui était initialement prévu… je n’ai même pas de favicon. 

Merci de revenir vers moi avec une estimation du temps que va prendre le début de ces fonctionnalités. Je présente le site devant des investisseurs en fin de semaine, j’espère que vous pourrez régler tout ça ! 

Cordialement, 

John DERRY
VideGrenierEnLigne


Pour ce projet vous allez devoir :
	Créer un repository pour y mettre le code de l’application.
	Mettre en place (utiliser) un système de gestion des issues et répartir ces taches entre les membres de votre équipe
	Travailler en mode « GitFlow »
	Concevoir un environnement de développement basé sur Docker (serveur Web + base de données)
	Apporter les corrections au site internet
	Créer les tests unitaires de l’application
	Concevoir un environnement de pré-production basé sur Docker en respectant l’architecture suivante :
o	Un Container pour la base de données en persistente
o	Un Container pour le service Web avec récupération du dépôt GIT branche « stage » (ou recette) du GitFlow
	Utiliser le merge request pour pousser le code de la branche « stage » (ou recette) vers la branche « master » (ou main)
	Concevoir un environnement de pré-production basé sur Docker en respectant l’architecture suivante :
o	Un Container pour la base de données en persistente
o	Un Container pour le service Web avec récupération du dépôt GIT branche « master » (ou main)
	Concevoir un environnement de production basé sur Docker en respectant l’architecture suivante :
o	Un Container pour la base de données en persistente
o	Un Container pour le service Web avec récupération du dépôt GIT branche « master » (ou main)
	Utiliser un système de génération documentaire pour le code API




Travail demandé/Livrable final

Oral
La présentation de votre projet durera 20 minutes, elle devra comprendre
-	La démonstration des tests unitaires
-	La démonstration de la correction des bugs du site internet
-	Le développement en live (prévoyez le code à l’avance) d’une requête API en respectant le GitFlow
o	Prouver que votre environnement de développement est à jour, mais que l’environnement de préproduction et de production est encore sur l’ancienne version
o	Mettre à jour l’environnement de préproduction en regard de l’environnement de développement. Démontrer que l’environnement de production est toujours sur l’ancienne version
o	Mettre à jour l’environnement de production en regard de l’environnement de préproduction

Déroulement et livrables intermédiaires

Pour ce projet, vous serez en équipe de 3 développeurs maximum
A titre d’information, voici une idée de répartition de vos journées :
DEROULEMENT
Jour	Etapes	Livrables attendus
J1	Matin: appropriation du CUBES, échange entre apprenant sur les idées et hypothèses, répartition en groupe
Monter l’environnement de développement pour mettre en place le site. Prendre connaissance des bugs et organiser l’équipe projet
Après-midi: Commencer la correction de l’application	Équipes composées

Environnement de développement Docker 

Création des issues et affectation des taches aux membres de l’équipe
J2	Développer les corrections de l’application
Développer les tests unitaires	Etat d’avancement des issues
J3	Terminer le développement des corrections de l’application
Terminer le développement des tests unitaires	Etat d’avancement des issues

J4	Concevoir les environnements de préproduction et de production	Développer une fonctionnalité quelconque et le faire se déployer sur les différents environnements
J5	Préparation de la présentation orale	Présentation/Soutenance Orale



 

Conseils

Nous vous conseillons d’utiliser GitLab qui intègre un système pratique de gestion des issues avec affectation des taches aux membres de l’équipe. Par ailleurs, dans la suite de votre formation, vous pourrez utiliser le système CI/CD fourni par GitLab

Pour la création de tests unitaires regardez du coté PHP-Unit

Pour votre environnement Docker, nous vous suggérons d’utiliser Docker-Compose.
Plus spécifiquement, pour l’environnement de déploiement, pensez à nommer vos containers ainsi il sera possible à vos containers de dialoguer entre eux avec le nom « machine » (utile pour la chaine de connexion à la base de données etc.). Vous aurez à faire un script « .sh » qui monte votre environnement (récupération du code sur git, instanciation des containers etc.). Profitez-en pour réaliser un script pour chaque environnement (développement, préproduction et production)

Pour la génération de documentation, regardez du côté de Swagger

Pièces annexes

Grille d’évaluation
Code de l’application vide-grenier-en-ligne-master.zip



