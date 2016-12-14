test_technique
==============

Instructions d'installation :

1) Télécharger le projet dans /var/www/test_technique

2) Configurer parameters.yml avec les informations de la base de données

3) Lancer composer install

4) Lancer doctrine:database:create

5) Lancer doctrine:schema:update --force

6) Lancer doctrine:fixture:load

7) Lancer assets:install si nécessaire

8) Lancer sp:bower:install

9) Lancer assetic:dump

10) Lancer sudo chmod -R 777 *

