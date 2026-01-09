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

# Create ou verif existence de la bdd (--option)
docker compose exec php bin/console doctrine:database:create --if-not-exists

# Installation du makerBundle
docker compose exec php composer require --dev symfony/maker-bundle

# Init d'un Controller ( vue simple )
docker compose exec php bin/console make:controller IndexController

