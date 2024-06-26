# Arrête et supprime les conteneurs en cours, 
# ce qui permet de s'assurer que les conteneurs précédemment créés ne sont pas en conflit avec les nouveaux conteneurs qui vont être créés.
docker-compose down
# Construit les images des différents services en se basant sur les instructions du fichier Dockerfile de chaque service.
docker-compose build
# Lance les services en utilisant le fichier de configuration docker-compose.prod.yml, 
# qui contient les informations nécessaires pour exécuter l'application dans un environnement.
docker-compose -f docker-compose.yml up -d