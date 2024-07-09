

# Arrête et supprime les conteneurs en cours, 
# ce qui permet de s'assurer que les conteneurs précédemment créés ne sont pas en conflit avec les nouveaux conteneurs qui vont être créés.
docker-compose down
# Construit les images des différents services en se basant sur les instructions du fichier Dockerfile de chaque service.
docker-compose build
# Lance les services en utilisant le fichier de configuration docker-compose.prod.yml, 
# qui contient les informations nécessaires pour exécuter l'application dans un environnement.
docker-compose -f docker-compose.yml up -d


#!/bin/bash
# Met à jour tous les paquets installés sur le système à leur dernière version disponible
sudo yum update -y

# Installe Docker, l'outil de conteneurisation
sudo yum install docker -y

# Ajoute l'utilisateur 'ec2-user' au groupe 'docker' pour permettre l'exécution des commandes Docker sans 'sudo'
sudo usermod -a -G docker ec2-user

# Télécharge la dernière version de Docker Compose depuis GitHub, adaptée au système d'exploitation et à l'architecture de la machine
wget https://github.com/docker/compose/releases/latest/download/docker-compose-$(uname -s)-$(uname -m)

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