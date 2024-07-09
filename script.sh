#!/bin/bash

# Affiche un message avant de commencer la mise à jour du système
echo "Début de la mise à jour du système..."
sudo yum update -y
echo "Mise à jour du système terminée."

# Affiche un message avant d'installer Docker
echo "Début de l'installation de Docker..."
sudo yum install docker -y
echo "Installation de Docker terminée."

# Affiche un message avant d'ajouter l'utilisateur au groupe Docker
echo "Ajout de l'utilisateur 'ec2-user' au groupe Docker..."
sudo usermod -a -G docker ec2-user
echo "Ajout de l'utilisateur au groupe Docker terminé."

# Affiche un message avant de télécharger Docker Compose
echo "Téléchargement de Docker Compose..."
wget https://github.com/docker/compose/releases/download/1.29.2/docker-compose-$(uname -s)-$(uname -m)
echo "Téléchargement de Docker Compose terminé."

# Affiche un message avant de déplacer Docker Compose vers /usr/local/bin
echo "Installation de Docker Compose..."
sudo mv docker-compose-$(uname -s)-$(uname -m) /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose
echo "Installation de Docker Compose terminée."

# Affiche un message avant de démarrer Docker
echo "Démarrage du service Docker..."
sudo systemctl enable docker.service
sudo systemctl start docker.service
echo "Démarrage du service Docker terminé."

# Affiche un message avant de cloner le dépôt
echo "Clonage du dépôt Cubes5_CESI (branche dev-VINC)..."
git clone -b dev-VINC https://github.com/TITO-B/Cubes5_CESI.git
echo "Clonage du dépôt terminé."

# Se déplace dans le répertoire cloné
cd Cubes5_CESI

# Affiche un message avant de construire et démarrer les services Docker Compose
echo "Construction et démarrage des services Docker Compose..."
docker-compose up -d --build
echo "Construction et démarrage des services Docker Compose terminés."
