#/bin/sh
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force
php bin/console doctrine:fixture:load
php bin/console assets:install si nécessaire
php bin/console sp:bower:install
php bin/console assetic:dump
sudo chmod -R 777 *
