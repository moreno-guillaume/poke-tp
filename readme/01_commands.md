# Correction du warning -git
RUN git config --global --add safe.directory /var/www

# Build l'image PHP
docker compose build

# Démarrer les containers
docker compose up -d

# Verifs docker run
docker compose ps

# Installation des dépendances
docker compose exec php composer install

# Doctrine
docker compose exec php composer require orm

