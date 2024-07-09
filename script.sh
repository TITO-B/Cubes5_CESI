#!/bin/bash
# Met à jour tous les paquets installés sur le système à leur dernière version disponible
sudo yum update -y

# Installe Docker, l'outil de conteneurisation
sudo yum install docker -y

# Ajoute l'utilisateur 'ec2-user' au groupe 'docker' pour permettre l'exécution des commandes Docker sans 'sudo'
sudo usermod -a -G docker ec2-user

# Télécharge la version 3.7 de Docker Compose depuis GitHub, adaptée au système d'exploitation et à l'architecture de la machine
wget https://github.com/docker/compose/releases/download/v3.7/docker-compose-$(uname -s)-$(uname -m)

# Déplace le fichier téléchargé de Docker Compose vers le répertoire /usr/local/bin et le renomme en 'docker-compose'
sudo mv docker-compose-$(uname -s)-$(uname -m) /usr/local/bin/docker-compose

# Rend le fichier Docker Compose exécutable
sudo chmod -v +x /usr/local/bin/docker-compose

# Configure Docker pour démarrer automatiquement au démarrage du système
sudo systemctl enable docker.service

# Démarre le service Docker immédiatement
sudo systemctl start docker.service


# git clone
# lance docker compose